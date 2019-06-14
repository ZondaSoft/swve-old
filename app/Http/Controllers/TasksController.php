<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sue001;
use App\Sue011;
use App\Sue028 as Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
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


        $tasks = Task::all();

        $agregar = False;
        $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
        $active = 24;
        $legajo->fecha_naci = Carbon::parse($legajo->fecha_naci)->format('d/m/Y');
        $legajo->alta = Carbon::parse($legajo->alta)->format('d/m/Y');

        // Combos de tablas anexas
        $sectores   = Sue011::orderBy('detalle')->get();

        return view('tasks.index', compact('tasks','legajo','agregar','edicion','active'));

        //with(compact('legajo','agregar','edicion','active','sectores','ccostos','jerarquias','categorias','cuadrillas','obras','sindicatos','convenios','contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
