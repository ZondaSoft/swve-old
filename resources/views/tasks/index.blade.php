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
   <div class="col-md-4">Ingreso individual de novedades
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

   <div class="col-md-4" style="text-align: right;">
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
                       <h4 class="card-title">Resumen del mes</h4>
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
                                            <h5 class="m-0">11</h5>
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
                                            <h5 class="m-0">0</h5>
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
                                            <h5 class="m-0">0</h5>
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
                                            <h5 class="m-0">0</h5>
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
                                            <h5 class="m-0">0</h5>
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
                                            <h5 class="m-0">14</h5>
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

            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
            <script>
                $(document).ready(function() {
                    // page is now ready, initialize the calendar...
                    $('#calendar3').fullCalendar({
                        // put your options and callbacks here
                        height: 625,
                        prev: 'left-single-arrow',
                        left:   'title',
                        today:  'Hoy',
                        right:  'Hoy prev,next',
                        events : [
                            @foreach($tasks as $task)
                            {
                                title : '{{ $task->comenta1 }}',
                                start : '{{ $task->fecha }}',
                                url : '{{ route('tasks.edit', $task->id) }}'
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
