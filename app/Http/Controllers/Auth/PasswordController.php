<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        if (is_null(auth()->user()->password)) {
            $validated = $request->validate([
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            if (Hash::check($validated['current_password'], auth()->user()->password)) {
                $request->user()->update([
                    'password' => Hash::make($validated['password']),
                ]);
            } else {
                return redirect()->route('portal.user.settings.index')->with('alerts', [['message' => 'Wrong Password.', 'level' => 'error']]);
            }
        }
        return redirect()->route('portal.user.settings.index')->with('alerts', [['message' => 'Password Updated.', 'level' => 'success']]);
    }
}
