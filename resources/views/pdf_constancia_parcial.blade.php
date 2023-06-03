<style>
    .tabla{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        width: 100%;
        height: auto;
    }
    .logo1{
        width: 160px;
        height: auto;
    }
    .logo2{
        width: 100px;
        height: auto;
    }
</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$titulo}}</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-sm tabla">
                    <thead class="tabla">
                        <tr>
                            <th rowspan="2" class="tabla" class="tabla"><img class="logo1" src="data:image/webp;base64,{{ $imagenBase64_2 }}" alt="Logo"></th>
                            <th colspan="2" class="tabla" style="font-size: 20px;">Instituto Tecnológico de Milpa Alta II</th>
                            <th rowspan="2" class="tabla" class="tabla"><img class="logo2" src="data:image/webp;base64,{{ $imagenBase64_1 }}" alt="Logo"></th>
                        </tr>
                        <tr>
                            <th colspan="2" style="font-size: 20px;">Departamento de Actividades Extraescolares</th>
                        </tr>
                    </thead>
                    <tbody class="tabla">
                        <tr>
                            <td class="tabla">N° de Control</td>
                            <td class="tabla">{{$datos->numero_control}}</td>
                            <td class="tabla">Periodo</td>
                            <td class="tabla">{{$datos->periodo}} {{$anioActual}}</td>
                        </tr>
                        <tr>
                            <td class="tabla">Nombre</td>
                            <td colspan="3" class="tabla"><b>{{$datos->apellidoPaterno_estudiante}} {{$datos->apellidoMaterno_estudiante}} {{$datos->nombre_estudiante}}</b></td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="tabla">Actividad</td>
                            <td rowspan="2" class="tabla"></td>
                            <td class="tabla">Fecha</td>
                            <td class="tabla">Grupo</td>
                        </tr>
                        <tr>
                            <td class="tabla">{{$fechaActual}}</td>
                            <td class="tabla">{{$datos->semestre}}{{$datos->abreviatura_carrera}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tabla">Horas Acreditadas</td>
                            <td colspan="2" class="tabla">xx Horas (Culturales, Deportivas o Cívicas)</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p style="text-align: justify;"><b>NOTA:</b> EL ALUMNO DEBE CONSERVAR ESTE DOCUMENTO Y ENTREGARLO AL DEPARTAMENTO DE EXTRAESCOLARES AL COMPLEMENTAR UN CRÉDITO EQUIVALENTE A 20 HRS.</p>
                <p style="text-align: justify;">ESTE DOCUMENTO SERÁ JUSTIFICACIÓN PARA SUS ACTIVIDADES EXTRAESCOLARES EN CADA UNA DE SUS ASIGNATURAS.</p>
                <p style="text-align: justify;">PARA QUE TENGA VALIDEZ ESTE DOCUMENTO DEBE TENER FIRMA Y SELLO DEL JEFE DEL DEPARTAMENTO QUE PROPORCIONA EL APOYO.</p>
                <p style="text-align: justify;">SI EXISTIERA ALGÚN ERROR EN CUALQUIER DATO PRESENTADO, FAVOR DE AVISAR DE INMEDIATO PARA CORREGIRLO.</p>
                <br>
                <br>
                <br>
                <br>
                <h3 style="text-align: center;"><b>ING. AQUINO SEGURA ROLDAN</b></h3>
                <h4 style="text-align: center;">JEFE DEL DEPARTAMENTO DE ACTIVIDADES <br>EXTRAESCOLARES</h4>
                <br>
                <p style="text-align: center;">______________________________________________</p>
            </div>
        </div>
    </div>
</body>
</html>