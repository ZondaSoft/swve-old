<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = true;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aqui
    # Creamos la cookie con la duración que queramos

    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    $expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
  }
?>

@extends('layouts.app')

<!-- Modals must be declare at body level so the content overlaps the background-->
<!-- Modal Large-->
<div class="modal fade" id="myModalLarge" name="myModalLarge" tabindex="-2" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <form method="post" action="{{ url('/novedadeslist/add') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="myModalLabelLarge">Agregar novedad</h4>
           <button class="close" type="button" data-dismiss="modal" aria-label="Close" autofocus="off" tabindex="-1">
              <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body">

         <div class="col-md-10">
              <div class="form-row">
                <div class="col-lg-3 mb-3">
                   <label class="col-form-label">Legajo * </label>
                       <div class="input-group " id="nro_legajo" data-provide=""
                           keyboardNavigation="false" title="Ingrese un Nro. legajo">
                           <input class="form-control" type="text" value="{{ old('legajo',$legajo->legajo) }}" name="legajo" id="legajo"
                           autofocus enabled required autocomplete="off" maxlength="4">  <!-- onkeyup="saltar(event,'cod_nov')" -->
                           <span class="input-group-append input-group-addon">
                             <a href="/home/search2" class="input-group-text fa fa-search"></a>
                           </span>
                       </div>
                </div>

                 <div class="col-lg-4 mb-4">
                    <label class="col-form-label">Apellidos</label>
                    <input class="form-control" type="text" name="detalle" id="detalle"
                    disabled
                    value="{{ old('detalle',$legajo->detalle) }}" autocomplete='off'>
                 </div>

                 <div class="col-lg-4 mb-4">
                      <label class="col-form-label">Nombres</label>
                      <input class="form-control" type="text" name="nombres" id="nombres"
                      disabled
                      value="{{ old('nombres',$legajo->nombres) }}" autocomplete='off'>
                 </div>

             </div>
          </div>

         <div class="col-md-10">
              <div class="form-row">
                 <div class="col-lg-3 mb-3">
                      <label class="col-form-label">Novedad *</label>
                      <div class="input-group " id="cod_novedad" data-provide=""
                          keyboardNavigation="false" title="Ingrese un código de novedad">
                          <input class="form-control" type="text" value="{{ old('cod_nov',$legajo->cod_nov) }}" name="cod_nov" id="cod_nov"
                          autofocus enabled maxlength="8" required autocomplete="off">  <!-- onkeyup="saltar(event,'cod_nov')" -->
                          <span class="input-group-append input-group-addon">
                            <a href="/codnoved/search2" class="input-group-text fa fa-search"></a>
                          </span>
                      </div>
                 </div>

                 <!-- <div class="col-lg-1 mb-1" style="padding-top: 35px; max-width: 50px">
                    <span class="input-group-append input-group-addon">
                    <a href="/preocupacional/add_new" class="input-group-text fa fa-address-book-o" {{ $edicion?'':'disabled' }} ></a>
                    </span>
                 </div> -->

                 <div class="col-lg-8 mb-8">
                    <label class="col-form-label">Descripción</label>
                    <input class="form-control" type="text" name="novedad" id="novedad"
                    disabled
                    value="{{ old('novedad',$legajo->novedad) }}" autocomplete='off'>
                 </div>

             </div>
          </div>

         <div class="col-lg-3 mb-3">
            <label class="col-form-label">Fecha * </label>
                <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                    keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                    <input class="form-control" type="text" value="{{ old('fecha',$legajo->fecha) }}" name="fecha" id="fecha"
                    enabled required autocomplete="off">
                    <span class="input-group-append input-group-addon">
                      <span class="input-group-text fa fa-calendar"></span>
                    </span>
                </div>
         </div>


         <div class="col-lg-3 mb-3">
              <label class="col-form-label">Cantidad</label>
              <input class="form-control" type="number" name="cantidad" id="cantidad"
              enabled required
              value="{{ old('cantidad',$legajo->cantidad) }}">
          </div>

         <div class="col-lg-12 mb-12">
              <label class="col-form-label">Comentarios</label>
              <textarea cols="7" placeholder=".." class="form-control" enabled
              name="alergias" id="alergias">{{ $legajo->alergias }}</textarea>
         </div>


        </div>
        <div class="modal-footer">
           <button class="btn btn-danger" type="button" data-dismiss="modal" id="btncancelar"> Cancelar </button>
           <button class="btn btn-success" type="submit" id="btngrabar"> Grabar... </button>
           <!-- <input type="submit" value="Enviar información"> -->
        </div>
     </div>

   </form>

  </div>
</div>

@section('content')

   <!-- Page content-->
   <div class="content-heading">
      <div>Registracion de Novedades por lista
         <small></small>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="form-group mb-4">
            <input class="form-control mb-2" type="text" placeholder="Texto a buscar...">
            <div class="d-flex">
               <button class="btn btn-secondary" type="button">Buscar</button>
               <div class="ml-auto">
                  <!-- <label class="c-checkbox">
                     <input id="inlineCheckbox10" type="checkbox" value="option1">
                     <span class="fa fa-check"></span>Products</label>
                  <label class="c-checkbox">
                     <input id="inlineCheckbox20" type="checkbox" value="option2">
                     <span class="fa fa-check"></span>People</label>
                  <label class="c-checkbox">
                     <input id="inlineCheckbox30" type="checkbox" value="option3">
                     <span class="fa fa-check"></span>Apps</label> -->
               </div>
            </div>
         </div>
         <!-- START card-->
         <div class="card card-default">

            <!-- <div class="card-header">
               <a class="float-right" href="#" data-tool="panel-refresh" data-toggle="tooltip" title="Refresh Card">
                  <em class="fa fa-refresh"></em>
               </a>Search Results</div>
            -->

            <!-- START table-responsive-->
            <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <th>
                      <strong>Fecha</strong>
                    </th>
                    <th>
                      <strong>Legajo</strong>
                    </th>
                    <th>
                      <strong>Apellido y Nombre</strong>
                    </th>
                    <th>
                      <strong>
                        Sector
                      </strong>
                    </th>
                    <th>
                      <strong>
                        Cod.Novedad
                      </strong>
                    </th>
                    <th>
                      <strong>
                        Descripción
                      </strong>
                    </th>
                    <th>
                      <strong>
                        Cantidad
                      </strong>
                    </th>
                    <th>
                      <strong>
                        Comentarios
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
                                      {{ $novedad?$novedad->legajo :'' }}
                                   </div>
                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->Apynom:'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->NomSector :'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->cod_nov:'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->CodNovName:'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->cantidad:'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                             <div class="media align-items-center">
                                <div class="media-body d-flex">
                                   <div>
                                      {{ $novedad?$novedad->comenta1:'' }}
                                   </div>

                                </div>
                             </div>
                          </td>

                          <td>
                            <div class="ml-auto">
                               <a class="btn btn-success btn-sm" href="\home\{{ $legajo->id }}" >
                               <em class="fa fa-eye"></em></a>
                            </div>
                          </td>

                          <td>
                            <div class="ml-auto">
                               <a class="btn btn-info btn-sm" href="\home\{{ $legajo->id }}" >
                               <em class="fa fa-pencil"></em></a>
                            </div>
                          </td>

                          <td>
                            <div class="ml-auto">
                               <a class="btn btn-danger btn-sm" href="\home\{{ $legajo->id }}" ><em class="fa fa-trash"></em></a>
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
                        <li class="page-item active"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">»</a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
         <!-- END card-->
      </div>
      <!--
      <div class="col-lg-3">
         <h3 class="m-0 pb-3">Filters</h3>
         <div class="form-group mb-4">
            <label class="col-form-label mb-2">by Text</label>
            <br>
            <select class="chosen-select form-control">
               <optgroup label="NFC EAST">
                  <option>Dallas Cowboys</option>
                  <option>New York Giants</option>
                  <option>Philadelphia Eagles</option>
                  <option>Washington Redskins</option>
               </optgroup>
               <optgroup label="NFC NORTH">
                  <option>Chicago Bears</option>
                  <option>Detroit Lions</option>
                  <option>Green Bay Packers</option>
                  <option>Minnesota Vikings</option>
               </optgroup>
               <optgroup label="NFC SOUTH">
                  <option>Atlanta Falcons</option>
                  <option>Carolina Panthers</option>
                  <option>New Orleans Saints</option>
                  <option>Tampa Bay Buccaneers</option>
               </optgroup>
               <optgroup label="NFC WEST">
                  <option>Arizona Cardinals</option>
                  <option>St. Louis Rams</option>
                  <option>San Francisco 49ers</option>
                  <option>Seattle Seahawks</option>
               </optgroup>
               <optgroup label="AFC EAST">
                  <option>Buffalo Bills</option>
                  <option>Miami Dolphins</option>
                  <option>New England Patriots</option>
                  <option>New York Jets</option>
               </optgroup>
               <optgroup label="AFC NORTH">
                  <option>Baltimore Ravens</option>
                  <option>Cincinnati Bengals</option>
                  <option>Cleveland Browns</option>
                  <option>Pittsburgh Steelers</option>
               </optgroup>
               <optgroup label="AFC SOUTH">
                  <option>Houston Texans</option>
                  <option>Indianapolis Colts</option>
                  <option>Jacksonville Jaguars</option>
                  <option>Tennessee Titans</option>
               </optgroup>
               <optgroup label="AFC WEST">
                  <option>Denver Broncos</option>
                  <option>Kansas City Chiefs</option>
                  <option>Oakland Raiders</option>
                  <option>San Diego Chargers</option>
               </optgroup>
            </select>
         </div>
         <div class="form-group">
            <label class="col-form-label mb-2">by Date</label>
            <br>
            <div class="input-group date" id="datetimepicker">
               <input class="form-control" type="text">
               <span class="input-group-append input-group-addon">
                  <span class="input-group-text fa fa-calendar"></span>
               </span>
            </div>
         </div>
         <div class="form-group mb-4">
            <label class="col-form-label mb-2">by Range</label>
            <br>
            <div class="slider-fw">
               <input class="slider" id="sl2" data-ui-slider="" type="text" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,750]">
            </div>
         </div>
         <button class="btn btn-secondary btn-lg">Apply</button>
      </div> -->
   </div>

@endsection
