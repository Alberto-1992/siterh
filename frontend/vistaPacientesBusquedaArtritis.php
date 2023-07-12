<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));


$id_paciente = $dataRegistro['id_usuarioartritis'];
$curp = $dataRegistro['curp'];
$id = $dataRegistro['id_paciente'];

require 'conexionCancer.php';

$imccalculo = $dataRegistro['imcartritis'];
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

$cdaicalculo = $dataRegistro['resultadocdai'];
$cdairemision = "Remision";
$cdaibaja= "Baja";
$cdaimoderada = "Moderada";
$cdaialta = "Alta";
$default = "----";
switch(true) {
    case $cdaicalculo == '':

        $cdai =  "<span class='imcbajo'> $default";
    break;

    case $cdaicalculo <= 2.8:
    
        $cdai = "<span class='imcbajo'> $cdairemision";
    
    break;
    
    case $cdaicalculo >= 2.9 and $cdaicalculo <= 10.9:
    
        $cdai = "<span class='imcok'> $cdaibaja";
    
    break;
    
    case $cdaicalculo >= 11 and $cdaicalculo <= 22.9:
    
        $cdai = "<span class='imcsobre'> $cdaimoderada";
    break;
    case $cdaicalculo >= 23:

        $cdai = "<span class='obecidad'> $cdaialta";
    break;

    
    default:
    
    //$cdai =  "<span class='imcbajo'> $default";
    
    }

$sdaicalculo = $dataRegistro['resultadosdai'];
$sdairemision = "Remision";
$sdaibaja= "Baja";
$sdaimoderada = "Moderada";
$sdaialta = "Alta";
switch(true) {
    case $sdaicalculo == '':

        $sdai = "------";
    break;

    case $sdaicalculo <= 3.3:
    
        $sdai = "<span class='imcbajo'> $sdairemision";
    
    break;
    
    case $sdaicalculo >= 3.4 and $sdaicalculo <= 11.9:
    
        $sdai = "<span class='imcok'> $sdaibaja";
    
    break;
    
    case $sdaicalculo >= 12 and $sdaicalculo <= 26.9:
    
        $sdai = "<span class='imcsobre'> $sdaimoderada";
    break;
    case $sdaicalculo >= 27:

        $sdai = "<span class='obecidad'> $sdaialta";
    break;

    
    default:
    
    //$cdai =  "<span class='imcbajo'> $default";
    
    }

?>

<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<input type="hidden" id="artritispaciente" value="<?php echo $dataRegistro['descripcion_artritis']; ?>">
<input type="hidden" id="nombrepaciente" value="<?php echo $dataRegistro['nombrecompleto']; ?>">
<div class="containerr">
    <?php

    $sql_busqueda = $conexionCancer->prepare("SELECT id_paciente from seguimientoartritis where id_paciente = :id_paciente");
    $sql_busqueda->execute(array(
        ':id_paciente'=>$id_paciente
    ));
    $validacion = $sql_busqueda->fetch();
    $validaid = $validacion['id_pacienteartritis'];
    if ($dataRegistro['curp'] != '') {
        if ($validaid != $id_paciente) { ?>
            <input type="submit" class="mandaidartritis" id="<?php echo $id_paciente ?>" value="Seguimiento" onclick="aplicarSeguimientoArtritis();"> <?php } else { ?>
            <input type="hidden" value="<?php echo $id_paciente ?>" id="seguimiento">
            <a href="#" onclick="seguimiento();" style="color: blue;">
                Ver seguimiento</a>
        <?php } ?>
        <script>
            function seguimiento() {

                let id = $("#seguimiento").val();

                let ob = {
                    id: id
                };
                $.ajax({
                    type: "POST",
                    url: "consultaCancerdeMamaBusquedaSeguimiento.php",
                    data: ob,
                    beforeSend: function() {

                    },
                    success: function(data) {

                        $("#tabla_resultado").html(data);

                    }
                });

            };
            function buscarseguimiento() {
                let fechasegui = $("#seguimientos").val();
                let id = $("#idcurp").val();
                let ob = {
                    id:id, fechasegui:fechasegui
                };
                $.ajax({
                    type: "POST",
                    url: "consultaSeguimientosArtritis.php",
                    data: ob,
                    beforeSend: function() {

                    },
                    success: function(data) {

                        $("#tabla_resultado").html(data);

                    }
                });
                
            }
        </script>
        <?php session_start();
                if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico']) or isset($_SESSION['artritis'])) { 
                    if($dataRegistro['editopaciente'] == 0 ) {?>
            
            <input type="submit" onclick="editarRegistro();" id="editarregistro" value="Editar registro">
                <?php }else{ ?>
                    <input type="submit" onclick="finalizarEdicion();" id="editarregistro" value="Finalizar Edicion">

                <?php }
            };?>
            <select id="seguimientos" name="seguimientos" onchange="buscarseguimiento();">
                <option value="Ver seguimientos">Ver seguimientos</option>
            <?php 
				    require 'conexionCancer.php';
				        $query = $conexionCancer->prepare("SELECT fechaseguimiento FROM seguimientoartritis where id_paciente = $id_paciente order by fechaseguimiento desc");
                        $query->execute();
				                    while($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['fechaseguimiento']; ?>">
                                                <?php echo $row['fechaseguimiento']; ?></option>
                                            <?php } ?>
                                        </select>
            <input type="submit" onclick="eliminarRegistro();" id="eliminarregistro" value="Eliminar registro">
            <?php
    }?>
                </div>
                <style>
                    .table:hover {
                            background: #EBEBEB;
                    }
                </style>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editardatospersonales();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editardatospersonales();" <?php } }?>>


    <div class="containerr2">Datos del Paciente</div>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombrecompleto'] ?></td>
    </tr>
    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['curp'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de nacimiento:</th>
        <td id="td"><?php echo $dataRegistro['fechanacimiento'] ?></td>
    </tr>
    <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataRegistro['edad'] ?></td>
    </tr>
    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro['sexo'] ?></td>
    </tr>
    <tr>
        <th id="th">Escolaridad:</th>
        <td id="td"><?php echo $dataRegistro['escolaridad'] ?></td>
    </tr>
</table>
<div id="editadatospersonales"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
<div class="containerr3">Somatometria</div>
<tr>
        <th id="th">Talla:</th>
        <td id="td"><?php echo $dataRegistro['tallaartritis'] ?></td>
    </tr>

    <tr>
        <th id="th">Peso:</th>
        <td id="td"><?php echo $dataRegistro['pesoartritis'] ?></td>
    </tr>

    <tr>
        <th id="th">IMC:</th>
        <td id="td"><?php echo $dataRegistro['imcartritis'].'&nbsp'; if($id_paciente != ''){ echo $showimc;}?></td>
    </tr>
</table> 
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarantecedentespato();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarantecedentespato();" <?php } }?>>

    <div class="containerr3">Antecedentes Personales Patológicos</div>
    <tr>
    <th id="th">Antecedentes Personales Patologicos:</th>

        <td id="td"><?php while($dataRegist= $sql_r->fetch())
{
echo '&nbsp&nbsp'.$dataRegist['detalleantecedente'].'--'.'';} ?></td>

    </tr>
</table>
<div id="editarantecedentespatologicos"></div>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarlaboratoriosartritis();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="editarlaboratoriosartritis();" <?php } }?>>
    <div class="containerr3">Laboratorios</div>

    <tr>
        <th id="th">Plaquetas:</th>
        <td id="td"><?php echo $dataRegistro['plaquetas'] ?></td>
    </tr>

    <tr>
        <th id="th">FR Basal:</th>
        <td id="td"><?php echo $dataRegistro['frbasal'] ?></td>
    </tr>

    <tr>
        <th id="th">FR Nominal:</th>
        <td id="td"><?php echo $dataRegistro['frnominal'] ?></td>
    </tr>

    <tr>
        <th id="th">PCR:</th>
        <td id="td"><?php echo $dataRegistro['pcr'] ?></td>
    </tr>

    <tr>
        <th id="th">Vitamina D Basal:</th>
        <td id="td"><?php echo $dataRegistro['vitaminadbasal'] ?></td>
    </tr>

    <tr>
        <th id="th">Vitamina D Nominal:</th>
        <td id="td"><?php echo $dataRegistro['vitaminadnominal'] ?></td>
    </tr>

    <tr>
        <th id="th">AC Anticpp Basal:</th>
        <td id="td"><?php echo $dataRegistro['anticppbasal'] ?></td>
    </tr>

    <tr>
        <th id="th">AC Anticpp Nominal:</th>
        <td id="td"><?php echo $dataRegistro['anticppnominal'] ?></td>
    </tr>

    <tr>
        <th id="th">VSG:</th>
        <td id="td"><?php echo $dataRegistro['vsg'] ?></td>
    </tr>

    <tr>
        <th id="th">TGO Basal:</th>
        <td id="td"><?php echo $dataRegistro['tgobasal'] ?></td>
    </tr>

    <tr>
        <th id="th">TGO Nominal:</th>
        <td id="td"><?php echo $dataRegistro['tgonominal'] ?></td>
    </tr>

    <tr>
        <th id="th">TGP Basal:</th>
        <td id="td"><?php echo $dataRegistro['tgpbasal'] ?></td>
    </tr>

    <tr>
        <th id="th">TGP Nominal:</th>
        <td id="td"><?php echo $dataRegistro['tgpnominal'] ?></td>
    </tr>

    <tr>
        <th id="th">Glucosa:</th>
        <td id="td"><?php echo $dataRegistro['glucosa'] ?></td>
    </tr>

    <tr>
        <th id="th">Colesterol:</th>
        <td id="td"><?php echo $dataRegistro['colesterol'] ?></td>
    </tr>

    <tr>
        <th id="th">Trigliceridos:</th>
        <td id="td"><?php echo $dataRegistro['trigliceridos'] ?></td>
    </tr>
    <tr>
        <th id="th">FIB 4:</th>
        <td id="td"><?php echo $dataRegistro['fib4'] ?></td>
    </tr>
    <tr>
        <th id="th">Resultado fib 4:</th>
        <td id="td"><?php echo $dataRegistro['resultadofib4'] ?></td>
    </tr>
</table>
<div id="editarlaboratoriosartritis"></div>
<!--FINALIZA SECCIÓN DE LABORATORIOS-->
<!-- INCIA SECCIÓN USG HEPÁTICO-->
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="artritisusghepatic();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="artritisusghepatic();" <?php } }?>>
    <div class="containerr3">USG HEPÁTICO</div>

    <tr>
        <th id="th">USG Hepático:</th>
        <td id="td"><?php echo $dataRegistro['detalleusghepatico'] ?></td>
    </tr>

    <tr>
        <th id="th">Hallazgo USG:</th>
        <td id="td"><?php echo $dataRegistro['hallazgousg'] ?></td>
    </tr>

    <tr>
        <th id="th">Clasificación Cirrosis:</th>
        <td id="td"><?php echo $dataRegistro['clasificacionesteatosis'] ?></td>
    </tr>
</table>
<div id="editarusghepaticoartritis"></div>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="actulizaDatosClinica();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="actulizaDatosClinica();" <?php } }?>>
    <div class="containerr3">CLINICA</div>

    <tr>
        <th id="th">Articulaciones Inflamadas SJC28:</th>
        <td id="td"><?php echo $dataRegistro['articulacionesinflamadassjc28'] ?></td>
    </tr>

    <tr>
        <th id="th">Articulaciones Dolorosas TJC28:</th>
        <td id="td"><?php echo $dataRegistro['articulacionesdolorosastjc28'] ?></td>
    </tr>

    <tr>
        <th id="th">Evaluación Global PGA:</th>
        <td id="td"><?php echo $dataRegistro['evglobalpga'] ?></td>
    </tr>

    <tr>
        <th id="th">Evaluación del Evaluador EGA:</th>
        <td id="td"><?php echo $dataRegistro['evega'] ?></td>
    </tr>

    <tr>
        <th id="th">RESULTADO CDAI:</th>
        <td id="td"><?php echo $dataRegistro['resultadocdai'].'&nbsp'; if($id_paciente != ''){ echo $cdai;}?></td>

    </tr>

    <tr>
        <th id="th">RESULTADO SDAI:</th>
        <td id="td"><?php echo $dataRegistro['resultadosdai'].'&nbsp'; if($id_paciente != ''){ echo $sdai;}?></td>

    </tr>

</table>
<div id="editarclincaartritis"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="actualizaTratamiento();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopaciente'] == 1 ) { ?> onclick="actualizaTratamiento();" <?php } }?>>
    <div class="containerr3">TRATAMIENTO</div>
    <tr>
        <th id="th">Metrotexate:</th>
        <td id="td"><?php echo $dataRegistro['metrotexate']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Metrotexate:</th>
        <td id="td"><?php echo $dataRegistro['dosissemanalmetro']?></td>
    </tr>
    <tr>
        <th id="th">Leflunomide:</th>
        <td id="td"><?php  echo $dataRegistro['leflunomide']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Leflunomide:</th>
        <td id="td"><?php  echo $dataRegistro['dosissemanalfemua']?></td>
    </tr>
    <tr>
        <th id="th">Sulfazalasina:</th>
        <td id="td"><?php  echo $dataRegistro['sulfazalasina']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Sulfazalasina:</th>
        <td id="td"><?php  echo $dataRegistro['dosissemanalsulfa']?></td>
    </tr>
    <tr>
        <th id="th">Tocoferol:</th>
        <td id="td"><?php  echo $dataRegistro['tecoferol']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Tocoferol:</th>
        <td id="td"><?php  echo $dataRegistro['dosissemanalteco']?></td>
    </tr>
    <tr>
        <th id="th">Glucocorticoide:</th>
        <td id="td"><?php echo $dataRegistro['glucocorticoide']?></td>
    </tr>
    <tr>
        <th id="th">Tratamiento:</th>
        <td id="td"><?php echo $dataRegistro['usghepatico']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Tratamiento:</th>
        <td id="td"><?php echo $dataRegistro['dosissemanaltrata']?></td>
    </tr>
    <tr>
        <th id="th">Vitamina D:</th>
        <td id="td"><?php echo $dataRegistro['vitaminad']?></td>
    </tr>
    <tr>
        <th id="th">Dosis Vitamina D:</th>
        <td id="td"><?php echo $dataRegistro['dosissemanalvitad']?></td>
    </tr>
    <tr>
        <th id="th">Biológico:</th>
        <td id="td"><?php echo $dataRegistro['biologico']?></td>
    </tr>
    <tr>
        <th id="th">Tratamiento Biológico:</th>
        <td id="td"><?php echo $dataRegistro['tratamientobiologico']?></td>
    </tr>
    <tr>
        <th id="th">Apego a Tratamiento:</th>
        <td id="td"><?php echo $dataRegistro['apegotratamiento']?></td>
    </tr>
</table>
<div id="editartratameintoartritis"></div>

<?php

//require 'modals/edicionArtritis.php';
require 'modals/seguimientoArtritis.php';
?>
