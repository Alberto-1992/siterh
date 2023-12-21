<?php
session_start();
require_once '../conexionRh.php'; 

    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="Compatibilidad.csv"');  
    $salida = fopen('php://output', 'W'); 
    fputcsv($salida, array(
        'Nombre',
        'Numero empleado',
        'Correo', 
        'Area de adscripcion',
        'Protesta de no desempleo',
        'Compatibilidades concluidas',
        'Compatibilidades en proceso',
        'Si manifiesta otro empleo',
        'Lugar de trabajo',
        'Horario',
        'Dias laborales',
        'Lugar de trabajo dos',
        'Horario dos',
        'Dias laborales dos',
        'Observaciones',
        'Clave presupuestal',
        'Sueldo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Nombre, plantillahraei.Empleado, plantillahraei.correo, plantillahraei.DescripcionAdscripcion, compatibilidad.* from plantillahraei inner join compatibilidad on compatibilidad.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc()) {
    fputcsv($salida, array(
                        mb_convert_encoding($filaR['Nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Empleado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['correo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionAdscripcion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['PROTESTADENODES'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['COMPATIBILIDADCONCLUIDAS'],
                        mb_convert_encoding($filaR['COMPATIBILIDADENPROCESO'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['SIMANIFIESTAOTROEMPLEO'],
                        $filaR['LUGARDETRABAJO'],
                        $filaR['HORARIO'],
                        $filaR['DIASLABORALES'],
                        mb_convert_encoding($filaR['LUGARDETRABAJO2'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['HORARIO2'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['DIASLABORALES2'],
                        mb_convert_encoding($filaR['OBSERVACIONES'],  'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['CLAVEPRESUPUESTAL'],  'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['SUELDO'], 'ISO-8859-1', 'UTF-8')
                        
                    ));
                }
?>