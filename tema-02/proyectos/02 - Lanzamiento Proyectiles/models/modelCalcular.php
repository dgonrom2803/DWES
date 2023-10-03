<?php

// Declaro la constante de la gravedad
define("G", 9.8);

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





?>