<?php 

/* 
    ejemplo 7.3
    Sesión personalizada
*/

# Personalizar sesión
session_id('123456789');
session_name('GESBANK_ini');


#inicio de sesion
session_start();
echo "Sesión iniciada";
echo "<br>";
echo "SID:". session_id();
echo "<br>";
echo "NAME:". session_name();

?>