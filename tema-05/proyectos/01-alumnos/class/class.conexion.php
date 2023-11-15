<?php

/* 

Clase conexión mediante mysqli

*/

class Conexion
{

    // objeto de la clase mysqli
    public $conexion;

    public function __construct()
    {
        try {
            /* crear una nueva instancia del controlador mysqli */
            $this->conexion = new mysqli("localhost", "root", "", "fp");
            if ($this->conexion->connect_errno) {
                throw new Exception('ERROR');
            }
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            echo "<BR>";
            echo "CÓDIGO: " . $e->getCode();
            echo "<BR>";
            echo "FICHERO: " . $e->getFile();
            echo "<BR>";
            echo "LINEA: " . $e->getLine();
            echo "<BR>";

        }


    }
}




?>