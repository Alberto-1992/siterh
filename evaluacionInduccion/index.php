<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cédula de Evalucación de Introducción al puesto </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
</head>

<body style="padding: 20px;">

    <?php
    date_default_timezone_set('America/mexico_city');
    $hoy = date("Y-m-d");
    $sql = $conexionX->prepare("SELECT plantillahraei.Empleado, plantillahraei.Nombre, plantillahraei.id_jefe, plantillahraei.DescripcionPuesto, plantillahraei.DescripcionAdscripcion, plantillahraei.Nombre, jefes2022.nombre as nombrejefe, jefes2022.puesto as puestojefe from plantillahraei inner join jefes2022 on jefes2022.id_jefe = plantillahraei.id_jefe where plantillahraei.Empleado = :Empleado");
    $sql->execute(array(
        ':Empleado'=>$identificador
    ));
    $data = $sql->fetch();
    ?>
    <div id="mensaje"></div>
<div class="container" style="border: 1px solid rgb( 221 ,201, 163); padding: 8px; ">
    <form class="row g-3 needs-validation" novalidate id="msform" onsubmit="return limpiarformulario();">
    <div class="col-md-6" style="background-color: #fef6cd; margin-top: 10px;">
            <strong>Descarga de formato</strong>
<a href="../formatos/formatoInduccionInstitucional.pdf" class="form-control" target="_blank">Descarga el formato</a>
        </div>
        <div class="col-md-6" style="background-color: #fef6cd; margin-top: 10px;">
            <strong>Sube el formato que descargaste</strong>
<input type="file" class="form-control" name="cargaformato" required></input>
        </div>

        <header

            style="width: 100%; height: auto; margin-top: 15px; padding: 8px; color:white; text-align: center; font-size: 35px; background: rgb(35 , 91 , 78) ">
            <strong style="text-transform: uppercase; font-size: 25px;"> Cédula de Evaluación de inducción al
                puesto</strong>
        </header>

        <style>
            #hr {
                margin: 0px 0px 0px 0px;
                padding: 0px;
            }
        </style>

        <script>
            function limpiarformulario() {
                setTimeout('document.msform.reset()', 1000);
                return false;
            }
        </script>
        
            <script>
                $("#msform").on("submit", function (e) {


                    e.preventDefault();

                    var formData = new FormData(document.getElementById(
                        "msform"));
                    formData.append("dato", "valor");

                    $.ajax({

                        url: "evaluacionInduccion/guardarDatosCedulaInduccion.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (datos) {
                           // $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(/imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"></div>');
                        },
                        success: function (datos) {
                            $("#mensaje").html(datos);

                        }
                    })

                })

            </script>
            <section class="text-end"> <label style="text-transform: uppercase; font-size: 18px">Ixtapaluca,Estado de
                    México</label> <input type="date" name="fechahoy" value="<?php echo $hoy ?>"></section><br>

            <div class="col-md-12" style=" color: rgb(0, 0, 0); font-size: 20px;">
                <label>Objetivo: Evaluar la información proporcionada al empleado de nuevo ingreso con respecto a las
                    funciones de su puesto y las
                    principales características del área y/o servicio en el cual se va a desempeñar
                </label>
            </div><br>
            </section>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color:rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Datos del Trabajador</label>
            </div>

            <div class="col-md-3">
                <label class="form-label">Nombre del Trabajador </label>
                <input type="text" class="form-control" name="Trabajador" id="Trabajador1" value="<?php echo $data['Nombre'] ?>" >
            </div>
            <div class="col-md-3">
                <label class="form-label">Número de Empleado</label>
                <input type="text" class="form-control" name="Empleado" id="Empleado1" value="<?php echo $data['Empleado'] ?>" >
            </div>

            <div class="col-md-3">
                <label class="form-label">Puesto </label>
                <input type="text" class="form-control" name="Puesto" id="Puesto1" value="<?php echo $data['DescripcionPuesto'] ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" nombre="Fechaingreso" id="Fechaingreso" >
            </div>


            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Datos del área y/o servicio de adscripción
                </label>
            </div>

            <div class="col-md-4">
                <label class="form">Nombre del área</label>
                <input type="text" class="form-control" name="nombreárea" id="nombreárea" value="<?php echo $data['DescripcionAdscripcion'] ?>">
            </div>
            <div class="col-md-4">
                <label class="form">Nombre del jefe inmediato </label>
                <input type="text" class="form-control" name="nomjefe" id="nomjefe" value="<?php echo $data['nombrejefe'] ?>">
            </div>

            <div class="col-md-4">
                <label class="form">Puesto del jefe inmediato </label>
                <input type="text" class="form-control" name="Puestojefe" id="Puestojefe" value="<?php echo $data['puestojefe'] ?>">
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color:rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">INDUCCIÓN AL PUESTO </label>
            </div>

            <div class="col-md-12" style=" color: black; font-size: 20px; background-color: #fef6cd; margin-top: 0px;">
                <strong>Nota: La fecha deberá corresponder al día en el que iniciaste y concluiste la capacitación en tu
                    servicio.
                </strong>
            </div>

            <div class="col-md-6">
                <label class="form">FECHA INICIO </label>
                <input type="date" class="form-control" name="fechainicio" id="fechainicio">
            </div>
            <div class="col-md-6">
                <label class="form">FECHA DE CONCLUCIÓN </label>
                <input type="date" class="form-control" name="fecchatermino" id="fecchatermino">
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Componentes de la inducción </label>
            </div>
            <div class="col-md-12"
                style="text-align: center; font-size: 15px; color: black; background-color: rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 20px">Entrevista con el jefe inmediato </label>
            </div>

            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-1">1.-¿Se llevó a cabo la entrevista con el jefe inmediato de su
                        puesto?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 10px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="Entrevistajefe" id="Entrevistajefe" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="Entrevistajefe" id="Entrevistajefe" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">

                <div class="col-md-10">
                    <legend class="form-label  pt-0">2.-¿El lenguaje que se utilizó fue sencillo, claro y cordial?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 10px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="lenguajeutilizo" id="lenguajeutilizo" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="lenguajeutilizo" id="lenguajeutilizo" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">3.-¿Se llevó a cabo la presentación oficial con sus compañeros de
                        equipo de trabajo?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 10px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="precentacionoficial" id=" precentacionoficial" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="precentacionoficial" id="precentacionoficial" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">4.-¿Se llevó a cabo la presentación con empleados de otras áreas
                        con
                        las cuales se relacionará laboralmente?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 10px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="presentaempleados" id="presentaempleados" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="presentaempleados" id="presentaempleados" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>

            <div class="col-md-12"
                style="text-align: center; font-size: 15px; color: black; background-color: rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Información general del área y/o servicio
                </label>

                <label style="font-size: 18px;">Instrucciones: Por favor califique objetivamente la información obtenida
                    en cada uno de los aspectos evaluados, de acuerdo con el siguiente criterio. <br> <strong>Marque con una
                        "X" </strong>la casilla que corresponda.</label><br><br>
                <strong>0.-No obtuve ninguna información al respecto</strong>
                <strong>1.-La información fue incompleta</strong>
                <strong>2.-La información fue suficiente</strong>
                <strong>3.-La informacion fue completa y detallada</strong>
            </div>

            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">5.-Se le proporcionó información del Organigrama,Misión y Visión
                        del
                        área
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="infOrganigrama" id="infOrganigrama" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="infOrganigrama" id="infOrganigrama" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="infOrganigrama" id="infOrganigrama" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="infOrganigrama" id="infOrganigrama" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">

            <fieldset class="row mb-3">

                <div class="col-md-10">
                    <legend class="form-label  pt-0">6.-Se le dió a conocer las funciones y responsabilidades de su
                        cargo
                        y/o puesto
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="funcionesyrespo" id="funcionesyrespo" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="funcionesyrespo" id="funcionesyrespo" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="funcionesyrespo" id="funcionesyrespo" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="funcionesyrespo" id="funcionesyrespo" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">

            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">7.-Recibió información sobre los objetivos y políticas del área
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="objetivosypoliticas" id="objetivosypoliticas" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="objetivosypoliticas" id="objetivosypoliticas" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="objetivosypoliticas" id="objetivosypoliticas" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="objetivosypoliticas" id="objetivosypoliticas" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">8.-Se le dió a conocer el plan de trabajo del área
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="plantrabajo" id="plantrabajo" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="plantrabajo" id="plantrabajo" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="plantrabajo" id="plantrabajo" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="plantrabajo" id="plantrabajo" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">9.-Se le informó acerca de las normas del área de trabajo
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="normasarea" id="normasarea" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="normasarea" id="normasarea" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="normasarea" id="normasarea" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="normasarea" id="normasarea" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">10.- Obtubo información de protocolos y/o procedimientos del área
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="protocoloypocedimiento" id="protocoloypocedimiento" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="protocoloypocedimiento" id="protocoloypocedimiento" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="protocoloypocedimiento" id="protocoloypocedimiento" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="protocoloypocedimiento" id="protocoloypocedimiento" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">11.-Recibió información de las actividades extraordinarias
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="actiextraordinarias" id="actiextraordinarias" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="actiextraordinarias" id="actiextraordinarias" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="actiextraordinarias" id="actiextraordinarias" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="actiextraordinarias" id="actiextraordinarias" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">12.- Se le dió a conocer la ubicacion del mobiliario y/o equipo a
                        su
                        resguardo, así como su espacio
                        de trabajo y material que requiere para el desempeño de sus funciones y el procedimiento que
                        debe
                        seguir para para tener acceso a éstos
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 50px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="ubicacionmobiliario" id="ubicacionmobiliario" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="ubicacionmobiliario" id="ubicacionmobiliario" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="ubicacionmobiliario" id="ubicacionmobiliario" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="ubicacionmobiliario" id="ubicacionmobiliario" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">13.-Recibió información acerca la ubicación de los principales
                        servicio
                        del hospital,zonas de seguridad y/o resguardo,
                        comedor, elevadores de personal, el uso de elementos de protección personal(POE, COVID-19,entre
                        otros), así como las rutas de evacuación, etc.
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 55px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="principaleservicios" id="principaleservicios" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="principaleservicios" id="principaleservicios" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="principaleservicios" id="principaleservicios" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="principaleservicios" id="principaleservicios" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">14.- Información de solicitud y programación de vacaciones,
                        incidencias, permisos de capacitación y/o ponencias.
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 20px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="solicitudyprogramacion" id="solicitudyprogramacion" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="solicitudyprogramacion" id="solicitudyprogramacion" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="solicitudyprogramacion" id="solicitudyprogramacion" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="solicitudyprogramacion" id="solicitudyprogramacion" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-0">15.- Le manifestaron que su desempeño repercutirá en el logro de
                        metas
                        y prioridades del área a la que pertenece.
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 20px; text-align: center ;font-size: 15px">

                    <input class="form-check-input" type="radio" name="desempeñorepercute" id="desempeñorepercute" value="0"
                        required="">
                    <label class="form-check-label">
                        0
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="desempeñorepercute" id="desempeñorepercute" value="1">
                    <label class="form-check-label">
                        1
                    </label>

                    <input class="form-check-input" type="radio" name="desempeñorepercute" id="desempeñorepercute" value="2"
                        required="">
                    <label class="form-check-label">
                        2
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="desempeñorepercute" id="desempeñorepercute" value="3">
                    <label class="form-check-label">
                        3
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
                <div class="col-md-12"
                style="text-align: center; font-size: 15px; color: black; background-color: rgb( 221 ,201, 163); margin: 0px 0px 0px 0px;">
                    <label style="text-transform: uppercase; font-size: 25px">Impacto de la inducción</label>
                </div>
                <fieldset class="row mb-3" text-center>
                <div class="col-md-10">
                    <legend class="form-label  pt-1">16.-La información proporcionada, ¿Fue de utilidad para el mejor
                        desempeño de las funcionesde su puesto?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="fueutil" id="fueutil" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="fueutil" id="fueutil" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-1">17.-Le dieron retroalimentación para resolver sus dudas
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 18px">

                    <input class=" form-check-input" type="radio" name="retroalimentacion" id="retroalimentacion" value="Si"
                    required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="retroalimentacion" id="retroalimentacion" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>

            </fieldset>
            <hr id="hr">
            <fieldset class="row mb-3">
                <div class="col-md-10">
                    <legend class="form-label  pt-1">18.-¿El tiempo utilizado para la inducción fue adecuado?
                    </legend>
                </div>
                <div class="col-md-2" style="margin-top: 15px; text-align: center ;font-size: 18px">

                    <input class="form-check-input" type="radio" name="tiempoutilisado" id="tiempoutilisado" value="Si"
                        required="">
                    <label class="form-check-label">
                        SI
                    </label>&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="tiempoutilisado" id="tiempoutilisado" value="No">
                    <label class="form-check-label">
                        NO
                    </label>
                </div>
            </fieldset>
            <hr id="hr">
            <div class="col-md-12">
            <legend class="form-label  pt-1">¿Por Que?</legend>
                <textarea rows="5" class="form-control" name="Porque" required=""></textarea>
            </div>

            <div class="col-md-12">
            <legend class="form-label  pt-1">Comentarios y/o Sugerencias</legend>
                <textarea rows="5" class="form-control" name="Comentario" required=""></textarea>
            </div>

            <div>
                <div class="col-md-12 text-center">
                    <input type="submit" name="Guardar" class="btn btn-primary  btn-block" value="Enviar información">
                </div>
            </div>
            <br><br>
        </form>
    </div>


</body>

<script>

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

    function deshabilitaRetroceso() {
        window.location.hash = "no-back-button";
        window.location.hash = "Again-No-back-button" //chrome
        window.onhashchange = function () { window.location.hash = "no-back-button"; }

    }

</script>

</html>