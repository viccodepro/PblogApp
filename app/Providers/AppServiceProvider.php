<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
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
        // Enable app to use bootstrap without any conflicts(weird display)
        Paginator::useBootstrap();

        // log the sql queries to your application log files
        DB::listen(function ($query) {
            Log::info(
                $query->sql,
                ['bindings' => $query->bindings, 'time' => $query->time]
            );
        });    }
}
