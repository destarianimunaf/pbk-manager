<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';

        if (Request::segment(1) == 'login') {
          $halaman = 'login';
        }

        if (Request::segment(1) == 'about') {
          $halaman = 'about';
        }

        if (Request::segment(1) == 'hobi') {
          $halaman = 'hobi';
        }

        if (Request::segment(1) == 'user') {
          $halaman = 'user';
        }

        if (Request::segment(1) == 'register') {
          $halaman = 'register';
        }

        if (Request::segment(1) == 'wp') {
          $halaman = 'wp';
        }

        if (Request::segment(1) == 'pbk') {
          $halaman = 'pbk';
        }

        if(Request::segment(1) == 'mailbox'){
          $halaman = 'mailbox';
        }

        if(Request::segment(1) == 'pages'){
          $halaman = 'pages';
        }


        view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
