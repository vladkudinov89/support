<?php


namespace App\Actions\Support\Admin\ViewSupport;


use App\Entities\Support;
use App\Entities\User;
use App\Repositories\Support\SupportRepositoryInterface;

class ViewSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * ViewSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(ViewSupportRequest $supportRequest): ViewSupportResponse
    {
        $updateSupport = $this->supportRepository->getSupportById($supportRequest->getId());

        $updateSupport->status_view = Support::STATUS_VIEWED;

        $updateSupport->admin_id_accept_exec = User::getAdmin()->id;

        $support = $this->supportRepository->save($updateSupport);

        return new ViewSupportResponse($support);
    }
}
