<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LicenseTypeRequest;
use App\Models\LicenseType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseTypeController extends Controller
{
    public function index(): View
    {
        $types = LicenseType::get(['id', 'name']);

        return view('admin.license_type.index', compact('types'));
    }

    public function create(): View
    {
        return view('admin.license_type.create');
    }

    public function store(LicenseTypeRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $data['perm_name'] = Str::slug($data['name']);
        LicenseType::create($data);

        return redirect()->route('admin.license_type.index')->with('alerts', [['message' => 'License Type Created.', 'level' => 'success']]);
    }

    public function edit(LicenseType $licenseType): View
    {
        return view('admin.license_type.edit', compact('licenseType'));
    }

    public function update(LicenseTypeRequest $request, LicenseType $licenseType): RedirectResponse
    {
        $data = $request->validated();
        $data['perm_name'] = Str::slug($data['name']);
        $licenseType->update($data);

        return redirect()->route('admin.license_type.index')->with('alerts', [['message' => 'License Type Updated.', 'level' => 'success']]);
    }

    public function destroy(LicenseType $licenseType): RedirectResponse
    {
        $licenseType->delete();

        return redirect()->route('admin.license_type.index')->with('alerts', [['message' => 'License Type Deleted.', 'level' => 'success']]);
    }
}
