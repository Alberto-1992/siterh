<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>

<th style='background: black; color: white;'>Nombre de la institucion especialidad</th>
<th style='background: black; color: white;'>Nombre de la formacion especialidad</th>
<th style='background: black; color: white;'>Unidad hospitalaria especialidad</th>
<th style='background: black; color: white;'>Fecha de inicio</th>
<th style='background: black; color: white;'>Fecha de termino</th>
<th style='background: black; color: white;'>Tiempo cursado</th>
<th style='background: black; color: white;'>Documento obtenido</th>
<th style='background: black; color: white;'>Numero de cedula</th>
<th style='background: black; color: white;'>Vigencia certificicado inicio</th>
<th style='background: black; color: white;'>Vigencia certificado termino</th>

</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT especialidad.id_empleado,
especialidad.nombreformacionacademica as nombreformacionacademicaespecialidad, especialidad.nombreinstitucion as nombreinstitucionespecialidad,especialidad.unidadhospitalaria as unidadhospitalariaespecialidad,especialidad.fechainicioespecialidad,especialidad.fechaterminoespecialidad,especialidad.anioscursados as anioscursadosespecialidad,especialidad.documentorecibeespecialidad,especialidad.numerocedulaespecialidad,especialidad.fechacertificadoinicio,especialidad.fechacertificadotermino 
    from especialidad where id_empleado in (select id_empleado
    GROUP BY especialidad.id_empleado HAVING COUNT(id_empleado) > 1) order by id_empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc()){
    $salida .= "<tr>
    <td>".$filaR['id_empleado']."</td>
    <td>".mb_convert_encoding($filaR['nombreformacionacademicaespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreinstitucionespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['unidadhospitalariaespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainicioespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechaterminoespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['anioscursadosespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentorecibeespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['numerocedulaespecialidad'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechacertificadoinicio'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechacertificadotermino'], 'ISO-8859-1', 'UTF-8')."</td>
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