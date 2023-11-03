<?php

    

    # URL - GET
    

    $indice = $_GET['indice'];

    # Método POST
    $pelicula = [ 

        'id' => $_POST['id'],
        'titulo' => $_POST['titulo'],
        'director' => $_POST['director'],
        'nacionalidad' => $_POST['nacionalidad'],
        'generos' => $_POST['generos'],
        'año' => $_POST['año']
        
    ];

    # Cargar la tabla de generos
    $generos = getGeneros();
    
    # Cargar la tabla de peliculas
    $peliculas = getPeliculas();
    $paises = getPaises();

    # Actualizar la tabla
    $peliculas[$indice] = $pelicula;

    
    

?>