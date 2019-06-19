<!-- Vista de Legajos Activos -->

@extends('layouts.app')

@section('content')

@if($agregar == true)
    <form method="post" action="{{ url('/home/add') }}" enctype="multipart/form-data">
@else
    <form method="post" action="{{ url('/home/edit/'.$legajo->id) }}" enctype="multipart/form-data">
@endif

{{ csrf_field() }}

<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-3">Vehículos activos
      <small></small>
   </div>

   <div class="col-md-1">
   </div>

   <div class="col-md-3">
        <a class="btn btn-labeled btn-default" type="button" href="/home/{{ $legajo?$legajo->id:'' }}/-1">
            <span class="btn-label"><i class="fa fa-arrow-left"></i>
            </span>
        </a>
        <a class="btn btn-labeled btn-default" type="button" href="/home/{{ $legajo?$legajo->id:'' }}/1">
            <span class="btn-label"><i class="fa fa-arrow-right"></i>
            </span>
        </a>
   </div>
   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <!-- <button class="btn btn-success">Grabar nueva categoría !</button> -->

           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>

           <a href="{{ url('/home') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/home/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/home/edit/{{ $legajo->id }}">Editar</a>
           <a class="btn btn-oval btn-danger" href="/home/delete/{{ $legajo->id }}">Borrar</a>
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
       <div class="card-header text-white bg-danger">Datos principales</div>
       <div class="row">
          <div class="card-body">
              <div class="col-xl-12 col-md-12">
                  <div class="col-md-12">
                       <div class="form-row">
                          <div class="col-lg-2 mb-2">
                              <label class="col-form-label">Dominio *</label>
                              <input class="form-control"
                                type="text" name="dominio" id="dominio"
                                {{ $edicion?'':'disabled' }}
                                {{ $agregar?'enabled autofocus=""':'disabled' }}
                                value="{{ old('dominio',$legajo->dominio) }}" maxlength="7" required>
                          </div>
                          @if ($errors->has('dominio'))
                              <div class="alert alert-danger">
                                  <ul>
                                    <li>{{ $errors->first('dominio') }}</li>
                                  </ul>
                              </div>
                          @endif

                          <div class="col-lg-1 mb-1">
                              &nbsp;
                          </div>

                          <div class="col-lg-2 mb-2">
                              <label class="col-form-label">Nro. Interno</label>
                              <input class="form-control"
                                type="text" name="codigo" id="codigo"
                                {{ $edicion?'':'disabled' }}
                                {{ $agregar?'enabled autofocus=""':'disabled' }}
                                value="{{ old('codigo',$legajo->codigo) }}" maxlength="7" required>
                          </div>

                          <div class="col-lg-2 mb-2">
                              &nbsp;
                          </div>


                          <!-- Widgets de imagenes (foto) -->
                          <div class="col-lg-5 mb-5">
                              <img class="img-fluid" src="/img/vehiculos/compactador.jpg" alt="..." style="width: 180.99306px; height: 100.99306px;margin-left: 60px">
                              &nbsp;&nbsp;
                              <button class="mb-sm btn btn-warning" type="button">Cambiar ...</button>
                          </div>

                          <!--
                          <div class="col-lg-3 mb-3">
                              <img class="img-fluid circle" src="/img/personal/5051.jpg" alt="Image"
                                  style="width: 85.99306px; height: 80.99306px;">
                          </div> -->
                     </div>
                  </div>



                  <div class="col-xl-10 col-md-10">
                    <div class="form-row">
                        <div class="col-md-5" style="margin-top: -40px;">
                          <label class="col-form-label">Detalle Vehículo *</label>
                          <input class="form-control" type="text" name="detalle" id="detalle"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('detalle',$legajo->detalle) }}" autocomplete="off">

                          @if ($errors->has('detalle'))
                              <div class="alert alert-danger">
                                  <ul>
                                      <li>{{ $errors->first('detalle') }}</li>
                                  </ul>
                              </div>
                          @endif
                        </div>

                        <div class="col-md-5" style="margin-top: -40px;">
                            <label class="col-form-label">Modelo *</label>
                            <input class="form-control" type="text" name="modelo"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ old('modelo',$legajo->modelo) }}" required>

                            @if ($errors->has('modelo'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('modelo') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-md-10">
                       <div class="form-row">
                           <div class="col-md-5">
                             <label class="col-form-label">Tipo de Vehículo *</label>
                             <select class="form-control" id="grupo" name="grupo" {{ $edicion?'enabled':'disabled' }}>
                                @foreach ($tipos as $tipo)
                                    <option value = "{{ $tipo->codigo  }}"
                                      @if ($legajo->grupo == $tipo->codigo)  selected   @endif  >
                                      {{ $tipo->detalle }}   ({{ $tipo->codigo  }})
                                    </option>
                                @endforeach
                            </select>

                             @if ($errors->has('grupo'))
                                 <div class="alert alert-danger">
                                     <ul>
                                         <li>{{ $errors->first('grupo') }}</li>
                                     </ul>
                                 </div>
                             @endif
                           </div>

                          <div class="col-lg-2 mb-2">
                            <label class="col-form-label">Año</label>
                            <input class="form-control" type="text" name="anio" id="anio"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ old('anio',$legajo->anio) }}" required>
                          </div>

                          <div class="col-md-1"></div>


                        </div>

                 </div>


                  <div class="col-xl-10 col-md-10">
                    <div class="form-row">
                        <div class="col-md-5">
                          <label class="col-form-label">Motor</label>
                          <input class="form-control" type="text" name="motor" id="motor"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('motor',$legajo->motor) }}" >

                          @if ($errors->has('motor'))
                              <div class="alert alert-danger">
                                  <ul>
                                      <li>{{ $errors->first('motor') }}</li>
                                  </ul>
                              </div>
                          @endif
                        </div>

                        <div class="col-md-5">
                            <label class="col-form-label">Chasis</label>
                            <input class="form-control" type="text" name="chasis"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ old('chasis',$legajo->chasis) }}" required>

                            @if ($errors->has('chasis'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('chasis') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-10 col-md-10">
                    <div class="form-row">
                        <div class="col-md-5">
                            <label class="col-form-label">Estado</label>
                            <input class="form-control" type="text" name="estado"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ old('estado',$legajo->estado) }}" required>

                            @if ($errors->has('estado'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('estado') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-10 col-md-10">
                    <div class="form-row">
                        <div class="col-md-5">
                          <label class="col-form-label">Equipo / Acoplado</label>
                          <input class="form-control" type="text" name="equipo" id="equipo"
                          {{ $edicion?'enabled':'disabled' }}
                          value="{{ old('equipo',$legajo->equipo) }}" >

                          @if ($errors->has('equipo'))
                              <div class="alert alert-danger">
                                  <ul>
                                      <li>{{ $errors->first('equipo') }}</li>
                                  </ul>
                              </div>
                          @endif
                        </div>

                        <div class="col-md-5">
                            <label class="col-form-label">Modelo (Equipo/Acoplado)</label>
                            <input class="form-control" type="text" name="modelo_eq"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ old('modelo_eq',$legajo->modelo_eq) }}">

                            @if ($errors->has('modelo_eq'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('modelo_eq') }}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                      </div>
                  </div>

              </div>
          </div>


          <!-- </div de widget de imagenes > -->
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
             <div class="card card-default">
                <!-- <div class="card-header">
                   <div class="card-title">Form Login</div>
                </div> -->

               <div class="card card-default mb-1 border-info">
                  <div class="card-header text-white bg-info" id="headingOne">
                     <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" href="" >Inscripcion / Seguros</a>
                     </h5>
                  </div>
                  <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                     <div class="card-body border-top">

                        <fieldset>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Inscripto en Provincia</label>

                                  <select class="form-control" id="inscripto" name="inscripto" {{ $edicion?'enabled':'disabled' }} autocomplete='country-name'>
                                    <option value="00" @if ($legajo->inscripto == "00")  selected   @endif  >Ciudad Autónoma de Buenos Aires</option>
                                    <option value="01" @if ($legajo->inscripto == "01")  selected   @endif  >Buenos Aires</option>
                                    <option value="02" @if ($legajo->inscripto == "02")  selected   @endif  >Catamara</option>
                                    <option value="03" @if ($legajo->inscripto == "03")  selected   @endif  >Córdoba</option>
                                    <option value="04" @if ($legajo->inscripto == "04")  selected   @endif  >Corrientes</option>
                                    <option value="05" @if ($legajo->inscripto == "05")  selected   @endif  >Entre Ríos</option>
                                    <option value="06" @if ($legajo->inscripto == "06")  selected   @endif  >Jujuy</option>
                                    <option value="07" @if ($legajo->inscripto == "07")  selected   @endif  >Mendoza</option>
                                    <option value="08" @if ($legajo->inscripto == "08")  selected   @endif  >La Rioja</option>
                                    <option value="09" @if ($legajo->inscripto == "09")  selected   @endif  >Salta</option>
                                    <option value="10" @if ($legajo->inscripto == "10")  selected   @endif  >San Juan</option>
                                    <option value="11" @if ($legajo->inscripto == "11")  selected   @endif  >San Luis</option>
                                    <option value="12" @if ($legajo->inscripto == "12")  selected   @endif  >Santa Fe</option>
                                    <option value="13" @if ($legajo->inscripto == "13")  selected   @endif  >Santiago del Estero</option>
                                    <option value="14" @if ($legajo->inscripto == "14")  selected   @endif  >Tucumán</option>
                                    <option value="16" @if ($legajo->inscripto == "16")  selected   @endif  >Chaco</option>
                                    <option value="17" @if ($legajo->inscripto == "17")  selected   @endif  >Chubut</option>
                                    <option value="18" @if ($legajo->inscripto == "18")  selected   @endif  >Formosa</option>
                                    <option value="19" @if ($legajo->inscripto == "19")  selected   @endif  >Misiones</option>
                                    <option value="20" @if ($legajo->inscripto == "20")  selected   @endif  >Neuquén</option>
                                    <option value="21" @if ($legajo->inscripto == "21")  selected   @endif  >La Pampa</option>
                                    <option value="22" @if ($legajo->inscripto == "22")  selected   @endif  >Río Negro</option>
                                    <option value="23" @if ($legajo->inscripto == "23")  selected   @endif  >Santa Cruz</option>
                                    <option value="24" @if ($legajo->inscripto == "24")  selected   @endif  >Tierra del Fuego</option>
                                  </select>

                                  </div>
                                  <div class="col-lg-3 mb-3">
                                    <label class="col-form-label">Numero</label>
                                    <input class="form-control" type="text" name="numero"
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('numero',$legajo->numero) }}" >
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Municipalidad</label>
                                  <input class="form-control" type="text" name="municipal"
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('municipal',$legajo->municipal) }}" >
                                  </div>
                                  <div class="col-lg-2 mb-2">
                                    <label class="col-form-label">Pin #</label>
                                    <input class="form-control" type="text" name="pin"
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('pin',$legajo->pin) }}" >
                                  </div>

                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                               <div class="col-lg-3 mb-3">
                                   <label class="col-form-label">Vencimiento Ruta</label>
                                   <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                       <input class="form-control" type="text" value="{{ $legajo->vto_ruta }}" name="vto_ruta" {{ $edicion?'enabled':'disabled' }}>
                                       <span class="input-group-append input-group-addon">
                                         <span class="input-group-text fa fa-calendar"></span>
                                       </span>
                                   </div>
                               </div>

                              </div>
                           </div>

                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Nro. Poliza</label>
                                    <input class="form-control" type="text" name="n_poliza"
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('n_poliza',$legajo->n_poliza) }}" autocomplete='tel'>
                                </div>
                              </div>
                           </div>

                           <div class="col-md-10">
                             <div class="form-row">
                               <div class="col-lg-3 mb-3">
                                   <label class="col-form-label">Vencimiento Tarjeta</label>
                                   <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                       <input class="form-control" type="text" value="{{ $legajo->vto_tecni }}" name="vto_tecni" {{ $edicion?'enabled':'disabled' }}>
                                       <span class="input-group-append input-group-addon">
                                         <span class="input-group-text fa fa-calendar"></span>
                                       </span>
                                   </div>
                               </div>
                                <div class="col-lg-3 mb-3">
                                  <label class="col-form-label">Fecha de Alta</label>
                                  <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                      <input class="form-control" type="text" value="{{ $legajo->f_alta }}" name="f_alta" id="f_alta" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="input-group-append input-group-addon">
                                        <span class="input-group-text fa fa-calendar"></span>
                                      </span>
                                  </div>

                                  @if ($errors->has('f_alta'))
                                      <div class="alert alert-danger">
                                          <ul>
                                            <li>{{ $errors->first('f_alta') }}</li>
                                          </ul>
                                      </div>
                                  @endif
                               </div>
                            </div>
                           </div>

                       </fieldset>

                     </div>
                  </div>
               </div>



               <!--=======================================================
               /              Siniestros
               =========================================================-->
               <div class="card card-default mb-1 border-info">
                      <div class="card-header text-white bg-info" id="headingTwo">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" href="">Siniestros</a>
                         </h5>
                      </div>
                      <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                         <div class="col-md-10">
                           <!-- START card-->
                           <div class="col-lg-2 mb-2">
                           </div>

                            <div class="card card-default">
                               <!-- <div class="card-header">
                               </div> -->

                               <!-- START table-responsive-->
                               <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                     <thead>
                                       <th style="width: 100px">
                                         <strong>Fecha</strong>
                                       </th>
                                       <th style="width: 500px">
                                         <strong>Tipo de novedad</strong>
                                       </th>
                                       <th>
                                         <strong>Encargado</strong>
                                       </th>
                                       <th style="width: 800px">
                                         <strong>
                                           Detalle
                                         </strong>
                                       </th>
                                       <th>
                                         <strong>
                                           Vencimiento
                                         </strong>
                                       </th>
                                       <th width="1%"></th>
                                       <th></th>
                                       <th></th>
                                     </thead>
                                     <tbody>
                                        @foreach ($siniestros as $novedad)
                                           <tr>

                                             <td>
                                                <div class="media align-items-center">
                                                   <div class="media-body d-flex">
                                                      <div>
                                                         {{ $novedad?$novedad->fecha :'' }}
                                                      </div>
                                                   </div>
                                                </div>
                                             </td>

                                             <td>
                                                <div class="media align-items-center">
                                                   <div class="media-body d-flex">
                                                      <div>
                                                         {{ $novedad?$novedad->tipo :'' }}
                                                      </div>
                                                   </div>
                                                </div>
                                             </td>

                                             <td>
                                                <div class="media align-items-center">
                                                   <div class="media-body d-flex">
                                                      <div>
                                                         {{ $novedad?$novedad->encarga:'' }}
                                                      </div>

                                                   </div>
                                                </div>
                                             </td>

                                             <td>
                                                <div class="media align-items-center">
                                                   <div class="media-body d-flex">
                                                      <div>
                                                         {{ $novedad?$novedad->detalle:'' }}
                                                      </div>

                                                   </div>
                                                </div>
                                             </td>

                                             <td>
                                                <div class="media align-items-center">
                                                   <div class="media-body d-flex">
                                                      <div>
                                                         {{ $novedad?$novedad->vencimient :'' }}
                                                      </div>

                                                   </div>
                                                </div>
                                             </td>

                                             <td>
                                               <div class="ml-auto">
                                                 <button title="Consultar novedad" class="btn btn-info btn-sm" style="color: white" name="btnAgregar" id="btnAgregar"
                                                   type="button" data-toggle="modal" data-target="#myModalEdit">
                                                   <em class="fa fa-eye"></em></a>
                                               </div>
                                             </td>

                                             <td>
                                               <div class="ml-auto">
                                                  <a title="Editar novedad" class="btn btn-warning btn-sm" onclick="showModalEdit({{ $novedad->id }})">
                                                  <em class="fa fa-pencil" style="color: white"></em></a>

                                                  <!-- <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                                    type="button" data-toggle="modal" data-target="#myModalEdit">
                                                    <em class="fa fa-sticky-note"></em>
                                                     Editar
                                                  </button>  -->
                                               </div>
                                             </td>

                                             <td>
                                               <div class="ml-auto">
                                                  <a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                    <em class="fa fa-trash" style="color: white"></em></a>
                                                  <!-- <button type="button" data-product_id="{{ $novedad->id }}" data-product_name="{{ $novedad->name }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash"></i></button> -->
                                                  <!--<a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                    <em class="fa fa-trash" style="color: red"></em>
                                                  </a> -->
                                               </div>
                                             </td>

                                           </tr>
                                        @endforeach
                                     </tbody>
                                  </table>
                               </div>
                               <!-- END table-responsive-->
                               <div class="card-footer">
                                  <div class="d-flex">
                                     <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                       type="button" data-toggle="modal" data-target="#myModal-sinies">
                                       <em class="fa fa-sticky-note"></em>
                                        Agregar...
                                     </button>

                                     <!-- <a href="#myModalLarge" data-toggle="modal" name="modal1" id="modal1" >abrir</a> -->

                                     <nav class="ml-auto">
                                        <ul class="pagination pagination-sm">
                                           {{ $novedades->links() }}
                                        </ul>
                                     </nav>
                                  </div>
                                </div>

                            </div>
                            <!-- END card-->

                         </div>

                      </div>
               </div>

               <!--=======================================================
               /              Multas
               =========================================================-->
               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingFour">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" href="">Multas</a>
                       </h5>
                      </div>
                      <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
                         <div class="card-body border-top">

                            <div class="col-md-10">
                               <div class="form-row">
                                 <!-- START table-responsive-->
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                       <thead style="width: 100px">
                                         <th>
                                           <strong>Fecha</strong>
                                         </th>
                                         <th style="width: 500px">
                                           <strong>Tipo de novedad</strong>
                                         </th>
                                         <th>
                                           <strong>Encargado</strong>
                                         </th>
                                         <th style="width: 800px">
                                           <strong>
                                             Detalle
                                           </strong>
                                         </th>
                                         <th>
                                           <strong>
                                             Vencimiento
                                           </strong>
                                         </th>
                                         <th width="1%"></th>
                                         <th></th>
                                         <th></th>
                                       </thead>
                                       <tbody>
                                          @foreach ($multas as $multa)
                                             <tr>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $multa?$multa->fecha :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $multa?$multa->tipo :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $multa?$multa->encarga:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $multa?$multa->detalle:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $multa?$multa->vencimient :'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                   <button title="Consultar novedad" class="btn btn-info btn-sm" style="color: white" name="btnAgregar" id="btnAgregar"
                                                     type="button" data-toggle="modal" data-target="#myModalEdit">
                                                     <em class="fa fa-eye"></em></a>
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Editar novedad" class="btn btn-warning btn-sm" onclick="showModalEdit({{ $novedad->id }})">
                                                    <em class="fa fa-pencil" style="color: white"></em></a>

                                                    <!-- <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                                      type="button" data-toggle="modal" data-target="#myModalEdit">
                                                      <em class="fa fa-sticky-note"></em>
                                                       Editar
                                                    </button>  -->
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: white"></em></a>
                                                    <!-- <button type="button" data-product_id="{{ $novedad->id }}" data-product_name="{{ $novedad->name }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash"></i></button> -->
                                                    <!--<a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: red"></em>
                                                    </a> -->
                                                 </div>
                                               </td>

                                             </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 <!-- END table-responsive-->
                                 <div class="card-footer">
                                    <div class="d-flex">
                                       <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                         type="button" data-toggle="modal" data-target="#myModal-multac">
                                         <em class="fa fa-sticky-note"></em>
                                          Agregar multa ...
                                       </button>

                                       <!-- <a href="#myModalLarge" data-toggle="modal" name="modal1" id="modal1" >abrir</a> -->

                                       <nav class="ml-auto">
                                          <ul class="pagination pagination-sm">
                                             {{ $novedades->links() }}
                                          </ul>
                                       </nav>
                                    </div>

                                    <fieldset></fieldset>


                                   </div>
                                </div>
                             </div>
                         </div>
                      </div>
               </div>

               <!--=======================================================
               /              Rto
               =========================================================-->
               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingFive">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" href="">Revisión Técnica Obligatoria</a>
                       </h5>
                      </div>
                      <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordion">
                         <div class="card-body border-top">

                            <div class="col-md-10">
                               <div class="form-row">
                                 <!-- START table-responsive-->
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                       <thead>
                                         <th style="width: 415px">
                                           <strong>Fecha</strong>
                                         </th>
                                         <th style="width: 500px">
                                           <strong>Tipo de novedad</strong>
                                         </th>
                                         <!-- <th>
                                           <strong>Encargado</strong>
                                         </th> -->
                                         <th style="width: 800px">
                                           <strong>
                                             Detalle
                                           </strong>
                                         </th>
                                         <th>
                                           <strong>
                                             Vencimiento
                                           </strong>
                                         </th>
                                         <th width="1%"></th>
                                         <th></th>
                                         <th></th>
                                       </thead>
                                       <tbody>
                                          @foreach ($novedades as $novedad)
                                             <tr>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->fecha :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->tipo :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <!-- <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->encarga:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td> -->

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->detalle:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->vencimient :'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                   <button title="Consultar novedad" class="btn btn-info btn-sm" style="color: white" name="btnAgregar" id="btnAgregar"
                                                     type="button" data-toggle="modal" data-target="#myModalEdit">
                                                     <em class="fa fa-eye"></em></a>
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Editar novedad" class="btn btn-warning btn-sm" onclick="showModalEdit({{ $novedad->id }})">
                                                    <em class="fa fa-pencil" style="color: white"></em></a>

                                                    <!-- <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                                      type="button" data-toggle="modal" data-target="#myModalEdit">
                                                      <em class="fa fa-sticky-note"></em>
                                                       Editar
                                                    </button>  -->
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: white"></em></a>
                                                    <!-- <button type="button" data-product_id="{{ $novedad->id }}" data-product_name="{{ $novedad->name }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash"></i></button> -->
                                                    <!--<a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: red"></em>
                                                    </a> -->
                                                 </div>
                                               </td>

                                             </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 <!-- END table-responsive-->
                                 <div class="card-footer">
                                    <div class="d-flex">
                                       <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                         type="button" data-toggle="modal" data-target="#myModalLarge">
                                         <em class="fa fa-sticky-note"></em>
                                          Agregar nueva R.T.O.
                                       </button>

                                       <!-- <a href="#myModalLarge" data-toggle="modal" name="modal1" id="modal1" >abrir</a> -->

                                       <nav class="ml-auto">
                                          <ul class="pagination pagination-sm">
                                             {{ $novedades->links() }}
                                          </ul>
                                       </nav>
                                    </div>


                                   </div>
                                </div>
                             </div>
                         </div>
                      </div>
               </div>

               <!--=======================================================
               /              Baja
               =========================================================-->
               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingSeven">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" href="">Baja</a>
                       </h5>
                      </div>
                      <div class="collapse" id="collapseSeven" aria-labelledby="headingSeven" data-parent="#accordion">
                         <div class="card-body border-top">

                            <div class="col-md-10">
                               <div class="form-row">
                                 <!-- START table-responsive-->
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                       <thead>
                                         <th style="width: 100px">
                                           <strong>Fecha</strong>
                                         </th>
                                         <th style="width: 500px">
                                           <strong>Tipo de novedad</strong>
                                         </th>
                                         <th>
                                           <strong>Encargado</strong>
                                         </th>
                                         <th style="width: 800px">
                                           <strong>
                                             Detalle
                                           </strong>
                                         </th>
                                         <th>
                                           <strong>
                                             Vencimiento
                                           </strong>
                                         </th>
                                         <th width="1%"></th>
                                         <th></th>
                                         <th></th>
                                       </thead>
                                       <tbody>
                                          @foreach ($novedades as $novedad)
                                             <tr>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->fecha :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->tipo :'' }}
                                                        </div>
                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->encarga:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->detalle:'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                  <div class="media align-items-center">
                                                     <div class="media-body d-flex">
                                                        <div>
                                                           {{ $novedad?$novedad->vencimient :'' }}
                                                        </div>

                                                     </div>
                                                  </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                   <button title="Consultar novedad" class="btn btn-info btn-sm" style="color: white" name="btnAgregar" id="btnAgregar"
                                                     type="button" data-toggle="modal" data-target="#myModalEdit">
                                                     <em class="fa fa-eye"></em></a>
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Editar novedad" class="btn btn-warning btn-sm" onclick="showModalEdit({{ $novedad->id }})">
                                                    <em class="fa fa-pencil" style="color: white"></em></a>

                                                    <!-- <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                                      type="button" data-toggle="modal" data-target="#myModalEdit">
                                                      <em class="fa fa-sticky-note"></em>
                                                       Editar
                                                    </button>  -->
                                                 </div>
                                               </td>

                                               <td>
                                                 <div class="ml-auto">
                                                    <a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: white"></em></a>
                                                    <!-- <button type="button" data-product_id="{{ $novedad->id }}" data-product_name="{{ $novedad->name }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash"></i></button> -->
                                                    <!--<a title="Borrar novedad" class="btn btn-danger btn-sm" onclick="showModal({{ $novedad->id }})">
                                                      <em class="fa fa-trash" style="color: red"></em>
                                                    </a> -->
                                                 </div>
                                               </td>

                                             </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 <!-- END table-responsive-->
                                 <div class="card-footer">
                                    <div class="d-flex">
                                       <button class="btn btn-warning btn-lg" name="btnAgregar" id="btnAgregar"
                                         type="button" data-toggle="modal" data-target="#myModalLarge">
                                         <em class="fa fa-sticky-note"></em>
                                          Agregar...
                                       </button>

                                       <!-- <a href="#myModalLarge" data-toggle="modal" name="modal1" id="modal1" >abrir</a> -->

                                       <nav class="ml-auto">
                                          <ul class="pagination pagination-sm">
                                             {{ $novedades->links() }}
                                          </ul>
                                       </nav>
                                    </div>

                                    <fieldset></fieldset>


                                   </div>
                                </div>
                             </div>
                         </div>
                      </div>
               </div>

             </div>
             <!-- END card-->

       </div>
    </div>
</div>
</form>

<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      autoclose: true,
      changeYear: true
    });
  });

  $(document).ready(function() {
      // id de nuestro modal
      $("#myModalLarge").modal("show");
  });


  function showModalEdit(e) {
    //alert(e);
    var punto = e;
    var id = e;

    $.ajax({
            url: "/rto/edit/" + punto,
            data: "id="+punto+"&_token={{ csrf_token()}}",
            dataType: "json",
            method: "GET",
            success: function(result)
            {
                if (result['result'] == 'ok')
                {
                    swal("La novedad no puede editarse !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar el examen...")
                }
                else
                {
                    //console.log(result);
                    //alert(result.novedad2);
                    var $id = result.id;
                    $("#nid").val(result.id);
                    $("#legajoEdit").val(result.legajo);
                    $("#ApynomEdit").val(result.detalle);
                    $("#cod_novEdit").val(result.cod_nov);
                    $("#CodNovNameEdit").val(result.novedad2);
                    $("#fechaEdit").val(result.fecha);
                    $("#rto_ed_comenta").val(result.detalle);

                    $("#myModalEdit").attr("action","/rto/edit/" + punto);

                    // alert("/novedadeslist/edit/" + punto);

                    $('#myModalEdit').modal('show');
                }
            },
            fail: function(){
                swal("Error !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar la novedad...");
            },
            beforeSend: function(){

            }
        });

    }
</script>

@endsection

@include('novedadeslist.rto-create')
@include('novedadeslist.rto-edit')
@include('novedadeslist.multa-create')
@include('novedadeslist.sini-create')
