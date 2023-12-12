<?php
    

    // Conecto con la base de datos
    $conexion = new Corredores();

    // Cargamos la expresion
    $expresion = $_GET['expresion'];

    // Invocamos la funcion
    $corredores = $conexion->buscar($expresion);
?>