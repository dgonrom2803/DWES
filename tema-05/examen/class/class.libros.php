<?php

/*
    Clase libros 

    Aquí se definirán los métodos necesarios para completar el examen
    
*/

class Libros extends Conexion
{


    /*

    getLibros()

    Devuelve un objeto conjunto resultados (PDO_result) 
    con los detalles de  todos los Libros

    

*/
    public function getLibros()
    {

        $sql = "SELECT 
        libros.id,
        libros.titulo, 
        autores.nombre AS autor,
        editoriales.nombre AS editorial,
        libros.stock,
        libros.precio_coste AS coste,
        libros.precio_venta AS pvp
        

    FROM
        geslibros.libros
            INNER JOIN
        geslibros.autores ON autores.id = libros.autor_id
            INNER JOIN
        geslibros.editoriales ON editoriales.id = libros.editorial_id
    ORDER BY id";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }


    public function getAutores()
    {
        $sql = "SELECT
                    id, nombre autor
                    from
                    autores
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

    public function getEditoriales()
    {
        $sql = "SELECT
                    id, nombre editorial
                    from
                    editoriales
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

    public function insertLibro(Libro $libro)
    {

        try {
            $sql = "INSERT INTO geslibros.libros (
                titulo,
                isbn,
                fecha_edicion,
                autor_id,
                editorial_id,
                stock,
                precio_coste,
                precio_venta
                
            ) VALUES(
                :titulo,
                :isbn,
                :fecha_edicion,
                :autor_id,
                :editorial_id,
                :stock,
                :precio_coste,
                :precio_venta
                )";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':titulo', $libro->titulo, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':isbn', $libro->isbn, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fecha_edicion', $libro->fecha_edicion);
            $pdostmt->bindParam(':autor_id', $libro->autor_id);
            $pdostmt->bindParam(':editorial_id', $libro->editorial_id);
            $pdostmt->bindParam(':stock', $libro->stock, PDO::PARAM_INT);
            $pdostmt->bindParam(':precio_coste', $libro->precio_coste, PDO::PARAM_INT);
            $pdostmt->bindParam(':precio_venta', $libro->precio_venta, PDO::PARAM_INT);


            # Ejecuto mysqli_stmt e inserto registro
            $pdostmt->execute();

            # Libero memoria
            $pdostmt = null;

            #Cerrar conexion
            $this->pdo = null;


        } catch (PDOException $e) {

            include('views/partials/partial.errorDB.php');
            exit();

        }
    }



    public function order($criterio)
    {
        // Vamos a cambiar en vez de criterio a que sea por número del nombre
        // ejemplo nombre es la fila 2 se le pone 2.

        try {
            $sql = "SELECT 
        libros.id,
        libros.titulo, 
        autores.nombre AS autor,
        editoriales.nombre AS editorial,
        libros.stock,
        libros.precio_coste AS coste,
        libros.precio_venta AS pvp
        

    FROM
        geslibros.libros
            INNER JOIN
        geslibros.autores ON autores.id = libros.autor_id
            INNER JOIN
        geslibros.editoriales ON editoriales.id = libros.editorial_id
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


}


?>