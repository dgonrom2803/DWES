<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("layouts/layout.head.php"); ?>
    <title>Jugadores - Mostrar </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Mostrar Jugador</legend>

        <form>
            <!-- id -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $jugador->getId() ?>" disabled>

            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $jugador->getNombre() ?>" disabled>
            </div>
            <!-- Numero -->
            <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" name="numero" value="<?= $jugador->getNumero() ?>" disabled>

            </div>

            <!-- Pais -->
            <div class="mb-3">
                <label for="pais" class="form-label">Pais</label>
                <input type="text" class="form-control" name="pais" 
                value="<?= $paises[$jugador->getPais()] ?>" disabled>

            </div>
            <!-- Equipo -->
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <input type="text" class="form-control" name="equipo" value="<?= $equipos[$jugador->getEquipo()]?>" disabled>

            </div>

            <!-- Posiciones -->
            <div class="mb-3">
                <label for="posicion" class="form-label">Posiciones</label>
                <input type="text" class="form-control" name="posicion"
                    value="<?= implode(", ", $jugadores->listaPosiciones($jugador->getPosiciones(), $posiciones)) ?>" disabled>

            </div>
            <!-- Contrato -->
            <div class="mb-3">
                <label for="contrato" class="form-label">Contrato (€)</label>
                <input type="number" class="form-control" name="contrato" step="0.01" value="<?= $jugador->getContrato() ?>"
                    disabled>
                <!-- <div class="form-text">Introduzca Contrato</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>

        <br><br><br>

        <!-- Pie del documento -->
        <?php include("partials/partial.footer.php"); ?>

        <!-- Bootstrap Javascript y popper -->
        <?php include("partials/partial.javascript.php"); ?>

</body>

</html>