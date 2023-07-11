<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

class UserImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.user_admin', function ($view) {
            $userImage=(isset(Auth::user()->passport))?Auth::user()->passport:'no.jpg';
            $view->with('userImage', $userImage);
        });
    }
}
