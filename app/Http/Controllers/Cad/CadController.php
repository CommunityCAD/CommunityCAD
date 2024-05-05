<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Bolo;
use App\Models\Cad\ActiveUnit;
use App\Models\Call;
use App\Models\Civilian\Vehicle;
use App\Models\Department;
use App\Models\Officer;
use App\Models\UserDepartment;
use Illuminate\Support\Facades\Http;

class CadController extends Controller
{
    public function landing()
    {
        if (isset(auth()->user()->active_unit)) {
            return redirect()->route('cad.home');
        }

        $this->sync_discord_roles();

        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->get();
        $available_departments = [];

        foreach ($user_departments as $department) {
            if (
                $department->department->type == 1 || $department->department->type == 2
                || $department->department->type == 4
            ) {
                $available_departments[] = $department;
            }
        }

        return view('cad.landing', compact('available_departments'));
    }

    public function home()
    {
        if (!isset(auth()->user()->active_unit)) {
            return redirect(route('cad.landing'));
        }

        $call_count = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->count();

        return view('cad.home', compact('call_count'));
    }

    public function message_center()
    {
        $stolen_vehicles = Vehicle::where('vehicle_status', 2)->get();
        $bolos = Bolo::all();
        return view('cad.message_center', compact('stolen_vehicles', 'bolos'));
    }

    public function panic()
    {
        auth()->user()->active_unit->update(['is_panic' => true, 'status' => 'PANIC']);

        return redirect()->route('cad.mdt');
    }

    public function stop_panic()
    {
        auth()->user()->active_unit->update(['is_panic' => false, 'status' => 'AVL']);

        return redirect()->route('cad.mdt');
    }

    public function clear_panic()
    {
        $active_panic_units = ActiveUnit::where('is_panic', '1')->get();

        foreach ($active_panic_units as $active_unit) {
            $active_unit->update(['is_panic' => false, 'status' => 'AVL']);
        }

        return redirect()->route('cad.mdt');
    }

    private function sync_discord_roles()
    {
        if (get_setting('use_discord_department_roles')) {
            $response = Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/members/' . auth()->user()->id);

            $user_roles = json_decode($response->body())->roles;

            $department_role_ids = Department::get(['id', 'discord_role_id'])->pluck('discord_role_id', 'id')->toArray();

            foreach ($department_role_ids as $department_id => $discord_role_id) {
                if (!is_null($discord_role_id) && in_array($discord_role_id, array_values($user_roles))) {
                    $user_department = UserDepartment::where('user_id', auth()->user()->id)
                        ->where('department_id', $department_id)->get()->first();

                    if (!$user_department) {
                        $new_user_department = UserDepartment::create([
                            'user_id' => auth()->user()->id,
                            'department_id' => $department_id,
                            'rank' => 'NEEDS SET',
                            'badge_number' => 'NEEDS SET',
                        ]);
                    }
                } else {
                    $user_department = UserDepartment::where('user_id', auth()->user()->id)
                        ->where('department_id', $department_id)->get()->first();

                    if ($user_department) {
                        $officer = Officer::where('user_department_id', $user_department->id)->get()->first();
                        if ($officer) {
                            $officer->delete();
                        }
                        $user_department->delete();
                    }
                }
            }
        }
    }
}
