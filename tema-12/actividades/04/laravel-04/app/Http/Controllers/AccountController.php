<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function index()
    {
        return 'Lista Cuentas';
    }

    public function create()
    {
        return 'Nuevo Cuenta';
    }
    public function store()
    {
        return "Almacenar cuenta";
    }
    public function show($id)
    {
        return "Mostrar Cuenta: {$id}";
    }
    public function edit($id)
    {
        return "Editar Cuenta: {$id}";
    }
    public function update($id)
    {
        return "Actualizar Cuenta: {$id}";
    }
    public function destroy($id)
    {
        return "Eliminar Cuenta: {$id}";
    }
}
