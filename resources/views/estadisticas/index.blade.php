<!-- Vista de Legajos Activos -->

@extends('layouts.app')

@section('styles')
  <!-- CHARTIST -->
  <link rel="stylesheet" href="vendor/chartist/dist/chartist.css">
@endsection

@section('content')

<form method="post" action="{{ url('/estadisticas') }}" enctype="multipart/form-data">

{{ csrf_field() }}

<div class="content-heading" style="height: 67px;max-height: 90px">
   <div>Estadísticas
      <small></small>
   </div>

   <div class="col-md-6">
   </div>
   <div class="col-md-4" style="text-align: right;">
   </div>
</div>

<div class="container-fluid">
     <div class="row">
        <div class="col-lg-4">
           <div class="card card-default">
              <div class="card-header">Bar bipolar</div>
              <div class="card-body">
                 <div id="ct-bar1"></div>
              </div>
           </div>
        </div>
        <div class="col-lg-4">
           <div class="card card-default">
              <div class="card-header">Bar Horizontal</div>
              <div class="card-body">
                 <div id="ct-bar2"></div>
              </div>
           </div>
        </div>
        <div class="col-lg-4">
           <div class="card card-default">
              <div class="card-header">Line</div>
              <div class="card-body">
                 <div id="ct-line1"></div>
              </div>
           </div>
        </div>
     </div>
     <div class="row">
        <div class="col-lg-6">
           <div class="card card-default">
              <div class="card-header">Smil Animations</div>
              <div class="card-body">
                 <div id="ct-line2"></div>
              </div>
           </div>
        </div>
        <div class="col-lg-6">
           <div class="card card-default">
              <div class="card-header">SVG Path Animations</div>
              <div class="card-body">
                 <div id="ct-line3"></div>
              </div>
           </div>
        </div>
     </div>
  </div>

</form>


@endsection



@section('scripts')
    <!-- CHARTIST-->
    <script src="vendor/chartist/dist/chartist.js"></script>
@endsection
