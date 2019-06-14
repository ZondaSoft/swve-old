<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
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

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

         <div class="col-md-12">
              <div class="form-row">
                <div class="col-lg-4 mb-4">
                   <label class="col-form-label">Legajo * </label>
                   <div class="input-group " id="legajo" data-provide="" keyboardNavigation="false" title="Ingrese un Nro. legajo">

                       <input class="form-control" type="text" value="{{ $legajoNew->legajo }}" id="dni"
                       name="dni" autofocus enabled required autocomplete="off" maxlength="4" style="width: 190px">

                       <span class="input-group-append input-group-addon">
                         <a href="/home/search2" class="input-group-text fa fa-search"></a>
                       </span>
                     </div>
                </div>

                 <div class="col-lg-8 mb-8">
                    <label class="col-form-label">Apellidos y Nombres</label>
                    <input class="form-control" type="text" name="detalle" id="detalle"
                    disabled
                    value="{{ old('detalle',$legajoNew->detalle) }}" autocomplete='off'>
                 </div>

             </div>
          </div>

         <div class="col-md-12">
              <div class="form-row">
                 <div class="col-lg-4 mb-4">
                      <label class="col-form-label">Novedad *</label>
                      <div class="input-group" id="cod_novedad" data-provide="" keyboardNavigation="false" title="Ingrese un código de novedad">

                          <input class="form-control" type="text" value="{{ old('cod_nov',$legajoNew->cod_nov) }}"
                          name="cod_nov" id="cod_nov" autofocus enabled required maxlength="6" autocomplete="off" style="width: 190px"
                          onchange="tipoNovedad(this)">  <!-- onkeyup="saltar(event,'cod_nov')" -->

                          <span class="input-group-append input-group-addon">
                            <a href="/codnoved/search2" class="input-group-text fa fa-search"></a>
                          </span>
                      </div>
                 </div>

                 <div class="col-lg-8 mb-8">
                    <label class="col-form-label">Descripción</label>
                    <input class="form-control" type="text" name="CodNovName" id="CodNovName"
                    readonly
                    value="{{ old('CodNovName',$legajoNew->CodNovName) }}" autocomplete='off'>
                 </div>

             </div>
          </div>

          <div class="col-lg-12 mb-12">
            <div class="form-row">
                 <div class="col-lg-3 mb-3">
                    <label class="col-form-label">Fecha * </label>
                        <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                            keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                            <input class="form-control" type="text" value="{{ old('fecha',$legajoNew->fecha) }}" name="fecha" id="fecha"
                            enabled required autocomplete="off">
                            <span class="input-group-append input-group-addon">
                              <span class="input-group-text fa fa-calendar"></span>
                            </span>
                        </div>
                 </div>
                 <div class="col-lg-3 mb-3">
                     <label class="col-form-label" id="lblfecha2" >Hasta fecha * </label>
                         <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                             keyboardNavigation="true" title="Seleccione fecha" autoclose="true">

                             <input class="form-control" type="text" value="{{ old('hasta',$legajoNew->hasta) }}" name="fecha2" id="fecha2"
                                     required autocomplete="off" onchange="calcularDias()">

                             <span class="input-group-append input-group-addon" id="btncalendar2">
                               <span class="input-group-text fa fa-calendar"></span>
                             </span>
                         </div>
                 </div>

                 <div class="col-lg-2 mb-2">
                     <label class="col-form-label" id="lbldias" >Dias</label>
                     <input class="form-control" type="number" name="dias" id="dias"
                             disabled
                             value="{{ old('dias',$legajoNew->dias) }}" >
                 </div>

                 <div class="col-lg-1 mb-1">
                     <label class="col-form-label">&nbsp;</label>
                 </div>

                 <div class="col-lg-3 mb-3">
                     <label class="col-form-label" id="lblconcepto">Imputación * </label>
                     <input class="form-control" type="text" name="concepto" id="concepto"
                             enabled required autofocus
                             value="{{ old('concepto',$legajoNew->concepto) }}" >
                 </div>
              </div>
          </div>

          <div class="col-lg-3 mb-3">
              <label class="col-form-label">Cantidad</label>
              <input class="form-control" type="number" name="cantidad" id="cantidad"
              enabled required
              value="{{ old('cantidad',$legajoNew->cantidad) }}">
          </div>

          <div class="col-lg-12 mb-12">
              <label class="col-form-label">Comentarios</label>
              <textarea cols="7" placeholder=".." class="form-control" enabled
              name="comenta1" id="comenta1">{{ $legajoNew->comenta1 }}</textarea>
          </div>

          <div class="errors">
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
