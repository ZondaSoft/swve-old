<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datoempr;



class EmpresaController extends Controller
{
    //
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Datoempr::first();
            }
        else
            {
                $legajo = Datoempr::find($id);
                
                if ($legajo == null)
                    $legajo = Datoempr::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Datoempr;
       	
        
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 8;

        return view('datosempresa.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add($id = 0)
    {
        $registros = Datoempr::count();

        // dd($registros);

        if ($registros==0) {
                # Si la tabla esta vacia agrego un registro
                $legajo = new Datoempr;      // find($id);     // dd($legajo);
                $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
                $agregar = True;
        }
        else {
                # Si hay un registro lo edito
                $legajo = Datoempr::all();
                $id = $legajo->last()->id;

                $legajo = Datoempr::find($id);

                $agregar = False;
                $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        }

        $active = 8;

        return view('datosempresa.index')->with(compact('legajo','agregar','edicion','active'));
    }



    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'razon.required'=>'La razón social es obligatoria',
            'nomcom.required'=>'La descripción es obligatoria',
            'nomcom.min'=>'La descripción debe tener más de 2 letras'
            ];

        $rules = [
            'razon'=>'required:Datoemprs',
            'nomcom'=>'required|min:2'
            ];
        
        $this->validate($request, $rules, $messages);

        $legajo = new Datoempr();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->razon = $request->input('razon');
        $legajo->nomcom = $request->input('nomcom');
        $legajo->domicilio = $request->input('domicilio');
        $legajo->localidad = $request->input('localidad');
        $legajo->provincia = $request->input('provincia');
        
        $legajo->save();   // INSERT INTO - SQL

        return redirect('/datosempresa');
    }

    public function update(Request $request, $id)
    {
        // Validaciones
        $messages = [
            'razon.required'=>'La razón social es obligatoria',
            'nomcom.required'=>'La descripción es obligatoria',
            'nomcom.min'=>'La descripción debe tener más de 2 letras'
            ];

        $rules = [
            'razon'=>'required:Datoemprs',
            'nomcom'=>'required|min:2'
            ];

        $this->validate($request, $rules, $messages);

        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Datoempr::find($id);

        $legajo->update($request->all());

        // dd($legajo->cod_centro);

        return redirect("/datosempresa/{$id}");
    }


    public function search(Request $request)
    {
        $active = 8;
        $legajos = Datoempr::paginate(8);

        return view('datosempresa.search')->with(compact('legajos','active'));
    }
}
