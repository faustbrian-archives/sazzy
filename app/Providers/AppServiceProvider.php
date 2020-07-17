<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Spatie\Flash\Flash;
use Stripe\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Stripe::setApiKey(config('cashier.secret'));

        Cashier::ignoreMigrations();

        Flash::levels([
            'info'    => 'blue',
            'success' => 'green',
            'warning' => 'orange',
            'danger'  => 'red',
            'error'   => 'red',
            'hint'    => 'gray',
        ]);
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
