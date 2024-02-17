<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;

class CivilianPageController extends Controller
{
    public function home()
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->with(['tickets'])->orderBy('id', 'asc')->get();
        return view('civilian.home', compact('civilians'));
    }
}
