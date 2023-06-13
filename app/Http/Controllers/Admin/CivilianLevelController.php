<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CivilianLevelRequest;
use App\Models\CivilianLevel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CivilianLevelController extends Controller
{

    public function index(): View
    {
        $civilianLevels = CivilianLevel::get(['id', 'name', 'civilian_limit', 'firearm_limit', 'vehicle_limit']);
        return view('admin.civilian_level.index', compact('civilianLevels'));
    }

    public function create(): View
    {
        return view('admin.civilian_level.create');
    }

    public function store(CivilianLevelRequest $request): RedirectResponse
    {
        CivilianLevel::create($request->validated());
        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Created.', 'level' => 'success']]);
    }

    public function edit(CivilianLevel $civilianLevel): View
    {
        return view('admin.civilian_level.edit', compact('civilianLevel'));
    }

    public function update(CivilianLevelRequest $request, CivilianLevel $civilianLevel): RedirectResponse
    {
        $civilianLevel->update($request->validated());
        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Created.', 'level' => 'success']]);
    }

    public function destroy(CivilianLevel $civilianLevel): RedirectResponse
    {
        $civilianLevel->delete();
        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Deleted.', 'level' => 'success']]);
    }
}
