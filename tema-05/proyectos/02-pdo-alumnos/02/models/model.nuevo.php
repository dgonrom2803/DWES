<?php

    /*

        Modelo Principal nuevo

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Alumnos();

    # Extraigo  los cursos para generar el select
    $cursos = $conexion->getCursos();

?>