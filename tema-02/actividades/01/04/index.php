<!DOCTYPE html>
<html>

<head>
    <title>Mi Página</title>
</head>

<body>
    <?php
    $floatVariable = 5.5;
    $intVariable = 3;
    $suma = $floatVariable + $intVariable;
    $resta = $floatVariable - $intVariable;
    $division = $floatVariable / $intVariable;
    $producto = $floatVariable * $intVariable;
    $potencia = $floatVariable ** $intVariable;

    var_dump($suma, $resta, $division, $producto, $potencia);
    ?>
</body>

</html>