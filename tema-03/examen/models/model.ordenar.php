<?php

    
    $criterio = $_GET['criterio'];

    # Cargar array de generos
    $generos = getGeneros();

    # Cargar la tabla de peliculas
    $peliculas = getPeliculas();

    $paises = getPaises();
    # Ordenar Tabla
    $peliculas = ordenar($peliculas, $criterio);
    

?>