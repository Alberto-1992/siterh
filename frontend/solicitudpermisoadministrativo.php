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
                <header style="width: auto; height: auto; margin-top: 0px; padding: 5px; text-align: center; color: rgb(0, 0, 0); background: #9E9E9E; border-radius: 10px; color: white;">
                    <p>Permiso administrativo
                        Beca tiempo menor a 30 dias
                        Asistente.</p>
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
                    require_once 'clases/conexion.php';
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
                        <!--<div class="btn-group;col-md-3">
                                    <button type="button" class="open-modal" data-open="modal1" id="boton1">
                                        Instruccciones
                                    </button>
                                </div>&nbsp;&nbsp;-->
                        <div class="btn-group;col-md-3">
                            <button type="button" class="open-modal" data-open="modal2" id="boton2">
                                LLenado
                            </button>
                        </div>
                    </div>
                    <div class="modal" id="modal1" data-animation="slideInOutLeft">
                        <div class="modal-dialog modal-xl">
                            <header class="modal-header">
                                <h1>INSTRUCTIVO DE LLENADO</h1>
                                <input type="submit" class="close-modal" value="X" onclick="window.location.href='solicitudpermisoadministrativo'">

                            </header>
                            <section class="modal-content">

                                <blockquote>
                                    1. Llenar toda la cédula con letra de molde.<br>
                                    2. Escribir el día y el mes en que realiza la solicitud.<br>
                                    3. Colocar todos sus DATOS PERSONALES sin abreviaturas y sin omitir ningún dato.<br>
                                    4. Colocar todos los DATOS ESPECÍFICOS DEL EVENTO ACADÉMICO sin abreviaturas y sin
                                    omitir
                                    ningún
                                    dato.<br>
                                    5. Escriba el nombre completo del evento académico.<br>
                                    6. Describa la modalidad y actividad que realizará.<br>
                                    Ej. ponente en congreso, invitado como docente, asistente como congresista, invitado
                                    como
                                    ponente en
                                    representación del HRAE Ixtapaluca.<br>
                                    7. Escribir el nombre completo del lugar en donde se llevará a cabo el evento
                                    académico.<br>
                                    8. Colocar la fecha de inicio y fecha de término del evento académico.<br>
                                    9. Referir el horario en que se llevará a cabo el evento académico.<br>
                                    10. Colocar el nombre del documento que anexa a la petición.<br>
                                    Ej. Ficha de inscripción, tríptico, programa y, en su caso, oficio de invitación.<br>
                                    11. Describa brevemente su solicitud.<br>
                                    Ej. Solicito los Días… solicito las horas de los días… solicito las veladas de los
                                    días.<br>
                                    12. Su jefe inmediato debe realizar un comentario de manera escrita, referente a la
                                    contribución que
                                    hará al servicio en el cual se encuentra adscrito.<br>
                                    13. Escribir el nombre completo y la firma del jefe inmediato.<br>
                                    14. Escribir el nombre completo y la firma del solicitante.<br>
                                    15. En el caso de que el evento donde se participe sea de carácter presencial fuera de
                                    la
                                    institución y
                                    de haberse decretado y/o existir alguna emergencia sanitaria, se deberá presentar un
                                    documento donde
                                    se
                                    indique si la institución y/o dependencia a la que acudirá cuenta con los protocolos de
                                    limpieza,
                                    desinfección, toma de temperatura y espacios sanitarios que resguarden la seguridad
                                    higiénica del
                                    personal que asista.</blockquote>
                                <blockquote>
                                    NOTAS:

                                    • La entrega de este formato debe realizarse con 10 días naturales de anticipación al
                                    evento
                                    académico,
                                    a la Subdirección de Recursos Humanos.<br>
                                    - En los casos donde se reciba una solicitud de manera extemporánea, este se autorizará
                                    siempre
                                    y cuando
                                    sea de suma importancia para el área o servicio en donde desempeña sus funciones, además
                                    de
                                    que
                                    deberá
                                    tener el visto bueno del director del área.<br>
                                    • Al presente formato debe anexar, ficha de inscripción tríptico, programa y, en su
                                    caso,
                                    oficio
                                    de
                                    invitación.<br>
                                    • Si el evento se realizará en el extranjero, adicionalmente a la documentación
                                    anteriormente
                                    solicitada
                                    deberá anexar copia de la solicitud y la aprobación de visto bueno del Secretario de
                                    Salud,
                                    de
                                    lo
                                    contrario no procederá su solicitud.<br>
                                    • Si un evento académico es requerido por más de una persona de la misma área, el jefe
                                    inmediato
                                    deberá
                                    describir en el formato de solicitud la no afectación en la continuidad del servicio en
                                    la
                                    calidad y
                                    atención de los usuarios.<br>
                                    • La entrega de la presente solicitud no es compromiso de autorización final.
                                    • El seguimiento del trámite, es responsabilidad del solicitante.<br>
                                    • La persona servidora pública quedará obligada a entregar ante la Subdirección de
                                    Recursos
                                    Humanos
                                    copia del documento comprobatorio o constancia de asistencia dentro de los 10 días
                                    naturales
                                    posteriores
                                    a la fecha de término del evento y presentar el documento original para su cotejo”.<br>
                                    • Respecto a los eventos en el extranjero además de la constancia, deberán entregar
                                    copia
                                    del
                                    informe
                                    que contenga las actividades realizadas y objetivos logrados en beneficio al desempeño
                                    de
                                    sus
                                    funciones.
                                    • En caso de cancelación del evento, el trabajador deberá notificar oportunamente
                                    mediante
                                    oficio a la
                                    Subdirección de Recursos Humanos, con la finalidad de no verse afectado en sus
                                    percepciones.
                                    • De no entregar copia del documento comprobatorio de asistencia (constancia), se pone
                                    de
                                    manifiesto que
                                    usted no asistió al evento académico y la justificación de la beca tiempo se dará por
                                    cancelada,
                                    por lo
                                    que se procederá a la aplicación del descuento correspondiente vía nómina y los días
                                    solicitados
                                    serán
                                    considerados como faltas injustificadas.<br>
                                    • En el supuesto, de que al término del evento no reciba comprobante de su asistencia al
                                    evento,
                                    imposibilitándolo a realizar la entrega en el tiempo requerido, deberá notificar por
                                    escrito
                                    (Oficio
                                    dirigido al Subdirector de Recursos Humanos) el motivo por el cual no recibió dicho
                                    documento,
                                    así
                                    mismo, deberá especificar el compromiso de su entrega una vez obtenido el documento
                                    original.<br>
                                    • Adicionalmente para el caso del personal adscrito a la Dirección médica, deberá contar
                                    en
                                    su
                                    expediente personal con las acreditaciones certificaciones asociadas a su especialidad
                                    vigentes
                                    o
                                    evidencia que se encuentra en trámite vigentes, como le es requerido en la Ley General
                                    de
                                    Salud
                                    e
                                    informar con tiempo a la Unidad de Consulta Externa t Teleconsulta el periodo autorizado
                                    para
                                    cierre de
                                    la agenda, (personal que cuenta con agenda para consultas).<br>
                                    • Una vez que se le notifique que ya se cuenta con la respuesta a su solicitud, tendrá
                                    un
                                    plazo
                                    no mayor
                                    a 5 días naturales contados a partir del día siguiente de la fecha de la notificación
                                    para
                                    recogerla;
                                    por lo que en caso de que la respuesta a su solicitud haya sido favorable y ésta no sea
                                    recogida
                                    en el
                                    tiempo anteriormente citado quedara cancelada.</blockquote>

                                </h3><br>
                            </section>
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
                                            <input type="text" class="form-control" name="turno" required>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Dias laborales </strong>
                                            <input type="text" class="form-control" name="Dias" id="Dias" required>
                                        </div>
                                        <div class="col-md-4">
                                            <div><label class="form-check-label">
                                                    Curso Interno
                                                </label>
                                                <input class="form-check-input" type="radio" name="tipoCurso" id="gridRadios1" value="Ponencia Nacional" required>
                                            </div>


                                            &nbsp;&nbsp;
                                            <div><label class="form-check-label">
                                                    Curso Externo
                                                </label>
                                                <input class="form-check-input" type="radio" name="tipoCurso" id="gridRadios1" value="Ponencia Internacional">
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
            $sql = $conexionX->prepare("SELECT * from eventocapacitacion where id_empleado = $identificador order by id_evento desc");
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

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dataRegistro = $sql->fetch()) {
                        $valor = $dataRegistro['id_evento'];
                        $nombrecurso = 'comprobatedocumento';
                        $fechatermino = $dataRegistro['fecha_inicia'];
                        $id_empleado = $dataRegistro['id_empleado'];
                        $documento = $dataRegistro['anotedocumentos'];
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
                            <td><?php if ($dataRegistro['validaautorizacion'] == 1) { ?><a href="formatoBecaTiempo">Generar pdf</a><?php } else if ($dataRegistro['validaautorizacion'] == 2) { ?>Solicitud negada <?php } ?></td>


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