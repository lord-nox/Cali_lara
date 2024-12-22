<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Gate to manage users (already exists)
        Gate::define('manage-users', function ($user) {
            return $user->is_admin;
        });

        // Gate for admin panel access
        Gate::define('admin-access', function ($user) {
            return $user->is_admin; // Ensure it checks the `is_admin` column
        });
    }
}
