@extends('layout.master')

@section('content')
    <div class="container" id="dashboard">
        <div class="dashboard-header d-flex justify-content-start">
            <div class="buttons">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addMoney"><i class="bi bi-piggy-bank"></i> Adicionar Saldo</button>
                @if (strlen($user->cpf_cnpj) == 14)
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Transfer"><i class="bi bi-cash"></i> Fazer Transferência</button>
                @endif
            </div>
            <div class="saldo">
                <h4>Bem vindo, {{ $user->name }}</h4>
                <h5>Meu Saldo é: R${{ number_format($user->balance, 2, ',', '.')  }}</h5>
                <a href="{{ route('user.logout') }}" class="btn btn-danger">Sair</a>
            </div>
        </div>

        <div class="dashboard-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        @if ($transaction->useridfrom == $transaction->useridto)
                            <tr class="table-success">
                                <td>{{ $transaction->id }}</td>
                                <td>Depósito</td>
                                <td>R$ {{ number_format($transaction->value, 2, ',', '.') }}</td>
                            </tr>
                        @endif

                        @if ($transaction->useridfrom != $transaction->useridto && $transaction->useridto != $user->id)
                            <tr class="table-danger">
                                <td>{{ $transaction->id }}</td>
                                <td>Transferência para {{ $transaction->userTo }}</td>
                                <td>R$ {{ number_format($transaction->value, 2, ',', '.') }}</td>
                            </tr>
                        @endif

                        @if($transaction->useridfrom != $user->id && $transaction->useridto == $user->id)
                            <tr class="table-success">
                                <td>{{ $transaction->id }}</td>
                                <td>Recebido de {{ $transaction->userFrom }}</td>
                                <td>R$ {{ number_format($transaction->value, 2, ',', '.') }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addMoney" tabindex="-1" aria-labelledby="addMoneyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMoneyLabel"><i class="bi bi-piggy-bank"></i> Adicionar Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert" id="alertAddMoney" style="display: none"></div>
                    <div class="form-group">
                        <label class="form-label">Valor: </label>
                        <input type="number" class="form-control" id="modalAddMoneyInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitModalAddMoney">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Transfer" tabindex="-1" aria-labelledby="TransferLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TransferLabel"><i class="bi bi-cash"></i> Enviar Dinheiro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert" id="alertTransfer" style="display: none"></div>
                    <div class="form-group">
                        <label class="form-label">Enviar para: </label>
                        <select id="selectTransfer" class="form-control">
                            <option value="" style="display: none">Selecione um usuario</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Valor: </label>
                        <input type="number" class="form-control" id="modalTransferInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitModalTransfer">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@stop
