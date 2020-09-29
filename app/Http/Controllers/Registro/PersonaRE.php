<?php
namespace App\Http\Controllers\Registro;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Registro\Persona;
use App\Models\Registro\PersonaPG;
use Illuminate\Support\Facades\Auth;
use PDF;

class PersonaRE extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
        error_reporting(E_ERROR);
    }

    public function Listar(Request $r)
    {
        if ( $r->ajax() ) {
            $r['dni'] = Auth::user()->dni;
            if( Auth::user()->id == 1 ){
                $r['dni'] = '43049027';
            }
            $data = PersonaPG::Listar($r);
            $return['rst']=1;
            $return['data']=$data;            
            return response()->json($return);
        }
    }

    public function ListarPersona(Request $r)
    {
        if ( $r->ajax() ) {
            $data = PersonaPG::ListarPersona($r);
            $return['rst']=1;
            $return['data']=$data;            
            return response()->json($return);
        }
    }


    public function Registrar(Request $r)
    {
        if ( $r->ajax() ) {
            $mensaje= [
                'required'    => ':attribute, es requerido',
                'unique'      => ':attribute, debe ser único',
                'email'       => ':attribute, no es válido',
            ];

            $rules = [
                'email_a' => ['required', 'email'],
                'celular_a' => ['required'],
                'direccion_a' => ['required'],
            ];

            $validator=Validator::make($r->all(), $rules,$mensaje);

            if ( !$validator->fails() ) {
                $r['dni'] = Auth::user()->dni;
                $id = Persona::Registrar($r);
                $miarchivo = $this->GenerarPDF($r, $id);
                
                $return['rst'] = 1;
                $return['miarchivo'] = $miarchivo;
                $return['msj'] = 'Registro realizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = $validator->errors()->all()[0];
            }
            return response()->json($return);
        }
    }

    public function GenerarPDF(Request $r, $id)
    {
        $persona= Persona::find($id);
        $url='MisDatos/F'.date("Ymd").'/User'.$id.'.pdf';

        if( is_file($url) ){
            @unlink($url);
        }

        $urld=explode("/",$url);
        $urlt=array();
        for ($i=0; $i < (count($urld)-1) ; $i++) { 
            array_push($urlt, $urld[$i]);
            $urltexto=implode("/",$urlt);
            if ( !is_dir($urltexto) ) {
                mkdir($urltexto,0777);
            }
        }

        $pdfOrientation = 'portrait';
        $datos = [
            'persona'   => $persona,
        ];
        $pdf =  PDF::loadView('confidencial.registro.pdf.firmar', $datos)
                ->setPaper('a4')
                ->setOrientation($pdfOrientation);
        $pdf->save($url);

        return $url;
    }

}
