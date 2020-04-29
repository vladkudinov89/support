<?php


namespace App\Actions\Support\Admin\ViewSupport;


use App\Entities\Support;
use App\Repositories\Common\Account\AccountRepositoryInterface;
use App\Repositories\Support\SupportRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ViewSupportAction
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
     * ViewSupportAction constructor.
     */
    public function __construct(
        SupportRepositoryInterface $supportRepository,
        AccountRepositoryInterface $accountRepository
)
    {
        $this->supportRepository = $supportRepository;
        $this->accountRepository = $accountRepository;
    }

    public function execute(ViewSupportRequest $supportRequest): ViewSupportResponse
    {
        $updateSupport = $this->supportRepository->getSupportById($supportRequest->getId());

        $updateSupport->status_view = Support::STATUS_VIEWED;

        $updateSupport->admin_id_accept_exec = $this->accountRepository->getActiveAdmin(Auth::id())->id;

        $support = $this->supportRepository->save($updateSupport);

        return new ViewSupportResponse($support);
    }
}
