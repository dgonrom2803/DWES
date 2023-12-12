<?php
     // Controlador: buscar.php
    // Descripción: filtra la tabla a partir de la expresión de búsqueda

    // Cargamos la configuracion
    include 'config/db.php';

    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.corredor.php';
    include 'class/class.corredores.php';
    
    // Cargamos el modelo
    include 'models/model.buscar.php';

    // Cargamos la vista principal
    include 'views/view.index.php';
?>