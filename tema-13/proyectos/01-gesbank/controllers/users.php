<?php
require_once 'class/class.user.php';


class Users extends Controller
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
        $this->view->title = "Tabla de usuarios";

        // Obtengo los users del modelo asignado al controlador
        $this->view->users = $this->model->get();

        // Renderizo la vista correspondiente
        $this->view->render('users/main/index');
    }

    function new($param = [])
    {
        // Iniciar sesión
        session_start();

        // Etiqueta title de la vista
        $this->view->title = "Añadir Usuario";

        // Cargo la vista con el formulario para un nuevo usuario
        $this->view->render('users/new/index');
    }

    function create($param = [])
    {
        // Iniciar sesión
        session_start();

        // Saneamos los datos del formulario
        // Ajusta los nombres de los campos según corresponda
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_SPECIAL_CHARS);

        // Creo un objeto User con los datos recibidos
        $user = new classUser(
            null,
            $name,
            $email,
            $password,
            $password_confirm
        );

        // Añadir el usuario a la base de datos
        $this->model->create($user);

        // Redirigir al main de users
        header('Location: ' . URL . 'users');
    }

    function edit($param = [])
    {
        // Obtengo el ID del usuario que voy a editar
        $id = $param[0];

        // Asigno ID a una propiedad de la vista
        $this->view->id = $id;

        // title
        $this->view->title = "Editar Usuario";

        // Obtener objeto de la clase User
        $this->view->user = $this->model->read($id);

        // Cargo la vista
        $this->view->render('users/edit/index');
    }

    function update($param = [])
    {
        // Cargo ID del usuario
        $id = $param[0];

        // Con los detalles del formulario creo objeto User
        // Ajusta los nombres de los campos según corresponda
        $user = new classUser(
            $id,
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['password_confirm']
        );

        $this->model->update($id, $user);

        // Redirigir al main de users
        header('Location: ' . URL . 'users');
    }

    function delete($param = [])
    {
        // Obtengo el ID del usuario que quiero eliminar
        $id = $param[0];

        // Llamo al método "delete" y le envío la ID del usuario
        $this->model->delete($id);

        // Cargo de nuevo la vista de users actualizada
        header('Location: ' . URL . 'users');
    }
}
