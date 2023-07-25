<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\UserDepartment;
use Illuminate\Http\Request;

class AddUnitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'user_department' => 'required|numeric',
        ]);

        $selected_department = $validated['user_department'];
        $active_department = UserDepartment::findOrFail($selected_department);
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        if ($active_unit) {
            if ($active_unit->department_type == 1) {
                return redirect()->route('cad.home');
            } elseif ($active_unit->department_type == 2) {
                $active_dispatcher = ActiveUnit::where('department_type', 2)->orderBy('created_at')->get()->first();
                if ($active_dispatcher->id != $active_unit->id) {
                    return redirect()->route('cad.home')->with('alerts', [['message' => 'You are not the primary dispatcher.', 'level' => 'error']]);
                }
                return redirect()->route('cad.home')->with('alerts', [['message' => 'You are the primary dispatcher.', 'level' => 'success']]);
            } else {
                return abort(404, 'Department type is not set correctly.');
            }
        }

        $input['badge_number'] = $active_department->badge_number;
        $input['agency'] = $active_department->department->initials;
        $input['status'] = 'OFFDTY';
        $input['user_id'] = auth()->user()->id;
        $input['department_id'] = $active_department->department->id;
        $input['department_type'] = $active_department->department->type;

        $input['calls'] = '{"data":[]}';

        $new_active_unit = ActiveUnit::create($input);

        if ($new_active_unit->department_type == 1) {
            return redirect()->route('cad.home');
        } elseif ($new_active_unit->department_type == 2) {
            $active_dispatcher = ActiveUnit::where('department_type', 2)->orderBy('created_at')->get()->first();
            if ($active_dispatcher->id != $new_active_unit->user_id) {
                return redirect()->route('cad.home')->with('alerts', [['message' => 'You are not the primary dispatcher.', 'level' => 'error']]);
            }

            return redirect()->route('cad.home')->with('alerts', [['message' => 'You are the primary dispatcher.', 'level' => 'success']]);
        } else {
            return abort(404, 'Department type is not set correctly.');
        }
    }
}
