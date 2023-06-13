<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\History;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    public function index($status = 0): View
    {

        abort_unless(Gate::allows('application_access'), 403);

        if ($status == 2) {
            abort_unless(Gate::allows('application_admin_review'), 403);
        }

        if ($status > 7) {
            return abort(404);
        }

        if ($status == 0) {
            $applications = Application::orderBy('status', 'asc')->get();
            $page_title = 'All Applications';
        } else {
            $applications = Application::where('status', $status)->orderBy('created_at', 'desc')->get();

            switch ($status) {
                case 1:
                    $page_title = 'Pending Review Applications';
                    break;
                case 2:
                    $page_title = 'Pending Admin Review Applications';
                    break;
                case 3:
                    $page_title = 'Pending Interview Applications';
                    break;
                case 4:
                    $page_title = 'Approved Applications';
                    break;
                case 5:
                    $page_title = 'Denied Applications';
                    break;
                case 6:
                    $page_title = 'Withdrawn Applications';
                    break;
            }
        }

        return view('admin.applications.index', compact('applications', 'page_title'));
    }

    public function show(Application $application): View
    {
        abort_unless(Gate::allows('application_access'), 403);

        if ($application->status == 2) {
            abort_unless(Gate::allows('application_admin_review'), 403);
        }

        $histories = History::where('subject_type', 'application')->where('subject_id', $application->id)->orderBy('created_at', 'desc')->get();

        return view('admin.applications.show', compact('application', 'histories'));
    }
}
