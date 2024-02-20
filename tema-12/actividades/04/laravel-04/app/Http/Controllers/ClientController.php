<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index() {
        return 'Lista Clientes';
    }

    public function create(){
        return 'Nuevo Cliente';
    }
    public function show ($id){
        return "Mostrar cliente: {$id}";
    }
    public function update($id){
        return "Actualizar cliente: {$id}";
    }

    public function delete($id){
        return "Eliminar cliente: {$id}";
    }
}
