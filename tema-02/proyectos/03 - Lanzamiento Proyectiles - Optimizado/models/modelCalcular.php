<?php

// Declaro la constante de la gravedad
define("G", 9.81);

// Obtenemos los valores introducidos
$velInicial =$_POST["velInicial"];
$anguloGrados = $_POST["anguloLanzamiento"];
$anguloRadianes = deg2rad($anguloGrados);

//Cálculos
$V0x = $velInicial * cos($anguloRadianes);
$V0y = $velInicial * sin($anguloRadianes);
$tiempo = 2 * ($V0y / G);
$yMax = (pow($velInicial,2) * pow(sin($anguloRadianes),2)) / (2 * G);
$xMax = pow($velInicial,2) * sin(2* $anguloRadianes) / G;

// Formateo de resultados
$anguloRadianes = number_format($anguloRadianes, 5, ",",".");
$V0x = number_format($V0x, 2,",",".");
$V0y = number_format($V0y, 2,",",".");
$xMax = number_format($xMax, 2,",",".");
$tiempo = number_format($tiempo, 2,",",".");
$yMax = number_format($yMax, 2,",",".");




?>