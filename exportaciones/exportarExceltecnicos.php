<?php

require_once '../conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="estudiosTecnico.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'Empleado',
            'nombre institucion',
            'nombre formacion tecnica',
            'fecha inicio',
            'fecha termino',
            'tiempo cursado',
            'documento obtenido medio superior',
            'actualizo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Empleado, estudiostecnico.*, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos from plantillahraei 
    left outer join estudiostecnico on estudiostecnico.id_empleado = plantillahraei.Empleado 
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['nombreinstituciontecnica'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreformaciontecnica'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainiciotecnico'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechaterminotecnico'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursadotecnico'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentotecnico'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['actualizodatos'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>