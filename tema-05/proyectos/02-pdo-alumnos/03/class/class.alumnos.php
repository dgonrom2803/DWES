<?php

/*
    Clase Alumnos

    Métodos específicos para BBDD  fp con las tablas
    - Alumnos
    
*/



class Alumnos extends Conexion
{


    /*

    getAlumnos()

    Devuelve un objeto conjunto resultados (PDO_result) 
    con los detalles de  todos los alumnos

    

*/
    public function getAlumnos()
    {
        $sql = "SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON alumnos.id_curso = cursos.id
                ORDER BY id";

        # Prepare -> objeto clase pdostatement
        $pdostmt = $this->pdo->prepare($sql);

        # Establezco el tipo de fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        # Ejecuto
        $pdostmt->execute();

        # Devuelvo objeto clase pdostatement
        return $pdostmt;

    }

    public function getCursos()
    {
        $sql = "SELECT
                    id, nombreCorto curso
                    from
                    cursos
                    ORDER BY id";

        # Prepare -> objeto clase pdostatement
        $pdostmt = $this->pdo->prepare($sql);

        # Establezco el tipo de fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        # Ejecuto
        $pdostmt->execute();

        # Devuelvo objeto clase pdostatement
        return $pdostmt;

    }


    public function insert_curso(Curso $curso)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    public function insertAlumno(Alumno $alumno)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Alumnos
                     VALUES (
                        null,
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :direccion,
                        :poblacion,
                        :provincia,
                        :nacionalidad,
                        :dni,
                        :fechaNac,
                        :id_curso
                    )";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 256);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);


            # Ejecuto mysqli_stmt e inserto registro
            $pdostmt->execute();

            # Libero memoria
            $pdostmt = null;

            #Cerrar conexion
            $this->pdo = null;


        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    public function read_alumno($id)
    {
        try {

            $sql = "SELECT * FROM alumnos WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Alumno No Encontrado');
            }

            return $data;
        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function update_alumno(Alumno $alumno, $id)
    {

        try {

            $sql = "
                UPDATE Alumnos SET
                    nombre = :nombre,
                    apellidos = :apellidos,
                    email = :email,
                    telefono = :telefono,
                    direccion = :direccion,
                    poblacion = :poblacion,
                    provincia = :provincia,
                    nacionalidad = :nacionalidad,
                    dni = :dni,
                    fechaNac = :fechaNac,
                    id_curso = :id_curso
                WHERE id = :id";


            $pdostmt = $this->pdo->prepare($sql);


            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);


            $pdostmt->execute();


            $pdostmt = null;


            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function deleteAlumno($indice)
    {
        try {
            $sql = " DELETE FROM fp.alumnos WHERE alumnos.id = :id";

            // Creamos una sentencia preparada
            $pdostmt = $this->pdo->prepare($sql);
            // Vinculamos el parametro a eliminar
            $pdostmt->bindParam(":id", $indice, PDO::PARAM_INT);

            // Ejecutamos la sentencia preparada
            $pdostmt->execute();

            // Liberamos memoria
            $pdostmt = null;
            // Cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }

    }
    public function order($criterio)
    {
        try {
            $sql = "SELECT 
    alumnos.id,
    CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS alumno,
    alumnos.email,
    alumnos.telefono,
    alumnos.poblacion,
    alumnos.dni,
    TIMESTAMPDIFF(YEAR,
        alumnos.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.alumnos
        INNER JOIN
    cursos ON alumnos.id_curso = cursos.id
ORDER BY $criterio";

            // Prepare->objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            // Establecemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            // Ejecutamos la consulta y obtenemos los resultados
            $pdostmt->execute();
            // Devolvemos el objeto clase pdostatement
            return $pdostmt;

        } catch (PDOException $e) {
            include '../views/partials/errorDB.php';
            exit();
        }
    }

    /*
        filter($expresion)
    */
    public function filter($expresion)
    {
        try {
            $sql = "SELECT 
    alumnos.id,
    CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS alumno,
    alumnos.email,
    alumnos.telefono,
    alumnos.poblacion,
    alumnos.dni,
    TIMESTAMPDIFF(YEAR,
        alumnos.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.alumnos
        INNER JOIN
    cursos ON alumnos.id_curso = cursos.id
    WHERE CONCAT_WS(' ', alumnos.id, alumnos.nombre,
     alumnos.apellidos, alumnos.email, alumnos.telefono, 
     alumnos.poblacion, alumnos.dni, TIMESTAMPDIFF(YEAR, alumnos.fechaNac, NOW()), cursos.nombreCorto) LIKE :expresion";

            // Prepare->objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            // Manejamos la expresion
            $expresionModifi = "%$expresion%";

            // Vinculamos el valor
            $pdostmt->bindParam(':expresion', $expresionModifi);

            // Establecemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            // Ejecutamos la consulta y obtenemos los resultados
            $pdostmt->execute();
            // Devolvemos el objeto clase pdostatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
}

?>