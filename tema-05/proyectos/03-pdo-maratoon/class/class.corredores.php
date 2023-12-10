<?php

/*
    Clase Corredores

    Métodos específicos para BBDD  fp con las tablas
    - Corredores
    
*/



class Corredores extends Conexion
{


    /*

    getCorredores()

    Devuelve un objeto conjunto resultados (PDO_result) 
    con los detalles de  todos los Corredores

    

*/
public function getCorredores()
{

    $sql = "SELECT 
                corredores.id,
                concat_ws(', ', corredores.apellidos, corredores.nombre) corredor,
                corredores.ciudad,
                corredores.fechaNacimiento,
                corredores.sexo,
                corredores.email,
                corredores.dni,
                corredores.edad,
                categorias.nombre as categorias,
                clubs.nombre as club 
            FROM
                corredores
            INNER JOIN
                categorias
            ON corredores.id_categoria = categorias.id
            INNER JOIN 
                clubs
            ON corredores.id_club = clubs.id
            ORDER BY id";

    # Prepare -> objeto
    $pdostmt = $this->pdo->prepare($sql);

    // Establezco fetch
    $pdostmt->setFetchMode(PDO::FETCH_OBJ);

    // ejecuto
    $pdostmt->execute();

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
                    INSERT INTO Corredores
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

            $sql = "SELECT * FROM Corredores WHERE id = :id LIMIT 1";
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
                UPDATE Corredores SET
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
            $sql = " DELETE FROM fp.Corredores WHERE Corredores.id = :id";

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
    Corredores.id,
    CONCAT_WS(', ', Corredores.apellidos, Corredores.nombre) AS nombre,
    Corredores.email,
    Corredores.telefono,
    Corredores.poblacion,
    Corredores.dni,
    TIMESTAMPDIFF(YEAR,
        Corredores.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.Corredores
        INNER JOIN
    cursos ON Corredores.id_curso = cursos.id
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
    Corredores.id,
    CONCAT_WS(', ', Corredores.apellidos, Corredores.nombre) AS nombre,
    Corredores.email,
    Corredores.telefono,
    Corredores.poblacion,
    Corredores.dni,
    TIMESTAMPDIFF(YEAR,
        Corredores.fechaNac,
        NOW()) AS edad,
    cursos.nombreCorto AS curso
FROM
    fp.Corredores
        INNER JOIN
    cursos ON Corredores.id_curso = cursos.id
    WHERE CONCAT_WS(' ', Corredores.id, Corredores.nombre,
     Corredores.apellidos, Corredores.email, Corredores.telefono, 
     Corredores.poblacion, Corredores.dni, TIMESTAMPDIFF(YEAR, Corredores.fechaNac, NOW()), cursos.nombreCorto) LIKE :expresion";

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