<?php

namespace App\Http\Middleware;

use App\Models\Cad\ActiveUnit;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LastActiveUnitActivityMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->active_unit) {
            if ($request->user()->active_unit->updated_at < Carbon::now()->subHours(4)) {
                $active_unit = ActiveUnit::where('user_id', $request->user()->id)->get()->first();
                $active_unit->update(['off_duty_type' => 3]);
                $active_unit->delete();
                return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'Session expired.', 'level' => 'error']]);
            }
        }

        return $next($request);
    }
}
