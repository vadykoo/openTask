<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\IndexTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Board;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Jobs\CropImage;

class TaskController extends Controller
{
    public function index(IndexTaskRequest $request, Board $board)
    {
        $labels = $request->labels;
        $status = $request->status;

        $board = \Auth::user()->boards()->findOrFail($board->id);

        $tasks = $board->tasks()
            ->with('labels')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            });

        if(!empty($labels)) {
            $tasks = $tasks->whereHas('labels', function ($query) use ($labels) {
                $query->whereIn('name', $labels);
            });
        }

        return TaskResource::collection($tasks->paginate());
    }

    public function store(TaskRequest $request, Board $board)
    {
        $this->authorize('create', [Task::class, $board]);

        $task = new Task();
        $task->fill($request->validated());
        $task->board_id = $board->id;
        $task->created_by = auth()->user()->id;
        $task->save();
        $task->labels()->sync($request->labels);

        if ($image = $request->file('image')) {
            $path = '/storage/images/';
            InterventionImage::make($image)->save($original_file_path = public_path($path) . $task->id . '_desktop.jpg');
            CropImage::dispatch($task->id, $original_file_path);
        }

        return new TaskResource($task);
    }

    //board is not required with policy
    public function show(Board $board, Task $task)
    {
        $this->authorize('view', [Task::class, $task]);

        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Board $board, Task $task)
    {
        $this->authorize('update', [Task::class, $task]);
        $task->fill($request->except(['id']));
        $task->save();
        $task->labels()->sync($request->labels);

        if ($image = $request->file('image')) {
            $path = '/storage/images/';
            InterventionImage::make($image)->save($original_file_path = public_path($path) . $task->id . '_desktop.jpg');
            CropImage::dispatch($task->id, $original_file_path);
        }

        return new TaskResource($task);
    }

    public function destroy(Request $request, Board $board, Task $task)
    {
        $this->authorize('delete', [Task::class, $task]);
        $task = Task::findOrFail($task->id);
        unlink(public_path($task->image->desktop_path));
        unlink(public_path($task->image->mobile_path));
        $task->image->delete();
        if($task->delete()) return response(null, 204);
    }

}
