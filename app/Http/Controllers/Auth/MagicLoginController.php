<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MagicLoginLinkRequested;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MagicLoginController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('signed')->only('login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login-magic');
    }

    /**
     * Send a magic link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function sendMagicLinkEmail(Request $request)
    {
        $request->validate(['email' => ['required', 'exists:users']]);

        Mail::to($request->email)->send(new MagicLoginLinkRequested($request->email));

        return back()->with('status', 'Login email sent. Go check your email.');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request, User $user): RedirectResponse
    {
        abort_unless($request->hasValidSignature(), 401);

        if ($user->uses_two_factor_auth) {
            Auth::logout();

            $request->session()->put(['app:auth:id' => $user->id]);

            return redirect('login/token');
        }

        Auth::login($user);

        return redirect($this->redirectPath());
    }
}
