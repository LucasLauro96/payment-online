@extends('layout.master')

@section('content')
    <div id="login">
        <div class="form-login">
            <div class="form-header">
                <h1>Cadastre-se</h1>
            </div>
            <form action="{{route('user.post')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                @if ($tipo == 'cpf')
                    <div class="form-group">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf">
                    </div>
                @else
                    <div class="form-group">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj">
                    </div>
                @endif
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="input-password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-button">
                    <a href="#" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
