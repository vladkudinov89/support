<?php


namespace App\Actions\Support\GetAllSupports\Client;


use App\Repositories\Support\SupportRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
        $supports = $this->supportRepository->findAllCurrentUserSupports(Auth::id());

        return new GetAllSupportsResponse($supports);
    }
}
