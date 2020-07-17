<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TransferTeam extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public $email;

    public $name;

    public function transfer()
    {
        $this->validate([
            'email' => ['required', Rule::exists('users')],
            'name'  => ['required', Rule::in([$this->team->name])],
        ]);

        $newOwner = User::where('email', $this->email)->firstOrFail();

        $this->team->removeMember($this->user);

        $this->team->forceFill(['user_id' => $newOwner->id])->save();

        $this->team->addMember($newOwner);
    }
}
