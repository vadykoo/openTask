<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Board::class, 'board');
    }

    public function index()
    {
        $boards = auth()->user()->boards();
        return BoardResource::collection($boards->paginate());
    }

    public function store(BoardRequest $request)
    {
        $board = Board::create($request->validated());
        return new BoardResource($board);
    }

    public function show(Board $board)
    {
        return new BoardResource($board);
    }

    public function update(BoardRequest $request, Board $board)
    {
        $board->fill($request->except(['id']));
        $board->save();
        return new BoardResource($board);
    }

    public function destroy(Request $request, Board $board)
    {
        $board = Board::findOrFail($board->id);
        if($board->delete()) return response(null, 204);
    }
}
