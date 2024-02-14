<?php

// Procesar email con PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Creo objeto clase PHPMailer
$mail = new PHPMailer(true);

// En caso de error lanza Exception
try { 

    // Configuración juego caracteres
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";

    // Credenciales SMPT gmail
    $mail->Username = 'diegogonzalezromero7@gmail.com';
    $mail->Password = 'yldg vnoj vqjk pfkk';

    // Configuración SMPT gmail
    $mail->SMTPDebug = 2;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication                             //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // tls Enable implicit TLS encryption
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Cabecera del emial
    $destinatario = 'dgonrom2803@g.educaand.es';
    $remitente    = 'diegogonzalezromero7@gmail.com';
    $asunto       = "Email con PHPMailer";
    $mensaje      = file_get_contents('email/email.html');

    $mail->setFrom($remitente, 'Diego');
    $mail->addAddress($destinatario, 'Pedro');
    $mail->addReplyTo($remitente, 'Diego González');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addEmbeddedImage('email/images/fichero01.png', 'mi_imagen');         //Add attachments               //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->msgHTML($mensaje);
    
    // Enviamos el mensaje
    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    