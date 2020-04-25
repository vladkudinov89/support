<?php


namespace App\Http\Controllers\Api\Review;


use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportAction;
use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportPresenter;
use App\Actions\Review\AddReviewToCurrentSupport\AddReviewToCurrentSupportRequest;
use App\Actions\Review\DeleteReview\DeleteReviewAction;
use App\Actions\Review\DeleteReview\DeleteReviewRequest;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportAction;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportPresenter;
use App\Actions\Review\GetReviewByCurrentSupport\GetReviewByCurrentSupportRequest;
use App\Actions\Review\UpdateReview\UpdateReviewAction;
use App\Actions\Review\UpdateReview\UpdateReviewPresenter;
use App\Actions\Review\UpdateReview\UpdateReviewRequest;
use App\Entities\Review;
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
     * @var UpdateReviewAction
     */
    private $updateReviewAction;
    /**
     * @var DeleteReviewAction
     */
    private $deleteReviewAction;

    /**
     * ReviewController constructor.
     */
    public function __construct(
        GetReviewByCurrentSupportAction $reviewByCurrentSupportAction,
        AddReviewToCurrentSupportAction $addReviewToCurrentSupportAction,
        UpdateReviewAction $updateReviewAction,
        DeleteReviewAction $deleteReviewAction
    )
    {
        $this->reviewByCurrentSupportAction = $reviewByCurrentSupportAction;
        $this->addReviewToCurrentSupportAction = $addReviewToCurrentSupportAction;
        $this->updateReviewAction = $updateReviewAction;
        $this->deleteReviewAction = $deleteReviewAction;
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

        return $this->successResponse(
            AddReviewToCurrentSupportPresenter::presenter($newReview->getReview()),
            201);
    }

    public function updateReview(ValidateAddReviewToSupportRequest $request, Review $review)
    {
        $updateReview = $this->updateReviewAction->execute(new UpdateReviewRequest(
            $review->id,
            $request->description
        ));

        return $this->successResponse(
            UpdateReviewPresenter::presenter($updateReview->getReview()),
            201);
    }

    public function deleteReview(int $id)
    {
        $this->deleteReviewAction->execute(new DeleteReviewRequest($id));

        return $this->successResponse([], 201);
    }
}
