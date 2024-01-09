<?php 
    /* 
        mostrar.php
        mostrar el valor de la cookie
    */

    // Accedo a la cookie
    if (isset($_COOKIE['nombre'])){
        echo $_COOKIE['nombre'];
        echo '<BR>';
    } if (isset($_COOKIE['apellidos'])){
        echo $_COOKIE['apellidos'];
        echo '<BR>';
    } else {
        echo 'Cookie no existente';
    }




?>