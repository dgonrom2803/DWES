<!DOCTYPE html>
<html lang="es">

<head>
  <?php include 'views/layouts/head.html' ?>
  <title>Proyecto 3.2 - Gestión de libros</title>
</head>

<body>
  <!-- Capa principal -->
  <div class="container">
    <!-- Cabecera documento -->
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-rocket-takeoff-fill"></i>
      <span class="fs-4">Proyecto 3.2 - Gestión de libros</span>
    </header>

    <legend>Tabla Libros</legend>
    <table class="table">
      <!-- Encabezado tabla -->
      <thead>
        <tr>
          <!-- Extraido del array -->
          <!-- <?php foreach (array_keys($libros[0]) as $clave): ?>
            <th>
              <?= $clave ?>
            </th>
          <?php endforeach; ?> -->

          <!-- personalizado -->
          <th>Id</th>
          <th>Título</th>
          <th>Autor</th>
          <th>Género</th>
          <th>Precio</th>


        </tr>
      </thead>
      <tbody>
        <?php foreach ($libros as $libro): ?>
          <tr>
            <?php foreach ($libro as $campo): ?>
              <td>
                <?= $campo ?>
              </td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>

        <!-- <td><?= $libro['id'] ?></td> -->
        <!-- ... -->

      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">Nº Libros <?= count($libros)?></td>
        </tr>
      </tfoot>

    </table>


    <!-- Pie del documento  -->
    <?php include 'views/layouts/footer.html' ?>

  </div>

  <!-- javascript bootstrap 532 -->
  <?php include 'views/layouts/javascript.html' ?>
</body>

</html>