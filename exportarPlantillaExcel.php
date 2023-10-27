<?php

require_once 'conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="informacionEmpleados.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'RFC',
            'Empleado',
            'CURP',
            'Nombre',
            'CodigoPuesto',
            'DescripcionPuesto',
            'NumeroPlaza',
            'NSS',
            'correo',
            'Programa',
            'Horas',
            'EstatusPlaza',
            'ClaveAdscripcion',
            'DescripcionAdscripcion',
            'nombre formacion media superior',
            'nombre institucion',
            'fecha inicio',
            'fecha termino',
            'tiempo cursado',
            'documento obtenido medio superior',
            'nombre formacion superior',
            'nombre institucion',
            'fecha superior inicio',
            'fecha superior termino',
            'tiempo cursado superior',
            'documento obtenido superior',
            'numero cedula superior',
            'nombre formacion maestria',
            'nombre institucion',
            'fecha maestria inicio',
            'fecha maestria termino',
            'tiempo cursado maestria',
            'documento maestria',
            'numero cedula maestria',
            'nombre formaciona cademica',
            'nombre institucion',
            'unidad hospitalaria',
            'fecha inicio especialidad',
            'fecha termino especialidad',
            'años cursados',
            'documento recibe especialidad',
            'numero cedula especialidad',
            'nombre formacion doctorado',
            'nombre institucion doctorado',
            'unidad hospitalaria doctorado',
            'fecha inicio doctorado',
            'fecha termino doctorado',
            'años cursados doctorado',
            'documento recibe doctorado',
            'numero cedula doctorado',
            'ultimo grado de estudios'


    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.*, estudiosmediosup.*, estudiossuperior.*, estudiosmaestria.*, especialidad.*, doctorado.*,ultimogradoestudios.descripcionultimogrado, actualizacion.actualizo from plantillahraei 
    left outer join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado 
    left outer join estudiossuperior on estudiossuperior.id_empleado = plantillahraei.Empleado
    left outer join estudiosmaestria on estudiosmaestria.id_empleado = plantillahraei.Empleado 
    left outer join especialidad on especialidad.id_empleado = plantillahraei.Empleado 
    left outer join doctorado on doctorado.id_empleado = plantillahraei.Empleado
    left outer join ultimogradoestudios on ultimogradoestudios.id_empleado = plantillahraei.Empleado
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['actualizo'],
                        $filaR['RFC'],
                        $filaR['Empleado'],
                        $filaR['CURP'],
                        mb_convert_encoding($filaR['Nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['CodigoPuesto'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionPuesto'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['NumeroPlaza'],
                        $filaR['NSS'],
                        mb_convert_encoding($filaR['correo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Programa'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['Horas'],
                        mb_convert_encoding($filaR['EstatusPlaza'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['ClaveAdscripcion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionAdscripcion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformacionmedia'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombremediasuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechatermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentomediosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformacionsuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombresuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechasuperiorinicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechasuperiortermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursadosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerocedulasuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformacionmaestria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombremaestria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechamaestriainicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechamaestriatermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursadomaestria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentomaestria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerocedulamaestria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformacionacademica'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreinstitucion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['unidadhospitalaria'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainicioespecialidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechaterminoespecialidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['anioscursados'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentorecibeespecialidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerocedulaespecialidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformaciondoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreinstituciondoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['unidadhospitalariadoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainiciodoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechaterminodoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['anioscursadosdoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentorecibedoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numeroceduladoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['descripcionultimogrado'], 'ISO-8859-1', 'UTF-8')    
                    ));

//}

?>