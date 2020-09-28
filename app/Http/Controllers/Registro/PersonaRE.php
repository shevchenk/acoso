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


    public function Actualizar(Request $r)
    {
        if ( $r->ajax() ) {
            $mensaje= [
                'required'    => ':attribute, es requerido',
                'unique'      => ':attribute, debe ser único',
                'email'       => ':attribute, no es válido',
            ];

            $rules = [
                'email' => ['required', 'email']
            ];

            $validator=Validator::make($r->all(), $rules,$mensaje);

            if ( !$validator->fails() ) {
                $r['dni'] = Auth::user()->dni;
                $r['codi_depe_tde']=substr($r->codi_depe_tde,5);
                $id = Persona::Actualizar($r);
                $miarchivo = $this->GenerarPDF($r, $id);
                $return['rst'] = 1;
                $return['miarchivo'] = $miarchivo;
                $return['msj'] = 'Registro actualizado';
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

        $r['ubigeo'] = $persona->codi_dist_tdi.'-'.$persona->codi_prov_tpr.'-'.$persona->codi_depa_dpt;
        $ubigeo = PersonaPG::ListarDistritos($r);

        $r['codi_depe_tde'] = $persona->codi_depe_tde;
        $area = PersonaPG::ListarAreas($r);

        $r['codi_carg_tca'] = $persona->codi_carg_tca;
        $cargo = PersonaPG::ListarCargos($r);
        $adicional= [
            'distrito'      => $ubigeo[0]->nomb_dist_tdi,
            'provincia'     => $ubigeo[0]->nomb_prov_tpr,
            'departamento'  => $ubigeo[0]->nomb_dpto_dpt,
            'area'          => $area[0]->nombre_depend,
            'cargo'         => $cargo[0]->desc_carg_tca
        ];
        
        $pdfOrientation = 'portrait';
        $datos = [
            'persona'   => $persona, 
            'adicional' => $adicional
        ];
        $pdf =  PDF::loadView('actualizar.misdatos.pdf.firmar', $datos)
                ->setPaper('a4')
                ->setOrientation($pdfOrientation);
        $pdf->save($url);

        return $url;
    }

}
