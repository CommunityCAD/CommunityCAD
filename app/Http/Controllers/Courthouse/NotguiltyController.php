<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Vehicle;
use App\Models\Ticket;
use Illuminate\Http\Request;

class NotguiltyController extends Controller
{
    public function index()
    {
        $non_guilty = Ticket::where('plea_type', 2)->with('civilian')->get();

        return view('courthouse.notguilty.index', compact('non_guilty'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'plea_type' => 'required|numeric',
        ]);

        $ticket->update($validated);

        if ($validated['plea_type'] == 3) {
            $ticket->vehicle()->update(['impound_ticket_id' => null, 'vehicle_status' => 1, 'registration_expire' => now()->addDays(30)]);
            $ticket->license()->update(['suspend_ticket_id' => null, 'license_status' => 1, 'expires_on' => now()->addDays(30)]);
        }

        return redirect()->route('courthouse.not_guilty.index')->with('alerts', [['message' => 'Ticket Updated.', 'level' => 'success']]);
    }
}
