<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateTeamPhoto extends Component
{
    use InteractsWithTeam;
    use WithFileUploads;

    public $photo;

    protected $listeners = ['save'];

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => ['required', 'image', 'max:1024'],
        ]);

        $file = $this->photo->storePubliclyAs('uploads', $this->photo->hashName());

        $this->team->addMediaFromDisk($file)->toMediaCollection('photo');
    }
}
