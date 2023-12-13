<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */

    // Asignamos a unas variables los valores del formulario enviados a traves del método POST
    $titulo             = $_POST['titulo'];
    $isbn               = $_POST['isbn'];
    $fecha_edicion      = $_POST['fecha_edicion'];
    $autor_id           = $_POST['autor_id'];
    $editorial_id       = $_POST['editorial_id'];
    $stock              = $_POST['stock'];
    $precio_coste       = $_POST['precio_coste'];
    $precio_venta       = $_POST['precio_venta'];
    
    
    // Creamos un objeto de la clase Libro
    $libro = new Libro();
    
    // Añadimos al nuevo objeto los datos del formulario
    $libro->titulo = $titulo;
    $libro->isbn = $isbn;
    $libro->fecha_edicion = $fecha_edicion;
    $libro->autor_id = $autor_id;
    $libro->editorial_id = $editorial_id;
    $libro->stock = $stock;
    $libro->precio_coste = $precio_coste;
    $libro->precio_venta = $precio_venta;

    
    // Conectamos a la base de datos
    $conexion = new Libros();
    
    // Inserto el registro en la tabla Libros
    $conexion->insertLibro($libro);
?>