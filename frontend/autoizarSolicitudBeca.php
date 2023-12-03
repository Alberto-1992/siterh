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

<body>

        <header class="headerinfarto" style="background-color: #162765;">

            <span id="cabecera">Permiso administrativo.</span>

        </header>
    
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
                    <div class="container" style="background-color: white; border: none;">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        

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

                                        url: "aplicacion/autorizaEventoBecaTiempo.php",
                                        type: "post",
                                        dataType: "html",
                                        data: formData,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        beforeSend: function(data) {
                                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                                        },
                                        success: function(data) {
                                            $("#mensaje").html(data);
                                            setTimeout(function() {
                                                location.reload();
                                            }, 2000);
                                        }

                                    })
                                })
                            </script>
                            <?php
                            require_once 'clases/conexion.php';
                            $conexionX = new ConexionRh();
                            
                                $idjefe = $rw['id_jefe'];
                                $sql = $conexionX->prepare("SELECT * from jefes2022 where id_jefe = :id_jefe");
                                $sql->execute(array(
                                    ':id_jefe' => $idjefe
                                ));
                                $rowj = $sql->fetch();
                            

                            ?>
                            

                            <div class="form-row">
                                <div class="modal-dialog" style="max-width: 920px;">
                                    <header class="modal-header" style="text-align: center; font-size: 25px; color: white; background-color: #162765; margin: 0px 0px 0px 0px; border: none;">
                                        <label style="text-transform: uppercase; font-size: 20px">Datos
                                            personales</label>
                                    </header>
                                    <section class="modal-content">
                                        <br>

                                        <fieldset nombre="Datos">

                                            <div class="row g-3 needs-validation">
                                    
                                                    
                                                    <input type="hidden" class="form-control" name="id_evento" id="id_evento" value="<?php echo $rw['id_evento'] ?>" readonly>
                                            
                                                <div class="col-md-10">
                                                    <strong>Nombre completo </strong>
                                                    <input type="text" class="form-control" name="Nombres" id="Nombres" value="<?php echo $rw['Nombre'] ?>" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <strong>N° de Empleado</strong>
                                                    <input type="text" class="form-control" name="numeroEm" id="numeroEm" value="<?php echo $rw['Empleado'] ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Puesto </strong>
                                                    <input type="text" class="form-control" name="Puesto" id="Puesto" value="<?php echo $rw['DescripcionPuesto'] ?>" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>Codigo</strong>
                                                    <input type="text" class="form-control" name="Codigo" id="Codigo" value="<?php echo $rw['CodigoPuesto'] ?>" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>Fecha de ingreso</strong>
                                                    <input type="date" class="form-control " name="Fechainicio1" required value="<?php echo $rw['fechaingreso'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Nombre del Area</strong>
                                                    <input type="text" class="form-control" name="Extencion" id="exten" value="<?php echo $rw['DescripcionAdscripcion'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Especialidad</strong>
                                                    <input type="text" class="form-control" name="Especialidad" id="Especialidad" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <strong>Servicio</strong>
                                                    <input type="text" class="form-control" name="Extencion" id="exten" value="<?php echo $rw['descripcionestructura3'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Turno</strong>
                                                    <input type="text" class="form-control" name="turno" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Dias laborales </strong>
                                                    <input type="text" class="form-control" name="Dias" id="Dias" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div><label class="form-check-label">
                                                            Curso Interno
                                                        </label>
                                                        <input class="form-check-input" type="radio" name="tipoCurso" id="gridRadios1" value="Ponencia Nacional" <?php echo $rw['tipodecurso']; ?> <?php if ($rw['tipodecurso'] == "Ponencia Nacional") echo 'checked="checked"' ?> required disabled>
                                                    </div>


                                                    &nbsp;&nbsp;
                                                    <div><label class="form-check-label">
                                                            Curso Externo
                                                        </label>
                                                        <input class="form-check-input" type="radio" name="tipoCurso" id="gridRadios1" value="Ponencia Internacional" <?php echo $rw['tipodecurso']; ?> <?php if ($rw['tipodecurso'] == "Ponencia Internacional") echo 'checked="checked"' ?> readonly disabled>
                                                    </div>


                                                </div>
                                                <div class="col-md-10">
                                                    <strong>Correo electronico</strong>
                                                    <input type="email" class="form-control" id="Correo" value="<?php echo $rw['correo'] ?>" readonly>
                                                </div>


                                                <div class="col-md-2">
                                                    <strong>Teléfono</strong>
                                                    <input type="text" class="form-control" name="Telefono" id="telefono" value="<?php echo $rw['telefonocelular'] ?>" readonly>
                                                </div>



                                                <div class="col-md-4">
                                                    <strong>Nombre del Jefe Inmediato</strong>
                                                    <input type="text" class="form-control" name="Nombrejefe" id="Nombrejefe" value="<?php echo $rowj['nombre'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Cargo del jefe inmediato </strong>
                                                    <input type="text" class="form-control" name="Cargojefe" id="Cargojefe" value="<?php echo $rowj['correo'] ?>" readonly>
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
                                            <?php
                                                    $nombrecurso = 'comprobatedocumento';
                                                    $documento = $rw['anotedocumentos'];
                                            ?>
                                            <div class="row g-3 needs-validation">
                                                <div class="col-md-12" style="text-align: center; font-size: 25px; color: white; background-color: #162765; margin: 0px 0px 0px 0px; border: none;">
                                                    <label style="text-transform: uppercase; font-size: 20px"> Evento</label>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Nombre del evento académico</strong>
                                                    <input type="text" class="form-control" name="Eventoacademico" id="Eventoacademico"   value="<?php echo $rw['Nombre_evento'] ?>" readonly>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Modalidad y actividad que realizará </strong>
                                                    <input type="text" class="form-control" name="Modalidad" id="Modalidad"  value="<?php echo $rw['modalidad_actividades'] ?>" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Lugar donde se impartira. </strong>
                                                    <input type="text" class="form-control" name="lugarimpartira" id="Modalidad"  value="<?php echo $rw['lugar_dondeimpar'] ?>" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <strong>Fecha de Inicio</strong>
                                                    <input type="date" class="form-control " name="Fechainicioevento" value="<?php echo $rw['fecha_inicia'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Fecha de termino</strong>
                                                    <input type="date" class="form-control " name="Fechaterminoevento" value="<?php echo $rw['fecha_termino'] ?>" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <strong>Horario Establecido</strong>
                                                    <input type="text" class="form-control" name="Horarios" id="Horarios" value="<?php echo $rw['horario_establecido'] ?>" readonly>
                                                </div>

                                                <div class="col-md-12" style="text-align: center;">
                                                    <strong style="font-size: 15px">Documento cargado: </strong>
                                                
                                                    <a href="<?php echo "$documento$nombrecurso.pdf" ?>" target="_blank">Ver archivo</a>
                                                </div>

                                                <div class="col-md-12" style="text-align: center;">
                                                    <strong>Describa brevemente su solicitud.</strong>
                                                    <textarea rows="4" class="form-control" name="comentarioSolicitud" readonly><?php echo $rw['descripcionevento'] ?></textarea>
                                                </div>

                                                <div class="col-md-12" style="text-align: center;">
                                                    <strong>Comentario del jefe inmediato de contribución al
                                                        servicio de la capacitación solicitada.</strong>
                                                    <textarea rows="4" class="form-control" name="comentarioJefe" required><?php echo $rw['comentariojefe'] ?></textarea>
                                                </div>
                                                <div class="col-md-12" style="width: 100%; height: auto; display: flex; justify-content: center;">
                                                    <input class="form-check-input" type="radio" name="validacion" id="gridRadios1" value="1" <?php echo $rw['validaautorizacion']; ?> <?php if ($rw['validaautorizacion'] == "1") echo 'checked="checked"' ?> >
                                                    <label class="form-check-label">
                                                        Autorizar
                                                    </label>&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="validacion" id="gridRadios1" value="2" <?php echo $rw['validaautorizacion']; ?> <?php if ($rw['validaautorizacion'] == "2") echo 'checked="checked"' ?> >
                                                    <label class="form-check-label">
                                                        Denegar
                                                    </label><br>
                                                
                                                </div>
                                                <div style="width: 100%; height: auto; display: flex; justify-content: center; align-items:center;">
                                                    <a href="#" class="btn btn-warning" onclick="window.history.back();">Cerrar</a>&nbsp;&nbsp;
                                                    <input type="submit" name="Guardar" class="btn btn-primary  btn-block" value="Guardar información">

                                                </div>

                                        </fieldset>

                                    </section>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
</body>
                

</html>