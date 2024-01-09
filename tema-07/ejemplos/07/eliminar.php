<?php 
    /* 
        crear.php
        ejemplo creacion cookie
    */

    // Crear cookie nombre
    setcookie('nombre', 'Diego', time() + -3600);

    // Crear cookie apellidos
    setcookie('apellidos', 'González Romero', time() + -3600);

    echo 'Cookies eliminadas correctamente';



?>