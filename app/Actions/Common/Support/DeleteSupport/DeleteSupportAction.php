<?php


namespace App\Actions\Common\Support\DeleteSupport;


use App\Repositories\Support\SupportRepositoryInterface;

class DeleteSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * DeleteSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(DeleteSupportRequest $supportRequest)
    {
        $this->supportRepository->deleteById($supportRequest->getId());
    }
}
