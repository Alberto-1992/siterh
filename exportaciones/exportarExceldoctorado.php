<?php

require_once '../conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="estudiosDoctorado.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'Empleado',
            'nombre formacion postecnico',
            'nombre institucion',
            'Unidad hospitalaria',
            'fecha inicio',
            'fecha termino',
            'tiempo cursado',
            'documento obtenido medio superior',
            'Numero de cedula',
            'actualizo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Empleado, doctorado.*, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos from plantillahraei 
    left outer join doctorado on doctorado.id_empleado = plantillahraei.Empleado 
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['nombreformaciondoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreinstituciondoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['unidadhospitalariadoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechainiciodoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechaterminodoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['anioscursadosdoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentorecibedoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numeroceduladoctorado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['actualizodatos'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>