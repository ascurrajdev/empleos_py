<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\{UserRepository, UserRepositoryImp};
use App\Repositories\AuthProviders\{AuthProviderRepository, AuthProviderRepositoryImp};
use App\Repositories\AuthProviderUsers\{AuthProviderUserRepository, AuthProviderUserRepositoryImp};

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class,UserRepositoryImp::class);
        $this->app->bind(AuthProviderUserRepository::class, AuthProviderUserRepositoryImp::class);
        $this->app->bind(AuthProviderRepository::class,AuthProviderRepositoryImp::class);
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
