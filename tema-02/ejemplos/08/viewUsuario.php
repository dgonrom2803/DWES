<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 08 -Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 8 - Tema 2</h2>
    </center>

    <table border=1 width="50%">
        <tr>
            <th>Usuario</th>
            <th>Categoria</th>
            <th>Especialidad</th>
        </tr>
        <tr>
            <td>
                <?= $usuario ?>
            </td>
            <td>
                <?= $categoria ?>
            </td>
            <td>
                <?= $especialidad ?>
            </td>
        </tr>
    </table>
    
</body>

</html>