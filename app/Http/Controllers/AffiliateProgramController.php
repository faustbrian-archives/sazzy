<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AffiliateProgramController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'affiliate_tag' => ['required', 'string', 'min:3', 'max:255', Rule::unique('users')->ignoreModel($request->user())],
            'paypal_email'  => ['required', 'string', 'max:255', 'email'],
        ]);

        DB::transaction(function () use ($request) {
            if ($request->input('affiliate_tag') !== $request->user()->affiliate_tag) {
                User::where('referred_by', $request->user()->affiliate_tag)
                    ->update(['referred_by' => $request->input('affiliate_tag')]);
            }

            $request->user()->update([
                'affiliate_tag' => $request->input('affiliate_tag'),
                'paypal_email'  => $request->input('paypal_email'),
            ]);
        });

        return redirect()->route('affiliate');
    }
}
