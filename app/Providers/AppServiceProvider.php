<?php

namespace App\Providers;


use App\Repositories\Common\Account\AccountRepository;
use App\Repositories\Common\Account\AccountRepositoryInterface;
use App\Repositories\Common\Role\RoleRepository;
use App\Repositories\Common\Role\RoleRepositoryInterface;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Review\ReviewRepositoryInterface;
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
        $this->app->bind(AccountRepositoryInterface::class , AccountRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class , ReviewRepository::class);
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
