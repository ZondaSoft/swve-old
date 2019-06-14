<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue107;

class ModalidadesController extends Controller
{

    // Indice inicial de CRUD de codigos de novedades
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue107::first();
            }
        else
            {
                $legajo = Sue107::find($id);

                if ($legajo == null)
                    $legajo = Sue107::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue107;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 11;

        return view('modalidades.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Sue107;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 11;

        return view('modalidades.index')->with(compact('legajo','agregar','edicion','active'));
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
            'codigo'=>'required|unique:Sue107s',
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue107();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');

        $legajo->save();   // INSERT INTO - SQL

        return redirect('/modalidades');
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue107::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 11;

        return view('modalidades.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
        $legajo = Sue107::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/modalidades/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue107::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 11;

        $legajo->delete();

        return redirect("/modalidades/");
    }


    public function search(Request $request)
    {
        $active = 11;
        $legajos = Sue107::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('modalidades.search')->with(compact('legajos','active','name'));
    }


}
