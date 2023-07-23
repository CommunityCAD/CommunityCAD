<?php

namespace App\Http\Controllers\Admin\PenalCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenalCode\PenalCodeClassRequest;
use App\Models\PenalCodeClass;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PenalCodeClassController extends Controller
{
    public function index(): View
    {
        $classes = PenalCodeClass::orderBy('name', 'asc')->get();

        return view('admin.penalcode.class.index', compact('classes'));
    }

    public function create(): View
    {
        return view('admin.penalcode.class.create');
    }

    public function store(PenalCodeClassRequest $request): RedirectResponse
    {
        PenalCodeClass::create($request->validated());

        return redirect()->route('admin.penalcode.class.index')->with('alerts', [['message' => 'Classification created.', 'level' => 'success']]);
    }

    public function edit(PenalCodeClass $class): View
    {
        return view('admin.penalcode.class.edit', compact('class'));
    }

    public function update(PenalCodeClassRequest $request, PenalCodeClass $class): RedirectResponse
    {
        $class->update($request->validated());

        return redirect()->route('admin.penalcode.class.index')->with('alerts', [['message' => 'Classification updated.', 'level' => 'success']]);
    }

    public function destroy(PenalCodeClass $penalCodeClass): RedirectResponse
    {
        $penalCodeClass->delete();

        return redirect()->route('penalCodeClasss.index')->with('success', 'Message');
    }
}
