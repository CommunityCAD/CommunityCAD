<?php

namespace App\Http\Controllers\Staff\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class DenyInterviewController extends Controller
{
    public function edit(Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        return view('staff.application.deny_interview', compact('application'));
    }

    public function store(Request $request, Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        $validator = Validator::make($request->all(), [
            'reapply' => 'required',
            'reapply_date' => 'required|date',
            'denied_reason' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $application->update(['status' => 5]);
        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Interview Denied. Reason: '.$request->denied_reason,
        ]);

        $application->user->update([
            'account_status' => 1,
            'reapply' => $request->reapply,
            'reapply_date' => $request->reapply_date,
            'denied_reason' => $request->denied_reason,
        ]);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $application->user->id,
            'user_id' => auth()->user()->id,
            'description' => "Interview ({$application->id}) Denied Reason: ".$request->denied_reason,
        ]);

        return redirect()->route('staff.application.index', 1)->with('alerts', [['message' => 'Interview ('.$application->id.') Denied.', 'level' => 'success']]);
    }
}
