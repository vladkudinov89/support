<?php


namespace App\Actions\Review\AddReviewToCurrentSupport;


use App\Entities\Review;

class AddReviewToCurrentSupportResponse
{
    /**
     * @var Review
     */
    private $review;

    /**
     * AddReviewToCurrentSupportResponse constructor.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function toArray(): array
    {
        return $this->review->toArray();
    }
}
