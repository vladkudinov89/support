<?php


namespace App\Actions\Common\Support\GetSingleSupport;


use App\Repositories\Support\SupportRepositoryInterface;

class GetSingleSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * GetSingleSupportAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(GetSingleSupportRequest $supportRequest): GetSingleSupportResponse
    {
        $singleSupport = $this->supportRepository->getSupportById($supportRequest->getSupportId());

        return new GetSingleSupportResponse($singleSupport);
    }
}
