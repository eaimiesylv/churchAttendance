<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\HelperClass\Imageupload;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Imageupload::class, function ($app,$imageUploadDetail) {
            //0 is field name, 1 is for the folder name,2 is for previous name
            //return new Imageupload($imageUploadDetail[0],$imageUploadDetail[1],$imageUploadDetail[2]);
           
            return (new imageupload())
            ->setFileInputField($imageUploadDetail[0])
            ->setFileFolder($imageUploadDetail[1])
            ->build();

        });
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
