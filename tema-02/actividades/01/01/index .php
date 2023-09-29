<!DOCTYPE html>
<html>

<head>
    <title>Mi Página</title>
</head>

<body>
    <?php
    $titulo = "Actividad 1 - Tema 2";
    $parrafo = "Este es un párrafo de prueba para el ejercicio 1.<BR> Segunda línea del párrafo de prueba. <BR> Tercera línea del párrafo de prueba.";
    ?>

    <h1>
        <?php echo $titulo; ?>
    </h1>
    <p>
        <?php echo $parrafo; ?>
    </p>
    <a href="http://www.elpais.es" target="_blank">Enlace a El País</a>
</body>

</html>