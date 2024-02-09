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


public function subirArchivo($archivos, $carpeta){

		$num = count($archivos['tmp_name']);

		//Comprobamos antes si ha ocurrido algún errorde archivo
		$phpFileUploadErrors = array(
			0 => 'There is no error, the file uploaded with success',
			1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
			2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			3 => 'The uploaded file was only partially uploaded',
			4 => 'No file was uploaded',
			6 => 'Missing a temporary folder',
			7 => 'Failed to write file to disk.',
			8 => 'A PHP extension stopped the file upload.',
		);
		
		$error = null;

		for($i = 0; $i <= $num -1 && is_null($error); $i++){
			if($archivos['error'][$i] != UPLOAD_ERR_OK){
				$error = $phpFileUploadErrors[$archivos['error'][$i]];
			}else{
                                //Validar tamaño máximo 4mb
                                $max_file = 4194304;
                                if($archivos['size'][$i] > $max_file){

                                        //Errores de tipo error
                                        $error = "Archivo excede tamaño maximo 4MB";

                                }
                                $info = new SplFileInfo($archivos['name'][$i]);
                                $tipos_permitidos = ['JPEG' , 'JPG', 'GIF', 'PNG'];
                                if(!in_array(strtoupper($info->getExtension()), $tipos_permitidos)){
                                        $error = "Tipo archivo no permitido. Sólo JPG, JPEG, GIF o PNG";
                                }
                        }
		}

		//Sólo se procederá a la subida de archivos en caso de no ocurrir ningun error
		if(is_null($error)){
			for($i = 0; $i <= $num -1; $i++){
				if(is_uploaded_file($archivos['tmp_name'][$i])){
					move_uploaded_file($archivos['tmp_name'][$i],"images/".$carpeta."/".$archivos['name'][$i]);
				}
			}
			$_SESSION['mensaje'] = "Archivo/s subido/s con éxito";
		}else{
			$_SESSION['error'] = $error;
		}

        
                
	}

}

?>