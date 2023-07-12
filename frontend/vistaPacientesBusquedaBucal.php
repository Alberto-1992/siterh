<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

$id_paciente = $dataRegistro['id_bucal'];
$curp = $dataRegistro['curpbucal'];
$id = $dataRegistro['id_paciente'];
$municipio = $dataRegistro['municipiobucal'];
$estado = $dataRegistro['estadobucal'];
require 'conexionCancer.php';

$clues = $dataRegistro['cluesbucal'];
$sql_f = $conexionCancer->prepare("SELECT unidad from hospitales where clues = :clues");
    $sql_f->execute(array(
        ':clues'=>$clues
    ));
$rown = $sql_f->fetch();

$imccalculo = $dataRegistro['imcbucal'];
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
<input type="hidden" id="cancer" value="Cancer bucal">
<input type="hidden" id="nombrepaciente" value="<?php echo $dataRegistro['nombrecompletobucal']; ?>">
<input type="hidden" id="clues" value="<?php echo $dataRegistro['cluesbucal']; ?>">
<div class="containerr">
    <?php

    $sql_busqueda = $conexionCancer->prepare("SELECT id_pacientebucal from seguimientocancerbucal where id_pacientebucal = :id_pacientebucal");
    $sql_busqueda->execute(array(
        ':id_pacientebucal'=>$id_paciente
    ));
    $validacion = $sql_busqueda->fetch();
    $validaid = $validacion['id_pacientebucal'];
    if ($dataRegistro['curpbucal'] != '') {
        if ($validaid != $id_paciente) { ?>
            <input type="submit" class="mandaidbucal" id="<?php echo $id_paciente ?>" value="Seguimiento" onclick="aplicarSeguimientoBucal();"> <?php } else { ?>
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
        </script>
        <?php session_start();
        if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico']) or isset($_SESSION['bucal'])) { 
            if($dataRegistro['editopacientebucal'] == 0 ) {?>
                    
                    <input type="submit" onclick="editarRegistro();" id="editarregistro" value="Editar registro">
                        <?php }else{ ?>
                            <input type="submit" onclick="finalizarEdicion();" id="editarregistro" value="Finalizar Edicion">
        
                        <?php }
                    };?>
        <a href="#" onclick="eliminarRegistro();" id="eliminarregistro">Eliminar registro</a>
    <?php
    } ?>
</div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardatosbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardatosbucal();" <?php } }?>>

    <div class="containerr2">Datos del Paciente</div>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombrecompletobucal'] ?>
    </tr>
    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['curpbucal'] ?>
    </tr>
    <tr>
        <th id="th">Fecha de nacimiento:</th>
        <td id="td"><?php echo $dataRegistro['fechanacimientobucal'] ?></td>
    </tr>
    <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataRegistro['edadbucal'] ?>
    </tr>
    <tr>
        <th id="th">Escolaridad:</th>
        <td id="td"><?php echo $dataRegistro['escolaridadbucal'] ?>
    </tr>
    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro['sexobucal'] ?>
    </tr>
    <th id="th">Estado:</th>
        <td id="td"><?php echo $rows['estado'] ?></td></tr>
        <tr>
    <th id="th">Municipio:</th>
        <td id="td"><?php echo $rowsm['municipio'] ?>
    </tr>
</table>
<div id="editardatosbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3">Somatometria</div>
<tr>
        <th id="th">Talla:</th>
        <td id="td"><?php echo $dataRegistro['tallabucal'] ?>
    </tr>

    <tr>
        <th id="th">Peso:</th>
        <td id="td"><?php echo $dataRegistro['pesobucal'] ?>
    </tr>

    <tr>
        <th id="th">IMC:</th>
        <td id="td"><?php echo $dataRegistro['imcbucal'].'&nbsp'; if($id_paciente != ''){ echo $showimc;}?></td>
    </tr>
</table>
<table  class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardatosreferenciabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardatosreferenciabucal();" <?php } }?>>        
    
    <div class="containerr3">Unidad de refernecia</div>
    <tr>
        <th id="th">Referenciado:</th>  
        <td id="td"><?php echo $dataRegistro['referenciadobucal'] ?></td>
        <tr>
            <th id="th">Unidad de referencia</th>
            <td id="td"><?php echo $rown['unidad']; ?></td>
        </tr>
        </table>
        <div id="editarreferenciacancerbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editaranpbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editaranpbucal();" <?php } }?>>

    <div class="containerr3">Antecedentes No Patológicos</div>
    <tr>
        <th id="th">Exposición Solar:</th>
        <td id="td"><?php echo $dataRegistro['exposicionsolarbucal'] ?></td>
    </tr>

    <tr>
        <th id="th">Comidas al día:</th>
        <td id="td"><?php echo $dataRegistro['comidasbucal'] ?></td>
    </tr>

    <tr>
        <th id="th">Higiene Bucal:</th>
        <td id="td"><?php echo $dataRegistro['higienebucal'] ?></td>
    </tr>
</table>
<div id="editaranpbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarappbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarappbucal();" <?php } }?>>
    <div class="containerr3">Antecedentes Personales Patológicos</div>

    <tr>
        <th id="th">Toxicomanias:</th>
        <td id="td"><?php while($dataReg=$sql_t->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionantecedentepatobucal'].'--'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Años Tabaquismo:</th>
        <td id="td"><?php echo $dataRegistro['tiempotabaquismobucal'] ?></td>
    </tr>

    <tr>
        <th id="th">Cigarros al Día:</th>
        <td id="td"><?php echo $dataRegistro['cigarrosaldiabucal'] ?></td>
    </tr>

    <tr>
        <th id="th">Frecuencia Alcoholismo:</th>
        <td id="td"><?php echo $dataRegistro['frecuenciaalcoholbucal'] ?></td>
    </tr>

    <tr>
        <th id="th">Hábitos:</th>
        <td id="td"><?php while($dataRegist= $sql_r->fetch())
{
echo '&nbsp&nbsp'.$dataRegist['descripcionhabitopatobucal'].'--'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Virus:</th>
        <td id="td"><?php while($dataRegis= $sql_m->fetch())
{
echo '&nbsp&nbsp'.$dataRegis['descripcionviruspatobucal'].'--'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Cáncer:</th>
        <td id="td"><?php while($dataRegi= $sql_c->fetch())
{
echo '&nbsp&nbsp'.$dataRegi['descripcioncancerpatobucal'].'--'.'';} ?></td>
    </tr>
</table>
<div id="editarappbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">AFECTACIONES ORALES</div>

</table>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarafectacionesoralesbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarafectacionesoralesbucal();" <?php } }?>>
    <div class="containerr4">Afectación Dental</div>
    <tr>
        <th id="th">Afectación oral:</th>
        <td id="td"><?php while($dataReg= $sql_afd->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionafectacionoral'].'-'.'';} ?></td>
    </tr>
    <tr>
        <th id="th">Órgano Oral Lesionado:</th>
        <td id="td"><?php while($dataReg= $sql_msd->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionorganorallesionado'].'-'.'';} ?></td>
    </tr>
    <tr>
        <th id="th">Maxilar Superior Derecho:</th>
        <td id="td"><?php while($dataReg= $sql_maxisupder->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionmaxisupdere'].'-'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Maxilar Inferior Derecho:</th>
        <td id="td"><?php while($dataReg= $sql_maxiinfder->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionmaxinfderecho'].'-'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Maxilar Superior Izquierdo:</th>
        <td id="td"><?php while($dataReg= $sql_maxsupizq->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionmaxsupizquierdo'].'-'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Maxilar Inferior Izquierdo:</th>
        <td id="td"><?php while($dataReg= $sql_maxinfizq->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionmaxinfizquierdo'].'-'.'';} ?></td>
    </tr>
</table>
<div id="editarafectacionesoralbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarlesionoralbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarlesionoralbucal();" <?php } }?>>
    <div class="containerr4">Lesiones Orales</div>
    <tr>
        <th id="th">¿Lesión Oral?:</th>
        <td id="td"><?php echo $dataRegistro['lesionoral'] ?></td>
    </tr>

    <tr>
        <th id="th">Tipo Tejido:</th>
        <td id="td"><?php echo $dataRegistro['tipotejido'] ?></td>
    </tr>

    <tr>
        <th id="th">Tipo Lesión:</th>
        <td id="td"><?php while($dataReg= $sql_tipolesion->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripciontipolesionoral'].'-'.'';} ?></td>
    </tr>

    <tr>
        <th id="th">Coloración:</th>
        <td id="td"><?php echo $dataRegistro['coloracionbucal'] ?></td>
    </tr>
</table>
<div id="editarlesionoralbucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralbucal();" <?php } }?>>
    <div class="containerr4">Ubicaciones orales</div>
    <tr>
            <th id="th">Ubicación:</th>
            <td id="td"><?php while($dataReg= $sql_ubicoral->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubicacionoral'].'-'.'';} ?></td>
        </tr>
    </table>
<div id="editarubicacionoralbucal"></div>

    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralderechabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralderechabucal();" <?php } }?>>
        <div class="containerr5">Ubicación Derecha</div>
        <tr>
            <th id="th">Subsitio Anatómico:</th>
            <td id="td"><?php while($dataReg= $sql_subatomico->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubicderechasubatomico'].'-'.'';} ?></td>
        </tr>

        <tr>
            <th id="th">Labios:</th>
            <td id="td"><?php echo $dataRegistro['labios'] ?></td>
        </tr>

        <tr>
            <th id="th">Lengua:</th>
            <td id="td"><?php echo $dataRegistro['lengua'] ?></td>
        </tr>

        <tr>
            <th id="th">Paladar Blando:</th>
            <td id="td"><?php echo $dataRegistro['paladarblando'] ?></td>
        </tr>
        <tr>
            <th id="th">Paladar Duro:</th>
            <td id="td"><?php echo $dataRegistro['paladarduro'] ?></td>
        </tr>
        <tr>
            <th id="th">Encia superior:</th>
            <td id="td"><?php echo $dataRegistro['encia'] ?></td>
        </tr>
        <tr>
            <th id="th">Encia inferior:</th>
            <td id="td"><?php echo $dataRegistro['enciainferior'] ?></td>
        </tr>
        <tr>
            <th id="th">¿Está relacionado con un órgano dental?:</th>
            <td id="td"><?php echo $dataRegistro['relacionadoconorganodental'] ?></td>
        </tr>

        <tr>
            <th id="th">Maxilar Superior Derecho</th>
            <td id="td"><?php while($dataReg= $sql_ubisupdere->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubisupdere'].'-'.'';} ?></td>
        </tr>

        <tr>
            <th id="th">Maxilar Inferior Derecho:</th>
            <td id="td"><?php while($dataReg= $sql_ubiinfdere->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubicainfdere'].'-'.'';} ?></td>
        </tr>
    </table>
    <div id="editarubicacionoralderechabucal"></div>

    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralizquierdabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarubicacionoralizquierdabucal();" <?php } }?>>
        <div class="containerr5">Ubicación Izquierda</div>
        <tr>
            <th id="th">Subsitio Anatómico:</th>
            <td id="td"><?php while($dataReg= $sql_subizquierda->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubicizquierdasubatomico'].'-'.'';} ?></td>
        </tr>

        <tr>
            <th id="th">Labios:</th>
            <td id="td"><?php echo $dataRegistro['labiosiz'] ?></td>
        </tr>

        <tr>
            <th id="th">Lengua:</th>
            <td id="td"><?php echo $dataRegistro['lenguaiz'] ?></td>
        </tr>

        <tr>
            <th id="th">Paladar Blando:</th>
            <td id="td"><?php echo $dataRegistro['paladarblandoiz'] ?></td>
        </tr>
        <tr>
            <th id="th">Paladar Duro:</th>
            <td id="td"><?php echo $dataRegistro['paladarduroiz'] ?></td>
        </tr>

        <tr>
            <th id="th">Encia:</th>
            <td id="td"><?php echo $dataRegistro['enciaiz'] ?></td>
        </tr>
        <tr>
            <th id="th">Encia inferior:</th>
            <td id="td"><?php echo $dataRegistro['enciaizinferior'] ?></td>
        </tr>
        <tr>
            <th id="th">¿Está relacionado con un órgano dental?:</th>
            <td id="td"><?php echo $dataRegistro['relacionadoconorganodentaliz'] ?></td>
        </tr>

        <tr>
            <th id="th">Maxilar Superior Izquierdo</th>
            <td id="td"><?php while($dataReg= $sql_ubiinfderecha->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubisupizquierda'].'-'.'';} ?></td>
        </tr>

        <tr>
            <th id="th">Maxilar Inferior Izquierdo:</th>
            <td id="td"><?php while($dataReg= $sql_ubiinfizquierda->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionubicainfizquierda'].'-'.'';} ?></td>
        </tr>
    </table>
<div id="editarubicacionoralizquierdabucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editaratencionclinicabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editaratencionclinicabucal();" <?php } }?>>
            <div class="containerr3">ATENCIÓN CLINICA</div>

            <tr>
                <th id="th">Fecha primer atención</th>
                <td id="td"><?php echo $dataRegistro['fechaprimeratencionbucal']?></td>
            </tr>

            <tr>
                <th id="th">Estadío Clínico</th>
                <td id="td"><?php echo $dataRegistro['estadoclinicobucal']?></td>
            </tr>

            <tr>
                <th id="th">Etapa Clínica</th>
                <td id="td"><?php echo $dataRegistro['etapaclinicabucal']?></td>
            </tr>
            <tr>
                <th id="th">Tamaño tumoral</th>
                <td id="td"><?php echo $dataRegistro['tamaniotumoralbucal']?></td>
            </tr>
            <tr>
                <th id="th">Compromiso Linfático Nodal</th>
                <td id="td"><?php echo $dataRegistro['compromisolinfaticobucal']?></td>
            </tr>
            <tr>
                <th id="th">Metastasis</th>
                <td id="td"><?php echo $dataRegistro['metastasisbucal']?></td>
            </tr>
            <tr>
                <th id="th">Sitio metastasis</th>
                <td id="td"><?php while($dataReg= $sql_sitiometastasis->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionmetastasisbucal'].'-'.'';} ?></td>
            </tr>
            <tr>
                <th id="th">Calidad de vida ECOG</th>
                <td id="td"><?php echo $dataRegistro['calidadvidaecog']?></td>
            </tr>
        </table>
<div id="editaratencionclinicabucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarhistopatologiabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarhistopatologiabucal();" <?php } }?>>
            <div class="containerr3">HISTOPATOLOGÍA</div>

            <tr>
                <th id="th">Dx Histopatológico:</th>
                <td id="td"><?php echo $dataRegistro['dxhistopatologicobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Fecha de Reporte:</th>
                <td id="td"><?php echo $dataRegistro['fechareportebucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Tipo:</th>
                <td id="td"><?php echo $dataRegistro['tipobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Maligno:</th>
                <td id="td"><?php echo $dataRegistro['malignobucal'] ?></td>
            </tr>
        </table>
<div id="editarhistopatologiabucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarinmunohistoquimicabucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarinmunohistoquimicabucal();" <?php } }?>>
            <div class="containerr3">INMUNOHISTOQUÍMICA</div>

            <tr>
                <th id="th">¿Se realizó PDL?</th>
                <td id="td"><?php echo $dataRegistro['realizoinmunobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">PDL:</th>
                <td id="td"><?php echo $dataRegistro['descripcioninmunobucal'] ?></td>
            </tr>
        </table>
<div id="editarinmunohistoquimicabucal"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
            <div class="containerr3">TRATAMIENTO</div>
            <tr>
                <th id="th">Quirurgico:</th>
                <td id="td"><?php echo $dataRegistro['quirurgicobucal'] ?></td>
            </tr>
            <tr>
                <th id="th">Tipo de Cirugía:</th>
                <td id="td"><?php echo $dataRegistro['tipocirugiabucal'] ?></td>
            </tr>
            <tr>
                <th id="th">Maxilectomia de Infraestructura:</th>
                <td id="td"><?php echo $dataRegistro['maxilectomiadeinfraestructura'] ?></td>
            </tr>
            <tr>
                <th id="th">Lugar:</th>
                <td id="td"><?php echo $dataRegistro['lugardrmc'] ?></td>
            </tr>
            <tr>
                <th id="th">Tipo:</th>
                <td id="td"><?php echo $dataRegistro['tipodrmc'] ?></td>
            </tr>
            <tr>
                <th id="th">Nivel Cervical:</th>
                <td id="td"><?php echo $dataRegistro['nivelcervical'] ?></td>
            </tr>
            <tr>
                <th id="th">Reconstrucción:</th>
                <td id="td"><?php echo $dataRegistro['reconstruccionbucal'] ?></td>
            </tr>
            <tr>
                <th id="th">Tipo de Reconstrucción:</th>
                <td id="td"><?php while($dataReg= $sql_tiporeconstruccion->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripccionreconstruccionbucal'].'-'.'';} ?></td>
            </tr>

            <tr>
                <th id="th">Radioterapia:</th>
                <td id="td"><?php echo $dataRegistro['radioterapiabucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Fecha:</th>
                <td id="td"><?php echo $dataRegistro['fecharadioterapiabucal'] ?></td>
            </tr>
            <tr>
                <th id="th">Complicaciones:</th>
                <td id="td"><?php while($dataReg= $sql_complicacionrt->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionrtbucal'].'-'.'';} ?></td>
            </tr>

            <tr>
                <th id="th">Momento RT:</th>
                <td id="td"><?php echo $dataRegistro['momentortradiobucal'] ?></td>
            </tr>
            <tr>
                <th id="th">Dosis:</th>
                <td id="td"><?php echo $dataRegistro['dosisradiobucal']?></td>
            </tr>

            <tr>
                <th id="th">Fracciones:</th>
                <td id="td"><?php echo $dataRegistro['fraccionesradiobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">No. Fracciones:</th>
                <td id="td"><?php echo $dataRegistro['numfraccionesradiobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Técnica:</th>
                <td id="td"><?php echo $dataRegistro['tecnicaradiobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">OARS Dosis:</th>
                <td id="td"><?php while($dataReg= $sql_dosisoars->fetch())
{
echo '&nbsp&nbsp'.$dataReg['descripcionoarsbucal'].'-'.'';} ?></td>
            </tr>

            <tr>
                <th id="th">Dosis Máxima:<br><br></th>
                <td id="td"><?php echo 'Cavidad Oral: '.$dataRegistro['dosismaxcavidadoral'].' | Cocleas: '.$dataRegistro['dosismaxcocleas'].' | Cristalinos: '.$dataRegistro['dosismaxcristalinos'].' | Esófago: '.$dataRegistro['dosismaxesofago'].' | Labios: '.$dataRegistro['dosismaxlabios'].' | Laringe: '.$dataRegistro['dosismaxlaringe'].' | Mandibula: '.$dataRegistro['dosismaxmandibula'].' | Médula: '.$dataRegistro['dosismaxmedula'].'<br>Nervio Óptico: '.$dataRegistro['dosismaxnerviooptico'].' | Ojos: '.$dataRegistro['dosismaxojos'].' | PFP: '.$dataRegistro['dosismaxpfp'].' | Parotidas: '.$dataRegistro['dosismaxparotidas'].' | Sublinguales: '.$dataRegistro['dosismaxsubli'].' | Tallo: '.$dataRegistro['dosismaxtallo'].' | Tiroides: '.$dataRegistro['dosismaxtiroides'] ?></td>
            </tr>

            <tr>
                <th id="th">Dosis Promedio:<br><br></th>
                <td id="td"><?php echo 'Cavidad Oral: '.$dataRegistro['dosispromcavidadoral'].' | Cocleas: '.$dataRegistro['dosispromediococlelas'].' | Cristalinos: '.$dataRegistro['dosispromediocristalinos'].' | Esófago: '.$dataRegistro['dosispromedioesofago'].' | Labios: '.$dataRegistro['dosispromediolabios'].' | Laringe: '.$dataRegistro['dosispromediolaringe'].' | Mandibula: '.$dataRegistro['dosispromediomandibula'].' | Médula: '.$dataRegistro['dosispromediomedula'].'<br>Nervio Óptico: '.$dataRegistro['dosispromedionerviooptico'].' | Ojos: '.$dataRegistro['dosispromedioojos'].' | PFP:'.$dataRegistro['dosispromediopfp'].' | Parotidas: '.$dataRegistro['dosispromedioparotidas'].' | Sublinguales: '.$dataRegistro['dosispromediosubli'].' | Tallo: '.$dataRegistro['dosispromediotallo'].' | Tiroides:'.$dataRegistro['dosispromediotiroides'] ?></td>
            </tr>
        </table>
        <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardefuncionbucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editardefuncionbucal();" <?php } }?>>
            <div class="containerr3">DEFUNCIÓN</div>

            <tr>
                <th id="th">¿Defunción?:</th>
                <td id="td"><?php echo $dataRegistro['defuncionbucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Fecha Defunción:</th>
                <td id="td"><?php echo $dataRegistro['fechadefuncionbucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Causa:</th>
                <td id="td"><?php echo $dataRegistro['causadefuncionbucal'] ?></td>
            </tr>
        </table>
<div id="editardefuncionbucal"></div>
        <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarcasoexitosobucal();" <?php } }else if(isset($_SESSION['bucal'])) { if($dataRegistro['editopacientebucal'] == 1 ) { ?> onclick="editarcasoexitosobucal();" <?php } }?>>
            <div class="containerr3">CASO ÉXITOSO</div>

            <tr>
                <th id="th">¿Caso éxitoso?:</th>
                <td id="td"><?php echo $dataRegistro['exitosobucal'] ?></td>
            </tr>

            <tr>
                <th id="th">Respuesta al Tratamiento:</th>
                <td id="td"><?php echo $dataRegistro['respiuestatratamientobucal'] ?></td>
            </tr>

        </table>
<div id="editarcasoexitosobucal"></div>
