<?php


$paises = arrayJugadores::getPaises();
$posiciones = arrayJugadores::getPosiciones();
$equipos = arrayJugadores::getEquipos();

$jugadores = new arrayJugadores();
$jugadores->getDatos();


$idMostrar = $_GET['key'];


$jugador = $jugadores->read($idMostrar);

?>