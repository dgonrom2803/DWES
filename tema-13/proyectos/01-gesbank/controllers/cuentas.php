<?php
require_once 'class/class.cuenta.php';
require_once 'models/clientesModel.php';
require_once 'class/class.pdfCuentas.php';


class Cuentas extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # Inicio o continúo la sesión
        session_start();

        # Comprobar si existe el mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Creo la propiedad title de la vista
        $this->view->title = "Tabla de cuentas";

        # Creo la propiedad cuentas dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->cuentas = $this->model->get();

        $this->view->render('cuentas/main/index');
    }

    function new($param = [])
    {

        # Iniciar o continuar sesión
        session_start();

        # etiqueta title de la vista
        $this->view->title = "Añadir - Gestión cuentas";

        $clienteModel = new clientesModel();
        $clientesDisponibles = $clienteModel->get();


        $listaClientes = [];
        foreach ($clientesDisponibles as $cliente) {
            $nombreCompleto = $cliente->cliente . ', ';
            $listaClientes[$cliente->id] = $nombreCompleto;
        }

        # Comprobar si vuelvo de un registro no validado
        if (isset($_SESSION['error'])) {
            # Mensaje de error
            $this->view->error = $_SESSION['error'];

            # Autorrellenar el formulario con los detalles de la cuenta
            $this->view->cuenta = unserialize($_SESSION['cuenta']);

            # Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cuenta']);
        }


        $this->view->clientes = $listaClientes;

        # cargo la vista con el formulario nuevo cliente
        $this->view->render('cuentas/new/index');
    }

    function create($param = [])
    {

        # Iniciar sesión
        session_start();


        # 1. Seguridad. Saneamos los datos del formulario
        $num_cuenta = filter_input(INPUT_POST, 'num_cuenta', FILTER_SANITIZE_NUMBER_INT);
        $id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
        $fecha_alta = filter_input(INPUT_POST, 'fecha_alta', FILTER_SANITIZE_SPECIAL_CHARS);
        // $fecha_ul_mov = filter_input(INPUT_POST, 'fecha_ul_mov', FILTER_SANITIZE_SPECIAL_CHARS);
        // $num_movtos = filter_input(INPUT_POST, 'num_movtos', FILTER_SANITIZE_NUMBER_INT);
        $saldo = filter_input(INPUT_POST, 'saldo', FILTER_SANITIZE_NUMBER_INT);


        # 2. Creamos la cuenta con los datos saneados
        # Cargamos los datos del formulario
        $cuenta = new Cuenta(
            null,
            $num_cuenta,
            $id_cliente,
            $fecha_alta,
            null,
            null,
            $saldo
        );

        # Validación
        $errores = [];

        $cuenta_regexp = [
            'options' => [
                'regexp' => '/^[0-9]{20}$/'
            ]
        ];

        // num_cuenta
        if (empty($num_cuenta)) {
            $errores['num_cuenta'] = 'El campo número de cuenta es obligatorio';
        } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
            $errores['num_cuenta'] = 'El número de cuenta debe tener 20 números';
        } else if (!$this->model->existeCuenta($num_cuenta)) {
            $errores['num_cuenta'] = "El número de cuenta ya existe";
        }

        //id_cliente. Campo obligatorio, valor numérico, debe existir en la tabla de clientes
        if (empty($id_cliente)) {
            $errores['id_cliente'] = 'El campo cliente es obligatorio';
        } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
            $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
        } else if (!$this->model->getClienteCuenta($id_cliente)) {
            $errores['id_cliente'] = 'El cliente seleccionado no existe';
        }

        // fecha_alta
        if (empty($fecha_alta)) {
            $errores['fecha_alta'] = 'El campo fecha alta es obligatorio';
        } else if (!$this->model->validateFechaAlta($fecha_alta)) {
            $errores['fecha_alta'] = 'La fecha no tiene un formato correcto';
        }

        // // fecha_ul_mov
        // if (empty($fecha_ul_mov)) {
        //     $errores['fecha_ul_mov'] = 'Debe introducir una fecha';
        // }

        // // num_movtos
        // if (empty($num_movtos)) {
        //     $errores['num_movtos'] = 'La cuenta debe tener al menos un movimiento';
        // }

        // saldo
        if (empty($saldo)) {
            $errores['saldo'] = 'El campo saldo es obligatorio';
        } else if (!is_numeric($saldo)) {
            $errores['saldo'] = 'El campo saldo debe ser numérico';
        }

        # 4. Comprobar validación
        if (!empty($errores)) {
            // Errores de validación
            // transforma el objeto cuenta en un string
            $_SESSION['cuenta'] = serialize($cuenta);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            # Redireccionamos a new
            header('Location:' . URL . 'cuentas/new');
            exit();
        } else {
            # Añadimos el registro a la tabla
            $this->model->create($cuenta);

            //Crearemos un mensaje, indicando que se ha realizado dicha acción
            $_SESSION['mensaje'] = "Cuenta creada correctamente.";

            // Redireccionamos a la vista principal de cuentas
            header("Location:" . URL . "cuentas");
        }
    }


    function edit($param = [])
    {

        # Iniciamos la sesión
        session_start();

        # Obtengo el valor del ID de la cuenta a editar
        $id = $param[0];

        # Creo una variable id en view y la igualo al valor del primer parámetro pasado
        $this->view->id = $id;

        $this->view->title = "Editar - Gestión Cuenta";

        # Obtener objeto de la clase cuenta
        $this->view->cuenta = $this->model->read($id);
        # Obtener los clientes
        $this->view->clientes = $this->model->getClienteCuenta();

        // Obtener el cliente asociado a la cuenta
        $clienteId = $this->view->cuenta->id_cliente;
        $this->view->cliente = $this->model->getClienteById($clienteId);

        //Comprobar si el formulario viene de una validación
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];

            # Autorrellenar el formulario con los detalles de la cuenta
            $this->view->cuenta = unserialize($_SESSION['cuenta']);

            # Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cuenta']);
        }

        # Obtener datos de los clientes disponibles desde el modelo de clientes
        $clienteModel = new clientesModel();
        $clientesDisponibles = $clienteModel->get();

        $clientesConcatenados = [];
        foreach ($clientesDisponibles as $cliente) {
            $nombreCompleto = $cliente->cliente;
            $clientesConcatenados[$cliente->id] = $nombreCompleto;
        }

        // Ordenamos el array
        asort($clientesConcatenados);

        $this->view->clientes = $clientesConcatenados;

        $this->view->render('cuentas/edit/index');
    }

    function update($param = [])
    {

        # Iniciamos la sesión
        session_start();

        # 1. Seguridad. Saneamos los datos del formulario
        $num_cuenta = filter_input(INPUT_POST, 'num_cuenta', FILTER_SANITIZE_NUMBER_INT);
        $id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
        $fecha_alta = filter_input(INPUT_POST, 'fecha_alta', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_ul_mov = filter_input(INPUT_POST, 'fecha_ul_mov', FILTER_SANITIZE_SPECIAL_CHARS);
        $num_movtos = filter_input(INPUT_POST, 'num_movtos', FILTER_SANITIZE_NUMBER_INT);
        $saldo = filter_input(INPUT_POST, 'saldo', FILTER_SANITIZE_NUMBER_INT);

        # 2. Creamos la cuenta con los datos saneados
        # Cargamos los datos del formulario
        $cuenta = new Cuenta(
            null,
            $num_cuenta,
            $id_cliente,
            $fecha_alta,
            null,
            null,
            $saldo
        );

        # Cargo id de la cuenta
        $id = $param[0];

        # Obtengo el objeto alumno original
        $cuentaOG = $this->model->read($id);

        # Con los detalles del formulario creo objeto cuenta
        $cuenta = new Cuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            null,
            null,
            $_POST['saldo']
        );



        # 3. Validacion
        $errores = [];

        $cuenta_regexp = [
            'options' => [
                'regexp' => '/^[0-9]{20}$/'
            ]
        ];

        // num_cuenta
        if (strcmp($cuenta->num_cuenta, $cuentaOG->num_cuenta) !== 0) {
            if (empty($num_cuenta)) {
                $errores['num_cuenta'] = 'El Nº de la cuenta es obligatorio';
            } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
                $errores['num_cuenta'] = 'El número de cuenta debe ser 20 números';
            }
        }

        // id_cliente
        if (strcmp($cuenta->id_cliente, $cuentaOG->id_cliente) !== 0) {
            if (empty($id_cliente)) {
                $errores['id_cliente'] = 'El campo cliente es obligatorio';
            } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                $errores['id_cliente'] = 'Debe introducir un cliente';
            } else if (!$this->model->validateCliente($id_cliente)) {
                $errores['id_cliente'] = 'El cliente seleccionado no existe';
            }
        }

        // fecha_alta
        if (strcmp($cuenta->id_cliente, $cuentaOG->id_cliente) !== 0) {
            if (empty($fecha_alta)) {
                $errores['fecha_alta'] = 'El campo fecha alta es obligatorio';
            } else if (!$this->model->validateFechaAlta($fecha_alta)) {
                $errores['fecha_alta'] = 'La fecha no tiene un formato correcto';
            }
        }


        // saldo
        if (empty($saldo)) {
            $errores['saldo'] = 'El campo saldo es obligatorio';
        } else if (!is_numeric($saldo)) {
            $errores['saldo'] = 'El campo saldo debe ser numérico';
        }

        # 4. Comprobar validación

        if (!empty($errores)) {
            // Errores de validación
            // transforma el objeto cuenta en un string
            $_SESSION['cuenta'] = serialize($cuenta);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            # Redireccionamos a new
            header('Location:' . URL . 'cuentas/edit/' . $id);

        } else {
            $this->model->update($id, $cuenta);

            $_SESSION['mensaje'] = "Cuenta editada correctamente";

            header('location:' . URL . 'cuentas');
        }
    }

    function show($param = [])
    {
        // Obtengo la id de la cuenta que quiero mostrar
        $id = $param[0];

        // Obtengo los datos de la cuenta mediante el modelo
        $cuenta = $this->model->read($id);

        // Configuro las propiedades de la vista
        $this->view->title = "Detalles de la cuenta";
        $this->view->cuenta = $cuenta;

        // Cargo la vista de detalles de la cuenta
        $this->view->render('cuentas/show/index');

    }


    function order($param = [])
    {
        session_start();
        # Obtengo el criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad "title" de la vista
        $this->view->title = "Ordenar - Panel de Control cuentas";

        # Creo la propiedad cuentas dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get()
        $this->view->cuentas = $this->model->order($criterio);

        # Cargo la vista principal de cuentas
        $this->view->render('cuentas/main/index');

    }

    function filter($param = [])
    {
        session_start();
        //Obtengo la expresión de filtrado
        $expresion = $_GET['expresion'];

        //Cambio la propiedad title de la vista
        $this->view->title = "Buscar - Gestión cuentas";

        //Creamos la variable cuentas dentro de la vista
        //Esta variable ejecuta el método get() del modelo cuentasModel
        $this->view->cuentas = $this->model->filter($expresion);

        //Cargo la vista index
        $this->view->render('cuentas/main/index');
    }

    function delete($param = [])
    {
        // Obtengo la id de la cuenta que quiero eliminar
        $id = $param[0];

        // Llamo al método "delete" y le envío la id de la cuenta
        $this->model->delete($id);

        // Cargo de nuevo la vista cuentas actualizada
        header('location:' . URL . 'cuentas');
    }


    function import()
    {
        if ($_FILES['archivo_csv']['size'] > 0) {
            // Obtén el nombre temporal del archivo subido
            $archivo_temporal = $_FILES['archivo_csv']['tmp_name'];
        
            // Lee el contenido del archivo CSV
            $datos_csv = file_get_contents($archivo_temporal);
        
            // Convierte el contenido del CSV en un array de filas
            $filas_csv = array_map('str_getcsv', explode("\n", $datos_csv));
        
            // Elimina la primera fila (cabecera)
            array_shift($filas_csv);
        
            // Procesa cada fila del CSV
            foreach ($filas_csv as $fila) {
                // Verifica si la fila está vacía o no y si tiene la cantidad esperada de datos
                if (!empty($fila) && count($fila) == 6) { // Ajusta este número según la cantidad de columnas en tu CSV
                    // Obtén los datos de cada columna
                    $num_cuenta = $fila[0];
                    $id_cliente = $fila[1];
                    $fecha_alta = $fila[2];
                    $fecha_ul_mov = $fila[3];
                    $num_movtos = $fila[4];
                    $saldo = $fila[5];
            
                    // Aquí deberías realizar cualquier validación adicional de los datos del CSV
            
                    // Crea un nuevo objeto Cliente con los datos de la fila
                    $cuenta = new Cuenta(
                        null,
                        $num_cuenta,
                        $id_cliente,
                        $fecha_alta,
                        $fecha_ul_mov,
                        $num_movtos,
                        $saldo
                    );
            
                    // Guarda el cliente en la base de datos utilizando el método create en el modelo
                    $this->model->create($cuenta);
                }
            }
        
            // Redirecciona a alguna página después de procesar el archivo
            header('Location: ' . URL . 'cuentas');
            exit(); // Asegura que el script se detenga después de redireccionar
        } else {
            // Si no se ha subido ningún archivo, establece un mensaje de error y redirecciona
            session_start();
            $_SESSION['mensaje'] = "Error: No se ha subido ningún archivo.";
            header('Location: ' . URL . 'cuentas');
            exit(); // Asegura que el script se detenga después de redireccionar
        }
    }
    function export()
{
    // Obtener todos los datos de cuentas del modelo
    $cuentas = $this->model->getExport();

    // Establecer encabezados para la descarga del archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="cuentas.csv"');

    // Abrir un puntero de archivo para escribir los datos CSV
    $fp = fopen('php://output', 'wb');

    // Escribir la fila de encabezado
    fputcsv($fp, ['NumCuenta', 'Cliente', 'Fecha Alta', 'Ult Mov', 'Num Movtos', 'Saldo']);

    // Escribir las filas de datos
    foreach ($cuentas as $cuenta) {
        fputcsv($fp, [$cuenta->num_cuenta, $cuenta->id_cliente, $cuenta->fecha_alta, $cuenta->fecha_ul_mov, $cuenta->num_movtos, $cuenta->saldo]);
    }

    // Cerrar el puntero de archivo
    fclose($fp);
}
function pdf()
{
    session_start();

    if (!isset($_SESSION['id'])) {
        $_SESSION['mensaje'] = "El usuario debe autenticarse";
        header("location:" . URL . "login");
        exit();
    } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['pdf']))) {
        $_SESSION['mensaje'] = "Operación sin privilegios";
        header('location:' . URL . 'cuentas');
        exit();
    } else {
    
    ob_start();
    //Obtenemos los clientes
    $cuentas = $this->model->get();

    $pdf = new pdfCuentas();

    //Escribimos en el PDF
    $pdf->contenido($cuentas);

    // Limpiamos y cerramos el búfer de salida
    

    // Salida del PDF
    $pdf->Output();
    
    ob_end_flush();
    }
}

function moves($param = [])
{
    session_start();

    // Comprueba la autenticación del usuario
    if (!isset($_SESSION['id'])) {
        $_SESSION['mensaje'] = "Usuario No Autentificado";
        header("location:" . URL . "login");
        exit();
    } else if (!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['moves'])) {
        $_SESSION['mensaje'] = "Operación sin privilegios";
        header('location:' . URL . 'cuentas');
        exit();
    }

    // Obtiene el ID de la cuenta
    $id = $param[0];

    // Obtiene los movimientos de la cuenta mediante el modelo
    $movimientos = $this->model->getMovimientos($id);

    // Si no hay movimientos, redirecciona a la página de cuentas
    if (empty($movimientos)) {
        $_SESSION['mensaje'] = "La cuenta no tiene movimientos";
        header('location:' . URL . 'cuentas');
        exit();
    }

    // Configura las propiedades de la vista
    $this->view->movimientos = $movimientos;

    // Renderiza la vista de los movimientos de la cuenta
    $this->view->render('cuentas/moves/index');
}



}

?>