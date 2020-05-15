<?php

namespace App\Listeners\Review;

use App\Events\Review\ReviewAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddEventListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ReviewAddEvent $event)
    {
        $review = $event->getReview();
    }
}
