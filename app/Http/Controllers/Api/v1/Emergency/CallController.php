<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\GetCallsRequest;
use App\Http\Resources\Api\v1\Emergency\CallResource;
use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_calls(GetCallsRequest $request)
    {

        $open_calls = CallResource::collection(Call::orderBy('id', 'desc')->where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->with(['call_log', 'call_civilians', 'call_vehicles'])->get());
        $closed_calls = Call::orderBy('id', 'desc')->where('status', '=', 'CLO')->where('status', 'like', 'CLO-%')->limit($request->closed_call_limit)->get();

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                'open' => $open_calls,
                'closed' => $closed_calls
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
}
