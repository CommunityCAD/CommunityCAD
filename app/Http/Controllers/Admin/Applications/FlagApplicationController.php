<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class FlagApplicationController extends Controller
{
    public function edit(Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        return view('admin.applications.flag_application', compact('application'));
    }

    public function store(Request $request, Application $application)
    {
        abort_unless(Gate::allows('application_action'), 403);

        $validator = Validator::make($request->all(), [
            'reason' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $new_comment = $application->generateComment("Flagged Application Reason:" . $request->reason);
        $application->update(['status' => 2, 'comments' => $new_comment]);

        return redirect()->route('admin.application.index', 1)->with('alerts', [['message' => 'Application (' . $application->id . ') Flagged.', 'level' => 'success']]);
    }
}
