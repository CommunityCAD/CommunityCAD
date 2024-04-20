<?php

namespace App\Http\Controllers\Cad;

use App\Models\Bolo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\BoloCreateRequest;
use App\Models\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BoloController extends Controller
{
    public function create(): View
    {
        return view('cad.bolo.create');
    }

    public function store(BoloCreateRequest $request): RedirectResponse
    {
        // dd($request->validated());
        Bolo::create($request->validated());
        return redirect()->route('cad.message_center');
    }

    public function destroy(Bolo $bolo): RedirectResponse
    {
        $bolo->delete();
        return redirect()->route('cad.message_center');
    }
}
