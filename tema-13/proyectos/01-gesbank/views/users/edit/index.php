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
        <?php include 'views/users/partials/header.php' ?>

        <legend>Editar Usuario</legend>

        <!-- Formulario Editar Usuario -->
        <form action="<?= URL ?>users/update/<?= $this->user->id ?>" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control <?= isset($this->errores['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= isset($this->user->name) ? $this->user->name : '' ?>" required>
                <?php if (isset($this->errores['name'])): ?>
                    <div class="invalid-feedback"><?= $this->errores['name'] ?></div>
                <?php endif; ?>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= isset($this->errores['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= isset($this->user->email) ? $this->user->email : '' ?>" required>
                <?php if (isset($this->errores['email'])): ?>
                    <div class="invalid-feedback"><?= $this->errores['email'] ?></div>
                <?php endif; ?>
            </div>
            

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" name="rol">
                    <?php foreach ($this->roles as $rol): ?>
                        <option value="<?= $rol->id ?>" <?= isset($this->user->rol) && $this->user->rol == $rol->id ? 'selected' : '' ?>>
                            <?= $rol->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>users" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>

        <br>
        <br>
        <br>

        <!-- Pié del documento -->
        <?php include 'template/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap -->
    <?php include 'template/partials/javascript.php' ?>
</body>

</html>
