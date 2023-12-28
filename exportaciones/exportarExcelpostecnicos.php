<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>

<th style='background: red; color: white;'>Nombre de la institucion maestria</th>
<th style='background: red; color: white;'>Nombre de la formacion maestria</th>
<th style='background: red; color: white;'>Fecha de inicio</th>
<th style='background: red; color: white;'>Fecha de termino</th>
<th style='background: red; color: white;'>Tiempo cursado</th>
<th style='background: red; color: white;'>Documento obtenido</th>
<th style='background: red; color: white;'>Numero de cedula</th>


</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT estudiosmaestria.id_empleado,
estudiosmaestria.nombremaestria, estudiosmaestria.nombreformacionmaestria,estudiosmaestria.fechamaestriainicio,estudiosmaestria.fechamaestriatermino,estudiosmaestria.tiempocursadomaestria,estudiosmaestria.documentomaestria,estudiosmaestria.numerocedulamaestria
from estudiosmaestria where id_empleado in (select id_empleado from estudiosmaestria 
    GROUP BY estudiosmaestria.id_empleado HAVING COUNT(id_empleado) > 1) order by id_empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc()){
    $salida .= "<tr>
    <td>".$filaR['id_empleado']."</td>
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
header("Content-Disposition: attachment; filename=ReporteInformacionAcademica_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>