<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{
    //Mostrar todos los clientes
    public function index() {
        return 'Lista Clientes';
    }

    public function create(){
        return 'Nuevo Cliente';
    }
    public function show ($id){
        return "Mostrar cliente: {$id}";
    }
    public function edit($id){
        return "Editar cliente: {$id}";
    }
}
