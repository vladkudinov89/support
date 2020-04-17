<?php


namespace App\Actions\Common\Support\UpdateSupport;


use App\Repositories\Support\SupportRepositoryInterface;

class UpdateSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * UpdateSupportAction constructor.
     */
    public function __construct(
        SupportRepositoryInterface $supportRepository
    )
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(UpdateSupportRequest $supportRequest): UpdateSupportResponse
    {
        $updateSupport = $this->supportRepository->getSupportById($supportRequest->getId());

        $updateSupport->title = $supportRequest->getTitle();
        $updateSupport->message = $supportRequest->getMessage();
        $updateSupport->status_activities = $supportRequest->getStatusActive();
        $updateSupport->status_view = $supportRequest->getStatusView();

        $support = $this->supportRepository->save($updateSupport);

        return new UpdateSupportResponse($support);
    }
}
