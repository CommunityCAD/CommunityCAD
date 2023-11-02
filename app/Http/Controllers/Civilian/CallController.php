<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\CallStoreRequest;
use App\Models\Cad\Call;
use App\Models\Cad\CallNatures;
use App\Models\Civilian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CallController extends Controller
{
    public function create(Civilian $civilian): View
    {
        $call_natures = CallNatures::NATURECODES;

        return view('civilian.call.create', compact('civilian', 'call_natures'));
    }

    public function store(Civilian $civilian, CallStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['priority'] = '1';
        $input['source'] = '911 CALL';
        $input['status'] = 'RCVD';
        $input['units'] = '{"data":[]}';

        $call = Call::create($input);

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => '911 Call Created', 'level' => 'success']]);
    }
}
