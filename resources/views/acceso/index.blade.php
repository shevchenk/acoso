@extends('include.layout.master')

@section('include')
    @parent
    <script src="Include/Chart/chart.min.js"></script>

    @include( 'acceso.js.acceso' )
    @include( 'acceso.js.acceso_ajax' )
@endsection

@section('content')
    <div class="page-header page-header-bordered">
      <h1 class="page-title">Inicio</h1>
    </div>

    <div class="page-content container-fluid row justify-content-md-center">
      <div class="col-xl-4 col-lg-6 col-md-10">
        <form id="InstitucionForm" autocomplete="off">
          <div class="panel panel-info panel-line">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
              <div class="card border border-primary">
                <div class="card-block">
                  <h4 class="card-title text-center">Resumen de Institución / Programa(s)</h4>
                  <div class="card-text">
                    <canvas id="chart-programa"></canvas>
                  </div>
                  <div class="card-footer bg-blue-grey-500 white text-center">
                    <div class="row no-space ">
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="TOTAL">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-list mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_total_programa">0</span>
                        </div>
                      </div>
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="CON AUTOEVALUACIÓN">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-check mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_con_auto">0</span>
                        </div>
                      </div>
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="SIN AUTOEVALUACIÓN">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-unchecked mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_sin_auto">0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-8">
        <form id="AutoForm" au tocomplete="off">
          <div class="panel panel-info panel-line">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
              <div class="card border border-primary">
                <div class="card-block">
                  <h4 class="card-title text-center">Resumen de Autoevaluaciones</h4>
                  <div class="card-text">
                    <canvas id="chart-autoevaluacion"></canvas>
                  </div>
                  <div class="card-footer bg-blue-grey-500 white text-center">
                    <div class="row no-space ">
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="TOTAL">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-list mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_total_auto">0</span>
                        </div>
                      </div>
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="FINALIZADA(S)">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-check mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_finalizado">0</span>
                        </div>
                      </div>
                      <div class="col-4" data-toggle="tooltip" data-placement="top" title="PENDIENTE(S)">
                        <div class="counter counter-inverse">
                          <span class="counter-icon"><i class="icon glyphicon glyphicon-unchecked mr-15" aria-hidden="true"></i></span>
                          <br>
                          <span class="counter-number" id="lbl_pendiente">0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>


    </div>
@endsection
