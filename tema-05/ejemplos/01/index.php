<?php 

/*

127.0.0.1:3306
Conexión localhost con usuario root
a la base de datos fp


*/

$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'fp';

$conexion = mysqli_connect($server, $user, $pass, $bd);

if(mysqli_connect_errno()){
    echo 'ERROR DE CONEXION Nº:'. mysqli_connect_errno();
    echo '<br>';
    echo 'DESCRIPCIÓN ERROR: '. mysqli_connect_error();
    exit();
}

echo 'Conexión establecida con éxito';


?>