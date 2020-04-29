<?php


namespace App\Actions\Common\Support\CloseSupport;


use App\Entities\Support;
use App\Mail\Support\Client\CloseSupportMail;
use App\Repositories\Common\Account\AccountRepositoryInterface;
use App\Repositories\Support\SupportRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class CloseSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;
    /**
     * @var AccountRepositoryInterface
     */
    private $accountRepository;

    /**
     * CloseSupportAction constructor.
     */
    public function __construct(
        SupportRepositoryInterface $supportRepository,
        AccountRepositoryInterface $accountRepository
    )
    {
        $this->supportRepository = $supportRepository;
        $this->accountRepository = $accountRepository;
    }

    public function execute(CloseSupportRequest $supportRequest): CloseSupportResponse
    {
        $updateSupport = $this->supportRepository->getSupportById($supportRequest->getId());

        $updateSupport->status_activities = Support::STATUS_CLOSED;

        $currentAdmin = $this->accountRepository->getActiveAdmin($updateSupport->admin_id_accept_exec);

        Mail::to($currentAdmin->email ?? $this->accountRepository->getAdmin()->email)
            ->send(new CloseSupportMail(
                $updateSupport
            ));

        $support = $this->supportRepository->save($updateSupport);

        return new CloseSupportResponse($support);
    }
}
