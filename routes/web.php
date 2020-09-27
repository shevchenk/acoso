<?php
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'Ebtp' => Api\EbtpAP::class,
    //'posts' => PostController::class,
]);

Route::post('/Refirma','Refirma\InvokerRE@FileRetorno');
Route::get('/pas/{password}', function ($password) {
    echo bcrypt($password);
});

Route::get('/salir','Acceso\PersonaAC@logout');
Route::get('/', function () { return view('acceso.login'); } );

Route::get(
    '/{ruta}', function ($ruta) {
        if( session()->has('opciones') ){
            $valores['valida_ruta_url'] = $ruta;
            //return view($ruta)->with($valores);
    
            if( strpos( session('opciones'),$ruta )!==false 
            || $ruta=='acceso.index'
            || $ruta=='acceso.myself' ){
                return view($ruta)->with($valores);
            }
            else{
                return redirect('acceso.index');
            }
        }
        else{
            return redirect('/salir');
        }
    }
);

Route::get('/ReportDynamic/{ruta}','Refirma\InvokerRE@Valida');
Route::post('/AjaxDynamic/{ruta}','Refirma\InvokerRE@Valida');
