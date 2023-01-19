<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index($status = 0): View
    {
        if ($status > 7) {
            return abort(404);
        }

        if ($status == 0) {
            $applications = Application::orderBy('status', 'desc')->get();
            $page_title = "All Applications";
        } else {
            $applications = Application::where('status', $status)->orderBy('created_at', 'asc')->get();

            switch ($status) {
                case 1:
                    $page_title = "Pending Review Applications";
                    break;
                case 2:
                    $page_title = "Pending Admin Review Applications";
                    break;
                case 3:
                    $page_title = "Pending Interview Applications";
                    break;
                case 4:
                    $page_title = "Approved Applications";
                    break;
                case 5:
                    $page_title = "Denied Applications";
                    break;
                case 6:
                    $page_title = "Withdrawn Applications";
                    break;
            }
        }

        return view('admin.applications.index', compact('applications', 'page_title'));
    }

    public function show(Application $application): View
    {
        return view('admin.applications.show', compact('application'));
    }

    public function edit(Application $application): View
    {
        return view('applications.edit', compact('applications'));
    }

    public function update(Request $request, Application $application): RedirectResponse
    {
        $application->update($request->validated());
        return redirect()->route('applications.index')->with('success', 'Message');
    }
}
