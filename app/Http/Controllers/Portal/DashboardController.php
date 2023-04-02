<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {

        $total_members = User::where('account_status', 3)->count();

        $total_active_members = User::where('last_login', '>=', Carbon::now()->subDays(get_setting('days_until_inactive')))->count();

        return view('portal.dashboard', compact('total_members', 'total_active_members'));
    }
}
