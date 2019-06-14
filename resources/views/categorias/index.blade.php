<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/categorias/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/categorias/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/categorias/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-7">Categorias
      <small></small>
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>

            
           <a href="{{ url('/categorias') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/categorias/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/categorias/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/categorias/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
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
            <div class="col-xl-6">
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="col-lg-3 mb-3">
                            <label class="col-form-label">Código *</label>
                            <input class="form-control" 
                              type="text" name="codigo" id="codigo"
                              {{ $edicion?'':'disabled' }}
                              {{ $agregar?'enabled autofocus=""':'disabled' }}
                              value="{{ old('codigo',$legajo?$legajo->codigo:'') }}" maxlength="4" required autocomplete='off'>
                        </div>
                   </div>
                </div>

                <div class="col-md-10">
                      <label class="col-form-label">Descripción *</label>
                      <input class="form-control" type="text" name="detalle" id="detalle"
                      {{ $edicion?'enabled':'disabled' }}
                      {{ $agregar?'autofocus=""':'autofocus=""' }}
                      value="{{ $legajo?$legajo->detalle:'' }}" required autocomplete='off'>
                </div>

                
                <br>

                <div class="col-xl-10 col-md-10">
                    <div class="form-row">
                        <div class="col-md-3">
                            <label class="col-form-label">Horas normales</label>
                            <input class="form-control" 
                              type="number" name="hsnormal" id="hsnormal"
                              {{ $edicion?'enabled':'disabled' }}
                              value="{{ old('hsnormal',$legajo?$legajo->hsnormal:'') }}" maxlength="3"autocomplete='off'>
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label">Horas minimas</label>
                            <input class="form-control" 
                              type="number" name="hsmin" id="hsmin"
                              {{ $edicion?'':'disabled' }}
                              value="{{ old('hsmin',$legajo?$legajo->hsmin:'') }}" maxlength="3"  autocomplete='off'>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label class="col-form-label">Horas maximas</label>
                            <input class="form-control" 
                              type="number" name="hsmax" id="hsmax"
                              {{ $edicion?'':'disabled' }}
                              value="{{ old('hsmax',$legajo?$legajo->hsmax:'') }}" maxlength="3"  autocomplete='off'>
                        </div>
                      </div>
                </div>
                
                <div class="col-lg-6 mb-6">
                    <label class="col-form-label">Convenio colectivo</label>
                                                  
                    <select class="form-control" id="cod_conve" name="cod_conve" {{ $edicion?'enabled':'disabled' }}>
                      @foreach ($convenios as $convenio)
                          <option value = "{{ $convenio->codigo  }}"
                            @if ($convenio->codigo == $legajo->cod_conve)  selected   @endif >
                            {{ $convenio->detalle }}
                          </option>
                      @endforeach
                    </select>

                </div>


                <div class="col-md-10">
                  <p></p>
                  <p></p>
                </div>

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
                            
                           <a href="{{ url('/cuadrillas') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/categorias/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/categorias/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/categorias/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
                      @endif
                    </div>

                   
               </div>
             <!-- END card-->
          
       </div>
    </div>
</div>
</form>
    
@endsection
