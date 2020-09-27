<?php
namespace App\Http\Controllers\Acceso;

use App\Http\Controllers\Controller;
use App\Models\Acceso\Persona;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use lawiet\src\NuSoapClient;

class PersonaAC extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'acceso.login';

    public function ValidaPersona(Request $r)
    {
        if ( $r->ajax() ) {
            $r['rst'] = 3;
            $persona = Persona::where('dni', $r->get($this->username()))->first();
            
            if( 1==2 ){ //$this->validateAuthActiveDirectory($r)
                
            }
            else{
                if( isset($persona->id) ){
                    if( Hash::check($r->password, $persona->password) ){
                        $r['rst'] = 1;
                    }
                }
            }
        }
        return $this->login($r);
    }

    public function sendFailedLoginResponse(Request $r)
    {
        return $r;
    }

    public function authenticated(Request $r)
    {
        $result['rst']=1;
        // TODO: Estructura del arreglo   orden, icono, menu, url, opcion;
        $menu = Persona::Menu();
        $privilegios = $menu[0];
        $opciones = $menu[1];
        
        $session= array(
            'opciones'          => $opciones,
            'privilegios'       => $privilegios,
        );
        session($session);
        return response()->json($result);
    }

    public function username()
    {
        return "usuario";
    }

    protected function validateAuthActiveDirectory(Request $r){

        $oClient = new NuSoapClient( env('ACTIVE_DIRECTORY',''), 'wsdl');

        $oClient->soap_defencoding = 'UTF-8';

        $oClient->decode_utf8 = FALSE;

        $parameters = [
            'domain'   => 'SINEACE',
            'username' => $r->get($this->username()),
            'pwd'      => $r->get('password')
        ];

        $resultado = $oClient->call('ValidarActiveDirectory', $parameters);

        return ($resultado['ValidarActiveDirectoryResult'] === 'true') ? true : false;
    }
}
