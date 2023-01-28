<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ApproveInterviewController extends Controller
{
    public function __invoke(Application $application)
    {

        abort_unless(Gate::allows('application_action'), 403);

        $new_comment = $application->generateComment("Interview Approved");
        $application->update(['status' => 4, 'comments' => $new_comment]);

        $user_history = $application->user->generateHistory("Interview {{$application->id}} Approved");
        $application->user->update([
            'account_status' => 3,
            'reapply' => null,
            'reapply_date' => null,
            'denied_reason' => null,
            'history' => $user_history,
        ]);

        $user_history = $application->user->generateHistory("User populated into system.");
        $application->user->update([
            'history' => $user_history,
            'member_join_date' => now(),
            'main_department_id' => $application->department->id,
        ]);


        return redirect()->route('admin.application.index', 1)->with('alerts', [['message' => 'Interview (' . $application->id . ') Approved.', 'level' => 'success'], ['message' => 'User populated into system.', 'level' => 'success']]);
    }
}
