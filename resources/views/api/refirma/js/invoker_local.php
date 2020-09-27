<script type="text/javascript">
    var archivoFirmadoG='';
    var miArchivoG='';
    var typeG='W';
    window.addEventListener('getArguments', (e)=> {
        AjaxInvokerLocal.getArguments(HTMLgetArguments);
    });

    HTMLgetArguments= (result)=> {
        dispatchEventClient('sendArguments', result.data);
        archivoFirmadoG= result.archivofirmado;
    }

    window.addEventListener('invokerOk', (e)=> {
        msjG.alert('success', 'Documento firmado correctamente', 4000 );
        masterG.SelectImagen(archivoFirmadoG,'#txt_firma_imagen','#txt_firma');
    });
            
    window.addEventListener('invokerCancel', (e)=> {
        msjG.alert('warning', 'El proceso de firma digital fue cancelado', 4000 );
        $("#txt_firma").href="#";
    });
</script>
