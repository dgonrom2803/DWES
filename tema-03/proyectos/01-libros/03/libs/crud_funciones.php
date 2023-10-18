<?php

/*
function buscra_en_tabla()
descripcion: busca u valor en una determinada columna de la tabla
paramteros: 
                - tabla
                - nombre de la columna
                - valor que quiero buscar
    salida: 
                - indice del array donde se encuentra el valor
                - false en caso de que no lo encuentre
*/
function buscar_en_tabla($tabla = [], $columna, $valor){
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);

}


















/*

    funcion: eliminar()
    descripción: elimina un elemento de la tabla
    paramteros: 
                - tabla
                - id del elemento que deseo eliminar
    salida: 
                - tabla actualizada

*/

// function eliminar($tabla = [], $id)
// {

//     // Buscar elemento que le corresponde id
//     $lista_id = array_column($tabla, 'id');

//     // Busco id del libro que deseo eliminar en dicha columna
//     $elemento = array_search($id, $lista_id, false);


//     unset($tabla[$elemento]);

//     return $tabla;
//     // Eliminar elemento de la tabla



// }

?>