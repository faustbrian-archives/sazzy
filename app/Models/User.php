<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mattiasgeniar\Percentage\Percentage;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\PersonalDataExport\ExportsPersonalData;
use Spatie\PersonalDataExport\PersonalDataSelection;

class User extends Authenticatable implements ExportsPersonalData, HasMedia, MustVerifyEmail
{
    use CausesActivity;
    use Concerns\ExportsPersonalData;
    use Concerns\HasPhoto;
    use Concerns\HasTeams;
    use HasApiTokens;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referrals()
    {
        return $this->hasMany(self::class, 'referred_by', 'affiliate_tag');
    }

    public function getReferralBalance() : int
    {
        $teams = $this->referrals->flatMap->teams;

        return Percentage::of(
            config('sazzy.affiliate.commissionPercentage'),
            $teams
                ->map(fn (Team $team) => $team->invoices(false, ['created' => ['gte' => optional($this->cashed_out_at)->timestamp]]))
                ->flatten()
                ->map(fn (\Stripe\Invoice $invoice) => $invoice->subtotal)
                ->sum()
        );
    }

    public function getTotalReferralBalance() : int
    {
        $teams = $this->referrals->flatMap->teams;

        return Percentage::of(
            config('sazzy.affiliate.commissionPercentage'),
            $teams
                ->map(fn (Team $team) => $team->invoices(false))
                ->flatten()
                ->map(fn (\Stripe\Invoice $invoice) => $invoice->subtotal)
                ->sum()
        );
    }

    public function selectPersonalData(PersonalDataSelection $personalData): void
    {
        $personalData->add('user.json', ['name' => $this->name, 'email' => $this->email]);
    }
}
