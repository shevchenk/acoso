<?php
namespace App\Models\Midato;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    protected   $table = 'personas_detalles';

    public static function Actualizar($r)
    {
        $usuario = Auth::user()->id;
        $persona =  Persona::where('dni',trim($r->dni))
                    ->where('estado_firma',0)
                    ->where('ultimo',1)
                    ->where('estado',1)
                    ->first();
        
        DB::beginTransaction();
        if( !isset($persona->id) ){
            $update  =  Persona::where('dni',trim($r->dni))
                        ->where('ultimo',1)
                        ->update(
                            [
                            'ultimo' => 0,
                            'persona_id_updated_at' => $usuario
                            ]
                        );

            $persona = new Persona;
            $persona->persona_id_created_at=$usuario;
        }
        else{
            $persona = Persona::find($persona->id);
            $persona->persona_id_updated_at=$usuario;
        }
        
        $persona->dni = trim($r->dni);
        $persona->nombre = trim($r->nombre);
        $persona->paterno = trim($r->paterno);
        $persona->materno = trim($r->materno);
        $persona->telefono = trim($r->telefono);
        $persona->celular = trim($r->celular);
        $persona->email = trim($r->email);
        $persona->direccion = trim($r->direccion);
        $persona->codi_dist_tdi = trim($r->codi_dist_tdi);
        $persona->codi_prov_tpr = trim($r->codi_prov_tpr);
        $persona->codi_depa_dpt = trim($r->codi_depa_dpt);
        $persona->familiar = trim($r->familiar);
        $persona->familiar_celular1 = trim($r->familiar_celular1);
        $persona->familiar_celular2 = trim($r->familiar_celular2);
        $persona->codi_depe_tde = trim($r->codi_depe_tde);
        $persona->codi_carg_tca = trim($r->codi_carg_tca);
        $persona->tipo_contrato = trim($r->tipo_contrato);
        $persona->fecha_act = date("Y-m-d");
        $persona->save();
        DB::commit();

        return $persona->id;
    }
}
