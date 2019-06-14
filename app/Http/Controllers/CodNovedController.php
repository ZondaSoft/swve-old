<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue031;

class CodNovedController extends Controller
{
	// Indice inicial de CRUD de codigos de novedades
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue031::first();
            }
        else
            {
                $legajo = Sue031::find($id);

                if ($legajo == null)
                    $legajo = Sue031::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue031;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 7;

        return view('codnoved.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Sue031;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 7;

        return view('codnoved.index')->with(compact('legajo','agregar','edicion','active'));
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
            'codigo'=>'required|unique:sue031s',
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue031();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->codigo2 = $request->input('codigo2');
        $legajo->lote = 0;
        $legajo->comentario = '';
        $legajo->tipo = '';
        $legajo->lote_leg = 0;
        $legajo->lote_cc = 0;
        $legajo->lote_loc = 0;
        $legajo->cantidad = 0;
        $legajo->color = 0;
        $legajo->comenta2 = '';
        $legajo->comenta3 = '';
        $legajo->lcomenta = 0;
        $legajo->formula = '';
        $legajo->cod_sue = '';
        $legajo->activo = 0;

        $legajo->save();   // INSERT INTO - SQL

        return redirect('/codnoved');
    }


    public function edit($id)
    {
        $legajo = Sue031::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 7;

        return view('codnoved.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
    }



    public function update(Request $request, $id)
    {
        // Validaciones
        $messages = [
            'detalle.required'=>'La descripción es obligatoria',
            'detalle.min'=>'La descripción debe tener más de 2 letras'
            ];

        $rules = [
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Sue031::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/codnoved/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue031::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 7;

        $legajo->delete();

        return redirect("/codnoved/");
    }


    public function search(Request $request)
    {
        $active = 7;

        $legajos = Sue031::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('codnoved.search')->with(compact('legajos','active','name'));
    }


    public function search2(Request $request)
    {
        $active = 7;

        $legajos = Sue031::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('codnoved.search2')->with(compact('legajos','active','name'));
    }
}
