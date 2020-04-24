<?php


namespace App\Repositories\Review;


use Illuminate\Database\Eloquent\Collection;

interface ReviewRepositoryInterface
{
    public function getAllReviewsToCurrentSupport(int $support_id): Collection;
}
