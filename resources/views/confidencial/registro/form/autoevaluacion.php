<div class="col-xl-12 col-lg-12 Autoevaluacion">
    <form id="AutoevaluacionForm" autocomplete="off">
        <div class="panel panel-info panel-line">
            <div class="panel-heading">
                <h3 class="panel-title">Desarrollo de la Autoevaluación</h3>
            </div>
            <div class="panel-body row">
                <div class="form-group col-xl-3 col-lg-3 col-md-4">
                    <label class="form-control-label">Tipo de Autoevaluación:</label>
                    <input type="hidden" name="txt_auto_id" id="txt_auto_id">
                    <input type="text" class="form-control" name="txt_tiau_nombre" id="txt_tiau_nombre" disabled>
                </div>
                <div class="form-group col-xl-3 col-lg-4 col-md-4">
                    <label class="form-control-label"># Autoevaluación:</label>
                    <input type="text" class="form-control" name="txt_auto_informe" id="txt_auto_informe" disabled>
                </div>
                <div class="form-group col-xl-3 col-lg-2 col-md-4">
                    <label class="form-control-label">Fecha de Inicio:</label>
                    <input type="text" class="form-control" name="txt_auto_fecha_inicio" id="txt_auto_fecha_inicio" disabled>
                </div>
                <div class="form-group col-lg-1 col-md-4 col-4 text-center validar-vista">
                    <button type="button" class="btn btn-primary btn-round btn-outline" id="btn_Finalizar" data-toggle="tooltip" data-placement="top" title="FINALIZAR AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                    </button>
                </div>
                <div class="form-group col-lg-1 col-md-4 col-4 text-center validar-vista">
                    <button type="button" class="btn btn-danger btn-round btn-outline" id="btn_Cancelar" data-toggle="tooltip" data-placement="top" title="CANCELAR AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
                <div class="form-group col-lg-1 col-md-4 col-4 text-center">
                    <button type="button" class="btn btn-dark btn-round btn-outline" id="btn_Salir" data-toggle="tooltip" data-placement="top" title="SALIR DE AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-new-window"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    
    <div class="app-projects">
        <div class="projects-wrap">
            <ul id="detalle_autoevaluacion" class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
                data-plugin="animateList" data-child=">li">
            </ul>
        </div>
    </div>
</div>

<div class="col-xl-10 col-lg-12 col-md-12 AutoevaluacionDetalle">
    <form id="AutoevaluacionDetalleForm" autocomplete="off">
        <div class="panel panel-info panel-line">
            <div class="panel-heading">
                <h3 class="panel-title">Desarrollo del proceso de autoevaluación institucional</h3>
                <div class="panel-actions text-center">
                    <a class="btn btn-dark btn-round btn-outline" id="btn_SalirDetalle" data-toggle="tooltip" data-placement="top" title="SALIR DEL DETALLE AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-new-window"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body row">
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_dime_fondo">
                    <h3><span id="lbl_dime_titulo"></span> <span id="lbl_dime_descripcion"></span></h3>
                    <input type="hidden" name="txt_aude_id" id="txt_aude_id">
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_fact_fondo">
                    <h4><span id="lbl_fact_titulo"></span></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <span id="lbl_fact_descripcion"></span>
                    <span id="lbl_criterios"></span>
                </div>
                <div class="table-responsive">
                    <table id="AutoevaluacionDetalleTable" class="table table-bordered">
                        <thead class="bg-blue-grey-100">
                            <tr>
                                <th>Seleccionar nivel de logro</th>
                                <th style="min-width:300px;">Descriptor</th>
                            </tr>
                        </thead>
                        <tbody class="estado-tbody">
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12" style="display:none;">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-blue-grey-100">
                                <tr>
                                    <th>Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea rows="5" class="form-control" id="txt_producto" name="txt_producto"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-blue-grey-100">
                                <tr>
                                    <th style="min-width:200px;">Actividades desarrolladas</th>
                                    <th class="ocultar">
                                        <button type="button" class="btn btn-success btn-round btn-outline" id="btn_AgregarActividad" data-toggle="tooltip" data-placement="top" title="AGREGAR ACTIVIDAD">
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="actividad-tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-blue-grey-100">
                                <tr>
                                    <th style="min-width:200px;">Nombre del producto / evidencia</th>
                                    <th colspan="2" style="width:30%; min-width:350px;">Archivo <div class="badge-danger">Peso máximo 5MB</div></th>
                                    <th style="width:10%;" class="ocultar">
                                        <button type="button" class="btn btn-success btn-round btn-outline" id="btn_AgregarEvidencia" data-toggle="tooltip" data-placement="top" title="AGREGAR EVIDENCIA">
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="evidencia-tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="text-right ocultar">
                    <button type="button" class="btn btn-primary btn-round btn-outline" id="btn_Guardar" data-toggle="tooltip" data-placement="top" title="GUARDAR DETALLE AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

        <div class="app-projects Autoevaluacion2" tabindex='1'>
            <div class="panel panel-info panel-line">
                <div class="panel-heading">
                    <h3 class="panel-title">Referente de calidad</h3>
                    <div class="panel-actions text-center">
                        <button type="button" class="btn btn-primary btn-round btn-outline validar-vista" id="btn_Finalizar2" data-toggle="tooltip" data-placement="top" title="FINALIZAR COMPROMISOS">
                            <i class="glyphicon glyphicon-floppy-saved"></i>
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-dark btn-round btn-outline" id="btn_SalirDetalle2" data-toggle="tooltip" data-placement="top" title="SALIR DEL DETALLE AUTOEVALUACIÓN">
                            <i class="glyphicon glyphicon-new-window"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="projects-wrap">
                <ul id="detalle_autoevaluacion2" class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
                    data-plugin="animateList" data-child=">li">
                </ul>

                <ul id="detalle_autoevaluacion3" class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
                    data-plugin="animateList" data-child=">li">
                </ul>
            </div>
        </div>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 AutoevaluacionDetalle2">
    <form id="AutoevaluacionDetalle2Form" autocomplete="off">
        <div class="panel panel-info panel-line">
            <div class="panel-heading">
                <h3 class="panel-title">Desarrollo del compromiso</h3>
                <div class="panel-actions text-center">
                    <button type='button' class="btn btn-dark btn-round btn-outline mant" id="btn_SalirDetalle" data-toggle="tooltip" data-placement="top" title="SALIR DEL DETALLE AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-new-window"></i>
                    </button>
                </div>
            </div>
            <div class="panel-body row">
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_dime_fondo">
                    <h3><span id="lbl_dime_titulo"></span> <span id="lbl_dime_descripcion"></span></h3>
                    <input type="hidden" name="txt_aude_id" id="txt_aude_id">
                    <input type="hidden" name="compromiso" value=1>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_fact_fondo">
                    <h4><span id="lbl_fact_titulo"></span></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 lbl_fact_fondo">
                    <span id="lbl_fact_descripcion"></span>                    
                </div>
                <div class="table-responsive">
                    <table id="AutoevaluacionDetalle2Table" class="table table-bordered">
                        <thead class="bg-blue-grey-100">
                            <tr>
                                <th style="min-width:300px;">Indicador / Práctica de gestión</th>
                                <th>Valoración</th>
                                <th style="min-width:400px;">Explicación / Comentario</th>
                                <th style="min-width:350px;">Archivo <div class="badge-danger">Peso máximo 5MB</div></th>
                            </tr>
                        </thead>
                        <tbody class="estado-tbody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="text-right ocultar">
                    <button type="button" class="btn btn-primary btn-round btn-outline" id="btn_Guardar" data-toggle="tooltip" data-placement="top" title="GUARDAR DETALLE AUTOEVALUACIÓN">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="col-xl-10 col-lg-12 col-md-12 AutoevaluacionDetalle3">
    <form id="AutoevaluacionDetalle3Form" autocomplete="off">
        <input type="hidden" name="txt_esta_id" id="txt_esta_id">
        <div class="panel panel-info panel-line">
            <div class="panel-heading">
                <h3 class="panel-title">Vista del compromiso</h3>
                <div class="panel-actions text-center">
                    <a class="btn btn-dark btn-round btn-outline" id="btn_SalirDetalle3" data-toggle="tooltip" data-placement="top" title="SALIR DE LA VISTA DEL COMPROMISO">
                        <i class="glyphicon glyphicon-new-window"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body row">
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_dime_fondo2">
                    <h3><span id="lbl_dime_titulo2"></span> <span id="lbl_dime_descripcion2"></span></h3>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 text-center lbl_fact_fondo2">
                    <h4><span id="lbl_fact_titulo2"></span></h4>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 lbl_fact_fondo2">
                    <span id="lbl_fact_descripcion2"></span>                    
                </div>
                <div class="table-responsive">
                    <table id="AutoevaluacionDetalle3Table" class="table table-bordered">
                        <thead class="bg-blue-grey-100">
                            <tr>
                                <th style="min-width:300px;">Indicador / Práctica de gestión</th>
                                <th>Valoración</th>
                            </tr>
                        </thead>
                        <tbody class="estado-tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>