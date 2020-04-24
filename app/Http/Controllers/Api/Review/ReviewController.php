<?php


namespace App\Http\Controllers\Api\Review;


use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportAction;
use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportRequest;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportAction;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportPresenter;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Review\ValidateAddReviewToSupportRequest;

class ReviewController extends ApiController
{
    /**
     * @var GetReviewByCurrentSupportAction
     */
    private $reviewByCurrentSupportAction;
    /**
     * @var AddReviewToCurrentSupportAction
     */
    private $addReviewToCurrentSupportAction;

    /**
     * ReviewController constructor.
     */
    public function __construct(
        GetReviewByCurrentSupportAction $reviewByCurrentSupportAction,
        AddReviewToCurrentSupportAction $addReviewToCurrentSupportAction
    )
    {
        $this->reviewByCurrentSupportAction = $reviewByCurrentSupportAction;
        $this->addReviewToCurrentSupportAction = $addReviewToCurrentSupportAction;
    }

    public function getCurrentReviewBySupport(int $support_id)
    {
        $reviews = $this->reviewByCurrentSupportAction->execute(
            new GetReviewByCurrentSupportRequest(
                $support_id
            )
        );

        return $this->successResponse(
            GetReviewByCurrentSupportPresenter::present($reviews->getCollection()),
            201
        );
    }

    public function addReviewToCurrentSupport(ValidateAddReviewToSupportRequest $request)
    {
        $newReview = $this->addReviewToCurrentSupportAction->execute(
            new AddReviewToCurrentSupportRequest(
                $request->user_id,
                $request->support_id,
                $request->description
            )
        );

        return $this->successResponse($newReview->toArray(), 201);
    }
}
