<?php
// Array con los nombres de los meses en español
$meses = [
    'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
];

// Obtener el nombre del mes actual en español
$nombreMes = $meses[date('n') - 1];

// Mostrar el resultado
echo "El nombre del mes actual es: $nombreMes";
?>