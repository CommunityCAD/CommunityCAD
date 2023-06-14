<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class StaffPageController extends Controller
{
    public function index()
    {
        $user = 1117962582905585684;
        // dd($new_arr);

        dd(in_array($user, config('cad.owner_ids')));
        return view('staff.index');
    }
}
