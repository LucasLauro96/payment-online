@extends('layout.master')

@section('content')
    <div class="container" id="dashboard">
        <div class="dashboard-header d-flex justify-content-start">
            <div class="buttons">
                <button type="button" class="btn btn-secondary"><i class="bi bi-piggy-bank"></i> Adicionar Saldo</button>
                <button type="button" class="btn btn-secondary"><i class="bi bi-cash"></i> Fazer Transferência</button>
            </div>
            <div>
                <h4 class="saldo">Bem vindo, {{ $user->name }}</h4>
                <h5 class="saldo">Meu Saldo é: R$100,00</h5>
            </div>
        </div>

        <div class="dashboard-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-success">
                        <td>1</td>
                        <td>Adicionado</td>
                        <td>R$ 50,00</td>
                        <td>R$ 150,00</td>
                    </tr>
                    <tr class="table-danger">
                        <td>2</td>
                        <td>Enviado (estabelecimento)</td>
                        <td>R$ -50,00</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr class="table-success">
                        <td>1</td>
                        <td>Adicionado</td>
                        <td>R$ 50,00</td>
                        <td>R$ 150,00</td>
                    </tr>
                    <tr class="table-danger">
                        <td>2</td>
                        <td>Enviado (estabelecimento)</td>
                        <td>R$ -50,00</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr class="table-success">
                        <td>1</td>
                        <td>Adicionado</td>
                        <td>R$ 50,00</td>
                        <td>R$ 150,00</td>
                    </tr>
                    <tr class="table-danger">
                        <td>2</td>
                        <td>Enviado (estabelecimento)</td>
                        <td>R$ -50,00</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr class="table-success">
                        <td>1</td>
                        <td>Adicionado</td>
                        <td>R$ 50,00</td>
                        <td>R$ 150,00</td>
                    </tr>
                    <tr class="table-danger">
                        <td>2</td>
                        <td>Enviado (estabelecimento)</td>
                        <td>R$ -50,00</td>
                        <td>R$ 100,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
