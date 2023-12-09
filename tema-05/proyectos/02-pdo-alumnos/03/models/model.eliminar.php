<?php

    // cargamos las tablas
    $conexion = new Alumnos();

    // Extraemos el id a través del método get
    $id = $_GET['id'];

   $conexion->deleteAlumno($id);
?>