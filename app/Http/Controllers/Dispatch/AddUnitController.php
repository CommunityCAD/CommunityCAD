<?php

namespace App\Http\Controllers\Dispatch;

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
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

        if ($active_unit > 0) {
            return redirect()->route('dispatch.home');
        }

        $input['badge_number'] = $active_department->badge_number;
        $input['agency'] = $active_department->department->initials;
        $input['status'] = 'OFFDTY';
        $input['user_id'] = auth()->user()->id;
        $input['department_id'] = $active_department->department->id;
        $input['department_type'] = $active_department->department->type;

        $input['calls'] = '{"data":[]}';

        ActiveUnit::create($input);

        return redirect()->route('dispatch.home');
    }
}
