<?php

    /*

        Modelo Principal nuevo

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Corredores();

    # Extraigo  los cursos para generar el select
    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();

?>