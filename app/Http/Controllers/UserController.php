<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Get()
    {
        return view('cadastro');
    }

    public function Post(Request $request)
    {

        foreach(User::all() as $User){
            if($User->email == $request->email)
                return redirect()->route('user.index', 'user')->with('warning', 'Email já cadastrado, tente com outro email');

            if($User->cpf_cnpj == $request->cpf_cnpj)
                return redirect()->route('user.index', 'user')->with('warning', 'Documento já cadastrado, tente com outro documento');
        }

        $User = new User();
        $User->name = $request->nome;
        $User->email = $request->email;
        $User->cpf_cnpj = $request->cpf_cnpj;
        $User->password = Hash::make($request->password);
        $User->balance = 0;
        $User->save();

        $values = $request->only(['email', 'password']);

        if(Auth::attempt($values))
            return redirect()->route('dashboard');
    }

    public function Logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
