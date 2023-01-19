<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DenyApplicationController extends Controller
{
    public function edit(Application $application)
    {
        return view('admin.applications.deny_application', compact('application'));
    }

    public function store(Request $request, Application $application)
    {
        $validator = Validator::make($request->all(), [
            'reapply' => 'required',
            'reapply_date' => 'required|date',
            'denied_reason' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $new_comment = $application->generateComment("Denied Application Reason:" . $request->denied_reason);
        $application->update(['status' => 5, 'comments' => $new_comment]);

        $user_history = $application->user->generateHistory("Application {{$application->id}} Denied Reason:" . $request->denied_reason);
        $application->user->update([
            'account_status' => 1,
            'reapply' => $request->reapply,
            'reapply_date' => $request->reapply_date,
            'denied_reason' => $request->denied_reason,
            'history' => $user_history,
        ]);

        return redirect()->route('admin.application.index', 1)->with('alerts', [['message' => 'Application (' . $application->id . ') Denied.', 'level' => 'success']]);
    }
}
