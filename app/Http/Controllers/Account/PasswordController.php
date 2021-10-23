<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    // auth middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('password.edit');
    }

    public function update()
    {
        // dd('Changed');
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('success',"You are changed your password");
        } else {
            // return back()->with('error','You have to fill your old password');
            return back()->withErrors(['old_password' => 'Make sure you fill yout current password']);
        }
    }
}
