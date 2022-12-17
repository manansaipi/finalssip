<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('employee', function (User $user) {
            return $user->position->name == "Employee";
        });
        Gate::define('is_notEmployee', function (User $user) {
            return $user->position->name !== "Employee";
        });
    }
}
