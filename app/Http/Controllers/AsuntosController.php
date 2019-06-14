<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sue075;

class AsuntosController extends Controller
{
  // Indice inicial de CRUD Centros de costo
  public function index($id = 0)
  {
      if ($id == null)
          {
              $legajo = Sue075::first();
          }
      else
          {
              $legajo = Sue075::find($id);

              if ($legajo == null)
                  $legajo = Sue075::first();
          }

      // Si a pesar de todos los controles $legajo es null es porque no hay registros
      if ($legajo == null)
          $legajo = new Sue075;

      $edicion = False;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $agregar = False;
      $active = 20;

      return view('asuntos.index')->with(compact('legajo','agregar','edicion','active'));
  }


  public function add()
  {
      $legajo = new Sue075;      // find($id);     // dd($legajo);
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $agregar = True;
      $active = 20;

      return view('asuntos.index')->with(compact('legajo','agregar','edicion','active'));
  }



  public function store(Request $request)
  {
      // Validaciones
      $messages = [
          'id.required'=>'El código es obligatorio',
          'id.unique'=>'El código ya existe',
          'detalle.required'=>'La descripción es obligatoria',
          'detalle.min'=>'La descripción debe tener más de 2 letras'
          ];

      $rules = [
          'id'=>'required|unique:sue075s',
          'detalle'=>'required|min:2'
          ];

      $this->validate($request, $rules, $messages);

      $legajo = new Sue075();
      //$request->all();
      //$legajo = Sue001::create($request->all()); // massives assignments : all() -> onLy() // only('name','description')

      $legajo->id = $request->input('id');
      $legajo->detalle = $request->input('detalle');

      $legajo->save();   // INSERT INTO - SQL

      return redirect('/asuntos/' . $legajo->id);
  }


  public function edit($id)
  {
      // return "Mostrar form de edit $id";
      $legajo = Sue075::find($id);
      $agregar = False;
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $active = 20;

      return view('asuntos.index')->with(compact('legajo','agregar','edicion','active'));    // Abrir form de modificacion
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
      $legajo = Sue075::find($id);

      $legajo->update($request->all());

      // dd($legajo->cod_centro);

      return redirect("/asuntos/{$id}");
  }


  public function delete($id)
  {
      // return "Mostrar form de edit $id";
      $legajo = Sue075::find($id);
      $agregar = False;
      $edicion = True;    // True: Muestra botones Grabar - Cancelar   //  False: Muestra botones: Agregar, Editar, Borrar
      $active = 20;

      $legajo->delete();

      return redirect("/asuntos/");
  }



  public function search(Request $request)
  {
      $active = 20;

      $legajos = Sue075::name($request->get('name'))->orderBy('id')->paginate(8);
      $name = $request->get('name');

      return view('asuntos.search')->with(compact('legajos','active','name'));
  }
}
