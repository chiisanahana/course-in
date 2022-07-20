<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $credentials = ['email' => $req['email'], 'password' => $req['password']];
        $remember_me = $req->has('remember_me') ? true : false;

        // dd(Auth::guard('user')->attempt($credentials, $remember_me));

        if (Auth::guard('user')->attempt($credentials, $remember_me)) {
            Alert::success('Success', 'Login successful!')->showConfirmButton('OK', '#025492');
            return redirect()->route('dashboard');
        } else if (Auth::guard('course')->attempt($credentials, $remember_me)) {
            Alert::success('Success', 'Login successful!')->showConfirmButton('OK', '#025492');
            return redirect()->route('dashboard');
        }
        Alert::error('Login failed', 'Please check your email or password!')->showConfirmButton('OK', '#025492');
        return redirect()->route('view-login');
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } else if (Auth::guard('course')->check()) {
            Auth::guard('course')->logout();
        }
        return redirect()->route('landing-page');
    }
}
