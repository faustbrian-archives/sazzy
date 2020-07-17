<?php

namespace App\Http\Livewire\Concerns;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

trait InteractsWithUser
{
    public function getUserProperty(): Authenticatable
    {
        return Auth::user();
    }

    public function getTeamsProperty(): Collection
    {
        return Auth::user()->teams;
    }
}
