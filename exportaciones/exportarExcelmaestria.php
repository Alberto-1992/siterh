<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>

<th style='background: green; color: white;'>Nombre de la institucion superior</th>
<th style='background: green; color: white;'>Nombre de la formacion superior</th>
<th style='background: green; color: white;'>Fecha de inicio</th>
<th style='background: green; color: white;'>Fecha de termino</th>
<th style='background: green; color: white;'>Tiempo cursado</th>
<th style='background: green; color: white;'>Documento obtenido</th>
<th style='background: green; color: white;'>Numero de cedula</th>
<th style='background: black; color: white;'>Descripcion puesto</th>
<th style='background: black; color: white;'>Area de adscripcion</th>

</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.DescripcionPuesto, plantillahraei.DescripcionAdscripcion,
estudiossuperior.id_empleado, estudiossuperior.nombresuperior, estudiossuperior.nombreformacionsuperior,estudiossuperior.fechasuperiorinicio,estudiossuperior.fechasuperiortermino,estudiossuperior.tiempocursadosuperior,estudiossuperior.documentosuperior,estudiossuperior.numerocedulasuperior
    from estudiossuperior left join estudiossuperior on estudiossuperior.id_empleado = plantillahraei.Empleado where id_empleado in (select id_empleado from estudiossuperior 
    GROUP BY estudiossuperior.id_empleado HAVING count(id_empleado) > 1) order by id_empleado"); 
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
    <td>".mb_convert_encoding($filaR['DescripcionPuesto'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['DescripcionAdscripcion'], 'ISO-8859-1', 'UTF-8')."</td>
    </tr>";  
        
    }


//}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteInformacionAcademica_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>