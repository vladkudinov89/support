<?php


namespace App\Http\Controllers\Api\Review;


use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportAction;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportRequest;
use App\Http\Controllers\Api\ApiController;

class ReviewController  extends ApiController
{
    /**
     * @var GetReviewByCurrentSupportAction
     */
    private $reviewByCurrentSupportAction;

    /**
     * ReviewController constructor.
     */
    public function __construct(
        GetReviewByCurrentSupportAction $reviewByCurrentSupportAction
    )
    {
        $this->reviewByCurrentSupportAction = $reviewByCurrentSupportAction;
    }

    public function getCurrentReviewBySupport(int $user_id , int $support_id)
    {
        $reviews = $this->reviewByCurrentSupportAction->execute(
            new GetReviewByCurrentSupportRequest(
                $user_id,
                $support_id
            )
        )->toArray();

        return $this->successResponse($reviews , 201);
    }
}
