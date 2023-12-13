<?php

    /*

        Modelo Principal index

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Libros();

    # Extraigo  los valores de los alumnos
    //objeto clase pdostatement
    $libros = $conexion->getLibros();

?>