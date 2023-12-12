<?php

    /*

        Controlador: editar.php
        Descripción: mostrar un formulario con los detalles editables
        del alumno seleccionado
    */

    # Cargamos configuración
    include('config/db.php');

    # Classes
    include 'class/class.conexion.php';
    include 'class/class.corredores.php';

    # Model
    include 'models/model.editar.php';


    # Vista
    include 'views/view.editar.php';

?>