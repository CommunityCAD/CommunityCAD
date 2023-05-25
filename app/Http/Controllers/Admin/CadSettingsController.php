<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CadSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CadSettingsController extends Controller
{

    public function index(): View
    {
        $settings = CadSetting::all();
        return view('admin.cad_settings.index', compact('settings'));
    }

    public function edit(CadSetting $cad_setting): View
    {
        return view('admin.cad_settings.edit', compact('cad_setting'));
    }

    public function update(Request $request, CadSetting $cadSetting): RedirectResponse
    {
        $cadSetting->update(['value' => $request->value]);
        return redirect()->route('admin.cad_setting.index')->with('alerts', [['message' => 'Setting Updated.', 'level' => 'success']]);
    }
}
