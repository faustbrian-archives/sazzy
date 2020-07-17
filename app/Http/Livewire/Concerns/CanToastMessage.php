<?php

namespace App\Http\Livewire\Concerns;

trait CanToastMessage
{
    public function toast(string $message, string $type = 'success'): void
    {
        $this->emit('toastMessage', [$message, $type]);
    }
}
