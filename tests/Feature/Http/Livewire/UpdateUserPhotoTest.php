<?php

use App\Http\Livewire\UpdateUserPhoto;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Spatie\MediaLibrary\MediaCollections\FileAdderFactory;

it('can upload photo', function () {
    Storage::fake();

    $user = factory(User::class)->create();
    $file = UploadedFile::fake()->image('avatar.png');

    $this
        ->mock(FileAdderFactory::class)
        ->shouldReceive('createFromDisk->toMediaCollection')
        ->once();

    Livewire::actingAs($user)
        ->test(UpdateUserPhoto::class)
        ->set('photo', $file);
});
