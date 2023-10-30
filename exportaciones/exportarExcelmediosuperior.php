<?php

require_once '../conexionRh.php'; 

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
            'Empleado',
            'nombre formacion media superior',
            'nombre institucion',
            'fecha inicio',
            'fecha termino',
            'tiempo cursado',
            'documento obtenido medio superior',
            'actualizo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Empleado, estudiosmediosup.*, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos from plantillahraei 
    left outer join estudiosmediosup on estudiosmediosup.id_empleado = plantillahraei.Empleado 
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['nombreformacionmedia'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombremediasuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechatermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentomediosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['actualizodatos'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>