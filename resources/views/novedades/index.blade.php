<!-- Vista de ingreso de novedades (SUE044) -->

@extends('layouts.app')

@section('content')


@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/novedadesind/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/novedadesind/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/novedadesind/add/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-4">Ingreso global de novedades
   </div>
      <div class="col-md-8" style="padding-top: 20px;">
        <div class="row">
          <div class="col-lg-1 mb-1">
              <label class="control-label" for="input-id-1" style="font-size: 1rem;padding-top: 10px">Período:</label>
          </div>
           <div class="col-lg-4 mb-4">
               <div class="input-group " id="nro_legajo" data-provide=""
                   keyboardNavigation="false" title="Seleccione el período a visualizar">
                   <input class="form-control" id="input-id-1" type="text" value="{{ $periodo->periodo }}"
                       style="width: 50px" readonly>

                   <span class="input-group-append input-group-addon">
                     <a href="/novedades/{{ $periodo?$periodo->id:'' }}/-1" class="input-group-text fa fa-chevron-left"></a>
                   </span>
                   <span class="input-group-append input-group-addon">
                     <a href="/novedades/{{ $periodo?$periodo->id:'' }}/1" class="input-group-text fa fa-chevron-right"></a>
                   </span>
                   <span class="input-group-append input-group-addon">
                     <a href="/periodos/1/search2" class="input-group-text fa fa-search"></a>
                   </span>
               </div>
             </div>
             <div class="col-md-3" style="text-align: right;">
                 @if($edicion == true)
                     <button class="btn btn-labeled btn-success mb-2">
                       <span class="btn-label"><i class="fa fa-check"></i>
                       </span>Grabar
                     </button>

                     <a href="{{ url('/novedadesind') }}" class="btn btn-labeled btn-danger mb-2">
                        <span class="btn-label"><i class="fa fa-times"></i>
                        </span>Cancelar
                     </a>
                @else
                     <a class="btn btn-oval btn-success" href="/novedadesind/add/{{ $legajo?$legajo->id:'' }}">Editar</a>
                @endif
              </div>
           </div>
    </div>
</div>

<!-- START row-->
<div class="calendar-app">
   <div class="row">


      <!-- START card-->
            <div class="card card-default">
               <!-- <div class="card-header">Novedades globales</div> -->
               <!-- START table-responsive-->
               <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="table-ext-1">
                     <thead>
                        <tr>
                           <th>Legajo</th>
                           <th style="width: 100px">Apellidos</th>
                           <th style="width: 100px">Nombres</th>

                           <!--       Encabezado de la tabla        -->
                           <?php
                               $startTime = $periodo->desde;
                               $endTime = $periodo->hasta;

                               $topeDias = 1;
                               do {
                                   //$newTime = strtotime('+'.$i++.' days',$startTime);
                                   ?> <th style="width: 20px">{{ date("d", strtotime($startTime)) }}/ {{ date("M", strtotime($startTime)) }}</th><?php
                                   $startTime++;
                                   $topeDias++;
                                } while ($startTime <= $endTime);
                            ?>

                        </tr>
                     </thead>
                     <tbody>

                        @foreach ($legajos as $legajo)
                        <tr>
                           <td>{{ $legajo->codigo }}</td>
                           <td>{{ $legajo->detalle }}</td>
                           <td>{{ $legajo->nombres }}</td>
                           <!-- <td>P</td>
                           <td>P</td>
                           <td>P</td>
                           <td>FC</td> -->

                           @for( $dia_mes= 1 ; $dia_mes <= 31 ; $dia_mes++ )
                              <td onclick="changeNovedad(this)">P</td>

                              @IF ($dia_mes >= $topeDias -1)
                                  @BREAK;
                              @ENDIF
                           @endfor
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
               </div>
               <!-- END table-responsive-->
               <div class="card-footer">
                  <div class="d-flex">
                     <!-- <button class="btn btn-sm btn-secondary">Clear</button> -->
                     <nav class="ml-auto">
                        <ul class="pagination pagination-sm">
                           {{ $legajos->links() }}
                        </ul>
                     </nav>
                  </div>
               </div>

               <div class="card-footer">
                  <div class="d-flex">
                     <div>
                        <div class="input-group">
                           <input class="form-control" type="text" placeholder="<busqueda>">
                           <div class="input-group-append">
                              <button class="btn btn-secondary" type="button">Buscar</button>
                           </div>
                        </div>
                     </div>
                     <div class="ml-auto">
                        <div class="input-group float-right">
                           <select class="custom-select" id="inputGroupSelect01">
                              <option value="0">(TODOS)</option>
                              <option value="1">BELGRANO MA</option>
                              <option value="2">BELGRANO TARDE</option>
                              <option value="3">BELGRANO NOCHE</option>
                           </select>
                           <div class="input-group-append">
                              <button class="btn btn-secondary" type="button">Filtrar</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>


   <!-- END row-->
  </div>
</form>

@endsection

@section('scripts')
    <script>
        function changeNovedad(e) {
            $('#myModalLarge').modal('show');
        }
    </script>
@endsection

@include('novedadeslist.modal-create')
@include('novedadeslist.modal-edit')
