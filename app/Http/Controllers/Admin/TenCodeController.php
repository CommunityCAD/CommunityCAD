<?php

namespace App\Http\Controllers\Admin;

use App\Models\TenCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class TenCodeController extends Controller
{

    public function index(): View
    {
        $ten_codes = TenCode::orderBy('code', 'asc')->get();
        return view('admin.ten_code.index', compact('ten_codes'));
    }

    public function create(): View
    {
        return view('admin.ten_code.create');
    }

    public function store(TenCodeRequest $request): RedirectResponse
    {
        TenCode::create($request->validated());
        return redirect()->route('admin.ten_code.create')->with('alerts', [['message' => 'Code Created.', 'level' => 'success']]);
    }

    public function show(TenCode $tenCode): View
    {
        return view('admin.ten_code.show', compact('tenCodes'));
    }

    public function destroy(TenCode $tenCode): RedirectResponse
    {
        $tenCode->delete();
        return redirect()->route('admin.ten_code.index')->with('alerts', [['message' => 'Code Deleted.', 'level' => 'success']]);
    }
}
