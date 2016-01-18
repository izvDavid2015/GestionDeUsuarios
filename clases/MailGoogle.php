<?php

class MailGoogle {
    
    static function solicitateToken(){
        session_start();
        require_once 'MailGoogle/google/autoload.php';
        $cliente = new Google_Client();
        $cliente->setApplicationName(Constant::PRO1);
        $cliente->setClientId(Constant::CID1);
        $cliente->setClientSecret(Constant::CSE1);
        $cliente->setRedirectUri(Constant::URI1);
        $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $cliente->setAccessType('offline');
        if (!$cliente->getAccessToken()) {
            $auth = $cliente->createAuthUrl(); //solicitud
            header("Location: $auth");
        }
    }
    
    static function saveToken(){
        session_start();
        require_once 'MailGoogle/google/autoload.php';
        $cliente = new Google_Client();
        $cliente->setApplicationName(Constant::PRO1);
        $cliente->setClientId(Constant::CID1);
        $cliente->setClientSecret(Constant::CSE1);
        $cliente->setRedirectUri(Constant::URI1);
        $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $cliente->setAccessType('offline');
        if (isset($_GET['code'])) {
            $cliente->authenticate($_GET['code']);
            $_SESSION['token'] = $cliente->getAccessToken();
            $archivo = "../clases/MailGoogle/token.conf";
            $fh = fopen($archivo, 'w') or die("error");
            fwrite($fh, $cliente->getAccessToken()); //almacenamiento del token
            fclose($fh);
        }
    }
    
    static function sendMailActivacion($destinatario){
        session_start();
        $secreto = sha1($destinatario . Constant::SEMILLA);
        $origen = "izvdavid@gmail.com";
        $alias = "David";
        $destino = $destinatario;
        $asunto="Activacion";
        $mensaje = "https://gestiondeusuarios-izvdavid2015.c9users.io/php/phpactivacion.php?correo=$destinatario&secreto=$secreto";

        require_once 'MailGoogle/google/autoload.php';
        require_once 'MailGoogle/class.phpmailer.php';  //las últimas versiones también vienen con autoload
        $cliente = new Google_Client();

        $cliente->setApplicationName(Constant::PRO1);
        $cliente->setClientId(Constant::CID1);
        $cliente->setClientSecret(Constant::CSE1);
        $cliente->setRedirectUri(Constant::URI1);

        $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $cliente->setAccessToken(file_get_contents('../clases/MailGoogle/token.conf'));
        if ($cliente->getAccessToken()) {
            $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = $origen;
                $mail->FromName = $alias;
                $mail->AddAddress($destino);
                $mail->AddReplyTo($origen, $alias);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                echo "Correo enviado correctamente.";
            } catch (Exception $e) {
                print($e->getMessage());
                echo "Error en el envio de correo";
            }
        }else{
            echo "No conectado con Gmail.";
        }
    }
    
    static function sendMailRecuperaciondeclave($destinatario){
        session_start();
        $secreto = sha1($destinatario . Constant::SEMILLA);
        $origen = "izvdavid@gmail.com";
        $alias = "David";
        $destino = $destinatario;
        $asunto="Recuperacion de clave";
        $mensaje = "Recuperar la clave:   https://gestiondeusuarios-izvdavid2015.c9users.io/php/viewclave.php?correo=$destinatario&secreto=$secreto";

        require_once 'MailGoogle/google/autoload.php';
        require_once 'MailGoogle/class.phpmailer.php';  //las últimas versiones también vienen con autoload
        $cliente = new Google_Client();

        $cliente->setApplicationName(Constant::PRO1);
        $cliente->setClientId(Constant::CID1);
        $cliente->setClientSecret(Constant::CSE1);
        $cliente->setRedirectUri(Constant::URI1);

        $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $cliente->setAccessToken(file_get_contents('../clases/MailGoogle/token.conf'));
        if ($cliente->getAccessToken()) {
            $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = $origen;
                $mail->FromName = $alias;
                $mail->AddAddress($destino);
                $mail->AddReplyTo($origen, $alias);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                echo "Correo enviado correctamente.";
            } catch (Exception $e) {
                print($e->getMessage());
                echo "Error en el envio de correo";
            }
        }else{
            echo "No conectado con Gmail.";
        }
    }
    
    static function sendMailCambioEmail($destinatario){
        session_start();
        $secreto = sha1($destinatario . Constant::SEMILLA);
        $origen = "izvdavid@gmail.com";
        $alias = "David";
        $destino = $destinatario;
        $asunto="Cambio de email.";
        $mensaje = "Cambiar el email:   https://gestiondeusuarios-izvdavid2015.c9users.io/php/viewemail.php?correo=$destinatario&secreto=$secreto";

        require_once 'MailGoogle/google/autoload.php';
        require_once 'MailGoogle/class.phpmailer.php';  //las últimas versiones también vienen con autoload
        $cliente = new Google_Client();

        $cliente->setApplicationName(Constant::PRO1);
        $cliente->setClientId(Constant::CID1);
        $cliente->setClientSecret(Constant::CSE1);
        $cliente->setRedirectUri(Constant::URI1);

        $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
        $cliente->setAccessToken(file_get_contents('../clases/MailGoogle/token.conf'));
        if ($cliente->getAccessToken()) {
            $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = $origen;
                $mail->FromName = $alias;
                $mail->AddAddress($destino);
                $mail->AddReplyTo($origen, $alias);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                echo "Correo enviado correctamente.";
            } catch (Exception $e) {
                print($e->getMessage());
                echo "Error en el envio de correo";
            }
        }else{
            echo "No conectado con Gmail.";
        }
    }
    
}
