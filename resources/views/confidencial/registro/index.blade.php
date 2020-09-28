@extends('include.layout.master')

@section('include')
    @parent
    <link rel="stylesheet" href="Include/Bootstrap-Select/css/bootstrap-select.min.css">
    <script src="Include/Bootstrap-Select/js/bootstrap-select.min.js"></script>
    <script src="Include/Bootstrap-Select/js/i18n/defaults-es_ES.js"></script>

    <link rel="stylesheet" href="Include/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="Include/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="Include/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    @include( 'confidencial.registro.js.registro' )
    @include( 'confidencial.registro.js.registro_ajax' )
@endsection

@section('content')
    <div class="page-header page-header-bordered">
      <h1 class="page-title">FORMULARIO DE DENUNCIA</h1>
    </div>
  <form id="InstitucionTableForm" autocomplete="off">
    <div class="page-content container-fluid row justify-content-md-center">
      <div class="col-xl-12 col-lg-12">  
        <div class="panel panel-info panel-line">
          <div class="panel-heading">
            <h3 class="panel-title">Datos del denunciante</h3>
          </div>
          <div class="panel-body row">
          <div class="form-group col-xl-12">
              <label class="form-control-label">Ud es la persona afectada?</label>
              <select id="slct_afectada">
                <option value="1"  selected>SI</option>
                <option value="2"> NO</option>
              </select>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Nombre y apellidos:</label>
              <input type="text" class="form-control" name="txt_afectada" id="txt_afectada" >
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Dependencia:</label>
              <input type="text" class="form-control" name="txt_dependencia" id="txt_dependencia" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargo:</label>
              <input type="text" class="form-control" name="txt_cargo" id="txt_cargo" readonly>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-12">
              <label class="form-control-label">Dirección de domicilio:</label>
              <textarea class="form-control" name="txt_direccion" id="txt_direccion" rows="3" placeholder="Dirección"></textarea>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Celular:</label>
              <input type="number" max='15' class="form-control" name="txt_celular" id="txt_celular" placeholder="Celular">
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Email:</label>
              <input type="email" max='100' class="form-control" name="txt_email" id="txt_email" placeholder="Email">
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
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Dependencia:</label>
              <input type="text" class="form-control" name="txt_dependencia" id="txt_dependencia" readonly>
            </div>
            <div class="form-group col-xl-3 col-lg-6 col-md-12">
              <label class="form-control-label">Cargo:</label>
              <input type="text" class="form-control" name="txt_cargo" id="txt_cargo" readonly>
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
            
          </div>
        </div>
      </div>

    </div>
  </form>
@endsection
