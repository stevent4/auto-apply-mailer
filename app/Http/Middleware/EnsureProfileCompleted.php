<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileCompleted
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $user = $request->user();

        if (!$user) {
            return $next($request);
        }

        /*
         * Jangan redirect ketika user sedang
         * berada di halaman completion.
         */
        if ($request->routeIs('profile.complete*')) {
            return $next($request);
        }

        if (!$user->profile_completed) {
            return redirect()->route('profile.complete');
        }

        return $next($request);
    }
}
