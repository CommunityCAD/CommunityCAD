<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\PenalCodeTitle;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function create(Civilian $civilian): View
    {
        $penal_code_title = PenalCodeTitle::orderBy('number', 'asc')->get();
        return view('cad.ticket.create', compact('penal_code_title', 'civilian'));
    }

    public function store(Request $request): RedirectResponse
    {
        Ticket::create($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Message');
    }

    public function show(Ticket $ticket): View
    {
        return view('tickets.show', compact('tickets'));
    }

    public function edit(Ticket $ticket): View
    {
        return view('tickets.edit', compact('tickets'));
    }

    public function update(Request $request, Ticket $ticket): RedirectResponse
    {
        $ticket->update($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Message');
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Message');
    }
}
