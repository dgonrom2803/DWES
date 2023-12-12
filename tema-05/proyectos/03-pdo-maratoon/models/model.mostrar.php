<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */

    $id = $_GET['id'];

    // Creamos una conexion
    $conexion = new Corredores();

    // Cargamos los cursos
    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();

    // Cargamos los datos del alumno según su id
    $corredor = $conexion->read_corredor($id);

?>