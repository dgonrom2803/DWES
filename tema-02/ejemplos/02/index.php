<?php

$usuario = "Diego";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 01 -Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 1 - Tema 2</h2>
    </center>
    <h4>
        <?php

        echo "Hola Mundo";
        echo "<br>";
        echo 'Soy '. $usuario;

        ?>
    </h4>
</body>

</html>