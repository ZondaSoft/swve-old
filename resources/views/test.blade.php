<html lang="en">

<head>

    <title>Bootstrap Colorpicker Example</title>  

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
   <!-- JQUERY-->
   <script src="{{ asset('js/jquery.js') }}"></script>
   <!-- BOOTSTRAP-->
   <script src="{{ asset('js/popper.js') }}"></script>
   <script src="{{ asset('js/bootstrap.js') }}"></script>
   <!-- STORAGE API-->
   <script src="{{ asset('js/js.storage.js') }}"></script>
   <!-- JQUERY EASING-->
   <script src="{{ asset('js/jquery.easing.js') }}"></script>
   <!-- ANIMO-->
   <script src="{{ asset('js/animo.js') }}"></script>
   <!-- SCREENFULL-->
   <script src="{{ asset('js/screenfull.js') }}"></script>
   <!-- LOCALIZE-->
   <script src="{{ asset('js/jquery.localize.js') }}"></script>



   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- CHOSEN-->
   <script src="{{ asset('js/chosen.jquery.js') }}"></script>
   <!-- SLIDER CTRL-->
   <script src="{{ asset('js/bootstrap-slider.js') }}"></script>
   <!-- MOMENT JS-->
   <script src="{{ asset('js/moment-with-locales.js') }}"></script>
   <!-- DATETIMEPICKER-->
   <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('js/app.js') }}"></script>

   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('js/app.js') }}"></script>

   <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>

   <script>
      $(function () {
        $('#cp2, #cp3a, #cp3b').colorpicker();
        $('#cp4').colorpicker({"color": "#16813D"});
      });
   </script>

   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
    <link rel="stylesheet" href="{{ asset('css/theme-g.css') }}" id="maincss">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.css') }}" id="maincss">
</head>

<body>

<div id="cp2" class="input-group" title="Using input value">
  <input type="text" class="form-control input-lg" value="#DD0F20FF"/>
  <span class="input-group-append">
    <span class="input-group-text colorpicker-input-addon"><i></i></span>
  </span>
</div>

<div id="cp3a" class="input-group" data-color="rgb(241, 138, 49)"
     title="Using data-color attribute in the colorpicker element">
  <input type="text" class="form-control input-lg"/>
  <span class="input-group-append">
    <span class="input-group-text colorpicker-input-addon"><i></i></span>
  </span>
</div>

<div id="cp3b" class="input-group" title="Using data-color attribute in the input">
  <input type="text" class="form-control input-lg" data-color="hsl(56, 93%, 63%)"/>
  <span class="input-group-append">
    <span class="input-group-text colorpicker-input-addon"><i></i></span>
  </span>
</div>

<div id="cp4" class="input-group" title="Using color option">
  <input type="text" class="form-control input-lg"/>
  <span class="input-group-append">
    <span class="input-group-text colorpicker-input-addon"><i></i></span>
  </span>
</div>

<script>
  $(function () {
    $('#cp2, #cp3a, #cp3b').colorpicker();
    $('#cp4').colorpicker({"color": "#16813D"});
  });
</script>

</body>

</html>