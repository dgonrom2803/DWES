<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.3.1</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Bootstrap Icons 1.9.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-app-indicator"></i>        
            <span class="fs-4">Tabla del 1 al 100</span>
        </header>

        <div class="table-responsive">
            <table class="table table-primary">         
                <tbody>
                    <?php 
                        $a = 1;
                        $b =1;
                        $fila =1;
                    ?>
                    <tr>
                        <?php while ($a<= 100):
                                if ($b == 11):
                                    $b=1; ?>
                                    </tr>
                                    <tr>
                                <?php endif; ?> 
                            <td><?=$a ?>
                            
                        <?php
                            $a++;
                            $b++;
                            
                        endwhile;?>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        

    </div>

    <!-- Pie del documento -->
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">© 2023
                Diego González Romero - DWES - 2º DAW - Curso 23/24</span>
        </div>
    </footer>
</body>
</html>