<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CivilianLevelRequest;
use App\Models\CivilianLevel;
use App\Models\LicenseType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CivilianLevelController extends Controller
{
    public function index(): View
    {
        $civilianLevels = CivilianLevel::get(['id', 'name', 'civilian_limit', 'firearm_limit', 'vehicle_limit']);
        $license_types = LicenseType::get();

        return view('admin.civilian_level.index', compact('civilianLevels'));
    }

    public function create(): View
    {
        $license_types = LicenseType::get();
        return view('admin.civilian_level.create', compact('license_types'));
    }

    public function store(CivilianLevelRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $data['license_types_allowed'] = json_encode(["data" => $data['allowed_licenses']]);
        unset($data['allowed_licenses']);

        CivilianLevel::create($data);

        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Created.', 'level' => 'success']]);
    }

    public function edit(CivilianLevel $civilianLevel): View
    {
        $license_types = LicenseType::get();
        $allowed_licenses = json_decode($civilianLevel->license_types_allowed, true);
        return view('admin.civilian_level.edit', compact('civilianLevel', 'license_types', 'allowed_licenses'));
    }

    public function update(CivilianLevelRequest $request, CivilianLevel $civilianLevel): RedirectResponse
    {
        $data = $request->validated();
        $data['license_types_allowed'] = json_encode(["data" => $data['allowed_licenses']]);
        unset($data['allowed_licenses']);
        $civilianLevel->update($data);

        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Created.', 'level' => 'success']]);
    }

    public function destroy(CivilianLevel $civilianLevel): RedirectResponse
    {
        $civilianLevel->delete();

        return redirect()->route('admin.civilian_level.index')->with('alerts', [['message' => 'Civilain Level Deleted.', 'level' => 'success']]);
    }
}
