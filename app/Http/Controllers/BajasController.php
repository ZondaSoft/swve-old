<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veh001;
use App\Veh010;
use App\Sue070;
use App\Sue006;
use App\Sue007;
use App\Sue009;
use App\Sue011;
use App\Sue015;
use App\Sue030;
use App\Sue014;
use App\Sue054;
use App\Sue107;

class BajasController extends Controller
{
    // Indice inicial de CRUD de Legajos de Baja
    public function index($id = null, $direction = null)
    {
        if ($id == null) {
              $legajo = Veh001::first();

        } else
        {
              $legajo = Veh001::find($id);

              if ($legajo == null)
                  $legajo = Veh001::first();
          }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Veh001;

        $id = $legajo->id;

        // Si la var. $direction muestra que el cursor se mueve (-1)
        if ($direction == -1) {
            $legajo = Veh001::where('id', '<', $id)
                ->orderBy('id', 'desc')
                ->first();

            if ($legajo == null)
                $legajo = Veh001::first();
        }

        // Si la var. $direction muestra que el cursor se mueve (+1)
        if ($direction == 1) {
            $legajo = Veh001::where('id', '>', $id)->first();

            if ($legajo == null)
                $legajo = Veh001::latest('id')->first();
        }


        // Si la var. $direction muestra que el cursor se mueve al final
        if ($direction == 9) {
            $legajo = Veh001::latest('id')->first();
        }

        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 2;

        // Combos de tablas anexas
        $novedades   = Veh010::orderBy('detalle')->paginate(8);

        return view('bajas.index')->with(compact('legajo','agregar','edicion','active','novedades'));;
    }
}
