<?php

    // Capturamos el criterio
     $criterioOrder = $_GET['criterio'];

     // Conecto con la base de datos
     $conexion = new Alumnos();
     // Objeto de la clase pdostatement
     $alumnos = $conexion->order($criterioOrder);
    
?>