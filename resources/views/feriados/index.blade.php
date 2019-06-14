<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/feriados/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/feriados/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/feriados/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-7">Feriados
      <small></small>
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>


           <a href="{{ url('/feriados') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/feriados/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/feriados/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/feriados/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
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
    <div class="card-header text-white bg-danger">Ingrese la fecha y descripción correspondiente al feriado...</div>
     <div class="row">
        <div class="card-body">
            <div class="col-xl-10 col-md-10">
                <br>

                <input type="hidden" name="fecha2" id="fecha2" value="" >

                <div class="col-md-10">
                    <div class="form-row">
                        <div class="col-lg-3 mb-3">
                              <label class="col-form-label">Fecha *</label>
                                <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                  <input class="form-control" type="text" value="{{ old('fecha',$legajo->fecha) }}" name="fecha" {{ $edicion?'enabled':'disabled' }}
                                    {{ $edicion?'':'disabled' }}
                                    {{ $agregar?'enabled autofocus=""':'disabled' }}
                                    autocomplete="off">
                                  <span class="input-group-append input-group-addon">
                                    <span class="input-group-text fa fa-calendar"></span>
                                  </span>
                              </div>
                          </div>
                   </div>
                </div>



                <div class="col-xl-12 col-md-12">
                    <div class="form-group-has-error">
                    <div class="form-row">
                        <div class="col-md-6">
                          @if ($errors->has('detalle'))
                              <label class="col-form-label" style="color: rgb(250, 80, 80);">Descripción *</label>

                              <input class="form-control has-erro" type="text" name="detalle" id="detalle" {{ $edicion?'enabled':'disabled' }}
                              value="{{ old('detalle',$legajo->detalle) }}"
                              style="border-left-color: rgb(240, 80, 80); border-bottom-color: rgb(240, 80, 80); border-top-color: rgb(240, 80,80); border-right-color: rgb(240, 80, 80)" autofocus=""
                              autocomplete="off">
                          @else
                              <label class="col-form-label">Descripción *</label>

                              <input class="form-control has-erro" type="text" name="detalle" id="detalle" {{ $edicion?'enabled':'disabled' }}
                              value="{{ old('detalle',$legajo->detalle) }}" autocomplete="off">
                          @endif
                        </div>
                      </div>

                    </div>
                </div>


                <br>

                <div class="col-xl-6 col-md-6">

                    <label class="col-form-label">Tipo </label>

                    <select class="form-control" id="nac_prov" name="nac_prov" {{ $edicion?'enabled':'disabled' }} autocomplete=''>
                      <option value=1 @if ($legajo->nac_prov == 1)  selected   @endif  >Feriado Nacional</option>
                      <option value=2 @if ($legajo->nac_prov == 2)  selected   @endif  >Día/Feriado Provincial</option>

                    </select>
                </div>

                <br>
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

                           <a href="{{ url('/feriados') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/feriados/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/feriados/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/feriados/delete">Borrar</a>
                      @endif
                    </div>


               </div>
             <!-- END card-->

       </div>
    </div>
</div>
</form>

@endsection
