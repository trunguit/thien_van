<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthencationController extends Controller
{
    public function login()
    {
        if(auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Thông tin đăng nhập không chính xác');
        }
    }
}
