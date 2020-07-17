<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmergencyLoginController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after log in.
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new emergency login controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->middleware('throttle:3,1')->only('login');
    }

    /**
     * Show the form to login via the emergency token.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        return $request->session()->has('app:auth:id')
            ? view('auth.login-via-emergency-token')
            : redirect('login');
    }

    /**
     * Login via the emergency token.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
        ]);

        if (! $request->session()->has('app:auth:id')) {
            return redirect('login');
        }

        $user = User::findOrFail($request->session()->pull('app:auth:id'));

        if (! Hash::check($request->token, $user->two_factor_reset_code)) {
            return redirect('login')->withErrors([
                'token' => __('The emergency token was invalid.'),
            ]);
        }

        $this->disableTwoFactorAuth($user);

        Auth::login($user);

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Disable two-factor authentication for the given user.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return void
     */
    protected function disableTwoFactorAuth(Authenticatable $user): void
    {
        $user->forceFill([
            'two_factor_secret'    => null,
            'uses_two_factor_auth' => false,
        ])->save();
    }
}
