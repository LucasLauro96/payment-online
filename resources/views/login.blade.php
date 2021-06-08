@extends('layout.master')

@section('content')
    <div id="login">
        <div class="form-login">
            <div class="form-header">
                <h1>Fazer login{{ $tipo != 'cnpj'? '' : ' como Logista' }}</h1>
            </div>
            <form action="{{route('login.post')}}" method="post">
                @csrf
                @if(session('warning'))
                    <div class="form-group">
                        <span class="badge bg-warning text-dark">{{ session('warning') }}</span>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-button">
                    <a href="#" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
