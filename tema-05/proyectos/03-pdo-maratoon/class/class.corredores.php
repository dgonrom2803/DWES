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
        corredores.apellidos, 
        corredores.nombre,
        corredores.ciudad,
        corredores.email,
        TIMESTAMPDIFF(YEAR,
            corredores.fechaNacimiento,
            NOW()) AS edad,
        categorias.nombrecorto AS categoria,
        clubs.nombreCorto AS club
    FROM
        maratoon.corredores
            INNER JOIN
        maratoon.categorias ON categorias.id = corredores.id_categoria
            INNER JOIN
        maratoon.clubs ON clubs.id = corredores.id_club
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


    public function update_corredor(Corredor $corredor, $id)
    {

        try {

            $sql = " 
                UPDATE corredores SET
                    nombre = :nombre,
                    apellidos = :apellidos,
                    ciudad = :ciudad,
                    fechaNacimiento = :fechaNacimiento,
                    sexo = :sexo,
                    email = :email,
                    dni = :dni,
                    id_categoria = :id_categoria,
                    id_club = :id_club
                WHERE id = :id";


            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 128);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();


            $pdostmt = null;


            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function deleteCorredor($indice)
    {
        try {
            $sql = " DELETE FROM maratoon.corredores WHERE corredores.id = :id";

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
        // Vamos a cambiar en vez de criterio a que sea por número del nombre
        // ejemplo nombre es la fila 2 se le pone 2.
        
        try {
            $sql = "SELECT 
                corredores.id,
                CONCAT_WS(', ',corredores.apellidos, corredores.nombre) as corredor,
                corredores.ciudad,
                corredores.email,
                TIMESTAMPDIFF(YEAR,
                    corredores.fechaNacimiento,
                    NOW()) AS edad,
                categorias.nombrecorto AS categorias,
                clubs.nombreCorto AS club
            FROM
                maratoon.corredores
                    INNER JOIN
                maratoon.categorias ON categorias.id = corredores.id_categoria
                    INNER JOIN
                maratoon.clubs ON clubs.id = corredores.id_club
            ORDER BY $criterio";

            // Preparo la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecuto la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    public function buscar($expresion)
    {
        try {
            $sql = "SELECT 
            corredores.id,
            corredores.apellidos, 
            corredores.nombre,
            corredores.ciudad,
            corredores.email,
            TIMESTAMPDIFF(YEAR,
                corredores.fechaNacimiento,
                NOW()) AS edad,
            categorias.nombrecorto AS categoria,
            clubs.nombreCorto AS club
        FROM
            maratoon.corredores
                INNER JOIN
            maratoon.categorias ON categorias.id = corredores.id_categoria
                INNER JOIN
            maratoon.clubs ON clubs.id = corredores.id_club
            WHERE
            CONCAT_WS('',corredores.nombre,
                        corredores.apellidos, 
                        corredores.ciudad,
                        corredores.email,
                        TIMESTAMPDIFF(YEAR,corredores.fechaNacimiento,NOW()),
                        categorias.nombrecorto,
                        clubs.nombreCorto) 
            LIKE :expresion";

            // Modificamos la expresión recibida como parametro
            $expresion = "%" . $expresion . "%";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Asignamos el valor del parametro
            $pdostmt->bindParam(":expresion", $expresion);

            // Establecemos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el resultado de la consulta
            return $pdostmt;

        } catch (PDOException $e) {

            include 'views/partials/errorDB.php';
            exit();

        }
    }

}

?>