<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $admin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::check()) {
            if (Auth::user()->rule == 1) {
                return view('admin.master');
            } else {
                return view('sites.master');
            }
        }
    }
}
