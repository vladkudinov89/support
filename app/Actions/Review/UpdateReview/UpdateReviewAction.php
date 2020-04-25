<?php


namespace App\Actions\Review\UpdateReview;


use App\Repositories\Review\ReviewRepositoryInterface;

class UpdateReviewAction
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * UpdateReviewAction constructor.
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function execute(UpdateReviewRequest $request): UpdateReviewResponse
    {
        $updateReview = $this->reviewRepository->getReviewById($request->getId());

        $updateReview->description = $request->getDescription();

        $review = $this->reviewRepository->save($updateReview);

        return new UpdateReviewResponse($review);
    }
}
