<!-- Vista de ingreso de novedades (SUE044) -->
<!-- <style type="text/css">
    .swal-title {
      margin: 0px;
      font-size: 16px;
      box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.21);
      margin-bottom: 28px;
    }
</style> -->

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
   <div class="col-md-4">Ingreso individual de novedades..
   </div>

   <div class="col-md-4" style="text-align: right;">
     <div class="media">
       <img class="img-fluid circle" src="/img/personal/{{ $legajo->codigo}}.jpg" alt="Image" style="width: 60.99306px; height: 53.99306px;">
       <div class="col-md-6"><h5>
         {{ $legajo->detalle . ' ' . $legajo->nombres }}
         Legajo : {{ $legajo->codigo}}
         Sector : {{ $legajo->codsector }}
       </h5></div>
     </div>
   </div>

   <div class="col-md-4" style="text-align: right;padding-left: 0px;">
     <a class="btn btn-oval btn-success" href="/novedadesind">Primero</a>
     <a class="btn btn-oval btn-success" href="/novedadesind/{{ $legajo?$legajo->id:'' }}/-1">Anterior</a>
     <a class="btn btn-oval btn-success" href="/novedadesind/{{ $legajo?$legajo->id:'' }}/1">Siguiente</a>
     <a class="btn btn-oval btn-success" href="/novedadesind/{{ $legajo?$legajo->id:'' }}/9">Ultimo</a>
   </div>
</div>

<!-- START row-->
<div class="calendar-app">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
           <div class="row">
              <div class="col-lg-12 col-md-6 col-12">
                 <!-- START card-->
                 <div class="card card-default">
                    <div class="card-header">
                       <h4 class="card-title">Novedades</h4>
                    </div>
                    <!-- Default external events list-->
                    <div class="external-events-trash">
                       <div class="card-body">
                          <div class="external-events">
                             <div class="bg-green">Vacaciones</div>
                             <div class="bg-danger">Suspensiones</div>
                             <div class="bg-info">Descanso</div>
                             <div class="bg-warning">Enfermedad</div>
                             <div class="bg-inverse">Licencia gremial</div>
                          </div>
                          <p>
                             <!-- <span class="checkbox c-checkbox">
                                <label>
                                   <input id="remove-after-drop" type="checkbox">
                                   <span class="fa fa-check"></span>Remove after Drop</label>
                             </span>
                           -->
                          </p>
                       </div>
                    </div>
                 </div>
                 <!-- END card-->


                 <!-- START card-->
                 <div class="card card-default">
                    <div class="card-header">
                       <h4 class="card-title">Resumen del período</h4>
                    </div>
                    <!-- Default external events list-->
                    <div class="external-events-trash">
                       <div class="card-body">

                         <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                              <thead>
                                <td>
                                  <strong>Novedad</strong>
                                </td>
                                <td>
                                  <strong>Cantidad</strong>
                                </td>
                              </thead>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Vacaciones</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "VACAC")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Suspensiones</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "SUSPEN")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Descanzo</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "DESCAN")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Accidentes</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "ACCNUE")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Enfermedad</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "ENFER")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Licencias</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "LIC")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Feriados trab.</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ $tasks->where("cod_nov", "FERIAD")->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>

                              <tr>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">Presentes</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                                <td class="bg-green">
                                   <div class="media align-items-center">
                                      <!-- <a class="mr-3" href="#">
                                         <img class="img-fluid rounded thumb64" src="{{ asset('img/dummy.png') }}" alt="">
                                      </a> -->
                                      <div class="media-body d-flex">
                                         <div>
                                            <h5 class="m-0">{{ 31 - $tasks->count() }}</h5>
                                         </div>
                                      </div>
                                   </div>
                                </td>
                              </tr>
                           </table>
                         </div>

                       </div>
                    </div>
                 </div>
                 <!-- END card-->
              </div>

              <div class="col-lg-12 col-md-6 col-12">
                 <!-- START card-->
                 <!-- <div class="card card-default">
                    <div class="card-header">
                       <h3 class="card-title">Create Event</h3>
                    </div>
                    <div class="card-body">
                       <div class="input-group mb-2">
                          <input class="form-control external-event-name" type="text" placeholder="Event name...">
                          <div class="input-group-btn">
                             <button class="btn btn-secondary external-event-add-btn" type="button">Add</button>
                          </div>
                       </div>
                       <p class="text-muted">
                          <small>Elija un Color</small>
                       </p>
                       <ul class="list-inline external-event-color-selector">
                          <li class="list-inline-item p-0">
                             <a class="circle bg-danger circle-xl selected" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-primary circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-info circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-success circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-warning circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-green circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-pink circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-inverse circle-xl" href="#"></a>
                          </li>
                          <li class="list-inline-item p-0">
                             <a class="circle bg-purple circle-xl" href="#"></a>
                          </li>
                       </ul>
                    </div>
                 </div>
                 -->
                 <!-- END card-->
              </div>

           </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            <div id='calendar3'></div>
            <div id='calendar4'></div>

            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


            <script>
                $(document).ready(function() {
                    // page is now ready, initialize the calendar...
                    $('#calendar3').fullCalendar({
                        // put your options and callbacks here
                        editable: true,
                        selectable: true,
                        locale: 'es',
                        height: 400,
                        events : [
                            @foreach($tasks as $task)
                            {
                                title : '{{ $task->cod_nov . ": " . $task->comenta1 }}',
                                start : '{{ $task->fecha }}',
                                id    : '{{ $task->id }}'
                                //url : '{{ route('tasks.edit', $task->id) }}'
                            },
                            @endforeach
                        ],
                        //Activating modal for 'when an event is clicked'
                        eventClick: function (event) {
                            var punto = event.id;

                            //alert(punto);

                            $.ajax({
                                url: "/novedadeslist/edit/" + punto,
                                data: "id="+punto+"&_token={{ csrf_token()}}",
                                dataType: "json",
                                method: "GET",
                                success: function(result)
                                {
                                    if (result != null)
                                    {
                                        //swal("La novedad no puede eliminarse !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar el examen...")
                                        var $id = result.id;
                                        $("#nid").val(result.id);
                                        $("#legajoEdit").val(result.legajo);
                                        $("#ApynomEdit").val(result.detalle);
                                        $("#cod_novEdit").val(result.cod_nov);
                                        $("#CodNovNameEdit").val(result.novedad2);
                                        $("#fechaEdit").val(result.fecha);
                                        $("#fechaEdit2").val(result.fecha);
                                        //$("#fecha").val(result.fecha);
                                        //$("#fecha2").val(result.hasta);
                                        $("#diasEdit").val(result.dias);
                                        $("#imputacionEdit").val(result.concepto);
                                        $("#cantidadEdit").val(result.cantidad);
                                        $("#comenta1Edit").val(result.comenta1);


                                        $("#myModalEdit").attr("action","/novedadeslist/edit/" + punto);

                                        // alert("/novedadeslist/edit/" + punto);

                                        $('#myModalEdit').modal('show');
                                    }
                                    else
                                    {
                                        swal({
                                              title: "Está seguro(a) ?",
                                              text: "Está a punto de eliminar la novedad!",
                                              type: "warning",
                                              showCancelButton: true,
                                              confirmButtonColor: "#DD6B55",
                                              confirmButtonText: "Si, eliminar !",
                                              closeOnConfirm: false
                                          },
                                          function() {
                                            $.ajax({
                                                    url: "/empresas/delete_periodo/" + punto,
                                                    data: "id="+punto+"&_token={{ csrf_token()}}",
                                                    dataType: "json",
                                                    method: "POST",
                                                    success: function(result)
                                                    {
                                                        if (result['result'] != 'ok') // Era ==
                                                        {
                                                            //swal("La novedad no puede eliminarse !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar el examen...")

                                                            swal("Eliminado!", "La novedad fue eliminada.", "success");

                                                            location.reload();
                                                        }
                                                        else
                                                        {
                                                            swal("Eliminado!", "La novedad fue eliminada.", "success");

                                                            location.reload();
                                                        }
                                                    },
                                                    fail: function(){
                                                        //swal("Error !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar la novedad...");

                                                        swal("Eliminado!", "La novedad fue eliminada.", "success");

                                                        location.reload();
                                                    },
                                                    beforeSend: function(){

                                                    }
                                                });

                                                swal("Eliminado!", "La novedad fue eliminada.", "success");

                                                location.reload();
                                          })
                                    }
                                },
                                fail: function(){
                                    //swal("Error !", "Contiene digitalizaciones adjuntas, borrelas antes de poder eliminar la novedad...");

                                    swal("Eliminado!", "La novedad fue eliminada.", "success");

                                    location.reload();
                                },
                                beforeSend: function(){

                                }
                            });
                        },
                        dayClick: function(date_calendar, jsEvent, view) {
                            //alert('Clicked on: ' + date.format());
                            $("#dni").val({{ $legajo->codigo}});
                            $("#detalle").val("{{ $legajo->detalle . ' ' . $legajo->nombres }}");

                            var aFecha1 = date_calendar.format('DD/MM/YYYY')

                            $("#fecha").val(aFecha1);
                            $("#fecha2").val(aFecha1);
                            $("#cantidad").val(1);
                            $("#dias").val(1);

                            $("#myModalLarge").modal("show");

                            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                            //alert('Current view: ' + view.name);
                            // change the day's background color just for fun
                            //$(this).css('background-color', 'red');
                          }

                    });

                    var hoy = new Date();
                    var dd = hoy.getDate() - 30;
                    var mm = hoy.getMonth(); // + 1
                    var yyyy = hoy.getFullYear();

                    var currentdate = hoy.getFullYear() + "-" + mm  + "-" + hoy.getDate();

                    //$('#calendar3').fullCalendar('gotoDate', currentdate);  // Ver formato de fecha actual
                    //$('#calendar5').fullCalendar('gotoDate', currentdate);  // Ver formato de fecha actual

                    //--------------- Calendario inferior ---------------------
                    $('#calendar4').fullCalendar({
                        // put your options and callbacks here
                        locale: 'es',
                        height: 400,
                        prev: 'left-single-arrow',
                        left:   'title',
                        today:  'Hoy',
                        right:  'Hoy prev,next',
                        events : [
                            @foreach($tasks as $novedad)
                            {
                                title : '{{ $novedad->cod_nov . ": " . $novedad->comenta1 }}',
                                start : '{{ $novedad->fecha }}',
                                url : '{{ route('tasks.edit', $novedad->id) }}'
                            },
                            @endforeach
                        ]
                    });
                });
            </script>

        </div>
    </div>
    <!-- END row-->
</div>
</form>

@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    @if (session('alert'))
      var punto = {{ session('id') }} // document.getElementById("nid").value;

      swal({
          title: "Eliminar novedad ?",
          text: "Está por eliminar definitivamente la novedad seleccionada ! (#" + punto +")",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {

            borrar_novedad(punto);

            swal("Se elimino correctamente la novedad seleccionada !",
                {
                  icon: "success",
                });

            location.reload();

          } else {
              swal("Se cancelo la eliminación de la novedad!");
          }
          });
    @endif

    function borrar_novedad(punto) {
      //var punto = document.getElementById("nid").value;

      //alert(punto);

      $.ajax({
          url: "/novedadesind/delete/" + punto,
          data: "id="+punto+"&_token={{ csrf_token()}}",
          dataType: "json",
          method: "POST",
          success: function(result)
          {
              //alert('error borrando');

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
                  $("#cantidadEdit").val(result.cantidad);
                  $("#comenta1Edit").val(result.comenta1);


                  $("#myModalEdit").attr("action","/novedadeslist/edit/" + punto);

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

@include('novedadeslist.modal-create')
@include('novedadeslist.modal-edit')
