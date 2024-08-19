$(document).ready(function(e){
    $("#telefone_contato").mask("(99)9 9999-9999");
});

$("#validacao_campos").hide();
$("#envio_email").hide();

$("#contato").click(function (e) {
    e.preventDefault();

    if ($("#texto_contato").val() == "" || $("#nome_contato").val() == "" || $("#email_contato").val() == "" || $("#telefone_contato").val() == "") {
        $("#validacao_campos").html("Por favor, para enviar preencher todos os campos");
        $("#validacao_campos").show();
        $("#validacao_campos").fadeOut(2000);
        $("#texto_contaxto").focus();
    }  else {
        $.ajax({
            type: "post",
            dataType: "json",
            //http://localhost/engenharia_testando/final/controladora/ContatoControladora.php
            url: "./controladora/ContatoControladora.php",
            data: $("#formulario_contato").serialize(),
            success: function (retorno) {
                debugger;

                if(retorno != "")
                {
                    $("#envio_email").html(retorno);
                    $("#envio_email").show();
                    $("#envio_email").fadeOut(3000);
                    $("#texto_contato").val("");
                    $("#nome_contato").val("");
                    $("#email_contato").val("");
                    $("#telefone_contato").val("");
                }
            },
            error(xhr, status, error) {
                console.log(status, error);
            }
        });
    }
});