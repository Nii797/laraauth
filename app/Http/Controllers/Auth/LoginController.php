<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        // dd('Hello');
        $attr = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($attr);

        // cara ke 1
        // if (Auth::attempt($attr)) {
        //     return redirect()->intended('/');
        // }

        // cara ke 2
        $user = User::whereEmail(request('email'))->first();
        // dd($user);
        if ($user) {
            Auth::login($user);
            return redirect()->intended('/');
        } else {
            return back()->with('error', 'Kami tidak menemukan kredinalitas yang anda masukan');
        }

    }
}
