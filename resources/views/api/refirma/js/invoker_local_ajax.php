<script type="text/javascript">
var AjaxInvokerLocal={
    getArguments: (evento)=> {
        var data={type: typeG, document:miArchivoG};
        url='AjaxDynamic/Api.InvokerAP@GetArguments';
        masterG.postAjax(url,data,evento);
    },
};
</script>
