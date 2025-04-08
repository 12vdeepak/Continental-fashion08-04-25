<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('admin.changepassword.changepassword');
    }

    public function changePasswordUpdate(ChangePasswordRequest $request)
    {
        // Update the password
        $user = Auth::user();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('password.change.index')->with('message', 'Password changed successfully.');
    }
}
