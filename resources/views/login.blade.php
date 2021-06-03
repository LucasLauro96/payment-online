@extends('layout.master')

@section('content')
    <div id="login">
        <div class="form-login">
            <div class="form-header">
                <h1>Acesso com Logista</h1>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="input-login" class="form-label">E-mail ou CPF/CNPJ</label>
                    <input type="text" class="form-control" id="input-login" name="input-login">
                </div>
                <div class="form-group">
                    <label for="input-password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="input-password" name="input-password">
                </div>
                <div class="form-button">
                    <a href="#" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
