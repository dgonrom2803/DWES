<?php
/*

	Clase articulo


*/

class Alumno
{
	//Atributos de la clase
	public $id;
	public $nombre;
	public $apellidos;
	public $email;
	public $fecha_nacimiento;
	public $curso;
	public $asignaturas;


	// Creamos el constructor
	public function __construct(
		$id = null,
		$nombre = null,
		$apellidos = null,
		$email = null,
		$fecha_nacimiento = null,
		$curso = null,
		$asignaturas = []
	) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->email = $email;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->curso = $curso;
		$this->asignaturas = $asignaturas;
	}



	//Creamos una funcion que a partir de la fecha_nacimiento nos devuelva la edad
	public function getEdad()
	{
		$fecha_actual = new DateTime();
		$fecha_nacimiento = new DateTime($this->fecha_nacimiento);
		$edad = $fecha_actual->diff($fecha_nacimiento)->y;
		return $edad;

	}





}




?>