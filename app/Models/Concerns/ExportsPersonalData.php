<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

trait ExportsPersonalData
{
    public function personalDataExportName(): string
    {
        $name = Str::slug($this->name);

        return "personal-data-{$name}.zip";
    }

    public function exportPersonalData(): void
    {
        dispatch(new CreatePersonalDataExportJob($this));
    }
}
