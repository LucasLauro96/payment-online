<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Get()
    {
        return view('login');
    }

    public function Post(Request $request){
        $values = $request->only(['email', 'password']);

        if(Auth::attempt($values)){
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.index', 'user')->with('warning', 'Email ou Senha incorreta');
        }
    }
}
