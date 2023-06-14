<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $announcements = Announcement::get();

        return view('staff.announcement.index', compact('announcements'));
    }

    public function create(): View
    {
        $departments = Department::get(['name', 'slug', 'id', 'logo']);

        return view('staff.announcement.create', compact('departments'));
    }

    public function store(AnnouncementRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Announcement::create($data);

        return redirect()->route('staff.announcement.index')->with('alerts', [['message' => 'Announcement Created.', 'level' => 'success']]);
    }

    public function edit(Announcement $announcement): View
    {
        $departments = Department::get(['name', 'slug', 'id', 'logo']);

        return view('staff.announcement.edit', compact('announcement', 'departments'));
    }

    public function update(AnnouncementRequest $request, Announcement $announcement): RedirectResponse
    {
        $announcement->update($request->validated());

        return redirect()->route('staff.announcement.index')->with('alerts', [['message' => 'Announcement Updated.', 'level' => 'success']]);
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();

        return redirect()->route('staff.announcement.index')->with('alerts', [['message' => 'Announcement Deleted.', 'level' => 'success']]);
    }
}
