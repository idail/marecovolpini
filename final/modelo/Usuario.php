<?php
session_start();
require("Conexao.php");
require("../admin/PHPMailer-master/src/PHPMailer.php");
require("../admin/PHPMailer-master/src/SMTP.php");
require("../admin/PHPMailer-master/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Usuario
{
    private $codigo_usuario;
    private $nome_usuario;
    private $login_usuario;
    private $senha_usuario;

    public function setCodigo_Usuario($codigo_usuario)
    {
        $this->codigo_usuario = $codigo_usuario;
    }

    public function getCodigo_Usuario()
    {
        return $this->codigo_usuario;
    }

    public function setNome_Usuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getNome_Usuario()
    {
        return $this->nome_usuario;
    }

    public function setLogin_Usuario($login_usuario)
    {
        $this->login_usuario = $login_usuario;
    }

    public function getLogin_Usuario()
    {
        return $this->login_usuario;
    }

    public function setSenha_Usuario($senha_usuario)
    {
        $this->senha_usuario = $senha_usuario;
    }

    public function getSenha_Usuario()
    {
        return $this->senha_usuario;
    }

    public function setRetorno_Conexao($retorno_conexao)
    {
        $this->retorno_conexao = $retorno_conexao;
    }

    public function getRetorno_Conexao()
    {
        return $this->retorno_conexao;
    }

    public function __construct()
    {
        $objeto = new Conexao();
        $conecta = $objeto->conecta();
        $this->setRetorno_Conexao($conecta);
    }

    public function valida_acesso($login_usuario, $senha_usuario)
    {
        $sql_busca_usuario = "select * from usuario where login_usuario = :login_usuario and senha_usuario = :senha_usuario";
        $execucao_busca = $this->getRetorno_Conexao()->prepare($sql_busca_usuario);
        $execucao_busca->bindValue(":login_usuario", $login_usuario);
        $execucao_busca->bindValue(":senha_usuario", $senha_usuario);
        $execucao_busca->execute();
        $retorno = $execucao_busca->fetch(PDO::FETCH_ASSOC);

        $_SESSION["nome_usuario"] = $retorno["nome_usuario"];
        //$_SESSION["perfil_usuario"] = $retorno["perfil_usuario"];
        //$_SESSION["login_usuario"] = $retorno["login_usuario"];
        //$_SESSION["senha_usuario"] = $retorno["senha_usuario"];

        if ($execucao_busca->rowCount() > 0) {
            return "validado";
            $this->registra_sessao();
        } else {
            return "nao validado";
        }
    }

    public function registra_sessao()
    {
        $sql_inserir_registro_ultimo_acesso = "INSERT INTO `registra_login`(`ultimo_login`) VALUES (current_timestamp())";
        $registra_ultima_sessao = $this->getRetorno_Conexao()->prepare($sql_inserir_registro_ultimo_acesso);
        $resultado_registra_ultima_sessao = $registra_ultima_sessao->execute();
        return $resultado_registra_ultima_sessao;
    }

    public function busca_ultimo_acesso()
    {
        $sql_busca_ultima_sessao = "SELECT * FROM registra_login ORDER BY codigo_login DESC LIMIT 1,1";
        $executa_busca_ultima_sessao = $this->getRetorno_Conexao()->prepare($sql_busca_ultima_sessao);
        $executa_busca_ultima_sessao->execute();
        $retorno_ultimo_login = $executa_busca_ultima_sessao->fetch(PDO::FETCH_ASSOC);

        date_default_timezone_set('America/Cuiaba');
        $especifica_data = new DateTime($retorno_ultimo_login["ultimo_login"], new DateTimeZone('UTC'));
        //$especifica_data->setTimeZone(new DateTimeZone('America/Cuiaba'));
        $recebe_data =  date_format($especifica_data, 'd/m/Y H:i:s');
        // setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

        //$data = strtotime('2016-10-25 22:36:52');

        // $recebe_data  = utf8_encode(
        //     strtoupper(
        //     strftime('%A, %e de %B de %Y postado às %H:%M', 
        //         $retorno_ultimo_login["ultimo_login"])
        //     ));

        return $recebe_data;
    }

    public function enviar_email_alteracao_de_senha($nova_senha,$senha_sem_criptografia)
    {
        try {

            $sql_altera_senha_usuario = "update usuario set senha_usuario = :senha_alterada where login_usuario = :login_recebido";
            $executa_alteracao_senha_usuario = $this->getRetorno_Conexao()->prepare($sql_altera_senha_usuario);
            // $executa_alteracao_senha_usuario->bindValue(":mesmo_nome", "Idail Ferreira de Vasconcelos Neto");
            $executa_alteracao_senha_usuario->bindValue(":senha_alterada", $nova_senha);
            $executa_alteracao_senha_usuario->bindValue(":login_recebido", "marecovolpini");
            // $executa_alteracao_senha_usuario->bindValue(":codigo", "1");
            $retorno_alteracao_senha_usuario = $executa_alteracao_senha_usuario->execute();

            if (!empty($retorno_alteracao_senha_usuario)) {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Host = "smtp.kinghost.net";
                //$mail->Host = "smtp-mail.outlook.com"; // caso queira enviar para outlook
                //$mail->Host = "smtp.gmail.com"; // caso queira enviar para gmail
                $mail->SMTPAuth = true;
                $mail->Username = "teste@marecovolpini.srv.br";
                //$mail->Username = "neto_br_8@hotmail.com";
                //$mail->Username = "programador@marecovolpini.srv.br";
                //$mail->Password = "idailferreira123";
                //$mail->Password = "BatmanI@7912";
                $mail->Password = "Ms@2022";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                //$mail->setFrom("idaillopes@gmail.com","Idail Neto");
                $mail->addAddress("teste@marecovolpini.srv.br");
                $mail->isHTML(true);
                $mail->Subject = "E-mail de solicitação de alteração de senha";
                $mail->Body = "Senha alterada com sucesso:$senha_sem_criptografia";
                $mail->AltBody = "Segue a nova senha, favor inserir a nova senha para acesso";

                if ($mail->send()) {
                    return "Senha alterada com sucesso , e-mail enviado com sucesso";
                } else {
                    return "e-mail nao foi enviado";
                }
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }

        // try {
        // } catch (Exception $exception) {
        //     return $mail->ErrorInfo;
        // }
    }
}
