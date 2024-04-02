<?php

namespace App\Http\Controllers\Civilian\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\VehicleCreateRequest;
use App\Models\Business;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\RedirectResponse;

class BusinessVehicleController extends Controller
{
    public function create(Business $business)
    {
        return view('civilian.businesses.vehicles.create', compact('business'));
    }

    public function store(VehicleCreateRequest $request, Business $business): RedirectResponse
    {
        $input = $request->validated();
        $input['business_id'] = $business->id;
        $input['registration_expire'] = date('Y-m-d', strtotime('+30 Days'));

        if ($input['vehicle_status'] == 5) {
            $input['registration_expire'] = date('Y-m-d', strtotime('-30 Days'));
            $input['vehicle_status'] = 1;
        }

        Vehicle::create($input);

        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Vehicle Added.', 'level' => 'success']]);
    }

    public function destroy(Business $business, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();

        return redirect(route('civilian.businesses.show', $business->id))->with('alerts', [['message' => 'Vehicle Deleted.', 'level' => 'success']]);
    }

    public function renew(Business $business, Vehicle $vehicle)
    {
        $vehicle->update(['registration_expire' => date('Y-m-d', strtotime('+30 days'))]);

        return redirect(route('civilian.businesses.show', $business->id))->with('alerts', [['message' => 'Vehicle Renewed.', 'level' => 'success']]);
    }

    public function stolen(Business $business, Vehicle $vehicle)
    {
        $vehicle->update(['vehicle_status' => 2]);

        return redirect(route('civilian.businesses.show', $business->id))->with('alerts', [['message' => 'Vehicle Reported As Stolen.', 'level' => 'success']]);
    }

    public function found(Business $business, Vehicle $vehicle)
    {
        $vehicle->update(['vehicle_status' => 1]);

        return redirect(route('civilian.businesses.show', $business->id))->with('alerts', [['message' => 'Vehicle Reported As Found. Im glad you found it!', 'level' => 'success']]);
    }

    public function expire(Business $business, Vehicle $vehicle)
    {
        $vehicle->update(['registration_expire' => date('Y-m-d', strtotime('-30 days'))]);

        return redirect(route('civilian.businesses.show', $business->id))->with('alerts', [['message' => 'Vehicle reported as expired. Hope you know what you are doing.', 'level' => 'success']]);
    }
}
