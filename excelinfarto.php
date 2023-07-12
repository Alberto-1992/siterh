<?php

require_once 'conexionCancer.php'; 

//  variables de formulario 

//$fecha1 = $_POST['fecha1']; 
//$fecha2 = $_POST['fecha2']; 

//if(isset($_POST['generar_reporte']))
//{    
    // nombre del archivo 
    header('Content-Type:text/csv; charset = latin1'); 
    header('Content-Disposition: attachment; filename="reporte.csv"'); 

    //salida del archivo function de fopen w de write  
    $salida = fopen('php://output', 'W'); 

    //columnas del archivo , llamar a la funcion fputcsv
    fputcsv($salida, array(
        'Nombre completo', 
        'CURP',
        'Fecha nacimiento',
        'Edad',
        'Sexo',
        'Poblacion indigena',
        'Raza',
        'Escolaridad',
        'Estado',
        'Municipio',
        'F.C',
        'Presion arterial',
        'Talla',
        'Peso',
        'I.M.C',
        'Inicio de sintomas',
        'Caracteristicas del dolor',
        'Inicio de triage',
        'Termino de triage',
        'Electrocardiograma',
        'Localización',
        'Con o Sin Elevación',
        'Killip Kimball',
        'CK',
        'CK-MB',
        'Troponinas',
        'Glucosa',
        'Urea',
        'Creatinina',
        'Colesterol',
        'Trigliceridos',
        'Ácido Úrico',
        'HB Glucosilada',
        'Proteinas',
        'Colesterol Total',
        'LDL',
        'HDL',
        'Fibrinólisis',
        'Fecha/Hora inicio',
        'Fecha/Hora finaliza',
        'Tipo de Fibrinolítico',
        '¿Procedimiento Exitoso?',
        'Fecha/Hora Angio coronaria',
        'Tipo de Procedimiento',
        'Sitio de Punción',
        'Clasificación DUKE',
        'Clasificación Medina',
        'Clasificación ACC/AHA',
        'Severidad Sintax',
        'Protesis Endovascular',
        '1er Generación	',
        '2da Generación',
        'Número de Protesis',
        'Revascularización',
        '¿Procedimiento Exitoso?',
        'AIRBUS',
        'Resultado de AIRBUS',
        'OCT',
        'SCHOCKWAVE C2',
        'Resultado de SCHOCKWAVE C2',
        'Marca Paso',
        'Soporte Ventricular',
        'Arritmia',
        'Bloqueo AV',
        'Extrasístoles Ventriculares',
        'Fecha de Egreso',
        'Causa Defunción',
        'Fecha Defunción'


    )); 

    $QueryConsulta= $conexion2->query("SELECT dato_personalinfarto.nombrecompleto,date_format(dato_personalinfarto.fechanacimiento, '%d-%m-%Y') as fechanacimiento,dato_personalinfarto.edad,dato_personalinfarto.municipio,dato_personalinfarto.estado,dato_personalinfarto.sexo,dato_personalinfarto.year,dato_personalinfarto.curp,dato_personalinfarto.poblacionindigena,dato_personalinfarto.escolaridad,dato_personalinfarto.raza, 
    t_estado.estado,t_municipio.municipio,somatometriainfarto.id_pacienteinfarto,somatometriainfarto.fc,somatometriainfarto.pa,somatometriainfarto.tallainfarto,somatometriainfarto.pesoinfarto,somatometriainfarto.imcinfarto,
    atencionclinicainfarto.iniciosintomas,atencionclinicainfarto.caracterisiticasdolor,atencionclinicainfarto.iniciotriage,atencionclinicainfarto.terminotriage,atencionclinicainfarto.electrocardiograma,atencionclinicainfarto.localizacionelectro,atencionclinicainfarto.consinelevacion,atencionclinicainfarto.killipkimball,atencionclinicainfarto.id_pacienteinfarto,
    paraclinicos.*,
    tratamientoinfarto.*,
    angiocoronaria.*,
    litotriciaangio.*,
    marcapasostratamiento.*,
    detallecomplicaciones.*,
    date_format(seguimientopostprocedimiento.fechaegresopost, '%d-%m-%Y') as fechaegresopost,seguimientopostprocedimiento.causadefuncionpost,date_format(seguimientopostprocedimiento.fechadefuncionpost, '%d-%m-%Y') as fechadefuncionpost
    from dato_personalinfarto 
    left outer join somatometriainfarto on somatometriainfarto.id_pacienteinfarto = dato_personalinfarto.id
    left outer join t_estado on t_estado.id_estado = dato_personalinfarto.estado
    left outer join t_municipio on t_municipio.id_municipio = dato_personalinfarto.municipio
    left outer join atencionclinicainfarto on atencionclinicainfarto.id_pacienteinfarto = dato_personalinfarto.id
    left outer join paraclinicos on paraclinicos.id_paciente = dato_personalinfarto.id
    left outer join tratamientoinfarto on tratamientoinfarto.id_pacienteinfarto = dato_personalinfarto.id
    left outer join angiocoronaria on angiocoronaria.id_pacienteinfarto = dato_personalinfarto.id
    left outer join litotriciaangio on litotriciaangio.id_pacienteinfarto = dato_personalinfarto.id
    left outer join marcapasostratamiento on marcapasostratamiento.id_pacienteinfarto = dato_personalinfarto.id
    left outer join detallecomplicaciones on detallecomplicaciones.id_pacienteinfarto = dato_personalinfarto.id
    left outer join seguimientopostprocedimiento on seguimientopostprocedimiento.id_pacienteinfarto = dato_personalinfarto.id"); 
    while($filaR=$QueryConsulta->fetch_assoc())
    fputcsv($salida, array(
                        $filaR['nombrecompleto'],
                        $filaR['curp'],
                        $filaR['fechanacimiento'],
                        $filaR['edad'],
                        $filaR['sexo'],
                        $filaR['poblacionindigena'],
                        $filaR['raza'],
                        $filaR['escolaridad'],
                        $filaR['estado'],
                        $filaR['municipio'],
                        $filaR['fc'],
                        $filaR['pa'],
                        $filaR['tallainfarto'],
                        $filaR['pesoinfarto'],
                        $filaR['imcinfarto'],
                        $filaR['iniciosintomas'],
                        $filaR['caracterisiticasdolor'],
                        $filaR['iniciotriage'],
                        $filaR['terminotriage'],
                        $filaR['electrocardiograma'],
                        $filaR['localizacionelectro'],
                        $filaR['consinelevacion'],
                        $filaR['killipkimball'],
                        $filaR['ck'],
                        $filaR['ckmb'],
                        $filaR['troponinas'],
                        $filaR['glucosa'],
                        $filaR['urea'],
                        $filaR['creatinina'],
                        $filaR['colesterol'],
                        $filaR['trigliceridos'],
                        $filaR['acidourico'],
                        $filaR['hbglucosilada'],
                        $filaR['proteinas'],
                        $filaR['colesterol'],
                        $filaR['ldl'],
                        $filaR['hdl'],
                        $filaR['fibrinolisis'],
                        $filaR['horainiciofibro'],
                        $filaR['horaterminofibro'],
                        $filaR['tipofibrinolitico'],
                        $filaR['procedimientoexitoso'],
                        $filaR['fechahoraangio'],
                        $filaR['tipoprocedimientoangio'],
                        $filaR['sitiopuncionangio'],
                        $filaR['clasificaciondukeangio'],
                        $filaR['clasiificacionmedinaangio'],
                        $filaR['clasificacionaccahaangio'],
                        $filaR['severidadangio'],
                        $filaR['protesisendovascularangio'],
                        $filaR['primerageneracionangio'],
                        $filaR['segundageneracionangio'],
                        $filaR['numeroprotesisangio'],
                        $filaR['revascularizacionangio'],
                        $filaR['procedimientoexitosoangio'],
                        $filaR['airbusangio'],
                        $filaR['resultadoairbusangio'],
                        $filaR['octangio'],
                        $filaR['schockwaveangio'],
                        $filaR['resultadoairbuslito'],
                        $filaR['marcapasostratamiento'],
                        $filaR['soporteventricular'],
                        $filaR['arritimia'],
                        $filaR['bloqueoav'],
                        $filaR['extrasistolesventri'],
                        $filaR['fechaegresopost'],
                        $filaR['causadefuncionpost'],
                        $filaR['fechadefuncionpost']
                    ));

//}

?>