<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            if (Auth::user()->rule == 0) {
                return redirect('/');
            } else {
                return redirect('admin');
            }
        } else {
            return view('auth.login');
        }
    }

    public function checkLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('auth.login');
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            if (Auth::user()->rule != 0) {
                Auth::logout();
                return view('auth.login');
            } else {
                Auth::logout();
                return redirect('/');
            }
        }
    }
}
