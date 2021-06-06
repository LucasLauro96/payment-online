<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Cadastro($tipo)
    {
        return view('cadastro', compact('tipo'));
    }

    public function CadastroPost(Request $request)
    {
        $User = new User();
        $User->name = $request->nome;
        $User->email = $request->email;
        $User->cpf_cnpj = isset($request->cpf)? $request->cpf : $request->cnpj;
        $User->password = $request->password;
        $User->save();
    }
}
