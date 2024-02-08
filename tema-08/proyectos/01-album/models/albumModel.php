<?php

class albumModel extends Model
{
    public function get()
    {
        try {

            $sql = "SELECT 
                                        *
                                FROM
                                        albumes
                                ORDER BY
                                        albumes.id
                                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            
            //Forma de objeto
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
        
            $pdoSt->execute();
            return $pdoSt;


        } catch (PDOException $e) {

            include "template/partials/errorDB.php";
            // Para cortar la conexión.
            exit();

        }

    }

    public function create(classAlbum $album)
    {
        try {

            $sql = "
                        INSERT INTO albumes (
                            titulo,
                            descripcion,
                            autor,
                            fecha,
                            lugar,
                            categoria,
                            etiquetas,
                            carpeta,
                            created_at
                        )
                        VALUES (
                            :titulo,
                            :descripcion,
                            :autor,
                            :fecha,
                            :lugar,
                            :categoria,
                            :etiquetas,
                            :carpeta,
                            NOW()
                        )
                ";
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);
       
            $pdoSt->execute();

        } catch (PDOException $e) {

            include "template/partials/errordb.php";
            // Para cortar la conexión.
            exit();

        }

    }

    public function read($id)
    {
        try {

            $sql = "SELECT *

                                FROM albumes
                                WHERE id = :id 
                                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            //Forma de objeto
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            
            $pdoSt->execute();
            return $pdoSt->fetch();


        } catch (PDOException $e) {

            include "template/partials/errorDB.php";
            // Para cortar la conexión.
            exit();

        }
    }
    public function update(classAlbum $album, int $id)
    {
        try {

            $sql = "UPDATE albumes 
                        SET
                                titulo = :titulo,
                                descripcion = :descripcion,
                                autor = :autor, 
                                fecha = :fecha,
                                lugar = :lugar,
                                categoria = :categoria,
                                etiquetas = :etiquetas,
                                carpeta = :carpeta


                        WHERE id = :id
                        LIMIT 1";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);
           
            $pdoSt->execute();

        } catch (PDOException $e) {

            include "template/partials/errorDB.php";
            // Para cortar la conexión.
            exit();

        }

    }

    public function delete($id)
    {
        try {

            $sql = "DELETE
                        FROM albumes
                        WHERE id = :id
                        LIMIT 1";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $pdoSt->execute();

        } catch (PDOException $e) {

            include "template/partials/errorDB.php";
            // Para cortar la conexión.
            exit();

        }
    }
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    categoria,
                    etiquetas
                FROM
                    albumes
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdostmt->execute();

            # devuelvo objeto pdostatement
            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($busqueda)
    {

        try {

            $sql = "

                SELECT 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    categoria,
                    etiquetas
                FROM
                    albumes
                WHERE

                    CONCAT_WS(  ', ', 
                        id,
                        titulo,
                        descripcion,
                        autor,
                        fecha,
                        categoria,
                        etiquetas) 
                    like :expresion

                ORDER BY 
                    albumes.id
                
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            
            $pdoSt->bindValue(':busqueda', '%' . $busqueda . '%', PDO::PARAM_STR);
        
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            
            $pdoSt->execute();
            return $pdoSt;

        } catch (PDOException $e) {

            include "template/partials/errorDB.php";
            // Para cortar la conexión.
            exit();

        }
    }
    
    


    public function validarFecha(string $fecha)
    {
        $valores = explode('-', $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return TRUE;
        }
        return FALSE;
    }
}



?>