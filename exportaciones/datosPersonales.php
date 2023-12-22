<?php

require_once '../conexionRh.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="datosPersonales.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
            'Empleado',
            'CURP',
            'RFC',
            'Nombre',
            'correo',
            'Fecha de nacimiento',
            'Edad',
            'Estado civil',
            'Entidad de nacimiento',
            'Genero',
            'Tipo de sangre',
            'Nacionalidad',
            'NUmero de cartilla',
            'Calle',
            'Numero exterior',
            'Numero Interior',
            'Estado',
            'Municipio',
            'Colonia',
            'Localidad',
            'Codigo postal',
            'Telefono de casa',
            'Telefono celular',
            'Otro telefono',
            'Nombre emergencia',
            'Telefono emergencia',
            'Parentesco emergencia'
    )); 

    $QueryConsulta= $conexionGrafico->query("SELECT plantillahraei.Empleado, plantillahraei.Nombre, plantillahraei.CURP, plantillahraei.RFC, plantillahraei.correo, datospersonales.fechanacimiento, datospersonales.edad, datospersonales.estadocivil, datospersonales.entidadnacimiento,
    datospersonales.genero, datospersonales.tipodesangre, datospersonales.nacionalidad, datospersonales.numerocartillamilitar, datospersonales.calle, datospersonales.numeroexterior,datospersonales.numerointerior,datospersonales.codigopostal,
    datospersonales.colonia,datospersonales.localidad,datospersonales.telefonocasa,datospersonales.telefonocelular,datospersonales.otrotelefono,datospersonales.nombreemergencia,datospersonales.telefonoemergencia,datospersonales.parentescoemergencia, t_estado.estado, t_municipio.municipio from datospersonales 
    left outer join plantillahraei on plantillahraei.Empleado = datospersonales.id_empleado
    left outer join t_estado on t_estado.id_estado = datospersonales.estado
    left outer join t_municipio on t_municipio.id_municipio = datospersonales.municipio"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['Empleado'],
                        mb_convert_encoding($filaR['CURP'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['RFC'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['Nombre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['correo'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['fechanacimiento'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['edad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['estadocivil'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['entidadnacimiento'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['genero'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['tipodesangre'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nacionalidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerocartillamilitar'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['calle'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numeroexterior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['numerointerior'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['estado'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['municipio'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['colonia'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['localidad'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['codigopostal'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['telefonocasa'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['telefonocelular'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['otrotelefono'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['nombreemergencia'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['telefonoemergencia'], 'ISO-8859-1', 'UTF-8'),
                        mb_convert_encoding($filaR['parentescoemergencia'], 'ISO-8859-1', 'UTF-8')
                        
                    ));

//}

?>