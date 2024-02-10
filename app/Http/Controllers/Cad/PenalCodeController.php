<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\PenalCodeTitle;
use Illuminate\Http\Request;

class PenalCodeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $titles = PenalCodeTitle::orderBy('number', 'asc')->get();

        return view('cad.penalcode.index', compact('titles'));
    }
}
