<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * for change default pagination style to bootsrap
         */
        //Paginator::useBootstrap();


        /**
         * feature 'Gate' to prevent not authorize user use a funtion in apps
         */
        // Gate::define('admin', function(User $user){
        //     return $user->isAdmin;
        // });
    }
}
