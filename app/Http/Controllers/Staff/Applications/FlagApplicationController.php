<?php

namespace App\Http\Controllers\Staff\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class FlagApplicationController extends Controller
{
    public function edit(Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        return view('staff.application.flag_application', compact('application'));
    }

    public function store(Request $request, Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        $validator = Validator::make($request->all(), [
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application Flagged. Reason: ' . $request->reason,
        ]);

        $application->update(['status' => 2]);

        return redirect()->route('staff.application.index', 1)->with('alerts', [['message' => 'Application (' . $application->id . ') Flagged.', 'level' => 'success']]);
    }
}
