!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proyecto 2.2 - Cálculo de Lanzamiento de Proyectiles</title>

    <!-- css bootstrap 532 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- iconos bootsrap 1.11.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
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
                            <td><?=$velInicial?> m/s</td>
                        </tr>
                        <tr>
                            <td>Angulo de Lanzamiento</td>
                            <td><?=$anguloGrados?> º</td>
                        </tr>
                        <tr>
                            <th>Resultados:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Angulo en radianes</td>
                            <td><?=$anguloRadianes?> radianes</td>
                        </tr>
                        <tr>
                            <td>Velocidad Inicial X</td>
                            <td><?=$V0x?> m/s</td>
                        </tr>
                        <tr>
                            <td>Velocidad Inicial Y</td>
                            <td><?=$V0y?> m/s</td>
                        </tr>
                        <tr>
                            <td>Tiempo de vuelo</td>
                            <td><?=$tiempo?> s</td>
                        </tr>
                        <tr>
                            <td>Alcance máximo</td>
                            <td><?=$xMax?> m</td>
                        </tr>
                        <tr>
                            <td>Altura máxima</td>
                            <td><?=$yMax?> m</td>
                        </tr>
                    </tbody>
                </table>
                <!-- botones de accion -->
                <div class="btn-group" role="group">

                    <a class="btn btn-primary" href="index.php" role="button">Volver</a>


                </div>
        </form>

        <!-- Pie del documento  -->
        <footer class="footer mt-auto py-3 fixed-bottom bg-light">
            <div class="container">
                <span class="text-muted">Diego González Romero - DWES - 2DAW - Curso 23/24</span>
            </div>
        </footer>
    </div>

    <!-- javascript bootstrap 532 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>