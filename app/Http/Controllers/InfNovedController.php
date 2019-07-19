<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Veh001;
use App\Veh010;

class InfNovedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Veh001;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 100;

        if ($nrolegajo != null) {
          $legajoNew->legajo = $id;

          // Busco el legajo seleccionado
          $legajoNew->detalle = $legajoNew->Apynom;
        }
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Veh001::first();
        } else  {
            $periodo = Veh001::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Veh001::first();
            }
        }

        if ($periodo != null) {
            $novedades = Veh001::orderBy('dominio')->where('id','>',0)->paginate(9);

        } else  {
            $novedades = Veh001::orderBy('dominio')->where('id','>',0)->paginate(9);

        }

        // Combos de tablas anexas
        $legajos   = Veh001::orderBy('dominio')->get();

        return view('informes.legajos')->with(compact('legajo','legajoNew','agregar','edicion','active','novedades','legajos'));
    }



    public function novedades($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Veh001;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 120;

        if ($nrolegajo != null) {
          $legajoNew->legajo = $id;

          // Busco el legajo seleccionado
          $legajoNew->detalle = $legajoNew->Apynom;
        }
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Veh001::where('id','>',0)->first();
        } else  {
            $periodo = Veh001::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Veh001::where('id','Si')->first();
            }
        }

        $novedades = Veh010::orderBy('dominio')->where('id','>',0)->paginate(9);

        $ddesde = Carbon::now();
        $dhasta = Carbon::now();

        // Combos de tablas anexas
        $legajos   = Veh001::orderBy('dominio')->get();
        $novedades  = Veh010::orderBy('dominio')->get();

        return view('informes.novedades')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos','ddesde','dhasta'));
    }


    public function fichadas($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Veh001;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 140;

        if ($nrolegajo != null) {
          $legajoNew->legajo = $id;

          // Busco el legajo seleccionado
          $legajoNew->detalle = $legajoNew->Apynom;
        }
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Veh010::where('id','>',0)->first();
        } else  {
            $periodo = Veh010::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Veh010::first();
            }
        }

        $novedades = Veh010::orderBy('fecha')->where('id',0)->paginate(9);

        $ddesde = Carbon::now();
        $dhasta = Carbon::now();

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('codigo')->get();
        $novedades  = Sue031::orderBy('codigo')->get();

        return view('informes.fichadas')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos','ddesde','dhasta'));
    }



    
}
