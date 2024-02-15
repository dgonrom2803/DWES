<?php
// Iniciar la sesión
session_start();

// Guardar la hora de inicio de sesión si es la primera vez
if (!isset($_SESSION['inicio'])) {
    $_SESSION['inicio'] = time();
}

// Guardar el SID de la sesión
$sid = session_id();

// Guardar el nombre de la página actual
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Incrementar el contador de visitas a esta página durante la sesión
if (!isset($_SESSION['visitas'][$pagina_actual])) {
    $_SESSION['visitas'][$pagina_actual] = 1;
} else {
    $_SESSION['visitas'][$pagina_actual]++;
}

// Mostrar la información
echo "Nombre de la página: " . $pagina_actual . "<br>";
echo "SID de la sesión: " . $sid . "<br>";
echo "Nombre de la sesión: " . session_name() . "<br>";
echo "Fecha y hora en que se inició la sesión: " . date('Y-m-d H:i:s', $_SESSION['inicio']) . "<br>";
echo "Visitas a esta página durante la sesión: " . $_SESSION['visitas'][$pagina_actual] . "<br>";

// Enlace para cerrar la sesión
echo '<a href="close.php">Close</a>';
?>
