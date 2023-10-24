<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <title>Creacion de eventos</title>
    <style>
        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }



        body {
            font-family: montserrat, arial, verdana;

        }

        /*form styles*/
        #msform {
            width: 60rem;
            margin: 40px auto;
            text-align: center;
            position: relative;
            background-color: #ffffff;

        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 15px rgba(0, 0, 0, 0.4);
            padding: 10px 20px;
            box-sizing: border-box;
            width: 100%;
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*buttons*/
        #msform .action-button {
            width: 120px;
            background: #e7e7e7;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px;
            margin: 10px 5px;
            text-decoration: none;
            font-size: 14px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px;
        }

        #msform .action-button-save {
            width: 120px;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px #eee;
            cursor: pointer;
            padding: 10px;
            margin: 10px 5px;
            text-decoration: none;
            font-size: 14px;
        }

        #msform .action-button-save:hover,
        #msform .action-button-save:focus {
            box-shadow: 0 0 0 2px wheat, 0 0 0 3px;
        }

        /*headings*/
        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            background-color: #e7e7e7;
            padding: 10px;
            margin-bottom: 20px;
            overflow: hidden;
            position: sticky;
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            font-size: 12px;
            width: 16%;
            float: left;
            position: relative;
            cursor: pointer;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #27AE60;
            color: white;
        }
    </style>



</head>

<body onload="deshabilitaRetroceso()">
    <div id="mensaje"></div>
    <header style="width: 100; height: auto; background-color: #03CAB1; text-align:center; color: white; font-size: 23px; padding: 5px;">
        
            <span id="cabecera">Capacitación.</span>

        </header>


    <!-- multistep form -->
    <form class="row g-3 needs-validation" id="msform">
        <script>
            $("#msform").on("submit", function (th) {

                th.preventDefault();

                var formData = new FormData(document.getElementById(
                    "msform"));
                formData.append("dato", "valor");
                /*if ($('submit').val().length == 0) {
                    alert(' datos vacios ');
                } else {*/

                $.ajax({

                    url: "aplicacion/registroEventosCapacitacion.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function (datos) {
                        $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(./imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                    },
                    success: function (datos) {
                        $("#mensaje").html(datos);
                        document.getElementById("msform").reset();//recarga el formulario al se pulsado el boton ::

                    }
                })


            })

        </script>
        <!--progressbar -->
        <input type="submit" name="guardar" class="action-button-save" value="Actualizar Datos"
            style="background-color: orange; font-size: 11px; color: black;">
        <a href="principalCapacitacion" class="action-button-save" style="background-color: red; font-size: 11px; color: white;">Cerrar Ventana</a>
        <ul id="progressbar">
            <li class="active">Provedor</li>
            <li>Programa Propuesto </li>
            <li>Linea Estratejica</li>
            <li>Area de Cordinacion</li>
            <li>Programa</li>
            <li>Tipo de accion</li>
            <li>Area Fortalecimiento</li>
            <li>Tipo de personal</li>
            <li>Modalidad</li>
            <li>Tipo de competencia</li>
        </ul>
        <!--fieldsets -->

        <fieldset nombre="provedor1">

            <div class="row g-3 needs-validation">

                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Provedor</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre</strong>
                    <input type="text" class="form-control" name="nombreProvedor">
                    <input type="hidden" class="form-control" name="operacion" value="1">
                </div>

                <div class="col-md-6">
                    <strong>Correo electronico</strong>
                    <input type="email" onkeyup="deleteSpmail();" class="form-control" name="correo">
                </div>

                <div class="col-md-6">
                    <strong>Tipo de provedor</strong>
                    <input type="text" class="form-control" name="tipo_provedor">
                </div>

                <div class="col-md-6">
                    <strong>Telefono </strong>
                    <input type="text" class="form-control" name="telefono">
                </div>

            </div>

            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset nome="NombreprogragaPropuesto1">

            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Programa propuesto</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del programa</strong>
                    <input type="text" class="form-control" name="NombreprogragaPropuesto">
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Linea Estratejica</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre de la Linea Estratejica</strong>
                    <input type="text" class="form-control" name="LineEstratejica">
                </div>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Area de Cordinacion</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del area de Cordinacion</strong>
                    <input type="text" class="form-control" name="Areacordinacion">
                </div>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>

            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Programa</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del Programa</strong>
                    <input type="text" class="form-control" name="nombredelPrograma">
                </div>
            </div>


            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Tipo de accion</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del Tipo de accion</strong>
                    <input type="text" class="form-control" name="tipodeAccion">
                </div>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>


        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Area Fortalecimiento</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del Area Fortalecimiento</strong>
                    <input type="text" class="form-control" name="AreaFortalese">
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Tipo de personal</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del Tipo de personal</strong>
                    <input type="text" class="form-control" name="Personaltipo">
                </div>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Modalidad</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre de la Modalidad</strong>
                    <input type="text" class="form-control" name="Modalidad_tomar">
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
            <input type="button" name="next" class="next action-button" value="Next"
                style="background-color: yellow; color: black;" />
        </fieldset>


        <fieldset>
            <div class="form-row">
                <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
                    <label>Tipo de competencia</label>
                </div>
                <div class="col-md-6">
                    <strong>Nombre del Tipo de competencia</strong>
                    <input type="text" class="form-control" name="Competenciatipo">
                </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous"
                style="background-color: yellow; color: black;" />
        </fieldset><br><br>

        </div>


    </form><br>


    <br><br>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script id="rendered-js">

        //jQuery time
        var $form = $("#msform");
        var current_fs = 0;
        var animating = false;

        function gotoStep(step) {
            if (animating || step === current_fs) {
                return;
            }

            animating = true;

            var $step_fs = $("fieldset", $form).eq(step);
            var $current_fs = $("fieldset", $form).eq(current_fs);
            // deactivate next steps
            $("#progressbar li:gt(" + step + ")", $form).removeClass("active");
            // activate step and previous
            $("#progressbar li:lt(" + (step + 1) + ")", $form).addClass("active");

            //show the next fieldset
            $step_fs.show();
            //hide the current fieldset with style
            $current_fs.animate({ opacity: 0 }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    var scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    var left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    var opacity = 1 - now;
                    $current_fs.css({
                        'left': left,
                        'position': 'trasform'
                    });
                    $step_fs.css({ 'left': 'scale(' + scale + ')', 'opacity': opacity });
                },
                duration: 800,
                complete: function () {
                    $current_fs.hide();
                    current_fs = step;
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        }

        $(".next", $form).click(function () {
            gotoStep(current_fs + 1);
        });

        $(".previous", $form).click(function () {
            gotoStep(current_fs - 1);
        });

        $("#progressbar li", $form).click(function () {
            var step = $("#progressbar li", $form).index($(this));
            gotoStep(step);
        });

        /*(".submit", $form).click(function () {
            return false;
        });*/
        //# sourceURL=pen.js
        function deshabilitaRetroceso() {
            window.location.hash = "no-back-button";
            window.location.hash = "Again-No-back-button" //chrome
            window.onhashchange = function () { window.location.hash = "no-back-button"; }

        }

    </script>

    <br>
    
</body>

</html>