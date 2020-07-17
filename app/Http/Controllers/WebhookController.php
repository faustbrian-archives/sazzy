<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebhookController extends CashierController
{
    public function handleCheckoutSessionCompleted(array $payload)
    {
        $session = $payload['data']['object'];
        $team    = Team::findOrFail($session['client_reference_id']);

        DB::transaction(function () use ($session, $team) {
            $team->update(['stripe_id' => $session['customer']]);

            $team->subscriptions()->create([
                'name'          => 'default',
                'stripe_id'     => $session['subscription'],
                'stripe_status' => 'trialing',
                'stripe_plan'   => Arr::get($session, 'display_items.0.plan.id'),
                'quantity'      => 1,
                'trial_ends_at' => now()->addDays(config('stripe-billing.trial_days')),
                'ends_at'       => null,
            ]);
        });

        if (! is_null($vatId = Arr::get($session, 'metadata.vat_id'))) {
            \Stripe\Customer::createTaxId(
                $session['customer'],
                [['type' => 'eu_vat', 'value' => $vatId]]
            );

            \Stripe\Customer::update(
                $session['customer'],
                ['tax_exempt' => 'reverse']
            );

            \Stripe\Subscription::update(
                $session['subscription'],
                ['default_tax_rates' => [Arr::get($session, 'metadata.taxrate')]]
            );
        }

        return $this->successMethod();
    }
}
