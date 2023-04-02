<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Department;
use App\Models\History;
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
        abort_unless(auth()->user()->account_status == 1, 403);

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $application = Application::create($data);

        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application Created.'
        ]);

        if (auth()->user()->age < get_setting('minimum_age')) {
            History::create([
                'subject_type' => 'application',
                'subject_id' => $application->id,
                'user_id' => 0,
                'description' => 'Application Auto Flagged Due To Age Requirement.'
            ]);

            $application->update(['status' => 2]);
        }

        auth()->user()->update(['account_status' => 2]);


        return redirect()->route('account.show', auth()->user()->id)->with('alerts', [['message' => 'Application Created.', 'level' => 'success']]);
    }

    public function show(Application $application): View
    {
        if (auth()->user()->id != $application->user_id) {
            return abort(404);
        }
        return view('applications.show', compact('application'));
    }

    public function update(Request $request, Application $application): RedirectResponse
    {

        $validated = $request->validate([
            'status' => 'required|numeric|in:6',
        ]);

        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application (' . $application->id . ') Withdrawn.'
        ]);

        $application->update($validated);

        auth()->user()->update(['account_status' => 1]);

        History::create([
            'subject_type' => 'user',
            'subject_id' => auth()->user()->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application (' . $application->id . ') Withdrawn.'
        ]);

        return redirect()->route('account.show', auth()->user()->id)->with('alerts', [['message' => 'Application Withdrawn.', 'level' => 'success']]);
    }
}
