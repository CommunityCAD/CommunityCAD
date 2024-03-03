<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class NotguiltyController extends Controller
{
    public function index()
    {
        $non_guilty = Ticket::where('plea_type', 2)->with('civilian')->get();

        return view('courthouse.notguilty.index', compact('non_guilty'));
    }
}
