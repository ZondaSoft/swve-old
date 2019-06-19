<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Veh001;
use App\Veh007;
use App\Veh010;


class RtoController extends Controller
{

    public function add()
    {
        $legajo = new Sue028;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 26;
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('novedadesind.index')->with(compact('legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas','obras','sindicatos','convenios','contratos'));
    }


    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'rto_fecha.required'=>'La fecha es obligatoria',
            'rto_vencimient.required'=>'La fecha de vencimiento es obligatoria'
            ];

        $rules = [
            'rto_fecha'=>'required',
            'rto_vencimient'=>'required'
            ];

        $this->validate($request, $rules, $messages);

        //$request->validate([
        //    'legajo' => ['required', 'integer', new LegajoExiste],
        //]);

        $lote = false;
        $legajo = new Veh010();

        $legajo->unidad = $request->input('rto_interno');
        $legajo->dominio = $request->input('rto_dominio');

        $legajo->tipo = 'Revisación Técnica';

        $legajo->detalle = $request->input('rto_detalle');

        $date = str_replace('/', '-', $request->input('rto_fecha'));
        $legajo->fecha = Carbon::createFromFormat("d-m-Y", $date);

        $date = str_replace('/', '-', $request->input('rto_vencimient'));
        $legajo->vencimient = Carbon::createFromFormat("d-m-Y", $date);

        $legajo->save();

        return redirect('/home');
    }



    public function edit($id, $page = 1)
    {
        // id a NovedadesController:edit2() ver de unificar
        $legajo = Veh010::find($id);

        return $legajo;
    }


    public function update(Request $request, $id)
    {
        // Validaciones
        if ($request->input('btngrabar') == 'grabar') {
            $messages = [
                'cantidadEdit.required'=>'La cantidad es obligatoria'
                ];

            $rules = [
                'cantidadEdit'=>'required'
                ];

            //$request->alta = $legajo->alta;
            // Validacion de campos
            $this->validate($request, $rules, $messages);
        }


        $id = $request->input('nid');

        $legajo = Sue028::find($id);
        $legajo->cantidad = $request->input('cantidadEdit');
        $legajo->comenta1 = $request->input('comenta1Edit');

        //dd($id);

        if ($request->input('btngrabar') == 'grabar') {
            $legajo->update($request->only('cantidad','comenta1'));
        } else {
            // Pido confirmar el Borrado
            $showDialog = true;

            return redirect()->back()->with('alert', 'Deleted!')
                                     ->with('id', $id);
        }

        // dd($legajo->cod_centro);

        return back();
    }
}
