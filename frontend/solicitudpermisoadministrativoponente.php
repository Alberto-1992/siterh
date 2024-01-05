<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Permisos administrativos</title>
</head>
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>
<body>

    <header class="headerinfarto" style="background-color: #15929E;">

        <span id="cabecera">Permiso administrativo ponente.</span>

    </header>
    <?php
    switch (true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuPermisoAdmon.php';
            break;
        case isset($_SESSION['usuarioDatos']):
            require 'menu/menuPermisoAdmon.php';
            break;
        case isset($_SESSION['usuarioJefe']):
            require 'menu/menuPermisoAdmon.php';
            break;
        default:
            require 'close_sesion.php';
    }
    ?>
    <style>
        /* RESET RULES 
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        :root {
            --lightgray: #efefef;
            --blue: steelblue;
            --white: #fff;
            --black: rgba(0, 0, 0, 0.8);
            --bounceEasing: cubic-bezier(0.51, 0.92, 0.24, 1.15);
        }

        * {
            padding: 0;
            margin: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            cursor: pointer;
            background: transparent;
            border: none;
            outline: none;
            font-size: inherit;
        }


        .btn-group {
            text-align: center;
        }

        .open-modal {
            font-weight: bold;
            background: var(--blue);
            color: var(--white);
            padding: 0.75rem 1.75rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }


        /* MODAL
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .modal {
            position: fixed;
            margin-top: 0px;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0rem;
            background: var(--black);
            cursor: pointer;
            visibility: hidden;
            opacity: 0;
            transition: all 0.35s ease-in;
        }

        .modal.is-visible {
            visibility: visible;
            opacity: 1;
        }

        .modal-dialog {
            position: relative;
            max-width: 800px;
            max-height: 80vh;
            border-radius: 5px;
            background: var(--white);
            overflow: auto;
            cursor: default;
        }

        .modal-dialog>* {
            padding: 1rem;
        }

        .modal-header,
        .modal-footer {
            background: var(--lightgray);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header .close-modal {
            font-size: 1.5rem;
        }



        /* SLIDE LEFT ANIMATION
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        [data-animation="slideInOutLeft"] .modal-dialog {
            opacity: 0;
            transform: translateX(-100%);
            transition: all 0.5s var(--bounceEasing);
        }

        [data-animation="slideInOutLeft"].is-visible .modal-dialog {
            opacity: 1;
            transform: none;
            transition-delay: 0.2s;
        }


        /* FOOTER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        .page-footer {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
        }

        .page-footer span {
            color: #e31b23;
        }

        #boton1:hover {
            background-color: greenyellow;
            color: black;
            cursor: pointer;
        }

        #boton2:hover {
            background-color: greenyellow;
            color: black;
            cursor: pointer;
        }
    </style>

    </head>

    <body>
        <style>
            p {
                font-size: 18px;
            }
        </style>
        <div id="mensaje">
            <div class="container" style="background-color: white; border: none; margin-top: 2%;">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <header style="width: auto; height: auto; margin-top: 0px; padding: 0px; text-align: center; color: rgb(0, 0, 0); background-color:burlywood; border-radius: 10px; color: white;">
                    <p style="font-size: 25px;">Permiso administrativo ponente.</p>
                </header><br>

                <script>
                    function limpiarformulario() {
                        setTimeout('document.msform.reset()', 1000);
                        return false;
                    }
                </script>

                <form name="msform" id="msform" enctype="multipart/form-data" onsubmit="return limpiarformulario();">
                    <script>
                        $("#msform").on("submit", function(e) {
                            e.preventDefault();
                            var formData = new FormData(document.getElementById("msform"));
                            formData.append("dato", "valor");
                            $.ajax({

                                url: "datosEvento.php",
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
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                                }

                            })
                        })
                    </script>
                    <?php
                    require 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    if (isset($_SESSION['usuarioJefe'])) {
                        $idjefe = $rw['id_jefedeljefe'];

                        $sql = $conexionX->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                        $sql->execute(array(
                            ':id_jefe' => $idjefe
                        ));
                        $rowj = $sql->fetch();
                    } else if (isset($_SESSION['usuarioDatos'])) {
                        $idjefe = $rw['id_jefe'];
                        $sql = $conexionX->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                        $sql->execute(array(
                            ':id_jefe' => $idjefe
                        ));
                        $rowj = $sql->fetch();
                    }

                    ?>
                    <div style="width: 100%; height: auto; display: flex; align-items: center; justify-content: center;">
                        
                        <div class="btn-group;col-md-3">
                            <button type="button" class="open-modal" data-open="modal2" id="boton2" style="background-color:cadetblue;">
                                LLenado
                            </button>
                        </div>
                    </div>
                    

                    <div class="modal" id="modal2" data-animation="slideInOutLeft">
                        <div class="modal-dialog" style="max-width: 920px;">
                            <header class="modal-header" style="text-align: center; font-size: 25px; color: white; background-color: #162765; margin: 0px 0px 0px 0px; border: none;">
                                <label style="text-transform: uppercase; font-size: 20px">Datos
                                    personales</label>
                            </header>
                            <section class="modal-content">
                                <br>

                                <fieldset nombre="Datos">

                                    <div class="row g-3 needs-validation">
                                    <input type="hidden" class="form-control" name="tipode" id="tipode" value="Ponente">
                                        <div class="col-md-10">
                                            <strong>Nombre completo </strong>
                                            <input type="text" class="form-control" name="Nombres" id="Nombres" value="<?php echo $rw['Nombre'] ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <strong>N° de Empleado</strong>
                                            <input type="text" class="form-control" name="numeroEm" id="numeroEm" value="<?php echo $rw['Empleado'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Puesto </strong>
                                            <input type="text" class="form-control" name="Puesto" id="Puesto" value="<?php echo $rw['DescripcionPuesto'] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Codigo</strong>
                                            <input type="text" class="form-control" name="Codigo" id="Codigo" value="<?php echo $rw['CodigoPuesto'] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Fecha de ingreso</strong>
                                            <input type="date" class="form-control " name="Fechainicio1" required value="<?php echo $rw['fechaingreso'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Nombre del Area</strong>
                                            <input type="text" class="form-control" name="Extencion" id="exten" value="<?php echo $rw['DescripcionAdscripcion'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Especialidad</strong>
                                            <input type="text" class="form-control" name="Especialidad" id="Especialidad">
                                        </div>

                                        <div class="col-md-4">
                                            <strong>Servicio</strong>
                                            <input type="text" class="form-control" name="Extencion" id="exten" value="<?php echo $rw['descripcionestructura3'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Turno</strong>
                                            <input type="text" class="form-control" name="turno" value="<?php echo $rw['Turno'] ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Dias laborales </strong>
                                            <input type="text" class="form-control" name="Dias" id="Dias" value="<?php echo $rw['Jornada'] ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div><label class="form-check-label">
                                                    Curso Interno
                                                </label>
                                                <input class="form-check-input" type="radio" name="tipoCursoIntExt" id="gridRadios1" value="Interno" required>
                                            </div>


                                            &nbsp;&nbsp;
                                            <div><label class="form-check-label">
                                                    Curso Externo
                                                </label>
                                                <input class="form-check-input" type="radio" name="tipoCursoIntExt" id="gridRadios1" value="Externo">
                                            </div>


                                        </div>
                                        <div class="col-md-10">
                                            <strong>Correo electronico</strong>
                                            <input type="email" class="form-control" id="Correo" value="<?php echo $rw['correo'] ?>">
                                        </div>


                                        <div class="col-md-2">
                                            <strong>Teléfono</strong>
                                            <input type="text" class="form-control" name="Telefono" id="telefono" value="<?php echo $rw['telefonocelular'] ?>">
                                        </div>



                                        <div class="col-md-4">
                                            <strong>Nombre del Jefe Inmediato</strong>
                                            <input type="text" class="form-control" name="Nombrejefe" id="Nombrejefe" value="<?php echo $rowj['nombre'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Cargo del jefe inmediato </strong>
                                            <input type="text" class="form-control" name="Cargojefe" id="Cargojefe" value="<?php echo $rowj['correo'] ?>">
                                        </div>

                                        <div class="col-md-2">
                                            <input class="form-check-input" type="radio" name="infoclara" id="gridRadios1" value="B" <?php echo $rw['EstatusPlaza']; ?> <?php if ($rw['EstatusPlaza'] == "B") echo 'checked="checked"' ?> disabled>
                                            <label class="form-check-label">
                                                Base
                                            </label><br>
                                            <input class="form-check-input" type="radio" name="infoclara" id="gridRadios1" value="CF" <?php echo $rw['EstatusPlaza']; ?> <?php if ($rw['EstatusPlaza'] == "CF") echo 'checked="checked"' ?> disabled>
                                            <label class="form-check-label">
                                                Confianza
                                            </label><br>
                                            <input class="form-check-input" type="radio" name="infoclara" id="gridRadios1" value="PR" <?php echo $rw['EstatusPlaza']; ?> <?php if ($rw['EstatusPlaza'] == "PR") echo 'checked="checked"' ?> disabled>
                                            <label class="form-check-label">
                                                Provisional
                                            </label>
                                        </div>



                                    </div><br>
                                </fieldset>
                                <!-- crear la tabla en la base de datos desde este apartado -->
                                <fieldset name="Datos Oyente">

                                    <div class="row g-3 needs-validation">
                                        <div class="col-md-12" style="text-align: center; font-size: 25px; color: white; background-color: #162765; margin: 0px 0px 0px 0px; border: none;">
                                            <label style="text-transform: uppercase; font-size: 20px"> Evento</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="mensaje">Tipo de capacitación:</label>
                                            <select class="form-control" name="tipoCurso" id="tipoCurso" required onchange="tipoCapacitacion();">
                                                <option value="Sin dato">Seleccione</option>
                                                <?php

                                                $query = $conexionX->prepare("SELECT * FROM catalogocapacitacion where activo = 0 order by descripcionaccion");
                                                $query->execute();
                                                $query->setFetchMode(PDO::FETCH_ASSOC);
                                                while ($row = $query->fetch()) { ?>
                                                    <option value="<?php echo $row['descripcionaccion']; ?>">
                                                        <?php echo $row['descripcionaccion']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Modalidad</label>
                                            <select type="form-select" class="form-control" name="Modalidad" id="Modalidad" required>
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
                                        <div class="col-md-12">
                                            <strong>Nombre del evento académico</strong>
                                            <input type="text" class="form-control" name="Eventoacademico" id="Eventoacademico" required>
                                        </div>
                                        <div class="col-md-12">
                                            <strong>Nombre del tema que presentara</strong>
                                            <input type="text" class="form-control" name="temapresentara" id="temapresentara" required>
                                        </div>

                                        <div class="col-md-12">
                                            <strong>Lugar donde se impartira. </strong>
                                            <input type="text" class="form-control" name="lugarimpartira" id="Modalidad" required>
                                        </div>

                                        <div class="col-md-4">
                                            <strong>Fecha de Inicio</strong>
                                            <input type="date" class="form-control " name="Fechainicioevento" required>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Fecha de termino</strong>
                                            <input type="date" class="form-control " name="Fechaterminoevento" required>
                                        </div>

                                        <div class="col-md-4">
                                            <strong>Horario Establecido</strong>
                                            <input type="text" class="form-control" name="Horarios" id="Horarios" required>
                                        </div>

                                        <div class="col-md-12" style="text-align: center;">
                                            <strong style="font-size: 15px">Carga el documento que avala tu solicitud(.pdf): </strong>

                                            <input type="file" class="form-control" name="comprobantecurso" required accept=".pdf">
                                        </div>

                                        <div class="col-md-12" style="text-align: center;">
                                            <strong>Describa brevemente su solicitud.</strong>
                                            <textarea rows="4" class="form-control" name="comentarioSolicitud" required></textarea>
                                        </div>

                                        <div class="col-md-12" style="text-align: center;">
                                            <strong>Comentario del jefe inmediato de contribución al
                                                servicio de la capacitación solicitada.</strong>
                                            <textarea rows="4" class="form-control" name="comentarioJefe" readonly></textarea>
                                        </div>

                                        <div style="width: 100%; height: auto; display: flex; justify-content: center; align-items:center;">
                                            <a href="#" class="btn btn-warning" onclick="window.location.reload();">Cerrar</a>&nbsp;&nbsp;
                                            <input type="submit" name="Guardar" class="btn btn-primary  btn-block" value="Enviar información">

                                        </div>

                                </fieldset>

                            </section>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container" style="width: 100%; overflow-x:scroll; margin-top: 15px;">
            <?php
            error_reporting(0);
            require_once 'clases/conexion.php';
            $conexionX = new ConexionRh();
            $identificador = $rw['Empleado'];
            $sql = $conexionX->prepare("SELECT * from eventocapacitacion where id_empleado = $identificador and tipode = 'Ponente' order by id_evento desc");
            $sql->execute();

            ?>

            <table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover">
                <thead>
                    <tr>
                    <th>Nombre del curso</th>
                        <th>Feha de inicio</th>
                        <th>Feha de termino</th>
                        <th>Horario</th>
                        <th>Tipo de curso</th>
                        <th>Lugar donde se imparte</th>
                        <th>Comentario Jefe</th>
                        <th>Ver documento</th>
                        <th>Generar PDF</th>
                        <th>Ver formato cargado y firmado</th>
                        <th>Sube tu formato firmado</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dataRegistro = $sql->fetch()) {
                        $valor = $dataRegistro['id_evento'];
                        $valorCifrado = base64_encode($valor);
                        $nombrecurso = 'comprobatedocumento';
                        $fechatermino = $dataRegistro['fecha_inicia'];
                        $id_empleado = $dataRegistro['id_empleado'];
                        $documento = $dataRegistro['anotedocumentos'];
                        $ruta = $dataRegistro['rutadocumentofirmado'];
                        $direccionarchivo = $valor.'_'.$id_empleado;
                    ?>
                        <tr>
                            <td><?php echo $dataRegistro['Nombre_evento'] ?></td>
                            <td><?php echo $dataRegistro['fecha_inicia'] ?></td>
                            <td><?php echo $dataRegistro['fecha_termino'] ?></td>
                            <td><?php echo $dataRegistro['horario_establecido'] ?></td>
                            <td><?php echo $dataRegistro['tipodecurso'] ?></td>
                            <td><?php echo $dataRegistro['lugar_dondeimpar'] ?></td>
                            <td><?php echo $dataRegistro['comentariojefe'] ?></td>
                            <td><a href="<?php echo "$documento$nombrecurso.pdf" ?>" target="_blank">Ver archivo</a></td>
                            <td><?php if ($dataRegistro['validaautorizacion'] == 1 or $dataRegistro['validaautorizacion'] == 0) { ?><a href="formatoBecaPonente?id=<?php echo $valorCifrado ?>">Generar pdf</a><?php } else if ($dataRegistro['validaautorizacion'] == 2) { ?>Solicitud negada <?php } ?></td>
                            <?php if($ruta != ''){ ?>
                            <td><a href="<?php echo "$ruta$direccionarchivo.pdf" ?>" target="_blank">Ver documento firmado</a></td>
                            <?php }else { ?>
                                <td>Sin archivo</td>
                            <?php } ?>
                            <td><form action="subirFormatobecaPonente" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                <input type="file" name="archivobeca" accept=".pdf" class="form-control"><input type="hidden" name="empleado" value="<?php echo $dataRegistro['id_empleado'] ?>"><input type="hidden" name="idevento" value="<?php echo $dataRegistro['id_evento'] ?>"><input type="submit" name="formato" value="Subir" class="btn btn-warning" style="margin-left: 20%;">
                            </div>
                            </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                    <th>Nombre del curso</th>
                        <th>Feha de inicio</th>
                        <th>Feha de termino</th>
                        <th>Horario</th>
                        <th>Tipo de curso</th>
                        <th>Lugar donde se imparte</th>
                        <th>Comentario Jefe</th>
                        <th>Ver documento</th>
                        <th>Generar PDF</th>
                        <th>Ver formato cargado y firmado</th>
                        <th>Sube tu formato firmado</th>


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
    </body>
    <script>
        const openEls = document.querySelectorAll("[data-open]");
        const closeEls = document.querySelectorAll("[data-close]");
        const isVisible = "is-visible";

        for (const el of openEls) {
            el.addEventListener("click", function() {
                const modalId = this.dataset.open;
                document.getElementById(modalId).classList.add(isVisible);
            });
        }

        for (const el of closeEls) {
            el.addEventListener("click", function() {
                this.parentElement.parentElement.parentElement.classList.remove(isVisible);
            });
        }

        document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible [data-close]").click();

            }
        });
        $('input[type="file"]').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "pdf") {

                    if ($(this)[0].files[0].size > 5048576) {
                        alert('¡Precaución! Se solicita un archivo no mayor a 5MB. Por favor verifica.');

                        $(this).val('');
                    } else {
                        $("#notificacion").hide();
                    }
                } else {
                    $(this).val('');
                    alert("Extensión no permitida: " + ext);
                }
            }
        });
    </script>

</html>