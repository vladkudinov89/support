<?php

namespace App\Mail\Review\Common;

use App\Entities\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Review
     */
    private $review;

    /**
     * Create a new message instance.
     *
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('email.review.common.addReview')
            ->with([
                'user_id' => $this->review->support->user_id,
                'support_id' => $this->review->support->id,
                'support_title' => $this->review->support->title,
                'is_admin' => (bool)$this->review->user->isAdmin()
            ]);
    }
}
