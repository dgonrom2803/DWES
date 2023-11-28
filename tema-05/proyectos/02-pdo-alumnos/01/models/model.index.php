<?php

    /*

        Modelo Principal index

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Alumnos();

    # Extraigo  los valores de los alumnos
    $alumnos = $conexion->getAlumnos();

?>