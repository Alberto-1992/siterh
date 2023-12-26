<body style="padding: 0px; overflow-y:scroll;">
        <h1 style="text-align: center; font-size: 28px; -webkit-text-stroke: 0px #282828;
	text-shadow: 0px 0px;">CARGA DE INFORMACIÓN.</h1>
    <script>
        function limpiar() {

setTimeout('document.cargaAdmin.reset()', 1000);

return false;
}
    </script>

        <form name="cargaAdmin" id="cargaAdmin" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#cargaAdmin").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("cargaAdmin"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/agregarCursoAdmin.php",
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
                        }
                    })
                })
            </script>
            <div class="form-row">
                <?php session_start();
                if(isset($_SESSION['usuarioAdminRh'])){
                    $usernameSesion = $_SESSION['usuarioAdminRh'];
                }
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                    $identificador = $_POST['empleado'];
                    $nombreempleado = $_POST['nombre'];
                ?>
                <input type="text" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                <div class="col-md-6">
                    <label for="mensaje">Usuario cargo:</label>
                    <input type="text" class="form-control" name="usuariocargo" id="usuariocargo" placeholder="Nombre" style="text-transform: lowercase;"  value="<?php echo $usernameSesion ?>" readonly>
                </div>
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
function validarDate() {
var fechaEntrada = document.getElementById('fechainicio').value;
var fechaLimite = '2019-01-01';
if( (new Date(fechaEntrada).getTime() < new Date(fechaLimite).getTime()))
{
    Swal.fire({
            position: 'top-start',
            icon: 'error',
            title: 'No se permiten fechas de inicio de curso anteriores al año 2019',
            showConfirmButton: true,
            timer: 4000
        })
   $("#fechainicio").val('');
    return false;
}else{
    return true;
}
}

                </script>
<style>
    input{
    text-transform: uppercase;
}
</style>
                <input type="hidden" class="form-control" name="areafortalece" id="areafortalece" required readonly>

                <div class="col-md-6">
                <label for="mensaje">Nombre del curso:</label>
                    
                                        <input type="text" name="nombrecurso" id="nombrecurso" type="text" class="form-control"
                                        placeholder="Max 100 caracteres, no se permiten caracteres especiales como'.,:-_?'" required maxlength="100" onkeypress="return check(event)">
                                            
                                    </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de inicio del curso:</label>
                    <input type="date" class="form-control" name="fechainicio" id="fechainicio" min="2019-01-01" onblur="validarDate();" required>
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
                <div class="col-md-3">
                    <label for="autor">Nombre la institución que lo expide:</label>
                    <select class="form-control" name="nombreinstitucion" id="nombreinstitucion" placeholder="Institución" required>
                        <option value="Seleccione">Seleccione</option>
                        <option value="HRAEI">HRAEI</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="mensaje">Sube tu documento:</label>
                    <input type="file" class="form-control" name="documentocurso[]" id="documentocurso" required accept=".pdf">
                </div>
                <div class="col-md-12" id="otrodocumento">
                    <strong>Especifique cual:</strong>
                    <input type="text" class="form-control" name="otroexpidedocumento" id="otroexpidedocumento">
                </div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                    <input type="submit" name="add" id="btn-send" value="Guardar">

                </div>
            </div>
        </form>

    
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
<?php
    //require 'modals/verCursoCargado.php';
    ?>
</body>

</html>