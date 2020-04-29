<?php


namespace App\Repositories\Common\Account;


use App\Entities\User;
use Illuminate\Support\Facades\Auth;

class AccountRepository implements AccountRepositoryInterface
{
    public function account(): ?User
    {
       return User::find(Auth::id());
    }

    public function getAdmin(): ?User
    {
        return User::where('role', User::ROLE_ADMIN)->first();
    }

    public function getActiveAdmin(int $id): ?User
    {
        return User::where('role', User::ROLE_ADMIN)
            ->where('id' , $id)
            ->first();
    }

}
