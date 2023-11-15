<?php



/* 
    class.fp.php
    Métodos necesarios para la gestión de BBDD de fp

    En este caso sólo los métodos pertenecientes a la tabla Alumnos
*/

Class Fp extends Conexion {
    /* 
        getAlumnos()

        Devuelve un objeto conjunto resultados (mysqli_result) con los detalles de todos los alumnos
    */

    public function getAlumnos() {
        $sql = "SELECT 
                    alumnos.id,
                    alumnos.nombre,
                    alumnos.apellidos,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.fechaNac,
                    alumnos.id_curso
                FROM alumnos
                ORDER BY id";
}
}














?>