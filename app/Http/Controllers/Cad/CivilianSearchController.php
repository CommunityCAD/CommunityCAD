<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Civilian;
use Illuminate\Http\Request;

class CivilianSearchController extends Controller
{
    public function search()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

        if ($active_unit == 0) {
            return redirect()->route('cad.landing');
        }

        return view('cad.civilian_search.search');
    }

    public function return(Civilian $civilian)
    {
        return view('cad.civilian_search.return', compact('civilian'));
    }
}
