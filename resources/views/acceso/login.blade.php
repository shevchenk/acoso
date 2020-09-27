<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @section('description')
      <meta name="description" content="Software Confidencial">
    @show
    
    @section('author')
      <meta name="author" content="Ing. Jorge Salcedo Franco (Shevchenko)">
    @show

    <title>.::Confidencial::.</title>

    @section('include')
      <link rel="apple-touch-icon" href="Config/apple-touch-icon.png">
      <link rel="shortcut icon" href="Config/favicon.ico">
      
      <link rel="stylesheet" href="Include/Bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="Include/Bootstrap/css/bootstrap-extend.css">
      <link rel="stylesheet" href="Include/Css/site.css">
      
     
      <link rel="stylesheet" href="Include/Fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="Include/Glyphicon/glyphicon.min.css">
      <link rel="stylesheet" href="Include/Sweetalert/sweetalert.min.css">
      <link rel="stylesheet" href="Include/Animate/animate.css">
      
      <script src="Include/Jquery/jquery.min.js"></script>
      <script src="Include/Popper/popper.min.js"></script>
      <script src="Include/Bootstrap/js/bootstrap.min.js"></script>
      <script src="Include/Fontawesome/js/fontawesome.min.js"></script>
      <script src="Include/Sweetalert/sweetalert.min.js"></script>
    @show
    @include( 'include.css.master' )
    @include( 'acceso.css.login' )
    @include( 'include.js.master' )
    @include( 'acceso.js.login' )
    @include( 'acceso.js.login_ajax' )
  </head>
  <body class="theme-purple" onkeyup="return masterG.enterGlobal(event,'#btnIniciar');">
    <!-- Page -->
    <div class="fondo"> <img src="{{ asset('Config/fondo.jpg') }}"> </div>
    <section id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="mobile-logo">
                        <img src="{{ asset('Config/logo.jpg') }}" alt="SINEACE">
                    </div>
                    <div class="auth-left">
                        <div class="left-top">
                            <a href="#">
                                <img src="{{ asset('Config/logo-calado-negro.png') }}" alt="SINEACE" class="logo-login">
                                <span></span>
                            </a>
                        </div>
                        <div class="left-slider">
                            <img src="{{ asset('Config/banner_login.jpg') }}" class="img-fluid" alt="EBTP">
                        </div>
                    </div>
                    <div class="auth-right">
                        <div class="col-lg-12">
                            <div class="panel panel-info panel-line">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">INGRESO</h3>
                                <div class="panel-actions">
                                </div>
                            </div>
                            <div class="panel-body">                                
                                <form id="LoginForm" autocomplete="off">
                                    <div class="input-group form-group col-lg-12">
                                        <label class="form-control" style="background-color: #E9ECEF;"><h5>Usuario:</h5></label>
                                        <input type="text" class="form-control input-group-addon" name="txt_usuario" id="txt_usuario" placeholder="Ingrese su Usuario">
                                    </div>
                                    <div class="input-group form-group col-lg-12">
                                        <label class="form-control" style="background-color: #E9ECEF;"><h5>Contraseña:</h5></label>
                                        <input type="password" class="form-control input-group-addon" name="txt_password" id="txt_password" placeholder="Ingrese su Contraseña">
                                    </div>
                                    <div class="form-group col-lg-12" style="display:none;">
                                        <label class="fancy-checkbox element-left">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>Recordarme</span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="button" class="btn btn-primary btn-round btn-outline col-8" id="btnIniciar">Iniciar Sesión</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
