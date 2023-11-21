<?php
$paises = arrayJugadores::getPaises();
$posiciones = arrayJugadores::getPosiciones();
$equipos = arrayJugadores::getEquipos();

$jugadores = new arrayJugadores();
$jugadores->getDatos();


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$pais = $_POST['pais'];
$equipo = $_POST['equipo'];
$posicion = $_POST['posiciones'];
$contrato = $_POST['contrato'];


$jugador = new Jugador(
    $id, 
    $nombre, 
    $numero, 
    $pais,
    $equipo,
    $posicion,
    $contrato);


$jugadores->create($jugador);




?>