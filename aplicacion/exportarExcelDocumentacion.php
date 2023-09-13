<?php
session_start();
require_once '../conexionRh.php'; 

    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="postulados.csv"');  
    $salida = fopen('php://output', 'W'); 
    fputcsv($salida, array(
        'Nombre',
        'Apellido paterno',
        'Apellido materno', 
        'CURP',
        'Profesion',
        'RFC',
        'Sexo',
        'Telefono casa',
        'Telefono celular',
        'Otro telefono',
        'Correo electronico',
        'Estudios superiores',
        'Institucion',
        'Fecha de inicio',
        'Fecha de termino',
        'Tiempo cursado',
        'Documento obtenido',
        'Cedula'
    )); 

    $QueryConsulta= $conexionDocumentacion->query("SELECT *, estudiosmediosup.* from datospersonales inner join estudiosmediosup on estudiosmediosup.id_postulado = datospersonales.id_datopersonal
    where datospersonales.datosActualizados = 1"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        mb_convert_encoding($filaR['nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['appaterno'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['apmaterno'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['curp'],
                        mb_convert_encoding($filaR['profesion'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['rfc'],
                        mb_convert_encoding($filaR['sexo'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['telefonocasa'],
                        $filaR['telefonocelular'],
                        $filaR['otrotelefono'],
                        $filaR['correoelectronico'],
                        mb_convert_encoding($filaR['nombreformacionsuperior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombresuperior'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['fechasuperiorinicio'],
                        $filaR['fechasuperiortermino'],
                        mb_convert_encoding($filaR['tiempocursadosuperior'],  'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['documentosuperior'], 'ISO-8859-1', 'UTF-8'),
                        $filaR['numerocedulasuperior']
                        
                    ));


?>