@extends('layout.master')

@section('content')
    <div class="container" id="dashboard">
        <div class="dashboard-header d-flex justify-content-start">
            <div class="buttons">
                <button type="button" class="btn btn-secondary"><i class="bi bi-piggy-bank"></i> Adicionar Saldo</button>
                <button type="button" class="btn btn-secondary"><i class="bi bi-cash"></i> Fazer Transferência</button>
            </div>
            <h1 class="saldo">Meu Saldo é: R$100,00</h1>
        </div>

        <div class="dashboard-body">
            historico
        </div>
    </div>
@stop
