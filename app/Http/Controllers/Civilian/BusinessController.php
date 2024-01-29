<?php

namespace App\Http\Controllers\Civilian;

use App\Models\Business;
use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\BusinessStoreRequest;
use App\Models\BusinessEmployee;
use App\Models\Civilian;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BusinessController extends Controller
{

    public function index(): View
    {
        $businesses = Business::with(['employees'])->get();

        return view('civilian.businesses.index', compact('businesses'));
    }

    public function create(): View
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get(['id', 'first_name', 'last_name']);
        return view('civilian.businesses.create', compact('civilians'));
    }

    public function store(BusinessStoreRequest $request): RedirectResponse
    {
        $business = Business::create($request->validated());

        BusinessEmployee::create([
            'business_id' => $business->id,
            'civilian_id' => $business->owner_id,
            'role' => 5,
        ]);
        return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'Business is pending approval.', 'level' => 'success']]);
    }

    public function show(Business $business)
    {
        $business->with('employees');
        $civilians = Civilian::where('user_id', auth()->user()->id)->without(['licenses', 'medical_records', 'vehicles', 'weapons'])->get();

        if ($business->status == 1) {
            return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'Business is still pending approval.', 'level' => 'error']]);
        }

        $is_owner = false;
        $is_manager = false;
        $is_locked = false;

        foreach ($business->employees as $employee) {
            if ($employee->civilian->user_id == auth()->user()->id) {
                if ($employee->role == 3) {
                    $is_manager = true;
                }

                if ($employee->role == 4) {
                    $is_owner = true;
                }
            }
        }

        if ($business->owner->user_id == auth()->user()->id) {
            $is_owner = true;
            $is_manager = true;
        }

        if ($business->status != 2) {
            if (!$is_owner) {
                return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'Business can only be viewed by owner.', 'level' => 'error']]);
            }
            $is_locked = true;
        }

        return view('civilian.businesses.show', compact('business', 'is_owner', 'is_manager', 'is_locked', 'civilians'));
    }

    public function edit(Business $business): View
    {
        return view('businesss.edit', compact('businesss'));
    }

    public function update(Request $request, Business $business): RedirectResponse
    {
        $business->update($request->validated());
        return redirect()->route('businesss.index')->with('success', 'Message');
    }

    public function destroy(Business $business): RedirectResponse
    {
        $business->delete();
        return redirect()->route('businesss.index')->with('success', 'Message');
    }
}
