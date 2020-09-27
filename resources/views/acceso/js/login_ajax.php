<script type="text/javascript">
var AjaxLogin={
    IniciarLogin: (evento)=> {
        var data=$("#LoginForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Acceso.PersonaAC@ValidaPersona';
        masterG.postAjax(url,data,evento);
    }
}
</script>
