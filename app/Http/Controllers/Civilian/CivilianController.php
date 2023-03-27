<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\CivilianStoreRequest;
use App\Http\Requests\Civilian\CivilianUpdateRequest;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CivilianController extends Controller
{

    public function index(): View
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level)->first();

        return view('civilian.civilians.index', compact('civilians', 'civilian_level'));
    }

    public function create(): View
    {
        return view('civilian.civilians.create');
    }

    public function store(CivilianStoreRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Civilian::create($data);
        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Created', 'level' => 'success']]);
    }

    public function show(Civilian $civilian): View
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        return view('civilian.civilians.show', compact('civilian'));
    }

    public function edit(Civilian $civilian): View
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        return view('civilian.civilians.edit', compact('civilian'));
    }

    public function update(CivilianUpdateRequest $request, Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $civilian->update($request->validated());
        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Civilian Updated.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $civilian->delete();
        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Deceased', 'level' => 'success']]);
    }
}
