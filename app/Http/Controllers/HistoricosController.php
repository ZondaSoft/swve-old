<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\LegajoExiste;
use Carbon\Carbon;
use App\Sue001;
use App\Sue011;
use App\Sue057; // Hist. de siniest.
use App\Sue060; // Hist. de en
use App\Sue028;

class HistoricosController extends Controller
{
    public function accid($id = null, $direction = null)
    {
        $legajoNew = new Sue057;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 60;

        $novedades = Sue057::orderBy('fecha')->where('id','>',0)->paginate(9);

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('detalle')->get();

        return view('historico.accid')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','periodo','legajos'));
    }



    public function enfe($id = null, $direction = null)
    {
        $legajoNew = new Sue060;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 62;

        $novedades = Sue060::orderBy('fecha')->where('id','>',0)->paginate(9);

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('detalle')->get();

        return view('historico.en')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','periodo','legajos'));
    }




}
