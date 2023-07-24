<?php

namespace App\Http\Controllers\Dispatch;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\UserDepartment;
use Illuminate\Http\Request;

class DispatchPageController extends Controller
{
    public function landing()
    {
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->get();

        $available_departments = [];

        foreach ($user_departments as $department) {
            if ($department->department->type == 2) {
                $available_departments[] = $department;
            }
        }

        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get();

        if ($active_unit->count() > 0) {
            return redirect()->route('dispatch.home');
        }

        return view('dispatch.landing', compact('available_departments'));
    }
}
