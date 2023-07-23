<?php

namespace App\Http\Controllers\Admin\PenalCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PenalCode\PenalCodeTitleRequest;
use App\Models\PenalCodeTitle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PenalCodeTitleController extends Controller
{
    public function index(): View
    {
        $titles = PenalCodeTitle::orderBy('number', 'asc')->get();

        return view('admin.penalcode.title.index', compact('titles'));
    }

    public function create(): View
    {
        return view('admin.penalcode.title.create');
    }

    public function store(PenalCodeTitleRequest $request): RedirectResponse
    {
        PenalCodeTitle::create($request->validated());

        return redirect()->route('admin.penalcode.title.index')->with('alerts', [['message' => 'Title created.', 'level' => 'success']]);
    }

    public function edit(PenalCodeTitle $title): View
    {
        return view('admin.penalcode.title.edit', compact('title'));
    }

    public function update(PenalCodeTitleRequest $request, PenalCodeTitle $title): RedirectResponse
    {
        $title->update($request->validated());

        return redirect()->route('admin.penalcode.title.index')->with('alerts', [['message' => 'Title updated.', 'level' => 'success']]);
    }

    public function destroy(PenalCodeTitle $title): RedirectResponse
    {
        $title->delete();

        return redirect()->route('admin.penalcode.title.index')->with('alerts', [['message' => 'Title deleted.', 'level' => 'success'], ['message' => 'All codes under this title have been deleted.', 'level' => 'success']]);
    }
}
