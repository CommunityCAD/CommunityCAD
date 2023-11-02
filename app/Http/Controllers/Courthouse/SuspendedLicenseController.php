<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SuspendedLicenseController extends Controller
{
    public function index(): View
    {
        $licenses = License::where('license_status', 3)->with('ticket')->get();

        return view('courthouse.suspended.index', compact('licenses'));
    }

    public function update(Request $request, License $license): RedirectResponse
    {
        $validated = $request->validate([
            'license_status' => 'required|numeric',
        ]);

        $validated['suspend_ticket_id'] = null;
        $license->update($validated);

        return redirect()->route('courthouse.suspended.index')->with('alerts', [['message' => 'License Released.', 'level' => 'success']]);
    }
}
