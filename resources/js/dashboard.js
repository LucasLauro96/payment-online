global.$ = global.jQuery = require("jquery");
$(document).ready(function () {

    const save = () => {
        if ($('#modalAddMoneyInput').val() == "") {
            $('#alertAddMoney').text('Insira um valor para ser adicionado')
            $('#alertAddMoney').show();
            return;
        }
        data = {
            value: $('#modalAddMoneyInput').val()
        };

        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        jQuery.ajax({
            method: "POST",
            url: "/adicionar_dinheiro",
            data: data,
            statusCode: {
                200: function() {
                    alert( "Saldo adicionado" );
                },
                500: function() {
                    $('#alertAddMoney').text('O servidor reportou um erro, tente novamente.');
                    $('#alertAddMoney').show();
                }
            }
        });
    };

    $( "#submitModalAddMoney" ).click( () => {
        save();
    });
    
});
