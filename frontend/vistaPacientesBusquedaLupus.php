<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">

<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

$id_paciente = $dataRegistro['id_lupus'];
$curp = $dataRegistro['curplupus'];
$id = $dataRegistro['id_paciente'];
$municipio = $dataRegistro['municipio'];
$estado = $dataRegistro['estado'];
require 'conexionCancer.php';

$clues = $dataRegistro['clues'];
$sql_f = $conexionCancer->prepare("SELECT unidad from hospitales where clues = :clues");
    $sql_f->execute(array(
        ':clues'=>$clues
    ));
$rown = $sql_f->fetch();


$imccalculo = $dataRegistro['imclupus'];
$imcbajo = "IMC bajo";
$imcok = "IMC ok";
$imcsobre = "Sobrepeso";
$obe1 = "Obesidad I";
$obe2 = "Obesidad II";
$obe3 = "<i class='lnr lnr-flag'></i>";
$obe4 = "<i class='lnr lnr-flag'></i>";
if ($imccalculo <= 18.5) {
    $showimc = "<span class='imcbajo'> $imcbajo";
} elseif ($imccalculo > 18.5 and $imccalculo <= 24.9) {
    $showimc = "<span class='imcok'> $imcok";
} elseif ($imccalculo > 25 and $imccalculo <= 29.9) {
    $showimc = "<span class='imcsobre'> $imcsobre";
} elseif ($imccalculo > 30 and $imccalculo <= 34.9) {
    $showimc = "<span class='obesidad1'> $obe1";
} elseif ($imccalculo > 35 and $imccalculo <= 39.9) {
    $showimc = "<span class='obesidad2'> $obe2";
}
require 'conexionCancer.php';
$sqls = $conexionCancer->prepare("SELECT * from t_estado where id_estado = :id_estado");
    $sqls->execute(array(
        ':id_estado'=>$estado
    ));

$sqlsm = $conexionCancer->prepare("SELECT * from t_municipio where id_municipio = :id_municipio");
        $sqlsm->execute(array(
            ':id_municipio'=>$municipio
        ));

?>

<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<input type="hidden" id="nombrepaciente" value="<?php echo $dataRegistro['nombrecompletolupus']; ?>">
<input type="hidden" id="cancer" value="Paciente con lupus">
<div class="containerr">
    <?php
    require 'conexionCancer.php';
    $sql_busqueda = $conexionCancer->prepare("SELECT id_pacientelupus from seguimientolupus where id_pacientelupus = :id_pacientelupus");
    $sql_busqueda->execute(array(
        ':id_pacientelupus'=>$id_paciente
    ));
    $validacion = $sql_busqueda->fetch();
    $validaid = $validacion['id_pacientelupus'];
    if ($dataRegistro['curplupus'] != '') {
        if ($validaid != $id_paciente) { ?>
            <a href="#" class="mandaidbucal" id="<?php echo $id_paciente ?>" onclick="modalSeguimientoLupus();">Seguimiento</a> <?php } else { ?>
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
                    url: "consultaLupusBusquedaSeguimiento.php",
                    data: ob,
                    beforeSend: function() {

                    },
                    success: function(data) {

                        $("#tabla_resultado").html(data);

                    }
                });

            };
            function eliminarRegistroLupus() {
                var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("el registro se eliminara");
    let parametros = {
        id: id, cancer:cancer, nombrepaciente:nombrepaciente
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminaRegistroLupus.php',
            type: 'post',
        
            success: function(response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultalupus.php');
                $("#tabla_resultado").load('consultalupusbusqueda.php');

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
        <?php session_start();
        if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico']) or isset($_SESSION['lupus'])) { 
            if($dataRegistro['editopacientelupus'] == 0 ) {?>
                    
                    <input type="submit" onclick="editarRegistro();" id="editarregistro" value="Editar registro">
                        <?php }else{ ?>
                            <input type="submit" onclick="finalizarEdicion();" id="editarregistro" value="Finalizar Edicion">
        
        <?php 
                        }
    }; ?>
        <a href="#" onclick="eliminarRegistroLupus();" id="eliminarregistro">Eliminar registro</a>
    <?php
    } ?>
</div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatospersonaleslupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatospersonaleslupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatospersonaleslupus();" <?php } }?>>

    <div class="containerr2">DATOS DEL PACIENTE</div>

    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['curplupus'] ?></td>
    </tr>

    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombrecompletolupus'] ?></td>
    </tr>

    <tr>
        <th id="th">Escolaridad:</th>
        <td id="td"><?php echo $dataRegistro['escolaridadlupus'] ?></td>
    </tr>

    <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataRegistro['edadlupus'] ?></td>
    </tr>

    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro['sexolupus'] ?></td>
    </tr>

</table>
<div id="editardatospersonaleslupus"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">

    <div class="containerr3">SOMATOMETRIA</div>
    <tr>
        <th id="th">Talla:</th>
        <td id="td"><?php echo $dataRegistro['tallalupus'] ?></td>
    </tr>

    <tr>
        <th id="th">Peso:</th>
        <td id="td"><?php echo $dataRegistro['pesolupus'] ?></td>
    </tr>

    <tr>
        <th id="th">IMC:</th>
        <td id="td"><?php echo $dataRegistro['imclupus'].'&nbsp'; if($id_paciente != ''){ echo $showimc;}?></td>
    </tr>

</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosapplupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosapplupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosapplupus();" <?php } }?>>

    <div class="containerr3">ANTECEDENTES PERSONALES PATOLÓGICOS</div>
    <tr>
        <th id="th">Toxicomanías:</th>
        <td id="td"><?php while($data=$sql->fetch())
{
echo '&nbsp&nbsp'.$data['descripcionantecednetelupus'].'--'.'';} ?></td>
    </tr>
</table>
<div id="editarapplupus"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3">CLÍNICA</div>

    <table class="table table-responsive table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosactividadlupicalupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosactividadlupicalupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardatosactividadlupicalupus();" <?php } }?>>
        <div class="containerr4">Actividad Lúpica</div>

        <tr>
            <th id="th">Actividad Articular:</th>
            <td id="td"><?php echo $dataRegistro['actividadarticular'] ?></td>
        </tr>

        <tr>
            <th id="th">Actividad Cutánea:</th>
            <td id="td"><?php echo $dataRegistro['actividadcutanea'] ?></td>
        </tr>

        <tr>
            <th id="th">Actividad Hematología:</th>
            <td id="td"><?php echo $dataRegistro['actividadhematologia'] ?></td>
        </tr>

        <tr>
            <th id="th">Actividad Inmunológica:</th>
            <td id="td"><?php echo $dataRegistro['actividadinmunologica'] ?></td>
        </tr>

        <tr>
            <th id="th">Actividad Neurológica:</th>
            <td id="td"><?php echo $dataRegistro['actividadneurologica'] ?></td>
        </tr>

        <tr>
            <th id="th">Actividad Renal:</th>
            <td id="td"><?php echo $dataRegistro['actividadrenal'] ?></td>
        </tr>
        <tr>
            <th id="th">Actividad Muscular:</th>
            <td id="td"><?php echo $dataRegistro['actividadmuscular'] ?></td>
        </tr>
        <tr>
            <th id="th">Actividad Cardiaca:</th>
            <td id="td"><?php echo $dataRegistro['actividadcardiaca'] ?></td>
        </tr>
    </table>
<div id="editaractividadlupicalupus"></div>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarcalculadorasledailupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarcalculadorasledailupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarcalculadorasledailupus();" <?php } }?>>
        <div class="containerr4">CALCULADORA SLEDAI</div>
        <tr>
            <th id="th">Registros calculadora</th>
            <td id="td"><?php while($data=$sql_m->fetch())
{
echo '&nbsp&nbsp'.$data['descripcionsledai'].'--'.'';} ?></td>
        </tr>
</table>
<div id="editarcalculadorasledailupus"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
        <div class="containerr4">RESULTADO SLEDAI</div>
        <tr>
            <th id="th">Resultado SLEDAI</th>
            <td id="td"><?php echo $dataRegistro['resultadosledaipaciente'] ?></td>
        </tr>
    </table>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarlaboratorioslupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarlaboratorioslupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarlaboratorioslupus();" <?php } }?>>
        <div class="containerr4">LABORATORIOS</div>

        <tr>
            <th id="th">Albumina</th>
            <td id="td"><?php echo $dataRegistro['albuminaserica'] ?></td>
        </tr>

        <tr>
            <th id="th">BUN</th>
            <td id="td"><?php echo $dataRegistro['bun'] ?></td>
        </tr>

        <tr>
            <th id="th">C3</th>
            <td id="td"><?php echo $dataRegistro['c3'] ?></td>
        </tr>

        <tr>
            <th id="th">C4</th>
            <td id="td"><?php echo $dataRegistro['c4'] ?></td>
        </tr>

        <tr>
            <th id="th">Creatina serica</th>
            <td id="td"><?php echo $dataRegistro['creatinaserica'] ?></td>
        </tr>

        <tr>
            <th id="th">Proteinuria en 24 hrs</th>
            <td id="td"><?php echo $dataRegistro['proteinuria'] ?></td>
        </tr>

        <tr>
            <th id="th">Albúminuria en 24 hrs</th>
            <td id="td"><?php echo $dataRegistro['albuminuria'] ?></td>
        </tr>
        <tr>
            <th id="th">Leucocitos</th>
            <td id="td"><?php echo $dataRegistro['leucocitos'] ?></td>
        </tr>
        <tr>
            <th id="th">Linfocitos</th>
            <td id="td"><?php echo $dataRegistro['linfocitos'] ?></td>
        </tr>
        <tr>
            <th id="th">Plaquetas</th>
            <td id="td"><?php echo $dataRegistro['plaquetas'] ?></td>
        </tr>
        <tr>
            <th id="th">Hemoglobina</th>
            <td id="td"><?php echo $dataRegistro['hemoglobina'] ?></td>
        </tr>
        <tr>
            <th id="th">Vitamina D</th>
            <td id="td"><?php echo $dataRegistro['vitaminad'] ?></td>
        </tr>
        <tr>
            <th id="th">Anticuerpo Lúpico</th>
            <td id="td"><?php echo $dataRegistro['anticuerpolupico'] ?></td>
        </tr>
    </table>
<div id="editarlaboratorioslupus"></div>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editaranticuerposlupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editaranticuerposlupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editaranticuerposlupus();" <?php } }?>>
        <div class="containerr4">ANTICUERPOS</div>

        <tr>
            <th id="th">Ac-DNA Elevado</th>
            <td id="td"><?php echo $dataRegistro['acdnaelevado'] ?></td>
        </tr>

        <tr>
            <th id="th">Ac-SM</th>
            <td id="td"><?php echo $dataRegistro['acsm'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac-RNP</th>
            <td id="td"><?php echo $dataRegistro['acrnp'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac-RO</th>
            <td id="td"><?php echo $dataRegistro['acro'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac-LA</th>
            <td id="td"><?php echo $dataRegistro['acla'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac-Cardiolipinas IgM</th>
            <td id="td"><?php echo $dataRegistro['accardiolipinaslgm'] ?></td>
        </tr>
        <tr>
            <th id="th">Valor Ac-Cardiolipinas IgM</th>
            <td id="td"><?php echo $dataRegistro['valoranticardioigm'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac-Cardiolipinas IgG</th>
            <td id="td"><?php echo $dataRegistro['accardiolipinaslgg'] ?></td>
        </tr>
        <tr>
            <th id="th">Valor Ac-Cardiolipinas IgG</th>
            <td id="td"><?php echo $dataRegistro['valoranticardioigg'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac B2-GPI IgG</th>
            <td id="td"><?php echo $dataRegistro['acb2gpilgg'] ?></td>
        </tr>
        <tr>
            <th id="th">Valor Ac B2-GPI IgG</th>
            <td id="td"><?php echo $dataRegistro['valorb2gpi'] ?></td>
        </tr>
        <tr>
            <th id="th">Ac B2-GPI IgM</th>
            <td id="td"><?php echo $dataRegistro['acb2gpilgm'] ?></td>
        </tr>
        <tr>
            <th id="th">Valor Ac B2-GPI IgM</th>
            <td id="td"><?php echo $dataRegistro['valorb2gpi'] ?></td>
        </tr>
    </table>
<div id="editaranticuerposlupus"></div>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarbiopsiarenallupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarbiopsiarenallupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarbiopsiarenallupus();" <?php } }?>>
        <div class="containerr4">BIOPSIA RENAL</div>

        <tr>
            <th id="th">Biopsia Renal</th>
            <td id="td"><?php echo $dataRegistro['tipobiopsiarenal'] ?></td>
        </tr>

        <tr>
            <th id="th">Tipo</th>
            <td id="td"><?php echo $dataRegistro['biopsiarenal'] ?></td>
        </tr>
    </table>
<div id="editarbiopsiarenallupus"></div>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarmarcadoresmalpronosticolupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarmarcadoresmalpronosticolupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editarmarcadoresmalpronosticolupus();" <?php } }?>>
        <div class="containerr4">MARCADORES DE MAL PRONOSTICO</div>

        <tr>
            <th id="th">Indice</th>
            <td id="td"><?php echo $dataRegistro['indicemarcadorlupus'] ?></td>
        </tr>

        <tr>
            <th id="th">Tipo</th>
            <td id="td"><?php echo $dataRegistro['tipomarcadorlupus'] ?></td>
        </tr>
    </table>
<div id="editarmarcadoresmalpronosticolupus"></div>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
        <div class="containerr4">TRATAMIENTO</div>

        <tr>
            <th id="th">Metrotexate</th>
            <td id="td"><?php echo $dataRegistro['metrotextatelupus'] ?></td>
        </tr>

        <tr>
            <th id="th">Dosis semenal</th>
            <td id="td"><?php echo $dataRegistro['dosissemanalmetrotexatelupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Azatioprina</th>
            <td id="td"><?php echo $dataRegistro['azatioprinalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Dosis diaria</th>
            <td id="td"><?php echo $dataRegistro['dosisdiariaazatioprinalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Micofenolato de Mofetilo</th>
            <td id="td"><?php echo $dataRegistro['micofenolatolupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Dosis diaria</th>
            <td id="td"><?php echo $dataRegistro['dosisdiariamicofenolato'] ?></td>
        </tr>
        <tr>
            <th id="th">Rituximab</th>
            <td id="td"><?php echo $dataRegistro['rituximablupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Apego a tratamiento</th>
            <td id="td"><?php echo $dataRegistro['apegotratamientoritulupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Hidroxicloroquina</th>
            <td id="td"><?php echo $dataRegistro['hidroxicloroquinalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Dosis diaria</th>
            <td id="td"><?php echo $dataRegistro['dosisdiariahidroxicloroquinalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Prednisona</th>
            <td id="td"><?php echo $dataRegistro['prednisonalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Dosis diaria</th>
            <td id="td"><?php echo $dataRegistro['dosisdiariaprednisonalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Ciclofosfamida</th>
            <td id="td"><?php echo $dataRegistro['ciclofosfamidalupus'] ?></td>
        </tr>
        <tr>
            <th id="th">Dosis mensual</th>
            <td id="td"><?php echo $dataRegistro['dosismensualciclofosfamidalupus'] ?></td>
        </tr>
    </table>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%" <?php if (isset($_SESSION['usuarioAdmin'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardefuncionlupus();" <?php } }else if(isset($_SESSION['artritis'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardefuncionlupus();" <?php } }else if(isset($_SESSION['lupus'])) { if($dataRegistro['editopacientelupus'] == 1 ) { ?> onclick="editardefuncionlupus();" <?php } }?>>
        <div class="containerr3">DEFUNCIÓN</div>

        <tr>
            <th id="th">Defunción</th>
            <td id="td"><?php echo $dataRegistro['defuncionlupus'] ?></td>
        </tr>
    </table>
<div id="editardefuncionlupus"></div>
    <?php
    require 'modals/seguimientoLupus.php';
    ?>
    <script>
        function modalSeguimientoLupus() {

            $("#seguimientolupus").modal('show');
        }


        function eliminarRegistro() {
            var id = $("#idcurp").val();
            var cancer = $("#cancer").val();
            var nombrepaciente = $("#nombrepaciente").val();
            var mensaje = confirm("el registro se eliminara");
            let parametros = {
                id: id,
                cancer: cancer,
                nombrepaciente: nombrepaciente
            }
            if (mensaje == true) {
                $.ajax({
                    data: parametros,
                    url: 'aplicacion/eliminarRegistroCancer.php',
                    type: 'post',
                    beforeSend: function() {
                        $("#mensaje").html("Procesando, espere por favor");
                    },
                    success: function(response) {
                        $("#mensaje").html(response);
                        $("#tabla_resultadobus").load('consultacancerbucal.php');
                        $("#tabla_resultado").load('consultaCancerBucalBusqueda.php');

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