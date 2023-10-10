<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Vehicle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImpoundController extends Controller
{

    public function index(): View
    {
        $vehicles = Vehicle::where('vehicle_status', 3)->with('ticket')->get();
        return view('courthouse.impound.index', compact('vehicles'));
    }


    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
        $validated = $request->validate([
            'vehicle_status' => 'required|numeric',
        ]);

        $validated['impound_ticket_id'] = NULL;
        $vehicle->update($validated);
        return redirect()->route('courthouse.impound.index')->with('alerts', [['message' => 'Vehicle Released.', 'level' => 'success']]);
    }
}
