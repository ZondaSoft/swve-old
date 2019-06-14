<!-- Vista de Legajos Activos -->

@extends('layouts.app')

@section('content')

@if($agregar == true)
    <form method="post" action="{{ url('/bajas/add') }}" enctype="multipart/form-data">
@else
    <form method="post" action="{{ url('/bajas/edit/'. ($legajo?$legajo->id:'')) }}" enctype="multipart/form-data">
@endif

{{ csrf_field() }}

<div class="content-heading" style="height: 67px;max-height: 90px">
   <div>Legajos de Baja
      <small></small>
   </div>

   <div class="col-md-6">
   </div>
   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <!-- <button class="btn btn-success">Grabar nueva categoría !</button> -->

           <button class="btn btn-labeled btn-success mb-2">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>
            
           <a href="{{ url('/bajas') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <button class="btn btn-oval btn-success" type="button" data-toggle="modal" data-target="#myModal">Restaurar</button>
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
                          <div class="col-lg-6 mb-3">
                              <label class="col-form-label">N° de Legajo *</label>
                              <input class="form-control"
                                type="text" name="codigo" id="codigo"
                                {{ $edicion?'':'disabled' }}
                                {{ $agregar?'enabled autofocus=""':'disabled' }}
                                value="{{ old('codigo',$legajo?$legajo->codigo:0) }}" maxlength="4" required>
                          </div>
                          <div class="col-lg-6 mb-3">
                              <label class="col-form-label">CUIL *</label>
                              <input class="form-control" type="text" name="cuil"
                              {{ $edicion?'enabled':'disabled' }}
                              {{ $agregar?'autofocus=""':'autofocus=""' }}
                              value="{{ old('cuil',$legajo?$legajo->cuil:'') }}" maxlength="11" required autocomplete='off'autofocus="">
                          </div>

                          @if ($errors->has('codigo'))
                              <div class="alert alert-danger">
                                  <ul>
                                    <li>{{ $errors->first('codigo') }}</li>
                                  </ul>
                              </div>
                          @endif

                          @if ($errors->has('cuil'))
                              <div class="alert alert-danger">
                                  <ul>
                                    <li>{{ $errors->first('cuil') }}</li>
                                  </ul>
                              </div>
                          @endif
                     </div>
                  </div>

                  <div class="col-md-10">
                        <label class="col-form-label">Apellidos *</label>
                        <input class="form-control" type="text" name="detalle" id="detalle"
                        {{ $edicion?'enabled':'disabled' }}
                        value="{{ old('detalle',$legajo?$legajo->detalle:'') }}" >

                        @if ($errors->has('detalle'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ $errors->first('detalle') }}</li>
                                </ul>
                            </div>
                        @endif

                  </div>
                    
                  <div class="col-md-10">
                        <label class="col-form-label">Nombres *</label>
                        <input class="form-control" type="text" name="nombres" 
                        {{ $edicion?'enabled':'disabled' }}
                        value="{{ old('nombres',$legajo?$legajo->nombres:'') }}" required>

                        @if ($errors->has('nombres'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ $errors->first('nombres') }}</li>
                                </ul>
                            </div>
                        @endif
                  </div>

                  <div class="col-md-10">
                       <div class="form-row">
                          <div class="col-lg-8 mb-3">

                              <label class="col-form-label">Fecha de Alta *</label>
                                <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                  <input class="form-control" type="text" value="{{ old('alta',$legajo->alta) }}" name="alta" {{ $edicion?'enabled':'disabled' }}>
                                  <span class="input-group-append input-group-addon">
                                    <span class="input-group-text fa fa-calendar"></span>
                                  </span>
                              </div>
                          </div>
                          <div class="col-lg-4 mb-3">
                              <label class="col-form-label">Antigüedad</label>
                              <input class="form-control" type="text" name="antig" 
                              {{ $edicion?'enabled':'disabled' }}
                              disabled="" required>
                          </div>
                       </div>
                  </div>
              </div>
          </div>
          
          <!-- Widgets de imagenes -->
          <div class="col-xl-4">
              <div class="card-body">
                    <!-- START card-->
                    <div class="card">
                       <div class="card-body">
                          <img class="img-fluid" src="/img/user/08.jpg" alt="Image">
                       
                          <div class="row text-center">
                             <div class="col-6">
                                <p>Comments</p>
                                <h3 class="m-0 text-primary">700</h3>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- END card-->
              </div>
          </div>
          <!-- </div> -->
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
                     <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" href="" >Datos particulares</a>
                     </h5>
                  </div>
                  <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                     <div class="card-body border-top">

                        <fieldset>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-3 mb-3">
                                  <label class="col-form-label">Fecha Nacimiento</label>
                                    <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                        keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                        <input class="form-control" type="text" value="{{ old('fecha_naci',$legajo->fecha_naci) }}" name="fecha_naci" 
                                        {{ $edicion?'enabled':'disabled' }}>
                                        <span class="input-group-append input-group-addon">
                                          <span class="input-group-text fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>


                                <div class="col-lg-2 mb-3">
                                  <label class="col-form-label">Edad (Años-meses)</label>
                                  <input class="form-control" type="text" name="edad" 
                                  disabled="" required>
                                </div>

                                <div class="col-lg-2 mb-3">
                                  <label class="col-form-label">País de Origen</label>
                                  <select class="form-control" id="nacionali" name="nacionali" {{ $edicion?'enabled':'disabled' }} autocomplete='country-name'>
                                    <option value="Argentina" @if ($legajo->nacionali == "Argentina")  selected   @endif  >Argentina</option>
                                    <option value="Afganistán" @if ($legajo->nacionali == "Afganistán")  selected   @endif >Afganistán</option>
                                    <option value="Alemania" @if ($legajo->nacionali == "Alemania")  selected   @endif  >Alemania</option>
                                    <option value="Arabia" @if ($legajo->nacionali == "Arabia Saudita")  selected   @endif  >Arabia Saudita</option>
                                    <option value="Australia" @if ($legajo->nacionali == "Australia")  selected   @endif  >Australia</option>
                                    <option value="Bélgica" @if ($legajo->nacionali == "Bélgica")  selected   @endif  >Bélgica</option>
                                    <option value="BO" @if ($legajo->nacionali == "Bolivia") selected   @endif  >Bolivia</option>
                                    <option value="BR" @if ($legajo->nacionali == "Brasil")  selected   @endif  >Brasil</option>
                                    <option value="CB" @if ($legajo->nacionali == "Camboya") selected   @endif  >Camboya</option>
                                    <option value="CA" @if ($legajo->nacionali == "Canadá")  selected   @endif  >Canadá</option>
                                    <option value="CH" @if ($legajo->nacionali == "Chile")   selected   @endif  >Chile</option>
                                    <option value="CI" @if ($legajo->nacionali == "China")   selected   @endif  >China</option>
                                    <option value="CO" @if ($legajo->nacionali == "Colombia") selected   @endif  >Colombia</option>
                                    <option value="CR" @if ($legajo->nacionali == "Costa Rica")  selected   @endif  >Costa Rica</option>
                                    <option value="CU" @if ($legajo->nacionali == "Cuba")    selected   @endif  >Cuba</option>
                                    <option value="DI" @if ($legajo->nacionali == "Dinamarca")  selected   @endif  >Dinamarca</option>
                                    <option value="EC" @if ($legajo->nacionali == "Ecuador") selected   @endif  >Ecuador</option>
                                    <option value="ES" @if ($legajo->nacionali == "España")  selected   @endif  >España</option>
                                    <option value="EU" @if ($legajo->nacionali == "Estados Unidos")  selected   @endif  >Estados Unidos</option>
                                    <option value="FR" @if ($legajo->nacionali == "Francia") selected   @endif  >Francia</option>
                                    <option value="GU" @if ($legajo->nacionali == "Guatemala")  selected   @endif  >Guatemala</option>
                                    <option value="HA" @if ($legajo->nacionali == "Haití")   selected   @endif  >Haití</option>
                                    <option value="HO" @if ($legajo->nacionali == "Holanda") selected   @endif  >Holanda</option>
                                    <option value="HD" @if ($legajo->nacionali == "Honduras")  selected   @endif  >Honduras</option>
                                    <option value="IN" @if ($legajo->nacionali == "Inglaterra")  selected   @endif  >Inglaterra</option>
                                    <option value="IS" @if ($legajo->nacionali == "Israel")   selected   @endif  >Israel</option>
                                    <option value="PA" @if ($legajo->nacionali == "Panamá")   selected   @endif  >Panamá</option>
                                    <option value="PY" @if ($legajo->nacionali == "Paraguay") selected   @endif  >Paraguay</option>
                                    <option value="PE" @if ($legajo->nacionali == "Perú")     selected   @endif  >Perú</option>
                                    <option value="RU" @if ($legajo->nacionali == "Rusia")    selected   @endif  >Rusia</option>
                                    <option value="UR" @if ($legajo->nacionali == "Uruguay")  selected   @endif  >Uruguay</option>
                                    <option value="VE" @if ($legajo->nacionali == "Venezuela") selected   @endif  >Venezuela</option>
                                    <option value="VI" @if ($legajo->nacionali == "Vietnam")  selected   @endif  >Vietnam</option>
                                    <option value="OT" @if ($legajo->nacionali == "Otro")  selected   @endif  >Otro</option>
                                  </select>
                                </div>

                             </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Provincia</label>
                                  
                                  <select class="form-control" id="provin" name="provin" {{ $edicion?'enabled':'disabled' }} autocomplete='country-name'>
                                    <option value="00" @if ($legajo->provin == "00")  selected   @endif  >Ciudad Autónoma de Buenos Aires</option>
                                    <option value="01" @if ($legajo->provin == "01")  selected   @endif  >Buenos Aires</option>
                                    <option value="02" @if ($legajo->provin == "02")  selected   @endif  >Catamara</option>
                                    <option value="03" @if ($legajo->provin == "03")  selected   @endif  >Córdoba</option>
                                    <option value="04" @if ($legajo->provin == "04")  selected   @endif  >Corrientes</option>
                                    <option value="05" @if ($legajo->provin == "05")  selected   @endif  >Entre Ríos</option>
                                    <option value="06" @if ($legajo->provin == "06")  selected   @endif  >Jujuy</option>
                                    <option value="07" @if ($legajo->provin == "07")  selected   @endif  >Mendoza</option>
                                    <option value="08" @if ($legajo->provin == "08")  selected   @endif  >La Rioja</option>
                                    <option value="09" @if ($legajo->provin == "09")  selected   @endif  >Salta</option>
                                    <option value="10" @if ($legajo->provin == "10")  selected   @endif  >San Juan</option>
                                    <option value="11" @if ($legajo->provin == "11")  selected   @endif  >San Luis</option>
                                    <option value="12" @if ($legajo->provin == "12")  selected   @endif  >Santa Fe</option>
                                    <option value="13" @if ($legajo->provin == "13")  selected   @endif  >Santiago del Estero</option>
                                    <option value="14" @if ($legajo->provin == "14")  selected   @endif  >Tucumán</option>
                                    <option value="16" @if ($legajo->provin == "16")  selected   @endif  >Chaco</option>
                                    <option value="17" @if ($legajo->provin == "17")  selected   @endif  >Chubut</option>
                                    <option value="18" @if ($legajo->provin == "18")  selected   @endif  >Formosa</option>
                                    <option value="19" @if ($legajo->provin == "19")  selected   @endif  >Misiones</option>
                                    <option value="20" @if ($legajo->provin == "20")  selected   @endif  >Neuquén</option>
                                    <option value="21" @if ($legajo->provin == "21")  selected   @endif  >La Pampa</option>
                                    <option value="22" @if ($legajo->provin == "22")  selected   @endif  >Río Negro</option>
                                    <option value="23" @if ($legajo->provin == "23")  selected   @endif  >Santa Cruz</option>
                                    <option value="24" @if ($legajo->provin == "24")  selected   @endif  >Tierra del Fuego</option>
                                  </select>

                                  </div>
                                  <div class="col-lg-3 mb-3">
                                    <label class="col-form-label">Localidad</label>
                                    <input class="form-control" type="text" name="locali" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('locali',$legajo->locali) }}" >
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Calle/Mza</label>
                                  <input class="form-control" type="text" name="domici" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('domici',$legajo->domici) }}" >
                                  </div>
                                  <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Nro/Casa/Lote</label>
                                    <input class="form-control" type="text" name="nro" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('nro',$legajo->nro) }}" >
                                  </div>
                                  <div class="col-lg-3 mb-3">
                                    <label class="col-form-label">Piso</label>
                                    <input class="form-control" type="text" name="piso" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('piso',$legajo->piso) }}" >
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Dpto</label>
                                    <input class="form-control" type="text" name="dpto" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('dpto',$legajo->dpto) }}" >
                                </div>
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Barrio</label>
                                  <input class="form-control" type="text" name="barrio" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('barrio',$legajo->barrio) }}" >
                               </div>
                              </div>
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
                                  <input class="form-control" type="text" name="tel2" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('tel2',$legajo->tel2) }}" autocomplete='tel'>
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Otro Telefono</label>
                                  <input class="form-control" type="text" name="tel3" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('tel3',$legajo->tel3) }}" autocomplete='tel'>
                               </div>
                              </div>
                           </div>
                           
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Correo electrónico</label>
                                  <input class="form-control" type="email" name="email" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('email',$legajo->email) }}" autocomplete='email'>
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Página Web</label>
                                  <input class="form-control" type="text" name="web" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('web',$legajo->web) }}" >
                               </div>
                            </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Estado Civil</label>
                                  
                                  <select class="form-control" id="est_civil" name="est_civil" {{ $edicion?'enabled':'disabled' }} >
                                    <option value="S" @if ($legajo->est_civil == "S")  selected   @endif  >Soltero(a)</option>
                                    <option value="C" @if ($legajo->est_civil == "C")  selected   @endif  >Casado(a)</option>
                                    <option value="D" @if ($legajo->est_civil == "D")  selected   @endif  >Divorsiado(a)</option>
                                    <option value="O" @if ($legajo->est_civil == "O")  selected   @endif  >Otros</option>
                                  </select>

                               </div>
                               <div class="col-lg-4 mb-3"">
                                  <label class="col-form-label">Salud</label>
                                  
                                  <select class="form-control" id="salud" name="salud" {{ $edicion?'enabled':'disabled' }} >
                                    <option value="N" @if ($legajo->salud == "N")  selected   @endif  >Normal</option>
                                    <option value="I" @if ($legajo->salud == "I")  selected   @endif  >Incapacitado(a)</option>
                                  </select>
                               </div>
                               <div class="col-lg-4 mb-3"">
                                  <label class="col-form-label">Sexo</label>
                                  <select class="form-control" id="sexo" name="sexo" {{ $edicion?'enabled':'disabled' }} >
                                    <option value="M" @if ($legajo->sexo == "M")  selected   @endif  >Masculino</option>
                                    <option value="F" @if ($legajo->sexo == "F")  selected   @endif  >Femenino</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                       </fieldset>

                     </div>
                  </div>
               </div>

               <div class="card card-default mb-1 border-info">
                      <div class="card-header text-white bg-info" id="headingTwo">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" href="">Categorización</a>
                         </h5>
                      </div>
                      <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                         <div class="col-md-10">
                             <div class="form-row">
                                
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Centro de costo</label>
                                  <select class="form-control" id="cod_centro" name="cod_centro" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($ccostos as $ccosto)
                                        <option value = "{{ $ccosto->codigo  }}">
                                          {{ $ccosto->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Jerarquia</label>
                                  <select class="form-control" id="cod_jerarq" name="cod_jerarq" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($jerarquias as $jerarquia)
                                        <option value = "{{ $jerarquia->codigo  }}">
                                          {{ $jerarquia->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>
                                
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Categoria</label>
                                  <select class="form-control" id="cod_categ" name="cod_categ" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($categorias as $categoria)
                                        <option value = "{{ $categoria->codigo  }}">
                                          {{ $categoria->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                               </div>
                             </div>
                         </div>
                         
                         <div class="col-md-10">
                             <div class="form-row">
                                
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Sector</label>
                                  <select class="form-control" id="codsector" name="codsector" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($sectores as $sector)
                                        <option value = "{{ $sector->codigo  }}">
                                          {{ $sector->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Tarea</label>
                                  <input class="form-control" type="text" name="funcion" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->funcion }}" >
                               </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Cuadrilla</label>

                                  <select class="form-control" id="cuadrilla" name="cuadrilla" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($cuadrillas as $cuadrilla)
                                        <option value = "{{ $cuadrilla->codigo  }}">
                                          {{ $cuadrilla->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Obra social</label>
                                  <select class="form-control" id="cod_obsoc" name="cod_obsoc" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($obras as $obra)
                                        <option value = "{{ $obra->codigo  }}">
                                          {{ $obra->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Sindicato</label>
                                  
                                  <select class="form-control" id="cod_sindic" name="cod_sindic" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($sindicatos as $sindicato)
                                        <option value = "{{ $sindicato->codigo  }}">
                                          {{ $sindicato->detalle }}
                                        </option>
                                    @endforeach
                                  </select>

                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Convenio</label>
                                                                
                                  <select class="form-control" id="convenio" name="convenio" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($convenios as $convenio)
                                        <option value = "{{ $convenio->codigo  }}">
                                          {{ $convenio->detalle }}
                                        </option>
                                    @endforeach
                                  </select>

                              </div>
                            </div>
                         </div>

                         <div class="col-md-10">
                            <div class="form-row">
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Contrato</label>
                                  
                                  <select class="form-control" id="cod_contra" name="cod_contra" {{ $edicion?'enabled':'disabled' }}>
                                    @foreach ($contratos as $contrato)
                                        <option value = "{{ $contrato->codigo  }}">
                                          {{ $contrato->detalle }}
                                        </option>
                                    @endforeach
                                  </select>
                              </div>

                              <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Vencimiento cto.</label>
                                  <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy" keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                                      <input class="form-control" type="text" value="{{ $legajo->fecha_vto }}" name="fecha_vto" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="input-group-append input-group-addon">
                                        <span class="input-group-text fa fa-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                             
                              <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Situación</label>
                                  
                                  <select class="form-control" id="situacion" name="situacion" {{ $edicion?'enabled':'disabled' }}>
                                    <option value="P" @if ($legajo->situacion == "P")  selected   @endif  >Permanente</option>
                                    <option value="T" @if ($legajo->situacion == "T")  selected   @endif >Temporario</option>
                                </select>
                              </div>
                            </div>
                         </div>
                      </div>
               </div>

               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingThree">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" href="">Capacidades y estudios</a>
                         </h5>
                      </div>
                      <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                         <div class="card-body border-top">

                            <div class="col-md-10">
                               <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg1" value="{{ old('preg1',$legajo->preg1) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Lee y escribe ?   </label>
                                  </div>
                               </div>
                           </div>

                           <div class="col-md-10">
                               <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg2" value="{{ old('preg2',$legajo->preg2) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Maneja ?</label>
                                  </div>
                               </div>
                           </div>

                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Categoria</label>
                                  <input class="form-control" type="text" name="deta2" 
                                  {{ $edicion?'enabled':'disabled' }} value="{{ old('deta2',$legajo->deta2) }}">
                               </div>
                             </div>
                          </div>

                          <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg3" value="{{ old('preg3',$legajo->preg3) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Manejo de maquinaria pesada?   </label>
                                  </div>
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Tipo</label>
                                  <input class="form-control" type="text" name="deta3" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ old('deta3',$legajo->deta3) }}" >
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Vencimiento licencia</label>
                                  
                                  <div class="input-group date" id="deta4" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                keyboardNavigation="true" title="Vencimiento licencia" autoclose="true">
                                  <input class="form-control" type="text" value="{{ old('deta4',$legajo->deta4) }}" name="deta4" {{ $edicion?'enabled':'disabled' }}>
                                  <span class="input-group-append input-group-addon">
                                    <span class="input-group-text fa fa-calendar"></span>
                                  </span>
                              </div>
                               </div>
                             </div>
                          </div>

                          <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg4" value="{{ old('preg4',$legajo->preg4) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Soldadura ?</label>
                                  </div>
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg5" value="{{ old('preg5',$legajo->preg5) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Carpinteria en madera ?</label>
                                  </div>
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg6" value="{{ old('preg6',$legajo->preg6) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Carpinteria de aluminio?</label>
                                  </div>
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg7" value="{{ old('preg7',$legajo->preg7) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Mecánica liviana?</label>
                                  </div>
                               </div>
                             </div>
                         </div>

                         </div>
                      </div>
               </div>

               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingFour">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" href="">Relojes</a>
                         </h5>
                      </div>
                      <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
                         <div class="card-body border-top">
                             
                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="reloj_usa" value="{{ old('reloj_usa',$legajo->reloj_usa) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ficha en relojes electrónicos ?   </label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="reloj_ignora" value="{{ old('reloj_ignora',$legajo->reloj_ignora) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ocultar horas normales registradas en informes ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="reloj_ignext" value="{{ old('reloj_ignext',$legajo->reloj_ignext) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ocultar horas extras registradas en informes ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="pago_asist" value="{{ old('pago_asist',$legajo->pago_asist) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Abonar premio por asistencia quincenal/mensual según CCT ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="pago_asist" value="{{ old('pago_asist',$legajo->pago_asist) }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Abonar presentismo mensual especial ?</label>
                                  </div>
                                </div>
                             </div>

                             <div class="col-md-10">
                               <div class="form-row">
                                  <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Código tarjeta fichadora:</label>
                                    <input class="form-control" type="text" name="cod_fichad"
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ old('cod_fichad',$legajo->cod_fichad) }}" >
                                 </div>
                               </div>
                            </div>
                         </div>

                         </div>
                      </div>
               </div>

               <div class="card card-default mb-1 border-info">
                      <div class="card-header bg-info" id="headingFour">
                         <h5 class="mb-0"><a class="text-inherit collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" href="">Forma de Pago / Datos adicionales</a>
                         </h5>
                      </div>
                      <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordion">
                         <div class="card-body border-top">
                             
                            <div class="col-md-10">
                               <div class="form-row">
                                  <div class="col-lg-5 mb-3">
                                    <label class="col-form-label">Forma de pago:</label>

                                    <select class="form-control" id="formap" name="formap" {{ $edicion?'enabled':'disabled' }} autocomplete='country-name'>
                                        <option value="E" @if ($legajo->formap == "E")  selected   @endif  >Efectivo</option>
                                        <option value="D" @if ($legajo->formap == "D")  selected   @endif  >Deposito Bancario</option>
                                    </select>

                                    </div>
                                    <div class="col-lg-4 mb-3">
                                      <label class="col-form-label">Banco</label>
                                      <input class="form-control" type="text" name="banco" 
                                      {{ $edicion?'enabled':'disabled' }}
                                      value="{{ $legajo->banco }}">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                      <label class="col-form-label">Sucursal</label>
                                      <input class="form-control" type="text" name="sucursal" 
                                      {{ $edicion?'enabled':'disabled' }}
                                      value="{{ old('sucursal',$legajo->sucursal) }}">
                                    </div>

                                    <div class="col-md-10">
                                       <div class="form-row">
                                          <div class="col-lg-4 mb-3">
                                            <label class="col-form-label"># Cuenta </label>
                                            <input class="form-control" type="text" name="cuenta" 
                                            {{ $edicion?'enabled':'disabled' }}
                                            value="{{ old('cuenta',$legajo->cuenta) }}">
                                         </div>

                                         <div class="col-lg-4 mb-3">
                                            <label class="col-form-label">CBU</label>
                                            <input class="form-control" type="text" name="cbu" 
                                            {{ $edicion?'enabled':'disabled' }}
                                            value="{{ old('cbu',$legajo->cbu) }}" >
                                         </div>
                                       </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                      </div>
               </div>

                
               <div class="card-footer" style="text-align: right;">
                   <div class="col-md-11" style="text-align: right;">
                       @if($edicion == true)
                           <button class="btn btn-labeled btn-success mb-2">
                             <span class="btn-label"><i class="fa fa-check"></i>
                             </span>Grabar
                           </button>
                            
                           <a href="{{ url('/bajas') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <button class="btn btn-oval btn-success" type="button" data-toggle="modal" data-target="#myModal">Restaurar</button>
                      @endif
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
</script>

@endsection
