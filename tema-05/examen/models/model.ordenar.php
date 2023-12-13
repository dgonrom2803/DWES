<?php

   /*  
        model.ordenar.php

    */

    // Capturamos el criterio
     $criterioOrder = $_GET['criterio'];

     // Conecto con la base de datos
     $conexion = new Libros();
     // Objeto de la clase pdostatement
     $libros = $conexion->order($criterioOrder);
    
?>
