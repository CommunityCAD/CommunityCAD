<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Business;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BusinessController extends Controller
{

    public function index($status = 0): View
    {
        $businesses = Business::all();
        switch ($status) {
            case 1:
                $page_title = 'Pending Businesses';
                $businesses = $businesses->where('status', 1);
                break;
            case 2:
                $page_title = 'Approved Businesses';
                $businesses = $businesses->where('status', 2);
                break;
            case 3:
                $page_title = 'Denied Businesses';
                $businesses = $businesses->where('status', 3);
                break;
            case 4:
                $page_title = 'Suspended Businesses';
                $businesses = $businesses->where('status', 4);
                break;
            default:
                $page_title = 'All Business Requests';

                break;
        }

        return view('supervisor.businesses.index', compact('businesses', 'page_title'));
    }

    public function show(Business $business): View
    {
        $business->with('employees');
        return view('supervisor.businesses.show', compact('business'));
    }

    public function approve(Business $business)
    {
        History::create([
            'subject_type' => 'business',
            'subject_id' => $business->id,
            'user_id' => auth()->user()->id,
            'description' => 'Business Approved.',
        ]);

        $business->update(['status' => 2]);

        return redirect()->route('supervisor.businesses.index', 1)->with('alerts', [['message' => 'Business Approved.', 'level' => 'success']]);
    }

    public function deny(Business $business)
    {
        History::create([
            'subject_type' => 'business',
            'subject_id' => $business->id,
            'user_id' => auth()->user()->id,
            'description' => 'Business Denied.',
        ]);

        $business->update(['status' => 3]);

        return redirect()->route('supervisor.businesses.index', 1)->with('alerts', [['message' => 'Business Denied.', 'level' => 'success']]);
    }

    public function suspend(Business $business)
    {
        History::create([
            'subject_type' => 'business',
            'subject_id' => $business->id,
            'user_id' => auth()->user()->id,
            'description' => 'Business Suspended.',
        ]);

        $business->update(['status' => 4]);

        return redirect()->route('supervisor.businesses.index', 1)->with('alerts', [['message' => 'Business Suspended.', 'level' => 'success']]);
    }

    public function destroy(Business $business)
    {
        History::create([
            'subject_type' => 'business',
            'subject_id' => $business->id,
            'user_id' => auth()->user()->id,
            'description' => 'Business Deleted.',
        ]);

        foreach ($business->vehicles as $vehicle) {
            $vehicle->delete();
        }

        foreach ($business->employees as $employee) {
            $employee->delete();
        }

        $business->delete();

        return redirect()->route('supervisor.businesses.index', 1)->with('alerts', [['message' => 'Business Deleted.', 'level' => 'success']]);
    }
}
