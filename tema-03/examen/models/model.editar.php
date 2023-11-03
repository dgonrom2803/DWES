<?php

    

    # editar?indice=$key
    $indice = $_GET['indice'];

    # Cargar el array de géneros
    $generos = getGeneros();
    
    # Cargar la tabla películas
    $peliculas = getPeliculas();

    $paises = getPaises();
    # Crear el registro que vamos a editar
    $pelicula = $peliculas[$indice];
    
    

?>