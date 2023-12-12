<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Formulario Editar Alumno</legend>

        <!-- Formulario para editar alumno -->
        <form>
            <!-- id oculto -->
            <label for="titulo" class="form-label">Id</label>
            <input type="hydeen" class="form-control" name="id" value="<?= $corredor->id ?>" disabled>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $corredor->nombre ?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $corredor->apellidos ?>" disabled >
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $corredor->ciudad ?>" disabled>
            </div>

            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?= $corredor->fechaNacimiento ?>" disabled>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <?php if($corredor->sexo === 'H') :?>
                    <input type="text" class="form-control" value="Hombre" disabled>
                <?php elseif ($corredor->sexo ==='M'): ?>
                    <input type="text" class="form-control" value="Mujer" disabled>
                <?php else :?>
                    <input type="text" class="form-control" value="Sin especificar" disabled>
                <?php endif;?>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $corredor->email ?>" disabled>
            </div>

            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni" value="<?= $corredor->dni ?>" disabled>
            </div>

            <!-- Categoria Select -->
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <?php foreach ($categorias as $categoria): ?>
                    <?php if ($categoria->id === $corredor->id_categoria): ?>
                        <input type="text" class="form-control" name="categoria" value="<?= $categoria->categoria; ?>" disabled>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Club Select -->
            <div class="mb-3">
                <label class="form-label">Club</label>
                <?php foreach ($clubs as $club): ?>
                    <?php if ($club->id === $corredor->id_club): ?>
                        <input type="text" class="form-control" name="club" value="<?= $club->club; ?>" disabled>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            

        </form>

        <br>
        <br>
        <br>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>