<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fza002;

class BancosController extends Controller
{
  // Indice inicial de CRUD Centros de costo
  public function index($id = 0)
  {
      if ($id == null)
          {
              $legajo = Fza002::first();
          }
      else
          {
              $legajo = Fza002::find($id);

              if ($legajo == null)
                  $legajo = Fza002::first();
          }

      // Si a pesar de todos los controles $legajo es null es porque no hay registros
      if ($legajo == null)
          $legajo = new Fza002;

      $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $agregar = False;
      $active = 22;

      return view('bancos.index')->with(compact('legajo','agregar','edicion','active'));
  }


  public function add()
  {
      $legajo = new Fza002;      // find($id);     // dd($legajo);
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $agregar = True;
      $active = 22;

      return view('bancos.index')->with(compact('legajo','agregar','edicion','active'));
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
          'codigo'=>'required|unique:fza002s',
          'detalle'=>'required|min:2'
          ];

      $this->validate($request, $rules, $messages);

      $legajo = new Fza002();
      //$request->all();
      //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

      $legajo->codigo = $request->input('codigo');
      $legajo->detalle = $request->input('detalle');

      $legajo->save();   // INSERT INTO - SQL

      return redirect('/bancos/' . $legajo->id);
  }


  public function edit($id)
  {
      // return "Mostrar form de edit $id";
      $legajo = Fza002::find($id);
      $agregar = False;
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $active = 22;

      return view('bancos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
      $legajo = Fza002::find($id);

      $legajo->update($request->all());

      // dd($legajo->cod_centro);

      return redirect("/bancos/{$id}");
  }


  public function delete($id)
  {
      // return "Mostrar form de edit $id";
      $legajo = Fza002::find($id);
      $agregar = False;
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $active = 22;

      $legajo->delete();

      return redirect("/bancos/");
  }



  public function search(Request $request)
  {
      $active = 22;

      $legajos = Fza002::name($request->get('name'))->orderBy('id')->paginate(8);
      $name = $request->get('name');

      return view('bancos.search')->with(compact('legajos','active','name'));
  }
}