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
                corredores.nombre,
                corredores.apellidos,
                corredores.ciudad,
                corredores.fechaNacimiento,
                corredores.sexo,
                corredores.email,
                corredores.dni,
                corredores.edad,
                categorias.nombrecorto as categoria,
                clubs.nombrecorto as club 
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

public function insertCorredor(Corredor $corredor)
    {

        try {
            $sql = "INSERT INTO maratoon.corredores (
                nombre,
                apellidos,
                ciudad,
                fechaNacimiento,
                sexo,
                email,
                dni,
                id_categoria,
                id_club
            ) VALUES(
                :nombre,
                :apellidos,
                :ciudad,
                :fechaNacimiento,
                :sexo,
                :email,
                :dni,
                :id_categoria,
                :id_club)";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 128);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

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

    public function getCategorias()
    {
        $sql = "SELECT
                    id, nombreCorto categoria
                    from
                    categorias
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

    public function getClubs()
    {
        $sql = "SELECT
                    id, nombreCorto club
                    from
                    clubs
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

    public function read_corredor($id)
    {
        try {

            $sql = "SELECT * FROM corredores WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Corredor No Encontrado');
            }

            return $data;
        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }


}

?>