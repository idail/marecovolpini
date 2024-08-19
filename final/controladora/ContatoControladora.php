<?php
require("../modelo/Contato.php");
if (!empty($_POST["processo_envio_email"])) {
    $recebe_texto_contato = $_POST["texto_contato"];
    $recebe_nome_contato = $_POST["nome_contato"];
    $recebe_email_contato = $_POST["email_contato"];
    $recebe_telefone_contato = $_POST["telefone_contato"];

    $recebe_ip_usuario = $_SERVER['REMOTE_ADDR'];
    $recebe_informacoes_usuario = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $recebe_ip_usuario));
    $cidade_usuario = $recebe_informacoes_usuario["geoplugin_city"];
    $pais_usuario = $recebe_informacoes_usuario["geoplugin_countryName"];

    date_default_timezone_set('America/Cuiaba');
    $recebe_data_hora = date('d/m/Y \à\s H:i:s');

    $objeto_contato = new Contato();
    $retorno_envio_email_contato =  $objeto_contato->envia_email_contato($recebe_nome_contato,$recebe_telefone_contato,$recebe_email_contato,$recebe_texto_contato,$recebe_data_hora,$cidade_usuario,$pais_usuario,$recebe_ip_usuario);
    echo json_encode($retorno_envio_email_contato);
}
