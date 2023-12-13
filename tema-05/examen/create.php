<?php

    /*
        Controlador principal index con PDO
    */

    # Cargamos configuración
    include('config/config.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.libro.php');
    include('class/class.libros.php');

    # Cargo modelo
    include('models/model.create.php');

    # Redirecciono controlador principal
    header('location: index.php');

?>