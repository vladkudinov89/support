<?php


namespace App\Actions\Review\AddReviewToCurrentSupport;


use App\Entities\Review;
use App\Repositories\Review\ReviewRepositoryInterface;

class AddReviewToCurrentSupportAction
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * AddReviewToCurrentSupportAction constructor.
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function execute(AddReviewToCurrentSupportRequest $request): AddReviewToCurrentSupportResponse
    {
        $newReview = new Review([
            'description' => $request->getDescription(),
            'support_id' => $request->getSupportId(),
            'user_id' => $request->getUserId()
        ]);

        $review = $this->reviewRepository->save($newReview);

        return new AddReviewToCurrentSupportResponse($review);
    }
}
