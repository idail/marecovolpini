<?php
    $IP = $_SERVER['REMOTE_ADDR'];
    $IP2 = $_SERVER['HTTP_CLIENT_IP'];
    echo "IP pelo remote_addr:".$IP."<br>";
    echo "IP pelo http client ip:".$IP2."<br>";

    $ip_atualizado = "2804:d59:8d1a:8f00:a52c:91cd:c80:89a6";
    $recebe = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$IP));

    echo "Cidade:".$recebe["geoplugin_city"]."<br>";
    echo "Pais:".$recebe["geoplugin_countryName"]."<br>";


    date_default_timezone_set('America/Cuiaba');
    $recebe_data_hora = date('d/m/Y \à\s H:i:s');
    echo "Data atual e hora:".$recebe_data_hora;
    ?>
