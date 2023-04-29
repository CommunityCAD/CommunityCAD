<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\DisciplinaryAction;
use App\Models\Admin\User\UserAccommodation;
use App\Models\Admin\User\UserNotes;
use App\Models\History;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(): View
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('account_status', 3)->get();
        return view('admin.users.index', compact('users'));
    }

    public function all_users(): View
    {
        abort_if(Gate::denies('user_advanced_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        return view('admin.users.advanced_index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Message');
    }

    public function show(User $user): View
    {
        $histories = History::where('subject_type', 'user')->where('subject_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        $notes = UserNotes::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();
        $accommodations = UserAccommodation::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();

        $da_types = DB::table('displinary_action_types')->select(['name', 'id'])->get();

        $das = DisciplinaryAction::where('receiver_id', $user->id)->with('giver_user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.users.show', compact('user', 'histories', 'notes', 'accommodations', 'da_types', 'das'));
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return redirect()->route('users.index')->with('success', 'Message');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Message');
    }
}
