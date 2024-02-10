<?php

namespace App\Http\Controllers\Cad;

use App\Models\TenCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class TenCodeController extends Controller
{

    public function index(): View
    {
        $codes = TenCode::all();
        return view('cad.tencodes.index', compact('codes'));
    }
}
