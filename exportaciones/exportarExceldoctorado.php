<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>

<th style='background: brown; color: white;'>Nombre de la institucion doctorado</th>
<th style='background: brown; color: white;'>Nombre de la formacion doctorado</th>
<th style='background: brown; color: white;'>Unidad hospitalaria</th>
<th style='background: brown; color: white;'>Fecha de inicio</th>
<th style='background: brown; color: white;'>Fecha de termino</th>
<th style='background: brown; color: white;'>Tiempo cursado</th>
<th style='background: brown; color: white;'>Documento obtenido</th>
<th style='background: brown; color: white;'>Numero de cedula</th>
<th style='background: black; color: white;'>Descripcion puesto</th>
<th style='background: black; color: white;'>Area de adscripcion</th>
</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT doctorado.id_empleado,plantillahraei.DescripcionPuesto, plantillahraei.DescripcionAdscripcion,
doctorado.nombreformaciondoctorado,doctorado.nombreinstituciondoctorado,doctorado.unidadhospitalariadoctorado,doctorado.fechainiciodoctorado,doctorado.fechaterminodoctorado,doctorado.anioscursadosdoctorado,doctorado.documentorecibedoctorado,doctorado.numeroceduladoctorado
    from doctorado left join doctorado on doctorado.id_empleado = plantillahraei.Empleado where id_empleado in ( select id_empleado from doctorado
    GROUP BY doctorado.id_empleado HAVING COUNT(id_empleado) > 1) order by id_empleado "); 
    while($filaR=$QueryConsulta->fetch_assoc()){
    $salida .= "<tr>
    <td>".$filaR['id_empleado']."</td>
    <td>".mb_convert_encoding($filaR['nombreformaciondoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreinstituciondoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['unidadhospitalariadoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainiciodoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechaterminodoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['anioscursadosdoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentorecibedoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['numeroceduladoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
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