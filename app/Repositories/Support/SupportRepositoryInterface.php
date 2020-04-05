<?php


namespace App\Repositories\Support;


use Illuminate\Database\Eloquent\Collection;

interface SupportRepositoryInterface
{
    public function findAll(): Collection;
}
