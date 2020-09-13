<?php

namespace App\Actions;

use App\Country;
use App\Models\TaxRate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Stripe\Checkout\Session;
use Stripe\Exception\InvalidRequestException;

class CreateCheckoutSession
{
    private \Illuminate\Database\Eloquent\Model $model;

    private string $planId;

    private string $vatId;

    private string $coupon;

    private string $trialDays;

    private string $successUrl;

    private string $cancelUrl;

    private function __construct(Model $model)
    {
        $this->model = $model;
    }

    public static function new(Model $model): self
    {
        return new static($model);
    }

    public function planId(string $planId): self
    {
        $this->planId = $planId;

        return $this;
    }

    public function vatId(string $vatId): self
    {
        $this->vatId = $vatId;

        return $this;
    }

    public function coupon(string $coupon): self
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function trialDays(string $trialDays): self
    {
        $this->trialDays = $trialDays;

        return $this;
    }

    public function successUrl(string $successUrl): self
    {
        $this->successUrl = $successUrl;

        return $this;
    }

    public function cancelUrl(string $cancelUrl): self
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    public function execute(): string
    {
        try {
            return with(Session::create([
                'payment_method_types'  => ['card'],
                'metadata'              => [
                    'vat_id'        => $this->vatId,
                    'taxrate'       => $taxRate = Country::isEuropean() ? TaxRate::whereCountry(Country::locate())->firstOrFail()->stripe_id : null,
                ],
                // 'customer_email'     => $this->model->email,
                'customer'              => $this->model->stripe_id,
                'subscription_data'     => [
                    'items'             => [['plan' => $this->planId]],
                    'coupon'            => $this->coupon,
                    'trial_period_days' => $this->trialDays,
                    'default_tax_rates' => $taxRate && is_null($this->vatId) ? [$taxRate] : [],
                ],
                'mode'                  => 'subscription',
                'client_reference_id'   => $this->model->id,
                'success_url'           => $this->successUrl,
                'cancel_url'            => URL::previous($this->cancelUrl),
            ]), fn ($session) => $session->id);
        } catch (InvalidRequestException $e) {
            throw_unless($e->getStripeParam() === 'subscription_data[coupon]', $e);

            ValidationException::withMessages(['coupon' => 'The specified coupon does not exist.']);
        }
    }
}
