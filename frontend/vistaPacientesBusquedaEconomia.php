<script src="js/enviacurp.js"></script>
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link rel="stylesheet" href="css/estilosMenu.css">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));


$id_paciente = $dataRegistro['id_bucal'];
$curp = $dataRegistro['curp'];
$id = $dataRegistro['id_paciente'];
$municipio = $dataRegistro['municipiobucal'];
$estado = $dataRegistro['estadobucal'];
require 'conexionCancer.php';

$clues = $dataRegistro['cluesbucal'];
$sql_f = $conexion2->query("SELECT unidad from hospitales where clues = '$clues'");
$rown = mysqli_fetch_assoc($sql_f);

//$fecha1 = new DateTime($dataRegistro['iniciosintomas']);//fecha inicial
// $fecha2 = new DateTime($dataRegistro['fechaterminotrombolisis']);//fecha de cierre

//$intervalo = $fecha1->diff($fecha2);

// $diasDiferencia = $intervalo->format('%d days %H horas %i minutos');
$imccalculo = $dataRegistro['imc'];
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
$sqls = $conexion2->query("SELECT * from t_estado where id_estado = $estado");
$rows = mysqli_fetch_assoc($sqls);

$sqlsm = $conexion2->query("SELECT * from t_municipio where id_municipio = $municipio");
$rowsm = mysqli_fetch_assoc($sqlsm);



?>

<div id="mensaje"></div>
<input type="hidden" id="idcurp" value="<?php echo $id_paciente; ?>">
<input type="hidden" id="cancer" value="<?php echo $dataRegistro['descripcioncancer']; ?>">
<input type="hidden" id="nombrepaciente" value="<?php echo $dataRegistro['nombrecompleto']; ?>">
<div class="containerr">
    <?php
    require 'conexionCancer.php';
    $sql_busqueda = $conexionCancer->prepare("SELECT id_pacientebucal from seguimientocancerbucal where id_pacientebucal = $id_paciente");
    $sql_busqueda->execute();
    $sql_busqueda->setFetchMode(PDO::FETCH_ASSOC);
    $validacion = $sql_busqueda->fetch();
    $validaid = $validacion['id_pacientebucal'];
    if ($dataRegistro['curpbucal'] != '') {
        if ($validaid != $id_paciente) { ?>
            <input type="submit" class="mandaidbucal" id="<?php echo $id_paciente ?>" value="Seguimiento" onclick="seguimientoEconomia();"> <?php } else { ?>
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
        if (isset($_SESSION['usuarioAdmin']) or isset($_SESSION['usuarioMedico'])) { ?>
            <a href="#" onclick="editarRegistro();" id="editarregistro">Editar registro</a>
        <?php }; ?>
        <a href="#" onclick="eliminarRegistro();" id="eliminarregistro">Eliminar registro</a>
    <?php
    } ?>
</div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">

    <div class="containerr2">DATOS DEL PACIENTE</div>

    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Talla:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Peso:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">IMC:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Referenciado:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Unidad de Referencia:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>


    <tr>
        <th id="th">Dx Referencia:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Estado de Residencia:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

    <tr>
        <th id="th">Deleganción / Municipio:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>


    <tr>
        <th id="th">Localidad:</th>
        <td id="td"><?php echo $dataRegistro[''] ?>
    </tr>

</table>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">

    <div class="containerr3">CONTRARREFERENCIA</div>
    <tr>
        <th id="th">Dx Contrarreferencia:</th>
        <td id="td"><?php echo $dataRegistro[''] ?></td>
    <tr>
        <th id="th">
            Fecha Contrarreferencia:</th>
        <td id="td"><?php echo $rown['']; ?></td>
    </tr>
</table>

<script>
    function seguimientoEconomia() {
        $("#seguimientoEconomia").modal('show');

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
                url: 'aplicacion/eliminarCancerbucal.php',
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