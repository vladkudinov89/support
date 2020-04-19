<?php

namespace App\Providers;

use App\Entities\Support;
use App\Entities\User;
use App\Policies\SupportPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Support::class=> SupportPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('viewById', function ($user  ,$id) {
            return $user->id === $id || $user->role === User::ROLE_ADMIN
                ? Response::allow()
                : Response::deny('It is not your cabinet.');
        });
    }
}
