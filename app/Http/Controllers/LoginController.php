<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\Models\User;

class LoginController extends Controller
{

    public function login(LoginForm $request)
    {
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            if (Auth::user()->rule == 0) {
                if (session()->get('cart')) {
                    return redirect('checkout');
                }
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
            Auth::logout();
        }
        return redirect('/');
    }

    public function userRegister(RegisterForm $request)
    {
        try {
            $user = new User;
            $user->l_name = $request->l_name;
            $user->f_name = $request->f_name;
            $user->email = $request->f_name;
            $user->password = bcrypt($request->password);
            $user->save();
            session()->flash('success', trans('sites.register_success'));
            return redirect('login');
        } catch (\Exception $e) {
            session()->flash('fail', trans('sites.register_fail'));
            return redirect('register');
        }
    }

    public function checkUserRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }
}
