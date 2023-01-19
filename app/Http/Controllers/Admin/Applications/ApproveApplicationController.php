<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveApplicationController extends Controller
{
    public function __invoke(Application $application)
    {

        $current_comments = $application->comments;

        if (empty($current_comments)) {
            $comments = array();
        } else {
            $comments = json_decode($current_comments);
        }

        $comments[] = [
            'time' => time(),
            'user' => Auth::user()->id,
            'comments' => "Approved Application",
        ];

        $new_comments = json_encode($comments);

        $application->update(['status' => 3, 'comments' => $new_comments]);

        return redirect()->route('admin.application.index', 1)->with('alerts', [['message' => 'Application Approved.', 'level' => 'success']]);
    }
}
