<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function create(): View
    {

        $departments = Department::where('is_open_external', 1)->get(['name', 'id']);
        return view('applications.create', compact('departments'));
    }

    public function store(ApplicationRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $comments = array();
        $comments[] = [
            'time' => time(),
            'user' => "System",
            'comments' => "Application Generated",
        ];

        $data['comments'] = json_encode($comments);

        Application::create($data);

        Auth::user()->update(['account_status' => 2]);


        return redirect()->route('account.show', auth()->user()->id)->with('alerts', [['message' => 'Application Created.', 'level' => 'success']]);
    }

    public function show(Application $application): View
    {
        return view('applications.show', compact('application'));
    }

    public function update(Request $request, Application $application): RedirectResponse
    {

        $validated = $request->validate([
            'status' => 'required|numeric|between:1,6',
        ]);


        $application->update($validated);

        Auth::user()->update(['account_status' => 1]);

        return redirect()->route('account.show', auth()->user()->id)->with('alerts', [['message' => 'Application Withdrawn.', 'level' => 'success']]);
    }
}
