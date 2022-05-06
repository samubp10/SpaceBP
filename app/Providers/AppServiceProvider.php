<?php

namespace App\Providers;

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
        function findLocale()
        {
            $prePath = "";
            //dd(url()->previous());
            $prePath = url()->previous();
            $prePath = explode("/", $prePath);
            $prePath = $prePath[5] ?? "en";

            //dd($prePath);
            if ($prePath) {
                return $prePath ?? 'en';
            }
        }
        config(['app.routeLocale' => findLocale()]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */



    public function boot()
    {
    }
}
