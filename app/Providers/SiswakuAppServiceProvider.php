<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class SiswakuAppServiceProvider extends ServiceProvider
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
        $halaman = '';
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
        }
        if (Request::segment(1) == 'kelas') {
            $halaman = 'kelas';
        }
        if (Request::segment(1) == 'about') {
            $halaman = 'about';
        }
        view()-> share('halaman', $halaman);
    }
}
