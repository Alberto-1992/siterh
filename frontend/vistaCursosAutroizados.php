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
        let year = $("#year").val();
        let programa = $("#programa").val();
        let lineaestrategica2 = $("#lineaestrategica").val();
        let competencia = $("#competencia").val();
        let id_empleado = $("#id_empleado").val();
        let nombreaeliminar = $("#nombreaeliminar").val();
        
        var mensaje = confirm("La autorización sera eliminada");
        let parametros = {
            id: id, year:year, programa:programa, lineaestrategica2:lineaestrategica2, competencia:competencia, id_empleado:id_empleado, nombreaeliminar:nombreaeliminar
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

    <input type="hidden" id="year" value="<?php echo $dataRegistro['anio']; ?>">
    <input type="hidden" id="programa" value="<?php echo $dataRegistro['catalogoprograma']; ?>">
    <input type="hidden" id="lineaestrategica" value="<?php echo $dataRegistro['lineaestrategica']; ?>">
    <input type="hidden" id="competencia" value="<?php echo $dataRegistro['competenciaalieandaeje']; ?>">

    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
        <div class="containerr2">Datos del curso</div>
    <tr>
        <th id="th">Año:</th>
        <td id="td"><?php echo $dataRegistro['anio'] ?></td>
    </tr>
    <tr>
        <th id="th">Programa:</th>
        <td id="td"><?php echo $dataRegistro['catalogoprograma'] ?></td>
    </tr>
    <tr>
        <th id="th">Linea estrategica:</th>
        <td id="td"><?php echo $dataRegistro['lineaestrategica'] ?></td>
    </tr>
    <tr>
        <th id="th">Competencia:</th>
        <td id="td"><?php echo $dataRegistro['competenciaalieandaeje'] ?></td>
    </tr>
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
        <th id="th">Calificación:</th>
        <td id="td"><?php echo $dataRegistro['calificacion'] ?></td>
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
        <td id="td" style="color: red;"><?php echo $dataRegistro['nombrecurso'] ?></td>
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
        <th id="th">¿El curso pertenece a alguno de los siguientes temas?:</th>
        <td id="td"><?php echo $dataRegistro['criteriocurso'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha vigencia inicio:</th>
        <td id="td"><?php echo $dataRegistro['fechacriterioinicio'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha vigencia final:</th>
        <td id="td"><?php echo $dataRegistro['fechacriteriotermino'] ?></td>
    </tr>
        </table>
        <br>
        
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
                        echo "<iframe src='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' width='100%' height='100%' margin-top='50'></iframe>";
                        echo "<td><a href='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver archivo</a></td>";
                    }
                }
            }
            ?>
<div class="col-md-3">
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
                echo "<input type='hidden' class='form-control' name='' value='documentoscursos/$nombrecurso$fechafinal$idempleado'>";
                echo "<input type='hidden' class='form-control' name='nombreaeliminar' id='nombreaeliminar' value='$idempleado$archivo'>";
            }
        }
    }
    ?>
</div>
    <?php
}
    ?>
    <br>
    
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
