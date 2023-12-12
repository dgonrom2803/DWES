<?php
/*
    Controlador: mostrar.php
    Descripción: muestra los detalles del alumno seleccionado
*/

// Cargamos la configuracion
include 'config/db.php';
// Cargamos las clases. A tener en cuenta el orden, ya que es importante
include 'class/class.conexion.php';
include 'class/class.corredores.php';

// Cargamos modelo
include 'models/model.mostrar.php';

// Cargamos vista
include 'views/view.mostrar.php';
?>