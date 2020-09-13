<?php

use App\Http\Livewire\ExportTeamData;
use App\Models\Team;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

it('can export the team data', function () {
    Route::personalDataExports('personal-data-exports');

    Event::fake();

    $team = factory(Team::class)->create();
    $team->addMember($team->owner, 'owner');

    Livewire::actingAs($team->owner)
        ->test(ExportTeamData::class)
        ->call('export');

    Event::assertDispatched(CreatePersonalDataExportJob::class);
});
