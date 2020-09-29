<?php
namespace App\Http\Controllers\Acceso;

use App\Http\Controllers\Controller;
use App\Models\Acceso\Persona;
use App\Models\Registro\PersonaPG;
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
        if( $this->validateAuthActiveDirectory($r) ){
            $personaPG = PersonaPG::Persona($r);

            if( isset($personaPG->dni) ) // Existe Persona
            {
                $persona = Persona::where('dni',$personaPG->dni)->first();
                $pe = array();
                if( !isset($persona->id) ) // Nuevo Usuario
                {
                    $pe= new Persona;
                    $pe->dni = $personaPG->dni;
                    $pe->nombre = $personaPG->nombre;
                    $pe->paterno = $personaPG->paterno;
                    $pe->materno = $personaPG->materno;
                    $pe->persona_id_created_at = 0;
                }
                else // Existe Usuario
                { 
                    $pe= Persona::find($persona->id);
                    $pe->nombre = $persona->nombre;
                    $pe->paterno = $persona->paterno;
                    $pe->materno = $persona->materno;
                    $pe->persona_id_updated_at = 0;
                }

                $pe->usuario = $r->usuario;
                $pe->password = bcrypt($r->password);
                $pe->save();
            }
            else 
            {
                $result['rst'] = 2;
                return $result;
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
