<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use App\Models\License;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
    public function create(Civilian $civilian): View|RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        $allowed = $current_civilian_level->license_types_allowed['data'];
        $license_types = DB::table('license_types')->get();
        $owned_licenses = [];
        $authorized_licenses = [];
        $available_licenses = [];

        foreach ($civilian->licenses as $license) {
            $owned_licenses[] = $license->type;
        }

        foreach ($license_types as $type) {
            $perm_name = $type->perm_name;

            if (in_array($perm_name, $allowed)) {
                $authorized_licenses[$type->name] = $type->id;
            }
        }

        foreach ($authorized_licenses as $name => $id) {
            if (! in_array($id, $owned_licenses)) {
                $available_licenses[$name] = $id;
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

        $input['type'] = $request->type;
        $input['civilian_id'] = $civilian->id;
        $input['expires_on'] = date('Y-m-d', strtotime('+30 Days'));
        $input['license_status'] = $request->status;
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
