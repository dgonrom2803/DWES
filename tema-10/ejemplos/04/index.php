<?php

// Procesar email con PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



// En caso de error lanza excepcion
try {

    // Creo objeto clase PHPMailer
    $mail = new PHPMailer(true);

    // Configuracion juego de caracteres
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";

    // Configuracion SMTP gmail
    $mail->Username = 'diegogonzalezromero7@gmail.com';
    $mail->Password = '';

    // Configuracion SMTP gmail
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Cabecera del email
    $destinatario = 'dgonrom2803@g.educaand.es';
    $remitente = 'diegogonzalezromero7@gmail.com';
    $asunto = 'Email con PHPMailer';
    $mensaje = "<h1>Lorem ipsum dolor sit amet</h1>
    <b>Consectetur adipiscing elit. Cádiz Morbi commodo rutrum dolor, scelerisque laoreet purus aliquet vitae.
    Integer ac felis risus. Sed lobortis risus et dictum lobortis. Sed facilisis tristique leo, sed tempus est volutpat sit amet. Sed sodales
    elit non erat sagittis dictum. In lacinia sodales sagittis. Fusce cursus lectus sed erat viverra congue vel at eros. Suspendisse at magna
    in mi tempus dapibus. Vestibulum id magna ac nisi commodo cursus. Vestibulum porta arcu ut eros convallis tempor. Nam sit amet mattis justo.
    Phasellus id ornare velit, eu ullamcorper ligula. Cras rutrum sapien at massa lobortis, ut bibendum turpis tristique. Nullam quis nunc non risus
    pulvinar convallis. Morbi in tellus lorem.</b>";

    $mail->setFrom($remitente, '<'.$remitente.'>');
    $mail->addAddress($destinatario, '<'.$destinatario.'>');
    $mail->addReplyTo($remitente, '<'.$remitente.'>');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    //Enviamos el mensaje
    $mail->send();


    
    
    
} catch (Exception $e) {


}
