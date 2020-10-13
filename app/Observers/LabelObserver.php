<?php

namespace App\Observers;

use App\Models\Label;

class LabelObserver
{
    /**
     * Handle the label "creating" event.
     *
     * @param  \App\Models\Label  $label
     * @return void
     */
    public function creating(Label $label)
    {
        $label->created_by = auth()->id();
    }

    /**
     * Handle the label "updated" event.
     *
     * @param  \App\Models\Label  $label
     * @return void
     */
    public function updated(Label $label)
    {
        //
    }

    /**
     * Handle the label "deleted" event.
     *
     * @param  \App\Models\Label  $label
     * @return void
     */
    public function deleted(Label $label)
    {
        //
    }

    /**
     * Handle the label "restored" event.
     *
     * @param  \App\Models\Label  $label
     * @return void
     */
    public function restored(Label $label)
    {
        //
    }

    /**
     * Handle the label "force deleted" event.
     *
     * @param  \App\Models\Label  $label
     * @return void
     */
    public function forceDeleted(Label $label)
    {
        //
    }
}
