<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EbtpAP extends Controller
{    
    public function __construct()
    {
        //$this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function index(Request $r)
    {
        $result=array();

        if($r->opcion=='Institucion'){
            $result = $this->Institucion($r);
        }
        elseif($r->opcion=='Programa'){
            $result = $this->Programa($r);
        }

        return $result;
    }

    public function Show($opcion){ }

    public function Store(){ }

    public function response($code=200, $status="", $message="")
    {
        http_response_code($code);
        if( !empty($status) && !empty($message) )
        {
            $response = array(
                        "status" => $status ,
                        "message"=>$message,
                        "server" => $_SERVER['REMOTE_ADDR']
                    );  
            echo json_encode($response, JSON_PRETTY_PRINT);
        }            
    }

    public function Institucion(Request $r)
    {
        $institucion = json_decode( $r['institucion'], true );
        $usuarios = json_decode( $r['usuarios'], true );
        
        return response()->json($institucion); 
    }

    public function Programa(Request $r)
    {
        $institucion = json_decode( $r['institucion'], true );
        $usuarios = json_decode( $r['usuarios'], true );
        
        return response()->json($usuarios); 
    }
}
