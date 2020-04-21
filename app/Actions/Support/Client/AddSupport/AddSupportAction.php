<?php


namespace App\Actions\Support\Client\AddSupport;


use App\Entities\Support;
use App\Repositories\Support\SupportRepositoryInterface;

class AddSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * AddSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function excecute(AddSupportRequest $supportRequest): AddSupportResponse
    {
        $addSupport = new Support([
            'title' => $supportRequest->getTitle(),
            'message' => $supportRequest->getMessage(),
            'status_activities' => 'active',
            'status_view' => 'unviewed',
            'user_id' => $supportRequest->getUserId()
        ]);

        $support = $this->supportRepository->save($addSupport);

        return new AddSupportResponse($support);
    }
}
