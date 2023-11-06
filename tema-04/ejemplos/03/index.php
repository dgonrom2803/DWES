<?php

include("class/class.vehiculo.php");


$coche_1 = new Vehiculo(
    'Audi Q5',
    'Gama todoterreno, Audi',
    '1478HRT',
    '0'

);

var_dump($coche_1);

var_dump($coche_1 ->getMatricula());

$coche_1->setModelo("Audi Q5");
$coche_1->setNombre("Gama todoterreno, Audi");
$coche_1->setMatricula("1478HRT");
$coche_1->setVelocidad("0");

$coche_1->aumentarVelocidad();

var_dump($coche_1);

?>