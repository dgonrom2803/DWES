<?php 
// Cabecera
$header = "Mime-Versión: 1.0". "\n";
$header .= "Content-Type: text/html; charset-iso-8859-1"."\n";
$header .= "From: Diego González <dgonrom2803@g.educaand.es>\n";
$header .= "X-Mailer: PHP/" . phpversion();

// Parámetros
$destino = "diego@gmail.com";
$asunto = "Mensaje prueba mail()";
$mensaje = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo rutrum dolor, scelerisque laoreet purus aliquet vitae.
Integer ac felis risus. Sed lobortis risus et dictum lobortis. Sed facilisis tristique leo, sed tempus est volutpat sit amet. Sed sodales
elit non erat sagittis dictum. In lacinia sodales sagittis. Fusce cursus lectus sed erat viverra congue vel at eros. Suspendisse at magna
in mi tempus dapibus. Vestibulum id magna ac nisi commodo cursus. Vestibulum porta arcu ut eros convallis tempor. Nam sit amet mattis justo.
Phasellus id ornare velit, eu ullamcorper ligula. Cras rutrum sapien at massa lobortis, ut bibendum turpis tristique. Nullam quis nunc non risus
pulvinar convallis. Morbi in tellus lorem.";

// Envío

if (mail($destino, $asunto, $mensaje, $header)){
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error al enviar el mensaje.";
};