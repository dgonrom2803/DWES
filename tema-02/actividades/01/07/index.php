<!DOCTYPE html>
<html>
<head>
    <title>Información Personal</title>
</head>
<body>
    <?php
    // Declaración de variables
    $nombre = "Diego";
    $apellidos = "González";
    $poblacion = "Ubrique";
    $edad = 22;
    $ciclo = "DAW";
    $curso = 2;
    $modulo = "Programación";

    // Mostrar título
    echo "<h1>Información Personal</h1>";

    // Mostrar valores en una tabla
    echo "<table border='1'>";
    echo "<tr><td>Nombre</td><td>$nombre</td></tr>";
    echo "<tr><td>Apellidos</td><td>$apellidos</td></tr>";
    echo "<tr><td>Población</td><td>$poblacion</td></tr>";
    echo "<tr><td>Edad</td><td>$edad</td></tr>";
    echo "<tr><td>Ciclo</td><td>$ciclo</td></tr>";
    echo "<tr><td>Curso</td><td>$curso</td></tr>";
    echo "<tr><td>Módulo</td><td>$modulo</td></tr>";
    echo "</table>";

    // Mostrar historia en un párrafo
    echo "<h2>Historia en un párrafo</h2>";
    echo "<p>Un día en $poblacion, $nombre $apellidos, de $edad años, estaba estudiando su $curso curso del ciclo de $ciclo. Intentando aprender $modulo, para poder sacarse el curso.</p>";
    ?>
</body>
</html>
