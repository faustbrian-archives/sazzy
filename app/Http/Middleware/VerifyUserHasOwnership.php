<?php

namespace App\Http\Middleware;

class VerifyUserHasOwnership
{
    public function handle($request, $next)
    {
        $user = $request->user();

        abort_unless($user && $user->ownsCurrentTeam(), 403);

        return $next($request);
    }
}
