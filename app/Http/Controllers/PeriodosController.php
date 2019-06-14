<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sue071;


class PeriodosController extends Controller
{


    // Indice inicial de CRUD Centros de costo
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue071::latest()->first();
            }
        else
            {
                $legajo = Sue071::find($id);

                if ($legajo == null)
                    $legajo = Sue071::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue071;

        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 23;

        if ($legajo->desde == null) {
            $legajo->desde = '  /  /    ' ;
          }
        else  {
            $legajo->desde = Carbon::parse($legajo->desde)->format('d/m/Y');
        }

        if ($legajo->hasta == null) {
              $legajo->hasta = '  /  /    ' ;
          }
        else  {
            $legajo->hasta = Carbon::parse($legajo->hasta)->format('d/m/Y');
        }


        if ($legajo->quincena == null) {
              $legajo->quincena = '  /  /    ' ;
          }
        else  {
            $legajo->quincena = Carbon::parse($legajo->quincena)->format('d/m/Y');
        }

        return view('periodos.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add()
    {
        $legajo = new Sue071;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 23;

        return view('periodos.index')->with(compact('legajo','agregar','edicion','active'));
    }



    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'periodo.required'=>'El período es obligatorio',
            'periodo.unique'=>'El período ya existe',
            'detalle.required'=>'La descripción es obligatoria',
            'detalle.min'=>'La descripción debe tener más de 2 letras',
            'desde.required'=>'La fecha de inicio es obligatoria',
            'hasta.after'=>'La fecha final debe ser mayor a la de inicio',
            'hasta.required'=>'La fecha final es obligatoria',
            'quincena.required'=>'La fecha de corte de la quincena es obligatoria',
            'quincena.after'=>'La fecha de corte de la quincena debe ser posterior a la fecha de inicio',
            'quincena.before'=>'La fecha de corte de la quincena debe ser anterior a la fecha final',
            ];

        $rules = [
            'periodo'=>'required|unique:sue071s',
            'detalle'=>'required|min:2',
            'desde'=>'required',
            'hasta'=> 'required|date_format:d/m/Y|after:desde',
            'quincena'=> 'required|date_format:d/m/Y|after:desde|before:hasta'
            ];



        $this->validate($request, $rules, $messages);

        $legajo = new Sue071();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->periodo = $request->input('periodo');
        $legajo->detalle = $request->input('detalle');

        $date = str_replace('/', '-', $request->input('desde'));
        $legajo->desde = Carbon::createFromFormat("d-m-Y", $date);

        $date = str_replace('/', '-', $request->input('hasta'));
        $legajo->hasta = Carbon::createFromFormat("d-m-Y", $date);

        $date = str_replace('/', '-', $request->input('quincena'));
        $legajo->quincena = Carbon::createFromFormat("d-m-Y", $date);
        //$legajo->quincena = Carbon::createFromFormat("d-m-Y", $quincena);

        $legajo->save();   // INSERT INTO - SQL

        return redirect('/periodos/' . $legajo->id);
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue071::find($id);

        $legajo->desde = Carbon::parse($legajo->desde)->format('d/m/Y');
        $legajo->hasta = Carbon::parse($legajo->hasta)->format('d/m/Y');
        $legajo->quincena = Carbon::parse($legajo->quincena)->format('d/m/Y');

        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 23;


        return view('periodos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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

        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Sue071::find($id);

        $date = str_replace('/', '-', $request->input('desde'));
        $legajo->desde = Carbon::createFromFormat("d-m-Y", $date);

        $date = str_replace('/', '-', $request->input('hasta'));
        $legajo->hasta = Carbon::createFromFormat("d-m-Y", $date);

        $date = str_replace('/', '-', $request->input('quincena'));
        $legajo->quincena = Carbon::createFromFormat("d-m-Y", $date);

        // Validacion de campos
        $this->validate($request, $rules, $messages);

        //$legajo->update($request->all());
        $legajo->update($request->only('periodo','detalle'));


        return redirect("/periodos/{$id}");
    }


    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue071::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 23;

        $legajo->delete();

        return redirect("/periodos/");
    }


    public function search(Request $request)
    {
        $active = 23;
        $legajos = Sue071::paginate(8);

        return view('periodos.search')->with(compact('legajos','active'));
    }


    public function search2(Request $request, $id)
    {
        $active = 23;
        $legajos = Sue071::paginate(8);

        return view('periodos.search2')->with(compact('legajos','active', 'id'));
    }




    public function activar(Request $request, $id)
    {
        $affectedRows = Sue071::where('id', '>', 0)->update(array('activo' => ''));

        // return "Mostrar form de edit $id";
        $legajo = Sue071::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 23;

        $legajo->activo = "Si";

        $legajo->update($request->only('activo'));

        return redirect("/periodos/$id");
    }

}
