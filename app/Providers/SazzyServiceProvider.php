<?php

namespace App\Providers;

use App\Sazzy;
use Illuminate\Support\ServiceProvider;

class SazzyServiceProvider extends ServiceProvider
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
        Sazzy::plan('Monthly', env('CASHIER_PLAN_MONTHLY'))
            ->monthly()
            ->price(10)
            ->features(['First', 'Second', 'Third']);

        Sazzy::plan('Yearly', env('CASHIER_PLAN_YEARLY'))
            ->yearly()
            ->price(100)
            ->discount(20)
            ->features(['First', 'Second', 'Third']);
    }
}
