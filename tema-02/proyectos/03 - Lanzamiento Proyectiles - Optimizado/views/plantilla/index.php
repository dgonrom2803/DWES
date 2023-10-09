<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include 'views/plantilla/head.html' ?>
    <title>Proyecto 2.2 - Cálculo de lanzamiento de proyectiles</title>
  </head>
  <body>
    <!-- Capa principal -->
    <div class="container">
      <!-- Cabecera documento -->
      <header class="pb-3 mb-4 border-bottom">
        <i class="bi bi-rocket-takeoff-fill"></i>
        <span class="fs-4">Proyecto 2.2 - Calculo de lanzamiento de proyectiles</span>
      </header>

      <legend>Lanzamiento de Proyectiles</legend>
      <form method="POST">
        <!-- velocidad inicial -->
        <div class="mb-3">
          <label class="form-label">Velocidad Inicial</label>
          <input
            type="number"
            name="velInicial"
            class="form-control"
            placeholder="0"
            aria-describedby="helpId"
            step="0.01"
            value="">
            <!-- <small id="helpId" class="text-muted">Introduzca valor numérico</small> -->
          
        </div>

        <!-- angulo lanzamiento -->
        <div class="mb-3">
          <label class="form-label">Angulo de Lanzamiento</label>
          <input
            type="number"
            name="anguloLanzamiento"
            class="form-control"
            placeholder="0"
            aria-describedby="helpId"
            step="0.01"
            value="">
            <!-- <small id="helpId" class="text-muted">Introduzca valor numérico</small> -->

        </div>
        <!-- botones de accion -->
        <div class="btn-group" role="group">

            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-warning" formaction="calcular.php">Calcular</button>
                        
            
            

        </div>
      </form>

      <!-- Pie del documento  -->
      <?php include 'views/plantilla/footer.html'?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/plantilla/javascript.html'?>
  </body>
</html>