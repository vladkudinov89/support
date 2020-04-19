<?php

namespace App\Policies;

use App\Entities\User;
use App\Entities\Support;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SupportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Support  $support
     * @return \Illuminate\Auth\Access\Response
     */
    public function update(User $user, Support $support)
    {
        return  $user->id === (int)$support->user_id || $user->role === User::ROLE_ADMIN
            ? Response::allow()
            : Response::deny('You do not own this support.');
    }
}
