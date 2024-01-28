<?php

namespace App\Http\Controllers\Civilian\Business;

use App\Models\BusinessEmployee;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Civilian;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BusinessEmployeeController extends Controller
{

    public function approve_interview(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->update(['role' => 2]);
        $businessEmployee->touch('created_at');
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Interview Approved.', 'level' => 'success']]);
    }

    public function promote_to_manager(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->update(['role' => 3]);
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Employee Promoted.', 'level' => 'success']]);
    }

    public function promote_to_owner(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->update(['role' => 4]);
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Employee Promoted.', 'level' => 'success']]);
    }

    public function demote_to_manager(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->update(['role' => 3]);
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Employee Demoted.', 'level' => 'success']]);
    }

    public function demote_to_employee(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->update(['role' => 2]);
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Employee Demoted.', 'level' => 'success']]);
    }

    public function deny_interview(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->delete();
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Interview Denied.', 'level' => 'success']]);
    }

    public function quit(Business $business, BusinessEmployee $businessEmployee)
    {
        $businessEmployee->delete();
        return redirect()->route('civilian.businesses.index')->with('alerts', [['message' => 'You have quit.', 'level' => 'success']]);
    }

    public function apply(Business $business, Request $request)
    {
        if (Civilian::where('id', $request->civilian_id)->count() != 1) {
            return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Civilian not a citizen.', 'level' => 'error']]);
        }

        if (BusinessEmployee::where('civilian_id', $request->civilian_id)->where('business_id', $business->id)->count() != 0) {
            return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Civilian is already an employee.', 'level' => 'error']]);
        }

        BusinessEmployee::create([
            'business_id' => $business->id,
            'civilian_id' => $request->civilian_id,
            'role' => 1,
        ]);
        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'You have quit.', 'level' => 'success']]);
    }

    public function transfer_ownership(Business $business, Request $request)
    {
        $new_owner_id = $request->owner_id;
        $old_owner_id = $business->owner_id;

        $new_owner = Civilian::where('id', $new_owner_id)->get()->first();
        $old_owner = Civilian::where('id', $old_owner_id)->get()->first();

        if (!$new_owner) {
            return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Owner is not a citizen.', 'level' => 'error']]);
        }

        $business->update(['owner_id' => $new_owner]);


        return redirect()->route('civilian.businesses.show', $business->id)->with('alerts', [['message' => 'Owner updated.', 'level' => 'success']]);
    }
}
