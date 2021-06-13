@extends('layout.master')

@section('content')
<script src="{{ asset('assets/js/user.js') }}"></script>
    <div id="login">
        <div class="form-login">
            <div class="form-header">
                <h1>Cadastre-se</h1>
            </div>
            <form action="{{route('user.post')}}" method="POST">
                @csrf
                @if(session('warning'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control mask-cpf-cnpj" id="cpf_cnpj" name="cpf_cnpj" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="input-password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-button">
                    <a href="#" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
