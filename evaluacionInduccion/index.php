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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
</head>

<body>

    <?php
    date_default_timezone_set('America/mexico_city');
    $hoy = date("Y-m-d");
    ?>
    <div id="mensaje"></div>
    <div class="container">

        <header
            style="width: auto; height: auto; margin-top: 15px; padding: 10px; text-align: center; color: rgb(0, 0, 0); font-size: 35px; background: #00c6ab; ">
            <strong style="text-transform: uppercase; font-size: 25px;"> Cédula de Evaluación de inducción al
                puesto</strong>
        </header>

        <script>
            function limpiarformulario() {
                setTimeout('document.msform.reset()', 1000);
                return false;
            }
        </script>

        <form class="row g-3 needs-validation" novalidate id="msform" onsubmit="return limpiarformulario();">
            <script>
                $("#msform").on("submit", function (e) {
                    e.preventDefault();

                    var formData = new FormData(document.getElementById("msform"));
                    formData.append("dato", "valor");

                    $.ajax({

                        url: "guardarDatosCedulaInduccion.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (data) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(../imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function (data) {
                            $("#mensaje").html(data);
                            //window.location.reload();

                        }
                    })

                })

            </script>
            <section class="text-end"> <strong style="text-transform: uppercase; font-size: 18px">Ixtapaluca,Estado de
                    México</strong> <input type="date" name="fechahoy" value="<?php echo $hoy ?>"></section><br>

            <div class="col-md-12" style=" color: rgb(0, 0, 0); font-size: 20px;">
                <strong>Objetivo: Brindar orientación al empleado de nuevo ingreso respecto a las funciones de su puesto
                    y
                    las principales
                    características del área y/o servicio.
                </strong>
            </div><br>
            </section>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Datos del Trabajador</label>
            </div>

            <div class="col-md-3">
                <label class="form-label">Nombre del Trabajador </label>
                <input type="text" class="form-control" name="Trabajador" id="Trabajador1">
            </div>
            <div class="col-md-3">
                <label class="form-label">Número de Empleado</label>
                <input type="text" class="form-control" name="Empleado" id="Empleado1" onblur="buscar_datos()">
            </div>

            <div class="col-md-3">
                <label class="form-label">Puesto </label>
                <input type="text" class="form-control" name="Puesto" id="Puesto1">
            </div>

            <div class="col-md-3">
                <label class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" nombre="Fechaingreso" id="Fechaingreso">
            </div>


            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Datos del área y/o servicio de adscripción
                </label>
            </div>

            <div class="col-md-4">
                <label class="form">Nombre del área</label>
                <input type="text" class="form-control" name="nombreárea" id="nombreárea">
            </div>
            <div class="col-md-4">
                <label class="form">Nombre del jefe inmediato </label>
                <input type="text" class="form-control" name="nomjefe" id="nomjefe">
            </div>

            <div class="col-md-4">
                <label class="form">Puesto del jefe inmediato </label>
                <input type="text" class="form-control" name="Puestojefe" id="Puestojefe">
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">INDUCCIÓN AL PUESTO </label>
            </div>

            <div class="col-md-6">
                <label class="form">FECHA INICIO </label>
                <input type="date" class="form-control" name="fechainicio" id="fechainicio">
            </div>
            <div class="col-md-6">
                <label class="form">FECHA DE CONCLUCIÓN </label>
                <input type="date" class="form-control" name="fechatermino" id="fechatermino">
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Componentes de la inducción </label>
            </div>
            <div class="col-md-12"
                style="text-align: center; font-size: 15px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 20px">Entrevista con el jefe inmediato </label>
            </div>


            <div class="col-md-10">
                <legend class="form-label  pt-1">1.-¿Se llevó a cabo la entrevista con el jefe inmediato de su puesto?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta1" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">2.-¿El lenguaje que se utilizó fue sencillo, claro y cordial?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta2" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>
            <div class="col-md-10">
                <legend class="form-label  pt-0">3.-¿Se llevó a cabo la presentación oficial con sus compañeros de
                    equipo de trabajo?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta3" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">4.-¿Se llevó a cabo la presentación con empleados de otras áreas con
                    las cuales se relacionará laboralmente?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta4" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 15px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Información general del área y/o servicio
                </label>

                <label style="font-size: 18px;">Instrucciones: Por favor califique objetivamente la información obtenida
                    en cada uno de los aspectos evaluados, de acuerdo con el siguiente criterio. <strong>Marque con una
                        "X" </strong>la casilla que corresponda</label>
                <strong>0.-No obtuve ninguna información al respecto</strong>
                <strong>1.-La información fue incompleta</strong>
                <strong>2.-La información fue suficiente</strong>
                <strong>3.-La informacion fue completa y detallada</strong>
            </div>


            <div class="col-md-10">
                <legend class="form-label  pt-0">5.-Se le proporcionó información del Organigrama,Misión y Visión del
                    área
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta5" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">6.-Se le dió a conocer las funciones y responsabilidades de su cargo
                    y/o puesto
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta6" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">7.-Recibió información sobre los objetivos y políticas del área
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta7" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta7" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta7" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta7" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">8.-Se le dió a conocer el plan de trabajo del área
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta8" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta8" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta8" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta8" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">9.-Se le informó acerca de las normas del área de trabajo
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta9" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta9" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta9" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta9" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">10.- Obtubo información de protocolos y/o procedimientos del área
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta10" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta10" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta10" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta10" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">11.-Recibió información de las actividades extraordinarias
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta11" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta11" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta11" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta11" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">12.- Se le dió a conocer la ubicacion del mobiliario y/o equipo a su
                    resguardo, así como su espacio
                    de trabajo y material que requiere para el desempeño de sus funciones y el procedimiento que debe
                    seguir para para tener acceso a éstos
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta12" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta12" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta12" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta12" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">13.-Recibió información acerca la ubicación de los principales servicio
                    del hospital,zonas de seguridad y/o resguardo,
                    comedor, elevadores de personal, el uso de elementos de protección personal(POE, COVID-19,entre
                    otros), así como las rutas de evacuación, etc.
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta13" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta13" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta13" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta13" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">14.- Información de solicitud y programación de vacaciones,
                    incidencias, permisos de capacitación y/o ponencias.
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta14" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta14" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta14" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta14" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-0">15.- Le manifestaron que su desempeño repercutirá en el logro de metas
                    y prioridades del área a la que pertenece.
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta15" id="gridRadios1" value="0" required="">
                <label class="form-check-label">
                    0
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta15" id="gridRadios1" value="1">
                <label class="form-check-label">
                    1
                </label>

                <input class="form-check-input" type="radio" name="pregunta15" id="gridRadios1" value="2" required="">
                <label class="form-check-label">
                    2
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta15" id="gridRadios1" value="3">
                <label class="form-check-label">
                    3
                </label>
            </div>

            <div class="col-md-12"
                style="text-align: center; font-size: 25px; color: black; background-color: #f2e8e1; margin: 0px 0px 0px 0px;">
                <label style="text-transform: uppercase; font-size: 25px">Impacto de la inducción</label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-1">16.-La información proporcionada, ¿Fue de utilidad para el mejor
                    desempeño de las funcionesde su puesto?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta16" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta16" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-1">17.-Le dieron retroalimentación para resolver sus dudas
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta17" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta17" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-10">
                <legend class="form-label  pt-1">18.-¿El tiempo utilizado para la inducción fue adecuado?
                </legend>
            </div>
            <div class="col-md-2" style="margin-top: 5px;">

                <input class="form-check-input" type="radio" name="pregunta18" id="gridRadios1" value="Si" required="">
                <label class="form-check-label">
                    SI
                </label>&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="pregunta18" id="gridRadios1" value="No">
                <label class="form-check-label">
                    NO
                </label>
            </div>

            <div class="col-md-12">
                <strong>¿Por Que?</strong>
                <textarea rows="5" class="form-control" name="Porque" required=""></textarea>
            </div>

            <div class="col-md-12">
                <h4>Comentarios y/o Sugerencias</h4>
                <textarea rows="5" class="form-control" name="Comentario" required=""></textarea>
            </div>

            <div>
                <div class="col-md-12 text-center">
                    <input type="submit" name="Guardar" class="btn btn-primary  btn-block" value="Enviar información">
                </div>
            </div>
        </form>
    </div>


</body>

</html>