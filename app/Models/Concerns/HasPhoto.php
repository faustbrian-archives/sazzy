<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

trait HasPhoto
{
    use InteractsWithMedia;

    public function getPhotoAttribute(): string
    {
        return $this->getFirstMediaUrl('photo');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('photo')
            ->useFallbackUrl('https://www.gravatar.com/avatar/'.md5(Str::lower($this->name)).'.jpg?s=200&d=mm')
            ->useFallbackPath(public_path('/media/models/fallback/'.strtolower(class_basename($this)).'.jpeg'))
            ->singleFile();
    }
}
