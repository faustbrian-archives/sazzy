<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Facade as Google2FA;

class TokenLoginController extends Controller
{
    /**
     * Where to redirect users after log in.
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new login controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the two-factor authentication token form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showTokenForm(Request $request)
    {
        if (! $request->session()->has('app:auth:id')) {
            return redirect('login');
        }

        return view('auth.token');
    }

    /**
     * Verify the given authentication token.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function verifyToken(Request $request)
    {
        $this->validate($request, ['token' => 'required']);

        if (! $request->session()->has('app:auth:id')) {
            return redirect('login');
        }

        $user = User::findOrFail($request->session()->pull('app:auth:id'));

        if (Google2FA::verifyKey($user->two_factor_secret, $request->token)) {
            Auth::login($user);

            return redirect()->intended($this->redirectPath());
        }

        return back();
    }
}
