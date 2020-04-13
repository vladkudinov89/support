<?php


namespace App\Actions\Support\Admin\GetAllSupports;


use App\Repositories\Support\SupportRepositoryInterface;

class GetAllSupportsAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;

    /**
     * GetAllSupportsAction constructor.
     */
    public function __construct(SupportRepositoryInterface $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function execute(): GetAllSupportsResponse
    {
        $supports = $this->supportRepository->findAll();

        return new GetAllSupportsResponse($supports);
    }
}
