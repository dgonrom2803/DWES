<?php

    /*

        index.php

        Controlador que permite realizar una consulta de libros en geslibros y mostrarlos en
        una vista a partir del diseño establecido

    */


    # Cargamos configuración
    include('config/config.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.libros.php');

    # Cargo modelo
    include('models/model.index.php');

    # Cargo vista
    include('views/view.index.php');

?>