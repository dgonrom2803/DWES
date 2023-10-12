<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Formulario Conversor</title>

    <!-- Añadimos el php include para el css bootstrap -->
    <?php
    include "layouts/head.html";
    ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6"></span>
        </header>
        <menu>

            <?php if ($perfil == "admin"): ?>

                <!-- adminstradores -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>

            <?php elseif ($perfil == "editor"): ?>

                <!-- editores -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>

            <?php else: ?>

                <!-- usuarios -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Consultar</a>
                    </li>
                </ul>

            <?php endif; ?>

        </menu>

        <!-- Tabla datos respuesta. -->
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Campo</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Usuario</td>
                        <td>
                            <?= $usuario; ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">email</td>
                        <td>
                            <?= $email; ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">password</td>
                        <td>
                            <?= $password; ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">perfil</td>
                        <td>
                            <?= $perfil; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>

        <!-- Botón volver -->
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">VOLVER</a>
        </div>
        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>