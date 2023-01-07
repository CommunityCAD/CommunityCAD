<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AccountStatusCheck
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		if ($request->user()) {
			if ($request->user()->account_status >= 4) {
				return abort(403);
			}
		}

		return $next($request);
	}
}
