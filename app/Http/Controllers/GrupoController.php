<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue086;

class GrupoController extends Controller
{
    // Indice inicial de CRUD de codigos de novedades
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue086::first();
            }
        else
            {
                $legajo = Sue086::find($id);
                
                if ($legajo == null)
                    $legajo = Sue086::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue086;
        
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 10;

        return view('grupos.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Sue086;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 10;

        return view('grupos.index')->with(compact('legajo','agregar','edicion','active'));
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
            'codigo'=>'required|unique:Sue086s',
            'detalle'=>'required|min:2'
            ];
        
        $this->validate($request, $rules, $messages);

        $legajo = new Sue086();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        
        $legajo->save();   // INSERT INTO - SQL

        return redirect('/grupos');
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue086::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 10;

        return view('grupos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
        $legajo = Sue086::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/grupos/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue086::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 10;

        $legajo->delete();

        return redirect("/grupos/");
    }


    public function search(Request $request)
    {
        $active = 10;
        $legajos = Sue086::paginate(8);
        
        return view('grupos.search')->with(compact('legajos','active'));
    }
}
