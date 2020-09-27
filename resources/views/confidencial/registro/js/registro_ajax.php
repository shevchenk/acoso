<script type="text/javascript">
var AjaxAutoevaluacion={
    CargarAutoevaluacionDetalle: (evento)=> {
        var data=$("#AutoevaluacionForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@CargarAutoevaluacionDetalle';
        masterG.postAjax(url,data,evento);
    },
    FinalizarAutoevaluacion: (evento)=> {
        var data=$("#AutoevaluacionForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@FinalizarAutoevaluacion';
        masterG.postAjax(url,data,evento);
    },
    CancelarAutoevaluacion: (evento)=> {
        var data=$("#AutoevaluacionForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@CancelarAutoevaluacion';
        masterG.postAjax(url,data,evento);
    },
    IniciarAutoevaluacion: (evento)=> {
        var data=$("#AutoevaluacionDetalleForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@IniciarAutoevaluacion';
        masterG.postAjax(url,data,evento);
    },
    GuardarAutoevaluacionDetalle: (evento)=> {
        var data=$("#AutoevaluacionDetalleForm").serialize().split("txt_").join("").split("slct_").join("").split("rdb_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@GuardarAutoevaluacionDetalle';
        masterG.postAjax(url,data,evento);
    },
    IniciarAutoevaluacion2: (evento)=> {
        var data=$("#AutoevaluacionDetalle2Form").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@IniciarAutoevaluacion';
        masterG.postAjax(url,data,evento);
    },
    GuardarAutoevaluacionDetalle2: (evento)=> {
        var data=$("#AutoevaluacionDetalle2Form").serialize().split("txt_").join("").split("slct_").join("").split("rdb_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@GuardarAutoevaluacionDetalle';
        masterG.postAjax(url,data,evento);
    },
    FinalizarCompromiso: (evento)=> {
        var data=$("#AutoevaluacionDetalleForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@FinalizarCompromiso';
        masterG.postAjax(url,data,evento);
    },
    IniciarAutoevaluacion3: (evento)=> {
        var data=$("#AutoevaluacionDetalle3Form").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Autoevaluacion.AutoevaluacionAU@VerCompromiso';
        masterG.postAjax(url,data,evento);
    },
};
</script>
