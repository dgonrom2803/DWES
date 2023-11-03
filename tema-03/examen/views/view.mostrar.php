<!doctype html>
<html lang="es">

<head>
    <!-- Incluimos HEAD -->
    <?php include("partials/partial.head.php") ?>
    <title>Mostrar Película - CRUD Tabla Películas</title>
</head>

<body>
    <div class="container">

        <!-- Incluimos Cabecera -->
        <?php include("partials/partial.cabecera.php") ?>

        <legend>
            Mostrar Película
        </legend>

        <form action="mostrar.php?indice=<?= $indice ?>" method="POST">

            <div class="mb3">
                <label class="form-label">Id</label>
                <input name="id" type="text" class="form-control" value="<?= $pelicula['id'] ?>" readonly>
            </div>

            <!-- Campo título -->
            <div class="mb3">
                <label class="form-label">Título</label>
                <input name="titulo" type="text" class="form-control" value="<?= $pelicula['titulo'] ?>" readonly>
            </div>

            <!-- Campo director -->
            <div class="mb3">
                <label class="form-label">Director</label>
                <input name="director" type="text" class="form-control" value="<?= $pelicula['director'] ?>" readonly>
            </div>

            <!-- Campo nacionalidad -->
            <div class="mb3">
                <label class="form-label">Nacionalidad</label>
                <input name="nacionalidad" type="text" class="form-control" value="<?= $pelicula['nacionalidad'] ?>" readonly>
            </div>

            <!-- Campo Año -->
            <div class="mb3">
                <label class="form-label">Año</label>
                <input name="año" type="number" class="form-control" value="<?= $pelicula['año'] ?>" readonly>
            </div>

            <!-- Campo para mostrar los generos  -->

            <div class="mb3">
                <label class="form-label">Generos</label>
                <input name="generos" type="number" class="form-control" value="<?= $pelicula['generos'] ?>">
                <?php foreach ($pelicula as $key => $campo): ?>
                        <?php if ($key == 'generos'): ?>
                            <?= implode(', ', mostrarGeneros($generos, $campo)) ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
            </div>

            <br>
            <div class="mb3" role="group">
                <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

            </div>
        </form>
        <!-- Incluimos Partials footer -->
        <?php include("partials/partial.footer.php") ?>
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <?php include("partials/partial.javascript.php") ?>
</body>

</html>