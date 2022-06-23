<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function Login(Request $request)
    {

        $request->validate([
            'email'=>"required|email",
            'password'=>"required"
        ]);

        $credentials = ['email'=>$request->input('email'),'password'=>$request->input('password')];
        if(auth()->attempt($credentials)){
            $this->success("You Are LogIn Successfully");
            return redirect()->route('home');
        }
        $this->error("Email Or Password is not Matched");
        return redirect()->back();
    }

    public function showLoginForm()
    {
       return view('auth.login');
    }
    public function logout()
    {
       auth()->logout();
       return redirect()->route('showLoginForm');
    }
}