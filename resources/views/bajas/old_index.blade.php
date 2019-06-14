<!-- Vista de Legajos Activos -->

@extends('layouts.app')

@section('content')

<form method="post" action="{{ url('/home/add') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="content-heading" style="height: 67px;max-height: 90px">
   <div>Legajos de Baja
      <small></small>
   </div>

   <div class="col-md-6">
   </div>
   <div class="col-md-4" style="text-align: right;">
       @if($edicion == true)
           <button class="btn btn-success">Grabar nueva categoría !</button>

           <button class="btn btn-labeled btn-success mb-2" type="button">
             <span class="btn-label"><i class="fa fa-check"></i>
             </span>Grabar
           </button>
            
           <a href="{{ url('/home') }}" class="btn btn-labeled btn-danger mb-2">
              <span class="btn-label"><i class="fa fa-times"></i>
              </span>Cancelar
           </a>
      @else
           <a class="btn btn-oval btn-success" href="/home/add" >Agregar</a>
           <a class="btn btn-oval btn-success" href="/home/edit">Editar</a>
           <a class="btn btn-oval btn-danger" href="/home/delete">Borrar</a>
      @endif
    </div>
</div>

<div class="col-md-12">
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
                              {{ $edicion?'enabled':'disabled' }}
                              value="{{ $legajo->codigo }}" maxlength="4" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="col-form-label">CUIL *</label>
                            <input class="form-control" type="text" name="cuil"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ $legajo->cuil }}" maxlength="11" required>
                        </div>
                   </div>
                </div>

                <div class="col-md-10">
                      <label class="col-form-label">Apellidos *</label>
                      <input class="form-control" type="text" name="detalle" id="detalle"
                      {{ $edicion?'enabled':'disabled' }}
                      value="{{ $legajo->detalle }}" required>
                </div>
                  
                <div class="col-md-10">
                      <label class="col-form-label">Nombres *</label>
                      <input class="form-control" type="text" name="nombres" 
                      {{ $edicion?'enabled':'disabled' }}
                      value="{{ $legajo->nombres }}" required>
                </div>

                <div class="col-md-10">
                     <div class="form-row">
                        <div class="col-lg-6 mb-3">
                            <label class="col-form-label">Fecha de Alta *</label>
                            <input class="form-control" type="text" name="alta"
                            {{ $edicion?'enabled':'disabled' }}
                            value="{{ $legajo->alta }}" required>
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
                                <div class="col-lg-2 mb-3">
                                  <label class="col-form-label">Fecha Nacimiento</label>
                                  <input class="form-control" type="text" name="fecha_naci" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->fecha_naci }}">
                                </div>
                                <div class="col-lg-2 mb-3">
                                  <label class="col-form-label">Edad (Años-meses)</label>
                                  <input class="form-control" type="text" name="edad" 
                                  disabled="" required>
                                </div>
                                <div class="col-lg-2 mb-3">
                                  <label class="col-form-label">Nacionalidad</label>
                                  <input class="form-control" type="text" name="nacionali" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->nacionali }}" >
                                </div>
                             </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Provincia</label>
                                  <input class="form-control" type="text" name="provin" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->provin }}" >
                                  </div>
                                  <div class="col-lg-3 mb-3">
                                    <label class="col-form-label">Localidad</label>
                                    <input class="form-control" type="text" name="locali" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->locali }}" >
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Calle/Mza</label>
                                  <input class="form-control" type="text" name="domici" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->domici }}" >
                                  </div>
                                  <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Nro/Casa/Lote</label>
                                    <input class="form-control" type="text" name="nro" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->nro }}" >
                                  </div>
                                  <div class="col-lg-3 mb-3">
                                    <label class="col-form-label">Piso</label>
                                    <input class="form-control" type="text" name="piso" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->piso }}" >
                                  </div>
                              </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Dpto</label>
                                    <input class="form-control" type="text" name="dpto" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->dpto }}" >
                                </div>
                                <div class="col-lg-5 mb-3">
                                  <label class="col-form-label">Barrio</label>
                                  <input class="form-control" type="text" name="barrio" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->barrio }}" >
                               </div>
                              </div>
                           </div>
                           
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                    <label class="col-form-label">Telefono fijo</label>
                                    <input class="form-control" type="text" name="tel1" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->tel1 }}" >
                                </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Telefono movil</label>
                                  <input class="form-control" type="text" name="tel2" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->tel2 }}">
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Otro Telefono</label>
                                  <input class="form-control" type="text" name="tel3" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->tel3 }}">
                               </div>
                              </div>
                           </div>
                           
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Correo electrónico</label>
                                  <input class="form-control" type="text" name="email" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->email }}" >
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Página Web</label>
                                  <input class="form-control" type="text" name="web" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->web }}" >
                               </div>
                            </div>
                           </div>
                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Estado Civil</label>
                                  <input class="form-control" type="text" name="est_civil" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->est_civil }}" >
                               </div>
                               <div class="col-lg-4 mb-3"">
                                  <label class="col-form-label">Salud</label>
                                  <input class="form-control" type="text" name="salud" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->salud }}" >
                               </div>
                               <div class="col-lg-4 mb-3"">
                                  <label class="col-form-label">Sexo</label>
                                  <input class="form-control" type="text" name="sexo" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->sexo }}" >
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
                                  <input class="form-control" type="text" name="cod_centro" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_centro }}">
                                </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Jerarquia</label>
                                  <input class="form-control" type="text" name="cod_jerarq" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_jerarq }}" >
                               </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Categoria</label>
                                  <input class="form-control" type="text" name="cod_categ" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_categ }}" >
                               </div>
                             </div>
                         </div>
                         
                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Sector</label>
                                  <input class="form-control" type="text" name="codsector" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->codsector }}" >
                                </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Tarea</label>
                                  <input class="form-control" type="text" name="funcion" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->funcion }}" >
                               </div>
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Cuadrilla</label>
                                  <input class="form-control" type="text" name="cuadrilla" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cuadrilla }}" >
                               </div>
                             </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Obra social</label>
                                  <input class="form-control" type="text" name="cod_obsoc" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_obsoc }}" >
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Sindicato</label>
                                  <input class="form-control" type="text" name="cod_sindic" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_sindic }}" >
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Convenio</label>
                                  <input class="form-control" type="text" name="convenio" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->convenio }}" >
                              </div>
                            </div>
                         </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Contrato</label>
                                  <input class="form-control" type="text" name="cod_contra" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->cod_contra }}" >
                               </div>
                               <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Vencimiento cto.</label>
                                  <input class="form-control" type="text" name="fecha_vto" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->fecha_vto }}" >
                               </div>
                             
                             <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Situación</label>
                                  <input class="form-control" type="text" name="situacion" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->situacion }}" >
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
                                      <input type="checkbox" name="preg1" value="{{ $legajo->preg1 }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Lee y escribe ?   </label>
                                  </div>
                               </div>
                           </div>

                           <div class="col-md-10">
                               <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg2" value="{{ $legajo->preg2 }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Maneja ?</label>
                                  </div>
                               </div>
                           </div>

                           <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Categoria</label>
                                  <input class="form-control" type="text" name="deta2" 
                                  {{ $edicion?'enabled':'disabled' }} value="{{ $legajo->deta2 }}">
                               </div>
                             </div>
                          </div>

                          <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg3" value="{{ $legajo->preg3 }}" {{ $edicion?'enabled':'disabled' }}>
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
                                  value="{{ $legajo->deta3 }}" >
                               </div>
                             </div>
                          </div>

                         <div class="col-md-10">
                             <div class="form-row">
                                <div class="col-lg-4 mb-3">
                                  <label class="col-form-label">Vencimiento licencia</label>
                                  <input class="form-control" type="text" name="deta4" 
                                  {{ $edicion?'enabled':'disabled' }}
                                  value="{{ $legajo->deta4 }}" >
                               </div>
                             </div>
                          </div>

                          <div class="col-md-10">
                             <div class="form-row">
                                <div class="form-row">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="preg4" value="{{ $legajo->preg4 }}" {{ $edicion?'enabled':'disabled' }}>
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
                                      <input type="checkbox" name="preg5" value="{{ $legajo->preg5 }}" {{ $edicion?'enabled':'disabled' }}>
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
                                      <input type="checkbox" name="preg6" value="{{ $legajo->preg6 }}" {{ $edicion?'enabled':'disabled' }}>
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
                                      <input type="checkbox" name="preg7" value="{{ $legajo->preg7 }}" {{ $edicion?'enabled':'disabled' }}>
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
                                      <input type="checkbox" name="reloj_usa" value="{{ $legajo->reloj_usa }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ficha en relojes electrónicos ?   </label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="reloj_ignora" value="{{ $legajo->reloj_ignora }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ocultar horas normales registradas en informes ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="reloj_ignext" value="{{ $legajo->reloj_ignext }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Ocultar horas extras registradas en informes ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="pago_asist" value="{{ $legajo->pago_asist }}" {{ $edicion?'enabled':'disabled' }}>
                                      <span class="fa fa-check"></span>Abonar premio por asistencia quincenal/mensual según CCT ?</label>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="checkbox c-checkbox">
                                      <label>
                                      <input type="checkbox" name="pago_asist" value="{{ $legajo->pago_asist }}" {{ $edicion?'enabled':'disabled' }}>
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
                                    value="{{ $legajo->cod_fichad }}" >
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
                                    <input class="form-control" type="text" name="formap" 
                                    {{ $edicion?'enabled':'disabled' }}
                                    value="{{ $legajo->formap }}">
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
                                      value="{{ $legajo->sucursal }}">
                                    </div>

                                    <div class="col-md-10">
                                       <div class="form-row">
                                          <div class="col-lg-4 mb-3">
                                            <label class="col-form-label"># Cuenta </label>
                                            <input class="form-control" type="text" name="cuenta" 
                                            {{ $edicion?'enabled':'disabled' }}
                                            value="{{ $legajo->cuenta }}">
                                         </div>

                                         <div class="col-lg-4 mb-3">
                                            <label class="col-form-label">CBU</label>
                                            <input class="form-control" type="text" name="cbu" 
                                            {{ $edicion?'enabled':'disabled' }}
                                            value="{{ $legajo->cbu }}" >
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
                           <button class="btn btn-labeled btn-success mb-2" type="button">
                             <span class="btn-label"><i class="fa fa-check"></i>
                             </span>Grabar
                           </button>
                            
                           <a href="{{ url('/home') }}" class="btn btn-labeled btn-danger mb-2">
                             <span class="btn-label"><i class="fa fa-times"></i>
                             </span>Cancelar
                           </a>
                      @else
                           <a class="btn btn-oval btn-success" href="/home/add" >Agregar</a>
                           <a class="btn btn-oval btn-success" href="/home/edit">Editar</a>
                           <a class="btn btn-oval btn-danger" href="/home/delete">Borrar</a>
                      @endif
                    </div>

                   
               </div>

             </div>
             <!-- END card-->
          
       </div>
    </div>
</div>
</form>
    
@endsection
