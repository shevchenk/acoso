<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @section('description')
      <meta name="description" content="Software formulario de denuncia">
    @show
    
    @section('author')
      <meta name="author" content="Ing. Jorge Salcedo Franco (Shevchenko)">
    @show

    <title>.::Confidencial::.</title>

    @section('include')
      <link rel="apple-touch-icon" href="Config/icon.png">
      <link rel="shortcut icon" href="Config/logo_ico.jpg">
      
      <link rel="stylesheet" href="Include/Bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="Include/Bootstrap/css/bootstrap-extend.css">
      <link rel="stylesheet" href="Include/Css/site.css">
      
      <link rel="stylesheet" href="Include/Animsition/animsition.min.css">
      <link rel="stylesheet" href="Include/Jquery-Asscrollable/asscrollable.min.css">
      <link rel="stylesheet" href="Include/Switchery/switchery.min.css">
      <link rel="stylesheet" href="Include/Introjs/introjs.min.css">
      <link rel="stylesheet" href="Include/Jquery-Slidepanel/slidepanel.min.css">
      <link rel="stylesheet" href="Include/Flagicon/flagicon.min.css">
      
      <link rel="stylesheet" href="Include/Glyphicon/glyphicon.min.css">
      <link rel="stylesheet" href="Include/Sweetalert/sweetalert.min.css">
      <link rel="stylesheet" href="Include/Animate/animate.css">
      
      <link rel="stylesheet" href="Include/Webicons/webicons.min.css">
      <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

      <script src="Include/Jquery/jquery.min.js"></script>
      <script src="Include/Popper/popper.min.js"></script>
      <script src="Include/Bootstrap/js/bootstrap.min.js"></script>
      <script src="Include/Animsition/animsition.min.js"></script>
      <script src="Include/Jquery-Mousewheel/mousewheel.min.js"></script>
      <script src="Include/Jquery-Asscrollbar/asscrollbar.min.js"></script>
      <script src="Include/Jquery-Asscrollable/asscrollable.min.js"></script>
      <script src="Include/Jquery-Ashoverscroll/ashoverscroll.min.js"></script>

      <script src="Include/Switchery/switchery.min.js"></script>
      <script src="Include/Introjs/introjs.min.js"></script> <!-- Para guia de ayuda -->
      <script src="Include/Screenfull/screenfull.min.js"></script>
      <script src="Include/Jquery-Slidepanel/slidepanel.min.js"></script>
      
      <script src="Include/Sweetalert/sweetalert.min.js"></script>
    @show
    @include( 'include.css.master' )
    @include( 'include.js.master' )
  </head>
  <body>
    @include( 'include.layout.cabecera' )
    @include( 'include.layout.opcion' )

    <!-- Page -->
    <div class="page">
      @yield('content')
    </div>
    @if (session('token_mesa_ayuda') != '')
    <button class="site-action btn btn-floating btn-outline btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="IR A LA MESA DE AYUDA" type="button">
    <a href='' target="_blank">
      <i class="icon wb-wrench" aria-hidden="true"></i>
    </a>
    </button>
    @endif
    <!-- End Page -->

    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2020 <a href="https://www.sineace.gob.pe/">SINEACE OTI</a></div>
      <div class="site-footer-right">
        <b>Version</b> 1.0
      </div>
    </footer>
  </body>
</html>
