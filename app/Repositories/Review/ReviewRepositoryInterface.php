<?php


namespace App\Repositories\Review;


use Illuminate\Database\Eloquent\Collection;

interface ReviewRepositoryInterface
{
    public function getAllReviewsToCurrentSupport(int $user_id , int $support_id): Collection;
}
