<?php

namespace App\Observers;

use App\ContestSelection;
use App\Rider;

class ContestSelectionObserver
{
    /**
     * Handle the contest selection "creating" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function creating(ContestSelection $contestSelection)
    {
        $rider = Rider::find($contestSelection->rider_id);
        $contestSelection->rider_number = $rider->number;
        $contestSelection->race_class = $rider->race_class_id;
        $contestSelection->value = $rider->value;
    }

    /**
     * Handle the contest selection "created" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function created(ContestSelection $contestSelection)
    {
        
    }

    /**
     * Handle the contest selection "updated" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function updated(ContestSelection $contestSelection)
    {
        //
    }

    /**
     * Handle the contest selection "deleted" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function deleted(ContestSelection $contestSelection)
    {
        //
    }

    /**
     * Handle the contest selection "restored" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function restored(ContestSelection $contestSelection)
    {
        //
    }

    /**
     * Handle the contest selection "force deleted" event.
     *
     * @param  \App\ContestSelection  $contestSelection
     * @return void
     */
    public function forceDeleted(ContestSelection $contestSelection)
    {
        //
    }
}
