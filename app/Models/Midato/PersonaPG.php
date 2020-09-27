<?php
namespace App\Models\Midato;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonaPG extends Model
{
    protected   $table = 'personas_detalles';

    public static function Persona($r)
    {
        $sql =  DB::connection('pgsql')
                ->table('maestro_personal AS mp')
                ->join('seg_user AS u', 'u.id_administrado', '=', 'mp.codi_empl_per')
                ->select('mp.libr_elec_per AS dni', 'mp.nom_emp_per AS nombre', 'mp.ape_pat_per AS paterno', 'mp.ape_mat_per AS materno')
                ->where('u.vc_nombre', 'ILIKE', $r->usuario)
                ->first();
        return $sql;
    }

    public static function Listar($r)
    {
        $sql =  DB::connection('pgsql')
                    ->table('maestro_personal AS mp')
                    ->join('tdistritos AS di',function($join){
                        $join->on('di.codi_dist_tdi','=','mp.codi_dist_tdi')
                        ->on('di.codi_prov_tpr','=','mp.codi_prov_tpr')
                        ->on('di.codi_depa_dpt','=','mp.codi_depa_dpt');
                    })
                    ->join('tprovincias AS pr',function($join){
                        $join->on('di.codi_prov_tpr','=','pr.codi_prov_tpr')
                        ->on('di.codi_depa_dpt','=','pr.codi_depa_dpt');
                    })
                    ->join('tdepartamentos AS r',function($join){
                        $join->on('di.codi_depa_dpt','=','r.codi_depa_dpt');
                    })
                    ->select('mp.libr_elec_per AS dni', 'mp.nom_emp_per AS nombre', 'mp.ape_pat_per AS paterno', 'mp.ape_mat_per AS materno'
                    , 'mp.num_tel_per AS telefono', 'mp.email_emp_per AS email', 'mp.dir_emp_per AS direccion', 'mp.dir1_nomb_via AS via'
                    , 'mp.codi_depa_dpt', 'mp.codi_prov_tpr', 'mp.codi_dist_tdi'
                    , 'di.nomb_dist_tdi', 'pr.nomb_prov_tpr', 'r.nomb_dpto_dpt'
                    , 'mp.codi_depe_tde', 'mp.codi_carg_tca AS tipo_contrato', 'mp.carg_area_per AS cargo'
                    )
                    ->where('mp.libr_elec_per',$r->dni)
                    ->first();

        return $sql;
    }

    public static function ListarCargos($r)
    {
        $sql =  DB::connection('pgsql')
                    ->table('tcargos')
                    ->select('codi_carg_tca', 'desc_carg_tca')
                    ->where(
                        function($query) use ($r){
                            if( $r->has("phrase") ){
                                $phrase=trim($r->phrase);
                                if( $phrase !='' ){
                                    $query->where('desc_carg_tca','ILIKE','%'.$phrase.'%');
                                }
                            }

                            if( $r->has("codi_carg_tca") ){
                                $codi_carg_tca=trim($r->codi_carg_tca);
                                if( $codi_carg_tca !='' ){
                                    $query->where('codi_carg_tca', $codi_carg_tca);
                                }
                            }
                        }
                    )
                    ->get();

        return $sql;
    }

    public static function ListarAreas($r)
    {
        $año=date('Y');
        $sql =  DB::connection('pgsql')
                    ->table('centro_costo')
                    ->selectRaw('MAX(anno_ejec_eje) AS anno_ejec_eje, MAX(codi_depe_tde) AS codi_depe_tde, nombre_depend')
                    ->groupBy('nombre_depend')
                    ->havingRaw('MAX(anno_ejec_eje) = ?', [$año])
                    ->orderBy('nombre_depend','asc');
                            
        if( $r->has("codi_depe_tde") ){
            $codi_depe_tde=trim($r->codi_depe_tde);
            if( $codi_depe_tde !='' ){
                $sql->havingRaw('MAX(codi_depe_tde) = ?', [$codi_depe_tde]);
            }
        }
        else{
            $sql->havingRaw('MAX(codi_depe_tde) IS NOT NULL');                
        }

        $sql = $sql->get();
        return $sql;
    }

    public static function ListarDistritos($r)
    {
        $sql =  DB::connection('pgsql')
                    ->table('tdistritos as di')
                    ->select( DB::raw("CONCAT(di.codi_dist_tdi, '-', di.codi_prov_tpr, '-', di.codi_depa_dpt) AS id")
                    ,'di.nomb_dist_tdi','pr.nomb_prov_tpr','r.nomb_dpto_dpt'
                    ,DB::raw("CONCAT(pr.nomb_prov_tpr,' | ',r.nomb_dpto_dpt) as detalle")
                    )
                    ->join('tprovincias AS pr',function($join){
                        $join->on('di.codi_prov_tpr','=','pr.codi_prov_tpr')
                        ->on('di.codi_depa_dpt','=','pr.codi_depa_dpt');
                    })
                    ->join('tdepartamentos AS r',function($join){
                        $join->on('di.codi_depa_dpt','=','r.codi_depa_dpt');
                    })
                    ->where(
                        function($query) use ($r){
                            if( $r->has("phrase") ){
                                $phrase=trim($r->phrase);
                                if( $phrase !='' ){
                                    $dphrase= explode("|",$phrase);
                                    $dphrase[0]=trim($dphrase[0]);
                                    $query->where('di.nomb_dist_tdi','ILIKE','%'.$dphrase[0].'%');
                                    if( count($dphrase)>1 AND trim($dphrase[1])!='' ){
                                        $dphrase[1]=trim($dphrase[1]);
                                        $query->where('pr.nomb_prov_tpr','ILIKE','%'.$dphrase[1].'%');
                                    }
                                    if( count($dphrase)>2 AND trim($dphrase[2])!='' ){
                                        $dphrase[2]=trim($dphrase[2]);
                                        $query->where('r.nomb_dpto_dpt','ILIKE','%'.$dphrase[2].'%');
                                    }
                                }
                            }

                            if( $r->has('ubigeo') ){
                                $ubigeo = trim($r->ubigeo);
                                if( $ubigeo!='' ){
                                    $dubigeo = explode('-',$ubigeo);
                                    if( count($dubigeo)==3 ){
                                        $query->where('di.codi_dist_tdi', $dubigeo[0])
                                        ->where('pr.codi_prov_tpr', $dubigeo[1])
                                        ->where('pr.codi_depa_dpt', $dubigeo[2]);
                                    }
                                }
                            }
                        }
                    )
                    ->get();

        return $sql;
    }
}