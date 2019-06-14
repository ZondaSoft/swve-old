<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    // Indice inicial de listado de Solicitudes
    public function index($id = 0)
    {

        $active = 35;

        return view('estadisticas.index')->with(compact('active'));;
    }
}
