<script type="text/javascript">
var AjaxRegistro={
    Registrar: (evento)=> {
        var data=$("#RegistroForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDynamic/Registro.PersonaRE@Registrar';
        masterG.postAjax(url,data,evento);
    },
    Listar: (evento)=> {
        var data={};
        url='AjaxDynamic/Registro.PersonaRE@Listar';
        masterG.postAjax(url,data,evento);
    },
};
</script>
