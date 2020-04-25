<?php


namespace App\Repositories\Review;


use App\Entities\Review;
use Illuminate\Database\Eloquent\Collection;

interface ReviewRepositoryInterface
{
    public function getAllReviewsToCurrentSupport(int $support_id): Collection;

    public function save(Review $review): Review;

    public function getReviewById(int $id): ?Review;

    public function delete(int $id): void;
}
