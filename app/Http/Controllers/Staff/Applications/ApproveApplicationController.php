<?php

namespace App\Http\Controllers\Staff\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Support\Facades\Gate;

class ApproveApplicationController extends Controller
{
    public function __invoke(Application $application)
    {
        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Application Approved.',
        ]);

        $application->update(['status' => 3]);

        return redirect()->route('staff.application.index', 1)->with('alerts', [['message' => 'Application Approved.', 'level' => 'success']]);
    }
}
