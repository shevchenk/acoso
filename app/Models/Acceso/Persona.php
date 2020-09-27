<?php

namespace App\Models\Acceso;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Persona extends Authenticatable
{
    use Notifiable;
    protected   $table = 'personas';


    public static function runEditPassword($r)
    {
        $persona_id = Auth::user()->id;
        $persona = Persona::find($persona_id);
        $bcryptpassword = bcrypt($r->password);
        if( Hash::check($r->password_actual, $persona->password) ){
            $persona->password = $bcryptpassword;
            $persona->persona_id_updated_at = $persona_id;
            $persona->save();
            return 1;
        }
        else{
            return 2;
        }
    }

    public static function Menu()
    {
        $usuario = Auth::user()->id;
        
        $resultP =  DB::table('privilegios as p')
                    ->join('usuarios_privilegios as pp', function($join){
                        $join->on('pp.privilegio_id','p.id')
                        ->where('pp.estado',1);
                    })
                    ->select('p.id','p.privilegio')
                    ->where('pp.usuario_id',1)
                    ->where('p.estado',1)
                    ->orderBy('p.privilegio')
                    ->get();
        
        $privilegio_id = 0;

        if( isset($resultP[0]->id) ){
            $privilegio_id = $resultP[0]->id;
        }

        $resultO =  DB::table('privilegios_opciones AS po')
                    ->join('opciones AS o', function($join){
                            $join->on('o.id','po.opcion_id')
                            ->where('o.estado',1);
                    })
                    ->join('menus AS m', function($join){
                            $join->on('m.id','o.menu_id')
                            ->where('m.estado',1);
                    })
                    ->select('m.class_icono', 'm.menu', 'o.ruta', 'o.opcion')
                    ->where('po.estado',1)
                    ->where('po.privilegio_id', $privilegio_id)
                    ->orderBy('m.menu','ASC')
                    ->orderBy('o.opcion','ASC')
                    ->get();

        return array($resultP,$resultO);
    }

    public static function InsertarUsuario($r, $persona)
    {
        $pe = [];
        if( !isset($persona->id) ) {
            $pe= new Persona;
            $pe->usuario_id_created_at = 0;
            $pe->username = $r->username;
        }
        else{
            $pe= Persona::find($persona->id);
            $pe->usuario_id_updated_at = 0;
        }
            
        $pe->dni = $r->username;
        $pe->nombres = $r->username;
        $pe->password = bcrypt($r->password);
        $pe->inst_id = $r['inst_id'];
            $pe->privilegio_id = 2;
        $pe->save();

        return $pe->id;
    }

    public static function InsertarUsusarioInstitucion($r)
    {
        $pe = Persona::where('username', $r['username'])->first();
        if( !isset($pe->id) ) {
            $pe= new Persona;
            $pe->usuario_id_created_at = 0;
            $pe->username = $r['username'];
        }
        else{
            $pe= Persona::find($pe->id);
            $pe->usuario_id_updated_at = 0;
        }
            
        $pe->dni = $r['dni'];
        $pe->nombres = $r['nombres'];
        $pe->email = $r['email'];
        $pe->celular = $r['celular'];
        $pe->cargo = $r['cargo'];
        $pe->password = bcrypt($r['password']);
        $pe->inst_id = $r['inst_id'];
        $pe->privilegio_id = $r['privilegio_id'];
        $pe->save();

        return $pe->id;
    }
}
