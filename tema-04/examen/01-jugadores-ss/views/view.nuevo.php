<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("layouts/layout.head.php"); ?>
    <title>Nuevo - Gestión Jugadores </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Formulario Nuevo Jugador</legend>

        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
                
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <!-- número -->
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero">
            </div>
            
            <!-- Pais -->
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <select class="form-select" name="pais">
                    <option selected disabled>Seleccione una pais</option>
                    <?php foreach ($paises as $key => $pais): ?>
                        <option value="<?= $key ?>">
                            <?= $pais ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- equipo -->
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <select class="form-select" name="equipo">
                    <option selected disabled>Seleccione un equipo</option>
                    <?php foreach ($equipos as $key => $equipo): ?>
                        <option value="<?= $key ?>">
                            <?= $equipo ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Posiciones List Checkbox -->
            <div class="mb-3">
                <label for="posiciones" class="form-label">Seleccione Posiciones</label>
                <div class="form-control">
                    <?php foreach ($posiciones as $indice => $posicion): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="posiciones[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?= $posicion ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <!-- contrato -->
            <div class="mb-3">
                <label for="contrato" class="form-label">Contrato</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €">
            </div>

                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br><br><br> <br>

        <!-- Pie del documento -->
        <?php include("partials/partial.footer.php"); ?>

        <!-- Bootstrap Javascript y popper -->
        <?php include("layouts/layout.javascript.php"); ?>

</body>

</html>