<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Carga de informacion de cursos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenu.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<script>
    function limpiar() {

        setTimeout('document.frmNotification.reset()', 1000);

        return false;
    }
</script>

<body style="padding: 0px; overflow-y:scroll;">
    <header class="headerinfarto" style="background-color: #874AA2;">

        <span id="cabecera">Plan individual de capacitación.</span>

    </header>
    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Carga de información.</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Te informamos, una vez que hayas cargado tu información, no la podras visualizar hasta que el area de capacitación haya validado los datos, si la información que capturaste es correcta podras visualizarla debajo del formulario</h1><br>
        <strong style="text-align: center; font-size: 17px; color: black; font-style: bold;">ESTIMADO USUARIO, SI LA INFORMACIÓN QUE VAS A CARGAR PERTENECE A UN DIPLOMADO, FAVOR DE CARGARLO EN EL APARTADO DE DATOS ACADEMICOS.</strong>&nbsp;&nbsp;<a href="datosAcademicos">Ir a datos academicos</a>
        <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 10px; text-align:center;">
        </div>

        <form name="frmNotification" id="frmNotification" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#frmNotification").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("frmNotification"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "notificaciones/agregarnotificacionEmpleado.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(datos) {
                            $("#mensaje").html(datos);
                        }
                    })
                })
            </script>
            <div class="form-row">
                <?php
                error_reporting(0);
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                switch (true) {

                    case isset($_SESSION['usuarioAdminRh']):
                        $nombreempleado = $nombre;
                        break;

                    case isset($_SESSION['usuarioJefe']):
                        $nombreempleado = $nombre;
                        break;

                    case isset($_SESSION['usuarioDatos']):
                        $nombreempleado = $nombre;
                        break;

                    default:

                        require 'close_sesion.php';
                }

                ?>

                <input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                <div class="col-md-6">
                    <label for="mensaje">Nombre:</label>
                    <input type="text" class="form-control" name="nombreempleado" id="nombreempleado" placeholder="Nombre" required value="<?php echo $nombreempleado ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Tipo de capacitación:</label>
                    <select class="form-control" name="tipodecapacitacion" id="tipodecapacitacion" required onchange="tipoCapacitacion();">
                        <option value="Sin dato">Seleccione</option>
                        <?php

                        $query = $conexionX->prepare("SELECT * FROM catalogocapacitacion where activo = 0 order by descripcionaccion");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['id_tipodeaccion']; ?>">
                                <?php echo $row['descripcionaccion']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <script>
                    function tipoCapacitacion() {
                        let valor = $("#tipodecapacitacion").val();
                        $('#areafortalece').val(valor)

                    }
                    $(function() {
                        $('#fechainiciocriterio').prop("disabled", true);
                        $('#fechaterminocriterio').prop("disabled", true);

                    })
                    //clasificacion tamaños tumorales
                    $(document).ready(function() {

                        $('#criteriocurso').change(function(e) {
                            if ($(this).val() === "ATLS-APOYO VITAL AVANZADO EN TRAUMA" || $(this).val() === "ACLS-SOPORTE VITAL CARDIOVASCULAR AVANZADO" || $(this).val() === "BLS-SOPORTE VITAL BASICO" || $(this).val() === "PALS-APOYO VITAL AVANZADO PEDIATRICO" || $(this).val() === "RCP-REANIMACION CARDIOPULMONAR PARA PROFESIONALES DE LA SALUD" || $(this).val() === "INTERCULTURALIDAD") {

                                $('#fechainiciocriterio').prop("disabled", false);
                                $('#fechaterminocriterio').prop("disabled", false);

                            } else {
                                $('#fechainiciocriterio').prop("disabled", true);
                                $('#fechaterminocriterio').prop("disabled", true);
                                $('#fechainiciocriterio').val('');
                                $('#fechaterminocriterio').val('');

                            }
                        })
                    });
                    function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
                </script>

                <input type="hidden" class="form-control" name="areafortalece" id="areafortalece" required readonly>

                <div class="col-md-6">
                    <label for="mensaje">Nombre del curso:</label>
                    <input type="text" class="form-control" name="nombrecurso" id="nombrecurso" placeholder="Max 100 caracteres, no se permiten caracteres especiales como'.,:-_?'" required maxlength="100" onkeypress="return check(event)">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de inicio del curso:</label>
                    <input type="date" class="form-control" name="fechainicio" id="fechainicio" required>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de termino del curso:</label>
                    <input type="date" class="form-control" name="fechatermino" id="fechatermino" required>
                </div>
                <div class="col-md-6">
                    <strong>¿El curso pertenece a alguno de los siguientes temas?</strong>
                    <select type="form-select" class="form-control" name="criteriocurso" id="criteriocurso" required>
                        <option value="" disabled>Seleccione</option>
                        <?php

                        $query = $conexionX->prepare("SELECT * FROM muec ");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['descripcionmuec']; ?>">
                                <?php echo $row['descripcionmuec']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-md-3">
                    <strong for="mensaje">Fecha vigencia inicio:</strong>
                    <input type="date" class="form-control" name="fechainiciocriterio" id="fechainiciocriterio">
                </div>
                <div class="col-md-3">
                    <strong for="mensaje">Fecha vigencia final:</strong>
                    <input type="date" class="form-control" name="fechaterminocriterio" id="fechaterminocriterio">
                </div>
                <div class="col-md-2">
                    <label>Modalidad</label>
                    <select type="form-select" class="form-control" name="modalidad" id="modalidad" required>
                        <option selected disabled value="">Seleccione</option>

                        <?php
                        $query = $conexionX->prepare("SELECT * FROM modalidad");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores) :
                            echo '<option value="' . $valores["nombre_modalidad"] . '">' . $valores["nombre_modalidad"] . '</option>';
                        endforeach;

                        ?>

                    </select>
                </div>
                <div class="col-md-2">
                    <label for="mensaje">Total de horas:</label>
                    <input type="number" class="form-control" name="horas" id="horas" required>
                </div>
                <div class="col-md-2">
                    <label for="mensaje">Calificación:</label>
                    <input type="number" step="any" class="form-control" name="calificacion" id="calificacion">
                </div>

                <div class="col-md-3">
                    <label for="mensaje">Documento que recibe:</label>
                    <select class="form-control" name="documentorecibe" id="documentorecibe" required>
                        <option value="Sin dato">Seleccione</option>
                        <option value="Constancia">Constancia</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Reconocimiento">Reconocimiento</option>
                        <option value="Certificado">Certificado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Asiste como:</label>
                    <select class="form-control" name="asistecomo" id="asistecomo" required>
                        <option value="Sin dato">Seleccione</option>
                        <option value="Participante">Participante</option>
                        <option value="Ponente">Ponente</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Profesor titular">Profesor titular</option>
                        <option value="Profesor adjunto">Profesor adjunto</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#nombreinstitucion').change(function(e) {
                            if ($(this).val() === "OTRO") {

                                $('#otrodocumento').prop("hidden", false);

                            } else {
                                $('#otrodocumento').prop("hidden", true);
                                $('#otroexpidedocumento').val('');

                            }
                        })
                    });
                    $(function() {
                        $('#otrodocumento').prop("hidden", true);

                    })
                </script>
                <div class="col-md-9">
                    <label for="autor">Nombre la institución que lo expide:</label>
                    <select class="form-control" name="nombreinstitucion" id="nombreinstitucion" placeholder="Institución" required>
                        <option value="Seleccione">Seleccione</option>
                        <option value="HRAEI">HRAEI</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="mensaje">Sube tu documento:</label>
                    <input type="file" class="form-control" name="documentocurso" id="documentocurso" required accept=".pdf">
                </div>
                <div class="col-md-12" id="otrodocumento">
                    <strong>Especifique cual:</strong>
                    <input type="text" class="form-control" name="otroexpidedocumento" id="otroexpidedocumento">
                </div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                    <a href="#" id="btn-send-close" onclick="window.location.href='programaCapacitacion';">Cerrar ventana</a>&nbsp;&nbsp;
                    <input type="submit" name="add" id="btn-send" value="Guardar">

                </div>
            </div>
        </form>
    </div>

    <div class="container" style="width: 100%; overflow-x:scroll; margin-top: 15px;">
        <?php
        error_reporting(0);
        require_once 'clases/conexion.php';
        $conexionX = new ConexionRh();

        $sql = $conexionX->prepare("SELECT id,nombrecurso,catalogoprograma,lineaestrategica,competenciaalieandaeje,id_empleado,fechacriteriotermino,fechacriterioinicio,criteriocurso,fechainicio,fechatermino,modalidad,horas,asistecomo,nombreinstitucion,otroexpidedocumento,tipocapacitacion,documentorecibe, EXTRACT(YEAR 
        FROM fechatermino) as anio from datos where id_empleado = $identificador and validaautorizacion = 1 order by id desc");
        $sql->execute();

        ?>

        <table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover">
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Horas</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Impartido por el HRAEI</th>
                    <th>Nombre institucion externo</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($dataRegistro = $sql->fetch()) {
                    $valor = $dataRegistro['id'];
                    $nombrecurso = $dataRegistro['nombrecurso'];
                    $fechatermino = $dataRegistro['fechatermino'];
                    $id_empleado = $dataRegistro['id_empleado'];
                ?>
                    <tr>
                        <td><?php echo $dataRegistro['anio'] ?></td>
                        <td><?php echo $dataRegistro['tipocapacitacion'] ?></td>
                        <td><?php echo $dataRegistro['nombrecurso'] ?></td>
                        <td><?php echo $dataRegistro['horas'] ?></td>
                        <td><?php echo $dataRegistro['fechainicio'] ?></td>
                        <td><?php echo $dataRegistro['fechatermino'] ?></td>
                        <td><?php echo $dataRegistro['nombreinstitucion'] ?></td>
                        <td><?php echo $dataRegistro['otroexpidedocumento'] ?></td>
                        <td><?php
    $path = "documentoscursos/".$nombrecurso.$fechatermino.$id_empleado;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                echo "<a href='documentoscursos/$nombrecurso$fechatermino$id_empleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento cargado</a>";
            }
        }
    }
    
    ?></td>
                        <td><?php echo $dataRegistro['documentorecibe'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                <th>Año</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Horas</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Impartido por el HRAEI</th>
                    <th>Nombre institucion externo</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>

                </tr>
            </tfoot>
        </table>
        
        <script>
            new DataTable('#example', {
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            let column = this;
                            let title = column.footer().textContent;

                            // Create input element
                            let input = document.createElement('input');
                            input.placeholder = title;
                            column.footer().replaceChildren(input);

                            // Event listener for user input
                            input.addEventListener('keyup', () => {
                                if (column.search() !== this.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        });
                }
            });
            $('#example tfoot tr').appendTo('#example thead');
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
        function myFunction() {
            $.ajax({
                url: "notificaciones/notificaciones.php",
                type: "POST",
                processData: false,
                success: function(data) {
                    $("#notification-count").remove();
                    $("#notification-latest").show();
                    $("#notification-latest").html(data);
                },
                error: function() {}
            });
        }

        $(document).ready(function() {
            $('body').click(function(e) {
                if (e.target.id != 'notification-icon') {
                    $("#notification-latest").hide();
                }
            });
        });
    </script>
    <script>
        $('input[type="file"]').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "pdf") {

                    if ($(this)[0].files[0].size > 9048576) {
                        console.log("El documento excede el tamaño máximo");
                        $('#modal-title').text('¡Precaución!');
                        $('#modal-msg').html("Se solicita un archivo no mayor a 1MB. Por favor verifica.");
                        $("#modal-gral").modal();
                        $(this).val('');
                    } else {
                        $("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alert("Extensión no permitida: " + ext);
                }
            }
        });
    </script>

</body>

</html>