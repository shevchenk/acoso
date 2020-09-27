@extends('include.layout.master')

@section('include')
    @parent
    @include( 'api.refirma.js.invoker_client' )
    @include( 'api.refirma.js.index' )
    @include( 'api.refirma.js.invoker_local' )
    @include( 'api.refirma.js.invoker_local_ajax' )
@endsection

@section('content')
    <div class="page-header page-header-bordered">
      <h1 class="page-title">Refirma</h1>
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Prueba de Refirma</h3>
        </div>
        <div class="panel-body">
            <p>
                Usted podrá realizar la firma de un documento desde la web (medinte una URL) o 
                de un documento desde su PC (Usted seleccionará un archivo de su PC). 
                En ambos casos, el documento firmado será subido con el nombre "firmado.pdf" a la carpeta 
                upload de la raíz de este demo, el mismo que será sobrescrito por cada firma digital realizada. 
            </p>
            <p>
                Antes de continuar, es necesario realizar la <a href="http://portales.reniec.gob.pe/web/dni/aplicaciones" target="_blank">descarga e instalación del Middleware del DNI electrónico</a> 
                (Si es que va a firmar digitalmente con su DNIe) según la arquitectura del sistema operativo. Además, deberá contar con Java 8 como mínimo instalado en su PC.
            </p>
        </div>
      </div>

      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Botón de prueba</h3>
        </div>
        <div class="panel-body">
            <p>
                <a class="btn btn-success" href="#" role="button" onclick="IniciaFirma('L');">Firmar documento desde mi PC</a>
                <a class="btn btn-warning" href="#" role="button" onclick="IniciaFirma('W');">Firmar documento desde mi WEB</a>
            </p>
            <p>
                Desde la página web del <a href="https://pki.reniec.gob.pe/invoker/" target="_blank">ReFirma Invoker</a>, usted podrá ver un demo funcional con las mismas opciones que este,
                pero con una adaptación diferente. Según las necesidades es que se tiene que realizar la implementación
                del componente.
            </p>
            <p>
                <a id="signedDocument" class="btn btn-default" href="#" role="button">Ver último documento firmado</a>
            </p>
            <div id="addComponent"></div>
        </div>
      </div>
    </div>
@endsection
