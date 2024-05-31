<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class CourthousePageController extends Controller
{
    public function home()
    {
        return view('courthouse.home');
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

        return view('courthouse.ticket.show', compact('ticket', 'totals'));
    }
}
