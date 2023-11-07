<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

require 'conexionRh.php';
?>

<div id="mensaje"></div>

<ul class="nav nav-tabs" style="margin-top: 0px;">
    <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: red;">Acciones</a>
        <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
            <li><a class="dropdown-item" href="#" onclick="eliminarRegistro();">Eliminar registro</a></li>
            <li><a class="dropdown-item" href="#" onclick="denegarAutorizacion();">Rechazar autorización</a></li>
        </ul>
    </li>
</ul>
<style>
    .table:hover {
        background: #EBEBEB;
    }
</style>
<script>
    function eliminarRegistro() {
        var id = $("#id").val();
        var nombrecurso = $("#nombrecurso").val();
        var fechatermino = $("#fechatermino").val();
        var id_empleado = $("#id_empleado").val();
        var mensaje = confirm("el registro se eliminara");
        let parametros = {
            id: id,
            nombrecurso: nombrecurso,
            fechatermino: fechatermino,
            id_empleado: id_empleado
        }
        if (mensaje == true) {
            $.ajax({
                data: parametros,
                url: 'aplicacion/eliminarCursoCargadoOperativo.php',
                type: 'post',

                success: function(response) {
                    $("#mensaje").html(response);
                    $("#tabla_resultadobus").load('cursosAutorizadosEmpleados.php');


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

    function denegarAutorizacion() {
        var id = $("#id").val();
        var mensaje = confirm("El curso sera autorizado");
        let parametros = {
            id: id
        }
        if (mensaje == true) {
            $.ajax({
                data: parametros,
                url: 'aplicacion/denegarAutorizarDocumento.php',
                type: 'post',

                success: function(response) {
                    $("#mensaje").html(response);
                    $("#tabla_resultadobus").load('cursosAutorizadosEmpleados.php');


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
<?php
while ($dataRegistro = $query->fetch()) {
    $validaacceso = $dataRegistro['rolacceso'];
    $one = 'Todos los accesos';
    $two = 'Operativo';
    $thre = 'Mando';
    if ($validaacceso == 8) {
        $acceso = $one;
    } else if ($validaacceso == 7) {
        $acceso = $two;
    } else if ($validaacceso == 4) {
        $acceso = $thre;
    }
?>
    <input type="hidden" id="id" value="<?php echo $dataRegistro['id']; ?>">
    <input type="hidden" id="nombrecurso" value="<?php echo $dataRegistro['nombrecurso']; ?>">
    <input type="hidden" id="fechatermino" value="<?php echo $dataRegistro['fechatermino']; ?>">
    <input type="hidden" id="id_empleado" value="<?php echo $dataRegistro['id_empleado']; ?>">

    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
        <div class="containerr2">Datos del curso</div>
        <tr>
            <th id="th">Id empleado:</th>
            <td id="td"><?php echo $dataRegistro['id_empleado'] ?></td>
        </tr>
        <tr>
            <th id="th">Nombre empleado:</th>
            <td id="td"><?php echo $dataRegistro['nombreempleado'] ?></td>
        </tr>
        <tr>
            <th id="th">Tipo de capacitacion:</th>
            <td id="td"><?php echo $dataRegistro['tipocapacitacion'] ?></td>
        </tr>
        <tr>
            <th id="th">Fecha de inicio del curso:</th>
            <td id="td"><?php echo $dataRegistro['fechainicio'] ?></td>
        </tr>
        <tr>
            <th id="th">Fecha de termino del curso:</th>
            <td id="td"><?php echo $dataRegistro['fechatermino'] ?></td>
        </tr>
        <tr>
            <th id="th">Modalidad:</th>
            <td id="td"><?php echo $dataRegistro['modalidad'] ?></td>
        </tr>
        <tr>
            <th id="th">Total de horas:</th>
            <td id="td"><?php echo $dataRegistro['horas'] ?></td>
        </tr>
        <tr>
            <th id="th">Documento que recibe:</th>
            <td id="td"><?php echo $dataRegistro['documentorecibe'] ?></td>
        </tr>
        <tr>
            <th id="th">Asiste como:</th>
            <td id="td"><?php echo $dataRegistro['asistecomo'] ?></td>
        </tr>
        <tr>
            <th id="th">Nombre del curso:</th>
            <td id="td"><?php echo $dataRegistro['nombrecurso'] ?></td>
        </tr>
        <tr>
            <th id="th">Nombre de la institución que lo expide:</th>
            <td id="td"><?php echo $dataRegistro['nombreinstitucion'] ?></td>
        </tr>
        <tr>
            <th id="th">Especifique cual:</th>
            <td id="td"><?php echo $dataRegistro['otroexpidedocumento'] ?></td>
        </tr>

        <tr>
            <th id="th">Documento cargado:</th>
            <?php
            $nombrecurso = $dataRegistro['nombrecurso'];
            $fechafinal = $dataRegistro['fechatermino'];
            $idempleado = $dataRegistro['id_empleado'];
            $path = "documentoscursos/" . $nombrecurso . $fechafinal . $idempleado;
            if (file_exists($path)) {
                $directorio = opendir($path);
                while ($archivo = readdir($directorio)) {
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                        echo "<td><a href='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver archivo</a></td>";
                    }
                }
            }
            ?>

        </tr>
    <?php
}
    ?>
    </table>
    <!--
    <script>
        $(document).ready(function() {
            $('#mscancer').change(function(e) {}).multipleSelect({
                width: '100%'
            });
        });
    </script>
    -->
    <?php
    //require 'conexionRh.php';
    // require 'modals/buscarpostuladobolsa.php';
    /*$prod = $conexionGrafico->query("SELECT * FROM personaloperativo2023 WHERE eliminado = 0 ");
    if ($prod->num_rows > 0) {
        echo "<select name='mscancer[]' id='mscancer' class='form-control' multiple='multiple' data-placeholder='SELECCIONE TAREAS' >";
        while ($row = $prod->fetch_array()) {
            echo '<option ' . ((in_array(strtolower(mb_convert_encoding($row['id_empleado'], 'ISO-8859-1', 'UTF-8')), $tareas)) ? "selected" : "") . ' value="' . $row['id_empleado'] . '">' . strtoupper(mb_convert_encoding($row['nombre'] . ' ' . $row['apellidopaterno'] . ' ' . $row['apellidomaterno'], 'ISO-8859-1', 'UTF-8')) . '</option>';
        }
        echo '</select>';
    }*/
    ?>
