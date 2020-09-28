<script type="text/javascript">
ValidaUsuarioG = {};
$(document).ready( ()=> {
    $(".Usuario").hide();
    $("#btnFirmar").click(Registro.Firmar);
    $("#RegistroForm #btn_registrar").click(Registro.Registrar);
    $("#RegistroForm #slct_afectada").change(Registro.Afectada);
    masterG.SelectImagen('','#RegistroForm #pdf_img, #txt_file_imagen, #txt_firma_imagen');
    $("#RegistroForm #txt_afectada").easyAutocomplete(AfectadaOpciones);
    $("#RegistroForm #txt_denunciado").easyAutocomplete(DenunciadoOpciones);
    masterG.overlayG(true);
    AjaxRegistro.Listar(Registro.HTMLListar);
});

var Registro = {
    Afectada : ()=> { 
        //$(".Inicia").fadeOut(1000, ()=>{ $(".Autoevaluacion").fadeIn(1000); });
        var val = $("#RegistroForm #slct_afectada").val();
        if( val == 1 ){
            $(".Usuario").hide();
            $("#RegistroForm #txt_afectada").attr("readonly","true");
            $("#RegistroForm #txt_afectada").val(ValidaUsuario.persona);
            $("#RegistroForm #txt_paterno_a").val(ValidaUsuario.paterno);
            $("#RegistroForm #txt_materno_a").val(ValidaUsuario.materno);
            $("#RegistroForm #txt_nombre_a").val(ValidaUsuario.nombre);
            $("#RegistroForm #txt_dni_a").val(ValidaUsuario.dni);
            $("#RegistroForm #txt_dependencia_a").val(ValidaUsuario.dependencia);
            $("#RegistroForm #txt_cargo_a").val(ValidaUsuario.cargo);
            $("#RegistroForm #txt_direccion_a").val(ValidaUsuario.direccion);
            $("#RegistroForm #txt_celular_a").val(ValidaUsuario.celular);
            $("#RegistroForm #txt_email_a").val(ValidaUsuario.email);
        }
        else{
            $(".Usuario").show();
            $("#RegistroForm #txt_afectada").removeAttr("readonly");
            $("#RegistroForm #txt_afectada, #RegistroForm #txt_dependencia_a, #RegistroForm #txt_cargo_a").val("");
            $("#RegistroForm #txt_paterno_a, #RegistroForm #txt_materno_a, #RegistroForm #txt_nombre_a, #RegistroForm #txt_dni_a").val("");
            $("#RegistroForm #txt_direccion_a, #RegistroForm #txt_celular_a, #RegistroForm #txt_email_a").val("");
            $("#RegistroForm #txt_afectada").focus();
        }
    },
    
    HTMLListar : (result)=> {
        masterG.overlayG();
        ValidaUsuario.persona = result.persona;
        ValidaUsuario.paterno = result.paterno;
        ValidaUsuario.materno = result.materno;
        ValidaUsuario.nombre = result.nombre;
        ValidaUsuario.dni = result.dni;
        ValidaUsuario.dependencia = result.dependencia;
        ValidaUsuario.cargo = result.cargo;
        ValidaUsuario.direccion = result.direccion;
        ValidaUsuario.celular = result.celular;
        ValidaUsuario.email = result.email;
        $("#RegistroForm #txt_afectada").val(ValidaUsuario.persona);
        $("#RegistroForm #txt_paterno_a").val(ValidaUsuario.paterno);
        $("#RegistroForm #txt_materno_a").val(ValidaUsuario.materno);
        $("#RegistroForm #txt_nombre_a").val(ValidaUsuario.nombre);
        $("#RegistroForm #txt_dni_a").val(ValidaUsuario.dni);
        $("#RegistroForm #txt_dependencia_a").val(ValidaUsuario.dependencia);
        $("#RegistroForm #txt_cargo_a").val(ValidaUsuario.cargo);
        $("#RegistroForm #txt_direccion_a").val(ValidaUsuario.direccion);
        $("#RegistroForm #txt_celular_a").val(ValidaUsuario.celular);
        $("#RegistroForm #txt_email_a").val(ValidaUsuario.email);

        $("#RegistroForm #txt_usuario").val(ValidaUsuario.persona);
        $("#RegistroForm #txt_paterno_u").val(ValidaUsuario.paterno);
        $("#RegistroForm #txt_materno_u").val(ValidaUsuario.materno);
        $("#RegistroForm #txt_nombre_u").val(ValidaUsuario.nombre);
        $("#RegistroForm #txt_dni_u").val(ValidaUsuario.dni);
        $("#RegistroForm #txt_dependencia_u").val(ValidaUsuario.dependencia);
        $("#RegistroForm #txt_cargo_u").val(ValidaUsuario.cargo);
        $("#RegistroForm #txt_celular_u").val(ValidaUsuario.celular);
        $("#RegistroForm #txt_email_u").val(ValidaUsuario.email);
    },
    
    Registrar : ()=> {
        msjG.question('Registrar formulario y generar PDF', '', Registro.RegistrarOk );
    },
    
    RegistrarOk : ()=>{
        masterG.overlayG(true);
        AjaxRegistro.Registrar(HTMLRegistrar);
    },
    
    HTMLRegistrar : (result)=> {
        msjG.alert('success', result.msj, 5000 );
    },

    Firmar : ()=> {
        if( $("#txt_file_imagen").attr('src')=='Config/default.png' ){
            msjG.alert('info', 'Registrar y generar PDF, luego proceda a firmar el PDF generado', 5000 );
        }
        else{
            initInvoker(typeG);
        }
    }
}
</script>
