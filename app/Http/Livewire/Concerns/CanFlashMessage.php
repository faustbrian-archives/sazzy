<?php

namespace App\Http\Livewire\Concerns;

trait CanFlashMessage
{
    public function flash(string $message, string $type = 'success'): void
    {
        $this->emit('flashMessage', [$message, $type]);
    }
}
