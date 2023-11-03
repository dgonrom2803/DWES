<?php

/*  
Fichero: funciones.php

    Descripción: Funciones para la gestión completa de una tabla de películas
    
    Autor: Diego González Romero
*/


function getGeneros()
{

    $generos = [

        "Acción",
        "Aventura",
        "Comedia",
        "Musical",
        "Terror",
        "Bélica",
        "Dramático",
        "Suspense",
        "Histórico",
        "Fantasía"
    ];

    return $generos;
}

function getPaises () {
    $paises = ["Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Palestina","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue"];
    return $paises; 
}


function getPeliculas()
{

    $tabla = [
        [
            "id" => 1,
            "titulo" => "Joker",
            "director" => "Todd Phillips",
            "nacionalidad" => [59],
            "generos" => [6, 7],
            "año" => 2019

        ],
        [
            "id" => 2,
            "titulo" => "Mientras dure la guerra",
            "director" => "Alejandro Amenábar",
            "nacionalidad" => [58],
            "generos" => [6, 8],
            "año" => 2019
        ],
        [
            "id" => 3,
            "titulo" => "Terminator.Destino oscuro",
            "director" => "Tim Miller",
            "nacionalidad" => [59],
            "generos" => [0, 9],
            "año" => 2019

        ],
        [
            "id" => 4,
            "titulo" => "La vida es bella",
            "director" => "Roberto Benini",
            "nacionalidad" => [89],
            "generos" => [3, 5, 6],
            "año" => 1997

        ],
        [
            "id" => 5,
            "titulo" => "Interstellar",
            "director" => "Christopher Nolan",
            "nacionalidad" => [59],
            "generos" => [1, 6, 7],
            "año" => 2014

        ]
    ];

    return $tabla;

}


function mostrarGeneros($generos, $indiceGeneros)
{
    $aux = [];
    foreach ($indiceGeneros as $genero) {
        $aux[] = $generos[$genero];
    }

    return $aux;
}
function mostrarPais($paises, $indicePaises)
{
    $aux = [];
    foreach ($indicePaises as $pais) {
        $aux[] = $paises[$pais];
    }

    return $aux;
}

function eliminar($tabla, $indice)
{

    unset($tabla[$indice]);
    $tabla = array_values($tabla);
    return $tabla;
}

function nuevo($tabla, $registro)
{
    $tabla[] = $registro;
    return $tabla;
}
 
function actualizar($tabla, $registro, $indice)
{
    $tabla[$indice] = $registro;
    return $tabla;
}


function ordenar($tabla, $campo)
{

    # Creo un array auxiliar con los valores del criterio de ordenación
    $aux = array_column($tabla, $campo);

    array_multisort($aux, SORT_ASC, $tabla);

    return $tabla;
}


function filtrar($tabla, $expresion)
{

    $aux = [];

    foreach ($tabla as $registro) {

        if (in_array($expresion, $registro)) {

            $aux[] = $registro;
        }
    }

    return (empty($aux) ? $tabla : $aux);
}

function nuevo_id($tabla)
{
    $ultimo_id = count($tabla) + 1;

    return $ultimo_id;
}



?>