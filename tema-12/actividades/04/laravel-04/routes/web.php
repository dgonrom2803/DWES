<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductoController;
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
// Route::get('/clientes', [ClientController::class, 'index']);
// Route::get('/clientes/create', [ClientController::class, 'create']);
// Route::get('/clientes/show/{id}', [ClientController::class, 'show']);
// Route::get('/clientes/edit/{id}', [ClientController::class, 'edit']);


// Podemos agrupar las rutas que pertenecen a un mismo controlador
Route::controller(ClientController::class)->group(
    function () {
        Route::get('/clientes', 'index');
        Route::get('/clientes/create', 'create');
        Route::get('/clientes/show/{id}', 'show');
        Route::get('/clientes/update/{id}', 'update');
        Route::get('/clientes/delete/{id}', 'delete');
    }
);

// Generamos las rutas Product creado con resource
Route::resource('cuentas', ProductoController::class);

// Generamos las rutas para cuentas

Route::get('/cuentas', [AccountController::class, 'index'])->name('cuentas.index');
Route::get('/cuentas/create', [AccountController::class, 'create'])->name('cuentas.create');
Route::post('/cuentas/store', [AccountController::class, 'store'])->name('cuentas.store');
Route::get('/cuentas/show/{id}', [AccountController::class, 'show'])->name('cuentas.show');
Route::get('/cuentas/edit/{id}', [AccountController::class, 'edit'])->name('cuentas.edit');
Route::put('/cuentas/update/{id}', [AccountController::class, 'update'])->name('cuentas.update');
Route::delete('/cuentas/destroy/{id}', [AccountController::class, 'destroy'])->name('cuentas.destroy');
