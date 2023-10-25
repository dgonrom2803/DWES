<?php
$articulos = generar_tabla();
$categorias = generar_categorias();

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$nuevoArticulo = 
    [
        'id' => $id,
        'descripcion' => $descripcion,
        'modelo' => $modelo,
        'categoria' => $categoria,
        'unidades' => $unidades,
        'precio' => $precio
    ];

$articulos [] = $nuevoArticulo;


?>