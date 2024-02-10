<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Officer;
use App\Models\UserDepartment;
use Illuminate\Http\Request;

class AddUnitController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'user_department' => 'required|numeric',
        ]);

        $selected_department = $validated['user_department'];
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        if ($active_unit) {
            $this->is_active_unit_and_redirect($active_unit);
            abort(500);
        }

        $user_department = UserDepartment::findOrFail($selected_department);
        $officer = Officer::where('user_id', auth()->user()->id)->where('user_department_id', $user_department->id)->get()->first();

        if (! $officer && $user_department->department->type != 2) {
            return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'You have not created an officer for this department yet. Please go to the Civilian portal to create one.', 'level' => 'error']]);
        } else {
            if ($user_department->department->type != 2) {
                $input['officer_id'] = $officer->id;
            }
        }

        $input['user_id'] = auth()->user()->id;
        $input['user_department_id'] = $user_department->id;
        $input['status'] = 'OFFDTY';
        $input['description'] = 'SIGNED IN: '.date('G:i:s');

        $new_active_unit = ActiveUnit::create($input);

        $this->is_active_unit_and_redirect($new_active_unit);

        return abort(500, 'Didn\'t redirect after going onduty');
    }

    private function is_active_unit_and_redirect($active_unit)
    {
        switch ($active_unit->user_department->department->type) {
            case '1': // LEO
                return redirect()->route('cad.home');
                break;

            case '2': // Dispatch
                return redirect()->route('cad.home');
                break;

            case '4': // Fire/EMS
                return redirect()->route('cad.home');
                break;

            default:
                return abort(404, 'Department type is not set correctly.');
                break;
        }
    }
}
