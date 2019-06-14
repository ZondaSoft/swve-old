<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue015;

class SindicatosController extends Controller
{
    // Indice inicial de CRUD
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue015::first();
            }
        else
            {
                $legajo = Sue015::find($id);

                if ($legajo == null)
                    $legajo = Sue015::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue015;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 16;

        return view('sindicatos.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Sue015;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 16;

        return view('sindicatos.index')->with(compact('legajo','agregar','edicion','active'));
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
            'codigo'=>'required|unique:sue015s',
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue015();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');

        $legajo->save();   // INSERT INTO - SQL

        return redirect('/sindicatos/' . $legajo->id);
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue015::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 16;

        return view('sindicatos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
        $legajo = Sue015::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/sindicatos/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue015::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 16;

        $legajo->delete();

        return redirect("/sindicatos/");
    }


    public function search(Request $request)
    {
        $active = 16;
        $legajos = Sue015::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('sindicatos.search')->with(compact('legajos','active','name'));
    }


}
