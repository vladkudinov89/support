<?php


namespace App\Actions\Search\Support;


use App\Repositories\Support\SupportRepositoryInterface;
use App\Services\SearchService;

class SearchSupportAction
{
    /**
     * @var SupportRepositoryInterface
     */
    private $supportRepository;
    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * SearchSupportAction constructor.
     * @param SupportRepositoryInterface $supportRepository
     * @param SearchService $searchService
     */
    public function __construct(
        SupportRepositoryInterface $supportRepository,
        SearchService $searchService
    )
    {
        $this->supportRepository = $supportRepository;
        $this->searchService = $searchService;
    }

    public function execute(SearchSupportRequest $searchSupportRequest): SearchSupportResponse
    {
        $ids = $this->searchService->search($searchSupportRequest->getSearch());

        $searchSupports = $this->supportRepository->getSearchSupports($ids);

        return new SearchSupportResponse($searchSupports);
    }
}
