<?php

namespace App\Events\Review;

use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportPresenter;
use App\Entities\Review;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewAddEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Review
     */
    private $review;

    /**
     * Create a new event instance.
     *
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function broadcastAs(): string
    {
        return 'review.added';
    }

    public function broadcastWith(): array
    {
        return  AddReviewToCurrentSupportPresenter::presenter($this->review);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('reviews');
    }

    public function getReview(): Review
    {
        return $this->review;
    }
}
