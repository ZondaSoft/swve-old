<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue011;

class SectoresController extends Controller
{
    public function index($id = null)
    {
        if ($id == null)
            {
                $legajo = Sue011::first();
            }
        else
            {
                $legajo = Sue011::find($id);

                if ($legajo == null)
                    $legajo = Sue011::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue011;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 4;

        return view('sectores.index')->with(compact('legajo','agregar','edicion','active'));;
    }


    public function add()
    {
        $legajo = new Sue011;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 4;

        return view('sectores.index')->with(compact('legajo','agregar','edicion','active'));;
    }


    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'codigo.required'=>'El código es obligatorio',
            'codigo.unique'=>'El código ya existe',
            'detalle.required'=>'La descripción es obligatoria',
            'detalle.min'=>'La descripción debe tener más de 2 letras'
            ];

        $rules = [
            'codigo'=>'required|unique:sue011s',
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue011();

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->color = 0; // $request->input('color');

        $legajo->save();   // INSERT INTO - SQL
        return redirect('/sectores/' . $legajo->id);
    }


  	public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue011::find($id);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 4;

        return view('sectores.index')->with(compact('legajo','edicion','active'));    // Abrir form de modificacion
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue011::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 4;

        $legajo->delete();

        return redirect("/sectores/");
    }


    public function search(Request $request)
    {
        $active = 4;

        $legajos = Sue011::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('sectores.search')->with(compact('legajos','active','name'));
    }

}
