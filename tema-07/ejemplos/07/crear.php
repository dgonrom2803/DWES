<?php 
    /* 
        crear.php
        ejemplo creacion cookie
    */

    // Nombre cookie
    $nombre_cookie = 'datos_personales';

    // Crear cookie nombre
    setcookie('nombre', 'Diego', time() + 60*60);

    // Crear cookie apellidos
    setcookie('apellidos', 'González Romero', time() + 60*60);

    echo 'Cookies creadas correctamente';



?>