<?php
/* 

    class.arrayArticulos.php

    tabla de articulos

    Es un array donde cada elemento es un objeto de la clase Alumno
*/

class ArrayAlumno
{

    private $tabla; //Array que almacena los artículos
    /* Constructor */
    public function __construct()
    {
        $this->tabla = [];
    }


    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return  self
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];
        asort($cursos);
        return $cursos;
    }

    static public function getAsignaturas()
    {
        $asignaturas = [
            '1DAW Base de Datos',
            '1DAW Entornos de Desarrollo',
            '1DAW Formación y Orientación Laboral',
            '1DAW Lenguaje de Marcas y Sistemas de Gestión de Información',
            '1DAW Programación',
            '2DAW Desarrollo Web Entorno Cliente',
            '2DAW Desarrollo Web Entorno Servidor',
            '2DAW Despliegue de Aplicaciones Web'
        ];
        asort($asignaturas);
        return $asignaturas;
    }
    public function getAlumnos()
    {

        #Alumno 1
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Herrera Ramírez',
            'juan.herrera@gmail.com',
            '06/03/2002',
            2,
            [3, 4, 5]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 2
        $alumno = new Alumno(
            2,
            'Pablo',
            'Mateos Palas',
            'pmatpal0105@g.educaand.es',
            '01/05/2004',
            3,
            [3, 7, 6]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 3
        $alumno = new Alumno(
            3,
            'Antonio Jesús',
            'Téllez Perdigones',
            'atelper@gmail.com',
            '10/05/1999',
            2,
            [6, 7, 4]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 4
        $alumno = new Alumno(
            4,
            'Juan Maria',
            'Mateos Ponce',
            'jmatpon@gmail.com',
            '20/10/2004',
            4,
            [6, 7, 2]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 5
        $alumno = new Alumno(
            5,
            'Jorge',
            'Coronil Villalba',
            'jcorvil600@gmail.com',
            '17/04/1997',
            3,
            [6, 7, 3]
        );

        #Añadir articulo a la tabla 
        $this->tabla[] = $alumno;

        #Alumno 6
        $alumno = new Alumno(
            6,
            'Diego',
            'González Romero',
            'diegogonzalezromero@gmail.com',
            '28/03/2001',
            3,
            [6, 7, 1]
        );

        #Añadir articulo a la tabla 
        $this->tabla[] = $alumno;

        #Alumno 7
        $alumno = new Alumno(
            7,
            'Adrián',
            'Merino Gamaza',
            'aamergam@g.educand.es',
            '10/12/2002',
            2,
            [6, 7, 5]
        );

        #Añadir articulo a la tabla 
        $this->tabla[] = $alumno;

        #Alumno 8
        $alumno = new Alumno(
            8,
            'Daniel Alfonso',
            'Rodríguez Santos',
            'darancuga@gmail.com',
            '27/08/1999',
            2,
            [0, 1, 5]
        );

        #Añadir alumno a la tabla
        $this->tabla[] = $alumno;

        #Alumno 9 
        $alumno = new Alumno(
            9,
            'Ricardo',
            'Moreno Cantea',
            'rmorcan@g.educaand.es',
            '13/05/2004',
            3,
            [6, 7, 2]
        );

        #Añadir alumno a la tabla
        $this->tabla[] = $alumno;

        #Alumno 10
        $alumno = new Alumno(
            10,
            'Jonathan',
            'León Canto',
            'jleocan773@g.educaand.es',
            '19/06/2000',
            3,
            [6, 7, 1]
        );

        #Añadir alumno a la tabla 
        $this->tabla[] = $alumno;

        #Alumno 11
        $alumno = new Alumno(
            11,
            'Juan Jesus',
            'Muñoz Perez',
            'jjmunper@gmail.com',
            '06/03/2000',
            2,
            [3, 2, 4]
        );

        #Añadir alumno a la tabla
        $this->tabla[] = $alumno;

        #Alumno 12
        $alumno = new Alumno(
            12,
            'Julian',
            'Garcia Velazquez',
            'jgarvel076@g.educaand.es',
            '01/12/2004',
            2,
            [3, 7, 4]
        );

        #Añadir alumno a la tabla
        $this->tabla[] = $alumno;

    }

    static public function mostrarAsignatura($asignaturas, $asignaturasAlumno)
    {
        $array = [];
        foreach ($asignaturasAlumno as $indice) {
            $array[] = $asignaturas[$indice];
        }
        asort($array);
        return $array;
    }


    public function create(Alumno $data)
    {
        $this->tabla[] = $data;
    }
    public function delete($indice)
    {
        unset($this->tabla[$indice]);
        array_values($this->tabla);

    }
    public function update(Alumno $data, $indice)
    {
        // toma un indice y modifica los valores en la tabla de ese indice
        $this->tabla[$indice] = $data;
    }

    public function buscarID($indice)
    {
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice];
    }




    







}
?>