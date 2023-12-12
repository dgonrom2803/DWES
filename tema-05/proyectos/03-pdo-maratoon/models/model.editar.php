<?php

    /*

        Modelo editar.php

    */
    # tomamos por GET el id del alumno a editar
    $id_editar = $_GET['id'];

    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    // conexion con la BBDD
    $conexion = new Corredores();

    # extraigo los valores de los alumnos y de los cursos
    // objeto de la clase pdo stmt
    $corredores = $conexion->getCorredores(); 
    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();

    # Buscamos el alumno a editar
    $corredor = $conexion->read_corredor($id_editar);
    

?>