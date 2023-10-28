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
            'Turno',
            'Jornada',
            'Horario',
            'turno',
            


    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.*, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos, horariosplantilla.Turno, horariosplantilla.Jornada, horariosplantilla.Horario from plantillahraei inner join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado inner join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado  where plantillahraei.DescripcionPuesto like '%medico%'"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['RFC'],
                        $filaR['Empleado'],
                        $filaR['CURP'],
                        mb_convert_encoding($filaR['Nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['CodigoPuesto'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionPuesto'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Turno'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Jornada'], 'UTF-8'),
                        $filaR['Horario'],
                        $filaR['actualizodatos']
                        
                    ));

//}

?>