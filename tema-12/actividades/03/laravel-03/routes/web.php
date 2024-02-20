<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\AccountController;

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

// // Vinculamos cada ruta con un método de la clase
// Route::get('/clientes', [clientController::class, 'index']);
// Route::get('/clientes/create', [clientController::class, 'create']);
// Route::get('/clientes/show/{id}', [clientController::class, 'show']);
// Route::get('/clientes/edit/{id}', [clientController::class, 'edit']);


// Podemos agrupar las rutas que pertenecen a un mismo controlador
Route::controller(clientController::class)->group(
    function () {
        Route::get('/clientes', 'index');
        Route::get('/clientes/create', 'create');
        Route::get('/clientes/show/{id}', 'show');
        Route::get('/clientes/edit/{id}', 'edit');
    }
);

// Generamos las rutas Account creado con resource
Route::resource('cuentas', AccountController::class);