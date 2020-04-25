<?php


namespace App\Actions\Review\DeleteReview;


use App\Repositories\Review\ReviewRepositoryInterface;

class DeleteReviewAction
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * DeleteReviewAction constructor.
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function execute(DeleteReviewRequest $request)
    {
        $this->reviewRepository->delete($request->getId());
    }
}
