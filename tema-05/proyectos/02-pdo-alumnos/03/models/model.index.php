<?php

    /*

        Modelo Principal index

    */

    setlocale(LC_MONETARY,"es_ES");

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Alumnos();

    # Extraigo  los valores de los alumnos
    //objeto clase pdostatement
    $alumnos = $conexion->getAlumnos();

?>