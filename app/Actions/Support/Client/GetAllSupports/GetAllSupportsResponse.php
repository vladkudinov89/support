<?php


namespace App\Actions\Support\GetAllSupports\Client;


use Illuminate\Database\Eloquent\Collection;

class GetAllSupportsResponse
{
    private $supportCollection;

    /**
     * GetAllSupportsResponse constructor.
     * @param Collection $supportCollection
     */
    public function __construct(Collection $supportCollection)
    {
        $this->supportCollection = $supportCollection;
    }

    /**
     * @return mixed
     */
    public function getSupportCollection()
    {
        return $this->supportCollection;
    }

    public function toArray(): array
    {
        return $this->supportCollection->toArray();
    }
}
