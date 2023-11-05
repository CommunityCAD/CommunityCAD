<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CivilianPleaController extends Controller
{
    public function plea_guilty(Ticket $ticket)
    {
        $ticket->update(['plea_type' => 1]);

        return redirect()->route('civilian.civilians.show', $ticket->civilian->id)->with('alerts', [['message' => 'Plead Guilty', 'level' => 'success']]);
    }

    public function plea_not_guilty(Ticket $ticket)
    {
        $ticket->update(['plea_type' => 2]);

        return redirect()->route('civilian.civilians.show', $ticket->civilian->id)->with('alerts', [['message' => 'Plead Not-guilty', 'level' => 'success']]);
    }
}
