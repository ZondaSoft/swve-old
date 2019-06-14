<!-- Vista de Centros de costo (SUE030) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/ccosto/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/ccosto/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/ccosto/edit/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-7">Centros de costo
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>


           <a href="{{ url('/ccosto') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/ccosto/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/ccosto/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/ccosto/delete/{{ $legajo?$legajo->id:'' }}">Borrar</a>
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
                        <div class="col-lg-2 mb-2">
                            <label class="col-form-label">Código *</label>
                            <input class="form-control"
                              type="text" name="codigo" id="codigo"
                              {{ $edicion?'':'disabled' }}
                              {{ $agregar?'enabled autofocus=""':'disabled' }}
                              value="{{ old('codigo',$legajo?$legajo->codigo:'') }}" maxlength="4" required>
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

                <div class="col-md-10">
                      <label class="col-form-label">Responsable</label>
                      <input class="form-control" type="text" name="responsa"
                      {{ $edicion?'enabled':'disabled' }}
                      value="{{ $legajo?$legajo->responsa:'' }}" autocomplete='off'>
                </div>

                <div class="col-md-10">
                      <label class="col-form-label">Dirección </label>
                      <input class="form-control" type="text" name="domicilio"
                      {{ $edicion?'enabled':'disabled' }}
                      value="{{ $legajo?$legajo->domicilio:'' }}" autocomplete='off'>
                </div>
                <div class="col-md-10">
                     <label class="col-form-label">Localidad</label>
                     <input class="form-control" type="text" name="localidad"
                     {{ $edicion?'enabled':'disabled' }}
                     value="{{ $legajo?$legajo->localidad:'' }}" >
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

                           <a href="{{ url('/ccosto') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/ccosto/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/ccosto/edit/{{ $legajo?$legajo->id:'' }}">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/ccosto/delete">Borrar</a>
                      @endif
                    </div>


               </div>
             <!-- END card-->

       </div>
    </div>
</div>
</form>

@endsection