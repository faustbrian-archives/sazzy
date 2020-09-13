<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use Livewire\Component;

class CustomerPortal extends Component
{
    use InteractsWithTeam;

    public function render()
    {
        return view('livewire.customer-portal', [
            'isSubscribed' => $this->team->subscribed(),
        ]);
    }
}
