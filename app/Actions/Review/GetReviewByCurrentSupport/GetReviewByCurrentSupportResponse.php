<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


use Illuminate\Database\Eloquent\Collection;

class GetReviewByCurrentSupportResponse
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * GetReviewByCurrentSupportResponse constructor.
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
