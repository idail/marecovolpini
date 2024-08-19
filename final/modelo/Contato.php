<?php
require("Conexao.php");
require("../admin/PHPMailer-master/src/PHPMailer.php");
require("../admin/PHPMailer-master/src/SMTP.php");
require("../admin/PHPMailer-master/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Contato{
    private $nome_contato;
    private $telefone_contato;
    private $email_contato;
    private $texto_contato;
    private $data_hora;
    private $cidade_contato;
    private $pais_contato;
    private $ip_contato;

    public function setNome_Contato($nome_contato)
    {
        $this->nome_contato = $nome_contato;
    }

    public function getNome_Contato()
    {
        return $this->nome_contato;
    }

    public function setTelefone_Contato($telefone_contato)
    {
        $this->telefone_contato = $telefone_contato;
    }

    public function getTelefone_Contato()
    {
        return $this->telefone_contato;
    }

    public function setEmail_Contato($email_contato)
    {
        $this->email_contato = $email_contato;
    }

    public function getEmail_Contato()
    {
        return $this->email_contato;
    }

    public function setTexto_Contato($texto_contato)
    {
        $this->texto_contato = $texto_contato;
    }

    public function getTexto_Contato()
    {
        return $this->texto_contato;
    }

    public function setData_Hora($data_hora)
    {
        $this->data_hora = $data_hora;
    }

    public function getData_Hora()
    {
        return $this->data_hora;
    }

    public function setCidade_Contato($cidade_contato)
    {
        $this->cidade_contato = $cidade_contato;
    }

    public function getCidade_Contato()
    {
        return $this->cidade_contato;
    }

    public function setPais_Contato($pais_contato)
    {
        $this->pais_contato = $pais_contato;
    }

    public function getPais_Contato()
    {
        return $this->pais_contato;
    }

    public function setIP_Contato($ip_contato)
    {
        $this->ip_contato = $ip_contato;
    }

    public function getIP_Contato()
    {
        return $this->ip_contato;
    }

    public function envia_email_contato($nome_contato,$telefone_contato,$email_contato,$texto_contato,$data_hora,$cidade_contato,$pais_contato,$ip_contato)
    {
        try{
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = "smtp.kinghost.net";
            //$mail->Host = "smtp-mail.outlook.com"; // caso queira enviar para outlook
            //$mail->Host = "smtp.gmail.com"; // caso queira enviar para gmail
            $mail->SMTPAuth = true;
            $mail->Username = "contato@marecovolpini.srv.br";
            //$mail->Username = "neto_br_8@hotmail.com";
            //$mail->Username = "programador@marecovolpini.srv.br";
            //$mail->Password = "idailferreira123";
            //$mail->Password = "BatmanI@7912";
            $mail->Password = "Brazil@2022";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            //$mail->setFrom("idaillopes@gmail.com","Idail Neto");
            $mail->addAddress("contato@marecovolpini.srv.br");
            $mail->isHTML(true);
            $mail->Subject = "Formulário de contato";
            $mail->Body = "Nome do contato:$nome_contato<br>Telefone do contato:$telefone_contato<br>E-mail do contato:$email_contato<br>
            Mensagem do contato:$texto_contato<br>Data e hora do contato:$data_hora<br>Cidade do contato:$cidade_contato<br>Pais do contato:$pais_contato<br>IP do Contato:$ip_contato";
            $mail->AltBody = "E-mail formulário de contato";
    
            //$mensagem_enviado = "E-mail enviado com sucesso";
            if ($mail->send()) {
                return "E-mail enviado com sucesso";
            } else {
                return "e-mail nao foi enviado";
            }
        }catch(Exception $excepetion)
        {
            return $mail->ErrorInfo;
        }
    }
}
?>