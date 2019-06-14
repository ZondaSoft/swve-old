<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
<!-- Modals must be declare at body level so the content overlaps the background-->
<!-- Modal Large-->
<div class="modal fade" id="myModalEdit" name="myModalEdit" tabindex="-2" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true">
  <div class="modal-dialog modal-lg">


    @if ($novedades->count() > 0)
        <form method="post" action="{{ url('/novedadeslist/edit/'.$novedad->id) }}" enctype="multipart/form-data" name="modal-edit" id="modal-edit">
    @else
        <form method="post" action="{{ url('/novedadeslist/edit/') }}" enctype="multipart/form-data" name="modal-edit" id="modal-edit">
    @endif


    {{ csrf_field() }}

     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="myModalLabelLarge">Editar novedad     #</h4>

           <div class="col-lg-3 mb-3" style="max-height: 3px;borderWidth: 0px">
               <input class="form-control" type="text" value="{{ $novedad->id }}" id="nid"
                 name="nid" readonly autocomplete="off">
           </div>

           <button class="close" type="button" data-dismiss="modal" aria-label="Close" autofocus tabindex="-1">
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
                       <div class="input-group " id="nro_legajo" data-provide=""
                           keyboardNavigation="false" title="Ingrese un Nro. legajo">

                           @if ($novedades->count() > 0)
                              <input class="form-control" type="text" value="{{ $novedad->legajo }}" id="legajoEdit"
                                  name="legajoEdit" disabled required autocomplete="off" maxlength="4" style="width: 190px">
                           @endif

                           <!-- onkeyup="saltar(event,'cod_nov')" -->

                       </div>
                </div>

                 <div class="col-lg-8 mb-8">
                    <label class="col-form-label">Apellidos y Nombres</label>
                    @if ($novedades->count() > 0)
                        <input class="form-control" type="text" name="ApynomEdit" id="ApynomEdit"
                          disabled
                          value="{{ $novedad->Apynom }}" autocomplete='off'>


                    @endif
                 </div>

             </div>
          </div>

         <div class="col-md-12">
              <div class="form-row">
                 <div class="col-lg-4 mb-4">
                      <label class="col-form-label">Novedad *</label>
                      <div class="input-group " id="cod_novedad" data-provide=""
                          keyboardNavigation="false" title="Ingrese un código de novedad">

                          @if ($novedades->count() > 0)
                              <input class="form-control" type="text" value="{{ $novedad->cod_nov }}" name="cod_novEdit" id="cod_novEdit"
                              autofocus disabled required maxlength="6" autocomplete="off" style="width: 190px">  <!-- onkeyup="saltar(event,'cod_nov')" -->
                          @endif

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
                    @if ($novedades->count() > 0)
                        <input class="form-control" type="text" name="CodNovNameEdit" id="CodNovNameEdit"
                          disabled
                          value="{{ $novedad->CodNovName }}" autocomplete='off'>
                    @endif

                 </div>

             </div>
          </div>

         <div class="col-lg-12 mb-12">
           <div class="form-row">
              <div class="col-lg-3 mb-3">
                  <label class="col-form-label">Fecha * </label>
                      <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                          keyboardNavigation="true" title="Seleccione fecha" autoclose="true">

                          @if ($novedades->count() > 0)
                              <input class="form-control" type="text" value="{{ old('fecha',$novedad->fecha) }}" name="fechaEdit" id="fechaEdit"
                                  disabled required autocomplete="off">
                          @endif

                          <span class="input-group-append input-group-addon">
                            <span class="input-group-text fa fa-calendar"></span>
                          </span>
                      </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <label class="col-form-label">Hasta fecha * </label>
                        <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                            keyboardNavigation="true" title="Seleccione fecha" autoclose="true">

                            @if ($novedades->count() > 0)
                                <input class="form-control" type="text" value="{{ old('hasta',$novedad->hasta) }}" name="fechaEdit2" id="fechaEdit2"
                                    disabled required autocomplete="off" onchange="calcularDias()">
                            @endif

                            <span class="input-group-append input-group-addon">
                              <span class="input-group-text fa fa-calendar"></span>
                            </span>
                        </div>
                </div>


                <div class="col-lg-2 mb-2">
                    <label class="col-form-label">Dias</label>
                    @if ($novedades->count() > 0)
                        <input class="form-control" type="number" name="diasEdit" id="diasEdit"
                            disabled
                            value="{{ old('dias',$novedad->dias) }}">
                    @endif
                </div>

                <div class="col-lg-1 mb-1">
                    <label class="col-form-label">&nbsp;</label>
                </div>

                @if ($novedades->count() > 0)
                <div class="col-lg-3 mb-3">
                    @if ($novedad->cod_nov == 'VACAC')
                        <label class="col-form-label" id="lblconcepto">Año a imputar * </label>

                        <input class="form-control" type="text" name="concepto" id="concepto"
                                enabled required autofocus
                                value="{{ old('concepto',$novedad->concepto) }}" disabled>

                    @else
                        <label class="col-form-label" id="lblconcepto" hidden>Imputación * </label>

                        <input class="form-control" type="text" name="concepto" id="concepto"
                                enabled required autofocus
                                value="{{ old('concepto',$novedad->concepto) }}" disabled hidden>
                    @endif
                </div>
                @endif
            </div>
         </div>


         <div class="col-lg-3 mb-3">
              <label class="col-form-label">Cantidad</label>
              @if ($novedades->count() > 0)
                  <input class="form-control" type="number" name="cantidadEdit" id="cantidadEdit"
                      enabled required autofocus
                      value="{{ old('cantidad',$novedad->cantidad) }}">
              @endif
         </div>

         <div class="col-lg-12 mb-12">
              <label class="col-form-label">Comentarios</label>
              @if ($novedades->count() > 0)
                <textarea cols="7" placeholder=".." class="form-control" enabled
                    name="comenta1Edit" id="comenta1Edit">{{ $novedad->comenta1 }}</textarea>
              @endif
         </div>

         <div class="errors">
         </div>


        </div>
        <div class="modal-footer">
           <div class="col-lg-9 mb-9">
              <button class="btn btn-warning" type="submit" name="btngrabar" id="btngrabar" style="height: 35.533px" value='borrar'>
                <span class="btn-label"><i class="fa fa-trash"></i>
                </span>Borrar !</button>
           </div>

           <button class="btn btn-danger" type="button" data-dismiss="modal" name="btncancelar" id="btncancelar"> Cancelar </button>
           <button class="btn btn-success" type="submit" name="btngrabar" id="btngrabar" value="grabar"> Grabar... </button>
           <!-- <input type="submit" value="Enviar información"> -->
        </div>
     </div>

   </form>

  </div>
</div>
