<?php



/* 
    class.fp.php
    Métodos necesarios para la gestión de BBDD de fp

    En este caso sólo los métodos pertenecientes a la tabla Alumnos
*/

class Fp extends Conexion
{
    /* 
        getAlumnos()

        Devuelve un objeto conjunto resultados (mysqli_result) con los detalles de todos los alumnos
    */

    public function getAlumnos()
    {
        $sql = "SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni
                    timestampdiff(YEAR, alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM alumnos
                INNER JOIN 
                    cursos
                    ON alumnos.id_curso = curso.id
                ORDER BY id";
    }

    // Objeto clase mysqli_stmt
    $stmt = $this->db-prepare($sql);

    // Ejecuto
    $stmt->execute();

    // Objeto clase mysqli_result
    $result = $stmt->get_result();
}














?>