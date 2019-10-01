<?php
// require "phpmailer/PHPMailerAutoload.php";
function smtpeail($emailinst, $assunto, $msg, $funcao, $uploadfile)
{

    echo '<pre>';
    print_r($uploadfile);
    echo '</pre>';
    // Inicia a classe PHPMailer
    $mail = new PHPMailer(true);
     
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP
     
    try {
         $mail->CharSet = "UTF-8";
         $mail->SMTPDebug = 2; 
         $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
         $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
         $mail->Port       = 465; //  Usar 587 porta SMTP
         $mail->Username = 'web02@dowbis.com.br4'; // Usuário do servidor SMTP (endereço de email)
         $mail->SMTPSecure = 'ssl'; 
         // $mail->Password = 'auB4*mEV@'; 
         $mail->Password = '*2jN&VdL'; // Senha do servidor SMTP (senha do email usado)
          $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


     
         //Define o remetente
         // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
         $mail->SetFrom('web02@dowbis.com.br', 'Trabalhe Conosco - ALFAMÉRICA'); //Seu e-mail
         $mail->AddReplyTo('web02@dowbis.com.br', 'Trabalhe Conosco - ALFAMÉRICA'); //Seu e-mail
         $mail->Subject = $assunto;//Assunto do e-mail
         $mail->AddAttachment($uploadfile);
     
         //Define os destinatário(s)
         //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
         $mail->AddAddress('web02@dowbis.com.br', '');
     
         //Campos abaixo são opcionais 
         //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
         $mail->AddCC('web02@dowbis.com.br', 'Destinatario'); // Copia
         //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
         //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
     
     

      
         $mail->MsgHTML($msg); 
     
         ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
         //$mail->MsgHTML(file_get_contents('arquivo.html'));
     
         $mail->Send();
         echo "Mensagem enviada com sucesso</p>\n";
     
        //caso apresente algum erro é apresentado abaixo com essa exceção.
        }catch (phpmailerException $e) {
          echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }










    
}







