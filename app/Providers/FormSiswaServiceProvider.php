<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kelas;
use App\Hobi;
use App\Wp;
use App\Pbk;
use App\Register;

class FormSiswaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('siswa.form', function($view) {
            $view->with('list_kelas', Kelas::lists('nama_kelas', 'id'));
            $view->with('list_hobi', Hobi::lists('nama_hobi', 'id'));
        });

        // memanggil list wp di dalam register form
        view()->composer('register.form', function($view) {
            $view->with('list_wp', Wp::lists('npwp', 'id'));
        });

        //memanggil list nomor_pem di tabel register u/ ditampilkan di pbk list
        view()->composer('pbk.form', function($view) {
            $view->with('register_list', Register::lists('nomor_pem', 'id'));
        });


        view()->composer('siswa.form_pencarian', function($view) {
            $view->with('list_kelas', Kelas::lists('nama_kelas', 'id'));
        });
    }

    public function register()
    {
        //
    }
}
