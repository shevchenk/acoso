
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ing. Jorge Salcedo Franco (Shevchenko)">
		<title>Mis Datos</title>
        <link rel="stylesheet" href="{{ asset('Include/Bootstrap/css/bootstrap.min.css') }}">
 	</head>
	<body>
    <!--img src="{{ asset('MisDatos/simular.png') }}" style="position:absolute; top:20; left:650;" /-->
        <center>
            <table class='text-center' style='width:95%;'>
                <tbody>
                    <tr>
                        <td width="30%">
                            <img src="{{ asset('Config/logo.jpg') }}" style="width:230px; height:100px;" />
                        </td>
                        <td width="40%">
                            FORMULARIO DE DENUNCIA
                        </td>
                        <td width="30%">
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
            <b style='font-size: small;'>“Año de la Universalización de la Salud”</b>
        </center>
        <hr>
        <h3 class='text-center'>PERSONA AFECTADA</h3>
        <br><br>
		<table class="table">
            <tbody>
                <tr>
                    <td width="35%"><strong>DNI:</strong></td>
                    <td width="65%">{{ @$persona->dni_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Nombre:</strong></td>
                    <td width="65%">{{ @$persona->nombre_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Paterno:</strong></td>
                    <td width="65%">{{ @$persona->paterno_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Materno:</strong></td>
                    <td width="65%">{{ @$persona->materno_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Dependencia:</strong></td>
                    <td width="65%">{{ @$persona->dependencia_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Cargo:</strong></td>
                    <td width="65%">{{ @$persona->cargo_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Celular:</strong></td>
                    <td width="65%">{{ @$persona->celular_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Email:</strong></td>
                    <td width="65%">{{ @$persona->email_a }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Dirección:</strong></td>
                    <td width="65%">{{ @$persona->direccion_a }}</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h3 class='text-center'>PERSONA DENUNCIADA</h3>
        <br><br>
		<table class="table">
            <tbody>
                <tr>
                    <td width="35%"><strong>DNI:</strong></td>
                    <td width="65%">{{ @$persona->dni_d }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Nombre:</strong></td>
                    <td width="65%">{{ @$persona->nombre_d }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Paterno:</strong></td>
                    <td width="65%">{{ @$persona->paterno_d }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Materno:</strong></td>
                    <td width="65%">{{ @$persona->materno_d }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Dependencia:</strong></td>
                    <td width="65%">{{ @$persona->dependencia_d }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Cargo:</strong></td>
                    <td width="65%">{{ @$persona->cargo_d }}</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h3 class='text-center'>PERSONA QUE REGISTRÓ</h3>
        <br><br>
		<table class="table">
            <tbody>
                <tr>
                    <td width="35%"><strong>DNI:</strong></td>
                    <td width="65%">{{ @$persona->dni_u }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Nombre:</strong></td>
                    <td width="65%">{{ @$persona->nombre_u }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Paterno:</strong></td>
                    <td width="65%">{{ @$persona->paterno_u }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Materno:</strong></td>
                    <td width="65%">{{ @$persona->materno_u }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Dependencia:</strong></td>
                    <td width="65%">{{ @$persona->dependencia_u }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Cargo:</strong></td>
                    <td width="65%">{{ @$persona->cargo_u }}</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h3 class='text-center'>MEDIOS PROBATORIOS</h3>
        <br><br>
		<table class="table">
            <tbody>
                <tr>
                    <td width="35%"><strong>Descripción de los hechos:</strong></td>
                    <td width="65%">{{ @$persona->descripcion }}</td>
                </tr>
                <tr>
                    <td width="35%"><strong>Adjuntó archivo?:</strong></td>
                    <td width="65%">{{ basename(@$persona->ruta_archivo) }}</td>
                </tr>
            </tbody>
        </table>
    </body>
    <br><br>
    <footer>
        <center>
        <p style='font-size: small;'>
            Toda copia de este documento que se encuentre fuera del entorno de la carpeta compartida SGC y/o Portal de Transparencia, es una copia NO CONTROLADA, a excepción de que haya sido sellado como COPIA CONTROLADA
        </p>
        </center>
    </footer>
</html>
