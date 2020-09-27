<script type="text/javascript">
var AjaxAcceso={
    Resumen: (evento)=> {
        var data=$("#LoginForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Acceso.ReporteAC@Resumen';
        masterG.postAjax(url,data,evento);
    }
}
</script>
