<?php
require_once 'class/class.movimiento.php';
require_once 'models/cuentasModel.php';

class Movimientos extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        // Inicio o continúo la sesión
        session_start();

        // Comprobar si existe el mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        // Creo la propiedad title de la vista
        $this->view->title = "Tabla de movimientos";

        // Obtengo los movimientos del modelo asignado al controlador
        $this->view->movimientos = $this->model->get();
        

        // Renderizo la vista correspondiente
        $this->view->render('movimientos/main/index');
    }

    function new($param = [])
    {
        // Iniciar sesión
        session_start();

       

        // Etiqueta title de la vista
        $this->view->title = "Añadir Movimiento";

        $cuentaModel = new cuentasModel();
        $cuentasDisponibles = $cuentaModel->get();


        $listaCuentas = [];
        foreach ($cuentasDisponibles as $cuenta) {
            $nombreCompleto = $cuenta->num_cuenta;
            $listaCuentas[$cuenta->id] = $nombreCompleto;
        }
        // Comprobar si vuelvo de un registro no validado
        if (isset($_SESSION['error'])) {
            // Mensaje de error
            $this->view->error = $_SESSION['error'];

            // Autorrellenar el formulario con los detalles del movimiento
            $this->view->movimiento = unserialize($_SESSION['movimiento']);

            // Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['movimiento']);
        }
        $this->view->cuentas = $listaCuentas;
        // Cargo la vista con el formulario para un nuevo movimiento
        $this->view->render('movimientos/new/index');
    }

    function create($param = [])
    {
        // Iniciar sesión
        session_start();

        // Saneamos los datos del formulario
        // Ajusta los nombres de los campos según corresponda
        $id_cuenta = filter_input(INPUT_POST, 'id_cuenta', FILTER_SANITIZE_NUMBER_INT);
        $fecha_hora = filter_input(INPUT_POST, 'fecha_hora', FILTER_SANITIZE_SPECIAL_CHARS);
        $concepto = filter_input(INPUT_POST, 'concepto', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
        $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_NUMBER_FLOAT);
        $saldo = filter_input(INPUT_POST, 'saldo', FILTER_SANITIZE_NUMBER_FLOAT);
        $create_at = filter_input(INPUT_POST, 'create_at', FILTER_SANITIZE_SPECIAL_CHARS);
        $update_at = filter_input(INPUT_POST, 'update_at', FILTER_SANITIZE_SPECIAL_CHARS);

        // Creo un objeto Movimiento con los datos recibidos
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

        // Validación (si es necesario)
        // Ajusta la validación según corresponda

        // Añadir el movimiento a la base de datos
        $this->model->create($movimiento);

        // Redirigir al main de movimientos
        header('Location: ' . URL . 'movimientos');
    }

    function edit($param = [])
    {
        // Obtengo el ID del movimiento que voy a editar
        $id = $param[0];

        // Asigno ID a una propiedad de la vista
        $this->view->id = $id;

        // title
        $this->view->title = "Editar Movimiento";

        // Obtener objeto de la clase movimiento
        $this->view->movimiento = $this->model->read($id);

        // Cargo la vista
        $this->view->render('movimientos/edit/index');
    }

    function update($param = [])
    {
        // Cargo ID del movimiento
        $id = $param[0];

        // Con los detalles del formulario creo objeto movimiento
        // Ajusta los nombres de los campos según corresponda
        $movimiento = new Movimiento(
            $id,
            $_POST['id_cuenta'],
            $_POST['fecha_hora'],
            $_POST['concepto'],
            $_POST['tipo'],
            $_POST['cantidad'],
            $_POST['saldo'],
            $_POST['create_at'],
            $_POST['update_at']
        );

        $this->model->update($id, $movimiento);

        // Redirigir al main de movimientos
        header('Location: ' . URL . 'movimientos');
    }

    function show($param = [])
    {
        // Obtengo el ID del movimiento que quiero mostrar
        $id = $param[0];

        // Obtengo los datos del movimiento mediante el modelo
        $movimiento = $this->model->read($id);

        // Configuro las propiedades de la vista
        $this->view->title = "Detalles del Movimiento";
        $this->view->movimiento = $movimiento;

        // Cargo la vista de detalles del movimiento
        $this->view->render('movimientos/show/index');
    }

    function delete($param = [])
    {
        // Obtengo el ID del movimiento que quiero eliminar
        $id = $param[0];

        // Llamo al método "delete" y le envío la ID del movimiento
        $this->model->delete($id);

        // Cargo de nuevo la vista de movimientos actualizada
        header('Location: ' . URL . 'movimientos');
    }

    function order($param = [])
    {
        // Obtengo el criterio de ordenación
        $criterio = $param[0];

        // Creo la propiedad "title" de la vista
        $this->view->title = "Ordenar - Panel de Control Movimientos";

        // Creo la propiedad movimientos dentro de la vista
        // Del modelo asignado al controlador ejecuto el método order()
        $this->view->movimientos = $this->model->order($criterio);

        // Cargo la vista principal de movimientos
        $this->view->render('movimientos/main/index');
    }

    function filter($param = [])
    {
        // Obtengo la expresión de filtrado
        $expresion = $_GET['expresion'];

        // Cambio la propiedad title de la vista
        $this->view->title = "Buscar - Gestión Movimientos";

        // Creo la variable movimientos dentro de la vista
        // Esta variable ejecuta el método filter() del modelo movimientosModel
        $this->view->movimientos = $this->model->filter($expresion);

        // Cargo la vista index
        $this->view->render('movimientos/main/index');
    }

    function import()
    {
        // Implementa la lógica para importar movimientos desde un archivo CSV
        // Puedes adaptar la lógica similar al método import de la clase Clientes
    }

    function export()
    {
        // Implementa la lógica para exportar movimientos a un archivo CSV
        // Puedes adaptar la lógica similar al método export de la clase Clientes
    }

    function pdf()
    {
        // Implementa la lógica para generar un PDF con la información de los movimientos
        // Puedes adaptar la lógica similar al método pdf de la clase Clientes
    }
}
