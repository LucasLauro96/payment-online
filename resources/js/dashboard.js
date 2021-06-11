global.$ = global.jQuery = require("jquery");
$(document).ready(function () {
    const table = $('#transactionsTable');


    //Adiciona Saldo
    const addMoney = () => {

        const value = $('#modalAddMoneyInput').val();
        const alertReturn = $('#alertAddMoney');

        if (value == "") {
            alertReturn.text('Insira um valor para ser adicionado')
            alertReturn.show();
            return;
        }

        const data = {
            value: value
        };

        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        jQuery.ajax({
            method: "POST",
            url: "transacao/adicionar_dinheiro",
            data: data,
            statusCode: {
                200: () => {
                    alert( "Saldo adicionado" );
                    cleanTable(table);
                    transactionsTable();
                },
                500: () => {
                    alertReturn.text('O servidor reportou um erro, tente novamente.');
                    alertReturn.show();
                }
            }
        });
    };

    $( "#submitModalAddMoney" ).click( () => {
        addMoney();
    });

    // Transferencia
    const transferMoney = () => {

        const value = $('#modalTransferInput').val();
        const payer = $('#selectTransfer').val();
        const alertReturn = $('#alertTransfer');

        if (value == "") {
            alertReturn.text('Insira um valor para ser adicionado')
            alertReturn.show();
            return;
        }

        if (payer == "") {
            alertReturn.text('Selecione um beneficiário')
            alertReturn.show();
            return;
        }

        const data = {
            value: value,
            payer: payer
        };

        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        jQuery.ajax({
            method: "POST",
            url: "transacao/transferir_dinheiro",
            data: data,
            statusCode: {
                200: () => {
                    alert( "Transferencia realizada" );
                    cleanTable(table);
                    transactionsTable();
                },
                406: () => {
                    alert('Não foi permitida a transação');
                },
                500: () => {
                    alertReturn.text('O servidor reportou um erro, tente novamente.');
                    alertReturn.show();
                }
            }
        });
    };

    $( "#submitModalTransfer" ).click( () => {
        transferMoney();
    });

    const transactionsTable = async () => {

        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        jQuery.ajax({
            method: "GET",
            url: "dashboard/transacao",
            statusCode: {
                200: (res) => {
                    $.each( res, function( key, value ) {
                        const iduser = value.userid;
                        
                        $.each( value.transactions, function( k, v ) {
                            
                            //Adicionado Saldo
                            if(v.useridfrom == v.useridto){
                                const row = '<tr class="table-success"><td>' + v.id + '</td><td>Dinheiro adicionado</td><td>' + v.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td><td>' + v.balance.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td></tr>';
                                table.append(row);
                            }
                            
                            //Transferindo
                            if(v.useridfrom != v.useridto && v.useridto != iduser){
                                const row = '<tr class="table-danger"><td>' + v.id + '</td><td>Enviado para ' + v.userTo +  '</td><td>' + v.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td><td>' + v.balance.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td></tr>';
                                table.append(row);

                            }

                            //Recebendo
                            if(v.useridfrom != iduser && v.useridto == iduser){
                                const row = '<tr class="table-success"><td>' + v.id + '</td><td>Pagamento recebido de ' + v.userFrom + '</td><td>' + v.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td><td>' + v.balance.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td></tr>';
                                table.append(row);
                            }
                        });
                    });
                },
                500: () => {
                    alert('O servidor reportou um erro, tente novamente.');
                }
            }
        });
    }

    const cleanTable = async (table) => {
        await table.remove();
    }
    transactionsTable();
});
