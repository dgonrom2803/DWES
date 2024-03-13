@extends('layout.layout')

@section('titulo', 'Alumnos')
@section('subtitulo', 'Mostrar Cliente')
@section('contenido')  
   
    <div class="card">
        <div class="card-header">
            Formulario Mostrar Alumno
        </div>
        @include('students.partials.alert')

        <div class="card-body">
            <!-- Formulario  -->

            <form>
                @csrf
                @method('PUT')
                <!-- Nombre  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ $alumno->name }}"  disabled>
                </div>

                <!-- Apellidos  -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="last_name"
                        value="{{ $alumno->last_name }}" disabled>
                    
                </div>

                <!-- Birth Date  -->
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                        value="{{ $alumno->birth_date }}"  disabled>
                </div>

                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control" name="dni"
                        value="{{ $alumno->dni }}"  disabled>
                </div>

                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"
                        value="{{ $alumno->email }}"  disabled>
                </div>

                <!-- phone_number  -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Telefono</label>
                    <input type="tel"  class="form-control" name="phone_number"
                        value="{{ $alumno->phone_number }}"  disabled>
                </div>
                <!-- Ciudad  -->
                <div class="mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="city"
                        value="{{$alumno->city }}"  disabled>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Curso</label>
                    <input type="text" class="form-control" name="course"
                        value="{{ $alumno->course->course }}"  disabled>
                </div>


        </div>
        {{-- Fin Formulario --}}



        <div class="card-footer text-muted">
            <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-primary"
                href="{{ route('alumnos.index') }}"
                role="button">Volver</a>

        </div>

        </form>
    </div>
    <br><br><br>


@endsection