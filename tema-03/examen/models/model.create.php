<?php

    

    # Cargar categorías
    $generos = getGeneros();
    
    # Cargar la tabla de peliculas
    $peliculas = getPeliculas();
    $paises = getPaises();

    # Crear el registro del nuevo libro

    $registro = [
            'id' => nuevo_id($peliculas),
            'tiulo' => $_POST['titulo'],
            'director' => $_POST['director'],
            'nacionalidad' => $_POST['nacionalidad'],
            'generos' => $_POST['generos'],
            'año' => $_POST['año']
    ];
    
    
    # Función nuevo para añadir nueva película
    // $peliculas = nuevo($peliculas, $registro);
    $peliculas[] = $registro;

?>