<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LastLoginCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            if ($request->user()->last_login < Carbon::now()->subDays(get_setting('days_until_inactive'))) {
                auth()->logout();

                return redirect('/')->with('alerts', [['message' => 'Session expired.', 'level' => 'error']]);
            }
        }

        return $next($request);
    }
}
