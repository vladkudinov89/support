<?php


namespace App\Repositories\Review;


use App\Entities\Review;
use Illuminate\Database\Eloquent\Collection;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function getAllReviewsToCurrentSupport(int $user_id, int $support_id): Collection
    {
        return Review::where(
            'support_id', $support_id)
            ->where(
                'user_id', $user_id)
            ->get();
    }

}
