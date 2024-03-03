<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'auth.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Register extends Controller
{

    public function render()
    {
        session_start();

        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->name = null;
        $this->view->email = null;
        $this->view->password = null;

        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            $this->view->name = $_SESSION['name'];
            $this->view->email = $_SESSION['email'];
            unset($_SESSION['name']);
            unset($_SESSION['email']);

            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);
        }

        $this->view->render('register/index');
    }


    public function validate()
    {
        session_start();

        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_SPECIAL_CHARS);

        $errores = array();

        if (empty($name)) {
            $errores['name'] = "El campo Nombre es obligatorio.";
        } else if (!$this->model->validarName($name)) {
            $errores['name'] = "Nombre de usuario no válido";
        }

        if (empty($email)) {
            $errores['email'] = "El campo Email es obligatorio.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Email no válido";
        } elseif (!$this->model->validateEmailUnique($email)) {
            $errores['email'] = "Email existente, ya está registrado";
        }

        if (empty($password)) {
            $errores['password'] = "Debe introducir una contraseña.";
        } else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Las contraseñas no coinciden";
        } else if (!$this->model->validatePass($password)) {
            $errores['password'] = "La contraseña no cumple los requisitos mínimos";
        }

        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['error'] = "Fallo en la validación del formulario";
            header("location:" . URL . "register");
        } else {
            $this->model->create($name, $email, $password);

            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";

                $mail->Username = SMTP_USER;
                $mail->Password = SMTP_PASS;

                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $remitente = SMTP_USER;
                $destinatario = $email;

                $mail->isHTML(true);
                $mail->setFrom($remitente, $name);
                $mail->addAddress($destinatario, 'Gesbank');
                $mail->addReplyTo($remitente, $name);
                $mail->Subject = 'Bienvenido a Gesbank';
                $mail->Body = 'El registro se ha realizado correctamente. Sus credenciales son: <br>' .
                    '<b>Nombre</b>: ' . $name . '<br>' .
                    '<b>Email</b>: ' . $email . '<br>' .
                    '<b>Contraseña</b>: ' . $password . ' <br>';

                $mail->send();
            } catch (Exception $e) {
                echo "No se pudo enviar el correo electrónico: {$mail->ErrorInfo}";
            }

            $_SESSION['mensaje'] = "Usuario registrado correctamente";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("location:" . URL . "login");
        }
    }
}
?>
