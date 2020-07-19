<?php

use App\Http\Livewire\UpdateTeamPhoto;
use App\Models\Team;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Spatie\MediaLibrary\MediaCollections\FileAdderFactory;

it('can upload photo', function () {
    Storage::fake();

    $team = factory(Team::class)->create();
    $team->addMember($team->owner, 'owner');

    $file = UploadedFile::fake()->image('avatar.png');

    $this
        ->mock(FileAdderFactory::class)
        ->shouldReceive('createFromDisk->toMediaCollection')
        ->once();

    Livewire::actingAs($team->owner)
        ->test(UpdateTeamPhoto::class)
        ->set('photo', $file);
});
