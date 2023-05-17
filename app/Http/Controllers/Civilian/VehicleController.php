<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\VehicleCreateRequest;
use App\Models\Civilian;
use App\Models\Civilian\Vehicle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function create(Civilian $civilian)
    {
        $current_civilian_level = auth()->user()->civilian_level;

        if ($current_civilian_level->vehicle_limit <= $civilian->vehicles->count()) {
            return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'You have reached your max vehicles.', 'level' => 'error']]);
        }

        return view('civilian.vehicles.create', compact('civilian'));
    }

    public function store(VehicleCreateRequest $request, Civilian $civilian): RedirectResponse
    {
        $current_civilian_level = auth()->user()->civilian_level;

        if ($current_civilian_level->vehicle_limit <= $civilian->vehicles->count()) {
            return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'You have reached your max vehicles.', 'level' => 'error']]);
        }

        $input = $request->validated();
        $input['civilian_id'] = $civilian->id;
        $input['registration_expire'] = date("Y-m-d", strtotime("+30 Days"));

        if ($input['vehicle_status'] == 5) {
            $input['registration_expire'] = date("Y-m-d", strtotime("-30 Days"));
            $input['vehicle_status'] = 1;
        }

        Vehicle::create($input);

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Vehicle Added.', 'level' => 'success']]);
    }


    public function destroy(Civilian $civilian, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();
        return redirect(route('civilian.civilians.show', $civilian->id))->with('alerts', [['message' => 'Vehicle Deleted.', 'level' => 'success']]);
    }

    public function renew(Civilian $civilian, Vehicle $vehicle)
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $vehicle->update(['registration_expire' => date('Y-m-d', strtotime('+30 days'))]);

        return redirect(route('civilian.civilians.show', $civilian->id))->with('alerts', [['message' => 'Vehicle Renewed.', 'level' => 'success']]);
    }

    public function stolen(Civilian $civilian, Vehicle $vehicle)
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $vehicle->update(['vehicle_status' => 2]);

        return redirect(route('civilian.civilians.show', $civilian->id))->with('alerts', [['message' => 'Vehicle Reported As Stolen.', 'level' => 'success']]);
    }
}
