<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\Civilian\Weapon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WeaponController extends Controller
{

    public function create(Civilian $civilian): View
    {
        $current_civilian_level = auth()->user()->civilian_level;

        if ($current_civilian_level->firearm_limit <= $civilian->weapons->count()) {
            return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'You have reached your max weapons.', 'level' => 'error']]);
        }

        return view('civilian.weapons.create', compact('civilian'));
    }

    public function store(Request $request, Civilian $civilian): RedirectResponse
    {

        $current_civilian_level = auth()->user()->civilian_level;

        if ($current_civilian_level->firearm_limit <= $civilian->weapons->count()) {
            return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'You have reached your max weapons.', 'level' => 'error']]);
        }

        $input = $request->validate([
            'model' => 'required',
        ]);

        $input['civilian_id'] = $civilian->id;

        $input['serial_number'] = strtoupper(substr(md5(time()), 15));

        Weapon::create($input);
        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Weapon Added.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian, Weapon $weapon): RedirectResponse
    {
        $weapon->delete();
        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Weapon Deleted.', 'level' => 'success']]);
    }
}
