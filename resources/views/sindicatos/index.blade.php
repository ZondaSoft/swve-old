<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/sindicatos/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/sindicatos/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/sindicatos/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-6">Sindicatos
      <small></small>
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>

            
           <a href="{{ url('/sindicatos') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/sindicatos/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/sindicatos/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/sindicatos/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
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
                              value="{{ old('codigo',$legajo?$legajo->codigo:'') }}" maxlength="6"
                              autocomplete='off'
                              required>
                        </div>
                   </div>
                </div>

                <div class="col-xl-12 col-md-12">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Descripción *</label>
                          <input class="form-control" type="text" name="detalle" id="detalle"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('detalle',$legajo->detalle) }}" 
                          maxlength="50" >

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

                  <div class="col-xl-12 col-md-12">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Localidad</label>
                          <input class="form-control" type="text" name="localidad" id="localidad"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('localidad',$legajo->localidad) }}" 
                          maxlength="25" >
                        </div>

                        
                      </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Código Postal</label>
                          <input class="form-control" type="text" name="cp" id="cp"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('cp',$legajo->cp) }}" 
                          maxlength="10" >
                        </div>
                      </div>
                  </div>

                  <fieldset></fieldset>

                  <div class="col-xl-6 col-md-6">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">% Aporte</label>
                          <input class="form-control" type="number" name="apo_os" id="apo_os"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('apo_os',$legajo->apo_os) }}" 
                          maxlength="5" >
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Importe Aporte</label>
                          <input class="form-control" type="number" name="fijo_apo" id="fijo_apo"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('fijo_apo',$legajo->fijo_apo) }}" 
                          maxlength="10" >
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">Importe Contribución</label>
                          <input class="form-control" type="number" name="fijo_con" id="fijo_con"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('fijo_con',$legajo->fijo_con) }}" 
                          maxlength="10" >
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="form-row">
                        <div class="col-md-6">
                          <label class="col-form-label">% Contribución</label>
                          <input class="form-control" type="number" name="cp" id="cp"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('cp',$legajo->cp) }}" 
                          maxlength="10" >
                        </div>
                      </div>
                  </div>
                  
                 <fieldset></fieldset>

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
                            
                           <a href="{{ url('/sindicatos') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/sindicatos/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/sindicatos/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/sindicatos/delete">Borrar</a>
                      @endif
                    </div>

                   
               </div>
             <!-- END card-->
          
       </div>
    </div>
</div>
</form>
    
@endsection
