<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\{UserRepository, UserRepositoryImp};
use App\Repositories\AuthProviders\{AuthProviderRepository, AuthProviderRepositoryImp};
use App\Repositories\AuthProviderUsers\{AuthProviderUserRepository, AuthProviderUserRepositoryImp};
use App\Repositories\Posts\{PostsRepository,PostsRepositoryImp};
use App\Repositories\CategoriaPost\{CategoriaPostRepository,CategoriaPostRepositoryImp};
use App\Repositories\BeneficiosPost\{BeneficioPostRepository,BeneficioPostRepositoryImp};
use App\Repositories\RequisitosPost\{RequisitosPostRepository,RequisitosPostRepositoryImp};
use App\Repositories\Postulaciones\{PostulacionesRepository,PostulacionesRepositoryImp};
class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            UserRepositoryImp::class
        );
        $this->app->bind(
            AuthProviderUserRepository::class,
            AuthProviderUserRepositoryImp::class
        );
        $this->app->bind(
            AuthProviderRepository::class,
            AuthProviderRepositoryImp::class
        );
        $this->app->bind(
            PostsRepository::class,
            PostsRepositoryImp::class
        );
        $this->app->bind(
            CategoriaPostRepository::class,
            CategoriaPostRepositoryImp::class
        );
        $this->app->bind(
            BeneficioPostRepository::class,
            BeneficioPostRepositoryImp::class
        );
        $this->app->bind(
            RequisitosPostRepository::class,
            RequisitosPostRepositoryImp::class
        );
        $this->app->bind(
            PostulacionesRepository::class,
            PostulacionesRepositoryImp::class
        );
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
