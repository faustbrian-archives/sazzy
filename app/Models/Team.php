<?php

namespace App\Models;

use App\Events\DeletingTeam;
use App\Events\TeamCreated;
use App\Events\TeamDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Cashier\Billable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\PersonalDataExport\ExportsPersonalData;
use Spatie\PersonalDataExport\PersonalDataSelection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Team extends Model implements ExportsPersonalData, HasMedia
{
    use Billable;
    use Concerns\ExportsPersonalData;
    use Concerns\HasPhoto;
    use Concerns\HasTeamInvitations;
    use Concerns\HasTeamMembers;
    use HasSlug;

    protected $fillable = ['user_id', 'name', 'slug', 'photo'];

    protected $casts = ['user_id' => 'integer'];

    protected $dispatchesEvents = [
        'created'  => TeamCreated::class,
        'deleted'  => TeamDeleted::class,
        'deleting' => DeletingTeam::class,
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purge(): void
    {
        $this
            ->members()
            ->where('current_team_id', $this->id)
            ->update(['current_team_id' => null]);

        $this->members()->detach();

        $this->delete();
    }

    public function getEmailAttribute(): string
    {
        return $this->owner->email;
    }

    public static function findByslug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function selectPersonalData(PersonalDataSelection $personalData): void
    {
        $personalData->add('user.json', ['name' => $this->name, 'email' => $this->email]);
    }
}
