<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Midato\Persona;
use Illuminate\Http\Request;
use ZipArchive;
use Mail;

class InvokerAP extends Controller
{
    private $fileRetorno='Refirma';
    
    public function __construct()
    {
        //$this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function Valida(Request $r)
    {
        return "probando yo ando";
    }

    public function GetArguments(Request $r)
    {
        $serverName= $_SERVER['SERVER_NAME'];
        if( $serverName=='localhost' ){
            $serverName='localhost/acoso/public';
        }
        elseif( $serverName=='172.16.101.98' ){
            $serverName='172.16.101.98/acoso/public';
        }

        $fileDownloadUrl='';
        $contentFile='';
        if( $r->has('type') && $r->type=='W' ){
            $fileDownloadUrl='http://'.$serverName.'/'.$r->document;
            $contentFile=substr($r->document,19);
        }

        $outputFile = substr(substr($r->document,19),0,-4).'F.pdf';

        if ( $r->ajax() ) {
        $data ='{
            "app":"pdf",
            "fileUploadUrl":"http://'.$serverName.'/'.$this->fileRetorno.'",
            "reason":"Soy el autor del documento",
            "type":"'.$r->type.'",
            "clientId":"'.env('REFIRMA_CLIENTID', '').'",
            "clientSecret":"'.env('REFIRMA_CLIENTSECRET', '').'",
            "dcfilter":".*FIR.*|.*FAU.*",
            "fileDownloadUrl":"'.$fileDownloadUrl.'",
            "posx":"400",
            "posy":"30",
            "outputFile":"'.$outputFile.'",
            "protocol":"T",
            "contentFile":"'.$contentFile.'",
            "stampAppearanceId":"0",
            "isSignatureVisible":"true",
            "idFile":"MyForm",
            "fileDownloadLogoUrl":"http://'.$serverName.'/MisDatos/iLogo1.png",
            "fileDownloadStampUrl":"http://'.$serverName.'/MisDatos/iFirma1.png",
            "pageNumber":"0",
            "maxFileSize":"5242880",
            "fontSize":"7",
            "timestamp":"false"
        }';

        $data64 = base64_encode($data);
            $return['rst'] = 1;
            $return['archivofirmado'] = 'MisDatos/F'.date("Ymd").'/'.$outputFile;
            $return['data'] = $data64;
            return response()->json($return);
        }
    }

    public function FileRetorno(Request $r)
    {
        $url='MisDatos/F'.date("Ymd");

        $urld=explode("/",$url);
        $urlt=array();
        for ($i=0; $i < count($urld) ; $i++) { 
            array_push($urlt, $urld[$i]);
            $urltexto=implode("/",$urlt);
            if ( !is_dir($urltexto) ) {
                mkdir($urltexto,0777);
            }
        }

        $nombreArchivo = $_FILES['MyForm']['name'];
        $tmpArchivo = $_FILES['MyForm']['tmp_name'];
        $file = $url.'/'.$nombreArchivo;

        if (!move_uploaded_file($tmpArchivo, $file)) {
            $return['rst'] = 2;
            $return['msj'] = 'Error de Carga';
            return response()->json($return);
        }
        else{
            $busca = array("User","F",".pdf");
            $id = str_replace($busca,"", $nombreArchivo);
            $persona = Persona::find($id);
            $persona->estado_firma = 1;
            $persona->save();

            /*TODO:*************************************ZIP*****************************************************/
            //$persona = Persona::find($id);
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $zipFile = 'MisDatos/F'.date("Ymd").'/zip-'.substr(str_shuffle($permitted_chars), 0, 10).'.zip';

            $zip = new ZipArchive;
            if (file_exists($zipFile)) {
                unlink($zipFile);
            }
            
            $zipStatus = $zip->open($zipFile, ZipArchive::CREATE);
            if ($zipStatus == true) {
                $fileName = $persona->ruta_archivo;
                $baseName = basename($persona->ruta_archivo);
                $zip->addFile($fileName, $baseName);
                $zip->setEncryptionName($baseName, ZipArchive::EM_AES_256);

                $fileName = $file;
                $baseName = basename($file);
                $zip->addFile($fileName, $baseName);
                $zip->setEncryptionName($baseName, ZipArchive::EM_AES_256);
            }
            
            $password = substr(str_shuffle($permitted_chars), 0, 8);
            $zip->setPassword($password);
            $zip->close();

            @unlink($persona->ruta_archivo);
            @unlink("MisDatos/F".date("Ymd")."/User".$persona->id.'.pdf');
            @unlink("MisDatos/F".date("Ymd")."/User".$persona->id.'F.pdf');

            /*TODO:*************************************EMAIL**************************************************/
            $responsable = Persona::EmailResponsable();
            
            if( !isset($responsable->email) ){
                $emailseguimiento =['apoyo-oti14@sineace.gob.pe']; // Colocar email corporativo
            }
            else{
                $emailseguimiento = explode(",", $responsable->email);
            }

            $email = '';
            if( $persona->email_a != '' ){
                //$email = [$persona->email_a];
                $email=['apoyo-oti14@sineace.gob.pe']; // Colocar email corporativo
            }

            if( $email == '' ){
                $email =['apoyo-oti14@sineace.gob.pe']; // Colocar email corporativo
            }

            $serverName= $_SERVER['SERVER_NAME'];
            if( $serverName=='localhost' ){
                $serverName='localhost/acoso/public';
            }
            elseif( $serverName=='172.16.101.98' ){
                $serverName='172.16.101.98/acoso/public';
            }

            $fileDownloadUrl='http://'.$serverName.'/'.$zipFile;

            $parametros=array(
                'email'=>$email,
                'emailseguimiento'=>$emailseguimiento,
                'subject'=>'.::Formulario de denuncia::.',
                'blade' => 'confidencial.registro.email.registro',
                'nombre_u' => $persona->nombre_u,
                'paterno_u' => $persona->paterno_u,
                'materno_u' => $persona->materno_u,
                'nombre_d' => $persona->nombre_d,
                'paterno_d' => $persona->paterno_d,
                'materno_d' => $persona->materno_d,
                'nombre_a' => $persona->nombre_a,
                'paterno_a' => $persona->paterno_a,
                'materno_a' => $persona->materno_a,
                'contraseña' => $password,
                'url' => $fileDownloadUrl,
            );
            
            Mail::send($parametros['blade'],$parametros, 
                function($message) use($parametros){
                    $message->to($parametros['email']);
                    $message->bcc($parametros['emailseguimiento']);
                    $message->subject($parametros['subject']);
                }
            );
            /**************************************************************************************************/
        }
    }
}
