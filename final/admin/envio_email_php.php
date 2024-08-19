$mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.kinghost.net";
        //$mail->Host = "smtp-mail.outlook.com"; // caso queira enviar para outlook
        //$mail->Host = "smtp.gmail.com"; // caso queira enviar para gmail
        $mail->SMTPAuth = true;
        $mail->Username = "joaomarcos@marecovolpini.srv.br";
        //$mail->Username = "neto_br_8@hotmail.com";
        //$mail->Username = "programador@marecovolpini.srv.br";
        //$mail->Password = "idailferreira123";
        //$mail->Password = "BatmanI@7912";
        $mail->Password = "Brazil@2022";
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        
        //$mail->setFrom("idaillopes@gmail.com","Idail Neto");
        $mail->addAddress("joaomarcos@marecovolpini.srv.br");
        $mail->isHTML(true);
        $mail->Subject = "E-mail de solicitação de alteração de senha";
        $mail->Body = "Senha alterada com sucesso:";
        $mail->AltBody = "Chegou o e-mail de teste do idail neto";

        if($mail->send())
        {
            return "e-mail enviado com sucesso";
        }else{
            return "e-mail nao foi enviado";
        }

        }catch(Exception $e)
        {
            return "Erro ao enviar mensagem:{$mail->ErrorInfo}";
        }