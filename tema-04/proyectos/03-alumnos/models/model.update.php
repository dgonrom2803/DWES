<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle de un articulo

        Método POST 
            - descripcion
            - modelo
            - Marca
            - categorias (valor númerico)
            - unidades
            - precio
        
        Método GET
            - id
    */
// Carga de datos
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$idBuscado = $_GET['indice'];

// Recogemos los datos del formulario

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categoriasArt = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# creo un objeto de la clase articulo
$articulo = new Articulo(
    $id,
    $descripcion,
    $modelo,
    $marca,
    $categoriasArt,
    $unidades,
    $precio
);

// Añadimos el artículo usando la funcion create de ArrayArticulos
$articulos->update($articulo, $idBuscado);

# Generamos una notificación
$notificacion = 'Articulo modificado con éxito';
?>