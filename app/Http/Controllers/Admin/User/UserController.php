<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\DisciplinaryAction;
use App\Models\Admin\User\UserAccommodation;
use App\Models\Admin\User\UserNotes;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index');
    }

    public function show(User $user): mixed
    {
        if (! in_array(auth()->user()->id, config('cad.owner_ids'))) {
            if ($user->is_protected_user && ! auth()->user()->is_super_user) {
                return redirect()->route('admin.users.index')->with('alerts', [['message' => $user->preferred_name.' is a protected user. You can not edit them.', 'level' => 'error']]);
            }

            if ($user->is_super_user && ! auth()->user()->is_super_user) {
                return redirect()->route('admin.users.index')->with('alerts', [['message' => $user->preferred_name.' is a super user. You can not edit them.', 'level' => 'error']]);
            }
        }

        $histories = History::where('subject_type', 'user')->where('subject_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        $notes = UserNotes::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();
        $accommodations = UserAccommodation::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();
        $roles = Role::all(['title', 'id']);
        $user->load('roles');
        $da_types = DB::table('disciplinary_action_types')->get(['id', 'name'])->pluck('name', 'id')->toArray();
        $das = DisciplinaryAction::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.users.show', compact('user', 'histories', 'notes', 'accommodations', 'da_types', 'das', 'roles'));
    }
}
