<?php
require_once 'class/class.user.php';


class Users extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render($param = [])
    {

        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['main']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        } else {

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            $this->view->title = "Tabla Usuarios";

            $this->view->users = $this->model->get();
            $this->view->render("users/main/index");
        }
    }

    function new()
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $roles = $this->model->getRoles();

        $this->view->roles = $roles;

        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];

            $this->view->user = unserialize($_SESSION['user']);

            unset($_SESSION['error']);
            unset($_SESSION['user']);
        }

        $this->view->title = "Añadir - Gestión Usuarios";

        $this->view->render('users/new/index');
    }


    public function validate()
    {

        session_start();

        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_SPECIAL_CHARS);
        $rol = filter_var($_POST['rol'], FILTER_SANITIZE_SPECIAL_CHARS);

        $this->model->crear($name, $email, $password, $rol);

        $_SESSION['mensaje'] = "Usuario registrado correctamente";

        header("location:" . URL . "users");
        exit();

    }


    function create($param = [])
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $rol = filter_var($_POST['rol'] ??= '', FILTER_SANITIZE_NUMBER_INT);

        $user = new classUser(
            null,
            $nombre,
            $email,
            $password,
            $rol
        );

        $this->model->crear($user);

        $_SESSION['mensaje'] = 'Usuario creado correctamente';

        header('location:' . URL . 'users');
    }


    function edit($param = [])
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $id = $param[0];

        $this->view->id = $id;

        $this->view->title = "Edit - Panel de control users";

        $this->view->user = $this->model->read($id);

        $this->view->roles = $this->model->getRoles();

        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];

            $this->view->user = unserialize($_SESSION['user']);

            unset($_SESSION['error']);
            unset($_SESSION['user']);
        }

        $this->view->render('users/edit/index');

    }


    function update($param = [])
{
    session_start();

    if (!isset($_SESSION['id'])) {
        $_SESSION['mensaje'] = "Usuario no autentificado";
        header("location:" . URL . "login");
    } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['edit']))) {
        $_SESSION['mensaje'] = "Operación sin privilegios";
        header('location:' . URL . 'users');
    }

    $id = $param[0];

    $nombre = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $rol = isset($_POST['rol']) ? filter_var($_POST['rol'], FILTER_SANITIZE_NUMBER_INT) : '';

    $user = new classUser(
        null,
        $nombre,
        $email,
        null, // No se está editando la contraseña, por lo que se pasa como null
        $rol
    );

    // Agregar el parámetro $rol al llamar al método update
    $this->model->update($id, $user, $rol);

    $_SESSION['mensaje'] = 'Usuario actualizado correctamente';

    header("Location:" . URL . "users");
}


    function show($param = [])
    {

        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['show']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $id = $param[0];

        $user = $this->model->read($id);

        $this->view->title = "Detalles del Usuario";
        $this->view->user = $user;

        $this->view->render('users/show/index');

    }


    function order($param = [])
    {

        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $criterio = $param[0];

        $this->view->title = "Ordenar - Panel de Control users";

        $this->view->users = $this->model->order($criterio);

        $this->view->render('users/main/index');

    }

    function filter($param = [])
    {

        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario no autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');
        }

        $expresion = $_GET['expresion'];

        $this->view->title = "Buscar - Gestión users";

        $this->view->users = $this->model->filter($expresion);

        $this->view->render('users/main/index');
    }

    function delete($param = [])
    {
        session_start();

        if (!isset($_SESSION['id'])) {

            $_SESSION['mensaje'] = "Usuario No Autentificado";
            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['user']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'users');

        } else {

            $iduser = $param[0];

            $this->model->delete($iduser);

            $_SESSION['notify'] = 'Usuario eliminado.';

            header("Location:" . URL . "users");
        }
    }


}

?>