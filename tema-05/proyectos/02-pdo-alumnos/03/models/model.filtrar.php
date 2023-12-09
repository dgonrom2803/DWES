<?php
    

    // Conecto con la base de datos
    $conexion = new Alumnos();

    // Cargamos la expresion
    $expresion = $_GET['expresion'];

    // Invocamos la funcion
    $alumnos = $conexion->filter($expresion);
?>