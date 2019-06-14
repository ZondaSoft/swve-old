<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\LegajoExiste;
use Carbon\Carbon;
use App\Sue001;
use App\Sue011;
use App\Sue057; // Hist. de siniest.
use App\Sue060; // Hist. de en
use App\Sue071;
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



    public function vacac($id = null, $direction = null)
    {
        $legajoNew = new Sue028;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 61;

        //if ($nrolegajo != null) {
        //  $legajoNew->legajo = $id;
        // Busco el legajo seleccionado
        //  $legajoNew->detalle = $legajoNew->Apynom;
        //}
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Sue071::where('activo','Si')->first();

            if ($periodo != null) {
                $id = $periodo->id;
            }
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();

                if ($periodo != null) {
                    $id = $periodo->id;
                }
            }
        }

        // Si la var. $direction muestra que el cursor se mueve (-1)
        if ($id != null) {
            if ($direction == -1) {
                $periodo = Sue071::where('id', '<', $id)
                    ->orderBy('id', 'desc')
                    ->first();

                if ($periodo == null)
                    $periodo = Sue071::first();
            }

            // Si la var. $direction muestra que el cursor se mueve (+1)
            if ($direction == 1) {
                $periodo = Sue071::where('id', '>', $id)->first();

                if ($periodo == null)
                    $periodo = Sue071::latest('id')->first();
            }
        }

        if ($periodo != null) {
            $periodo2 = substr($periodo->periodo,3,4) . substr($periodo->periodo,0,2);

            $novedades = Sue028::orderBy('fecha')->where('periodo',$periodo2)->paginate(9);

            $novedades->periodo = $periodo->periodo;
        } else  {
            $novedades = Sue028::orderBy('fecha')->where('id',0)->paginate(9);

            $novedades->periodo = "  /    ";
        }

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('detalle')->get();

        return view('historico.vacac')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','periodo','legajos'));
    }
}
