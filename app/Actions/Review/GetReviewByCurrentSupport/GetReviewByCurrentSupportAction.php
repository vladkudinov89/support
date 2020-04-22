<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


use App\Repositories\Review\ReviewRepositoryInterface;

class GetReviewByCurrentSupportAction
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * GetReviewByCurrentSupportAction constructor.
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function execute(GetReviewByCurrentSupportRequest $supportRequest): GetReviewByCurrentSupportResponse
    {
        $review = $this->reviewRepository->getAllReviewsToCurrentSupport(
            $supportRequest->getUserId(),
            $supportRequest->getSupportId()
        );

        return new GetReviewByCurrentSupportResponse($review);
    }
}
