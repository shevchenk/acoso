<script type="text/javascript">
ValidaUsuarioG = {};
$(document).ready( ()=> {
    $(".Usuario").hide();
    $("#btnFirmar").click(Registro.Firmar);
    $("#RegistroForm #btn_registrar").click(Registro.Registrar);
    $("#RegistroForm #slct_afectada").change(Registro.Afectada);
    masterG.SelectImagen('','#RegistroForm #pdf_img, #txt_file_imagen, #txt_firma_imagen');
    $("#RegistroForm #txt_afectada").easyAutocomplete(AfectadaOpciones);
    $("#RegistroForm #txt_denunciada").easyAutocomplete(DenunciadoOpciones);
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
            $("#RegistroForm #txt_afectada").val(ValidaUsuarioG.persona);
            $("#RegistroForm #txt_paterno_a").val(ValidaUsuarioG.paterno);
            $("#RegistroForm #txt_materno_a").val(ValidaUsuarioG.materno);
            $("#RegistroForm #txt_nombre_a").val(ValidaUsuarioG.nombre);
            $("#RegistroForm #txt_dni_a").val(ValidaUsuarioG.dni);
            $("#RegistroForm #txt_dependencia_a").val(ValidaUsuarioG.dependencia);
            $("#RegistroForm #txt_cargo_a").val(ValidaUsuarioG.cargo);
            $("#RegistroForm #txt_direccion_a").val(ValidaUsuarioG.direccion);
            $("#RegistroForm #txt_celular_a").val(ValidaUsuarioG.celular);
            $("#RegistroForm #txt_email_a").val(ValidaUsuarioG.email);
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
        ValidaUsuarioG.persona = result.data.persona;
        ValidaUsuarioG.paterno = result.data.paterno;
        ValidaUsuarioG.materno = result.data.materno;
        ValidaUsuarioG.nombre = result.data.nombre;
        ValidaUsuarioG.dni = result.data.dni;
        ValidaUsuarioG.dependencia = result.data.dependencia;
        ValidaUsuarioG.cargo = result.data.cargo;
        ValidaUsuarioG.direccion = result.data.direccion;
        ValidaUsuarioG.celular = result.data.celular;
        ValidaUsuarioG.email = result.data.email;
        
        $("#RegistroForm #txt_afectada").val(ValidaUsuarioG.persona);
        $("#RegistroForm #txt_paterno_a").val(ValidaUsuarioG.paterno);
        $("#RegistroForm #txt_materno_a").val(ValidaUsuarioG.materno);
        $("#RegistroForm #txt_nombre_a").val(ValidaUsuarioG.nombre);
        $("#RegistroForm #txt_dni_a").val(ValidaUsuarioG.dni);
        $("#RegistroForm #txt_dependencia_a").val(ValidaUsuarioG.dependencia);
        $("#RegistroForm #txt_cargo_a").val(ValidaUsuarioG.cargo);
        $("#RegistroForm #txt_direccion_a").val(ValidaUsuarioG.direccion);
        $("#RegistroForm #txt_celular_a").val(ValidaUsuarioG.celular);
        $("#RegistroForm #txt_email_a").val(ValidaUsuarioG.email);

        $("#RegistroForm #txt_usuario").val(ValidaUsuarioG.persona);
        $("#RegistroForm #txt_paterno_u").val(ValidaUsuarioG.paterno);
        $("#RegistroForm #txt_materno_u").val(ValidaUsuarioG.materno);
        $("#RegistroForm #txt_nombre_u").val(ValidaUsuarioG.nombre);
        $("#RegistroForm #txt_dni_u").val(ValidaUsuarioG.dni);
        $("#RegistroForm #txt_dependencia_u").val(ValidaUsuarioG.dependencia);
        $("#RegistroForm #txt_cargo_u").val(ValidaUsuarioG.cargo);
        $("#RegistroForm #txt_celular_u").val(ValidaUsuarioG.celular);
        $("#RegistroForm #txt_email_u").val(ValidaUsuarioG.email);
    },

    Validar : ()=> {
        r = true;

        if( $("#RegistroForm #txt_dni_a").val() == '' ){
            r = false;
            msjG.alert('warning', 'Buscar y seleccionar persona afectada', 5000 );
            $("#RegistroForm #txt_dni_a").focus();
        }
        else if( $("#RegistroForm #txt_direccion_a").val() == '' ){
            r = false;
            msjG.alert('warning', 'Ingresar domicilio', 5000 );
            $("#RegistroForm #txt_direccion_a").focus();
        }
        else if( $("#RegistroForm #txt_celular_a").val() == '' ){
            r = false;
            msjG.alert('warning', 'Ingresar celular de contacto', 5000 );
            $("#RegistroForm #txt_celular_a").focus();
        }
        else if( $("#RegistroForm #txt_email_a").val() == '' ){
            r = false;
            msjG.alert('warning', 'Ingresar email', 5000 );
            $("#RegistroForm #txt_email_a").focus();
        }
        else if( $("#RegistroForm #txt_dni_d").val() == '' ){
            r = false;
            msjG.alert('warning', 'Buscar y seleccionar persona a denunciar', 5000 );
            $("#RegistroForm #txt_dni_d").focus();
        }
        else if( $("#RegistroForm #txt_descripcion").val() == '' ){
            r = false;
            msjG.alert('warning', 'Ingresar la descripción de los hechos', 5000 );
            $("#RegistroForm #txt_descripcion").focus();
        }
        else if( $("#RegistroForm #pdf_nombre").val() == '' ){
            r = false;
            msjG.alert('warning', 'Buscar y seleccionar medio probatorio(Archivo)', 5000 );
            $("#RegistroForm #pdf_nombre").focus();
        }

        return r;
    },
    
    Registrar : ()=> {
        if( Registro.Validar() ){
            msjG.question('Registrar formulario y generar PDF', '', Registro.RegistrarOk );
        }
    },
    
    RegistrarOk : ()=>{
        masterG.overlayG(true);
        AjaxRegistro.Registrar(Registro.HTMLRegistrar);
    },
    
    HTMLRegistrar : (result)=> {
        if( result.rst==1 ){
            msjG.alert('success', result.msj, 5000 );
            masterG.SelectImagen(result.miarchivo,'#txt_file_imagen','#txt_file');
            miArchivoG = result.miarchivo;
        }
        else{
            msjG.alert('warning', result.msj, 3000 );
        }
        masterG.overlayG();
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

window.addEventListener('invokerOk', (e)=> {
    msjG.alert('success', 'Documento firmado correctamente', 4000 );
    masterG.SelectImagen(archivoFirmadoG,'#txt_firma_imagen','#txt_firma');
    //location.reload();
    $("#RegistroForm #txt_denunciada, #RegistroForm #txt_dependencia_d, #RegistroForm #txt_cargo_d").val("");
    $("#RegistroForm #txt_paterno_d, #RegistroForm #txt_materno_d, #RegistroForm #txt_nombre_d, #RegistroForm #txt_dni_d").val("");
    $("#RegistroForm #txt_descripcion, #RegistroForm #pdf_nombre, #RegistroForm #pdf_archivo").val("");
    masterG.SelectImagen('','#RegistroForm #pdf_img, #txt_file_imagen, #txt_firma_imagen');
    $("#RegistroForm #slct_afectada").val(1);
    Registro.Afectada();
});
</script>
