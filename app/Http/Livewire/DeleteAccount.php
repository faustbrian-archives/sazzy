<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class DeleteAccount extends Component
{
    use InteractsWithUser;

    public function deleteAccount()
    {
        $this->user->delete();
    }
}
