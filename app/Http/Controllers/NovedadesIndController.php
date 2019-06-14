<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sue001;
use App\Sue011;
use App\Sue028;

class NovedadesIndController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        if ($id == null)
            {
                $legajo = Sue001::first();      // find($id);     // dd($legajo);
                $id = $legajo->id;
                // dd($legajo);
            }
        else
            {
                $legajo = Sue001::find($id);

                if ($legajo == null)
                    $legajo = Sue001::first();      // find($id);     // dd($legajo);   // $legajo = new Sue001;
            }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Sue001;

        // Si la var. $direction muestra que el cursor se mueve (-1)
        if ($direction == -1) {
            $legajo = Sue001::where('id', '<', $id)
                ->orderBy('id', 'desc')
                ->first();

            if ($legajo == null)
                $legajo = Sue001::first();
        }

        // Si la var. $direction muestra que el cursor se mueve (+1)
        if ($direction == 1) {
            $legajo = Sue001::where('id', '>', $id)->first();

            if ($legajo == null)
                $legajo = Sue001::latest('id')->first();
        }


        // Si la var. $direction muestra que el cursor se mueve al final
        if ($direction == 9) {
            $legajo = Sue001::latest('id')->first();
        }

        //$tasks = Sue028::all();
        $legajoNew = new Sue028;
        $tasks = Sue028::where('legajo', $legajo->codigo)->get();
        $novedades = $tasks;
        $novedades->hasta = '';

        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 24;
        $legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        $legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        // Combos de tablas anexas
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('novedadesind.index')->with(compact('legajoNew','novedades', 'tasks','legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas','obras','sindicatos','convenios','contratos'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $legajo = new Sue001;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 24;
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('novedadesind.index')->with(compact('legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas','obras','sindicatos','convenios','contratos'));
    }


    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'codigo.required'=>'El Nro. de legajo es obligatorio',
            'codigo.unique'=>'El Nro. de legajo ya existe',
            'detalle.required'=>'El apellido es obligatorio',
            'detalle.min'=>'El apellido debe tener más de 2 letras',
            'nombres.required'=>'El/Los nombres son obligatorios',
            'alta.required'=>'La fecha de alta es obligatoria',
            'fecha_naci.required'=>'La fecha de nacimiento es obligatoria'
            ];

        $rules = [
            'codigo'=>'required|unique:sue001s',
            'detalle'=>'required|min:2',
            'nombres'=>'required',
            'alta'=>'required',
            'fecha_naci'=>'required'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Sue001();
        //$request->all();
        //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->nombres = $request->input('nombres');
        $legajo->cuil = $request->input('cuil');
        $legajo->domici = $request->input('domici');
        $legajo->nro = $request->input('nro');
        $legajo->piso = $request->input('piso');
        $legajo->dpto = $request->input('dpto');
        $legajo->locali = $request->input('locali');
        $legajo->provin = $request->input('provin');
        $legajo->cod_pos = $request->input('cod_pos');
        $legajo->cod_centro = $request->input('cod_centro');

        $date = str_replace('/', '-', $request->input('fecha_naci'));
        $legajo->fecha_naci = Carbon::createFromFormat("d-m-Y", $date);

        $alta = str_replace('/', '-', $request->input('alta'));
        $legajo->alta = Carbon::createFromFormat("d-m-Y", $alta);

        $legajo->save();   // INSERT INTO - SQL

        if ($legajo->codigo > 0)
            return redirect('/novedadesind');
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Sue001::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 24;

        $legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        $legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('novedadesind.index')->with(compact('legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas', 'obras','sindicatos','convenios','contratos'));    // Abrir form de modificacion
    }


    public function update(Request $request, $id)
    {
        // Validaciones
        $messages = [
            'detalle.required'=>'El apellido es obligatorio',
            'detalle.min'=>'El apellido debe tener más de 2 letras',
            'nombres.required'=>'El/Los nombres son obligatorios',
            'alta.required'=>'La fecha de alta es obligatoria',
            'fecha_naci.required'=>'La fecha de nacimiento es obligatoria'
            ];

        $rules = [
            'detalle'=>'required|min:2',
            'nombres'=>'required',
            'alta'=>'required',
            'fecha_naci'=>'required'
            ];


        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Sue001::find($id);

        $legajo->cod_centro = $request->input('cod_centro');
        $legajo->cod_jerarq = $request->input('cod_jerarq');
        $legajo->cod_categ = $request->input('cod_categ');
        $legajo->codsector = $request->input('codsector');
        $legajo->funcion = $request->input('funcion');
        $legajo->cuadrilla = $request->input('cuadrilla');
        $legajo->cod_obsoc = $request->input('cod_obsoc');
        $legajo->cod_sindic = $request->input('cod_sindic');
        $legajo->convenio = $request->input('convenio');
        $legajo->cod_contra = $request->input('cod_contra');
        $legajo->fecha_vto = $request->input('fecha_vto');
        $legajo->situacion = $request->input('situacion');
        $legajo->preg1 = $request->input('preg1');
        $legajo->preg2 = $request->input('preg2');
        $legajo->deta2 = $request->input('deta2');
        $legajo->preg3 = $request->input('preg3');
        $legajo->deta3 = $request->input('deta3');
        $legajo->deta4 = $request->input('deta4');   // date
        $legajo->preg5 = $request->input('preg5');
        $legajo->preg6 = $request->input('preg6');
        $legajo->preg7 = $request->input('preg7');
        $legajo->reloj_usa = $request->input('reloj_usa');
        $legajo->reloj_ignora = $request->input('reloj_ignora');
        $legajo->pago_asist = $request->input('pago_asist');
        $legajo->cod_fichad = $request->input('cod_fichad');
        $legajo->formap = $request->input('formap');
        $legajo->banco = $request->input('banco');
        $legajo->sucursal = $request->input('sucursal');
        $legajo->cuenta = $request->input('cuenta');
        $legajo->cbu = $request->input('cbu');

        $date = str_replace('/', '-', $request->input('fecha_naci'));
        $legajo->fecha_naci = Carbon::createFromFormat("d-m-Y", $date);

        $alta = str_replace('/', '-', $request->input('alta'));
        $legajo->alta = Carbon::createFromFormat("d-m-Y", $alta);
        //$request->alta = $legajo->alta;

        // Validacion de campos
        $this->validate($request, $rules, $messages);


        $legajo->update($request->only('detalle','nombres','cuil','domici','nro','piso','dpto','locali','provin','cod_pos','telef','condicion','convenio','situacion','forma_pago','est_civil','salud','incap','nacionali','fecha','cod_centro','cod_jerarq','cod_categ','codsector','funcion'));

        // dd($legajo->cod_centro);

        return redirect('/novedadesind');
    }


    public function search(Request $request, $id = 0)
    {
        $active = 24;
        $name = $request->get('name');
        $legajos = Sue001::orderBy('codigo')->paginate(8);

        return view('novedadesind.search')->with(compact('legajos', 'name', 'active'));
    }


    public function loadNovedades(Request $request, $id = 0)
    {
        return;
    }


    public function delete(Request $request, $id)
    {
        $legajo = Sue028::find($id);

        $legajo->delete();

        return redirect('/novedadesind');
    }


    public function test()
    {
        return view('test');
    }
}
