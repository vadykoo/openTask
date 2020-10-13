<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\Log;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\Task $task
     * @return void
     */
    public function created(Task $task)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'created',
            'original' => $task->getOriginal(),
        ]);
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Models\Task $task
     * @return void
     */
    public function updated(Task $task)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'updated',
            'original' => $task->getOriginal(),
            'changes' => $task->getChanges()
        ]);
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Models\Task $task
     * @return void
     */
    public function deleted(Task $task)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'original' => $task->getOriginal(),
        ]);
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Models\Task $task
     * @return void
     */
    public function restored(Task $task)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'restored',
            'original' => $task->getOriginal(),
        ]);
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Models\Task $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'forceDeleted',
            'original' => $task->getOriginal(),
        ]);
    }
}
