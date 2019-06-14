<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Veh001;
use App\Sue001;
use App\Sue011;
use App\Sue028;
use App\Sue071;
use App\Sue031;

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
        $legajoNew = new Sue028;
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
            $periodo = Sue071::where('activo','Si')->first();
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();
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
        $legajos   = Veh001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('codigo')->get();

        return view('informes.legajos')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos'));
    }



    public function novedades($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Sue028;
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
            $periodo = Sue071::where('activo','Si')->first();
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();
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

        if ($periodo != null) {
            $ddesde = Carbon::parse($periodo->desde)->format('d/m/Y');
            $dhasta = Carbon::parse($periodo->hasta)->format('d/m/Y');
        } else {
            $ddesde = Carbon::now();
            $dhasta = Carbon::now();
        }

        // Combos de tablas anexas
        $legajos   = Veh001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('codigo')->get();
        $novedades  = Sue031::orderBy('codigo')->get();

        return view('informes.novedades')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos','ddesde','dhasta'));
    }


    public function fichadas($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Sue028;
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
            $periodo = Sue071::where('activo','Si')->first();
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();
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

        if ($periodo != null) {
            $ddesde = Carbon::parse($periodo->desde)->format('d/m/Y');
            $dhasta = Carbon::parse($periodo->hasta)->format('d/m/Y');
        } else {
            $ddesde = Carbon::now();
            $dhasta = Carbon::now();
        }

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('codigo')->get();
        $novedades  = Sue031::orderBy('codigo')->get();

        return view('informes.fichadas')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos','ddesde','dhasta'));
    }



    public function embargos($id = null, $nrolegajo = null, $cod_nov = null)
    {
        $legajoNew = new Sue028;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 150;

        if ($nrolegajo != null) {
          $legajoNew->legajo = $id;

          // Busco el legajo seleccionado
          $legajoNew->detalle = $legajoNew->Apynom;
        }
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Sue071::where('activo','Si')->first();
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();
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

        return view('informes.embargos')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','legajos'));
    }
}
