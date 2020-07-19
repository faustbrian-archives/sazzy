<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUserPhoto extends Component
{
    use InteractsWithUser;
    use WithFileUploads;

    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => ['required', 'image', 'max:1024'],
        ]);

        $file = $this->photo->storePubliclyAs('uploads', $this->photo->hashName());

        $this->user->addMediaFromDisk($file)->toMediaCollection('photo');
    }
}
