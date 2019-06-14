<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue006;
Use App\Sue007;


class CategoriasController extends Controller
{

	// Indice inicial de CRUD Centros de costo
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue006::first();
            }
        else
            {
                $legajo = Sue006::find($id);

                if ($legajo == null)
                    $legajo = Sue006::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue006;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 13;

        $convenios  = Sue007::orderBy('detalle')->get();

        return view('categorias.index')->with(compact('legajo','agregar','edicion','active','convenios'));
    }


    public function add()
    {
        $legajo = new Sue006;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 13;

        $convenios  = Sue007::orderBy('detalle')->get();

        return view('categorias.index')->with(compact('legajo','agregar','edicion','active','convenios'));
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
            'codigo'=>'required|unique:sue006s',
            'detalle'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue006();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->hsnormal = $request->input('hsnormal');
        $legajo->hsmin = $request->input('hsmin');
        $legajo->hsmax = $request->input('hsmax');
        $legajo->cod_conve = $request->input('cod_conve');


        $legajo->save();   // INSERT INTO - SQL

        return redirect('/categorias/' . $legajo->id);
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue006::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 13;

        $convenios  = Sue007::orderBy('detalle')->get();

        return view('categorias.index')->with(compact('legajo','agregar','edicion','active','convenios'));    // Abrir form de modificacion
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
        $legajo = Sue006::find($id);

        $legajo->update($request->all());
        $legajo->cod_conve = $request->input('cod_conve');

        // dd($legajo->cod_centro);

        return redirect("/categorias/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue006::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 13;

        $legajo->delete();

        return redirect("/categorias/");
    }


    public function search(Request $request)
    {
        $active = 12;
        $legajos = Sue006::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('categorias.search')->with(compact('legajos','active','name'));
    }
}
