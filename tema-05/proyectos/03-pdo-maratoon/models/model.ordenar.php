<?php

    // Capturamos el criterio
     $criterioOrder = $_GET['criterio'];

     // Conecto con la base de datos
     $conexion = new Corredores();
     // Objeto de la clase pdostatement
     $corredores = $conexion->order($criterioOrder);
    
?>