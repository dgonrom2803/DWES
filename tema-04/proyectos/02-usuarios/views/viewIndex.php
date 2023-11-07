<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 3.2 - Gestión de articulos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera documento -->
        <?php include 'views/partials/header.php'; ?>

        <legend>Tabla Articulos</legend>

        <!-- Menú Principal -->
        <?php include 'views/partials/menu_prin.php' ?>

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Categorias</th>
                    <th class="text-end">Stock</th>
                    <th class="text-end">Precio</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <td><?= $articulo['id'] ?></td>
                        <td><?= $articulo['descripcion'] ?></td>
                        <td><?= $articulo['modelo'] ?></td>
                        <td><?= $marcas[$articulo['marca']] ?></td>
                        <td><?= implode(', ', mostrarCategorias($categorias, $articulo['categorias']))?></td>
                        <td class="text-end"><?= $articulo['unidades'] ?></td>
                        <td class="text-end"><?= number_format($articulo['precio'], 2, ',', '.') ?></td>

                        <!-- boton eliminar  -->
                        <td>
                            <a href="eliminar.php?id=<?= $articulo['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash3"></i></a>

                            <!-- boton editar  -->

                            <a href="editar.php?id=<?= $articulo['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <a href="mostrar.php?id=<?= $articulo['id'] ?>" title="Mostrar">
                                <i class="bi bi-clipboard2-plus"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Nº Articulos
                        <?= count($articulos) ?>
                    </td>
                </tr>
            </tfoot>

        </table>


        <!-- Pie del documento  -->
        

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>