<script type="text/javascript">
ValidaAutoevaluacionG = {};
$(document).ready( ()=> {
    $(".Autoevaluacion, .AutoevaluacionDetalle, .AutoevaluacionDetalle2, .AutoevaluacionDetalle3").hide();

    $("#AutoevaluacionForm #btn_Finalizar").click(FinalizarAutoevaluacion);
    $("#AutoevaluacionDetalle3Form #btn_SalirDetalle3").click(SalirAutoevaluacionDetalle3);
});

VerAutoevaluacion = (auto_id)=> { //Inicializa la autoevaluación el evento click proviene desde otro formulario
    $(".Inicia").fadeOut(1000, ()=>{ $(".Autoevaluacion").fadeIn(1000); });
    $("#AutoevaluacionForm #txt_auto_id").val(auto_id);
    $("#AutoevaluacionForm #txt_tiau_nombre").val( $("#AutoevaluacionTable #trid_"+auto_id+" .tiau_nombre").text() );
    $("#AutoevaluacionForm #txt_auto_informe").val( $("#AutoevaluacionTable #trid_"+auto_id+" .auto_informe").text() );
    $("#AutoevaluacionForm #txt_auto_fecha_inicio").val( $("#AutoevaluacionTable #trid_"+auto_id+" .auto_fecha_inicio").text() );

    masterG.overlayG(true);
    AjaxAutoevaluacion.CargarAutoevaluacionDetalle(HTMLCargarAutoevaluacionDetalle);
}

HTMLCargarAutoevaluacionDetalle = (result)=> {
    $("#detalle_autoevaluacion li").remove();
    $(".Autoevaluacion .validar-vista").hide();

    $.each(result.data,function(index,r){ //INICIO FUNCTION
        html = '';
        opacidad = '';
    });
    masterG.overlayG();
}

FinalizarAutoevaluacion = ()=> {
    msjG.question('Finalizar Autoevaluación', '# Autoevaluación => "'+ $("#AutoevaluacionForm #txt_auto_informe").val() +'"', FinalizarAutoevaluacionOk );
    msjG.alert('success', result.msj, 5000 );
}
</script>
