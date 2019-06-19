<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Veh001;
use App\Veh002;
use App\Veh007;
use App\Veh010;

class BajasController extends Controller
{
    // Indice inicial de CRUD de Legajos de Baja
    public function index($id = null, $direction = null)
    {
        if ($id == null) {
              $legajo = Veh002::first();

        } else
        {
              $legajo = Veh002::find($id);

              if ($legajo == null)
                  $legajo = Veh002::first();
          }

        // Si a pesar de todos los controles $legajo es null es porque no hay registros
        if ($legajo == null)
            $legajo = new Veh002;

        $id = $legajo->id;

        // Si la var. $direction muestra que el cursor se mueve (-1)
        if ($direction == -1) {
            $legajo = Veh002::where('id', '<', $id)
                ->orderBy('id', 'desc')
                ->first();

            if ($legajo == null)
                $legajo = Veh002::first();
        }

        // Si la var. $direction muestra que el cursor se mueve (+1)
        if ($direction == 1) {
            $legajo = Veh002::where('id', '>', $id)->first();

            if ($legajo == null)
                $legajo = Veh002::latest('id')->first();
        }


        // Si la var. $direction muestra que el cursor se mueve al final
        if ($direction == 9) {
            $legajo = Veh002::latest('id')->first();
        }

        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 2;
        $legajo->f_alta = Carbon::parse($legajo->f_alta)->format('d/m/Y');

        // Combos de tablas anexas
        $novedades   = Veh010::orderBy('detalle')->paginate(8);
        $tipos      = Veh007::orderBy('codigo')->get();

        return view('bajas.index')->with(compact('legajo','agregar','edicion','tipos','active','novedades'));;
    }



    public function add()
    {
        $legajo = new Veh002;      // find($id);     // dd($legajo);
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $agregar = True;
        $active = 1;

        $novedades = Veh010::orderBy('detalle')->paginate(8);
        $siniestros = Veh010::orderBy('detalle')->where('tipo','Siniestros')->paginate(8);
        $tipos  = Veh007::orderBy('detalle')->get();

        return view('bajas.index')->with(compact('legajo','agregar','edicion','active','tipos','novedades','siniestros'));
    }


    public function store(Request $request)
    {
        // Validaciones
        $messages = [
            'dominio.required'=>'El Dominio es obligatorio',
            'dominio.unique'=>'El Dominio ya existe',
            'codigo.required'=>'El Nro. de legajo es obligatorio',
            'codigo.unique'=>'El Nro. de legajo ya existe',
            'detalle.required'=>'El detalle del vehiculo es obligatorio',
            'detalle.min'=>'El detalle debe tener más de 2 letras',
            'f_alta.required'=>'La fecha de alta es obligatoria'
            ];

        $rules = [
            'dominio'=>'required|unique:veh001s',
            'codigo'=>'required|unique:veh001s',
            'detalle'=>'required|min:2',
            'f_alta'=>'required'
            ];

        $this->validate($request, $rules, $messages);

        $legajo = new Veh002();
        //$request->all();
        //$legajo = Veh001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

        $legajo->dominio = $request->input('dominio');
        $legajo->codigo = $request->input('codigo');
        $legajo->detalle = $request->input('detalle');
        $legajo->modelo= $request->input('modelo');
        $legajo->grupo = $request->input('grupo');
        $legajo->anio = $request->input('anio');
        $legajo->motor = $request->input('motor');
        $legajo->chasis = $request->input('chasis');
        $legajo->estado = $request->input('estado');
        $legajo->equipo = $request->input('equipo');
        $legajo->modelo_eq = $request->input('modelo_eq');

        $f_alta = str_replace('/', '-', $request->input('f_alta'));
        $legajo->f_alta = Carbon::createFromFormat("d-m-Y", $f_alta);

        $legajo->save();   // INSERT INTO - SQL

        if ($legajo->codigo > 0)
            return redirect('/bajas');
    }


    public function edit($id)
    {
        // return "Mostrar form de edit $id";
        $legajo = Veh002::find($id);
        $agregar = False;
        $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 1;

        $legajo->f_alta = Carbon::parse($legajo->f_alta)->format('d/m/Y');

        $novedades = Veh010::orderBy('detalle')->paginate(8);
        $siniestros = Veh010::orderBy('detalle')->where('tipo','Siniestros')->paginate(8);
        $tipos  = Veh007::orderBy('detalle')->get();

        return view('bajas.index')->with(compact('legajo','agregar','edicion','active','tipos','novedades','siniestros'));    // Abrir form de modificacion
    }


    public function update(Request $request, $id)
    {
        // Validaciones
        $messages = [
            'detalle.required'=>'El apellido es obligatorio',
            'detalle.min'=>'El apellido debe tener más de 2 letras',
            'f_alta.required'=>'La fecha de alta es obligatoria'
            ];

        $rules = [
            'detalle'=>'required|min:2',
            'f_alta'=>'required'
            ];


        // Grabar en bbdd los cambios del form de alta
        // dd($request->all());
        $legajo = Veh002::find($id);

        $legajo->modelo = $request->input('modelo');
        $legajo->grupo = $request->input('grupo');
        $legajo->modelo = $request->input('modelo');
        $legajo->motor = $request->input('motor');
        $legajo->chasis = $request->input('chasis');
        $legajo->estado = $request->input('estado');
        $legajo->equipo = $request->input('equipo');
        $legajo->modelo_eq = $request->input('modelo_eq');
        $legajo->inscripto = $request->input('inscripto');
        $f_alta = str_replace('/', '-', $request->input('f_alta'));

        if ($f_alta != "") {
            $legajo->f_alta = Carbon::createFromFormat("d-m-Y", $f_alta);
        } else {
            $legajo->f_alta = null;
        }

        //$request->alta = $legajo->alta;

        // Validacion de campos
        $this->validate($request, $rules, $messages);


        $legajo->update($request->only('detalle','nombres','cuil','domici','nro','piso','dpto','locali','provin','cod_pos','telef','condicion','convenio','situacion','forma_pago','est_civil','salud','incap','nacionali','fecha','cod_centro','cod_jerarq','cod_categ','codsector','funcion'));

        // dd($legajo->cod_centro);

        return redirect('/bajas');
    }

    public function search(Request $request)
    {
        $active = 2;
        //$legajos = Sue001::paginate(5);
        $legajos = Veh002::name($request->get('name'))->orderBy('codigo')->paginate(8);
        $name = $request->get('name');

        return view('bajas.search')->with(compact('legajos','active','name'));
    }
}
