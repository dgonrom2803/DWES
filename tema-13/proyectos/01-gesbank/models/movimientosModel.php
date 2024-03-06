<?php

/*
    movimientosModel.php

    Modelo del controlador movimientos

    Definir los métodos de acceso a la base de datos
    
    - insert
    - update
    - select
    - delete
    - etc..
*/

class movimientosModel extends Model
{

    /*
        Extrae los detalles  de los movimientos
    */
    public function get()
    {

        try {

            # comando sql
            $sql = "SELECT 
                        movimientos.id,
                        movimientos.id_cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo,
                        movimientos.create_at,
                        movimientos.update_at
                    FROM
                        movimientos
                    ORDER BY 
                        id
                    ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    function getExport()
    {

        try {

            # comando sql
            $sql = "SELECT 
                        movimientos.id,
                        movimientos.id_cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo,
                        movimientos.create_at,
                        movimientos.update_at
                    FROM
                        movimientos
                    ORDER BY 
                        id";

            # conectamos con la base de datos
            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }
    public function create(Movimiento $movimiento)
    {

        try {
            $sql = "INSERT INTO Movimientos (
                        id_cuenta,
                        fecha_hora,
                        concepto,
                        tipo,
                        cantidad,
                        saldo,
                        create_at,
                        update_at
                    )
                    VALUES (
                        :id_cuenta,
                        :fecha_hora,
                        :concepto,
                        :tipo,
                        :cantidad,
                        :saldo,
                        :create_at,
                        :update_at
                    )
                ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id_cuenta', $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(':fecha_hora', $movimiento->fecha_hora, PDO::PARAM_STR);
            $pdoSt->bindParam(':concepto', $movimiento->concepto, PDO::PARAM_STR);
            $pdoSt->bindParam(':tipo', $movimiento->tipo, PDO::PARAM_STR);
            $pdoSt->bindParam(':cantidad', $movimiento->cantidad, PDO::PARAM_STR);
            $pdoSt->bindParam(':saldo', $movimiento->saldo, PDO::PARAM_STR);
            $pdoSt->bindParam(':create_at', $movimiento->create_at, PDO::PARAM_STR);
            $pdoSt->bindParam(':update_at', $movimiento->update_at, PDO::PARAM_STR);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read($id)
    {

        try {
            $sql = "SELECT 
                        id,
                        id_cuenta,
                        fecha_hora,
                        concepto,
                        tipo,
                        cantidad,
                        saldo,
                        create_at,
                        update_at
                    FROM 
                        movimientos
                    WHERE
                        id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(int $id, Movimiento $movimiento)
    {
        try {
            $sql = "UPDATE movimientos
                    SET
                        id_cuenta = :id_cuenta,
                        fecha_hora = :fecha_hora,
                        concepto = :concepto,
                        tipo = :tipo,
                        cantidad = :cantidad,
                        saldo = :saldo,
                        create_at = :create_at,
                        update_at = :update_at
                    WHERE
                        id = :id
                    LIMIT 1
                ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->bindParam(':id_cuenta', $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(':fecha_hora', $movimiento->fecha_hora, PDO::PARAM_STR);
            $pdoSt->bindParam(':concepto', $movimiento->concepto, PDO::PARAM_STR);
            $pdoSt->bindParam(':tipo', $movimiento->tipo, PDO::PARAM_STR);
            $pdoSt->bindParam(':cantidad', $movimiento->cantidad, PDO::PARAM_STR);
            $pdoSt->bindParam(':saldo', $movimiento->saldo, PDO::PARAM_STR);
            $pdoSt->bindParam(':create_at', $movimiento->create_at, PDO::PARAM_STR);
            $pdoSt->bindParam(':update_at', $movimiento->update_at, PDO::PARAM_STR);

            $pdoSt->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function order(int $criterio)
    {
        try {

            # comando sql
            $sql = "SELECT 
                        movimientos.id,
                        movimientos.id_cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo,
                        movimientos.create_at,
                        movimientos.update_at
                    FROM
                        movimientos
                    ORDER BY 
                        :criterio";

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "SELECT 
                        movimientos.id,
                        movimientos.id_cuenta,
                        movimientos.fecha_hora,
                        movimientos.concepto,
                        movimientos.tipo,
                        movimientos.cantidad,
                        movimientos.saldo,
                        movimientos.create_at,
                        movimientos.update_at
                    FROM
                        movimientos
                    WHERE
                        CONCAT_WS(', ', 
                                    movimientos.id,
                                    movimientos.id_cuenta,
                                    movimientos.fecha_hora,
                                    movimientos.concepto,
                                    movimientos.tipo,
                                    movimientos.cantidad,
                                    movimientos.saldo,
                                    movimientos.create_at,
                                    movimientos.update_at) 
                        LIKE :expresion
                    ORDER BY 
                        movimientos.id
                    ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();

            return $pdost;
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }


    public function delete($id)
    {
        try {
            $sql = "DELETE FROM movimientos
                    WHERE id = :id";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function import()
{
    if ($_FILES['csv_file']['size'] > 0) {
        $archivo = $_FILES['csv_file']['tmp_name'];
        $datosCSV = file_get_contents($archivo);
        $filas = array_map('str_getcsv', explode("\n", $datosCSV));
        array_shift($filas);

        foreach ($filas as $fila) {
            $id_cuenta = $fila[0];
            $fecha_hora = $fila[1];
            $concepto = $fila[2];
            $tipo = $fila[3];
            $cantidad = $fila[4];
            $saldo = $fila[5];
            $create_at = $fila[6];
            $update_at = $fila[7];

            $movimiento = new Movimiento(
                null,
                $id_cuenta,
                $fecha_hora,
                $concepto,
                $tipo,
                $cantidad,
                $saldo,
                $create_at,
                $update_at
            );

            $this->create($movimiento);
        }

        header('location:' . URL . 'movimientos');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error: No se ha subido ningún archivo.";
        header('location:' . URL . 'movimientos');
    }
}


}

?>
