<?php 

/* 
    ejemplo 7.3
    destruir sesion
*/

#continuo la sesion
session_start();

#detalles de la sesion
echo "Sesión iniciada";
echo "<br>";
echo "SID:". session_id();
echo "<br>";
echo "NAME:". session_name();

#elimino sesion
session_destroy();

?>