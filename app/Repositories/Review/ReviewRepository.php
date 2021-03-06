<?php


namespace App\Repositories\Review;


use App\Entities\Review;
use Illuminate\Database\Eloquent\Collection;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function getAllReviewsToCurrentSupport(int $support_id): Collection
    {
        return Review::where(
            'support_id', $support_id)
            ->get();
    }

    public function save(Review $review): Review
    {
        $review->save();

        return $review;
    }

    public function getReviewById(int $id): ?Review
    {
        return Review::find($id);
    }

    public function delete(int $id): void
    {
        Review::destroy($id);
    }


}
