<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\CallCivilian;
use App\Models\Civilian;
use Illuminate\Http\Request;

class CallCivilianController extends Controller
{
    public function add_civilian()
    {
    }

    public function remove_civilian(Call $call, Civilian $civilian)
    {
        $call_civilians = CallCivilian::where('call_id', $call->id)->where('civilian_id', $civilian->id)->get();

        foreach ($call_civilians as $call_civilian) {
            $call_civilian->delete();
        }

        return redirect()->route('cad.call.show', $call->id);
    }
}
