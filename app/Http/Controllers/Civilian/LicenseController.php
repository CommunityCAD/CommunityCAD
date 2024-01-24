<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\License;
use App\Models\LicenseType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function create(Civilian $civilian): View|RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $allowed_licenses = LicenseType::whereIn('id', json_decode(auth()->user()->civilian_level->license_types_allowed, true)['data'])->get();
        $owned_licenses = $civilian->licenses->pluck('license_type_id')->toArray();

        $available_licenses = [];
        foreach ($allowed_licenses as $license) {
            if (! in_array($license->id, $owned_licenses)) {
                $available_licenses[] = $license;
            }
        }

        if (empty($available_licenses)) {
            return redirect(route('civilian.civilians.show', $civilian->id))->with('alerts', [['message' => 'No more licenses to add.', 'level' => 'error']]);
        }

        return view('civilian.licenses.create', compact('civilian', 'available_licenses'));
    }

    public function store(Request $request, Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $validated = $request->validate([
            'license_type_id' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $input['license_type_id'] = $validated['license_type_id'];
        $input['civilian_id'] = $civilian->id;
        $input['expires_on'] = date('Y-m-d', strtotime('+30 Days'));
        $input['license_status'] = $validated['status'];
        if ($input['license_status'] == 2) {
            $input['expires_on'] = date('Y-m-d', strtotime('-30 Days'));
            $input['license_status'] = 1;
        }
        $input['id'] = rand(100000, 999999);

        License::create($input);

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'License Added.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian, License $license): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $license->delete();

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'License Deleted.', 'level' => 'success']]);
    }

    public function renew(Civilian $civilian, License $license)
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $license->update(['expires_on' => date('Y-m-d', strtotime('+30 days'))]);

        return redirect(route('civilian.civilians.show', $civilian->id))->with('alerts', [['message' => 'License Renewed.', 'level' => 'success']]);
    }
}
