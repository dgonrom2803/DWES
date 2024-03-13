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
    @include('students.partials.alert')

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
                    <a href="{{route('alumnos.edit', $alumno->id)}}" title="Editar" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{route('alumnos.show', $alumno->id)}}" title="Mostrar" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                    <form style="display: inline" method="POST" action="{{route('alumnos.destroy', $alumno->id)}}">
                        @csrf
                        @method('DELETE')
                    <button type="submit" title="Eliminar" class="btn btn-danger"><i class="bi bi-trash-fill" onclick="return confirm('¿Quieres borrar?')"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
@endsection