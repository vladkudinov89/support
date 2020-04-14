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

}
