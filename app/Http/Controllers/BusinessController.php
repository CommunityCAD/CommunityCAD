<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\BusinessStoreRequest;
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
        Business::create($request->validated());
        return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'Business is pending approval.', 'level' => 'success']]);
    }

    public function show(Business $business)
    {
        $business->with('employees');

        if ($business->status == 1) {
            return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'Business is still pending approval.', 'level' => 'error']]);
        }

        return view('civilian.businesses.show', compact('business'));
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
