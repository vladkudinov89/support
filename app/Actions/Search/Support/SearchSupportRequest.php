<?php


namespace App\Actions\Search\Support;


class SearchSupportRequest
{
    /**
     * @var string
     */
    private $search;

    /**
     * SearchSupportRequest constructor.
     */
    public function __construct(string $search)
    {
        $this->search = $search;
    }

    /**
     * @return array
     */
    public function getSearch(): string
    {
        return $this->search;
    }

}
