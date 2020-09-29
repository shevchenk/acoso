<script type="text/javascript">
var añoG = "<?php echo date('Y');?>";
var AfectadaOpciones = {
    placeholder: 'Persona Afectada',
    url: "AjaxDynamic/Registro.PersonaRE@ListarPersona",
    listLocation: "data",
    getValue: "persona",
    ajaxSettings: { dataType: "json", method: "POST", data: {},
        success: function(r) {
            if(r.data.length==0){ 
                msjG.alert('warning', $("#RegistroForm #txt_afectada").val()+' sin resultados', 5000 );
            }
        },
        error: (result)=> {
            if( typeof(result.status)!='undefined' && result.status==401 && result.statusText=='Unauthorized' ){
                msjG.alert('warning', 'Su sesión a caducado', 4000 );
            }
            else if( typeof(result.status)!='undefined' && result.status==419 && result.responseJSON.message=='CSRF token mismatch.' ){
                msjG.alert('warning','Token vencido ó inválido, refrescar la página',4000);
            }
            else{
                msjG.alert('error', 'Intente nuevamente, si el error persiste comunicarse con el Administrador del sistema', 4000 );
            }
        }
    },
    preparePostData: function(data) {
        data.phrase = $("#RegistroForm #txt_afectada").val();
        return data;
    },
    list: {
        onClickEvent: function() {
            var dni = $("#RegistroForm #txt_afectada").getSelectedItemData().dni;
            var paterno = $("#RegistroForm #txt_afectada").getSelectedItemData().paterno;
            var materno = $("#RegistroForm #txt_afectada").getSelectedItemData().materno;
            var nombre = $("#RegistroForm #txt_afectada").getSelectedItemData().nombre;
            var celular = $("#RegistroForm #txt_afectada").getSelectedItemData().celular;
            var email = $("#RegistroForm #txt_afectada").getSelectedItemData().email;
            var direccion = $("#RegistroForm #txt_afectada").getSelectedItemData().direccion;
            var dependencia = $("#RegistroForm #txt_afectada").getSelectedItemData().dependencia;
            var cargo = $("#RegistroForm #txt_afectada").getSelectedItemData().cargo;

            $("#RegistroForm #txt_dni_a").val(dni).trigger("change");
            $("#RegistroForm #txt_paterno_a").val(paterno).trigger("change");
            $("#RegistroForm #txt_materno_a").val(materno).trigger("change");
            $("#RegistroForm #txt_nombre_a").val(nombre).trigger("change");
            $("#RegistroForm #txt_celular_a").val(celular).trigger("change");
            $("#RegistroForm #txt_email_a").val(email).trigger("change");
            $("#RegistroForm #txt_direccion_a").val(direccion).trigger("change");
            $("#RegistroForm #txt_dependencia_a").val(dependencia).trigger("change");
            $("#RegistroForm #txt_cargo_a").val(cargo).trigger("change");
            $("#RegistroForm #txt_afectada").addClass('is-valid').removeClass('is-invalid');
        },
        onLoadEvent: function() {
            $("#RegistroForm #txt_afectada").removeClass('is-valid').addClass('is-invalid');
        },
    },
    template: {
        type: "description",
        fields: {
            description: "detalle"
        }
    },
    adjustWidth:false,
};

var DenunciadoOpciones = {
    placeholder: 'Persona Denunciada',
    url: "AjaxDynamic/Registro.PersonaRE@ListarPersona",
    listLocation: "data",
    getValue: "persona",
    ajaxSettings: { dataType: "json", method: "POST", data: {},
        success: function(r) {
            if(r.data.length==0){ 
                msjG.alert('warning', $("#RegistroForm #txt_denunciada").val()+' sin resultados', 5000 );
            }
        },
        error: (result)=> {
            if( typeof(result.status)!='undefined' && result.status==401 && result.statusText=='Unauthorized' ){
                msjG.alert('warning', 'Su sesión a caducado', 4000 );
            }
            else if( typeof(result.status)!='undefined' && result.status==419 && result.responseJSON.message=='CSRF token mismatch.' ){
                msjG.alert('warning','Token vencido ó inválido, refrescar la página',4000);
            }
            else{
                msjG.alert('error', 'Intente nuevamente, si el error persiste comunicarse con el Administrador del sistema', 4000 );
            }
        }
    },
    preparePostData: function(data) {
        data.phrase = $("#RegistroForm #txt_denunciada").val();
        return data;
    },
    list: {
        onClickEvent: function() {
            var dni = $("#RegistroForm #txt_denunciada").getSelectedItemData().dni;
            var paterno = $("#RegistroForm #txt_denunciada").getSelectedItemData().paterno;
            var materno = $("#RegistroForm #txt_denunciada").getSelectedItemData().materno;
            var nombre = $("#RegistroForm #txt_denunciada").getSelectedItemData().nombre;
            var celular = $("#RegistroForm #txt_denunciada").getSelectedItemData().celular;
            var email = $("#RegistroForm #txt_denunciada").getSelectedItemData().email;
            var dependencia = $("#RegistroForm #txt_denunciada").getSelectedItemData().dependencia;
            var cargo = $("#RegistroForm #txt_denunciada").getSelectedItemData().cargo;

            $("#RegistroForm #txt_dni_d").val(dni).trigger("change");
            $("#RegistroForm #txt_paterno_d").val(paterno).trigger("change");
            $("#RegistroForm #txt_materno_d").val(materno).trigger("change");
            $("#RegistroForm #txt_nombre_d").val(nombre).trigger("change");
            $("#RegistroForm #txt_celular_d").val(celular).trigger("change");
            $("#RegistroForm #txt_email_d").val(email).trigger("change");
            $("#RegistroForm #txt_dependencia_d").val(dependencia).trigger("change");
            $("#RegistroForm #txt_cargo_d").val(cargo).trigger("change");
            $("#RegistroForm #txt_denunciada").addClass('is-valid').removeClass('is-invalid');
        },
        onLoadEvent: function() {
            $("#RegistroForm #txt_denunciada").removeClass('is-valid').addClass('is-invalid');
        },
    },
    template: {
        type: "description",
        fields: {
            description: "detalle"
        }
    },
    adjustWidth:false,
};

</script>