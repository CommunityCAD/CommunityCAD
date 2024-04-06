<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Loa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserSettingsController extends Controller
{
    public function index(): View
    {
        $loa_requests = Loa::where('user_id', auth()->user()->id)->latest()->limit(5)->get();

        return view('portal.user.settings.index', compact('loa_requests'));
    }

    public function update(Request $request): RedirectResponse
    {

        $input = $request->validate([
            'ts_name' => 'nullable',
            'display_name' => 'nullable',
            'officer_name' => 'nullable',
        ]);

        if (!isset($input['ts_name'])) {
            $input['ts_name'] = null;
        }

        if (!isset($input['display_name'])) {
            $input['display_name'] = null;
        }

        if (!isset($input['officer_name'])) {
            $input['officer_name'] = null;
        }

        auth()->user()->update($input);

        return redirect()->route('portal.user.settings.index')->with('alerts', [['message' => 'Setting Updated.', 'level' => 'success']]);
    }
}
