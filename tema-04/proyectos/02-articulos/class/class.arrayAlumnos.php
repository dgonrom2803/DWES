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
    public function getDatos()
    {

        #Alumno1
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Herrera Ramírez',
            'juanmanuelherrera@gmail.com',
            '06/03/2002',
            3,
            [6, 7, 8]
        );

        # Añadir el artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno2
        $alumno = new Alumno(
            2,
            'Diego',
            'González Romero',
            'diegogonzalezromero@gmail.com',
            '28/03/2001',
            3,
            [6, 7, 8]
        );

        # Añadir el artículo a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno(3, 'Pablo', 'Mateos Palas', 'pmatpal0105@g.educaand.es', '01/05/2004', 3, [3, 7, 8]);
        $this->tabla[] = $alumno;

        $alumno = new Alumno( 4, 'Antonio Jesús', 'Téllez Perdigones', 'atelper@gmail.com', '10/05/1999', 2, [6, 7, 8] );
        $this->tabla[] = $alumno;

        $articulo = new Alumno( 5, 'Juan Maria', 'Mateos Ponce', 'jmmateos@gmail.com', '20/10/2004', 4, [6, 7, 8] );
        $this->tabla[] = $alumno;

        $alumno = new Alumno( 1, 'Jorge', 'Coronil Villalba', 'jcorvil600@gmail.com', '17/04/1997', 3, [6, 7, 8], );
        $this->tabla[] = $alumno;

        $alumno = new Alumno( 2, 'Diego', 'González Romero', 'diegogonzalezromero@gmail.com', '28/03/2001', 3, [6,7,8] );
        $this->tabla[] = $alumno;


        $alumno = new Alumno( 1, 'Adrián', 'Merino Gamaza', 'aamergam@g.educand.es', '10/12/2002', 2, [6, 7, 8] );
        $this->tabla[] = $alumno;


        $alumno1= new Alumno(1,'Daniel Alfonso','Rodríguez Santos','darancuga@gmail.com','27/08/1999',2,[0,1,5]); $this->tabla[] = $alumno;

        $alumno = new Alumno(1, 'Ricardo', 'Moreno Cantea', 'rmorcan@g.educaand.es', '13/05/2004', 3, [6, 7, 8]);
        $this->tabla[] = $alumno;

        $alumno = new Alumno( 2, 'Jonathan', 'León Canto', 'jleocan773@g.educaand.es', '19/06/2000', 3, [6,7,8] );
        $this->tabla[] = $alumno;




    }

    static public function mostrarAsignaturas($asignaturas, $asignaturasAlumno)
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

    public function buscar($indice)
    {
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice];
    }

    public function order()
    {

    }


    







}
?>