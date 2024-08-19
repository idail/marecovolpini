
$(document).ready(function (e) {
    $("#mensagem_usuario").hide();
    $("#mensagem_deslogado").hide();
    $("#campo_vazio_senha").hide();
    $("#mensagem-validacao-codigo-invalido").hide();
    $("#mensagem_usuario_painel_administrativo").hide();

    $("#mostra_oculta").click(function () {
        if ($(".senha-digitada").attr("type") == "password") {
            $(".senha-digitada").attr("type", "text");
        } else {
            $(".senha-digitada").attr("type", "password");
        }
    });
});

$("#acessar_painel_administrativo").click(function (e) {
    e.preventDefault();
    debugger;
    alert("Clicou para acessar o painel administrativo");
});


$("#acessar_painel_imagens").click(function (event) {
    event.preventDefault();
    debugger;
    if ($("#login").val() == "" && $("#senha").val() == "") {
        $("#mensagem_usuario").html("Por favor, preenche o campo login e senha");
        $("#mensagem_usuario").show();
        $("#login").focus();
        $("#mensagem_usuario").fadeOut(3000);
    } else if ($("#login").val() == "") {
        $("#mensagem_usuario").html("Por favor, preenche o campo login");
        $("#mensagem_usuario").show();
        $("#login").focus();
        $("#mensagem_usuario").fadeOut(3000);
    } else if ($("#senha").val() == "") {
        $("#mensagem_usuario").html("Por favor, preenche o campo senha");
        $("#mensagem_usuario").show();
        $("#mensagem_usuario").fadeOut(3000);
        $("#senha").focus();
    } else {
        var recebe_login = $("#login").val();
        var recebe_senha = $("#senha").val();
        $("#mensagem_usuario").fadeOut(1000);
        $.ajax({
            type: "post",
            dataType: "json",
            url: "../controladora/UsuarioControladora.php",
            // url: "http://localhost/marecovolpini/final/controladora/UsuarioControladora.php",
            data: { validacao_acesso: "validar_acesso", recebe_login: recebe_login, recebe_senha: recebe_senha },
            success: function (retorno) {
                debugger;
                if (retorno == "validado") {
                    var painel = "../admin/autenticacao_qr_code.php";
                    $(window.document.location).attr("href", painel);
                    // $.ajax({
                    //     url: "../controladora/UsuarioControladora.php",
                    //     type: "post",
                    //     dataType: "json",
                    //     data: { registra_ultimo_acesso: "ultimo_acesso_registrado" },
                    //     success: function (retorno) {
                    //         debugger;
                    //         var painel = "../admin/painel.php";
                    //         var painel = "http://localhost/marecovolpini/final/admin/autenticacao_qr_code.php";
                    //         $(window.document.location).attr("href", painel);
                    //     },
                    //     error: function (xhr, status, error) {
                    //         console.log(status, error);
                    //     }
                    // });
                } else {
                    var login = "../admin/";
                    $(window.document.location).attr('href', login);
                    //console.log("Favor verificar os dados");
                }
            },
            error(xhr, status, error) {
                console.log(status, error);
            }
        });
    }
});

$("#validacao_qr_code").on("click", function (e) {
    e.preventDefault();
    debugger;
    var codigo_informado_usuario = $("#codigo-informado").val();

    if (codigo_informado_usuario != null) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "../controladora/UsuarioControladora.php",
            data: { codigo_digitado: codigo_informado_usuario, autenticacao_google_autenticador: "autenticar_google" },
            success: function (retorno) {
                debugger;
                console.log(retorno);
                if (retorno == "validado") {
                    // var painel = "http://localhost/marecovolpini/final/admin/painel.php";
                    // $(window.document.location).attr("href", painel);
                    var painel = "../admin/painel.php";
                    // var painel = "../admin/autenticacao_qr_code.php";
                    $(window.document.location).attr("href", painel);
                } else {
                    $("#corpo-mensagem").html("Código inválido, favor ler código novamente");
                    $("#mensagem-validacao-codigo-invalido").show();
                    $("#mensagem-validacao-codigo-invalido").fadeOut(4000);
                }
            },
            error(xhr, status, error) {
                console.log(status, error);
            }
        });
    } else {

    }
});

$("#alterar_senha_usuario").click(function (event) {
    //http://localhost/engenharia_testando/final/admin/alteracao_senha
    var alterar_senha = "../admin/alteracao_senha.php";
    $(window.document.location).attr("href", alterar_senha);
});

$("#alterar_senha").click(function (e) {
    e.preventDefault();
    if ($("#senha_alterar").val() == "") {
        $("#campo_vazio_senha").html("Por favor, preencha o campo senha");
        $("#campo_vazio_senha").show();
        $("#senha_alterar").focus();
        $("#campo_vazio_senha").fadeOut(1000);
    } else {
        var recebe_senha = $("#senha_alterar").val();

        $.ajax({
            type: "post",
            dataType: "json",
            url: "../controladora/UsuarioControladora.php",
            data: { alterar_senha_usuario: "alteracao_senha", nova_senha: recebe_senha },
            success: function (retorno) {
                if (retorno == "Senha alterada com sucesso , e-mail enviado com sucesso") {
                    var login = "/admin/";
                    $(window.document.location).attr("href", login);
                }
            },
            error(xhr, status, error) {
                console.log(status, error);
            }
        });
    }

});

$("#sair_painel_imagens").click(function (event) {
    event.preventDefault();
    $.ajax({
        type: "post",
        dataType: "json",
        //http://localhost/engenharia_testando/final/controladora/UsuarioControladora.php
        url: "../controladora/UsuarioControladora.php",
        data: { encerra_acesso: "encerrar_acesso" },
        success: function (retorno) {
            if (retorno != "") {
                swal('Deslogado com sucesso');
                setTimeout(function () {
                    var login = "/admin/";
                    $(window.document.location).attr("href", login);
                }, 2000);


            } else {
                alert("Nao deu certo");
            }
        },
        error(xhr, status, error) {
            console.log(status, error);
        }
    });
});