{{-- 
    Creamos una vista a partir del layout
    Vista principal Alumnos
--}}

@extends ('layout.layout')

@section('titulo', 'Home Alumnos')
@section('subtitulo', 'Panel Control Alumnos')

@section('contenido')
{{-- Menu alumnos --}}
    @include('students.partials.menu')

    {{-- Lista alumnos --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
            <tr>
                {{-- registro alumno --}}
                <td scope="row">{{ $alumno->id}}</td>
                <td>{{ $alumno->last_name}}</td>
                <td>{{ $alumno->name}}</td>
                <td>{{ $alumno->phone_number}}</td>
                <td>{{ $alumno->city}}</td>
                <td>{{ $alumno->email}}</td>
                <td>{{ $alumno->course->course}}</td>
                
                {{-- botones de accion --}}
                <td>
                    <a href="#" title="Editar"><i class="bi bi-pencil-fill"></i></a>
                    <a href="#" title="Mostrar"><i class="bi bi-eye-fill"></i></a>
                    <a href="#" title="Eliminar"><i class="bi bi-trash-fill" onclick="return confirm('¿Quieres borrar?')"></i></a>
                </td>
            </tr>
            @empty
            <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
@endsection