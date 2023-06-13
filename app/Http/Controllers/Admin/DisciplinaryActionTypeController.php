<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DisciplinaryActionTypeRequest;
use App\Models\DisciplinaryActionType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DisciplinaryActionTypeController extends Controller
{

    public function index(): View
    {
        $da_types = DisciplinaryActionType::orderBy('name', 'asc')->get(['id', 'name']);
        return view('admin.disciplinary_action_type.index', compact('da_types'));
    }

    public function create(): View
    {
        return view('admin.disciplinary_action_type.create');
    }

    public function store(DisciplinaryActionTypeRequest $request): RedirectResponse
    {
        DisciplinaryActionType::create($request->validated());
        return redirect()->route('admin.disciplinary_action_type.index')->with('alerts', [['message' => 'Disciplinary Action Type Created.', 'level' => 'success']]);
    }

    public function edit(DisciplinaryActionType $disciplinaryActionType): View
    {
        return view('admin.disciplinary_action_type.edit', compact('disciplinaryActionType'));
    }

    public function update(DisciplinaryActionTypeRequest $request, DisciplinaryActionType $disciplinaryActionType): RedirectResponse
    {
        $disciplinaryActionType->update($request->validated());
        return redirect()->route('admin.disciplinary_action_type.index')->with('alerts', [['message' => 'Disciplinary Action Type Updated.', 'level' => 'success']]);
    }

    public function destroy(DisciplinaryActionType $disciplinaryActionType): RedirectResponse
    {
        $disciplinaryActionType->delete();
        return redirect()->route('admin.disciplinary_action_type.index')->with('alerts', [['message' => 'Disciplinary Action Type Deleted.', 'level' => 'success']]);
    }
}
