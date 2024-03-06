<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Principal -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'views/movimientos/partials/header.php' ?>

        <legend>Formulario Editar Movimiento</legend>

        <!-- Formulario Editar Movimiento -->
        <form action="<?= URL ?>movimientos/update/<?= $this->id ?>" method="POST">

            <!-- id oculto -->
            <input type="number" class="form-control" name="id" value="<?= $this->movimiento->id ?>" hidden>

            <!-- ID Cuenta -->
            <div class="mb-3">
                <label for="id_cuenta" class="form-label">ID Cuenta</label>
                <input type="number" class="form-control" name="id_cuenta" value="<?= $this->movimiento->id_cuenta ?>">
            </div>
            <!-- Fecha y Hora -->
            <div class="mb-3">
                <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                <input type="datetime-local" class="form-control" name="fecha_hora" value="<?= date('Y-m-d\TH:i', strtotime($this->movimiento->fecha_hora)) ?>">
            </div>

            <!-- Concepto -->
            <div class="mb-3">
                <label for="concepto" class="form-label">Concepto</label>
                <input type="text" class="form-control" name="concepto" value="<?= $this->movimiento->concepto ?>">
            </div>

            <!-- Tipo -->
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" name="tipo">
                    <option value="Ingreso" <?= $this->movimiento->tipo == 'Ingreso' ? 'selected' : '' ?>>Ingreso</option>
                    <option value="Gasto" <?= $this->movimiento->tipo == 'Gasto' ? 'selected' : '' ?>>Gasto</option>
                </select>
            </div>

            <!-- Cantidad -->
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" value="<?= $this->movimiento->cantidad ?>">
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?= $this->movimiento->saldo ?>">
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Restaurar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>

        <br>
        <br>
        <br>

        <!-- Pié del documento -->
        <?php include 'template/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'template/partials/javascript.php' ?>
</body>

</html>
