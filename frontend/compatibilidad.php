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
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Carga de informacion de cursos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<script>
    function limpiar() {

        setTimeout('document.frmNotification.reset()', 1000);

        return false;
    }
</script>

<body>

    <nav class="navbar navbar-expand-md fixed-top" style="background-color: #9C9B8F;">
        <span id="cabecera">Compatibilidad laboral</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Carga de información de compatibilidad laboral</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Te informamos, una vez que hayas cargado tu información, no la podras visualizar hasta que el area de capacitación haya validado los datos, si la información que capturaste es correcta podras visualizarla debajo del formulario</h1>
        <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 10px; text-align:center;">
            <input type="submit" name="add" value="Cerrar ventana" style="background-color: green; color: white; width: 120px; font-size: 15px; border: none; border-radius: 5px;" onclick="window.location.href='principalRh';">
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
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
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
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $nombreempleado = $row['nombrecompleto'];
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $nombreempleado = $nombre;
        break;

        case isset($_SESSION['usuarioDatos']):
            $nombreempleado = $row['nombre'] . ' ' . $row['apellidopaterno'] . ' ' . $row['apellidomaterno'];
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>

                <input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                <div class="col-md-6">
                    <label for="mensaje">Nombre:</label>
                    <input type="text" class="form-control" name="nombreempleado" id="nombreempleado" placeholder="Nombre" required value="<?php echo $nombreempleado ?>">
                </div>
                <div class="col-md-12">
                    <strong>Tipo de capacitación:</strong>
                    <select class="form-control" name="tipodecapacitacion" id="tipodecapacitacion" required onchange="tipoCapacitacion();">
                        <option value="Sin dato">Seleccione</option>
                        <?php
                        require 'conexionRh.php';
                        $query = $conexionRh->prepare("SELECT * FROM catalogocapacitacion where activo = 0");
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
                </script>

                <input type="hidden" class="form-control" name="areafortalece" id="areafortalece" required readonly>

                <div class="col-md-6">
                    <label for="mensaje">Nombre del curso:</label>
                    <input type="text" class="form-control" name="nombrecurso" id="nombrecurso" placeholder="Nombre del curso" required>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de inicio del curso:</label>
                    <input type="date" class="form-control" name="fechainicio" id="fechainicio" required>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de termino del curso:</label>
                    <input type="date" class="form-control" name="fechatermino" id="fechatermino" required>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Modalidad:</label>
                    <input type="text" class="form-control" name="modalidad" id="modalidad" required>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Total de horas:</label>
                    <input type="text" class="form-control" name="horas" id="horas" required>
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
                    <input type="submit" name="add" id="btn-send" value="Enviar">
                </div>
            </div>

        </form>
    </div>

    <div class="container" style="width: 100%; overflow-x:scroll;">
        <?php
        error_reporting(0);
        require 'conexionRh.php';
        $sql = $conexionGrafico->query("SELECT * from datos where id_empleado = $identificador and validaautorizacion = 1 order by id desc");

        ?>

        <table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover">
            <thead>
                <tr>
                    <th>Nombre de la institución</th>
                    <th>Otro institucion expide</th>
                    <th>Nombre del curso</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>
                    <th>Modalidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($dataRegistro = $sql->fetch_assoc()) {
                    $valor = $dataRegistro['id'];
                    $nombrecurso = $dataRegistro['nombrecurso'];
                    $fechatermino = $dataRegistro['fechatermino'];
                    $id_empleado = $dataRegistro['id_empleado'];
                ?>
                    <tr>
                        <td><?php echo $dataRegistro['nombreinstitucion'] ?></td>
                        <td><?php echo $dataRegistro['otroexpidedocumento'] ?></td>
                        <td><?php echo $dataRegistro['nombrecurso'] ?></td>
                        <td><?php echo $dataRegistro['fechainicio'] ?></td>
                        <td><?php echo $dataRegistro['fechatermino'] ?></td>
                        <!--<td><a href="<?php echo "documentoscursos/$nombrecurso$fechatermino$id_empleado/$nombrecurso.pdf" ?>" target="_blank"><iframe width="100%" name="hola" scrolling="auto" src="<?php echo "documentoscursos/$nombrecurso$fechatermino$id_empleado/$nombrecurso.pdf" ?>" frameborder="0"></iframe><br>Ver archivo</a></td>-->
                        <td><a href="<?php echo "documentoscursos/$nombrecurso$fechatermino$id_empleado/$nombrecurso.pdf" ?>" target="_blank">Ver documento</a></td>
                        <td><?php echo $dataRegistro['documentorecibe'] ?></td>
                        <td><?php echo $dataRegistro['modalidad'] ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                    <th>Nombre de la institución</th>
                    <th>Otro institucion expide</th>
                    <th>Nombre del curso</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>
                    <th>Modalidad</th>

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

</body>

</html>