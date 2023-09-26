<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Loa;
use Illuminate\Contracts\View\View;

class LoaController extends Controller
{
    public function index($status = 0): View
    {
        $loas = Loa::all();

        switch ($status) {
            case 1:
                $page_title = 'Pending LOA Requests';
                $loas = $loas->where('status', 'Pending');
                break;
            case 2:
                $page_title = 'Approved LOA Requests';
                $loas = $loas->where('status', 'Approved');
                break;
            case 3:
                $page_title = 'Denied LOA Requests';
                $loas = $loas->where('status', 'Denied');
                break;
            default:
                $page_title = 'All LOA Requests';

                break;
        }

        return view('staff.loa.index', compact('loas', 'page_title'));
    }

    public function show(Loa $loa): View
    {
        $histories = History::where('subject_type', 'loa')->where('subject_id', $loa->id)->orderBy('created_at', 'desc')->get();

        return view('staff.loa.show', compact('loa', 'histories'));
    }

    public function approve(Loa $loa)
    {
        History::create([
            'subject_type' => 'loa',
            'subject_id' => $loa->id,
            'user_id' => auth()->user()->id,
            'description' => 'LOA Approved.',
        ]);

        $loa->update(['status' => 'Approved']);

        return redirect()->route('staff.loa.index', 1)->with('alerts', [['message' => 'LOA Approved.', 'level' => 'success']]);
    }

    public function deny(Loa $loa)
    {
        History::create([
            'subject_type' => 'loa',
            'subject_id' => $loa->id,
            'user_id' => auth()->user()->id,
            'description' => 'LOA Denied.',
        ]);

        $loa->update(['status' => 'Denied']);

        return redirect()->route('staff.loa.index', 1)->with('alerts', [['message' => 'LOA Denied.', 'level' => 'success']]);
    }
}
