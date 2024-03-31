<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\CivilianStoreRequest;
use App\Http\Requests\Civilian\CivilianUpdateRequest;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CivilianController extends Controller
{
    public function index(): View
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        return view('civilian.civilians.index', compact('civilians', 'current_civilian_level'));
    }

    public function create()
    {
        $civilians = Civilian::where('user_id', auth()->user()->id);
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        return view('civilian.civilians.create');
    }

    public function store(CivilianStoreRequest $request): RedirectResponse
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['id'] = rand(100000000, 999999999);

        if (!get_setting('allow_same_name_civilians')) {
            if ($this->name_check($data['first_name'], $data['last_name'])) {
                return redirect()->route('civilian.civilians.create')
                    ->with('alerts', [['message' => 'That name is already in use. Choose a diffrent name.', 'level' => 'error']])
                    ->withInput($request->input());
            }
        }
        Civilian::create($data);

        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Created', 'level' => 'success']]);
    }

    public function show(Civilian $civilian): View
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        return view('civilian.civilians.show', compact('civilian', 'current_civilian_level'));
    }

    public function edit(Civilian $civilian): View
    {

        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $civilians = Civilian::where('user_id', auth()->user()->id);
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        return view('civilian.civilians.edit', compact('civilian'));
    }

    public function update(CivilianUpdateRequest $request, Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $data = $request->validated();
        $civilian->update($data);

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Civilian Updated.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        foreach ($civilian->businesses as $bussinessEmployee) {
            if ($bussinessEmployee->role == 5) {
                return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'You own a business. You must transfer ownership first.', 'level' => 'error']]);
            }
        }

        foreach ($civilian->tickets as $ticket) {
            $ticket->update(["plea_type" => 1]);
        }

        foreach ($civilian->businesses as $bussinessEmployee) {
            $bussinessEmployee->delete();
        }

        foreach ($civilian->vehicles as $vehicle) {
            $vehicle->delete();
        }

        foreach ($civilian->licenses as $license) {
            $license->delete();
        }

        foreach ($civilian->medical_records as $record) {
            $record->delete();
        }

        foreach ($civilian->weapons as $weapon) {
            $weapon->delete();
        }

        $civilian->delete();

        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Deceased', 'level' => 'success']]);
    }

    private function name_check($first_name, $last_name)
    {
        $results = DB::table('civilians')->where('first_name', $first_name)->where('last_name', $last_name)->count();

        if ($results == 0) {
            return false;
        }

        return true;
    }
}
