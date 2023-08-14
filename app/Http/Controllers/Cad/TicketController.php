<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\TicketRequest;
use App\Models\Charges;
use App\Models\Civilian;
use App\Models\PenalCodeTitle;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function show(Ticket $ticket): View
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

        return view('cad.ticket.show', compact('ticket', 'totals'));
    }

    public function create(Civilian $civilian): View
    {
        return view('cad.ticket.create', compact('civilian'));
    }

    public function store(Civilian $civilian, TicketRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['civilian_id'] = $civilian->id;
        $data['offense_occured_at'] = $data['date'] . ' ' . $data['time'] . ':00';

        unset($data['time'], $data['date']);

        if (isset($data['license_was_suspended'])) {
            $data['license_was_suspended'] = true;
        }

        if (isset($data['vehicle_was_impounded'])) {
            $data['vehicle_was_impounded'] = true;
        }

        if (isset($data['showed_id'])) {
            $data['showed_id'] = true;
        }

        $ticket = Ticket::create($data);

        return redirect()->route('cad.ticket.add_charges', $ticket->id);
    }


    public function add_charges(Ticket $ticket): View
    {
        // dd($ticket->charges->penal_code_id);
        return view('cad.ticket.edit', compact('ticket'));
    }

    public function add_charges_store(Ticket $ticket, Request $request)
    {
        if ($request->penal_code_id == 0) {
            return redirect()->route('cad.ticket.add_charges', $ticket->id)->with('alerts', [['message' => 'You must choose a charge.', 'level' => 'error']]);
        }

        $validated = $request->validate([
            'in_game_jail_time' => 'required|numeric',
            'fine' => 'required|numeric',
            'cad_jail_time' => 'required|numeric',
            'description' => 'required',
            'penal_code_id' => 'required|numeric',
        ]);

        $validated['ticket_id'] = $ticket->id;

        Charges::create($validated);
        return redirect()->route('cad.ticket.add_charges', $ticket->id);
    }

    public function sign_ticket(Ticket $ticket)
    {
        return redirect()->route('cad.ticket.show', $ticket->id);
    }
}