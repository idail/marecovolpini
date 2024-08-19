<?php
//session_start();
require("../modelo/Usuario.php");
require("../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php");
require("../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php");
require("../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php");
require("../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php");
if(!empty($_POST["validacao_acesso"])){
   $recebe_login = $_POST["recebe_login"];
   $recebe_senha = $_POST["recebe_senha"];
   $recebe_senha_criptograda = md5($recebe_senha);
   valida_acesso($recebe_login,$recebe_senha_criptograda);
}

if(!empty($_POST["autenticacao_google_autenticador"]))
{
    $recebe_senha_gerada_google_autenticador = $_SESSION["senha_gerada"];
    $recebe_senha_informada_usuario = $_POST["codigo_digitado"];

    if(!empty($recebe_senha_gerada_google_autenticador) && !empty($recebe_senha_informada_usuario))
        validacao_google_autenticador($recebe_senha_gerada_google_autenticador,$recebe_senha_informada_usuario);
}

if(!empty($_POST["encerra_acesso"]))
{
    encerra_acesso();
}

// if(!empty($_POST["registra_ultimo_acesso"]))
// {
//     registra_ultimo_acesso();
// }

if(!empty($_POST["busca_ultimo_acesso"]))
{
    busca_ultima_sessao();
}

if(!empty($_POST["alterar_senha_usuario"]))
{
    $recebe_senha_informada = $_POST["nova_senha"];
    $recebe_senha_criptograda = md5($recebe_senha_informada);
    $objeto_usuario = new Usuario();
    $retorno_envio_email_alteracao_senha = $objeto_usuario->enviar_email_alteracao_de_senha($recebe_senha_criptograda,$recebe_senha_informada);
    echo json_encode($retorno_envio_email_alteracao_senha);
}

function registra_ultimo_acesso()
{
    $objeto_usuario = new Usuario();
    $retorno_registra_ultimo_acesso = $objeto_usuario->registra_sessao();
    return $retorno_registra_ultimo_acesso;
}

function busca_ultima_sessao()
{
    $objeto_usuario = new Usuario();
    $retorno_busca_ultima_sessao = $objeto_usuario->busca_ultimo_acesso();
    echo json_encode($retorno_busca_ultima_sessao);
}

function validacao_google_autenticador($recebe_codigo_qr_code,$recebe_senha_informada)
{
    $google_autenticador = new \Google\Authenticator\GoogleAuthenticator();
    if (!empty($recebe_codigo_qr_code) && !empty(!empty($recebe_senha_informada))) {
        if ($google_autenticador->checkCode($recebe_codigo_qr_code, $recebe_senha_informada,0)) {
            $retorno_final = "validado";

            $resultado_registro_ultimo_acesso = registra_ultimo_acesso();

            if($resultado_registro_ultimo_acesso)
                echo json_encode($retorno_final);
        } else {
            $retorno_final = "favor verificar qr code invalido";
            echo json_encode($retorno_final);
        }
    }
}

function valida_acesso($recebe_login,$recebe_senha)
{
    $objeto_usuario = new Usuario();
    $retorno_validacao_usuario = $objeto_usuario->valida_acesso($recebe_login,$recebe_senha);
    echo json_encode($retorno_validacao_usuario);
}


function encerra_acesso()
{
    if(isset($_SESSION["nome_usuario"]))
    {
        unset($_SESSION["nome_usuario"]);
        $recebe_mensagem_deslogado = "Deslogado com sucesso";
        echo json_encode($recebe_mensagem_deslogado);
    }
}
?>