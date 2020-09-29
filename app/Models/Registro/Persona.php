<?php
namespace App\Models\Registro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Libreria\File;

class Persona extends Model
{
    protected   $table = 'personas_detalles';

    public static function Registrar($r)
    {
        $usuario = Auth::user()->id;
        
        DB::beginTransaction();
        $persona = new Persona;
        $persona->persona_id_created_at=$usuario;
        
        $persona->dni_a = trim($r->dni_a);
        $persona->nombre_a = trim($r->nombre_a);
        $persona->paterno_a = trim($r->paterno_a);
        $persona->materno_a = trim($r->materno_a);
        $persona->dependencia_a = trim($r->dependencia_a);
        $persona->cargo_a = trim($r->cargo_a);
        $persona->direccion_a = trim($r->direccion_a);
        $persona->celular_a = trim($r->celular_a);
        $persona->email_a = trim($r->email_a);

        $persona->dni_d = trim($r->dni_d);
        $persona->nombre_d = trim($r->nombre_d);
        $persona->paterno_d = trim($r->paterno_d);
        $persona->materno_d = trim($r->materno_d);
        $persona->dependencia_d = trim($r->dependencia_d);
        $persona->cargo_d = trim($r->cargo_d);
        /*$persona->celular_d = trim($r->celular_d);
        $persona->email_d = trim($r->email_d);*/

        $persona->dni_u = trim($r->dni_u);
        $persona->nombre_u = trim($r->nombre_u);
        $persona->paterno_u = trim($r->paterno_u);
        $persona->materno_u = trim($r->materno_u);
        $persona->dependencia_u = trim($r->dependencia_u);
        $persona->cargo_u = trim($r->cargo_u);
        /*$persona->celular_u = trim($r->celular_u);
        $persona->email_u = trim($r->email_u);*/
        
        $persona->descripcion = trim($r->descripcion);
        $persona->fecha_registro = date("Y-m-d");
        $persona->save();

        if( trim($r->pdf_archivo) !='' ){
            $urld=explode(".",$r->pdf_nombre);
            $url = "MisDatos/F".date("Ymd")."/prueba-".$persona->id.".".end($urld);
            $persona->ruta_archivo = $url;
            $persona->save();
            
            File::FileToFile($r->pdf_archivo, $url);
        }
        DB::commit();

        return $persona->id;
    }

    public static function EmailResponsable()
    {
        DB::statement('SET group_concat_max_len := @@max_allowed_packet');
        // Privilegio 4 => Especialista EBTP
        $responsable = 
            DB::table('responsable')
            ->select( DB::raw('GROUP_CONCAT(email) AS email') )
            ->where('estado', '=', '1')
            ->first();

        return $responsable;
    }
}
