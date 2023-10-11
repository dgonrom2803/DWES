<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html' ?>
    <title>Actividad 3.1 Formulario Registro</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Actividad 3.1 Formulario Registro</span>
        </header>

        <!-- menu  -->
        <ul class="nav">
            <?php if ($perfil == 'admin' or $perfil == 'editor'): ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Eliminar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Actualizazr</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Consultar</a>
            </li>
        </ul>

        <legend>Formulario Registro</legend>
        <form method="POST" action="acceso.php">
            <table class="table">
                <tbody>
                    <tr>
                        <td>DECIMAL</td>
                        <td>
                            <?= $valDecimal ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?= $operacionNombre ?>
                        </td>
                        <td>
                            <?= $operacion ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- botones de accion  -->
            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-primary">Registro</button>

            <br>
            <br>
            <br>



        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>