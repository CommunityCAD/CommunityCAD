<?php

namespace App\Http\Controllers\Cad\Mdt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MdtController extends Controller
{
    public function mdt()
    {
        if (!isset(auth()->user()->active_unit) || auth()->user()->active_unit->user_department->department->type != 1) {
            return redirect(route('cad.landing'));
        }

        return view('cad.mdt.mdt');
    }
}
