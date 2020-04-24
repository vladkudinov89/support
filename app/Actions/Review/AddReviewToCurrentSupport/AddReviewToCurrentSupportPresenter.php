<?php


namespace App\Actions\Review\AddReviewToCurrentSupport;


use App\Entities\Review;

class AddReviewToCurrentSupportPresenter
{
    public static function presenter(Review $review): array
    {
        return [
            'id' => $review->id,
            'description' => $review->description,
            'created_at' => $review->created_at,
            'user_role' => $review->user->role
        ];
    }
}
