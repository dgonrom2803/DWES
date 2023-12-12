<?php

    // cargamos las tablas
    $conexion = new Corredores();

    // Extraemos el id a través del método get
    $id = $_GET['id'];

   $conexion->deleteCorredor($id);
?>