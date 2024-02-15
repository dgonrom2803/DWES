<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Guardar el SID de la sesión
$sid = session_id();

// Guardar el nombre de la sesión
$nombre_sesion = session_name();

// Guardar el contador de visitas totales en la web
$contador_visitas_totales = array_sum($_SESSION['visitas']);

// Guardar la fecha y hora de inicio de la sesión
$inicio_sesion = date('Y-m-d H:i:s', $_SESSION['inicio']);

// Guardar la fecha y hora de fin de la sesión
$fin_sesion = date('Y-m-d H:i:s');

// Calcular la duración de la sesión
$duracion_sesion = strtotime($fin_sesion) - $_SESSION['inicio'];

// Mostrar la información
echo "SID de la sesión: " . $sid . "<br>";
echo "Nombre de la sesión: " . $nombre_sesion . "<br>";
echo "Contador de visitas totales en la web: " . $contador_visitas_totales . "<br>";
echo "Fecha y hora de inicio de la sesión: " . $inicio_sesion . "<br>";
echo "Fecha y hora de fin de la sesión: " . $fin_sesion . "<br>";
echo "Duración de la sesión: " . gmdate("H:i:s", $duracion_sesion) . "<br>";

// Cerrar la sesión
session_unset();
session_destroy();
?>
