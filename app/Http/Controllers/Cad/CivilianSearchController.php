<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\CallCivilian;
use App\Models\Civilian;
use Illuminate\Http\Request;

class CivilianSearchController extends Controller
{
    public function search()
    {
        return view('cad.civilian_search.search');
    }

    public function return(Civilian $civilian)
    {
        $calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->orderBy('priority', 'desc')->get();

        return view('cad.civilian_search.return', compact('civilian', 'calls'));
    }

    public function link_civilian_to_call(Civilian $civilian, Call $call, Request $request)
    {
        $validated = $request->validate([
            'call_id' => 'required',
            'type' => 'required',
        ]);

        CallCivilian::create([
            'call_id' => $validated['call_id'],
            'civilian_id' => $civilian->id,
            'type' => $validated['type'],
        ]);

        return redirect()->route('cad.name.return', $civilian->id)->with('alerts', [['message' => 'Civilian linked to call '.$call->id, 'level' => 'success']]);
    }
}
