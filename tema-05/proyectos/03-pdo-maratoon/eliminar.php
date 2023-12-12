<?php
     /*
        Controlador: eliminar.php
        Descripción: permite eliminar un elemento de la tabla
     */

    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.corredor.php';
    include 'class/class.corredores.php';
    
    // Cargamos el modelo
    include 'models/model.eliminar.php';
   
    // Cargamos la vista principal
    header('location: index.php');
?>