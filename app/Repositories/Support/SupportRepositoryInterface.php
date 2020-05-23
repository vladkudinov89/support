<?php


namespace App\Repositories\Support;


use App\Entities\Support;
use Illuminate\Database\Eloquent\Collection;

interface SupportRepositoryInterface
{
    public function findAll(): Collection;

    public function findAllCurrentUserSupports(int $id): Collection;

    public function getSupportById(int $id): ?Support;

    public function getSearchSupports(array $ids): Collection;

    public function save(Support $support): Support;

    public function deleteById(int $id): void;
}
