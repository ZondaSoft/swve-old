<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\LegajoExiste;
use Carbon\Carbon;
use App\Sue001;
use App\Sue011;
use App\Sue071;
use App\Sue028;

class NovedadeslistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null, $direction = null)
    {
        $legajoNew = new Sue028;
        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 26;

        //if ($nrolegajo != null) {
        //  $legajoNew->legajo = $id;
        // Busco el legajo seleccionado
        //  $legajoNew->detalle = $legajoNew->Apynom;
        //}
        //$legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        //$legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        if ($id == null) {
            $periodo = Sue071::where('activo','Si')->first();

            if ($periodo != null) {
                $id = $periodo->id;
            }
        } else  {
            $periodo = Sue071::where('id',$id)->first();

            if ($periodo == null) {
                $periodo = Sue071::where('activo','Si')->first();

                if ($periodo != null) {
                    $id = $periodo->id;
                }
            }
        }

        // Si la var. $direction muestra que el cursor se mueve (-1)
        if ($id != null) {
            if ($direction == -1) {
                $periodo = Sue071::where('id', '<', $id)
                    ->orderBy('id', 'desc')
                    ->first();

                if ($periodo == null)
                    $periodo = Sue071::first();
            }

            // Si la var. $direction muestra que el cursor se mueve (+1)
            if ($direction == 1) {
                $periodo = Sue071::where('id', '>', $id)->first();

                if ($periodo == null)
                    $periodo = Sue071::latest('id')->first();
            }
        }

        if ($periodo != null) {
            $periodo2 = substr($periodo->periodo,3,4) . substr($periodo->periodo,0,2);

            $novedades = Sue028::orderBy('fecha')->where('periodo',$periodo2)->paginate(9);

            $novedades->periodo = $periodo->periodo;
        } else  {
            $novedades = Sue028::orderBy('fecha')->where('id',0)->paginate(9);

            $novedades->periodo = "  /    ";
        }

        // Combos de tablas anexas
        $legajos   = Sue001::orderBy('codigo')->get();
        $sectores  = Sue011::orderBy('detalle')->get();

        return view('novedadeslist.index')->with(compact('legajo','legajoNew','agregar','edicion','active','sectores','novedades','periodo','legajos'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $legajo = new Sue028;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 26;
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('novedadesind.index')->with(compact('legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas','obras','sindicatos','convenios','contratos'));
    }


    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'legajo.required'=>'El Nro. de legajo es obligatorio',
            'cod_nov.required'=>'El apellido es obligatorio',
            'fecha.required'=>'La fecha es obligatoria'
            ];

        $rules = [
            'codigo'=>'required',
            'cod_nov'=>'required',
            'fecha'=>'required'
            ];

        //$this->validate($request, $rules, $messages);

        $request->validate([
            'legajo' => ['required', 'integer', new LegajoExiste],
        ]);


        $legajo = new Sue028();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->legajo = $request->input('legajo');
        $legajo->cod_nov = $request->input('cod_nov');
        $date = str_replace('/', '-', $request->input('fecha'));
        $legajo->fecha = Carbon::createFromFormat("d-m-Y", $date);
        $legajo->cantidad = $request->input('cantidad');
        $legajo->comenta1 = $request->input('comenta1');

        $legajo->save();   // INSERT INTO - SQL

        if ($legajo->codigo > 0)
            return redirect('/novedadeslist');

        return redirect('/novedadeslist');
    }


    public function edit($id, $page = 1)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue028::find($id);

        $legajo->detalle = $legajo->Apynom;
        $legajo->novedad2 = $legajo->CodNovName;

        // Contar dias
        $cDate = Carbon::parse($legajo->fecha);
        $fechaEmision = $cDate;
        if ($legajo->hasta != null) {
            $fechaExpiracion = $legajo->hasta;
        } else {
            $fechaExpiracion = $fechaEmision;
        }
        $legajo->dias = $fechaExpiracion->diffInDays($fechaEmision);
        $legajo->dias++;

        $legajo->fecha = Carbon::parse($fechaEmision)->format('d/m/Y');
        $legajo->hasta = Carbon::parse($fechaExpiracion)->format('d/m/Y');
        $legajo->concepto = "     ";

        $images = null;

        return $legajo;
    }


    public function update(Request $request, $id)
    {
        // Validaciones
        if ($request->input('btngrabar') == 'grabar') {
            $messages = [
                'cantidadEdit.required'=>'La cantidad es obligatoria'
                ];

            $rules = [
                'cantidadEdit'=>'required'
                ];

            //$request->alta = $legajo->alta;
            // Validacion de campos
            $this->validate($request, $rules, $messages);
        }


        $id = $request->input('nid');

        $legajo = Sue028::find($id);
        //$legajo->legajo = $request->input('legajoEdit');
        //$legajo->cod_nov = $request->input('cod_novEdit');
        //$date = str_replace('/', '-', $request->input('fechaEdit'));
        //$legajo->fecha = Carbon::createFromFormat("d-m-Y", $date);
        $legajo->cantidad = $request->input('cantidadEdit');
        $legajo->comenta1 = $request->input('comenta1Edit');

        //dd($id);

        if ($request->input('btngrabar') == 'grabar') {
            $legajo->update($request->only('cantidad','comenta1'));
        } else {
            // Pido confirmar el Borrado
            $showDialog = true;

            return redirect()->back()->with('alert', 'Deleted!')
                                     ->with('id', $id);
        }

        // dd($legajo->cod_centro);

        return redirect('/novedadeslist');
    }

    public function delete($id, $page = 1)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue028::find($id);

        $images = null;

        return "false";
        /*if ($legajo != null) {
            $images = $legajo->images()->get();
        }

        if ($images == null) {
            //$legajo->delete();
            return "false";
        }
        else {
            if ($images->count() == 0) {
                //$legajo->delete();
                return "false";
            }
        }
        */


        $pedidos  = Sue028::orderBy('id')->paginate(5);
        // $legajos = Sue001::paginate(5);

        $agregar = True;
        $edicion = False;
        $active = 26;
        $exibirmodal = true;

        //return view('preocupacional.navigate')->with(compact('pedidos','agregar','edicion','active','exibirmodal'));
        //return Redirect::to('preocupacional')->with('pedidos','agregar','edicion','active','exibirmodal');
        // no funca : return redirect()->back()->with('exibirmodal', true);
        //return "true";
        return "{\"result\":\"ok\",\"id\":\"$legajo->id\"}";
    }


    public function delete_drop($id, $page = 1)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue028::find($id);

        $images = null;

        /*if ($legajo != null) {
            $images = $legajo->images()->get();
        }

        if ($images == null) {
            $legajo->delete();
            //return redirect('/preocupacional');
            return "false";
        }
        else {
            if ($images->count() == 0) {
                $legajo->delete();
                //return redirect('/preocupacional');
                //return back();
                return "false";
            }
        }
        */

        $legajo = Sue028::find($id);

        $legajo->delete();

        $pedidos  = Sue028::orderBy('id')->paginate(5);
        // $legajos = Sue001::paginate(5);

        $agregar = True;
        $edicion = False;
        $active = 26;
        $exibirmodal = true;

        //return view('preocupacional.navigate')->with(compact('pedidos','agregar','edicion','active','exibirmodal'));
        //return Redirect::to('preocupacional')->with('pedidos','agregar','edicion','active','exibirmodal');
        // no funca : return redirect()->back()->with('exibirmodal', true);
        //return "true";
        return "{\"result\":\"ok\",\"id\":\"$legajo->id\"}";

    }

    public function search(Request $request)
    {
        $active = 26;
        $legajos = Sue001::paginate(5);

        return view('novedadesind.search')->with(compact('legajos','active'));
    }


    public function search2(Request $request)
    {
        $active = 24;
        $legajos = Sue001::orderBy('codigo')->paginate(8);

        return view('search2')->with(compact('legajos','active'));
    }

    public function search3(Request $request)
    {
        $active = 24;
        $legajos = Sue071::orderBy('codigo')->paginate(8);

        return view('novedadeslist.search')->with(compact('legajos','active'));
    }

    public function test()
    {
        return view('test');
    }
}
