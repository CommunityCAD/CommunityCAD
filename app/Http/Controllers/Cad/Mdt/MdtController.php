<?php

namespace App\Http\Controllers\Cad\Mdt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MdtController extends Controller
{
    public function mdt()
    {
        return view('cad.mdt.mdt');
    }
}
