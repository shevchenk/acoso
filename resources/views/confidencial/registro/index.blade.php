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

    <div class="page-content container-fluid row justify-content-md-center">
      <div class="col-xl-12 col-lg-6">
        <form id="InstitucionTableForm" autocomplete="off">
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
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">DNI:</label>
                <input type="text" class="form-control" name="txt_dni" id="txt_dni" disabled>
              </div>
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">Nombre:</label>
                <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" disabled>
              </div>
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">Paterno:</label>
                <input type="text" class="form-control" name="txt_paterno" id="txt_paterno" disabled>
              </div>
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">Materno:</label>
                <input type="text" class="form-control" name="txt_materno" id="txt_materno" disabled>
              </div>
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">Dependencia:</label>
                <input type="text" class="form-control" name="txt_dependencia" id="txt_dependencia" disabled>
              </div>
              <div class="form-group col-xl-3 col-lg-6 col-md-12">
                <label class="form-control-label">Cargo:</label>
                <input type="text" class="form-control" name="txt_cargo" id="txt_cargo" disabled>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-xl-12 col-lg-6">
        <form id="InstitucionTableForm" autocomplete="off">
          <div class="panel panel-info panel-line">
            <div class="panel-heading">
              <h3 class="panel-title">Datos del denunciado</h3>
            </div>
            <div class="panel-body row">
              <div class="form-group col-xl-4 col-lg-8 col-md-8">
                <label class="form-control-label">Institución:</label>
                <input type="text" class="form-control" name="txt_inst_nombre" id="txt_inst_nombre" disabled>
              </div>
              <div class="form-group col-xl-2 col-lg-4 col-md-4">
                <label class="form-control-label">WEB:</label>
                <input type="text" class="form-control" name="txt_inst_web" id="txt_inst_web" disabled>
              </div>
              <div class="form-group col-xl-2 col-lg-4 col-md-4">
                <label class="form-control-label">Región:</label>
                <input type="text" class="form-control" name="txt_inst_region" id="txt_inst_region" disabled>
              </div>
              <div class="form-group col-xl-2 col-lg-4 col-md-4">
                <label class="form-control-label">Provincia:</label>
                <input type="text" class="form-control" name="txt_inst_prov" id="txt_inst_prov" disabled>
              </div>
              <div class="form-group col-xl-2 col-lg-4 col-md-4">
                <label class="form-control-label">Distrito:</label>
                <input type="text" class="form-control" name="txt_inst_dist" id="txt_inst_dist" disabled>
              </div>
            </div>
          </div>
        </form>
      </div>

      

    </div>
@endsection
