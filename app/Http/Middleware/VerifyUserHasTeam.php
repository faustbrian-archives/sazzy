<?php

namespace App\Http\Middleware;

class VerifyUserHasTeam
{
    public function handle($request, $next)
    {
        $user = $request->user();

        if ($user && ! $user->hasTeams()) {
            return back();
        }

        return $next($request);
    }
}
