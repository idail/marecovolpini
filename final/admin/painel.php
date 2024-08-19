<?php

session_start();

require("verifica_sessao.php");

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Imagens</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="Logo_Mareco_Volpini.jpg"> -->

    <link rel="shortcut icon" href="icone.ico">

</head>



<style>
    .row {

        display: -webkit-box;

        display: -ms-flexbox;

        display: flex;

        -ms-flex-wrap: wrap;

        flex-wrap: wrap;

        margin-right: 0px;

        margin-left: 0px;

    }



    /* img {

        -webkit-user-drag: none;

        -khtml-user-drag: none;

        -moz-user-drag: none;

        -o-user-drag: none;

        user-drag: none;

    }



    input[type="checkbox"][id^="cb"] {

        display: none;

    }



    label {

        border: 1px solid #fff;

        padding: 10px;

        display: block;

        position: relative;

        margin: 10px;

        cursor: pointer;

    }



    label:before {

        background-color: white;

        color: white;

        content: " ";

        display: block;

        border-radius: 50%;

        border: 1px solid grey;

        position: absolute;

        top: -5px;

        left: -5px;

        width: 25px;

        height: 25px;

        text-align: center;

        line-height: 28px;

        transition-duration: 0.4s;

        transform: scale(0);

    }



    label img {

        height: 100px;

        width: 100px;

        transition-duration: 0.2s;

        transform-origin: 50% 50%;

    }



    :checked+label {

        border-color: #ddd;

    }



    :checked+label:before {

        content: "✓";

        background-color: grey;

        transform: scale(1);

    }



    :checked+label img {

        transform: scale(0.9);

        box-shadow: 0 0 5px #333;

        z-index: -1;

    } */



    .alert {

        position: relative;

        padding: 0.75rem 1.25rem;

        margin-bottom: 1rem;

        border: 1px solid transparent;

        border-top-color: transparent;

        border-right-color: transparent;

        border-bottom-color: transparent;

        border-left-color: transparent;

        border-radius: 0.25rem;

        margin-top: 3px !important;

        margin-left: 10px !important;

    }
</style>



<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

        <a class="navbar-brand" href="#">Painel Imagens</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- <ul class="navbar-nav mr-auto">

                <li class="nav-item active">

                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Link</a>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"

                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        Dropdown

                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="#">Action</a>

                        <a class="dropdown-item" href="#">Another action</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#">Something else here</a>

                    </div>

                </li>

                <li class="nav-item">

                    <a class="nav-link disabled" href="#">Disabled</a>

                </li>

            </ul> -->

            <ul class="navbar-nav mr-5 ml-auto">

                <div class="">

                    <div class="ultimo_login mt-2">

                        <div id="exibi_ultimo_login">



                        </div>

                    </div>

                </div>

                <li class="nav-item dropdown">



                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-arrow-right-from-bracket"></i>



                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" id="sair_painel_imagens" href="#">Sair</a>

                    </div>

                </li>



                <li class="nav-item mt-2">

                    <label for="">Usuário logado:<?php

                                                    if (isset($_SESSION["nome_usuario"])) {

                                                        echo $_SESSION["nome_usuario"];
                                                    }

                                                    ?></label>

                </li>

            </ul>

            <!-- <form class="form-inline my-2 my-lg-0">

                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

            </form> -->

        </div>

    </nav>







    <?php

    date_default_timezone_set('America/Cuiaba');

    // $data = date('d/m/Y \à\s H:i');



    // $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data)));



    // $release_date = $data;

    // $d = date("Y-m-d H:i:s", strtotime($release_date));



    //$datetime = new DateTime($data);

    //echo $datetime->format('Y-m-d H:i:s'); // mysql format



    //$recebe = date('Y-m-d H:i',strtotime($data));



    // echo "Verificando:".$recebe."<br>";

    // echo $d . "<br>";

    // $mysqldate = date( 'Y-m-d H:i:s', $data );

    // $phpdate = strtotime( $mysqldate );



    //$senha_digitada = md5("1245");



    //var_dump($data);



    // echo $data . "<br>";

    // echo "Data convertida:" . $date . "<br>";





    // $ver = strtotime("2022-05-25 12:16:25");

    // echo $ver;



    // echo "Data convertida novamente:".$phpdate;



    //echo "<br>" . $senha_digitada;



    //include("ipdetails-20121116/class.ipdetails.php");

    //$ip = $_SERVER['REMOTE_ADDR'];

    //echo $ip;

    #$ip = "189.73.71.160";

    // $meu_ip = "191.221.12.108";

    // $ipdetails = new ipdetails($meu_ip);

    // $ipdetails->scan();

    // echo "<b>IP:</b>        " . $meu_ip                        . "<br />";

    // echo "<b>País:</b>      " . $ipdetails->get_country()  . "<br />";

    // echo "<b>Estado:</b>    " . $ipdetails->get_region()   . "<br />";

    // echo "<b>Cidade:</b>    " . $ipdetails->get_city()     . "<br />";

    // echo "<b>Latitude:</b>  " . $ipdetails->get_latitude() . "<br />";

    // echo "<b>Longitude:</b> " . $ipdetails->get_longitude() . "<br />";

    // echo "<b>Código país:</b> " . $ipdetails->get_countrycode() . "<br />";

    // echo "<b>Código continente:</b> " . $ipdetails->get_continentcode() . "<br />";

    // echo "<b>Código moeda:</b> " . $ipdetails->get_currencycode() . "<br />";

    // echo "<b>Símbolo moeda:</b> " . htmlspecialchars_decode($ipdetails->get_currencysymbol()) . "<br />";

    // echo "<b>Cotação moeda (dólar):</b> " . $ipdetails->get_currencyconverter() . "<br />";









    // set IP address and API access key 

    // $ip = '191.221.12.108';

    // $access_key = '0b737c7e9f11d686550153bb45024b00';



    // Initialize CURL:

    // $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



    // Store the data:

    // $json = curl_exec($ch);

    // curl_close($ch);



    // Decode JSON response:

    //$api_result = json_decode($json, true);



    // Output the "capital" object inside "location"

    //echo $api_result['location']['capital'];



    // require("php-master/php-master/src/IPinfo.php");



    // use ipinfo\ipinfo\IPinfo;



    // $access_token = '356252ee816b8e';

    // $client = new IPinfo($access_token);

    // $ip_address = '191.221.12.108';

    // $details = $client->getDetails($ip_address);



    // $details->city; // Emeryville

    // $details->loc; // 37.8342,-122.2900





    // set IP address and API access key 

    //$ip = '191.221.12.108';

    $access_key = '0b737c7e9f11d686550153bb45024b00';



    // Initialize CURL:

    //$ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');

    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



    // Store the data:

    //$json = curl_exec($ch);

    //curl_close($ch);



    // Decode JSON response:

    //$api_result = json_decode($json, true);



    // Output the "capital" object inside "location"

    // echo "IP:".$ip."<br>";

    // echo "Pais".$api_result["country_name"]."<br>";

    // echo "Estado:".$api_result["region_name"]."<br>";

    // echo "Cidade:".$api_result["city"]."<br>";

    // echo "Codigo Pais:".$api_result["country_code"]."<br>";

    // echo "Codigo Continente:".$api_result["continent_code"]."<br>";



    $ip_atualizado = "2804:d59:8d1a:8f00:a52c:91cd:c80:89a6";

    $recebe = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip_atualizado));

    $json = json_encode($recebe, true);

    $json2 = json_decode($json, true);

    //var_dump($json);

    //var_dump($json2);





    //echo "Cidade:" . $recebe["geoplugin_city"] . "<br>";

    //echo "Pais:" . $recebe["geoplugin_countryName"];

    // require_once('geoplugin.class.php');

    // $geoplugin = new geoPlugin();

    // If we wanted to change the base currency, we would uncomment the following line

    // $geoplugin->currency = 'EUR';







    ?>

    <div class="container-fluid">

        <div class="row">

            <!-- <input id="input-b1" name="input-b1" type="file" class="file" data-browse-on-zone-click="true"> -->

        </div>

    </div>





    <!-- <div class="container">

        <div class="row">

            <div class="col-md-6 bd-example">

                <div class="input-group">

                    <div class="custom-file">

                        <input class="custom-file-input" id="inputGroupFile04" type="file">

                        <label class="custom-file-label" for="inputGroupFile04">Upload CSV</label>

                    </div>

                    <div class="input-group-append">

                        <button class="btn btn-outline-primary" type="button">Submit</button>

                    </div>

                </div>

            </div>

        </div>

    </div> -->



    <style>
        /* input[type='file'] {

            display: none

        } */



        .input-wrapper label {

            background-color: #3498db;

            border-radius: 5px;

            color: #fff;

            margin: 10px;

            padding: 6px 20px
        }



        .input-wrapper label:hover {

            background-color: #2980b9
        }



        .ultimo_login {

            float: right;

        }



        /* Tabs panel */

        .tabbable-panel {

            border: 1px solid #eee;

            padding: 10px;

        }



        /* Default mode */



        .nav-tabs {

            display: flex;

            justify-content: center;

            flex-direction: row;

        }



        .tabbable-line>.nav-tabs {

            border: none;

            margin: 0;

        }



        .nav-tabs {

            text-align: center;

        }



        .tabbable-line>.nav-tabs>li {

            margin: 2px;



        }



        .tabbable-line>.nav-tabs>li>a {

            border: 0;

            margin-right: 0;

            color: #737373;

        }



        .tabbable-line>.nav-tabs>li>a>i {

            color: #a6a6a6;

        }



        .tabbable-line>.nav-tabs>li.open,

        .tabbable-line>.nav-tabs>li:hover {

            border-bottom: 4px solid #fbcdcf;

        }



        .tabbable-line>.nav-tabs>li.open>a,

        .tabbable-line>.nav-tabs>li:hover>a {

            border: 0;

            background: none !important;

            color: #333333;

        }



        .tabbable-line>.nav-tabs>li.open>a>i,

        .tabbable-line>.nav-tabs>li:hover>a>i {

            color: #a6a6a6;

        }



        .tabbable-line>.nav-tabs>li.open .dropdown-menu,

        .tabbable-line>.nav-tabs>li:hover .dropdown-menu {

            margin-top: 0px;

        }



        .tabbable-line>.nav-tabs>li.active {

            border-bottom: 4px solid #f3565d;

            position: relative;

        }



        .tabbable-line>.nav-tabs>li.active>a {

            border: 0;

            color: #333333;

        }



        .tabbable-line>.nav-tabs>li.active>a>i {

            color: #404040;

        }



        .tabbable-line>.tab-content {

            margin-top: -3px;

            background-color: #fff;

            border: 0;

            border-top: 1px solid #eee;

            padding: 15px 0;

        }



        .portlet .tabbable-line>.tab-content {

            padding-bottom: 0;

        }



        /* Below tabs mode */



        .tabbable-line.tabs-below>.nav-tabs>li {

            border-top: 4px solid transparent;

        }



        .tabbable-line.tabs-below>.nav-tabs>li>a {

            margin-top: 0;

        }



        .tabbable-line.tabs-below>.nav-tabs>li:hover {

            border-bottom: 0;

            border-top: 4px solid #fbcdcf;

        }



        .tabbable-line.tabs-below>.nav-tabs>li.active {

            margin-bottom: -2px;

            border-bottom: 0;

            border-top: 4px solid #f3565d;

        }



        .tabbable-line.tabs-below>.tab-content {

            margin-top: -10px;

            border-top: 0;

            border-bottom: 1px solid #eee;

            padding-bottom: 15px;

        }



        #estilos {

            text-decoration: none;

        }
    </style>



    <script>



    </script>







    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item" role="presentation">

            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>

        </li>

        <li class="nav-item" role="presentation">

            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>

        </li>

        <li class="nav-item" role="presentation">

            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>

        </li>

    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Idail Ferreira de Vasconcelos Neto 1</div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Idail Ferreira de Vasconcelos Neto 2</div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Idail Ferreira de Vasconcelos Neto 3</div>

    </div> -->





    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">



                <div class="tabbable-panel">

                    <div class="tabbable-line">

                        <ul class="nav nav-tabs ">

                            <li class="">

                                <a href="#tab_default_1" data-toggle="tab" id="estilos">

                                    Gerenciar Imagens Pagina Inicial </a>

                            </li>

                            <li>

                                <a href="#tab_default_2" data-toggle="tab" id="estilos">

                                    Gerenciar Imagens Galeria </a>

                            </li>

                            <!-- <li>

                                <a href="#tab_default_3" data-toggle="tab">

                                    Tab 3 </a>

                            </li> -->

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_default_1">



                                <div class="container-fluid">



                                    <div class="container-fluid col-lg-4">

                                        <div class="row">

                                            <form id="formulario_informacoes_pagina_inicial" enctype="multipart/form-data">



                                                <div class="input-group mb-3">



                                                    <!-- <label class="input-group-text" for="inputGroupFile01">Selecione as imagens</label> -->

                                                    <input type="file" class="form-control btn-primary  mr-2" id="imagens_pagina_inicial" name="fotos_selecionadas_pagina_inicial[]" multiple />



                                                    <!-- <input type="hidden" name="salvar_dados_pagina_inicial" value="informacoes_pagina_inicial"> -->

                                                    <button type="button" class="btn btn-primary" id="salvar_informacoes_pagina_inicial">Salvar Imagens</button>





                                                    <!-- <input type="hidden" name="acao_inserir_imagens_galeria" value="acao_inserir_imagens_galeria"> -->



                                                    <!-- <div class="form-group col-lg-12">

                                                        <label for="exampleFormControlTextarea1">Informe a descrição </label>

                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                                    </div> -->





                                                </div>



                                                <!-- <div class="container-fluid col-lg-12">



                                                </div> -->







                                            </form>

                                        </div>

                                    </div>


                                    <div class="container-fluid">

                                        <div class="row" id="exibi_campos_insercao_pagina_inicial">

                                            <!-- <span id="exibi_imagens_selecionadas" class="img-fluid"></span> -->

                                        </div>

                                    </div>









                                    <form action="" id="formulario_alteracao_pagina_inicial">

                                        <div class="container-fluid col-lg-12" style="margin-top: 5px;">

                                            <div class="row">

                                                <div id="carrega_imagens_cadastradas_pagina_inicial" style="display: contents;">

                                                    <div class="container-fluid col-lg-5" role="alert" id="mensagem_nenhuma_imagem_localizada_pagina_inicial" style="margin-top: 25px;text-align: center;">



                                                    </div>
                                                    <!-- <div class='form-group'>

                                                    </div> -->

                                                </div>

                                                <div>

                                                    <!-- <span class="imagem">

                        <img src="../ORIGINAL/1.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="1"

                            value="1">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/2.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="2">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/3.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="3">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/4.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="4">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/5.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="5">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/6.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="6">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/7.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="7">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/8.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="8">

                    </span> -->

                                                </div>

                                                <div class="container-fluid col-lg-12 mt-3">

                                                    <div class="row">

                                                        <button type="button" class="btn btn-primary mr-2" id="excluir_informacoes_pagina_inicial">Excluir Imagens</button>

                                                        <button type="button" class="btn btn-info" id="alterar_informacoes_pagina_inicial">Alterar Descrição Imagens</button>

                                                        <input type="hidden" id="processo_excluir_imagem_selecionadas" name="processo_excluir_imagem_selecionadas" value="excluir_imagens_selecionadas">

                                                    </div>

                                                </div>



                                                <div class="container-fluid col-md-5 col-lg-12">

                                                    <div class="row">



                                                    </div>



                                                    <div class="row">



                                                        <div class="alert alert-primary col-lg-3" role="alert" id="mensagem_fotos_excluidas_pagina_inicial">

                                                            Fotos excluida(s) com sucesso

                                                        </div>



                                                        <div class="alert alert-primary container-fluid col-lg-5" role="alert" id="mensagem_imagem_inserida_pagina_inicial" style="margin-top: 25px;">

                                                        </div>



                                                        <div class="alert alert-primary container-fluid col-lg-5" role="alert" id="mensagem_imagem_alterada_pagina_inicial" style="margin-top: 25px;">

                                                        </div>



                                                        <div class="alert alert-primary container-fluid col-lg-3" role="alert" id="mensagem_maximo_imagem_seis" style="margin-top: 25px;text-align: center;">



                                                        </div>

                                                        <div class="alert alert-primary container-fluid col-lg-3" role="alert" id="mensagem_nenhuma_imagem_selecionada_exclusao" style="margin-top: 25px;text-align: center;">



                                                        </div>

                                                        <div class="alert alert-primary container-fluid col-lg-3" role="alert" id="mensagem_nenhuma_imagem_selecionada_inserir_informacoes_inicial" style="margin-top: 25px;text-align: center;">



                                                        </div>


                                                        <div class="alert alert-primary container-fluid col-lg-3" role="alert" id="mensagem_item_para_alterar_descricao" style="margin-top: 25px;text-align: center;">



                                                        </div>



                                                        <div class="col-lg-11" style="text-align: center;">

                                                            <h4>Para excluir as imagens que deseja selecione-as</h4>

                                                        </div>





                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </form>



                                </div>



































                                <!-- <p>

                                    I'm in Tab 1.

                                </p>

                                <p>

                                    Duis autem eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.

                                </p>

                                <p>

                                    <a class="btn btn-success" href="http://j.mp/metronictheme" target="_blank">

                                        Learn more...

                                    </a>

                                </p> -->

                            </div>

                            <div class="tab-pane" id="tab_default_2">





                                <div class="container-fluid">



                                    <div class="container-fluid col-lg-4">

                                        <div class="row">

                                            <form id="formulario_fotos_galeria" enctype="multipart/form-data">



                                                <div class="input-group mb-3">



                                                    <!-- <label class="input-group-text" for="inputGroupFile01">Selecione as imagens</label> -->

                                                    <input type="file" class="form-control btn-primary mr-2" id="imagens_galeria" name="fotos_selecionadas_galeria[]" multiple>

                                                    <br>

                                                    <button type="button" class="btn btn-primary" id="salvar_imagens_galeria">Salvar Imagens</button>

                                                    <!-- <input type="hidden" name="acao_inserir_imagens_galeria" value="acao_inserir_imagens_galeria"> -->



                                                </div>

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        <span id="exibi_imagens_selecionadas_galeria" class="img-fluid"></span>

                                                        <div class="container-fluid col-lg-12" role="alert" id="mensagem_nenhum_registro_galeria" style="margin-top: 25px;text-align: center;">



                                                        </div>

                                                    </div>

                                                </div>



                                            </form>

                                        </div>

                                    </div>







                                    <form action="" id="formulario_exluir_imagens">

                                        <div class="container-fluid col-lg-12" style="margin-top: 5px;">

                                            <div class="row">





                                                <div id="carrega_imagens_cadastradas_galeria">



                                                </div>

                                                <div>

                                                    <!-- <span class="imagem">

                        <img src="../ORIGINAL/1.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="1"

                            value="1">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/2.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="2">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/3.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="3">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/4.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="4">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/5.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="5">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/6.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="6">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/7.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="7">

                    </span>



                    <span class="imagem">

                        <img src="../ORIGINAL/8.jpeg" name="imagem" alt="" style="height: 200px;width: 200px;" id="8">

                    </span> -->

                                                </div>

                                                <div class="container-fluid col-lg-12">

                                                    <div class="row">

                                                        <button type="button" class="btn btn-primary" id="excluir_fotos_imagems_galeria">Excluir Imagens</button>

                                                        <input type="hidden" id="processo_excluir_imagem_selecionadas" name="processo_excluir_imagem_selecionadas" value="excluir_imagens_selecionadas">

                                                    </div>

                                                </div>



                                                <div class="container-fluid col-md-5 col-lg-12">

                                                    <div class="row">



                                                    </div>



                                                    <div class="row">



                                                        <div class="alert alert-primary col-lg-3" role="alert" id="mensagem_fotos_excluidas">

                                                            Fotos excluida(s) com sucesso

                                                        </div>



                                                        <div class="alert alert-primary container-fluid col-lg-5" role="alert" id="mensagem-imagem-inserida-galeria" style="margin-top: 25px;">

                                                        </div>

                                                        <div class="alert alert-primary container-fluid col-lg-5" role="alert" id="mensagem-nenhuma-imagem-selecionada-exclusao-galeria" style="margin-top: 25px;">

                                                        </div>

                                                        <div class="alert alert-primary container-fluid col-lg-5" role="alert" id="mensagem-nenhuma-imagem-selecionada-insercao-galeria" style="margin-top: 25px;">

                                                        </div>

                                                        <div class="col-lg-11" style="text-align: center;">

                                                            <h4>Para excluir as imagens que deseja selecione-as</h4>

                                                        </div>





                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </form>



                                </div>























                                <!-- <p>

                                    Howdy, I'm in Tab 2.

                                </p>

                                <p>

                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.

                                </p>

                                <p>

                                    <a class="btn btn-warning" href="http://j.mp/metronictheme" target="_blank">

                                        Click for more features...

                                    </a>

                                </p> -->



                                <!-- <div class="tab-pane" id="tab_default_3">

                                <p>

                                    Howdy, I'm in Tab 3.

                                </p>

                                <p>

                                    Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat

                                </p>

                                <p>

                                    <a class="btn btn-info" href="http://j.mp/metronictheme" target="_blank">

                                        Learn more...

                                    </a>

                                </p>

                            </div> -->

                            </div>

                        </div>

                    </div>





                </div>

            </div>

        </div>













        <!-- <div class="container-fluid">

        <div class="row">

            <section class="theme-contact wow animate fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;" id="enviar_imagens">

                <div class="container">



                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-xs-12">

                            <div class="theme-section-module text-center">

                                <h2 class="theme-section-title small">Selecione as imagens que deseja</h2>

                                <div class="theme-separator-line-horrizontal-full"></div>

                            </div>

                        </div>

                    </div>



                    <div class="row justify-content-md-center">

                        <div class="col-lg-8 col-md-8 col-sm-12">

                            <div role="form" class="wpcf7" id="wpcf7-f755-p370-o1" dir="ltr" lang="en-US">

                                <div class="screen-reader-response">

                                    <p role="status" aria-live="polite" aria-atomic="true"></p>

                                    <ul></ul>

                                </div>

                                <form id="formulario_fotos_galeria" enctype="multipart/form-data" method="post" class="wpcf7-form init">







                                    <div style="display: none;">

                                        <input type="hidden" name="_wpcf7" value="755">

                                        <input type="hidden" name="_wpcf7_version" value="5.3.1">

                                        <input type="hidden" name="_wpcf7_locale" value="en_US">

                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f755-p370-o1">

                                        <input type="hidden" name="_wpcf7_container_post" value="370">

                                        <input type="hidden" name="_wpcf7_posted_data_hash" value="">

                                    </div>



                                    <span class="wpcf7-form-control-wrap your-name">



                                        <div class="col-md-3 col-lg-12">

                                            <div class="seleciona">

                                                <div class="input-group mb-3">

                                                    <input type="file" name="fotos_selecionadas_galeria[]" class="form-control btn-primary" id="fotos_selecionadas_galeria" multiple="multiple">

                                                    <label class="input-group-text" for="inputGroupFile02">Fotos</label>









                                                </div>

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        <span id="images-para-galeria" class="img-fluid"></span>

                                                    </div>

                                                </div>

                                                <input type="hidden" name="acao_inserir_imagens_galeria" value="inserir_imagens_galeria">

                                </form>







                            </div>





                        </div>





                        <div class="container-fluid col-lg-5">

                            <div class="row">

                                <p>

                                    <input type="button" value="Enviar" class="btn btn-primary" id="envio_fotos_galeria">



                                    <input type="button" value="Fotos" class="btn btn-primary" id="gerenciar_fotos">



                                </p>





                            </div>

                        </div>





                        



                        </span>













                        <div class="wpcf7-response-output" aria-hidden="true"></div>



                    </div>



                </div>

            </section>

        </div>



    

    </div> -->

    </div>









    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="../js/acesso.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>







    <script src="../js/imgCheckbox-master/jquery.imgcheckbox.js"></script>



    <script src="../js/painel.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

    <!-- <script type='text/javascript'

		src='https://arilewp-pro-seven.themearile.com/wp-content/themes/arilewp-pro/assets/js/bootstrap.js?ver=5.9.2'

		id='bootstrap-js-js'></script> -->

    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"

        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"

        crossorigin="anonymous"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"

        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"

        crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script>





    </script>



</body>



</html>