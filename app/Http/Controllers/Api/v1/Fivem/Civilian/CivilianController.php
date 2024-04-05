<?php

namespace App\Http\Controllers\Api\v1\Fivem\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CivilianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $civilians = Civilian::where('user_id', $request->user_id)->get();

        return response($civilians, 200, ['Content-Type', 'application/json']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $civilians = Civilian::where('user_id', $request->user_id);
        $user = User::where('id', $request->user_id)->get()->first();
        if ($user->count() == 0) {
            return response(["error" => "No user for the user_id provided."], 200, ['Content-Type', 'application/json']);
        }
        $current_civilian_level = CivilianLevel::where('id', $user->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return response(["error" => "You have reached the max civilian count."], 200, ['Content-Type', 'application/json']);
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'race' => $request->race,
            'postal' => $request->postal,
            'street' => $request->street,
            'city' => $request->city,
            'occupation' => $request->occupation,
            'height' => $request->height,
            'weight' => $request->weight,
            'status' => 1,
            'user_id' => $request->user_id,
        ];

        if (!get_setting('allow_same_name_civilians')) {
            if ($this->name_check($data['first_name'], $data['last_name'])) {
                return response(["error" => "There is already a civilian with that name."], 200, ['Content-Type', 'application/json']);
            }
        }
        $civilian = Civilian::create($data);

        return response($civilian, 200, ['Content-Type', 'application/json']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
