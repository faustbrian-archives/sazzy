<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Toast extends Component
{
    public array $toasts = [];

    protected $listeners = ['toastMessage'];

    public function toastMessage(array $message): void
    {
        $this->toasts[(string) Uuid::uuid4()] = [
            'type'    => $message[1],
            'message' => $message[0],
        ];
    }

    public function dismissToast(string $id): void
    {
        unset($this->toasts[$id]);
    }
}
