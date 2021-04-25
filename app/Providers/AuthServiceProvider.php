<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('cuenta-invitada',function($user = null){
            return empty($user);
        });

        Gate::define('cuenta-disponible',function($user = null){
            return !empty($user);
        });
        Gate::define('cuenta-settings',function(User $user){
            return $user->role_id == 1;
        });

        Gate::define('cuenta-postulaciones',function(User $user){
            return $user->postulaciones()->count() > 0;
        });

        Gate::define('cuenta-publicaciones',function(User $user){
            return $user->publicaciones()->count() > 0;
        });
    }
}
