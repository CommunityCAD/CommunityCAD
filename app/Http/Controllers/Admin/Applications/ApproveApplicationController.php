<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApproveApplicationController extends Controller
{
    public function __invoke(Application $application)
    {

        abort_unless(Gate::allows('application_action'), 403);

        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application Approved.'
        ]);

        $application->update(['status' => 3]);

        return redirect()->route('admin.application.index', 1)->with('alerts', [['message' => 'Application Approved.', 'level' => 'success']]);
    }
}
