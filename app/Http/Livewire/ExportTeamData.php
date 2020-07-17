<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Support\Facades\Event;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

class ExportTeamData extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public function export(): void
    {
        Event::dispatch(new CreatePersonalDataExportJob($this->team));
    }
}
