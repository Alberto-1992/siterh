<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
$fecha_actual = new DateTime(date('Y-m-d'));
require 'conexionCancer.php';
$id_paciente = $dataRegistro['id'];
$id = $dataRegistro['id_pacienteinfarto'];
$municipio = $dataRegistro['municipio'];
$estado = $dataRegistro['estado'];

$fecha1 = new DateTime($dataRegistro['iniciosintomas']); //fecha inicial
$fecha2 = new DateTime($dataRegistro['iniciotriage']); //fecha de cierre

$intervalo = $fecha1->diff($fecha2);

$diasDiferencia = $intervalo->format('%d dias %H horas %i minutos');

$fecha3 = new DateTime($dataRegistro['iniciotriage']);
$fecha4 = new DateTime($dataRegistro['terminotriage']);

$intervalo2 = $fecha4->diff($fecha3);

$diasDiferencia2 = $intervalo2->format('%d dias %H horas %i minutos');

if($dataRegistro['horainiciofibro'] == '00-00-0000 00:00'){
    $diasDiferencia3 = 'Sin datos suficientes para calcular';
}else{
$fecha5 = new DateTime($dataRegistro['iniciotriage']);
$fecha6 = new DateTime($dataRegistro['horainiciofibro']);

$intervalo3 = $fecha5->diff($fecha6);

$diasDiferencia3 = $intervalo3->format('%d dias %H horas %i minutos');
}
if($dataRegistro['horainiciofibro'] == '00-00-0000 00:00'){
    $diasDiferencia4 = 'Sin datos suficientes para calcular';
}else{
$fecha7 = new DateTime($dataRegistro['horainiciofibro']);
$fecha8 = new DateTime($dataRegistro['horaterminofibro']);

$intervalo4 = $fecha7->diff($fecha8);

$diasDiferencia4 = $intervalo4->format('%d dias %H horas %i minutos');
}
            $imccalculo = $dataRegistro['imcinfarto'];
            $imcbajo = "IMC bajo";
            $imcok= "IMC ok";
            $imcsobre = "Sobrepeso";
            $obecidad = "Obesidad";
            $obecidadextrema = "Obesidad exrema";
            $sobrepesoextremo = "Sobre peso extremo";
        
            switch(true) {

                case $imccalculo <= 18.5:
            
                $showimc = "<span class='imcbajo'> $imcbajo";
            
                break;
        
                case $imccalculo > 18.5 and $imccalculo <= 24.8:
                
                $showimc = "<span class='imcok'> $imcok";
                
                break;
                
                case $imccalculo >= 25 and $imccalculo <= 29.9:
                
                $showimc = "<span class='imcsobre'> $imcsobre";
                break;
                case $imccalculo >= 30 and $imccalculo <= 39.9:
            
                $showimc = "<span class='obecidad'> $obecidad";
                break;
                case $imccalculo > 40:
                
                $showimc = "<span class='obecidadextrema'> $obecidadextrema";
                break;
                
                default:
                
                $showimc = "<span class='obecidadextrema'> $sobrepesoextremo";
                
                }
$sqls = $conexionCancer->prepare("SELECT * from t_estado where id_estado = :id_estado");
                $sqls->execute(array(
                    ':id_estado'=>$estado
                ));
$rows = $sqls->fetch();

$sqlsm = $conexionCancer->prepare("SELECT * from t_municipio where id_municipio = :id_municipio");
                $sqlsm->execute(array(
                    ':id_municipio'=>$municipio
                ));
$rowsm = $sqlsm->fetch();
?>
<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<input type="hidden" id="infartopaciente" value="<?php echo $dataRegistro['descripcioncancer']; ?>">
<input type="hidden" id="nombrepaciente" value="<?php echo $dataRegistro['nombrecompleto']; ?>">
<div class="containerr">
    <a href="#" class="mandaid" onclick="abrirseguimiento();" id="<?php echo $id_paciente ?>">Seguimiento</a>
    <?php session_start();
    if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico'])) { 
    if($dataRegistro['editopaciente'] == 0 ) {?>

        <a href="#" onclick="editarRegistro();" id="editarregistro">Editar registro</a>
<?php }else{ ?>
        <input type="submit" onclick="finalizarEdicion();" id="editarregistro" value="Finalizar Edicion">

<?php }
    }; ?>
    <input type="submit" onclick="eliminarRegistro();" id="eliminarregistro" value="Eliminar registro">
</div>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editardatospersonalesinfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editardatospersonalesinfarto();" <?php } }?>>
    <div class="containerr2">DATOS DEL PACIENTE</div>
    <tr>
        <th id="th">Nombre</th>
        <td id="td"><?php echo $dataRegistro['nombrecompleto'] ?></td>
    </tr>
    <tr>
        <th id="th">CURP</th>
        <td id="td"><?php echo $dataRegistro['curp'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de nacimiento:</th>
        <td id="td"><?php echo $dataRegistro['fechanacimiento'] ?></td>
    </tr>
    <tr>
        <th id="th">Edad</th>
        <td id="td"><?php echo $dataRegistro['edad'] ?></td>
    </tr>

    <tr>
        <th id="th">Sexo</th>
        <td id="td"><?php echo $dataRegistro['sexo'] ?></td>
    </tr>
    <tr>
        <th id="th">Población Indígena</th>
        <td id="td"><?php echo $dataRegistro['poblacionindigena'] ?></td>
    </tr>
    <tr>
        <th id="th">Estado</th>
        <td id="td"><?php echo $rows['estado'] ?></td>
    </tr>

    <tr>
        <th id="th">Municipio</th>
        <td id="td"><?php echo $rowsm['municipio'] ?></td>
    </tr>

    <tr>
        <th id="th">Escolaridad</th>
        <td id="td"><?php echo $dataRegistro['escolaridad'] ?></td>
    </tr>
</table>
<div id="editardatospersonalesinfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarsomatometriainfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarsomatometriainfarto();" <?php } }?>>
    <div class="containerr3">SOMATOMETRÍA</div>
    <tr>
        <th id="th">Talla</th>
        <td id="td"><?php echo $dataRegistro['tallainfarto'] ?></td>
    </tr>
    <tr>
        <th id="th">Peso</th>
        <td id="td"><?php echo $dataRegistro['pesoinfarto'] ?></td>
    </tr>
    <tr>
        <th id="th">IMC</th>
        <td id="td"><?php echo $dataRegistro['imcinfarto'] . '&nbsp' . $showimc ?></td>
    </tr>
    <tr>
        <th id="th">Frecuencia cardiaca</th>
        <td id="td"><?php echo $dataRegistro['fc'] ?></td>
    </tr>
    <tr>
        <th id="th">Presion arterial</th>
        <td id="td"><?php echo $dataRegistro['pa'] ?></td>
    </tr>
</table>
<div id="editarsomatometriainfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarfactoresriesgo();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarfactoresriesgo();" <?php } }?>>
    <tr>
        <div class="containerr3">FACTORES RIESGO</div>

        <th id="th">Factores de Riesgo:</th>

        <td id="td"><?php while ($dataRegist = $sql->fetch()){
                        echo '&nbsp&nbsp' . $dataRegist['descripcionfrinfarto'] . '--' . '';
                    } ?></td>

    </tr>
</table>
<div id="editarfactoresriesgo"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editaratencionclinicainfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editaratencionclinicainfarto();" <?php } }?>>

    <div class="containerr3">ATENCIÓN CLINICA</div>
    <tr>
        <th id="th">Fecha/Hora Inicio de Síntomas</th>
        <td id="td"><?php echo $dataRegistro['iniciosintomas'] ?></td>
    </tr>
    <tr>
        <th id="th">Características del Dolor</th>
        <td id="td"><?php echo $dataRegistro['caracterisiticasdolor'] ?></td>
    </tr>
    <tr>
        <th id="th" style="color: red">Tiempo llegada a atencion</th>
        <td id="td"><?php echo $diasDiferencia; ?></td>
    </tr>
    <tr>
        <th id="th">Fecha/Hora Inicio de Triage</th>
        <td id="td"><?php echo $dataRegistro['iniciotriage'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha/Hora Termino de Triage</th>
        <td id="td"><?php echo $dataRegistro['terminotriage'] ?></td>
    </tr>
    <tr>
        <th id="th" style="color: red">Dif inicio/termino triage</th>
        <td id="td"><?php echo $diasDiferencia2 ?></td>
    </tr>
    <tr>
        <th id="th">Electrocardiograma</th>
        <td id="td"><?php echo $dataRegistro['electrocardiograma'] ?></td>
    </tr>
    <tr>
        <th id="th">Localización</th>
        <td id="td"><?php echo $dataRegistro['localizacionelectro'] ?></td>
    </tr>
    <tr>
        <th id="th">Con o Sin Elevación</th>
        <td id="td"><?php echo $dataRegistro['consinelevacion'] ?></td>
    </tr>
    <tr>
        <th id="th">Mace Hospitalario</th>
        <td id="td"><?php while ($dataMace = $sql_mace->fetch()) {
                        echo '&nbsp&nbsp' . $dataMace['descripcionmacehosp'] . '--' . '';
                    } ?></td>
    </tr>
    <tr>
        <th id="th">Killip Kimball</th>
        <td id="td"><?php echo $dataRegistro['killipkimball'] ?></td>
    </tr>
</table>
<div id="editaratencionclinicainfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarparaclinicosinfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarparaclinicosinfarto();" <?php } }?>>

    <div class="containerr3">PARACLINICOS</div>
    <tr>
        <th id="th">CK</th>
        <td id="td"><?php echo $dataRegistro['ck'] ?></td>
    </tr>
    <tr>
        <th id="th">CK-MB</th>
        <td id="td"><?php echo $dataRegistro['ckmb'] ?></td>
    </tr>
    <tr>
        <th id="th">Troponinas</th>
        <td id="td"><?php echo $dataRegistro['troponinas'] ?></td>
    </tr>
    <tr>
        <th id="th">Glucosa</th>
        <td id="td"><?php echo $dataRegistro['glucosa'] ?></td>
    </tr>
    <tr>
        <th id="th">Urea</th>
        <td id="td"><?php echo $dataRegistro['urea'] ?></td>
    </tr>
    <tr>
        <th id="th">Creatinina</th>
        <td id="td"><?php echo $dataRegistro['creatinina'] ?></td>
    </tr>
    <tr>
        <th id="th">Colesterol</th>
        <td id="td"><?php echo $dataRegistro['colesterol'] ?></td>
    </tr>
    <tr>
        <th id="th">Trigliceridos</th>
        <td id="td"><?php echo $dataRegistro['trigliceridos'] ?></td>
    </tr>
    <tr>
        <th id="th">Ácido Úrico</th>
        <td id="td"><?php echo $dataRegistro['acidourico'] ?></td>
    </tr>
    <tr>
        <th id="th">HB Glucosilada</th>
        <td id="td"><?php echo $dataRegistro['hbglucosilada'] ?></td>
    </tr>
    <tr>
        <th id="th">Proteinas</th>
        <td id="td"><?php echo $dataRegistro['proteinas'] ?></td>
    </tr>
    <tr>
        <th id="th">Colesterol Total</th>
        <td id="td"><?php echo $dataRegistro['colesteroltotal'] ?></td>
    </tr>
    <tr>
        <th id="th">LDL</th>
        <td id="td"><?php echo $dataRegistro['ldl'] ?></td>
    </tr>
    <tr>
        <th id="th">HDL</th>
        <td id="td"><?php echo $dataRegistro['hdl'] ?></td>
    </tr>
</table>
<div id="editarparaclinicosinfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editartratamientotromboinfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editartratamientotromboinfarto();" <?php } }?>>
    <div class="containerr3">TRATAMIENTO/TROMBÓLISIS</div>
    <tr>
        <th id="th">Fibrinólisis</th>
        <td id="td"><?php echo $dataRegistro['fibrinolisis'] ?></td>
    </tr>
    <tr>
        <th id="th" style="color: red">Dif incio triage/inicio trombolisis</th>
        <td id="td"><?php echo $diasDiferencia3 ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Fecha/Hora inicio</th>
        <td id="td"><?php echo $dataRegistro['horainiciofibro'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha/Hora finaliza</th>
        <td id="td"><?php echo $dataRegistro['horaterminofibro'] ?></td>
    </tr>
    <tr>
        <th id="th" style="color: red">Dif inicio/termino trombolisis</th>
        <td id="td"><?php echo $diasDiferencia4 ?></td>
    </tr>
    <tr>
        <th id="th">Tipo de Fibrinolítico</th>
        <td id="td"><?php echo $dataRegistro['tipofibrinolitico'] ?></td>
    </tr>
    <tr>
        <th id="th">¿Procedimiento Exitoso?</th>
        <td id="td"><?php echo $dataRegistro['procedimientoexitoso'] ?></td>
    </tr>
</table>
<div id="editartratamientotromboinfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarangiocoronariainfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarangiocoronariainfarto();" <?php } }?>>

    <div class="containerr3">ANGIOPLASTIA CORONARIA TRANSLUMINAL PERCUTANEA</div>
    <tr>
        <th id="th">Fecha/Hora</th>
        <td id="td"><?php echo $dataRegistro['fechahoraangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Tipo de Procedimiento</th>
        <td id="td"><?php echo $dataRegistro['tipoprocedimientoangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Sitio de Punción</th>
        <td id="td"><?php echo $dataRegistro['sitiopuncionangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Lesiones Coronarias</th>
        <td id="td"><?php while ($datalesion = $sql_lesion->fetch()) {
                        echo '&nbsp&nbsp' . $datalesion['descripciolesioncoronaria'] . '--' . '';
                    } ?></td>
    </tr>
    <tr>
        <th id="th">Clasificación DUKE</th>
        <td id="td"><?php echo $dataRegistro['clasificaciondukeangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Clasificación Medina</th>
        <td id="td"><?php echo $dataRegistro['clasiificacionmedinaangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Clasificación ACC/AHA</th>
        <td id="td"><?php echo $dataRegistro['clasificacionaccahaangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Severidad Sintax</th>
        <td id="td"><?php echo $dataRegistro['severidadangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Protesis Endovascular</th>
        <td id="td"><?php echo $dataRegistro['protesisendovascularangio'] ?></td>
    </tr>
    <tr>
        <th id="th">1er Generación</th>
        <td id="td"><?php echo $dataRegistro['primerageneracionangio'] ?></td>
    </tr>
    <tr>
        <th id="th">2da Generación</th>
        <td id="td"><?php echo $dataRegistro['segundageneracionangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Número de Protesis</th>
        <td id="td"><?php echo $dataRegistro['numeroprotesisangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Revascularización</th>
        <td id="td"><?php echo $dataRegistro['revascularizacionangio'] ?></td>
    </tr>
    <tr>
        <th id="th">¿Procedimiento Exitoso?</th>
        <td id="td"><?php echo $dataRegistro['procedimientoexitosoangio'] ?></td>
    </tr>
    <tr>
        <th id="th">AIRBUS</th>
        <td id="td"><?php echo $dataRegistro['airbusangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Resultado de AIRBUS</th>
        <td id="td"><?php echo $dataRegistro['resultadoairbusangio'] ?></td>
    </tr>
    <tr>
        <th id="th">OCT</th>
        <td id="td"><?php echo $dataRegistro['octangio'] ?></td>
    </tr>
</table>
<div id="editarangiocoronariainfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarlitotriciainfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarlitotriciainfarto();" <?php } }?>>

    <div class="containerr3">LITOTRICIA INTRACORONARIA</div>
    <tr>
        <th id="th">SCHOCKWAVE C2</th>
        <td id="td"><?php echo $dataRegistro['schockwaveangio'] ?></td>
    </tr>
    <tr>
        <th id="th">Resultado de SCHOCKWAVE C2</th>
        <td id="td"><?php echo $dataRegistro['resultadoairbuslito'] ?></td>
    </tr>
</table>
<div id="editarlitotriciainfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarmarcapasosinfarto();" <?php } }else if(isset($_SESSION['residentes'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarmarcapasosinfarto();" <?php } }?>>

    <div class="containerr3">MARCAPASOS TEMPORAL</div>
    <tr>
        <th id="th">Marca Pasos</th>
        <td id="td"><?php echo $dataRegistro['marcapasostratamiento'] ?></td>
    </tr>
    <tr>
        <th id="th">Soporte Ventricular</th>
        <td id="td"><?php echo $dataRegistro['soporteventricular'] ?></td>
    </tr>
</table>
<div id="editarmarcapasosinfarto"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3">COMPLICACIONES</div>
    <tr>
        <th id="th">Arritmia</th>
        <td id="td"><?php echo $dataRegistro['arritimia'] ?></td>
    </tr>
    <tr>
        <th id="th">Bloqueo AV</th>
        <td id="td"><?php echo $dataRegistro['bloqueoav'] ?></td>
    </tr>
    <tr>
        <th id="th">Extrasístoles Ventriculares</th>
        <td id="td"><?php echo $dataRegistro['extrasistolesventri'] ?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3">SEGUIMIENTO POSTPROCEDIMIENTO</div>
    <tr>
        <th id="th">Fecha de Egreso</th>
        <td id="td"><?php echo $dataRegistro['fechaegresopost'] ?></td>
    </tr>
    <tr>
        <th id="th">Causa Defunción</th>
        <td id="td"><?php echo $dataRegistro['causadefuncionpost'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha Defunción</th>
        <td id="td"><?php echo $dataRegistro['fechadefuncionpost'] ?></td>
    </tr>
</table>
</div>

<?php
require 'modals/seguimientoPaciente.php';
?>
<script>
    function abrirseguimiento() {
        $('#seguimiento').modal('show')
    }
    function eliminarRegistro() {
        var id = $("#idcurp").val();
        var infarto = $("#infartopaciente").val();
        var nombrepaciente = $("#nombrepaciente").val();
        var mensaje = confirm("el registro se eliminara");
        let parametros = {
            id: id,
            infarto: infarto,
            nombrepaciente: nombrepaciente
        }
        if (mensaje == true) {
            $.ajax({
                data: parametros,
                url: 'aplicacion/eliminarRegistroinfarto.php',
                type: 'post',
                beforeSend: function() {
                    $("#mensaje").html("Procesando, espere por favor");
                },
                success: function(response) {
                    $("#mensaje").html(response);
                    $("#tabla_resultadobus").load('consultapacientes.php');
                    $("#tabla_resultado").load('consultaPacienteBusqueda.php');

                }
            });
        } else {
            swal({
                title: 'Cancelado!',
                text: 'Proceso cancelado',
                icon: 'warning',

            });
        }
    }

</script>