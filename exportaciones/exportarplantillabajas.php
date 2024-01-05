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
            'Empleado',
            'RFC',
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
            'Estatus'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.*, CASE WHEN plantillahraei.baja = 1 THEN 'Baja' ELSE 'Activo' END as estatus from plantillahraei where plantillahraei.baja = 1"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['RFC'], 'ISO-8859-1', 'UTF-8'),
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
                        mb_convert_encoding($filaR['estatus'], 'ISO-8859-1', 'UTF-8')
                    
                    
                    ));

//}

?>