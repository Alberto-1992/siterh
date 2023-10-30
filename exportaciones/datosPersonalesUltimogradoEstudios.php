<?php

require_once '../conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="datosGenerales.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'RFC',
            'Empleado',
            'CURP',
            'Nombre',
            'Codigo Puesto',
            'Descripcion Puesto',
            'Numero Plaza',
            'NSS',
            'correo',
            'Horas',
            'Estatus Plaza',
            'Tipo Pago',
            'Nombre Banco',
            'Cuenta Clabe',
            'Descripcion Adscripcion',
            'Turno',
            'Jornada',
            'Horario',
            'Control',
            'Tipo',
            'Adicional',
            'descripcion ultimo grado de estudios',
            'especialidad labora hraei',
            'actualizo'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.*, ultimogradoestudios.*, horariosplantilla.Turno,horariosplantilla.Jornada,horariosplantilla.Horario,horariosplantilla.Control,horariosplantilla.Tipo,horariosplantilla.Adicional, CASE WHEN actualizacion.actualizo = 1 THEN 'Actualizo datos' ELSE 'Sin actualizar' END as actualizodatos from plantillahraei 
    left outer join ultimogradoestudios on ultimogradoestudios.id_empleado = plantillahraei.Empleado 
    left outer join horariosplantilla on horariosplantilla.Empleado = plantillahraei.Empleado
    left outer join actualizacion on actualizacion.id_empleado = plantillahraei.Empleado"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        mb_convert_encoding($filaR['RFC'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['CURP'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['CodigoPuesto'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionPuesto'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['NumeroPlaza'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['NSS'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['correo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Horas'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['EstatusPlaza'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['TipoPago'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['NombreBanco'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['CuentaClabe'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['DescripcionAdscripcion'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Turno'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Jornada'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Horario'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Control'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Tipo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Adicional'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['descripcionultimogrado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['especialidadlaborahraei'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['actualizodatos'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>