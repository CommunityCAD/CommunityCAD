<?php

namespace App\Http\Controllers\Api\v1\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Civilian\CreateCivilianRequest;
use App\Http\Requests\Api\v1\Civilian\EditCivilianRequest;
use App\Http\Requests\Api\v1\Civilian\GetActiveCivilianRequest;
use App\Http\Requests\Api\v1\Civilian\GetCivilianRequest;
use App\Http\Requests\Api\v1\Civilian\GetCiviliansRequest;
use App\Http\Requests\Api\v1\Civilian\RegisterVehicleRequest;
use App\Http\Requests\Api\v1\Civilian\SetCivilianRequest;
use App\Http\Resources\Api\v1\Emergency\CivilianResource;
use App\Http\Resources\Api\v1\Emergency\VehicleResource;
use App\Models\Civilian;
use App\Models\Civilian\Vehicle;
use App\Models\CivilianLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CivilianController extends Controller
{
    public function set_active_civilian(SetCivilianRequest $request)
    {

        $old_civilian = Civilian::where('user_id', $request->user_id)->where('active_persona', 1)->get()->first();

        if ($old_civilian) {
            $old_civilian->update(['active_persona' => 0]);
        }

        $civilian = Civilian::where('user_id', $request->user_id)->where('id', $request->civilian_id)->get()->first();

        if (!$civilian) {
            return response()->json([
                'success'   => false,
                'message'   => "No civilian found.",
                'data'      => []
            ]);
        }

        $civilian->update(['active_persona' => 1]);

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian)
            ]
        ]);
    }

    public function get_active_civilian(GetActiveCivilianRequest $request)
    {

        $civilian = Civilian::where('user_id', $request->user_id)->where('active_persona', 1)->get()->first();

        if (!$civilian) {
            return response()->json([
                'success'   => false,
                'message'   => "No civilian found.",
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian)
            ]
        ]);
    }

    public function get_civilians(GetCiviliansRequest $request)
    {

        $civilians = Civilian::where('user_id', $request->user_id)->get();

        if (!$civilians) {
            return response()->json([
                'success'   => false,
                'message'   => "No civilians found.",
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                CivilianResource::collection($civilians)
            ]
        ]);
    }

    public function get_civilian(GetCivilianRequest $request)
    {

        $civilian = Civilian::where('id', $request->civilian_id)->get()->first();

        if (!$civilian) {
            return response()->json([
                'success'   => false,
                'message'   => "No civilians found.",
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian)
            ]
        ]);
    }

    public function create_civilian(CreateCivilianRequest $request)
    {

        $civilians = Civilian::where('user_id', $request->user_id)->get();
        $user_civilian_level = User::where('id', $request->user_id)->get('civilian_level_id')->first();
        $current_civilian_level = CivilianLevel::where('id', $user_civilian_level->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return response()->json([
                'success'   => false,
                'message'   => "You have reached your max civilians.",
                'data'      => []
            ]);
        }

        $data = $request->validated();
        $data['id'] = rand(100000000, 999999999);

        if (!get_setting('allow_same_name_civilians')) {
            if ($this->name_check($data['first_name'], $data['last_name'])) {
                return response()->json([
                    'success'   => false,
                    'message'   => "That name is already in use. Choose a diffrent name.",
                    'data'      => []
                ]);
            }
        }
        $civilian = Civilian::create($data);

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian)
            ]
        ]);
    }

    public function edit_civilian(EditCivilianRequest $request)
    {

        $civilian = Civilian::where('id', $request->civilian_id)->get()->first();

        $data = $request->validated();
        unset($data['civilian_id']);


        if (!$civilian) {
            return response()->json([
                'success'   => false,
                'message'   => "No civilian found.",
                'data'      => []
            ]);
        }


        $civilian->update($data);

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian)
            ]
        ]);
    }

    public function register_vehicle(RegisterVehicleRequest $request)
    {

        $user_civilian_level = User::where('id', $request->user_id)->get('civilian_level_id')->first();
        $current_civilian_level = CivilianLevel::where('id', $user_civilian_level->civilian_level_id)->get()->first();
        $civilian = Civilian::where('id', $request->civilian_id)->get()->first();

        if ($current_civilian_level->vehicle_limit <= $civilian->vehicles->count()) {
            return response()->json([
                'success'   => false,
                'message'   => "You have reached your max vehicles.",
                'data'      => []
            ]);
        }

        $input = $request->validated();
        $input['registration_expire'] = date('Y-m-d', strtotime('+30 Days'));
        $input['vehicle_status'] = 1;
        unset($input['user_id']);

        $vehicle = Vehicle::create($input);

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new VehicleResource($vehicle)
            ]
        ]);
    }



    private function name_check($first_name, $last_name)
    {
        $results = DB::table('civilians')->where('first_name', $first_name)->where('last_name', $last_name)->count();

        if ($results == 0) {
            return false;
        }

        return true;
    }
}
