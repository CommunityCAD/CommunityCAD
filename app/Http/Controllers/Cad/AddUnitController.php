<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Officer;
use App\Models\UserDepartment;
use Illuminate\Http\Request;

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

        $validated = $request->validate([
            'user_department' => 'required|numeric',
        ]);

        $selected_department = $validated['user_department'];

        $user_department = UserDepartment::findOrFail($selected_department);
        $officer = Officer::where('user_id', auth()->user()->id)->where('user_department_id', $user_department->id)->get()->first();

        if (!$officer && $user_department->department->type != 2) {
            return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'You have not created an officer for this department yet. Please go to the Civilian portal to create one.', 'level' => 'error']]);
        } else {
            if ($user_department->department->type != 2) {
                $input['officer_id'] = $officer->id;
            }
        }

        $input['user_id'] = auth()->user()->id;
        $input['user_department_id'] = $user_department->id;
        $input['status'] = 'OFFDTY';
        $input['description'] = 'SIGNED IN: ' . date('G:i:s');

        $new_active_unit = ActiveUnit::create($input);

        return redirect()->route('cad.home');
    }
}
