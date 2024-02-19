<?php
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return "Nombre: Diego, Módulo: DAW, Curso: 2, Prueba";
});

Route::get('/api/user', function () {
    return "La tecnología avanza a una velocidad vertiginosa, pero el conocimiento y la creatividad humana siguen siendo la verdadera fuerza motriz detrás de la innovación informática";
});

Route::get('/user/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "Nombre completo: $nombre $apellidos";
});

Route::get('/user/view/{id?}', function ($id = null) {
    if ($id !== null) {
        return "View: $id (del usuario)";
    } else {
        return "View: (sin ID)";
    }
});

Route::get('/ruta-con-dos-parametros/{edad}/{localidad?}', function ($edad, $localidad = null) {
    if ($localidad !== null) {
        return "Edad: $edad, Localidad: $localidad";
    } else {
        return "Edad: $edad";
    }
});

