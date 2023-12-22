<?php
 error_reporting(0);
 require_once 'clases/conexion.php';

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
        mb_convert_encoding('N° empleado', 'ISO-8859-1', 'UTF-8'),
        mb_convert_encoding('Fecha de validacion', 'ISO-8859-1', 'UTF-8'),
        mb_convert_encoding('Año', 'ISO-8859-1', 'UTF-8'),
        mb_convert_encoding('Tipo de capacitación', 'ISO-8859-1', 'UTF-8'),
            'Nombre del curso',
            'Horas',
            'Modalidad',
            'Fecha de inicio',
            'Fecha de termino',
            'Asiste como',
            'Documento que recibe',
            'Programa',
            'Linea estrategica',
            'Competencia',
            'Tema en especifico',
            'Vigencia inicial',
            'Vigencia final',
            'Impartido por el HRAEI',
            'Impartido por institucion externa'


    )); 

    $conexionX = new ConexionRh();

 $sql = $conexionX->prepare("SELECT id,nombrecurso,catalogoprograma,lineaestrategica,competenciaalieandaeje,id_empleado,fechacriteriotermino,fechacriterioinicio,criteriocurso,fechainicio,fechatermino,modalidad,horas,asistecomo,nombreinstitucion,otroexpidedocumento,tipocapacitacion,documentorecibe,fechavalidacion, EXTRACT(YEAR 
 FROM fechatermino) as anio from datos order by fechainicio desc");
 $sql->execute();
    
    while($filaR = $sql->fetch()){
        $fechavalidacion = date("d-m-Y", strtotime($filaR['fechavalidacion']));
                    $fechainicionew = date("d-m-Y", strtotime($filaR['fechainicio']));
                    $fechaterminonew = date("d-m-Y", strtotime($filaR['fechatermino']));
                        fputcsv($salida, array(
                        $filaR['id_empleado'],
                        $fechavalidacion,
                        $filaR['anio'],
                        mb_convert_encoding($filaR['tipocapacitacion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombrecurso'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['horas'],
                        mb_convert_encoding($filaR['modalidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($fechainicionew, 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($fechaterminonew, 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['asistecomo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentorecibe'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['catalogoprograma'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['lineaestrategica'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['competenciaalieandaeje'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['criteriocurso'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechacriterioinicio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechacriteriotermino'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreinstitucion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['otroexpidedocumento'], 'ISO-8859-1', 'UTF-8') 
                    ));
                };
//}

?>