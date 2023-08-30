<?php

namespace App\Http\Controllers\Admin\PenalCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenalCode\PenalCodeRequest;
use App\Models\PenalCode;
use App\Models\PenalCodeClass;
use App\Models\PenalCodeTitle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PenalCodeController extends Controller
{
    public function index(): View
    {
        // $codes = PenalCode::all();
        $titles = PenalCodeTitle::orderBy('number', 'asc')->get();

        return view('admin.penalcode.code.index', compact('titles'));
    }

    public function create(): View
    {
        $titles = PenalCodeTitle::orderBy('number', 'asc')->get();
        $classes = PenalCodeClass::orderBy('name', 'asc')->get();

        return view('admin.penalcode.code.create', compact('titles', 'classes'));
    }

    public function store(PenalCodeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['section'] = $request['mdcontent'];
        unset($data['mdcontent']);

        PenalCode::create($data);

        return redirect()->route('admin.penalcode.code.index')->with('alerts', [['message' => 'Code created.', 'level' => 'success']]);
    }

    public function edit(PenalCode $code): View
    {
        $titles = PenalCodeTitle::orderBy('number', 'asc')->get();
        $classes = PenalCodeClass::orderBy('name', 'asc')->get();

        return view('admin.penalcode.code.edit', compact('titles', 'classes', 'code'));
    }

    public function update(PenalCodeRequest $request, PenalCode $code): RedirectResponse
    {
        $data = $request->validated();
        $data['section'] = $request['mdcontent'];
        unset($data['mdcontent']);

        $code->update($data);

        return redirect()->route('admin.penalcode.code.index')->with('alerts', [['message' => 'Code updated.', 'level' => 'success']]);
    }

    public function destroy(PenalCode $code): RedirectResponse
    {
        $code->delete();

        return redirect()->route('admin.penalcode.code.index')->with('alerts', [['message' => 'Code deleted.', 'level' => 'success']]);
    }
}
