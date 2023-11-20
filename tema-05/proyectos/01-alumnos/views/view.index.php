<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 5.1 - Gestión de alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera documento -->
        <?php include 'views/partials/header.php'; ?>

        <legend>Tabla Alumnos</legend>

        <!-- Menú Principal -->
        <?php include 'views/partials/menu_prin.php' ?>
        

        <!-- Notificación -->
        <?php include 'views/partials/notificacion.php' ?>

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Alumno</th>
                    <th></th>
                    <th>DNI</th>
                    <th>Poblacion</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Curso</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos->getTabla() as $indice => $alumno): ?>
                    <tr>
                        <td><?= $alumno->getId() ?></td>
                        <td><?= $alumno->getDescripcion() ?></td>
                        <td><?= $alumno->getModelo() ?></td>
                        <td><?= $marcas[$alumno->getMarca()] ?></td>
                        <td><?= implode(', ', ArrayArticulos::mostrarCategorias($categorias, $alumno->getCategorias()))?></td>
                        <td class="text-end"><?= $alumno->getUnidades() ?></td>
                        <td class="text-end"><?= number_format($alumno->getPrecio(), 2, ',', '.') ?></td>

                        <!-- boton eliminar  -->
                        <td>
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                                <i class="bi bi-trash3"></i></a>

                            <!-- boton editar  -->

                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                                <i class="bi bi-clipboard2-plus"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><b>Nº de Articulos=
                            <?= count($alumnos->getTabla()) ?>
                        </b></td>
                </tr>
            </tfoot>

        </table>


        <!-- Pie del documento  -->
        

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>