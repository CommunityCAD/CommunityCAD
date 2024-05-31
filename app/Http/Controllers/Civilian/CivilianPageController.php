<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\Ticket;

class CivilianPageController extends Controller
{
    public function home()
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->with(['tickets'])->orderBy('id', 'asc')->get();

        return view('civilian.home', compact('civilians'));
    }

    public function show_ticket(Ticket $ticket)
    {
        $totals = [
            'in_game_jail_time' => 0,
            'cad_jail_time' => 0,
            'fine' => 0,
        ];

        foreach ($ticket->charges as $charge) {
            $totals['in_game_jail_time'] = $totals['in_game_jail_time'] + $charge->in_game_jail_time;
            $totals['cad_jail_time'] = $totals['cad_jail_time'] + $charge->cad_jail_time;
            $totals['fine'] = $totals['fine'] + $charge->fine;
        }

        return view('civilian.ticket.show', compact('ticket', 'totals'));
    }
}
