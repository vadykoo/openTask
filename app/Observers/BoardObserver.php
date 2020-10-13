<?php

namespace App\Observers;

use App\Models\Board;

class BoardObserver
{
    public function creating(Board $board)
    {
        $board->created_by = auth()->id();
    }

    /**
     * Handle the board "updated" event.
     *
     * @param  \App\Models\Board  $board
     * @return void
     */
    public function updated(Board $board)
    {
        //
    }

    /**
     * Handle the board "deleted" event.
     *
     * @param  \App\Models\Board  $board
     * @return void
     */
    public function deleted(Board $board)
    {
        //
    }

    /**
     * Handle the board "restored" event.
     *
     * @param  \App\Models\Board  $board
     * @return void
     */
    public function restored(Board $board)
    {
        //
    }

    /**
     * Handle the board "force deleted" event.
     *
     * @param  \App\Models\Board  $board
     * @return void
     */
    public function forceDeleted(Board $board)
    {
        //
    }
}
