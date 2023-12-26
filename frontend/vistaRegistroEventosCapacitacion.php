<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
error_reporting(0);

?>


<div id="mensaje"></div>
<?php
require 'conexionRh.php';

$id_empleado =   $dataRegistro['id_capacitacion'];


?>
<input type="hidden" id="numempleado" value="<?php echo $dataRegistro['id_capacitacion'] ?>">
<input type="hidden" id="nombrecurso" value="<?php echo $dataRegistro['nombre_capacitacion'] ?>">
<input type="hidden" id="fechainicio" value="<?php echo  $dataRegistro['fecha_inicio'] ?>">


<?php session_start();
if (isset($_SESSION['usuarioAdminRh']) or isset($_SESSION['usuarioJefe']) or isset($_SESSION['usuarioDatos']) == 'claehf@hotmail.com') { ?>
    <ul class="nav nav-tabs" style="margin-top: 0px;">

        <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: blue;">Acciones</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <?php
                if ($dataRegistro['estadoactivo'] == 0) { ?>

                    <!--<li><a class="dropdown-item" href="#" onclick="bloquear();">Bloquear</a></li>-->
                <?php
                } else if ($dataRegistro['estadoactivo'] == 1) { ?>
                    <!--<li><a class="dropdown-item" href="#" onclick="activar();">Activar usuario</a></li>-->
                <?php
                }

                if ($dataRegistro['editarDatos'] == 0) { ?>
                    <li><a class="dropdown-item" href="#" onclick="editardatos();">Editar datos curso</a></li>
                <?php } else if ($dataRegistro['editarDatos'] == 1) { ?>
                    <li><a class="dropdown-item" href="#" onclick="finalizarEdicion();">Finalizar edición</a></li>
            <?php }
            };

            ?>
            <li><a class="dropdown-item" href="#" onclick="eliminarCurso();">Eliminar curso</a></li>
            </ul>
        </li>
        </li>
    </ul>
    <script>
        function eliminarCurso() {
            var id = $("#numempleado").val();
            let nombrecurso = $("#nombrecurso").val();
            let fechainicio = $("#fechainicio").val();
            var mensaje = confirm("El curso sera eliminado");
            let parametros = {
                id: id,
                nombrecurso: nombrecurso,
                fechainicio: fechainicio
            }
            if (mensaje == true) {
                $.ajax({
                    data: parametros,
                    url: 'aplicacion/eliminarCursoCapacitacion.php',
                    type: 'post',
                    success: function(datos) {
                        $("#mensaje").html(datos);
                        $("#tabla_resultadobus").load('consultaRegistroEventosCapacitacion.php');

                    }
                });
            } else {

            }
        }

        function editardatos() {
            let id_capacitacion = $("#numempleado").val();
            let ob = {
                id_capacitacion: id_capacitacion
            };
            $.ajax({
                type: "POST",
                url: "verInformacionCurso.php",
                data: ob,

                success: function(data) {

                    $("#tabla_resultado").html(data);


                }

            });
        }

        function finalizarEdicion() {
            var id = $("#numempleado").val();
            var editar = $("#finalizaedicion").val();
            var mensaje = confirm("Desea finalizar la edición de los datos");
            let parametros = {
                id: id,
                editar: editar
            }
            if (mensaje == true) {
                $.ajax({
                    data: parametros,
                    url: 'editarDatosback.php',
                    type: 'post',
                    success: function(data) {
                        $("#mensaje").html(data);
                        let id = $("#numempleado").val();
                        let ob = {
                            id: id
                        };
                        $.ajax({
                            type: "POST",
                            url: "consultaAdminBusqueda.php",
                            data: ob,

                            success: function(data) {

                                $("#tabla_resultado").html(data);
                                //$("#editarDatosPersonalescancerdeMama").modal('show');


                            }

                        });

                    }
                });
            } else {

            }
        }

        function editardatospersonales() {
            let id = $("#numempleado").val();
            let ob = {
                id: id
            };
            $.ajax({
                type: "POST",
                url: "modal/editarDatosEmpleado2022.php",
                data: ob,

                success: function(data) {

                    $("#editadatospersonales").html(data);


                }

            });
        }
    </script>
    <table class="table table-responsive  table-bordered " cellspacing="0" width="100%">

        <div class="containerr2" style="background-color: #0D9A85;">Datos del curso</div>
        <tr>
            <th id="th">Nombre de la capacitación:</th>
            <td id="td"><?php echo $dataRegistro['nombre_capacitacion'] ?></td>
        </tr>

        <tr>
            <th id="th">Lugar donde se imparte:</th>
            <td id="td"><?php echo $dataRegistro['lugar_imparte'] ?></td>
        </tr>
        <tr>

        <tr>
        <tr>
            <th id="th">Objetivo:</th>
            <td id="td"><?php echo $dataRegistro['objetivo'] ?></td>
        </tr>
        <th id="th">N° de participantes:</th>
        <td id="td"><?php echo $dataRegistro['num_participantes'] ?></td>
        </tr>
        <tr>
            <th id="th">Costo:</th>
            <td id="td"><?php echo $dataRegistro['coasto'] ?></td>
        </tr>
        <tr>
            <th id="th">Duración:</th>
            <td id="td"><?php echo $dataRegistro['duracion_cuerso'] ?></td>
        </tr>
        <tr>
            <th id="th">Programa:</th>
            <td id="td"><?php echo $dataRegistro['programa'] ?></td>
        </tr>
        <tr>
            <th id="th">Linea estrategica:</th>
            <td id="td"><?php echo $dataRegistro['lineaestratejica'] ?></td>
        </tr>
        <tr>
            <th id="th">Area que coordina:</th>
            <td id="td"><?php echo $dataRegistro['nombre_areacordina'] ?></td>
        </tr>
        <tr>
            <th id="th">Proveedor:</th>
            <td id="td"><?php echo $dataRegistro['nombreprovedor'] ?></td>
        </tr>
        <tr>
            <th id="th">Telefono proveedor:</th>
            <td id="td"><?php echo $dataRegistro['telefono'] ?></td>
        </tr>
        <tr>
            <th id="th">Correo proveedor:</th>
            <td id="td"><?php echo $dataRegistro['correo_probedor'] ?></td>
        </tr>
        <tr>
            <th id="th">Tipo de proveedor:</th>
            <td id="td"><?php echo $dataRegistro['tipo_provedor'] ?></td>
        </tr>
        <tr>
            <th id="th">Programa propuesto:</th>
            <td id="td"><?php echo $dataRegistro['programapropuesto'] ?></td>
        </tr>
        <tr>
        <tr>
            <th id="th">Tipo de capacitación:</th>
            <td id="td"><?php echo $dataRegistro['tipode_accion'] ?></td>
        </tr>
        <th id="th">Area que fortalece:</th>
        <td id="td"><?php echo $dataRegistro['arefortalese'] ?></td>
        </tr>
        <tr>
            <th id="th">Modalidad:</th>
            <td id="td"><?php echo $dataRegistro['modalidad'] ?></td>
        </tr>
        <tr>
            <th id="th">Inicio:</th>
            <td id="td"><?php echo $dataRegistro['fecha_inicio'] ?></td>
        </tr>
        <tr>
            <th id="th">Fin:</th>
            <td id="td"><?php echo $dataRegistro['fecha_termino'] ?></td>
        </tr>
        <tr>
            <th id="th">Competencia:</th>
            <td id="td"><?php echo $dataRegistro['competencia'] ?></td>
        </tr>
    </table>

    <form id="agregarUsuarios" name="agregarUsuarios">
        <script>
            $(document).ready(function() {
                $('#mscancer3').change(function(e) {}).multipleSelect({
                    width: '100%'
                });
            });
            $("#agregarUsuarios").on("submit", function(th) {


                th.preventDefault();

                var formData = new FormData(document.getElementById(
                    "agregarUsuarios"));
                formData.append("dato", "valor");
                $.ajax({

                    url: "aplicacion/agregarUsuariosCurso.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(data) {
                        $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                    },
                    success: function(data) {
                        $("#mensaje").html(data);
                    }
                })

            })
        </script>
        <link rel="stylesheet" href="css/multiple-select.css" />
        <input type="hidden" value="<?php echo $dataRegistro['id_capacitacion'] ?>" id="id_capacitacion" name="id_capacitacion">
        <div class="col-md-4" id="tp">
            <label>Agregar personal al curso</label>
            <select name='mscancer3[]' id='mscancer3' class='form-control' multiple='multiple'>
                <?php
                $prod = $conexionX->prepare("SELECT * FROM plantillahraei order by Empleado asc");
                $prod->execute();
                $row = $prod->fetchAll();
                foreach ($row as $valores) :
                    echo '<option value=' . $valores['Empleado'] . '>' . $valores['Empleado'] . ' ' . $valores['Nombre'] . '</option>';
                endforeach
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="submit" name="Guardar" class="btn btn-success" value="Agregar" style="margin-top: 10px;">
        </div>
        <script src="js/multiple-select-cancermama.js"></script>
    </form>
    <script>
        // var fired_button2= $("#claveUnicaContrato").val();  
        //var fired_button2=document.getElementById('claveUnicaContrato').value;
        $('.lnr-pencil').on('click', function() {

            let fired_button = $(this).val();
            let mensaje = confirm("La evaluacion del usuario se reiniciara, Deseas continuar?")

            if (mensaje == true) {
                window.location.href = 'reinicarEval?id=' + fired_button;
            } else {
                swal({
                    title: '¡CANCELADO!',
                    text: '',
                    type: 'error',
                    timer: 1000,
                    showConfirmButton: false
                });
            }
        });

        $('.lnr-trash').on('click', function() {

            let id = $(this).val();
            let mensaje = confirm("El usuario sera bloqueado del sistema, Deseas continuar?")

            if (mensaje == true) {
                window.location.href = 'bloquearUsuario.php?id=' + id;
            } else {
                swal({
                    title: '¡CANCELADO!',
                    text: '',
                    type: 'error',
                    timer: 1000,
                    showConfirmButton: false
                });
            }
        });
    </script>