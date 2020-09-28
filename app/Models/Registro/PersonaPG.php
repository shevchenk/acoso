<?php
namespace App\Models\Registro;

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
                    , 'mp.num_tel_per AS celular', 'mp.email_emp_per AS email', 'mp.dir_emp_per AS direccion', 'mp.dir1_nomb_via AS via'
                    , 'mp.codi_depa_dpt', 'mp.codi_prov_tpr', 'mp.codi_dist_tdi'
                    , 'di.nomb_dist_tdi', 'pr.nomb_prov_tpr', 'r.nomb_dpto_dpt'
                    , 'mp.codi_depe_tde', 'mp.carg_area_per AS cargo',
                    DB::raw('CONCAT(mp.nom_emp_per, " ", mp.ape_pat_per, " ", mp.ape_mat_per) AS persona')
                    )
                    ->where('mp.libr_elec_per',$r->dni)
                    ->first();

        return $sql;
    }

    public static function ListarPersona($r)
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
                , 'mp.num_tel_per AS celular', 'mp.email_emp_per AS email', 'mp.dir_emp_per AS direccion', 'mp.dir1_nomb_via AS via'
                , 'mp.codi_depa_dpt', 'mp.codi_prov_tpr', 'mp.codi_dist_tdi'
                , 'di.nomb_dist_tdi', 'pr.nomb_prov_tpr', 'r.nomb_dpto_dpt'
                , 'mp.codi_depe_tde', 'mp.carg_area_per AS cargo', 'mp.libr_elec_per AS detalle',
                DB::raw('CONCAT(mp.nom_emp_per, " ", mp.ape_pat_per, " ", mp.ape_mat_per) AS persona')
                )
                ->where(
                    function($query) use ($r){
                        if( $r->has("phrase") ){
                            $phrase=trim($r->phrase);
                            if( $phrase !='' ){
                                $dphrase= explode(" ",$phrase);
                                $filtro=trim($dphrase[0]);
                                $query->where(
                                    function($query2) use ($filtro0){
                                        $query2->where('mp.nom_emp_per','ILIKE','%'.$filtro.'%')
                                        ->orWhere('mp.ape_pat_per','ILIKE','%'.$filtro.'%')
                                        ->orWhere('mp.ape_mat_per','ILIKE','%'.$filtro.'%');
                                    }
                                );
                                if( count($dphrase)>1 AND trim($dphrase[1])!='' ){
                                    $filtro=trim($dphrase[1]);
                                    $query->orWhere(
                                        function($query2) use ($filtro){
                                            $query2->where('mp.nom_emp_per','ILIKE','%'.$filtro.'%')
                                            ->orWhere('mp.ape_pat_per','ILIKE','%'.$filtro.'%')
                                            ->orWhere('mp.ape_mat_per','ILIKE','%'.$filtro.'%');
                                        }
                                    );
                                }
                                if( count($dphrase)>2 AND trim($dphrase[2])!='' ){
                                    $filtro=trim($dphrase[2]);
                                    $query->orWhere(
                                        function($query2) use ($filtro){
                                            $query2->where('mp.nom_emp_per','ILIKE','%'.$filtro.'%')
                                            ->orWhere('mp.ape_pat_per','ILIKE','%'.$filtro.'%')
                                            ->orWhere('mp.ape_mat_per','ILIKE','%'.$filtro.'%');
                                        }
                                    );
                                }
                            }
                        }
                    }
                )
                ->get();

        return $sql;
    }
}