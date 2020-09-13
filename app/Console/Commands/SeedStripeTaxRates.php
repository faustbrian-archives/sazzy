<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedStripeTaxRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:taxes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rates = \json_decode(\file_get_contents(resource_path('data/vat-rates.json')), true);

        collect($rates['items'])
            ->map(fn ($rate) => $rate[0]['rates']['standard'])
            ->each(function ($percentage, $country) {
                \Stripe\TaxRate::create([
                    'display_name' => 'VAT',
                    'percentage'   => $percentage,
                    'inclusive'    => false,
                    'jurisdiction' => $country,
                    'description'  => 'VAT for '.locale_get_display_region('-'.$country, 'en'),
                ]);
            });
    }
}
