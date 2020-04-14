<?php


namespace App\Actions\Common\Account;


use App\Entities\User;
use Illuminate\Database\Eloquent\Collection;

class GetAccountResponse
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * GetAccountResponse constructor.
     */
    public function __construct(User $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
