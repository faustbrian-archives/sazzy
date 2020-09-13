<?php

namespace App\Http\Livewire;

use App\Actions\CreateCheckoutSession;
use App\Country;
use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Sazzy;
use Livewire\Component;

class Subscribe extends Component
{
    use InteractsWithTeam;

    public string $plan = 'yearly';

    public $vatId;

    public $coupon;

    public bool $isEuropean = false;

    public function mount(): void
    {
        $this->isEuropean  = Country::isEuropean();
    }

    public function subscribe()
    {
        $session = CreateCheckoutSession::new($this->team)
            ->planId($this->getPlan($this->plan)->id)
            ->trialDays(7)
            ->successUrl(route('team'))
            ->cancelUrl(route('team'));

        if ($this->vatId) {
            $session->vatId($this->vatId);
        }

        if ($this->coupon) {
            $session->coupon($this->coupon);
        }

        $this->emitSelf('checkoutSessionCreated', $session->execute());
    }

    public function getPlan(string $interval)
    {
        return Sazzy::allPlans()->firstWhere('interval', $interval);
    }
}
