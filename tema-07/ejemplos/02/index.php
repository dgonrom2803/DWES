<?php 

/* 
    ejemplo 7.1
    inicio de sesion
*/

#inicio de sesion
session_start();
echo "Sesión iniciada";
echo "<br>";
echo "SID:". session_id();
echo "<br>";
echo "NAME:". session_name();