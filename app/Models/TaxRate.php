<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stripe\TaxRate as StripeRate;
use Sushi\Sushi;

class TaxRate extends Model
{
    use Sushi;

    public function getRows(): array
    {
        $rates = StripeRate::all(['limit' => 100])->data;

        return collect($rates)->transform(fn (StripeRate $rate) => [
            'stripe_id' => $rate->id,
            'country'   => $rate->jurisdiction,
        ])->toArray();
    }
}
