<?php

namespace App\Http\Controllers\Staff\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Support\Facades\Gate;

class ApproveInterviewController extends Controller
{
    public function __invoke(Application $application)
    {

        abort_unless(Gate::allows('application_action'), 403);

        $application->update(['status' => 4]);
        History::create([
            'subject_type' => 'application',
            'subject_id' => $application->id,
            'user_id' => auth()->user()->id,
            'description' => 'Interview Approved.',
        ]);

        $application->user->update([
            'account_status' => 3,
            'reapply' => null,
            'reapply_date' => null,
            'denied_reason' => null,
            'member_join_date' => now(),
        ]);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $application->user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Interview (' . $application->id . ') Approved. User populated into system.',
        ]);

        return redirect()->route('staff.application.index', 1)->with('alerts', [['message' => 'Interview (' . $application->id . ') Approved.', 'level' => 'success'], ['message' => 'User populated into system.', 'level' => 'success']]);
    }
}
