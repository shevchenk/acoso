<script type="text/javascript">
$(document).ready(function() {
    AjaxAcceso.Resumen(Acceso.HTMLResumen);
});

var Acceso = {
	HTMLResumen : (result)=> {
        var ctx = $('#chart-programa')[0].getContext('2d');
		var ctx2 = $('#chart-autoevaluacion')[0].getContext('2d');
		var datos = {
			type : 'doughnut',
			position : 'left',
			data : result.programa,
			labels : ['Total','Con Autoevaluación','Sin Autoevaluación']
		}
		new Chart( ctx, masterG.DatosConfig(datos) );
		$("#InstitucionForm #lbl_total_programa").text(result.programa[0]);
		$("#InstitucionForm #lbl_con_auto").text(result.programa[1]);
		$("#InstitucionForm #lbl_sin_auto").text(result.programa[2]);

		var datos2 = {};
		datos2.type = 'doughnut';
		datos2.position = 'left';
		datos2.data = result.evaluacion;
		datos2.labels = ['Total','Finalizada(s)','Pendiente(s)'];
		new Chart(ctx2, masterG.DatosConfig(datos2));
		$("#AutoForm #lbl_total_auto").text(result.evaluacion[0]);
		$("#AutoForm #lbl_finalizado").text(result.evaluacion[1]);
		$("#AutoForm #lbl_pendiente").text(result.evaluacion[2]);
    }
}

</script>
