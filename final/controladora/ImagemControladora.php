<?php
require("../modelo/Imagem.php");

if (!empty($_POST["acao_inserir_imagens_galeria"])) {
    $recebe_acao_inserir_imagens_galeria = $_POST["acao_inserir_imagens_galeria"];
}

if (!empty($_POST["processo"])) {
    $recebe_processo_buscar_imagens_galeria = $_POST["processo"];
}

if (!empty($_POST["recebe_processo_excluir_fotos"])) {

    $valores_selecionados = $_POST["codigos"];
    $recebe_valores_selecionados = json_decode($valores_selecionados);
    Excluir_Imagens_Selecionadas($recebe_valores_selecionados);
}

if(!empty($_POST["recebe_processo_excluir_informacoes_pagina_inicial"]))
{
    $recebe_imagens_pagina_inicial = $_POST["imagens_pagina_inicial"];
    $recebe_valores_pagina_inicial = json_decode($recebe_imagens_pagina_inicial);
    Excluir_Informacoes_Pagina_Inicial($recebe_valores_pagina_inicial);
}


if(!empty($_POST["alterar_informacoes_pagina_inicial"]))
{
    $recebe_alterar_informacoes_pagina_inicial = $_POST["alterar_informacoes_pagina_inicial"];
    $recebe_quantidade_itens_alteracao_pagina_inicial = $_POST["quantidade_itens_alteracao_pagina_inicial"];
    $recebe_codigos_registros_alteracao_pagina_inicial = $_POST["codigos_valores_alterados_pagina_inicial"];
    $recebe_imagens_alteracao_pagina_inicial = $_POST["imagens_alteracao_pagina_inicial"];
    $codigos_registros_alterados = json_decode($recebe_codigos_registros_alteracao_pagina_inicial,true);
    $imagens_alteradas = json_decode($recebe_imagens_alteracao_pagina_inicial,true);


    $descricoes_alteradas_pagina_inicial = array();
    for($indice = 0;$indice < $recebe_quantidade_itens_alteracao_pagina_inicial;$indice++)
    {
        $recebe_texto = $_POST["texto_alterado".$indice];
        array_push($descricoes_alteradas_pagina_inicial,$recebe_texto);
    }

    //var_dump($descricoes_alteradas_pagina_inicial);

    // for($indice = 0;$indice < $recebe_quantidade_itens_alteracao_pagina_inicial;$indice++)
    // {
    //     echo "Registro:".$registros_alterados[$indice]."\n";
    // }

    //var_dump($registros_alterados);

    $codigos_descricoes_alteradas = array();
    foreach($codigos_registros_alterados as $registros)
    {
        foreach($registros as $chave => $valor)
        {
            //echo "Indice:".$chave.",Valor:".$valor."\n";
            array_push($codigos_descricoes_alteradas,$valor);
        }
    }


    $nome_imagens_alteradas_pagina_inicial = array();
    for($imagem = 0;$imagem < $recebe_quantidade_itens_alteracao_pagina_inicial;$imagem++)
    {
        array_push($nome_imagens_alteradas_pagina_inicial,$imagens_alteradas[$imagem]);
    }

    //var_dump($nome_imagens_alteradas_pagina_inicial);

    //var_dump($codigos_descricoes_alteradas);

    //var_dump($descricoes_alteradas_pagina_inicial);

    Alterar_Informacoes_Pagina_Inicial($descricoes_alteradas_pagina_inicial,$codigos_descricoes_alteradas,);
}

if (!empty($_POST["salvar_dados_pagina_inicial"])) {
    $imagens_selecionadas = $_FILES["fotos_selecionadas_pagina_inicial"];
    $quantidade_itens = $_POST["quantidade_itens"];
    //$dados_pagina_inicial = array();
    $informacoes = $_POST["lista_dados_associativo"];
    $recebe_lista_dados_associativo_verificando = $_POST["lista_dados_associativo_verificando"];
    $registros_lista_dados_associativo_verificando = json_encode($recebe_lista_dados_associativo_verificando,true);
    $registros = json_decode($informacoes,true);

    $recebe_lista_textos_descricoes = $_POST["lista_textos_descricoes"];

    $recebe_testos_descricoes = json_decode($recebe_lista_textos_descricoes,true);
    //array_push($dados_pagina_inicial,$informacoes);

    $textos = array();

    //var_dump($quantidade_itens);

    //var_dump($recebe_testos_descricoes);


    $descricoes_inserir = array();
    foreach($recebe_testos_descricoes as $descricoes)
    {
        foreach($descricoes as $indice => $valores)
        {
            //echo $valores."\n";
            array_push($descricoes_inserir,$valores);
        }
    }

    for ($i = 0; $i < $quantidade_itens; $i++) {
        $recebe_texto = $_POST["texto_descricao".$i];
        //echo "Localizado:".$recebe_texto."\n";

        //array_push($textos, $_POST["texto".$i]);
    }

    //var_dump($textos);

    //var_dump($imagens_selecionadas);

    // foreach ($registros as $percorre) {
    //     foreach($percorre as $indice => $valor)
    //     {
    //         echo $valor.",";
    //     }
    // }

    //var_dump($registros);

    Inserir_Imagens_Pagina_Inicial($imagens_selecionadas, $descricoes_inserir);
    //var_dump($registros);
    // foreach($informacoes as $chave => $valor)
    // {
    //     echo $chave." - ".$valor;
    // }

    // for($indice = 0;$indice < count($informacoes);$indice++)
    // {
    //     echo $informacoes[$indice];
    // }

    // echo implode(",",$informacoes);

    // var_dump($lista);


    // $imagens_inicial = $_POST["envia_imagens"];
    // $textos = $_POST["envia_textos"];
    // $recebe_imagens_pagina_inicial = json_decode($imagens_inicial);
    // $recebe_textos = json_decode($textos);

    // var_dump($recebe_imagens_pagina_inicial);
    // var_dump($recebe_textos);
    //$exemplo_sql = "insert into imagens_inicial(imagem_inicial,descricao_imagem_inicial)values(:imagem_pagina_inicial,:descricao_imagem_pagina_inicial)";
    // foreach($recebe_informacoes as $indice => $valor)
    // {
    //     echo "Indice:".$indice." texto:".$valor."\n";
    // }

    //Inserir_Imagens_Pagina_Inicial($recebe_imagens_pagina_inicial, $recebe_textos);

    // foreach ($recebe_imagens_pagina_inicial as $indice => $valor) {

    //     if(strpos($valor,".jpeg") || strpos($valor,".jpg"))
    //     {
    //         $resultado = "localizou\n";
    //         $monta_parametro_pagina_inicial .= '$execucao_imagem_pagina_inicial->bindValue(":imagem_pagina_inicial", '.$valor.')';
    //     }else
    //     {
    //         $resultado = "nao localizou\n";
    //     }

    //     echo $resultado;
    //     echo $monta_parametro_pagina_inicial;
    // }
}

if(!empty($_POST["processo_busca_imagens_pagina_inicial"]))
{
    Carregar_Imagens_Pagina_Inicial();
}

if (!empty($recebe_acao_inserir_imagens_galeria)) {
    $imagens = $_FILES["fotos_selecionadas_galeria"];
    if (!empty($imagens)) {
        Inserir_Imagens_Galeria($imagens);
    }
}

if (!empty($recebe_processo_buscar_imagens_galeria)) {
    Carregar_Imagens_Galeria();
}



function Inserir_Imagens_Galeria($imagens)
{
    // if(!empty($imagens))
    // {
    //     $quantidade_fotos_galeria = count($imagens["name"]);
    // }

    $recebe_imagens_insercao_apicultura = array();
    //$verifica_movimentacao_imagem;

    $recebe_imagens = $imagens;
    $quantidade = count($imagens);
    $mensagem =  "";
    $extensoes = array('image/jpeg', 'image/png');
    $tamanho_maximo = 500 * 1024;


    if (!empty($imagens)) {
        $quantidade_fotos_galeria = count(array_filter($imagens["name"]));
    }

    if ($quantidade_fotos_galeria > 0) {
        //echo json_encode($mensagem);
        for ($contagem = 0; $contagem < $quantidade_fotos_galeria; $contagem++) {





            $nome = $recebe_imagens["name"][$contagem];
            $tipo_foto = $recebe_imagens["type"][$contagem];
            $tamanho_arquivo = $recebe_imagens["size"][$contagem];

            if (!in_array($tipo_foto, $extensoes)) {
                echo "Imagem não suportada";
            } else {
                $caminho_temporario = $recebe_imagens["tmp_name"][$contagem];
                $destino = "../Imagens/Galeria/" . $recebe_imagens['name'][$contagem];
                $quantidade_fotos = count($recebe_imagens['name']);
                array_push($recebe_imagens_insercao_apicultura, $recebe_imagens["name"][$contagem]);


                if (move_uploaded_file($recebe_imagens['tmp_name'][$contagem], $destino)) {
                    $verifica_movimentacao_imagem = "concluido";
                } else {
                    echo "Foto não foi movida para a pasta";
                }
            }


            // if (count($recebe_imagens["name"]) > 50) {
            //     $mensagem = "Ultrapassou o limite de imagens, por favor selecione até 50 imagens";
            // } elseif (!in_array($tipo_foto, $extensoes)) {
            //     $mensagem = "Imagem não suportada";
            // } elseif ($tamanho_arquivo > $tamanho_maximo) {
            //     $mensagem = "Imagem ultrapassa o limite";
            // } else {
            //     $mensagem = "tudo certo";
            // }
        }


        //var_dump($recebe_imagens_insercao_apicultura);
        if ($verifica_movimentacao_imagem == "concluido") {
            $resultado_insercao_imagens_galeria = array();
            $_SESSION["imagens_observacao_apicultura"] = $recebe_imagens_insercao_apicultura;
            $objeto_imagem = new Imagem();
            $resultado_insercao_imagens_galeria = $objeto_imagem->Inserir_Imagens($recebe_imagens_insercao_apicultura);
            $resultado_imagem = count($resultado_insercao_imagens_galeria);
            echo json_encode($resultado_imagem);
        }
    } else {
        return false;
    }
}

function Carregar_Imagens_Galeria()
{
    $objeto_imagem = new Imagem();
    $imagens_galeria = $objeto_imagem->Carregar_Imagens_Galeria();
    echo json_encode($imagens_galeria);
}

function Carregar_Imagens_Pagina_Inicial()
{
    $objeto_imagem = new Imagem();
    $imagens_pagina_inicial = $objeto_imagem->Carregar_Imagens_Pagina_Inicial();
    echo json_encode($imagens_pagina_inicial);
}

function Excluir_Imagens_Selecionadas($imagens)
{
    $objeto_imagem = new Imagem();
    $resultado_exclusao_imagens = $objeto_imagem->Exclui_Imagens_Selecionadas($imagens);
    echo $resultado_exclusao_imagens;
}


function Excluir_Informacoes_Pagina_Inicial($informacoes_pagina_inicial)
{
    $objeto_imagem = new Imagem();
    $resultado_excluir_informacoes_pagina_inicial = $objeto_imagem->Excluir_Informacoes_Pagina_Inicial($informacoes_pagina_inicial);
    echo json_encode($resultado_excluir_informacoes_pagina_inicial);
}

function Alterar_Informacoes_Pagina_Inicial($descricoes_alteradas,$codigos_registros)
{
    $recebe_resultado_alteracoes_pagina_inicial = array();
    $objeto_imagem = new Imagem();
    $verificando = $objeto_imagem->Alterar_Informacoes_Pagina_Inicial($codigos_registros,$descricoes_alteradas);
    $resultado_informacoes_pagina_inicial = count($recebe_resultado_alteracoes_pagina_inicial);
    echo $verificando;
}

function Inserir_Imagens_Pagina_Inicial($imagens, $textos)
{
    $recebe_informacoes_pagina_inicial = array();
    $recebe_imagens = $imagens;
    //$quantidade = count($recebe_dados_pagina_inicial);
    //$mensagem =  "";
    $extensoes = array('image/jpeg', 'image/png');
    //$tamanho_maximo = 500 * 1024;

    //var_dump($recebe_textos);



    if (!empty($imagens)) {
        $quantidade_fotos_pagina_inicial = count(array_filter($imagens["name"]));
        //echo $quantidade_fotos_pagina_inicial;
    } else {
        echo "Selecione imagens";
    }



    if ($quantidade_fotos_pagina_inicial > 0) {
        for ($contagem = 0; $contagem < $quantidade_fotos_pagina_inicial; $contagem++) {

            $nome = $recebe_imagens["name"][$contagem];
            $tipo_foto = $recebe_imagens["type"][$contagem];
            $tamanho_arquivo = $recebe_imagens["size"][$contagem];

            if (!in_array($tipo_foto, $extensoes)) {
                echo "Imagem não suportada";
            } else {
                $caminho_temporario = $recebe_imagens["tmp_name"][$contagem];
                $destino = "../Imagens/Inicial/" . $recebe_imagens['name'][$contagem];
                $quantidade_fotos = count($recebe_imagens['name']);
                array_push($recebe_informacoes_pagina_inicial, $recebe_imagens["name"][$contagem]);


                if (move_uploaded_file($recebe_imagens['tmp_name'][$contagem], $destino)) {
                    $verifica_movimentacao_imagem = "concluido";
                } else {
                    echo "Foto não foi movida para a pasta";
                }
            }
        }

        if ($verifica_movimentacao_imagem == "concluido") {
            $objeto_imagem = new Imagem();
            $resultado_registrar_informacoes_pagina_inicial = array();
            
            $resultado_registrar_informacoes_pagina_inicial = $objeto_imagem->Inserir_Informacoes_Pagina_Inicial($recebe_informacoes_pagina_inicial,$textos);

            $resultaldo_informacoes_pagina_inicial = count($resultado_registrar_informacoes_pagina_inicial);
            echo json_encode($resultaldo_informacoes_pagina_inicial);
        }
    }
}
