<?php


namespace App\Actions\Review\AddReviewToCurrentSupport;


use App\Entities\Review;
use App\Mail\Review\Common\AddReviewMail;
use App\Repositories\Common\Account\AccountRepositoryInterface;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class AddReviewToCurrentSupportAction
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;
    /**
     * @var AccountRepositoryInterface
     */
    private $accountRepository;

    /**
     * AddReviewToCurrentSupportAction constructor.
     */
    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        AccountRepositoryInterface $accountRepository
    )
    {
        $this->reviewRepository = $reviewRepository;
        $this->accountRepository = $accountRepository;
    }

    public function execute(AddReviewToCurrentSupportRequest $request): AddReviewToCurrentSupportResponse
    {
        $newReview = new Review([
            'description' => $request->getDescription(),
            'support_id' => $request->getSupportId(),
            'user_id' => $request->getUserId()
        ]);

        Mail::to($this->sendToUser($newReview))
            ->send(new AddReviewMail($newReview));

        $review = $this->reviewRepository->save($newReview);

        return new AddReviewToCurrentSupportResponse($review);
    }

    private function sendToUser(Review $review): string
    {
        $client = $this->accountRepository->getUserById($review->user_id);
        $admin = $this->accountRepository->getActiveAdmin($review->support->admin_id_accept_exec);

        if ((int)$review->user_id === $client->id) {
            return $client->email;
        }

        if ($admin) {
            return $admin->email;
        } else {
            return $this->accountRepository->getAdmin()->email;
        }
    }
}
