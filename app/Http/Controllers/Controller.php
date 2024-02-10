<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirect_to_cad()
    {
        switch (auth()->user()->active_unit->user_department->department->type) {
            case 1:
                return redirect()->route('cad.mdt');
                break;
            case 2:
                return redirect()->route('cad.cad');
                break;
            case 4:
                return redirect()->route('cad.fire_cad');
                break;

            default:
                abort(403);
                break;
        }
    }
}
