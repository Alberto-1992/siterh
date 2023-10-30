<?php

require_once '../conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="estudiosSuperior.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'Empleado',
            'nombre formacion postecnico',
            'nombre institucion',
            'fecha inicio',
            'fecha termino',
            'tiempo cursado',
            'documento obtenido medio superior',
            'Numero de cedula',
            'actualizo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Empleado, estudiossuperior.*, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos from plantillahraei 
    left outer join estudiossuperior on estudiossuperior.id_empleado = plantillahraei.Empleado 
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['nombreformacionsuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombresuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechasuperiorinicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechasuperiortermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tiempocursadosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentosuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerocedulasuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['actualizodatos'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>