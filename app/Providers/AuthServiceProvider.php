<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('administrador', function ($user) {

            if ($user->rolNombre['rol'] == 'Admin'){
                return true;
            }
 
            return false;
 
        });

        Gate::define('operador', function ($user) {

            if ($user->rolNombre['rol'] == 'Operador'){
                return true;
            }
 
            return false;
 
        });

        Gate::define('usuario', function ($user) {

            if ($user->rolNombre['rol'] == 'User'){
                return true;
            }
 
            return false;
 
        });
    }
}
