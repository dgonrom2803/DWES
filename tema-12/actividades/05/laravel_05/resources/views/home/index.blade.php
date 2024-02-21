<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Controller Vista</title>
</head>

<body>
    <p>
        Hola Mundo Blade Laravel
    </p>

    <table>
        <caption>Listado clientes</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente['id'] }}</td>
                <td>{{ $cliente['nombre'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>Nº</tfoot>
    </table>

    @forelse ($usuarios as $usuario)
        {{print_r($usuario)}}
    @empty
        <p>Sin Usuarios</p>
    @endforelse

    @if ($nivel == 1)
        <p>Estoy en primer curso</p>
    @else
        <p>Estoy en segundo curso</p>
    @endif

    <footer>
        <p>Autor:
            {{$autor}}
        </p>
        <p>Curso:
            {{$curso}}
        </p>
        <p>Módulo:
            {{$modulo ?? 'Base de Datos'}}
        </p>
        <p>Nivel:
            {{$nivel}}
        </p>
        
    </footer>
    {{-- Esto es un comentario blade --}}
    <!-- Esto es un comentario -->
</body>

</html>