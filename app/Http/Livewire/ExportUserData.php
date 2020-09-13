<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Support\Facades\Event;
use Livewire\Component;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

class ExportUserData extends Component
{
    use InteractsWithUser;

    public function export(): void
    {
        Event::dispatch(new CreatePersonalDataExportJob($this->user));
    }
}
