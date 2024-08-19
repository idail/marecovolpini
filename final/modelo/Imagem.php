<?php
require("Conexao.php");
class Imagem
{
    private $codigo_imagem;
    private $imagem;
    private $descricao_imagem;
    private $retorno_conexao;

    public function setCodigo_Imagem($codigo_imagem)
    {
        $this->codigo_imagem = $codigo_imagem;
    }

    public function getCodigo_Imagem()
    {
        return $this->codigo_imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setRetorno_Conexao($retorno_conexao)
    {
        $this->retorno_conexao = $retorno_conexao;
    }

    public function getRetorno_Conexao()
    {
        return $this->retorno_conexao;
    }

    public function setDescricao_Imagem($descricao_imagem)
    {
        $this->descricao_imagem = $descricao_imagem;
    }

    public function getDescricao_Imagem()
    {
        return $this->descricao_imagem;
    }

    public function __construct()
    {
        $objeto = new Conexao();
        $conecta = $objeto->conecta();
        $this->setRetorno_Conexao($conecta);
    }

    public function Inserir_Imagens($imagens)
    {
        $recebe_insercoes_imagens = array();
        try {
            if (!empty($imagens)) {
                $recebe_imagens = $imagens;
                for ($indice = 0; $indice < count($recebe_imagens); $indice++) {
                    $sql_inserir_imagens_galeria = "insert into imagens_galeria(imagem)values(:imagem)";
                    $execucao_imagem_galeria = $this->getRetorno_Conexao()->prepare($sql_inserir_imagens_galeria);
                    $execucao_imagem_galeria->bindValue(":imagem", $recebe_imagens[$indice]);
                    // $execucao_novo_registro_imagens_apicultura->bindValue(":codigo_relacionado_apicultura", $this->getCodigo_Relacionado_Apicultura());
                    // $execucao_novo_registro_imagens_apicultura->bindValue(":tipo_dado", $this->getTipo_Dado());
                    // $execucao_novo_registro_imagens_apicultura->bindValue(":codigo_relacionado_observacao", $this->getCodigo_Relacionado_Observacao());
                    $resultado_imagens_galeria = $execucao_imagem_galeria->execute();
                    array_push($recebe_insercoes_imagens, $resultado_imagens_galeria);
                }
                return $recebe_insercoes_imagens;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }

    //public function Inserir_Informacoes_Pagina_Inicial($registros, $registros_lista_dados_associativo_verificando)
    public function Inserir_Informacoes_Pagina_Inicial($imagens, $textos)
    {
        $recebe_resultado_inserir_informacoes_pagina_inicial = array();
        if (!empty($imagens) && !empty($textos)) {
            try {

                //var_dump($imagens);

                //var_dump($textos);

                $sql_inserir_informacoes_pagina_inicial = "";
                $quantidade = count($imagens);
                // for($sql = 0;$sql < $quantidade;$sql++)
                // {
                //     $sql_inserir_informacoes_pagina_inicial .= "";
                // }

                for ($imagens_recebidas = 0; $imagens_recebidas < count($imagens); $imagens_recebidas++) {
                    // $recebe_texto_decode = utf8_decode($textos[$imagens_recebidas]);
                    // $recebe_texto_encode = utf8_encode($textos[$imagens_recebidas]);
                    // echo "Recebe texto decode:".$recebe_texto_decode."\n";

                    // echo "Recebe texto encode:".$recebe_texto_encode."\n";


                    //$sql_inserir_informacoes_pagina_inicial = "insert into imagens_inicial(imagem_inicial,descricao_imagem_inicial)values('$imagens[$imagens_recebidas]','$recebe_texto');";


                    $sql_inserir_informacoes_pagina_inicial = "insert into imagens_inicial(imagem_inicial,descricao_imagem_inicial)values(:imagem_pagina_inicial,:descricao_imagem_pagina_inicial);";
                    $executa_registro_informacoes_pagina_inicial = $this->getRetorno_Conexao()->prepare($sql_inserir_informacoes_pagina_inicial);
                    $executa_registro_informacoes_pagina_inicial->bindValue(":imagem_pagina_inicial", $imagens[$imagens_recebidas]);
                    $executa_registro_informacoes_pagina_inicial->bindValue(":descricao_imagem_pagina_inicial", $textos[$imagens_recebidas]);
                    $resultado_inserir_informacoes_pagina_inicial = $executa_registro_informacoes_pagina_inicial->execute();
                    array_push($recebe_resultado_inserir_informacoes_pagina_inicial, $resultado_inserir_informacoes_pagina_inicial);


                    //unset($sql_inserir_informacoes_pagina_inicial);


                    // for ($textos_recebidos = 0; $textos_recebidos < count($textos); $textos_recebidos++) {
                    //     $valor_recebido = $textos[$textos_recebidos];
                    //     $sql_inserir_informacoes_pagina_inicial .= ",$valor_recebido";
                    // }
                    // $sql_inserir_informacoes_pagina_inicial .= ")";
                }

                return $recebe_resultado_inserir_informacoes_pagina_inicial;
            } catch (PDOException $exception) {
                return $exception->getMessage();
            } catch (Exception $excecao) {
                return $excecao->getMessage();
            }
        }
    }

    public function Alterar_Informacoes_Pagina_Inicial($codigos, $descricoes_alteradas)
    {
        if (!empty($codigos) && !empty($descricoes_alteradas)) {
            $recebe_resultado_alteracoes_pagina_inicial = array();
            try {
                $quantidade_registros = count($codigos);
                for ($indice = 0; $indice < $quantidade_registros; $indice++) {
                    //echo "Codigos:" . $codigos[$indice] . ",Descrição Imagem:" . $descricoes_alteradas[$indice] . "\n";
                    $sql_alteracao_informacoes_pagina_inicial = "update imagens_inicial set descricao_imagem_inicial = :descricao_alterada_imagem_inicial where codigo_imagem_inicial = :codigo_descricao_alterada";
                    $executa_alteracao_informacoes_pagina_inicial = $this->getRetorno_Conexao()->prepare($sql_alteracao_informacoes_pagina_inicial);

                    $executa_alteracao_informacoes_pagina_inicial->bindValue(":descricao_alterada_imagem_inicial", "$descricoes_alteradas[$indice]");
                    $executa_alteracao_informacoes_pagina_inicial->bindValue(":codigo_descricao_alterada", $codigos[$indice]);
                    $resultado_alteracao_informacoes_pagina_inicial =  $executa_alteracao_informacoes_pagina_inicial->execute();
                    // array_push($recebe_resultado_alteracoes_pagina_inicial,$resultado_alteracao_informacoes_pagina_inicial);
                }
                return $resultado_alteracao_informacoes_pagina_inicial;
            } catch (PDOException $excecao) {
                return $excecao->getMessage();
            } catch (Exception $excecao) {
                return $excecao->getMessage();
            }
        }
    }

    public function Carregar_Imagens_Pagina_Inicial()
    {
        $registros_imagens_pagina_inicial = array();
        try {
            $executa_busca_imagens_pagina_inicial = $this->getRetorno_Conexao()->prepare("select * from imagens_inicial");
            $executa_busca_imagens_pagina_inicial->execute();
            $registros_imagens_pagina_inicial = $executa_busca_imagens_pagina_inicial->fetchAll(PDO::FETCH_ASSOC);
            return $registros_imagens_pagina_inicial;
        } catch (PDOException $excecao) {
            return $excecao->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }

    public function Carregar_Imagens_Galeria()
    {
        $registros_imagens_galeria = array();
        try {
            $executa_busca_imagens_galeria = $this->getRetorno_Conexao()->prepare("select * from imagens_galeria");
            $executa_busca_imagens_galeria->execute();
            $registros_imagens_galeria = $executa_busca_imagens_galeria->fetchAll(PDO::FETCH_ASSOC);
            return $registros_imagens_galeria;
        } catch (PDOException $excecao) {
            return $excecao->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }

    public function Exclui_Imagens_Selecionadas($imagens_selecionadas)
    {
        //$resultado_exlusao_arquivo = "";



        // for ($indice = 0; $indice < count($imagens_selecionadas); $indice++) {
        //     if (file_exists("../ORIGINAL/" . $indice)) {
        //         $resultado_exlusao_arquivo = unlink("../ORIGINAL/" . $indice);
        //     }
        // }

        try {
            if (!empty($imagens_selecionadas)) {
                foreach ($imagens_selecionadas as $imagens) {
                    // if (file_exists("../ORIGINAL/" . $imagens)) {
                    //     $resultado = unlink("../ORIGINAL/" . $imagens);
                    // }

                    $sql_excluir_imagem_selecionada = "delete from imagens_galeria where codigo_imagem = :codigo_imagem";
                    $executa_exclusao_imagem_selecionada = $this->getRetorno_Conexao()->prepare($sql_excluir_imagem_selecionada);
                    $executa_exclusao_imagem_selecionada->bindValue(":codigo_imagem", $imagens);
                    $resultado_exclusao_imagem_selecionada = $executa_exclusao_imagem_selecionada->execute();
                }

                //for ($indice = 0; $indice < count($imagens_selecionadas); $indice++) {}
                return $resultado_exclusao_imagem_selecionada;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }

    public function Excluir_Informacoes_Pagina_Inicial($informacoes_pagina_inicial)
    {
        try {
            if (!empty($informacoes_pagina_inicial)) {
                foreach ($informacoes_pagina_inicial as $imagens) {
                    // if (file_exists("../ORIGINAL/" . $imagens)) {
                    //     $resultado = unlink("../ORIGINAL/" . $imagens);
                    // }

                    $sql_excluir_informacoes_pagina_inicial = "delete from imagens_inicial where codigo_imagem_inicial = :codigo_imagem";
                    $executa_excluir_registros_pagina_inicial = $this->getRetorno_Conexao()->prepare($sql_excluir_informacoes_pagina_inicial);
                    $executa_excluir_registros_pagina_inicial->bindValue(":codigo_imagem", $imagens);
                    $resultado_excluir_registros_pagina_inicial = $executa_excluir_registros_pagina_inicial->execute();
                    // var_dump($executa_excluir_registros_pagina_inicial);
                    // var_dump($sql_excluir_informacoes_pagina_inicial);
                    //var_dump($imagens);
                }

                //for ($indice = 0; $indice < count($imagens_selecionadas); $indice++) {}
                return $resultado_excluir_registros_pagina_inicial;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }
}
