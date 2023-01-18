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
     * @var array<class-string, class-string>
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

        Gate::define('is-supervisor', function(User $user) {
            return $user->role == 'Supervisor';
        });

        Gate::define('is-admin', function(User $user) {
            return $user->role == 'Admin';
        });

        Gate::define('is-vendor', function(User $user) {
            return $user->role == 'Vendor';
        });
    }
}
