<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */


     # Ejecuto el constructor de la clase conexion
    
    /*

        Modelo Principal nuevo

    */

    # Ejecuto el constructor de la clase conexion
    // Conectando a la base de datos FP
    $conexion = new Libros();

    # Extraigo  los cursos para generar el select
   $editoriales = $conexion -> getEditoriales();
   $autores = $conexion -> getAutores();

    
?>