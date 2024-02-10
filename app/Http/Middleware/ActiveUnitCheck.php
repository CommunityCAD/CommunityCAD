<?php

namespace App\Http\Middleware;

use App\Models\Cad\ActiveUnit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveUnitCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $active_unit_count = ActiveUnit::where('user_id', $request->user()->id)->without(['officer', 'user_department', 'calls'])->count();

        if ($active_unit_count != 1) {
            return redirect()->route('cad.landing');
        }

        return $next($request);
    }
}
