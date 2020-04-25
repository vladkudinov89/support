<?php


namespace App\Actions\Review\UpdateReview;


use App\Entities\Review;

class UpdateReviewResponse
{
    /**
     * @var Review
     */
    private $review;

    /**
     * UpdateReviewResponse constructor.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * @return Review
     */
    public function getReview(): Review
    {
        return $this->review;
    }
}
