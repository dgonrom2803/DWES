<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients', function () {
    return "Clientes";
});

Route::get('/clients/new', function () {
    return "Vista Nuevo Cliente";
});

Route::get('/clients/delete', function () {
    return "Vista Eliminar Cliente";
});

// //Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
// Route::get('/clientes/delete/{id}', function ($id) {
//     return "Se ha eliminado al cliente: " . $id; 
// });

//Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
Route::get('/clients/edit/{id}', function ($id) {
    return "Editar Clientes: {$id}";
});

//Para poder poner una ruta con parámetros se debe usar la siguiente sintaxis
Route::get('/clients/show/{id}', function ($id) {
    return "Editar Clientes: {$id}";
});

//Además, Laravel permite generar rutas con parámetros opcionales
Route::get('/clients/delete/{id1}/{id2?}', function ($id1, $id2 = null) {
    if (!$id2) {
        return "Eliminar al cliente: " . $id1;
    } else {
        return "Eliminar de los clientes: " . $id1 . " hasta el " . $id2;
    }
});