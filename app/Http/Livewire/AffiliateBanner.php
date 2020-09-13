<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class AffiliateBanner extends Component
{
    public function render()
    {
        $affiliate = null;

        if ($affiliateTag = request()->get('via')) {
            $affiliate = User::where('affiliate_tag', $affiliateTag)->first();

            if ($affiliate) {
                Cookie::queue('awesomeapp_affiliate', $affiliateTag, 30);
            }
        } elseif ($affiliateTag = request()->cookie('awesomeapp_affiliate')) {
            $affiliate = User::where('affiliate_tag', $affiliateTag)->first();
        }

        return view('livewire.affiliate-banner', ['affiliate' => $affiliate]);
    }
}
