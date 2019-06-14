<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Mdl015;

class ArtMedicosController extends Controller
{
    // Indice inicial de CRUD Centros de costo
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Mdl015::first();
            }
        else
            {
                $legajo = Mdl015::find($id);
                
                if ($legajo == null)
                    $legajo = Mdl015::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Mdl015;
        
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 19;

        return view('artmedicos.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Mdl015;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 19;

        return view('artmedicos.index')->with(compact('legajo','agregar','edicion','active'));
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
            'codigo'=>'required|unique:Mdl015s',
            'detalle'=>'required|min:2'
            ];
        
        $this->validate($request, $rules, $messages);

        $legajo = new Mdl015();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->comenta = $request->input('comenta');
        $legajo->dias = $request->input('dias');
        $legajo->total = True;
        $legajo->ocult_dias = True;
        
        $legajo->save();   // INSERT INTO - SQL

        return redirect('/artmedicos');
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Mdl015::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 19;

        return view('artmedicos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
        $legajo = Mdl015::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/artmedicos/{$id}");
    }
}