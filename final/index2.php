<?php
$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'home';
$url = array_filter(explode('/', $url));

if (!empty($url[0])) {
    if ($url[0] == "home") {
        $url_final = $url[0] . '.php';
        require($url_final);
    } elseif ($url[0] == "galeria") {
        $url_final = $url[0] . '.php';
        require($url_final);
    }else if($url[0] == "contato")
    {
        $url_final = $url[0] . '.php';
        require($url_final);
    }else if (!empty($url[1])) {
        if ($url[1] == "") {
            $url_final = "index.php";
            require("./admin/" . $url_final);
        } else if ($url[1] == "alteracao_senha") {
            $url_final = $url[1] . '.php';
            require("./admin/" . $url_final);
        } else if ($url[1] == "painel") {
            $url_final = $url[1] . '.php';
            require("./admin/" . $url_final);
        }
        //var_dump($url_final);
    }
} else {
    //var_dump($url);
}
