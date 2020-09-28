@extends('include.layout.master')

@section('include')
    @parent
    <link rel="stylesheet" href="Include/Bootstrap-Select/css/bootstrap-select.min.css">
    <script src="Include/Bootstrap-Select/js/bootstrap-select.min.js"></script>
    <script src="Include/Bootstrap-Select/js/i18n/defaults-es_ES.js"></script>

    <link rel="stylesheet" href="Include/Easyautocomplete/easy-autocomplete.css">
    <script src="Include/Easyautocomplete/easy-autocomplete.min.js"></script>
    
    @include( 'confidencial.registro.js.registro_config' )
    @include( 'confidencial.registro.js.registro' )
    @include( 'confidencial.registro.js.registro_ajax' )

    @include( 'api.refirma.js.invoker_client' )
    @include( 'api.refirma.js.invoker_local' )
    @include( 'api.refirma.js.invoker_local_ajax' )
@endsection

@section('content')
    <div class="page-header page-header-bordered">
      <h1 class="page-title">FORMULARIO DE DENUNCIA</h1>
    </div>
  <form id="RegistroForm" autocomplete="off">
    <div class="page-content container-fluid row justify-content-md-center">
      <div class="col-xl-12 col-lg-12">  
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Datos de la persona afectada</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-xl-12">
              <label class="form-control-label">Ud es la persona afectada?</label>
              <select id="slct_afectada" class="form-control">
                <option value="1"  selected>SI</option>
                <option value="2"> NO</option>
              </select>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Nombre y apellidos:</label>
              <input type="text" class="form-control" name="txt_afectada" id="txt_afectada" readonly>
              <input type="hidden" class="form-control" name="txt_paterno_a" id="txt_paterno_a" readonly>
              <input type="hidden" class="form-control" name="txt_materno_a" id="txt_materno_a" readonly>
              <input type="hidden" class="form-control" name="txt_nombre_a" id="txt_nombre_a" readonly>
              <input type="hidden" class="form-control" name="txt_dni_a" id="txt_dni_a" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Dependencia:</label>
              <input type="text" class="form-control" name="txt_dependencia_a" id="txt_dependencia_a" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargo:</label>
              <input type="text" class="form-control" name="txt_cargo_a" id="txt_cargo_a" readonly>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Dirección de domicilio:</label>
              <textarea class="form-control" name="txt_direccion_a" id="txt_direccion_a" rows="3" placeholder="Dirección"></textarea>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Celular:</label>
              <input type="number" max='15' class="form-control" name="txt_celular_a" id="txt_celular_a" placeholder="Celular">
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Email:</label>
              <input type="email" max='100' class="form-control" name="txt_email_a" id="txt_email_a" placeholder="Email">
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-12 col-lg-12 Usuario">
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Datos del usuario que registra</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Nombres y apellidos:</label>
              <input type="text" class="form-control" name="txt_denunciado" id="txt_denunciado">
              <input type="hidden" class="form-control" name="txt_paterno_u" id="txt_paterno_u" readonly>
              <input type="hidden" class="form-control" name="txt_materno_u" id="txt_materno_u" readonly>
              <input type="hidden" class="form-control" name="txt_nombre_u" id="txt_nombre_u" readonly>
              <input type="hidden" class="form-control" name="txt_dni_u" id="txt_dni_u" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Dependencia:</label>
              <input type="text" class="form-control" name="txt_dependencia_u" id="txt_dependencia_u" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargo:</label>
              <input type="text" class="form-control" name="txt_cargo_u" id="txt_cargo_u" readonly>
            </div>
            <div style="display:none;" class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Celular:</label>
              <input type="number" max='15' class="form-control" name="txt_celular_u" id="txt_celular_u" placeholder="Celular">
            </div>
            <div style="display:none;" class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Email:</label>
              <input type="email" max='100' class="form-control" name="txt_email_u" id="txt_email_u" placeholder="Email">
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-12 col-lg-12">
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Datos del denunciado</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Nombres y apellidos:</label>
              <input type="text" class="form-control" name="txt_denunciado" id="txt_denunciado">
              <input type="hidden" class="form-control" name="txt_paterno_d" id="txt_paterno_d" readonly>
              <input type="hidden" class="form-control" name="txt_materno_d" id="txt_materno_d" readonly>
              <input type="hidden" class="form-control" name="txt_nombre_d" id="txt_nombre_d" readonly>
              <input type="hidden" class="form-control" name="txt_dni_d" id="txt_dni_d" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Dependencia:</label>
              <input type="text" class="form-control" name="txt_dependencia_d" id="txt_dependencia_d" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargo:</label>
              <input type="text" class="form-control" name="txt_cargo_d" id="txt_cargo_d" readonly>
            </div>
            <div style="display:none;" class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Celular:</label>
              <input type="number" max='15' class="form-control" name="txt_celular_d" id="txt_celular_d" placeholder="Celular">
            </div>
            <div style="display:none;" class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Email:</label>
              <input type="email" max='100' class="form-control" name="txt_email_d" id="txt_email_d" placeholder="Email">
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-12 col-lg-12">
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Medios probatorios</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Descripción de los hechos:</label>
              <textarea class="form-control" name="txt_descripcion" id="txt_descripcion" rows="3" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargar un archivo:</label>
              <input type="text" class="form-control" name="pdf_nombre" id="pdf_nombre" readonly>
              <input type="hidden" class="form-control" name="pdf_archivo" id="pdf_archivo">
              <label class="btn btn-warning btn-lg btn-flat margin">
                  <i class="glyphicon glyphicon-file"></i>
                  <input type="file" style="display: none;" onchange="masterG.onImagen(event,'#pdf_nombre','#pdf_archivo','#pdf_img');">
              </label>
                <a id="">
                  <img id="pdf_img" class="img-circle" style="height: 80px;width: 140px;border-radius: 8px;border: 1px solid grey;margin-top: 5px;padding: 8px">
                </a>
            </div>
            <div class="form-group col-xl-3 col-lg-3 col-md-6">
              <br>
              <br>
              <button type="button" class="btn btn-info btn-lg" id="btn_registrar">Registrar y generar PDF</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Valida tu información en el PDF antes de firmar</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-lg-7 col-md-12 text-justify">
              Click en la Imagen para descargar el PDF generado con la información registrada.
            </div>
            <div class="form-group col-lg-5 col-md-12">
              <div class="text-center">
                <a id="txt_file" href="#">
                  <img id="txt_file_imagen" style="height: 142px;width: 100%; max-width: 180px; border-radius: 8px;border: 1px solid grey;margin-top: 5px;padding: 8px"> 
                </a>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="text-right">
              <button type="button" class="btn btn-warning btn-round btn-outline" id="btnFirmar">Firmar PDF</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Descarga tu PDF firmado</h3>
          </div>
          <div class="panel-body row">
            <div class="form-group col-lg-7 col-md-12 text-justify">
              Click en la Imagen para descargar el PDF firmado.
            </div>
            <div class="form-group col-lg-5 col-md-12">
              <div class="text-center">
                <a id="txt_firma" href="#">
                  <img id="txt_firma_imagen" style="height: 142px;width: 100%; max-width: 180px; border-radius: 8px;border: 1px solid grey;margin-top: 5px;padding: 8px"> 
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <div id="addComponent"></div>
@endsection
