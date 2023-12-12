<?php

    /*

        Modelo Principal index

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Corredores();

    # Extraigo  los valores de los alumnos
    //objeto clase pdostatement
    $corredores = $conexion->getCorredores();

?>