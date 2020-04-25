<?php


namespace App\Actions\Review\UpdateReview;


use App\Entities\Review;

class UpdateReviewPresenter
{
    public static function presenter(Review $review): array
    {
        return [
            'id' => $review->id,
            'description' => $review->description,
            'created_at' => $review->created_at,
            'user_role' => $review->user->role,
            'user_name' => $review->user->name
        ];
    }
}
