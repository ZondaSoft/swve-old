<!-- Vista de feriados (SUE044) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/feriados/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/feriados/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/feriados/add/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-6">Feriados
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
           <a class="btn btn-oval btn-success" href="/feriados/add/{{ $legajo?$legajo->id:'' }}">Editar</a>
      @endif
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
                     <h4 class="card-title">Draggable Events</h4>
                  </div>
                  <!-- Default external events list-->
                  <div class="external-events-trash">
                     <div class="card-body">
                        <div class="external-events">
                           <div class="bg-green">Lunch</div>
                           <div class="bg-danger">Go home</div>
                           <div class="bg-info">Do homework</div>
                           <div class="bg-warning">Work on UI design</div>
                           <div class="bg-inverse">Sleep tight</div>
                        </div>
                        <p>
                           <span class="checkbox c-checkbox">
                              <label>
                                 <input id="remove-after-drop" type="checkbox">
                                 <span class="fa fa-check"></span>Remove after Drop</label>
                           </span>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- END card-->
            </div>
            <div class="col-lg-12 col-md-6 col-12">
               <!-- START card-->
               <div class="card card-default">
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
                        <small>Choose a Color</small>
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
               <!-- END card-->
            </div>
         </div>
      </div>
      <div class="col-xl-9 col-lg-8">
         <!-- START card-->
         <div class="card card-default">
            <div class="card-body">
               <!-- START calendar-->
               <div id="calendar"></div>
               <!-- END calendar-->
            </div>
         </div>
         <!-- END card-->
      </div>
   </div>
   <!-- END row-->
</div>
</form>
    
@endsection