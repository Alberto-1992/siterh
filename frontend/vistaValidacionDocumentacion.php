<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

require 'conexionRh.php';
?>

<div id="mensaje"></div>
<input type="hidden" id="id" value="<?php echo $dataRegistro['id']; ?>">
<input type="hidden" id="nombrecurso" value="<?php echo $dataRegistro['nombrecurso']; ?>">
<input type="hidden" id="fechatermino" value="<?php echo $dataRegistro['fechatermino']; ?>">
<input type="hidden" id="id_empleado" value="<?php echo $dataRegistro['id_empleado']; ?>">
<ul class="nav nav-tabs" style="margin-top: 47px;" >       
            <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: red;">Acciones</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="eliminarRegistro();">Eliminar registro</a></li>
                <li><a class="dropdown-item" href="#" onclick="editarRegistro();">Editar registro</a></li>
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
    let parametros = { id: id,nombrecurso:nombrecurso,fechatermino:fechatermino,id_empleado:id_empleado }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarCursoCargadoOperativo.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaValidacionDocumentos.php');
                

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
function autorizar() {
    var id = $("#id").val();
    var lineaestrategica = $("#linea").val();
    var mensaje = confirm("El curso sera autorizado"); 
    let parametros = { id: id, lineaestrategica:lineaestrategica }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/autorizarDocumento.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaValidacionDocumentos.php');
                

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
$validaacceso = $dataRegistro['rolacceso'];
$one = 'Todos los accesos';
$two = 'Operativo';
$thre = 'Mando';
if($validaacceso == 8){
    $acceso = $one;
}else if($validaacceso == 7){
    $acceso = $two;
}
else if($validaacceso == 4){
    $acceso = $thre;
}
    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
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
        <td id="td"><?php echo $dataRegistro['fechainicio']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino del curso:</th>
        <td id="td"><?php echo $dataRegistro['fechatermino']?></td>
    </tr>
    <tr>
        <th id="th">Modalidad:</th>
        <td id="td"><?php echo $dataRegistro['modalidad']?></td>
    </tr>
    <tr>
        <th id="th">Total de horas:</th>
        <td id="td"><?php echo $dataRegistro['horas']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php echo $dataRegistro['documentorecibe']?></td>
    </tr>
    <tr>
        <th id="th">Asiste como:</th>
        <td id="td"><?php echo $dataRegistro['asistecomo']?></td>
    </tr>
    <tr>
        <th id="th">Nombre del curso:</th>
        <td id="td"><?php echo $dataRegistro['nombrecurso']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución que lo expide:</th>
        <td id="td"><?php echo $dataRegistro['nombreinstitucion']?></td>
    </tr>
    <tr>
        <th id="th">Especifique cual:</th>
        <td id="td"><?php echo $dataRegistro['otroexpidedocumento']?></td>
    </tr>

</table>
<div class="form-row">
<div class="col-md-3">
    <strong>Linea estrategica</strong>
<select class="form-control" id="linea" name="lineaestrategica">
    <option value="">Seleccione</option>
    <option value="ACTUALIZACION NORMATIVA">Actualización normativa</option>
    <option value="FORTALECIMIENTO DE COMPETENCIAS GERENCIALES">Fortalecimiento de competencias gerenciales</option>
    <option value="FORTALECIMIENTO DE COMPETENCIAS TECNICO - ADMINISTRATIVAS">Frotalecimiento de competencias tecnico - Aadministrativas</option>
    <option value="CURSOS VINCULADOS CON DERECHOS HUMANOS, IGUALDAD Y NO DISCRIMINACIÓN, TRANSPARENCIA, ÉTICA Y PREVENCIÓN DE CONFLICTOS DE INTERÉS">Cursos vinculados con derechos humanos, Igualdad y no discriminación, Transparencia, Ética y Prevención de conflisctos de interes</option>
    <option value="FORTALECIMIENTO DE COMPETENCIAS ESPECIALIZADAS">FORTALECIMIENTO DE COMPETENCIAS ESPECIALIZADAS</option>
</select>
</div>
<div class="col-md-3">
    <strong>Selecciona el eje</strong>
<select class="form-control" id="linea">
    <option value="linea uno">Linea uno</option>
</select>
</div>
<div class="col-md-1">
    <input type="submit" onclick="autorizar();" value="Autorizar" class="form-control" style="background-color: green; color: white; margin-top: 17px;">
</div>
</div>
<div class="container" style="width: 830px; height: 700px; float: left;">
<?php
$nombrecurso = $dataRegistro['nombrecurso'];
$fechafinal = $dataRegistro['fechatermino'];
$idempleado = $dataRegistro['id_empleado'];
$path = "documentoscursos/".$nombrecurso.$fechafinal.$idempleado;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' width='790' height='700' margin-top='50'></iframe>";
            echo "<a href='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento cargado</a>";
        }
    }
}
?>
    
</div>
<?php
   // require 'modals/buscarpostuladobolsa.php';

?>