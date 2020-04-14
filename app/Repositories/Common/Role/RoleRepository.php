<?php


namespace App\Repositories\Common\Role;


use App\Entities\User;
use Illuminate\Support\Facades\Auth;

class RoleRepository implements RoleRepositoryInterface
{
    public function get_role()
    {
        return User::find(Auth::id())->role;
    }
}
