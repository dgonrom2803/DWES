<?php

    /*
        ordenar.php

        Permite mostrar los libros ordenados por criterio ASC a partir de las siguientes columnas:
        - id
        - titulo
        - autor
        - editorial
        - unidades
        - coste
        - pvp

    */
   

    // Cargamos la configuracion
    include 'config/config.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.libros.php';

    // Cargamos modelo
    include 'models/model.ordenar.php';

    // Cargamos la vista principal
    include 'views/view.index.php';


?>