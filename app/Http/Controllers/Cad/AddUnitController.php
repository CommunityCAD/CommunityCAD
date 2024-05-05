<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Department;
use App\Models\Officer;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddUnitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (isset(auth()->user()->active_unit)) {
            return redirect()->route('cad.home');
        }

        $this->sync_discord_roles();

        $validated = $request->validate([
            'user_department' => 'required|numeric',
        ]);

        $selected_department = $validated['user_department'];

        $user_department = UserDepartment::findOrFail($selected_department);
        $officer = Officer::where('user_id', auth()->user()->id)->where('user_department_id', $user_department->id)->get()->first();

        if (!$officer) {
            return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'You have not created an officer for this department yet. Please go to the Civilian portal to create one.', 'level' => 'error']]);
        } else {
            $input['officer_id'] = $officer->id;
        }

        if ($user_department->rank == 'NEEDS SET' || $user_department->badge_number == "NEEDS SET") {
            $help_message = "Please see a staff or admin.";

            if (get_setting('use_discord_department_roles')) {
                $help_message = "Please update in the officer screen.";
            }
            return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'You do not have a valid rank or badge number. ' . $help_message, 'level' => 'error']]);
        }

        $input['user_id'] = auth()->user()->id;
        $input['user_department_id'] = $user_department->id;
        $input['department_type'] = $user_department->department->type;
        $input['status'] = 'OFFDTY';
        $input['description'] = 'SIGNED IN: ' . date('G:i:s');

        $new_active_unit = ActiveUnit::create($input);

        return redirect()->route('cad.home');
    }
}
