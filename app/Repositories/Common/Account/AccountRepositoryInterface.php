<?php


namespace App\Repositories\Common\Account;

use App\Entities\User;

interface AccountRepositoryInterface
{
    public function account(): ?User;
}
