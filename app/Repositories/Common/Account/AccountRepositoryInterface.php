<?php


namespace App\Repositories\Common\Account;

use App\Entities\User;

interface AccountRepositoryInterface
{
    public function account(): ?User;

    public function getUserById(int $id): ?User;

    public function getAdmin() :?User;

    public function getActiveAdmin(int $id): ?User;
}
