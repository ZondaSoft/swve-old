<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Sue044;

class FeriadosController extends Controller
{
    //
    public function index($id = 0)
    {
        if ($id == null)
            {
                $legajo = Sue044::first();
            }
        else
            {
                $legajo = Sue044::find($id);

                if ($legajo == null)
                    $legajo = Sue044::first();
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue044;

        $legajo->fecha = Carbon::parse($legajo->fecha)->format('d/m/Y');
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = False;
        $active = 9;

        return view('feriados.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function add($id = 0)
    {
        $legajo = new Sue044;      // find($id);     // dd($legajo);

        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        //$legajo->fecha = '';  // Carbon::parse($legajo->fecha)->format('d/m/Y');
        $active  = 9;

        return view('feriados.index')->with(compact('legajo','agregar','edicion','active'));
    }


    public function retorno()
    {
    	$legajo = Sue044::first();

    	if ($legajo == null)
            $legajo = new Sue044;

        $legajo->start = $legajo->fecha;
        $legajo->title = $legajo->detalle;
        $legajo->backgroundColor = '#f56954'; //red
        $legajo->borderColor = '#f56954'; //red

        unset($legajo->id);
        unset($legajo->fecha);
        unset($legajo->detalle);
        unset($legajo->nac_prov);
        unset($legajo->created_at);
        unset($legajo->updated_at);

        return $legajo;
    }



    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'fecha.required'=>'La fecha es obligatoria',
            'fecha.unique'=>'La fecha ya existe',
            'fecha.date_format'=>'La fecha no está en el formato correcto d/m/a',
            'detalle.required'=>'La descripción es obligatoria'
            ];

        $rules = [
            'fecha'=>'date_format:"d/m/Y"|required|unique:sue044s',
            'detalle'=>'required'
            ];   // 'fecha'=>'required|date|unique:Sue044s',

        $this->validate($request, $rules, $messages);

        //dd('Validaciones ok');

        $date = str_replace('/', '-', $request->input('fecha'));
        $fecha = Carbon::createFromFormat("d-m-Y", $date);


        // Busqueda manual
        $dfecha = $fecha->day;
        $mfecha = $fecha->month;
        $yfecha = $fecha->year;

        if (Sue044::whereYear('fecha' , '=' , $yfecha)->count() > 0) {
        	if (Sue044::whereMonth('fecha' , '=' , $mfecha)->count() > 0) {
        		if (Sue044::whereDay('fecha' , '=' , $dfecha)->count() > 0) {
		        		// Validaciones
				        $messages = [
				            'fecha2.required'=>'La fecha ya existe'
				            ];

				        $rules = [
				            'fecha2'=>'required'
				            ];


				        $this->validate($request, $rules, $messages);
		        	}
        	}
        }

        $legajo = new Sue044();
        $date = str_replace('/', '-', $request->input('fecha'));
        $legajo->fecha = Carbon::createFromFormat("d-m-Y", $date);
        $legajo->detalle = $request->input('detalle');
        $legajo->nac_prov = $request->input('nac_prov');

        $legajo->save();   // INSERT INTO - SQL

	    return redirect('/feriados/'.$legajo->id);
    }



    public function edit($id = 0)
    {
        if ($id == 0) {
          return redirect('/feriados');
        }

        $legajo = Sue044::find($id);

        if ($legajo == null)
              $legajo = new Sue044;

        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 9;

        $legajo->fecha = Carbon::parse($legajo->fecha)->format('d/m/Y');

        return view('feriados.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
    }


    public function update(Request $request, $id)
    {
        // Validaciones
        $messages = [
            'detalle.required'=>'La descripción es obligatoria'
            ];

        $rules = [
            'detalle'=>'required'
            ];


        $this->validate($request, $rules, $messages);

        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Sue044::find($id);
       	//$date = str_replace('/', '-', $request->input('fecha'));
       	//$legajo->fecha = Carbon::createFromFormat("d-m-Y", $date);
        $legajo->detalle = $request->input('detalle');
        $legajo->nac_prov = $request->input('nac_prov');

        $legajo->update($request->all());

        return redirect("/feriados/{$id}");
    }



    public function delete($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue044::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 3;

        $legajo->delete();

        return redirect("/feriados/");
    }



    public function search(Request $request)
    {
        $active = 9;

        $legajos = Sue044::name($request->get('name'))->orderBy('fecha')->paginate(8);
        $name = $request->get('name');

        return view('feriados.search')->with(compact('legajos','active','name'));
    }
}
