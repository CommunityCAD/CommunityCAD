<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Loa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserLoaController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $input = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'min:150|required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Loa::create($input);
        return redirect()->route('portal.user.settings.index')->with('alerts', [['message' => 'Setting LOA request submitted.', 'level' => 'success']]);
    }

    public function show(Loa $loa): View
    {

        $loa_history = History::where('subject_type', 'loa')->where('subject_id', $loa->id)->latest()->get();

        return view('portal.user.loa.show', compact('loa', 'loa_history'));
    }

    public function destroy(Loa $loa): RedirectResponse
    {
        $loa->delete();
        return redirect()->route('loas.index')->with('success', 'Message');
    }
}
