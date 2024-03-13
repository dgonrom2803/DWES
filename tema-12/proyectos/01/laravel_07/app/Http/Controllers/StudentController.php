<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Muestra los alumnos
        $alumnos = Student::all()->sortBy('id');
        return view('students.home', ['alumnos' => $alumnos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Carga formulario nuevo alumno
        $cursos = Course::all()->sortBy('course');
        // $cursos = Course::pluck('course', 'id');
        return view('students.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recibe los datos del formulario
        //Valida los datos
        //Almacena en la tabla student de la base de datos

        //Validación Formulario
        //Especifico en un array las reglas de validación de cada campo
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:35'],
                'last_name' => ['required', 'string', 'max:50'],
                'birth_date' => ['required', 'date'],
                'phone_number' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', 'unique:students'],
                'email' => ['required', 'string', 'max:40', 'unique:students'],
                'course_id' => ['required', 'exists:courses,id'],
            ]
        );
        //Cargamos los datos del formulario en la tabla courses
        $alumno = Student::create(
            [
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'birth_date' => $request['birth_date'],
                'phone_number' => $request['phone_number'],
                'city' => $request['city'],
                'dni' => $request['dni'],
                'email' => $request['email'],
                'course_id' => $request['course_id'],
            ]
        );
        $alumno->save();
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cargo los datos del alumno
        $alumno = Student::find($id);
        // $cursos = Course::all()->sortBy('course');

        //Llamamos a la vista
        return view('students.show', ['alumno' =>  $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cargo los datos del alumno
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('course');

        //Llamamos a la vista
        return view('students.edit', ['alumno' =>  $alumno, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación formulario edit
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:35'],
                'last_name' => ['required', 'string', 'max:50'],
                'birth_date' => ['required', 'date'],
                'phone_number' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', Rule::unique('students')->ignore($id)],
                'email' => ['required', 'string', 'max:40', Rule::unique('students')->ignore($id)],
                'course_id' => ['required', 'exists:courses,id'],
            ]
        );

        //Cargamos datos del alumno
        $alumno = Student::find($id);

        // Actualizamos con los datos del formulario
        $alumno->name = $request['name'];
        $alumno->last_name = $request['last_name'];
        $alumno->birth_date = $request['birth_date'];
        $alumno->phone_number = $request['phone_number'];
        $alumno->city = $request['city'];
        $alumno->dni = $request['dni'];
        $alumno->email = $request['email'];
        $alumno->course_id = $request['course_id'];

        // Actualizamos base de datos
        $alumno->save();

        //Redireccionamos a la vista principal
        return  redirect()->route('alumnos.index')
                          ->with('success', 'Alumno actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimino el alumno
        Student::destroy($id);

        // Redirecciono a la vista  principal
        return  redirect()->route('alumnos.index')
                          ->with('success', 'Alumno borrado');

    }
}