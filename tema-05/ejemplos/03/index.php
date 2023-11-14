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

$conexion = new mysqli($server, $user, $pass, $bd);

if($conexion->connect_errno){
    echo 'ERROR DE CONEXION Nº:'. $conexion->connect_errno;
    echo '<br>';
    echo 'DESCRIPCIÓN ERROR: '. $conexion->connect_error;
    exit();
}

echo 'Conexión establecida con éxito';


// Creo una variable con el comando SQL
$sql = 'select * from alumnos order by id';

// Objeto de la clase result
$result = $conexion->query($sql);


echo '<br>';
echo 'Nº de registros: '. $result->num_rows;
echo '<br>';
echo 'Nº de columnas: '. $result->field_count;
echo '<br>';

$alumnos = $result->fetch_all(MYSQLI_NUM);

$alumno = $alumnos[0];

var_dump($alumno);

// foreach ($alumnos as $alumno){
// print_r($alumno);
// }

?>