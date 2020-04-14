<?php

namespace App\Providers;


use App\Repositories\Common\Role\RoleRepository;
use App\Repositories\Common\Role\RoleRepositoryInterface;
use App\Repositories\Support\SupportRepository;
use App\Repositories\Support\SupportRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SupportRepositoryInterface::class , SupportRepository::class);
        $this->app->bind(RoleRepositoryInterface::class , RoleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
