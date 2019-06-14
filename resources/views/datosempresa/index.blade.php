<!-- Vista de Centros de costo (DATOEMPR) -->

@extends('layouts.app')

@section('content')

@if($edicion == true)
  @if($agregar == true)
      <form method="post" action="{{ url('/datosempresa/add') }}" enctype="multipart/form-data">
  @else
      <form method="post" action="{{ url('/datosempresa/edit/'.$legajo->id) }}" enctype="multipart/form-data">
  @endif
@else
  <form method="post" action="{{ url('/datosempresa/add/') }}" enctype="multipart/form-data">
@endif


{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div class="col-md-6">Datos de la empresa
      <small></small>
   </div>

   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>

            
           <a href="{{ url('/datosempresa') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/datosempresa/add/{{ $legajo?$legajo->id:'' }}">Editar</a>
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
    <div class="card-header text-white bg-danger">Datos de la empresa</div>
     <div class="row">
        <div class="card-body">
            <div class="col-xl-12">

                <div class="col-md-10">
                   <div class="form-row">
                      <div class="col-lg-5 mb-3">
                            <label class="col-form-label">Razón Social  *</label>
                            <input class="form-control" type="text" name="razon" id="razon"
                            {{ $edicion?'enabled':'disabled' }}
                            {{ $agregar?'autofocus=""':'autofocus=""' }}
                            value="{{ $legajo?$legajo->razon:'' }}" required autocomplete='off'>
                      </div>
                      <div class="col-md-6">
                            <label class="col-form-label">Nombre Comercial *</label>
                            <input class="form-control" type="text" name="nomcom" 
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ $legajo?$legajo->nomcom:'' }}" autocomplete='off'>
                      </div>
                    </div>
                </div>

                <div class="col-md-10">
                   <div class="form-row">
                      <div class="col-lg-3 mb-3">
                          <label class="col-form-label">Condición I.V.A.</label>
                          
                          <select class="form-control" id="condiva" name="condiva" {{ $edicion?'enabled':'disabled' }} autocomplete=''>
                            <option value="RI" @if ($legajo->condiva == "RI")  selected   @endif  >Responsable Inscripto</option>
                            <option value="MO" @if ($legajo->condiva == "MO")  selected   @endif  >Monotributo</option>
                            <option value="EX" @if ($legajo->condiva == "EX")  selected   @endif  >Exento</option>
                            <option value="CF" @if ($legajo->condiva == "CF")  selected   @endif  >Consumidor Final</option>
                            <option value="OT" @if ($legajo->condiva == "OT")  selected   @endif  >Otro</option>
                          </select>

                       </div>

                       <div class="col-lg-2 mb-2">
                          <label class="col-form-label">CUIT *</label>
                          <input class="form-control" type="text" name="cuit"
                          {{ $edicion?'enabled':'disabled' }}
                          {{ $agregar?'autofocus=""':'autofocus=""' }}
                          value="{{ old('cuit',$legajo->cuit) }}" maxlength="11" required autocomplete='off'autofocus="">
                      </div>
                    </div>
                  </div>  
                

                <div class="col-md-12">
                   <div class="form-row">
                      <div class="col-lg-6 mb-6">
                        <label class="col-form-label">Actividad principal</label>
                        <input class="form-control" type="text" name="actividad" 
                        {{ $edicion?'enabled':'disabled' }}
                        value="{{ old('actividad',$legajo->actividad) }}" autocomplete=''>
                     </div>
                     
                  </div>
                 </div>

                 <div class="col-md-12">
                   <div class="form-row">
                      <div class="col-lg-6 mb-6">
                        <label class="col-form-label">Actividad secundaria</label>
                        <input class="form-control" type="text" name="actividad2" 
                        {{ $edicion?'enabled':'disabled' }}
                        value="{{ old('actividad2',$legajo->actividad2) }}" autocomplete=''>
                     </div>
                  </div>
                 </div>


                <div class="col-md-6">
                      <label class="col-form-label">domicilio  *</label>
                      <input class="form-control" type="text" name="domicilio" id="domicilio"
                      {{ $edicion?'enabled':'disabled' }}
                      {{ $agregar?'autofocus=""':'autofocus=""' }}
                      value="{{ $legajo?$legajo->domicilio:'' }}" autocomplete='off'>
                </div>

                <fieldset></fieldset>

                <div class="col-md-10">
                   <div class="form-row">
                      <div class="col-lg-5 mb-3">
                        <label class="col-form-label">Provincia</label>
                        
                        <select class="form-control" id="provincia" name="provincia" {{ $edicion?'enabled':'disabled' }} autocomplete=''>
                          <option value="00" @if ($legajo->provincia == "00")  selected   @endif  >Ciudad Autónoma de Buenos Aires</option>
                          <option value="01" @if ($legajo->provincia == "01")  selected   @endif  >Buenos Aires</option>
                          <option value="02" @if ($legajo->provincia == "02")  selected   @endif  >Catamara</option>
                          <option value="03" @if ($legajo->provincia == "03")  selected   @endif  >Córdoba</option>
                          <option value="04" @if ($legajo->provincia == "04")  selected   @endif  >Corrientes</option>
                          <option value="05" @if ($legajo->provincia == "05")  selected   @endif  >Entre Ríos</option>
                          <option value="06" @if ($legajo->provincia == "06")  selected   @endif  >Jujuy</option>
                          <option value="07" @if ($legajo->provincia == "07")  selected   @endif  >Mendoza</option>
                          <option value="08" @if ($legajo->provincia == "08")  selected   @endif  >La Rioja</option>
                          <option value="09" @if ($legajo->provincia == "09")  selected   @endif  >Salta</option>
                          <option value="10" @if ($legajo->provincia == "10")  selected   @endif  >San Juan</option>
                          <option value="11" @if ($legajo->provincia == "11")  selected   @endif  >San Luis</option>
                          <option value="12" @if ($legajo->provincia == "12")  selected   @endif  >Santa Fe</option>
                          <option value="13" @if ($legajo->provincia == "13")  selected   @endif  >Santiago del Estero</option>
                          <option value="14" @if ($legajo->provincia == "14")  selected   @endif  >Tucumán</option>
                          <option value="16" @if ($legajo->provincia == "16")  selected   @endif  >Chaco</option>
                          <option value="17" @if ($legajo->provincia == "17")  selected   @endif  >Chubut</option>
                          <option value="18" @if ($legajo->provincia == "18")  selected   @endif  >Formosa</option>
                          <option value="19" @if ($legajo->provincia == "19")  selected   @endif  >Misiones</option>
                          <option value="20" @if ($legajo->provincia == "20")  selected   @endif  >Neuquén</option>
                          <option value="21" @if ($legajo->provincia == "21")  selected   @endif  >La Pampa</option>
                          <option value="22" @if ($legajo->provincia == "22")  selected   @endif  >Río Negro</option>
                          <option value="23" @if ($legajo->provincia == "23")  selected   @endif  >Santa Cruz</option>
                          <option value="24" @if ($legajo->provincia == "24")  selected   @endif  >Tierra del Fuego</option>
                        </select>

                      </div>
                      <div class="col-lg-7 mb-7">
                        <label class="col-form-label">Localidad</label>
                        <input class="form-control" type="text" name="localidad" 
                        {{ $edicion?'enabled':'disabled' }}
                        value="{{ old('localidad',$legajo->localidad) }}" >
                      </div>
                      

                      <div class="col-md-10">
                           <div class="form-row">
                              <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Telefono fijo</label>
                                  <input class="form-control" type="text" name="tel1" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('tel1',$legajo->tel1) }}" autocomplete='tel'>
                              </div>
                              <div class="col-lg-4 mb-3">
                                <label class="col-form-label">Telefono movil</label>
                                <input class="form-control" type="text" name="cel" 
                                {{ $edicion?'enabled':'disabled' }}
                                value="{{ old('cel',$legajo->cel) }}" autocomplete='tel'>
                             </div>
                             <div class="col-lg-4 mb-3">
                                <label class="col-form-label">Otro Telefono</label>
                                <input class="form-control" type="text" name="tel2" 
                                {{ $edicion?'enabled':'disabled' }}
                                value="{{ old('tel2',$legajo->tel2) }}" autocomplete='tel'>
                             </div>
                            </div>
                         </div>
                           
                         <div class="col-md-12">
                           <div class="form-row">
                              <div class="col-lg-6 mb-6">
                                <label class="col-form-label">Correo electrónico</label>
                                <input class="form-control" type="email" name="email" 
                                {{ $edicion?'enabled':'disabled' }}
                                value="{{ old('email',$legajo->email) }}" autocomplete='email'>
                             </div>
                             <div class="col-lg-6 mb-6">
                                <label class="col-form-label">Página Web</label>
                                <input class="form-control" type="text" name="web" 
                                {{ $edicion?'enabled':'disabled' }}
                                value="{{ old('web',$legajo->web) }}" >
                             </div> 
                          </div>
                         </div>
                    </div>
                </div>

                <br><br>

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
                   <div class="col-md-10" style="text-align: right;">
                       @if($edicion == true)
                           <button class="btn btn-labeled btn-success mb-2">
                             <span class="btn-label"><i class="fa fa-check"></i>
                             </span>Grabar
                           </button>
                            
                           <a href="{{ url('/datosempresa') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/datosempresa/add/{{ $legajo?$legajo->id:'' }}">Editar</a>
                      @endif
                    </div>

                   
               </div>
             <!-- END card-->
          
       </div>
    </div>
</div>
</form>
    
@endsection
