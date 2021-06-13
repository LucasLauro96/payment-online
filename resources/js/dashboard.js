global.$ = global.jQuery = require("jquery");
$(document).ready(function () {

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
                    document.location.reload();
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
                    // document.location.reload();
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
});