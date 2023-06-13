<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberCheck
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            if ($request->user()->account_status != 3) {
                return abort(403);
            }
        }

        return $next($request);
    }
}
