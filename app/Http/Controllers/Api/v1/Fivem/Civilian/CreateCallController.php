<?php

namespace App\Http\Controllers\Api\v1\Fivem\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;

class CreateCallController extends Controller
{
    public function create(Request $request)
    {

        $data = [
            'narrative' => $request->narrative,
            'location' => $request->location,
            'city' => $request->city,
            'nature' => 'TEST',
            'priority' => 3,
            'type' => '1',
            'status' => 'RCVD',
            'source' => '911 Call',
        ];


        $call = Call::create($data);


        return response($call, 200, ['Content-Type', 'application/json']);
    }
}

create
