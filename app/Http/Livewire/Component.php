<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\CanFlashMessage;
use App\Http\Livewire\Concerns\CanToastMessage;
use Livewire\Component as Livewire;

abstract class Component extends Livewire
{
    use CanFlashMessage;
    use CanToastMessage;
}
