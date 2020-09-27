<?php
/* 
TODO:
Instalar el componente wkhtmltopdf según servidor
https://wkhtmltopdf.org/downloads.html

Declaración Dinámica GET y POST
Revisar vendor/laravel/framework/src/Illuminate/Routing/Router.php
    public function get($uri, $action = null)
    {
        $strpos=strpos($_SERVER['REQUEST_URI'], 'ReportDynamic');
        $uriaux=substr($_SERVER['REQUEST_URI'],$strpos+1+13);
        $uriaux_url=explode('?', $uriaux);
        if( $strpos!==false && isset($uriaux_url[0]) && $uriaux_url[0]!='' ){
                $uriaux=str_replace(".","\\",$uriaux_url[0]);
                $action=$uriaux;
        }
        return $this->addRoute(['GET', 'HEAD'], $uri, $action);
    }

    public function post($uri, $action = null)
    {
        $strpos=strpos($_SERVER['REQUEST_URI'], 'AjaxDynamic');
        $uriaux=substr($_SERVER['REQUEST_URI'],$strpos+1+11);
        if( isset( $_SERVER['HTTP_X_CSRF_TOKEN'] ) AND $strpos!==false ){
                $uriaux=str_replace(".","\\",$uriaux);
                $action=$uriaux;
        }
        return $this->addRoute('POST', $uri, $action);
    }
FIXME:
*/
?>