<?php


namespace App\Actions\Common\Support\CloseSupport;


use App\Entities\Support;
use App\Repositories\Support\SupportRepositoryInterface;

class CloseSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * CloseSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(CloseSupportRequest $supportRequest): CloseSupportResponse
    {
        $updateSupport = $this->supportRepository->getSupportById($supportRequest->getId());

        $updateSupport->status_activities = Support::STATUS_CLOSED;

        $support = $this->supportRepository->save($updateSupport);

        return new CloseSupportResponse($support);
    }
}
