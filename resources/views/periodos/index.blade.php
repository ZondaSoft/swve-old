<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/periodos/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/periodos/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/periodos/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-7">Periodos de información
      <small></small>
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>


           <a href="{{ url('/periodos') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/periodos/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/periodos/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/periodos/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
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
                        <div class="col-lg-3 mb-3">
                            <label class="col-form-label">Período (mm/aaaa)*</label>
                            <input class="form-control masked"
                              type="text" name="periodo" id="period7"
                              {{ $edicion?'':'disabled' }}
                              {{ $agregar?'enabled autofocus=""':'disabled' }}
                              value="{{ old('periodo',$legajo?$legajo->periodo:'') }}" maxlength="7"
                              data-masked="" data-inputmask="'mask': '99/9999'" placeholder="mm/aaaa"
                              autocomplete='off' required style="width: 80px">
                              <!-- pattern="(1[0-2]|0[1-9])\/(1[1-2]|2\d)" -->
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            <a class="btn btn-oval btn-warning" href="/periodos/activar/{{ $legajo?$legajo->id:'' }}">
                               Activar período...
                            </a>
                        </div>
                   </div>
                </div>

                <div class="col-xl-12 col-md-12">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Detalle *</label>
                          <input class="form-control" type="text" name="detalle" id="detalle"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('detalle',$legajo->detalle) }}"
                          maxlength="50"
                          autocomplete='off'>

                          <!-- @if ($errors->has('detalle'))
                              <div class="alert alert-danger">
                                  <ul>
                                      <li>{{ $errors->first('detalle') }}</li>
                                  </ul>
                              </div>
                          @endif -->

                        </div>

                      </div>
                </div>

                <br>

                <div class="col-xl-7 col-md-7">
                    <div class="form-row">

                      <div class="col-lg-5 mb-5">
                          <label class="col-form-label">Desde</label>
                          <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                              <input class="form-control" type="text"
                                value="{{ old('desde',$legajo?$legajo->desde:'') }}"
                                name="desde" {{ $edicion?'enabled':'disabled' }}>
                              <span class="input-group-append input-group-addon">
                                <span class="input-group-text fa fa-calendar"></span>
                              </span>
                          </div>
                      </div>

                      </div>
                  </div>

                  <div class="col-xl-7 col-md-7">
                    <div class="form-row">
                        <div class="col-lg-5 mb-5">
                            <label class="col-form-label">Hasta</label>
                            <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                <input class="form-control" type="text"
                                  value="{{ old('hasta',$legajo?$legajo->hasta:'') }}"
                                  name="hasta" {{ $edicion?'enabled':'disabled' }} autocomplete='off'>
                                <span class="input-group-append input-group-addon">
                                  <span class="input-group-text fa fa-calendar"></span>
                                </span>
                            </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-7 col-md-7">
                    <div class="form-row">
                        <div class="col-lg-5 mb-5">
                            <label class="col-form-label">Corte 1° Quincena</label>
                            <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                <input class="form-control" type="text"
                                  value="{{ old('quincena',$legajo?$legajo->quincena:'') }}"
                                  name="quincena" {{ $edicion?'enabled':'disabled' }}>
                                <span class="input-group-append input-group-addon">
                                  <span class="input-group-text fa fa-calendar"></span>
                                </span>
                            </div>
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

                           <a href="{{ url('/periodos') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/periodos/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/periodos/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/periodos/delete">Borrar</a>
                      @endif
                    </div>


               </div>
             <!-- END card-->

       </div>
    </div>
</div>
</form>

@endsection
