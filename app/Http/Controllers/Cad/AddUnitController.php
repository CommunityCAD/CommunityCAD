<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\UserDepartment;
use App\Models\Cad\ActiveUnit;
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

        $input['badge_number'] = $active_department->badge_number;
        $input['agency'] = $active_department->department->initials;
        $input['status'] = 'OFFDTY';
        $input['user_id'] = auth()->user()->id;

        // dd($active_department);
        ActiveUnit::create($input);

        return redirect()->route('cad.home');
    }
}
