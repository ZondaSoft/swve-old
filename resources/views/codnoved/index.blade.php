<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/codnoved/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/codnoved/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/codnoved/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-7">Códigos de novedades
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>


           <a href="{{ url('/codnoved') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/codnoved/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/codnoved/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/codnoved/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
      @endif
    </div>
</div>

<div class="col-md-12">

  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif

  <div class="card mb-3 border-danger">
    <div class="card-header text-white bg-danger">Datos personales</div>
     <div class="row">
        <div class="card-body">
            <div class="col-xl-10 col-md-10">
                  <div class="col-md-10">
                    <div class="form-row">
                        <div class="col-lg-2 mb-2">
                            <label class="col-form-label">Código *</label>
                            <input class="form-control"
                              type="text" name="codigo" id="codigo"
                              {{ $edicion?'':'disabled' }}
                              {{ $agregar?'enabled autofocus=""':'disabled' }}
                              value="{{ old('codigo',$legajo?$legajo->codigo:'') }}" maxlength="6" required>
                        </div>
                   </div>
                </div>

                <div class="col-xl-12 col-md-12">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Descripción *</label>
                          <input class="form-control" type="text" name="detalle" id="detalle"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('detalle',$legajo->detalle) }}" >

                          @if ($errors->has('detalle'))
                              <div class="alert alert-danger">
                                  <ul>
                                      <li>{{ $errors->first('detalle') }}</li>
                                  </ul>
                              </div>
                          @endif
                        </div>


                      </div>
                  </div>

                <div class="col-md-4">
                    <label class="col-form-label">Código corto *</label>
                    <div class="col-md-3" style="padding-left: 0px">
                      <input class="form-control" type="text" name="codigo2" id="codigo2"
                      {{ $edicion?'enabled':'disabled' }}
                      value="{{ $legajo->codigo2 }}" maxlength="2" autocomplete='off' required>
                    </div>
                </div>

                <fieldset></fieldset>

                <div class="col-md-10">
                     <div class="form-row">
                          <div class="col-lg-3 mb-3" style="padding-top: 4px">
                              <label class="checkbox c-checkbox c-checkbox-rounded">
                              <input id="roundedcheckbox10" type="checkbox" checked
                              {{ $edicion?'enabled':'disabled' }}>
                              <span class="fa fa-check"></span>Aplicar tope máximo ?</label>
                          </div>

                          <fieldset></fieldset>


                          <div class="col-lg-1 mb-1">
                              <input class="form-control" type="text" name="cuil"
                              {{ $edicion?'enabled':'disabled' }}
                              {{ $agregar?'autofocus=""':'autofocus=""' }}
                              value="{{ old('cuil',$legajo->cuil) }}" maxlength="2" autocomplete='off'autofocus="">
                          </div>
                     </div>
                 </div>

                 <fieldset></fieldset>


                 <div class="col-xl-12 col-md-12">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Tipo de novedad</label>

                          <select class="form-control" id="provin" name="provin" {{ $edicion?'enabled':'disabled' }} autocomplete=''>
                            <option value="Hs/Dias normales" @if ($legajo->provin == "Hs/Dias normales")  selected   @endif  >Hs/Dias normales</option>
                            <option value="Día/Jornada de descanzo" @if ($legajo->provin == "Día/Jornada de descanzo")  selected   @endif  >Día/Jornada de descanzo</option>

                            <option value="Ausencias Justificadas" @if ($legajo->provin == "Ausencias Justificadas")  selected   @endif  >Ausencias Justificadas</option>

                            <option value="Ausencias Injustificadas" @if ($legajo->provin == "Ausencias Injustificadas")  selected   @endif  >Ausencias Injustificadas</option>

                            <option value="Sanciones" @if ($legajo->provin == "Sanciones") selected @endif  >Sanciones</option>

                            <option value="Vacaciones" @if ($legajo->provin == "Vacaciones") selected  @endif  >Vacaciones</option>

                            <option value="Accidentes" @if ($legajo->provin == "Accidentes") selected  @endif  >Accidentes</option>

                            <option value="Enfermedades" @if ($legajo->provin == "Enfermedades") selected  @endif  >Enfermedades</option>

                            <option value="Licencias" @if ($legajo->provin == "Licencias") selected  @endif  >Licencias</option>

                            <option value="Apercibimientos" @if ($legajo->provin == "Apercibimientos") selected @endif>  Apercibimientos</option>

                            <option value="Suspensiones" @if ($legajo->provin == "Suspensiones")  selected  @endif>Suspensiones</option>

                            <option value="Descanzos compensatorios" @if ($legajo->provin == "Descanzos compensatorios")  selected  @endif>Descanzos compensatorios</option>

                            <option value="Horas Extras 50%" @if ($legajo->provin == "Horas Extras 50%") selected @endif>Horas Extras 50%</option>

                            <option value="Horas Extras 100%" @if ($legajo->provin == "Horas Extras 100%") selected @endif>Horas Extras 100%</option>

                            <option value="Feriados Trabajados" @if ($legajo->provin == "Feriados Trabajados") selected @endif>Feriados Trabajados</option>

                            <option value="Tareas Adicionales" @if ($legajo->provin == "Tareas Adicionales") selected @endif>Tareas Adicionales</option>

                            <option value="Bajas" @if ($legajo->provin == "Bajas") selected @endif>Bajas</option>

                            <option value="Guardas de Puesto" @if ($legajo->provin == "Guardas de Puesto") selected @endif>Guardas de Puesto</option>

                            <option value="Jornada doble de trabajo" @if ($legajo->provin == "Jornada doble de trabajo") selected @endif>Jornada doble de trabajo</option>

                            <option value="Jornada doble de trabajo (c/cambio)" @if ($legajo->provin == "Jornada doble de trabajo (c/cambio)") selected @endif>Jornada doble de trabajo (c/cambio)</option>

                            <option value="Jornada doble de trabajo (Domingo)" @if ($legajo->provin == "Jornada doble de trabajo (Domingo)") selected @endif>Jornada doble de trabajo (Domingo)</option>

                            <option value="Franco compensatorio" @if ($legajo->provin == "Franco compensatorio") selected @endif>Franco compensatorio</option>

                            <option value="Franco compensatorio (c/cambio)" @if ($legajo->provin == "Franco compensatorio (c/cambio)") selected @endif>Franco compensatorio (c/cambio)</option>

                            <option value="Franco compensatorio (Domingo)" @if ($legajo->provin == "Franco compensatorio (Domingo)") selected @endif>Franco compensatorio (Domingo)</option>

                            <option value="Camioneros - Kilometros normales" @if ($legajo->provin == "Camioneros - Kilometros normales") selected @endif>Camioneros - Kilometros normales</option>

                            <option value="Camioneros - Kilometros cordillera" @if ($legajo->provin == "Camioneros - Kilometros cordillera") selected @endif>Camioneros - Kilometros cordillera</option>

                            <option value="Camioneros - Viáticos garantia" @if ($legajo->provin == "Camioneros - Viáticos garantia") selected @endif>Camioneros - Viáticos garantia</option>

                            <option value="Camioneros - Kilometros Sab/Dom/Fer" @if ($legajo->provin == "Camioneros - Kilometros Sab/Dom/Fer") selected @endif>Camioneros - Kilometros Sab/Dom/Fer</option>

                            <option value="Camioneros - Cruce de frontera" @if ($legajo->provin == "Camioneros - Cruce de frontera") selected @endif>Camioneros - Cruce de frontera</option>

                            <option value="Camioneros - Control de descarga" @if ($legajo->provin == "Camioneros - Control de descarga") selected @endif>Camioneros - Control de descarga</option>

                            <option value="Camioneros - Permanencia f/residencia" @if ($legajo->provin == "Camioneros - Permanencia f/residencia") selected @endif>Camioneros - Permanencia f/residencia</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Código usado en software sueldos *</label>
                            <div class="col-md-4" style="padding-left: 0px">
                              <input class="form-control" type="text" name="cod_sue"
                              {{ $edicion?'enabled':'disabled' }}
                              value="{{ $legajo->cod_sue }}" maxlength="5" autocomplete='off'>
                            </div>
                        </div>
                      </div>
                  </div>

                  <fieldset></fieldset>

                  <div class="c-radio">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                          <label>
                            <input type="radio" name="a" value="option1"
                            {{ $edicion?'enabled':'disabled' }}>
                            <span class="fa fa-circle"></span>Carga manual</label>
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                          <label class="checkbox c-checkbox c-checkbox-rounded">
                          <input id="roundedcheckbox10" type="checkbox" checked
                          {{ $edicion?'enabled':'disabled' }}>
                          <span class="fa fa-check"></span>Permite ingresar rangos de fechas?</label>
                     </div>
                 </div>

                 <div class="col-md-12">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                          <label class="checkbox c-checkbox c-checkbox-rounded">
                          <input id="roundedcheckbox10" type="checkbox" checked
                          {{ $edicion?'enabled':'disabled' }}>
                          <span class="fa fa-check"></span>Permite ingresar por rangos de legajos?</label>
                      </div>
                 </div>

                 <div class="col-md-12">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                        <label class="checkbox c-checkbox c-checkbox-rounded">
                        <input id="roundedcheckbox10" type="checkbox" checked
                        {{ $edicion?'enabled':'disabled' }}>
                        <span class="fa fa-check"></span>Ingresar cantidad?</label>
                     </div>
                 </div>

                 <div class="col-md-12">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                          <label class="checkbox c-checkbox c-checkbox-rounded">
                          <input id="roundedcheckbox10" type="checkbox" checked
                          {{ $edicion?'enabled':'disabled' }}>
                          <span class="fa fa-check"></span>Editar comentarios?</label>
                      </div>
                 </div>


                 <!--================== OPCION 2 ========================-->
                 <fieldset></fieldset>

                 <div class="c-radio">
                     <div class="col-lg-4 mb-4" style="padding-top: 4px">
                        <label>
                        <input type="radio" name="a" value="option2" checked=""
                        {{ $edicion?'enabled':'disabled' }} >
                        <span class="fa fa-circle"></span>Carga automática mediante fórmula</label>
                      </div>
                 </div>

                 <div class="col-md-12">
                     <div class="col-lg-8 mb-8" style="padding-top: 4px">
                       <p>Fórmula<p>
                       <textarea class="mb-3 form-control" cols="7" {{ $edicion?'enabled':'disabled' }}></textarea>
                       <div class="clearfix">
                     </div>
                    </div>
                 </div>

                 <br>
              </div>
        </div>
    </div>
  </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulario de carga de legajos -->
    <div class="row">
       <div class="col-lg-12">
             <!-- START card-->

                <!-- <div class="card-header">
                   <div class="card-title">Form Login</div>
                </div> -->

               <div class="card-footer" style="text-align: right;">
                   <div class="col-md-11" style="text-align: right;">
                       @if($edicion == true)
                           <button class="btn btn-labeled btn-success mb-2">
                             <span class="btn-label"><i class="fa fa-check"></i>
                             </span>Grabar
                           </button>

                           <a href="{{ url('/codnoved') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/codnoved/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/codnoved/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/codnoved/delete">Borrar</a>
                      @endif
                    </div>


               </div>
             <!-- END card-->

       </div>
    </div>
</div>
</form>

@endsection
