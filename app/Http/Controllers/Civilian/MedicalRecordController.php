<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\MedicalRecordCreateRequest;
use App\Models\Civilian;
use App\Models\Civilian\MedicalRecord;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{


    public function create(Civilian $civilian): View
    {
        return view('civilian.medical_records.create', compact('civilian'));
    }

    public function store(MedicalRecordCreateRequest $request, Civilian $civilian): RedirectResponse
    {
        $input = $request->validated();
        $input['civilian_id'] = $civilian->id;
        MedicalRecord::create($input);
        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Record Added.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian, MedicalRecord $medicalRecord): RedirectResponse
    {
        $medicalRecord->delete();
        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Record Deleted.', 'level' => 'success']]);
    }
}
