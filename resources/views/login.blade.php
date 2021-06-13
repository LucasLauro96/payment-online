@extends('layout.master')

@section('content')
    <div id="login">
        <div class="form-login">
            <div class="form-header">
                <h1>Fazer login</h1>
            </div>
            <form action="{{route('login.post')}}" method="post">
                @csrf
                @if(session('warning'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <a href="{{ route('user.index') }}">Se não for cadastrado, clique aqui!</a>
                <div class="form-button">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
