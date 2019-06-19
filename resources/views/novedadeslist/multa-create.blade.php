<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
<!-- Modals must be declare at body level so the content overlaps the background-->
<!-- Modal Large-->
<div class="modal fade" id="myModal-multac" name="myModal-multac" tabindex="-2" role="dialog" aria-labelledby="multa-create" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <form method="post" action="{{ url('/rto/add') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="multa-create">Agregar Multa</h4>
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
                <div class="col-lg-3 mb-3">
                   <label class="col-form-label">Dominio * </label>
                   <div class="input-group " name="legajo" id="legajo" data-provide="" keyboardNavigation="false">

                       <input class="form-control" type="text" value="{{ $legajo->dominio }}" name="rto_dominio" id="rto_dominio"
                       required autocomplete="off" maxlength="7" style="width: 80px" disabled>
                     </div>
                </div>

                <div class="col-lg-3 mb-3">
                   <label class="col-form-label">Nro. Interno</label>
                   <input class="form-control" type="text" name="rto_interno" id="rto_interno"
                   disabled
                   value="{{ old('codigo',$legajo->codigo) }}" autocomplete='off'>
                </div>

                <div class="col-lg-6 mb-6">
                   <label class="col-form-label">Detalle</label>
                   <input class="form-control" type="text" name="detalle" id="detalle"
                   disabled
                   value="{{ old('codigo',$legajo->detalle) }}" autocomplete='off'>
                </div>

             </div>
          </div>

         <div class="col-lg-12 mb-12">
            <div class="form-row">
                 <div class="col-lg-3 mb-3">
                    <label class="col-form-label">Fecha revisión * </label>
                        <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                            keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                            <input class="form-control" type="text" value="{{ old('fecha',$legajoNew->fecha) }}" name="rto_fecha" id="rto_fecha"
                                enabled required autocomplete="off" autofocus="on">
                            <span class="input-group-append input-group-addon">
                              <span class="input-group-text fa fa-calendar"></span>
                            </span>
                        </div>
                 </div>
                 <div class="col-lg-3 mb-3">
                     <label class="col-form-label" id="lblfecha2" >Importe * </label>
                         <input class="form-control" type="number" value="{{ old('importe',$legajoNew->importe) }}"
                                  name="multa_importe" id="multa_importe"
                                  required autocomplete="off" onchange="calcularDias()">


                 </div>
              </div>
          </div>

          <div class="col-lg-12 mb-12">
             <div class="form-row">
                  <div class="col-lg-3 mb-3">
                     <label class="col-form-label">Fecha Pago * </label>
                         <div class="input-group date" id="datetimepicker1" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                             keyboardNavigation="true" title="Seleccione fecha" autoclose="true">
                             <input class="form-control" type="text" value="{{ old('fecha',$legajoNew->fecha) }}" name="rto_fecha" id="rto_fecha"
                                 enabled required autocomplete="off" autofocus="on">
                             <span class="input-group-append input-group-addon">
                               <span class="input-group-text fa fa-calendar"></span>
                             </span>
                         </div>
                  </div>
               </div>
           </div>

          <div class="col-lg-12 mb-12">
              <label class="col-form-label">Comentarios</label>
              <textarea cols="7" placeholder=".." class="form-control" enabled
              name="rto_detalle" id="rto_detalle">{{ $legajoNew->detalle }}</textarea>
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
