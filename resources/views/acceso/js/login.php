<script type="text/javascript">
$(document).ready(function() {
    $("#btnIniciar").click(IniciarSession);
});

IniciarSession=function(){
    if( $.trim($("#txt_usuario").val()) == '' ){
        $("#txt_usuario").focus();
        msjG.alert('warning',"Ingrese su Usuario",3500);
    }
    else if( $.trim($("#txt_password").val()) == '' ){
        $("#txt_password").focus();
        msjG.alert('warning',"Ingrese su Password",3500);
    }
    else{
        masterG.overlayG(true);
        AjaxLogin.IniciarLogin(HTMLIniciarLogin);
    }
}

HTMLIniciarLogin=function(result){
    masterG.overlayG();
    if( result.rst==1 ){
        window.location='confidencial.registro.index';
    }
    else if( result.rst==2 ){
        msjG.alert('warning',"Usuario: "+$("#txt_usuario").val()+" no cuenta con roles asignados",3500);
    }
    else{
        msjG.alert('warning',"Usuario o Password Inválido",3500);
    }
}
</script>
