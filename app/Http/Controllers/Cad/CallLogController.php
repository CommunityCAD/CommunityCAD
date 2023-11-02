<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\Call;
use App\Models\CallLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    public function store(Call $call, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $validated['from'] = auth()->user()->officer_name_check.' ('.auth()->user()->active_unit->badge_number.')';
        $validated['call_id'] = $call->id;

        // dd($validated);

        CallLog::create($validated);

        $call->touch();

        return redirect()->route('cad.call.show', $call->id)->with('success', 'Message');
    }
}
