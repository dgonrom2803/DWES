<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Sólo un método
    public function __invoke() {

        $clientes = [
            [
                'id' => 1,
                'nombre'=> 'Diego'
            ],
            [
                'id' => 2,
                'nombre'=> 'Pedro'
            ],
            [
                'id' => 3,
                'nombre'=> 'María'
            ]
            ];


        $usuarios = [];
        $autor = 'Diego González';
        $curso = '23/24';
        $modulo = 'DWES';
        $nivel = 2;
        return view('home.index', compact('autor', 'curso', 'modulo', 'nivel', 'clientes'));
    }
}
