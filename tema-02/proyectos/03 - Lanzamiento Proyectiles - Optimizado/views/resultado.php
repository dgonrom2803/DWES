<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/plantilla/head.html' ?>
    <title>Proyecto 2.2 - Cálculo de Lanzamiento de Proyectiles</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 2.2 - Cálculo de Lanzamiento de Proyectiles</span>
        </header>

        <legend>Resultado</legend>
        <form>
            <!-- valor 1 -->
            <!-- <div class="mb-3">
                <label class="form-label">Velocidad Inicial</label>
                <input type="number" name="valor1" class="form-control" value="<?= $valor1 ?>" readonly>


            </div>

             valor 2 
            <div class="mb-3">
                <label class="form-label">Angulo de Lanzamiento</label>
                <input type="number" name="valor2" class="form-control" value="<?= $valor2 ?>" readonly> -->


            <!-- resultado -->
            <table class="table">
                <tbody>
                    <tr>
                        <th>Valores Iniciales:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial:</td>
                        <td>
                            <?= $velInicial ?> m/s
                        </td>
                    </tr>
                    <tr>
                        <td>Angulo de Lanzamiento</td>
                        <td>
                            <?= $anguloGrados ?> º
                        </td>
                    </tr>
                    <tr>
                        <th>Resultados:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Angulo en radianes</td>
                        <td>
                            <?= $anguloRadianes ?> radianes
                        </td>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial X</td>
                        <td>
                            <?= $V0x ?> m/s
                        </td>
                    </tr>
                    <tr>
                        <td>Velocidad Inicial Y</td>
                        <td>
                            <?= $V0y ?> m/s
                        </td>
                    </tr>
                    <tr>
                        <td>Tiempo de vuelo</td>
                        <td>
                            <?= $tiempo ?> s
                        </td>
                    </tr>
                    <tr>
                        <td>Alcance máximo</td>
                        <td>
                            <?= $xMax ?> m
                        </td>
                    </tr>
                    <tr>
                        <td>Altura máxima</td>
                        <td>
                            <?= $yMax ?> m
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- botones de accion -->
            <div class="btn-group" role="group">

                <a class="btn btn-primary" href="index.php" role="button">Volver</a>


            </div>
        </form>

        <!-- Pie del documento  -->
        <?php include 'views/plantilla/footer.html'?>
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/plantilla/javascript.html'?>
</body>

</html>