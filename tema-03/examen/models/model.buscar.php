<?php


    # Recibo formulario tipo GET
    # la variable exprsion
    $expresion = $_GET['expresion'];

    # Cargar array de generos
    $generos = getGeneros();

    # Cargar la tabla de libros
    $peliculas = getPeliculas();
    $paises = getPaises();

    # Filtro la tabla
    $peliculas = filtrar($peliculas, $expresion);
    
?>