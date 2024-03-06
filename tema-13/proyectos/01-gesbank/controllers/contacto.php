<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Requerir los archivos necesarios
require 'auth.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Definir la clase Contactar que extiende de Controller
class Contacto extends Controller {

    // Método para renderizar la página de contacto
    public function render() {
        session_start();

        // Comprobar si hay errores guardados en la sesión
        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
        }

        // Comprobar si hay un mensaje de éxito guardado en la sesión
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        // Establecer el título de la página
        $this->view->title = "Página de contacto";

        // Renderizar la vista de la página de contacto
        $this->view->render('contacto/index');
    }

    // Método para validar y enviar el formulario de contacto por correo electrónico
    public function validar() {
        // Recoger los datos del formulario
        session_start();

        // Obtener los datos del formulario y sanearlos
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensaje = filter_var($_POST['mensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Array para almacenar los errores de validación
        $errores = [];

        // Validar los campos del formulario
        if (empty($nombre)) {
            $errores['nombre'] = 'Nombre obligatorio';
        }

        if (empty($email)) {
            $errores['email'] = 'Email obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Formato incorrecto de email';
        }

        if (empty($asunto)) {
            $errores['asunto'] = 'Asunto obligatorio';
        }

        if (empty($mensaje)) {
            $errores['mensaje'] = 'Mensaje obligatorio';
        }

        // Comprobar si hay errores
        if (!empty($errores)) {
            // Guardar los errores en la sesión
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redirigir de nuevo al formulario de contacto
            header("Location: " . URL . "contacto");
            exit();
        } else {
            // Enviar el correo electrónico
            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";

                // Configurar las credenciales SMTP
                $mail->Username = SMTP_USER;
                $mail->Password = SMTP_PASS;

                // Configurar el servidor SMTP
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Desactivar la verificación del certificado SSL
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Establecer el remitente y el destinatario
                $remitente = SMTP_USER;
                $destinatario = $email;

                $mail->setFrom($remitente, $nombre);
                $mail->addAddress($destinatario, 'Diego González Romero');
                $mail->addReplyTo($remitente, $nombre);

                // Establecer el contenido del mensaje
                $mail->isHTML(true);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;

                // Enviar el mensaje
                $mail->send();

                // Guardar mensaje de éxito en la sesión
                $_SESSION['mensaje'] = "Mensaje enviado correctamente";

                // Redirigir de nuevo a la página de contacto
                header("Location: " . URL . "contacto");
                exit();
            } catch (Exception $e) {
                // Manejar cualquier excepción ocurrida durante el envío del correo
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        }
    }
}
?>
