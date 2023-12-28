<?php

require_once '../conexionRh.php'; 

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$salida .= "<thead style='color: white; background: grey; height: 22px; font-size: 14px;'> 
<th>Num de empleado</th>

<th style='background: orange; color: white;'>Nombre de la institucion tecnico</th>
<th style='background: orange; color: white;'>Nombre de la formacion tecnico</th>
<th style='background: orange; color: white;'>Fecha de inicio</th>
<th style='background: orange; color: white;'>Fecha de termino</th>
<th style='background: orange; color: white;'>Tiempo cursado</th>
<th style='background: orange; color: white;'>Documento obtenido</th>

<th style='background: yellow'>Nombre de la institucion postecnico</th>
<th style='background: yellow'>Nombre de la formacion postecnico</th>
<th style='background: yellow'>Fecha de inicio</th>
<th style='background: yellow'>Fecha de termino</th>
<th style='background: yellow'>Tiempo cursado</th>
<th style='background: yellow'>Documento obtenido</th>

<th style='background: blue; color: white;'>Nombre de la institucion media superior</th>
<th style='background: blue; color: white;'>Nombre de la formacion media superior</th>
<th style='background: blue; color: white;'>Fecha de inicio</th>
<th style='background: blue; color: white;'>Fecha de termino</th>
<th style='background: blue; color: white;'>Tiempo cursado</th>
<th style='background: blue; color: white;'>Documento obtenido</th>

<th style='background: green; color: white;'>Nombre de la institucion superior</th>
<th style='background: green; color: white;'>Nombre de la formacion superior</th>
<th style='background: green; color: white;'>Fecha de inicio</th>
<th style='background: green; color: white;'>Fecha de termino</th>
<th style='background: green; color: white;'>Tiempo cursado</th>
<th style='background: green; color: white;'>Documento obtenido</th>
<th style='background: green; color: white;'>Numero de cedula</th>

<th style='background: red; color: white;'>Nombre de la institucion maestria</th>
<th style='background: red; color: white;'>Nombre de la formacion maestria</th>
<th style='background: red; color: white;'>Fecha de inicio</th>
<th style='background: red; color: white;'>Fecha de termino</th>
<th style='background: red; color: white;'>Tiempo cursado</th>
<th style='background: red; color: white;'>Documento obtenido</th>
<th style='background: red; color: white;'>Numero de cedula</th>

<th style='background: brown; color: white;'>Nombre de la institucion doctorado</th>
<th style='background: brown; color: white;'>Nombre de la formacion doctorado</th>
<th style='background: brown; color: white;'>Unidad hospitalaria</th>
<th style='background: brown; color: white;'>Fecha de inicio</th>
<th style='background: brown; color: white;'>Fecha de termino</th>
<th style='background: brown; color: white;'>Tiempo cursado</th>
<th style='background: brown; color: white;'>Documento obtenido</th>
<th style='background: brown; color: white;'>Numero de cedula</th>

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
<th style='background: black; color: white;'>Descripcion puesto</th>
<th style='background: black; color: white;'>Area de adscripcion</th>
</thead>";

$QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Nombre, plantillahraei.Empleado, plantillahraei.DescripcionPuesto, plantillahraei.DescripcionAdscripcion,
estudiosmediosup.nombreformacionmedia,estudiosmediosup.nombremediasuperior,estudiosmediosup.fechainicio,estudiosmediosup.fechatermino,estudiosmediosup.tiempocursado,estudiosmediosup.documentomediosuperior,
estudiostecnico.nombreinstituciontecnica,estudiostecnico.nombreformaciontecnica,estudiostecnico.fechainiciotecnico,estudiostecnico.fechaterminotecnico,estudiostecnico.tiempocursadotecnico,estudiostecnico.documentotecnico,
estudiospostecnico.nombreformacionpostecnico,estudiospostecnico.nombreinstitucionpostecnico,estudiospostecnico.fechainiciosuppostecnico,estudiospostecnico.fechaterminosuppostecnico,estudiospostecnico.tiempocursadosuppostecnico,estudiospostecnico.documentorecibepostecnico,
estudiossuperior.id_empleado, estudiossuperior.nombresuperior, estudiossuperior.nombreformacionsuperior,estudiossuperior.fechasuperiorinicio,estudiossuperior.fechasuperiortermino,estudiossuperior.tiempocursadosuperior,estudiossuperior.documentosuperior,estudiossuperior.numerocedulasuperior,
estudiosmaestria.nombremaestria, estudiosmaestria.nombreformacionmaestria,estudiosmaestria.fechamaestriainicio,estudiosmaestria.fechamaestriatermino,estudiosmaestria.tiempocursadomaestria,estudiosmaestria.documentomaestria,estudiosmaestria.numerocedulamaestria,
doctorado.nombreformaciondoctorado,doctorado.nombreinstituciondoctorado,doctorado.unidadhospitalariadoctorado,doctorado.fechainiciodoctorado,doctorado.fechaterminodoctorado,doctorado.anioscursadosdoctorado,doctorado.documentorecibedoctorado,doctorado.numeroceduladoctorado,
especialidad.nombreformacionacademica as nombreformacionacademicaespecialidad, especialidad.nombreinstitucion as nombreinstitucionespecialidad,especialidad.unidadhospitalaria as unidadhospitalariaespecialidad,especialidad.fechainicioespecialidad,especialidad.fechaterminoespecialidad,especialidad.anioscursados as anioscursadosespecialidad,especialidad.documentorecibeespecialidad,especialidad.numerocedulaespecialidad,especialidad.fechacertificadoinicio,especialidad.fechacertificadotermino 
    from plantillahraei
    left outer join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado
    left outer join estudiostecnico on estudiostecnico.id_empleado = plantillahraei.Empleado
    left outer join estudiospostecnico on estudiospostecnico.id_empleado = plantillahraei.Empleado 
    left outer join estudiossuperior on estudiossuperior.id_empleado = plantillahraei.Empleado 
    left outer join estudiosmaestria on estudiosmaestria.id_empleado = plantillahraei.Empleado
    left outer join doctorado on doctorado.id_empleado = plantillahraei.Empleado 
    left outer join especialidad on especialidad.id_empleado = plantillahraei.Empleado
    GROUP BY estudiossuperior.id_empleado HAVING COUNT(*) >= 1"); 
    while($filaR=$QueryConsulta->fetch_assoc()){
    $salida .= "<tr>
    <td>".$filaR['id_empleado']."</td>
    <td>".mb_convert_encoding($filaR['nombreinstituciontecnica'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreformaciontecnica'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainiciotecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechaterminotecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['tiempocursadotecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentotecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreformacionpostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreinstitucionpostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainiciosuppostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechaterminosuppostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['tiempocursadosuppostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentorecibepostecnico'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreformacionmedia'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombremediasuperior'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainicio'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechatermino'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['tiempocursado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentomediosuperior'], 'ISO-8859-1', 'UTF-8')."</td>
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
    <td>".mb_convert_encoding($filaR['nombreformaciondoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['nombreinstituciondoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['unidadhospitalariadoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechainiciodoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['fechaterminodoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['anioscursadosdoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['documentorecibedoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
    <td>".mb_convert_encoding($filaR['numeroceduladoctorado'], 'ISO-8859-1', 'UTF-8')."</td>
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