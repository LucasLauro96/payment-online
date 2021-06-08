<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Get($tipo)
    {
        return view('cadastro', compact('tipo'));
    }

    public function Post(Request $request)
    {
        $User = new User();
        $User->name = $request->nome;
        $User->email = $request->email;
        $User->cpf_cnpj = isset($request->cpf)? $request->cpf : $request->cnpj;
        $User->password = Hash::make($request->password);
        $User->save();
    }
}
