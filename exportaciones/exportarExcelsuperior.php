<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>
<th>Nombre de la institucion</th>
<th>Nombre de la formacion superior</th>
<th>Fecha de inicio</th>
<th>Fecha de termino</th>
<th>Tiempo cursado</th>
<th>Documento obtenido</th>
<th>Numero de cedula</th>

<th>Nombre de la institucion maestria</th>
<th>Nombre de la formacion maestria</th>
<th>Fecha de inicio</th>
<th>Fecha de termino</th>
<th>Tiempo cursado</th>
<th>Documento obtenido</th>
<th>Numero de cedula</th>

</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Nombre, plantillahraei.Empleado, estudiossuperior.id_empleado, estudiossuperior.nombresuperior, estudiossuperior.nombreformacionsuperior,estudiossuperior.fechasuperiorinicio,estudiossuperior.fechasuperiortermino,estudiossuperior.tiempocursadosuperior,estudiossuperior.documentosuperior,estudiossuperior.numerocedulasuperior,
estudiosmaestria.nombremaestria, estudiosmaestria.nombreformacionmaestria,estudiosmaestria.fechamaestriainicio,estudiosmaestria.fechamaestriatermino,estudiosmaestria.tiempocursadomaestria,estudiosmaestria.documentomaestria,estudiosmaestria.numerocedulamaestria
    from plantillahraei left join estudiossuperior on estudiossuperior.id_empleado = plantillahraei.Empleado left join estudiosmaestria on estudiosmaestria.id_empleado = plantillahraei.Empleado order by plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc()){
    $salida .= "<tr>
    <td>".$filaR['id_empleado']."</td>
    <td>".mb_convert_encoding($filaR['nombresuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreformacionsuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechasuperiorinicio'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechasuperiortermino'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['tiempocursadosuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentosuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['numerocedulasuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombremaestria'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreformacionmaestria'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechamaestriainicio'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechamaestriatermino'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['tiempocursadomaestria'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentomaestria'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['numerocedulamaestria'], 'ISO-8859-1', 'UTF-8')."</td>
    </tr>";  
        
    }


//}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteMetas2023_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>