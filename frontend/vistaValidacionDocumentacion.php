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
<input type="hidden" id="tipocapacitacion" value="<?php echo $dataRegistro['tipocapacitacion']  ?>">
<ul class="nav nav-tabs" style="margin-top: 0px;">
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
    function editarRegistro() {
        var id = $("#id").val();

        let parametros = {
            id: id
        }
        $.ajax({
            type: "POST",
            url: "editarCursoValidacion.php",
            data: parametros,
            beforeSend: function() {
                $('#tabla_resultado').html(
                    '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                );
            },
            success: function(data) {
                $("#tabla_resultado").html(data);
            }

        });

    }

    function eliminarRegistro() {
        var id = $("#id").val();
        var nombrecurso = $("#nombrecurso").val();
        var fechatermino = $("#fechatermino").val();
        var id_empleado = $("#id_empleado").val();
        var tipocapacitacion = $("#tipocapacitacion").val();
        var mensaje = confirm("el registro se eliminara");
        let parametros = {
            id: id,
            nombrecurso: nombrecurso,
            fechatermino: fechatermino,
            id_empleado: id_empleado,
            tipocapacitacion: tipocapacitacion
        }
        if (mensaje == true) {
            $.ajax({
                data: parametros,
                url: 'aplicacion/eliminarCursoCargadoOperativo.php',
                type: 'post',
                
                success: function(data) {
                    $("#mensaje").html(data);
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
if ($validaacceso == 8) {
    $acceso = $one;
} else if ($validaacceso == 7) {
    $acceso = $two;
} else if ($validaacceso == 4) {
    $acceso = $thre;
}
$fechainicio = $dataRegistro['fechainicio'];
$fechatermino = $dataRegistro['fechatermino'];
$fechainicionew = date("d-m-Y", strtotime($fechainicio));
$fechaterminonew = date("d-m-Y", strtotime($fechatermino));
?>
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
        <td id="td"><?php echo $fechainicionew; ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino del curso:</th>
        <td id="td"><?php echo $fechaterminonew; ?></td>
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
<form id="autorizacion" name="autorizacion">
    <script>
        $("#autorizacion").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("autorizacion"));
                    formData.append("dato", "valor");
                    var mensaje = confirm("El curso sera autorizado");
                    if (mensaje == true) {
                    $.ajax({
                        url: "aplicacion/autorizarDocumento.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(objeto) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(data) {
                            $("#mensaje").html(data);
                            //$("#tabla_resultadobus").load('consultaValidacionDocumentos.php');
                            let evento = $("#busqueda").val();
                            let ob = {
                            evento: evento
                        };
                    $.ajax({
                            type: "POST",
                url: "consultaValidacionDocumentos.php",
                data: ob,
                beforeSend: function() {
                    $('#mensaje').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                        );
                    },
                success: function(data) {

                    $("#tabla_resultadobus").html(data);

                }

            });
                            

                        }
                    })
                } else {
            swal({
                title: 'Cancelado!',
                text: 'Proceso cancelado',
                icon: 'warning',

            });
        }
    })

    $(function() {
        $('#comporganizacionales').prop("hidden", true);
        $('#compdirectivas').prop("hidden", true);
        $('#computo').prop("hidden", true);
        $("#tecnicasgenerales").prop("hidden", true);
        $("#tecnicasgeneralesmando").prop("hidden", true);
        $("#muec").prop("hidden", true);
        $("#derechoshumanos").prop("hidden", true);
        $("#compespecializadas").prop("hidden", true);


        //eliminar valor por defecto
        $("#organizacionales").prop("selectedIndex", 0);
        $("#competenciasdirectivas").prop("selectedIndex", 0);
        $("#herramientascomputo").prop("selectedIndex", 0);
        $("#comptecnicasgenerales").prop("selectedIndex", 0);
        $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
        $("#mueccomp").prop("selectedIndex", 0);
        $("#cursoderechoshumanos").prop("selectedIndex", 0);
        $("#competenciasespecializadas").prop("selectedIndex", 0);


    })
    $(document).ready(function() {

        $('#lineaestrategica').change(function(e) {
            if ($(this).val() === "COMPETENCIAS ORGANIZACIONALES") {
                $('#comporganizacionales').prop("hidden", false);
                $('#compdirectivas').prop("hidden", true);
                $('#computo').prop("hidden", true);
                $("#cognitivas").prop("hidden", true);
                $("#eticaprofesional").prop("hidden", true);
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", true);
                $("#derechoshumanos").prop("hidden", true);
                $("#compespecializadas").prop("hidden", true);

                $("#competenciasdirectivas").prop("selectedIndex", 0);
                $("#herramientascomputo").prop("selectedIndex", 0);
                $("#basicascognitivas").prop("selectedIndex", 0);
                $("#profesionaletica").prop("selectedIndex", 0);
                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#mueccomp").prop("selectedIndex", 0);
                $("#cursoderechoshumanos").prop("selectedIndex", 0);
                $("#competenciasespecializadas").prop("selectedIndex", 0);


            } else if ($(this).val() === "COMPETENCIAS DIRECTIVAS") {
                $('#compdirectivas').prop("hidden", false);

                $('#comporganizacionales').prop("hidden", true);
                $('#computo').prop("hidden", true);
                $("#cognitivas").prop("hidden", true);
                $("#eticaprofesional").prop("hidden", true);
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", true);
                $("#derechoshumanos").prop("hidden", true);
                $("#compespecializadas").prop("hidden", true);

                $("#organizacionales").prop("selectedIndex", 0);
                $("#herramientascomputo").prop("selectedIndex", 0);
                $("#basicascognitivas").prop("selectedIndex", 0);
                $("#profesionaletica").prop("selectedIndex", 0);
                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#mueccomp").prop("selectedIndex", 0);
                $("#cursoderechoshumanos").prop("selectedIndex", 0);
                $("#competenciasespecializadas").prop("selectedIndex", 0);

            } else if ($(this).val() === "COMPETENCIAS TECNICAS GENERALES") {
                $('#comporganizacionales').prop("hidden", true);
                $('#compdirectivas').prop("hidden", true);
                $('#computo').prop("hidden", false);
                $("#cognitivas").prop("hidden", false);
                $("#eticaprofesional").prop("hidden", false);
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", true);
                $("#derechoshumanos").prop("hidden", true);
                $("#compespecializadas").prop("hidden", true);

                $("#organizacionales").prop("selectedIndex", 0);
                $("#competenciasdirectivas").prop("selectedIndex", 0);

                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#mueccomp").prop("selectedIndex", 0);
                $("#cursoderechoshumanos").prop("selectedIndex", 0);
                $("#competenciasespecializadas").prop("selectedIndex", 0);
            
            } else if ($(this).val() === "COMPETENCIAS TECNICAS GENERALES-MUEC") {
                $('#comporganizacionales').prop("hidden", true);
                $('#compdirectivas').prop("hidden", true);
                $('#computo').prop("hidden", true);
                $("#cognitivas").prop("hidden", true);
                $("#eticaprofesional").prop("hidden", true);
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", false);
                $("#derechoshumanos").prop("hidden", true);
                $("#compespecializadas").prop("hidden", true);
                $("#organizacionales").prop("selectedIndex", 0);
                $("#competenciasdirectivas").prop("selectedIndex", 0);
                $("#herramientascomputo").prop("selectedIndex", 0);
                $("#basicascognitivas").prop("selectedIndex", 0);
                $("#profesionaletica").prop("selectedIndex", 0);
                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#cursoderechoshumanos").prop("selectedIndex", 0);
                $("#competenciasespecializadas").prop("selectedIndex", 0);
            } else if ($(this).val() === "COMPETENCIAS ETICO INTEGRATIVAS Y NORMATIVA DEL SP") {
                $('#comporganizacionales').prop("hidden", true);
                $('#compdirectivas').prop("hidden", true);
                $('#computo').prop("hidden", true);
                
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", true);
                $("#derechoshumanos").prop("hidden", false);
                $("#compespecializadas").prop("hidden", true);
                $("#organizacionales").prop("selectedIndex", 0);
                $("#competenciasdirectivas").prop("selectedIndex", 0);
                $("#herramientascomputo").prop("selectedIndex", 0);
                
                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#mueccomp").prop("selectedIndex", 0);
                $("#competenciasespecializadas").prop("selectedIndex", 0);
            } else if ($(this).val() === "COMPETENCIAS ESPECIALIZADAS") {
                $('#comporganizacionales').prop("hidden", true);
                $('#compdirectivas').prop("hidden", true);
                $('#computo').prop("hidden", true);
                
                $("#tecnicasgenerales").prop("hidden", true);
                $("#tecnicasgeneralesmando").prop("hidden", true);
                $("#muec").prop("hidden", true);
                $("#derechoshumanos").prop("hidden", true);
                $("#compespecializadas").prop("hidden", false);
                $("#organizacionales").prop("selectedIndex", 0);
                $("#competenciasdirectivas").prop("selectedIndex", 0);
                $("#herramientascomputo").prop("selectedIndex", 0);
                
                $("#comptecnicasgenerales").prop("selectedIndex", 0);
                $("#comptecnicasgeneralesmando").prop("selectedIndex", 0);
                $("#mueccomp").prop("selectedIndex", 0);
                $("#cursoderechoshumanos").prop("selectedIndex", 0);
            }
        })
    });

</script>
<?php
$nombrecurso = $dataRegistro['nombrecurso'];
    $fechafinal = $dataRegistro['fechatermino'];
    $idempleado = $dataRegistro['id_empleado'];
    $path = $nombrecurso.$fechafinal.$idempleado;
    ?>
<input type="hidden" id="id" name="id" value="<?php echo $dataRegistro['id']; ?>">
<input type="hidden" value="<?php echo $path ?>" name="path">
<input type="hidden" value="<?php echo $nombrecurso ?>" name="nombrecurso">
<input type="hidden" value="<?php echo $idempleado ?>" name="id_empleado" id="id_empleado">

<div class="form-row">
    <div style="width: 100%; height: auto; display: flex; align-items: center; justify-content:center;">
    <div class="col-md-2">
            <strong style="font-size: 12px;">Año</strong>
            <select class="form-control" name="year" id="year" required>
                <option value="">Selecciona el año</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
    <div class="col-md-3">
            <strong style="font-size: 12px;">Catalogo de programas</strong>
            <select class="form-control" id="catalogoprogramas" name="catalogoprogramas" required>
                <option value="">Seleccione</option>
                <option value="PROGRAMA CAPACITACION ADMINISTRATIVO GERENCIAL PAC MIR">PROGRAMA ANUAL DE CAPACITACION ADMINISTRATIVO GERENCIAL (PAC/MIR)</option>
                <option value="MODELO UNICO DE EVALUACION DE LA CALIDAD MUEC">MÓDELO UNICO DE EVALUACIÓN DE LA CALIDAD(MUEC)</option>
                <option value="PERMISO ADMINISTRATIVO BECA TIEMPO MENOR A 30 DIAS SRH">PERMISO ADMINISTRATIVO-BECA TIEMPO MENOR A 30 DIAS/SRH</option>
                <option value="PROGRAMA DE EDUCACION CONTINUA">PROGRAMA DE EDUCACION CONTINUA</option>
                <option value="INDIVIDUAL">INDIVIDUAL</option>
                </select>
        </div>
        <div class="col-md-3">
            <strong style="font-size: 12px;">Linea estrategica</strong>
            <select class="form-control" id="lineaestrategica" name="lineaestrategica" required>
                <option value="">Seleccione</option>
                <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $query = $conexionX->prepare("SELECT * FROM lineaestrategica ");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['descripcionlinea']; ?>">
                                <?php echo $row['descripcionlinea']; ?></option>
                        <?php } ?>
                </select>
        </div>
    </div>
    <div style="width: 100%; height: auto; display: flex; align-items: center; justify-content:center; margin-top: 5px;">
        <div id="comporganizacionales">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS ORGANIZACIONALES</strong>
                <select class="form-control" id="organizacionales" name="organizacionales">
                    <option value="">Seleccione</option>
                    <option value="TRABAJO EN EQUIPO">TRABAJO EN EQUIPO</option>
                    <option value="ORIENTACION A RESULTADOS">ORIENTACION A RESULTADOS</option>
                    <option value="COMUNICACION">COMUNICACION</option>
                </select>
            </div>
        </div>
        <div id="compdirectivas">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS DIRECTIVAS</strong>
                <select class="form-control" id="directivas" name="directivas">
                    <option value="">Seleccione</option>
                    <option value="VISION ESTRATEGICA">VISION ESTRATEGICA</option>
                    <option value="LIDERAZGO">LIDERAZGO</option>
                    <option value="NEGOCIACION">NEGOCIACION</option>
                </select>
            </div>
        </div>
        <div id="computo">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIA</strong>
                <select class="form-control" id="competencias" name="competencias">
                    <option value="">Seleccione</option>
                    <option value="HERRAMIENTAS DE COMPUTO">HERRAMIENTAS DE COMPUTO</option>
                    <option value="BÁSICAS COGNOSCITIVAS">BÁSICAS/COGNOSCITIVAS</option>
                    <option value="BÁSICAS EFICACIA PERSONAL">BÁSICAS/EFICACIA PERSONAL</option>
                    <option value="ADMINISTRACION DE HOSPITALES">ADMINISTRACION DE HOSPITALES</option>
                    <option value="GESTION DE MANDO INSTITUCIONAL">GESTION DE MANDO INSTITUCIONAL</option>
                </select>
            </div>
        </div>
        <div id="tecnicasgenerales">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS TECNICAS GENERALES-ADMINISTRACION DE HOSPITALES</strong>
                <select class="form-control" id="tecnicas" name="tecnicas">
                    <option value="">Seleccione</option>
                    <option value="ADMINISTRACION DE HOSPITALES">ADMINISTRACION DE HOSPITALES</option>
                </select>
            </div>
        </div>
        <div id="tecnicasgeneralesmando">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS TECNICAS GENERALES-GESTION DE MANDO INSTITUCIONAL</strong>
                <select class="form-control" id="tecnicasmando" name="tecnicasmando">
                    <option value="">Seleccione</option>
                    <option value="GESTION DE PROCESOS">GESTION DE PROCESOS</option>
                    <option value="PLANEACION ESTRATEGICA">PLANEACION ESTRATEGICA</option>
                    <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                    <option value="MEDICION Y MEJORA CONTINUA DE PROCESOS">MEDICION Y MEJORA CONTINUA DE PROCESOS</option>
                </select>
            </div>
        </div>
        <div id="muec">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS TECNICAS GENERALES-GESTION DE MANDO INSTITUCIONAL</strong>
                <select class="form-control" id="tecnicasmuec" name="tecnicasmuec">
                    <option value="">Seleccione</option>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $query = $conexionX->prepare("SELECT * FROM muec ");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['descripcionmuec']; ?>">
                                <?php echo $row['descripcionmuec']; ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div id="derechoshumanos">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS ETICO INTEGRATIVAS Y NORMATIVA DEL SP</strong>
                <select class="form-control" id="competenciasintegrativas" name="competenciasintegrativas">
                    <option value="">Seleccione</option>
                    <option value="TEMATICAS VINCULADAS A LA ADMINISTRACION PUBLICA">TEMATICAS VINCULADAS A LA ADMINISTRACION PUBLICA</option>
                    <option value="DERECHOS HUMANOS">DERECHOS HUMANOS</option>
                    <option value="IGUALDAD Y NO DISCRIMINACION">IGUALDAD Y NO DISCRIMINACION</option>
                    <option value="TRANSPARENCIA Y PROTECCION DE DATOS PERSONALES">TRANSPARENCIA Y PROTECCION DE DATOS PERSONALES</option>
                    <option value="ETICA Y PREVENCION DE CONFLICTOS DE INTERES">ETICA Y PREVENCION DE CONFLICTOS DE INTERES</option>
                    <option value="TRATA DE PERSONAS">TRATA DE PERSONAS</option>
                    <option value="ATENCION A VICTIMAS">ATENCION A VICTIMAS</option>
                    <option value="DERECHOS GENERALES DE LAS NIÑAS, LOS NIÑOS Y LOS ADOLESCENTES">DERECHOS GENERALES DE LAS NIÑAS, LOS NIÑOS Y LOS ADOLESCENTES</option>
                </select>
            </div>
        </div>
        <div id="compespecializadas">
            <div class="col-md-12">
                <strong style="font-size: 12px;">COMPETENCIAS ESPECIALIZADAS</strong>
                <select class="form-control" id="competenciasespecializadas" name="competenciasespecializadas">
                    <option value="">Seleccione</option>
                    <option value="ACTUALIZACION ADMINISTRATIVA">ACTUALIZACION ADMINISTRATIVA</option>
                    <option value="ACTUALIZACION GERENCIAL">ACTUALIZACION GERENCIAL</option>
                    <option value="ACTUALIZACION TECNICO MEDICO">ACTUALIZACION TECNICO MEDICO</option>
                    <option value="ACTUALIZACION NORMATIVA">ACTUALIZACION NORMATIVA</option>
                    <option value="DESARROLLO PROFESIONAL">DESARROLLO PROFESIONAL</option>
                </select>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: auto; display: flex; align-items: center; justify-content:center">
        <div class="col-md-2">
            <input type="submit" value="Autorizar" class="form-control" style="background-color: green; color: white; margin-top: 17px;">
        </div>
    </div>
</div>
</form>
<br>

<div style="width: 100%; height: 100%;">
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
                echo "<a href='documentoscursos/$nombrecurso$fechafinal$idempleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento cargado</a>";
            }
        }
    }
    ?>
</div>
<div style="width: 100%; height: 100%; margin-top: 40px;">
<div class="accordion" id="accordionExample" >
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Archivos 2023
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <form id="actualizarExpediente" name="actualizarExpediente" enctype="multipart/form-data"> 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
                            <?php
                            
                            obtener_estructura_directorios("2023/");
                            function obtener_estructura_directorios($ruta)
                            {
                                if (is_dir($ruta)) {
                                    // Abre un gestor de directorios para la ruta indicada
                                    $gestor = opendir($ruta);
                                    
                                    echo "<ul>";

                                    // Recorre todos los elementos del directorio
                                    while (($archivo = readdir($gestor)) !== false) {

                                        $ruta_completa = $ruta . "/" . $archivo;

                                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                                        if ($archivo != "." && $archivo != "..") {
                                            // Si es un directorio se recorre recursivamente
                                            if (is_dir($ruta_completa)) {
                                            
                                                echo "<li>" . $archivo . "</li>";
                                                obtener_estructura_directorios($ruta_completa);
                                                $path = $ruta_completa;
                                                if (file_exists($path)) {
                                                    $directorio = opendir($path);
                                                    while ($archivos = readdir($directorio)) {
                                                        if (!is_dir($archivos)) {
                                                            
                                                              //echo "<iframe src='$ruta_completa/$archivos' class='form-control' style='height: 300px;'></iframe>";
                                                                echo "<div data='" . $path . "/" . $archivos . "' class='form-control'><a href='" . $path . "/" . $archivos . "' target='_blank' >$archivos</a></div><br>";
                                                                
                                                        }
                                                    }
                                                

                                                }
                                            }
                                        }
                                    }



                                    // Cierra el gestor de directorios
                                    closedir($gestor);
                                    echo "</ul>";
                                
                                } else {
                                    echo "No es una ruta de directorio valida<br/>";
                                }
                                
                            }
                            
                            ?>

                        
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
                        Archivos 2022
                    </button>
                </h2>
                <div id="collapseDos" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <form id="actualizarExpediente" name="actualizarExpediente" enctype="multipart/form-data"> 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
                            <?php
                            
                            obtener_estructura_directorios2("2022/");
                            function obtener_estructura_directorios2($ruta)
                            {
                                if (is_dir($ruta)) {
                                    // Abre un gestor de directorios para la ruta indicada
                                    $gestor = opendir($ruta);
                                    
                                    echo "<ul>";

                                    // Recorre todos los elementos del directorio
                                    while (($archivo = readdir($gestor)) !== false) {

                                        $ruta_completa = $ruta . "/" . $archivo;

                                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                                        if ($archivo != "." && $archivo != "..") {
                                            // Si es un directorio se recorre recursivamente
                                            if (is_dir($ruta_completa)) {
                                            
                                                echo "<li>" . $archivo . "</li>";
                                                obtener_estructura_directorios2($ruta_completa);
                                                $path = $ruta_completa;
                                                if (file_exists($path)) {
                                                    $directorio = opendir($path);
                                                    while ($archivos = readdir($directorio)) {
                                                        if (!is_dir($archivos)) {
                                                            
                                                              //echo "<iframe src='$ruta_completa/$archivos' class='form-control' style='height: 300px;'></iframe>";
                                                                echo "<div data='" . $path . "/" . $archivos . "' class='form-control'><a href='" . $path . "/" . $archivos . "' target='_blank' >$archivos</a></div><br>";
                                                                
                                                        }
                                                    }
                                                

                                                }
                                            }
                                        }
                                    }



                                    // Cierra el gestor de directorios
                                    closedir($gestor);
                                    echo "</ul>";
                                
                                } else {
                                    echo "No es una ruta de directorio valida<br/>";
                                }
                                
                            }
                            
                            ?>

                        
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTres" aria-expanded="true" aria-controls="collapseTres">
                        Archivos 2022
                    </button>
                </h2>
                <div id="collapseTres" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <form id="actualizarExpediente" name="actualizarExpediente" enctype="multipart/form-data"> 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
                            <?php
                            
                            obtener_estructura_directorios3("2021/");
                            function obtener_estructura_directorios3($ruta)
                            {
                                if (is_dir($ruta)) {
                                    // Abre un gestor de directorios para la ruta indicada
                                    $gestor = opendir($ruta);
                                    
                                    echo "<ul>";

                                    // Recorre todos los elementos del directorio
                                    while (($archivo = readdir($gestor)) !== false) {

                                        $ruta_completa = $ruta . "/" . $archivo;

                                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                                        if ($archivo != "." && $archivo != "..") {
                                            // Si es un directorio se recorre recursivamente
                                            if (is_dir($ruta_completa)) {
                                            
                                                echo "<li>" . $archivo . "</li>";
                                                obtener_estructura_directorios3($ruta_completa);
                                                $path = $ruta_completa;
                                                if (file_exists($path)) {
                                                    $directorio = opendir($path);
                                                    while ($archivos = readdir($directorio)) {
                                                        if (!is_dir($archivos)) {
                                                            
                                                              //echo "<iframe src='$ruta_completa/$archivos' class='form-control' style='height: 300px;'></iframe>";
                                                                echo "<div data='" . $path . "/" . $archivos . "' class='form-control'><a href='" . $path . "/" . $archivos . "' target='_blank' >$archivos</a></div><br>";
                                                                
                                                        }
                                                    }
                                                

                                                }
                                            }
                                        }
                                    }



                                    // Cierra el gestor de directorios
                                    closedir($gestor);
                                    echo "</ul>";
                                
                                } else {
                                    echo "No es una ruta de directorio valida<br/>";
                                }
                                
                            }
                            
                            ?>

                        
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
// require 'modals/buscarpostuladobolsa.php';

?>
