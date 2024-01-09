<?php


        /*
        contador de visitas
        */

        // Comprobar si existe la cookie contador
        if (isset($_COOKIE['contador'])) {
            // Actualizar el número de visitas
            $num_visitas = $_COOKIE['contador'];
            $num_visitas = $num_visitas + 1;
            setcookie('contador', $num_visitas, time() + 365 * 24 * 60 * 60);
        } else {
            // Establecer una nueva cookie con un valor inicial de 1
            setcookie('contador', $num_visitas, time() + 365 * 24 * 60 * 60);
            $num_visitas + 1;
        }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Cookies</title>
</head>
<body>
    <h1>Número Visitas: <?=$num_visitas ?></h1>
    <li>
        <ul>
            <a href="crear.php">Crear</a>
        </ul>
        <ul>
            <a href="mostrar.php">Mostrar</a>
        </ul>
        <ul>
            <a href="eliminar.php">Eliminar</a>
        </ul>
    </li>
</body>
</html>