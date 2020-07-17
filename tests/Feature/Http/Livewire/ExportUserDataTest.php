<?php

use App\Http\Livewire\ExportUserData;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

it('can export the user data', function () {
    Route::personalDataExports('personal-data-exports');

    Event::fake();

    Livewire::actingAs(factory(User::class)->create())
        ->test(ExportUserData::class)
        ->call('export');

    Event::assertDispatched(CreatePersonalDataExportJob::class);
});
