<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="css/estilosMenu.css" rel="stylesheet">
    <link rel="stylesheet" href="css/multiple-select.css" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Creacion de eventos</title>
</head>
<header class="headerinfarto" style="background-color: #03CAB1;">

    <span id="cabecera">Capacitacion.</span>

</header>

<body>
    <?php error_reporting(0); ?>
    <div id="mensaje"></div>
    <div class="container" style="background-color: white; margin-top: 55px;">


        <header style="width: auto; height: auto; margin-top: 15px; padding: 0px; text-align: center; background: #bdbfbf; border:0.5px solid #E6E6E6; border-radius: 10px;">
            <strong style="font-size: 35px; color: white; font-size: 25px; font-style:normal;">Eventos de capacitación</strong>
        </header><br>

        <script>
            function limpiarformulario() {
                setTimeout('document.msform.reset()', 1000);
                return false;
            }
        </script>
        <form id="msform" name="msform" onsubmit="return limpiarformulario();">
            <script>
                $("#msform").on("submit", function(th) {


                    th.preventDefault();

                    var formData = new FormData(document.getElementById(
                        "msform"));
                    formData.append("dato", "valor");
                    if ($('select').val().length == 0) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Todos los campos son requeridos',
                            showConfirmButton: false,
                            timer: 1900
                        })
                    } else {

                        $.ajax({

                            url: "aplicacion/cargaCursoCapacitacion.php",
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
                    }
                })
            </script>

            <figure id="curso">

                <div class="form-row">
                    <div class="col-md-8">
                        <label>Nombre del curso</label>
                        <input type="text" class="form-control" name="Nombrecurso">
                    </div>
                    <div class="col-md-4">
                        <label>Programa</label>
                        <select class="form-control" name="programa">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM programa_propuesto");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) : 
                                echo '<option value="' . $valores["nombre_programapropuesto"] . '">' . $valores["nombre_programapropuesto"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Linea Estratejica</label>
                        <select class="form-control" name="LineaEstratejica">
                            <option selected disabled value="">Choose...</option>
                            <?php

                            $query = $conexionX->prepare("SELECT * FROM lineaestrategica");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["descripcionlinea"] . '">' . $valores["descripcionlinea"] . '</option>';
                            endforeach;

                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Area que coordina</label>
                        <select class="form-control" name="AreaCordina">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM are_cordina");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["id_area_cordina"] . '">' . $valores["nombre_areacordina"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Proveedor</label>
                        <select type="form-select" class="form-control" name="Provedor">
                            <option selected value="">Choose...</option>
                            <?php

                            $query = $conexionX->prepare("SELECT * FROM provedor");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["id_probedor"] . '">' . $valores["nombreprovedor"] . '</option>';
                            endforeach;

                            ?>
                        </select>
                    </div>
                    <div class="col-md-3" style="background-color: white; display: flex; align-items: center; margin-top: 15px;">
                        <div class="form-check form-switch" style="background-color: white;">
                            <label for="convulsion" class="form-check-label">Tiene costo?</label>
                            <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="tienecosto" id="tienecosto" value="Si" style="float: left; margin-left: 30px;" onclick="accion();">
                        </div>
                    </div>
                    <script>
                        $(function() {
                            $('#costo').prop("disabled", true);
                            $('#programapresupuesto').prop("disabled", true);
                            $('#costo').val("0");
                            $('#programapresupuesto').prop("selectedIndex", 0);


                        });

                        function accion() {

                            if ($('input[name=tienecosto]:checked').val()) {
                                $('#costo').prop("disabled", false);
                                $('#programapresupuesto').prop("disabled", false);
                                $('#costo').val("");
                                $('#programapresupuesto').prop("selectedIndex", 0);
                            } else {
                                $('#costo').prop("disabled", true);
                                $('#programapresupuesto').prop("disabled", true);
                                $('#costo').val("0");
                                $('#programapresupuesto').prop("selectedIndex", 0);
                            }
                        }
                    </script>
                    <div class="col-md-2">
                        <label>Costo</label>
                        <input type="text" class="form-control" name="CostoCurso" id="costo">
                    </div>

                    <div class="col-md-4">
                        <label>Programa Presupuestal</label>
                        <select type="form-select" class="form-control" name="programaPropuesto" id="programapresupuesto">
                            <option value="Ninguno">Ninguno</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM programa_propuesto");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["nombre_programapropuesto"] . '">' . $valores["nombre_programapropuesto"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Duracion</label>
                        <input type="text" class="form-control" name="Duracion">
                    </div>

                    <div class="col-md-4">
                        <label>Competencia</label>
                        <select type="form-select" class="form-control" name="Competencia">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM competencia");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["nombrecompetencia"] . '">' . $valores["nombrecompetencia"] . '</option>';
                            endforeach;

                            ?>
                        </select>
                    </div>


                    <div class="col-md-2">
                        <div class="form-check">
                            <label>
                                Interno
                            </label><br>
                            <input class="form-check-input" type="radio" id="interno" name="radio1" style="margin-left: 15px;cursor:pointer;">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check">
                            <label>
                                Externo
                            </label><br>
                            <input class="form-check-input" type="radio" id="externo" name="radio1" style="margin-left: 15px; cursor:pointer;">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Tipo de capacitación</label>
                        <select type="form-select" class="form-control" name="tipoaccion">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM catalogocapacitacion where activo = 0 order by descripcionaccion"); 
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["descripcionaccion"] . '">' . $valores["descripcionaccion"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Area que fortalese</label>
                        <select type="form-select" class="form-control" name="areaquefortalese">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM are_fort5alese");
                            $query->execute();
                            $data = $query->fetchAll();
                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["nombre"] . '">' . $valores["nombre"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>
                    <script>
                        $(function() {

                            $('#po').prop("hidden", true);
                            $('#pm').prop("hidden", true);
                            $('#tp').prop("hidden", true);

                        });

                        function tipopersonal() {
                            let persona = $("#persona").val();
                            let id = parseInt(persona);

                            if (id === 16 || id === 15 || id === 14 || id === 13) {
                                $('#po').prop("hidden", false);
                            } else {
                                $('#po').prop("hidden", true);
                            }
                            if (id === 12 || id === 11) {
                                $('#pm').prop("hidden", false);
                            } else {
                                $('#pm').prop("hidden", true);
                            }
                            if (id === 17) {
                                $('#tp').prop("hidden", false);
                            } else {
                                $('#tp').prop("hidden", true);
                            }
                        }
                    </script>
                    <div class="col-md-4">
                        <label>Tipo de personal</label>
                        <select type="form-select" class="form-control" name="personal" id="persona" onchange="tipopersonal();">
                            <option selected disabled value="">Choose...</option>

                            <?php

                            $query = $conexionX->prepare("SELECT * FROM tipo_personal");
                            $query->execute();
                            $data = $query->fetchAll();
                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["id_personal"] . '">' . $valores["nombredetipo_personal"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#mscancer').change(function(e) {}).multipleSelect({
                                width: '100%'
                            });
                        });
                        $(document).ready(function() {
                            $('#mscancer2').change(function(e) {}).multipleSelect({
                                width: '100%'
                            });
                        });
                        $(document).ready(function() {
                            $('#mscancer3').change(function(e) {}).multipleSelect({
                                width: '100%'
                            });
                        });
                    </script>
                    <div class="col-md-4" id="po">
                        <label>Personal operativo</label>
                        <select name='mscancer[]' id='mscancer' class='form-control' multiple='multiple'>
                            <?php
                            $prod = $conexionX->prepare("SELECT * FROM plantillahraei WHERE tipoPersonal = 'Personal operativo' order by Empleado asc");
                            $prod->execute();
                            $row = $prod->fetchAll();
                            foreach ($row as $valores) :
                                echo '<option value=' . $valores['Empleado'] . '>' . $valores['Empleado'] . ' ' . $valores['Nombre'] . '</option>';
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4" id="pm">
                        <label>Personal mando</label>
                        <select name='mscancer2[]' id='mscancer2' class='form-control' multiple='multiple'>
                            <?php
                            $prod = $conexionX->prepare("SELECT * FROM plantillahraei WHERE tipoPersonal = 'Personal mando' order by Empleado asc");
                            $prod->execute();
                            $row = $prod->fetchAll();
                            foreach ($row as $valores) :
                                echo '<option value=' . $valores['Empleado'] . '>' . $valores['Empleado'] . ' ' . $valores['Nombre'] . '</option>';
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4" id="tp">
                        <label>Todo personal</label>
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
                        <label>Modalidad</label>
                        <select type="form-select" class="form-control" name="Modalidad">
                            <option selected disabled value="">Choose...</option>

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

                    <div class="col-md-4">
                        <label>Lugar de inparticion</label>
                        <input type="text" class="form-control" name="LugarImparte">
                    </div>

                    <div class="col-md-2">
                        <label>Fecha de inicio</label>
                        <input type="date" class="form-control " name="Fechainicio">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha de terminó</label>
                        <input type="date" class="form-control " name="Fechatermino">
                    </div>

                    <div class="col-md-4">
                        <label>Instructores</label>
                        <input type="text" class="form-control" name="instructor">
                    </div>

                    <div class="col-md-2">
                        <label>Numero de Asistentes</label>
                        <input type="number" class="form-control" name="asistentes">
                    </div>

                    <div class="col-md-5">
                        <label>Temario</label>
                        <input type="text" class="form-control" name="Temariocapacitacion">
                    </div>

                    <div class="col-md-5">
                        <label>Objetivo</label>
                        <input type="text" class="form-control" name="objetivocapacitacion">
                    </div>
                    <style>
                        .circu{
  padding: 25px;
  background: #ccc;
  border-radius: 50px;
}

#grupoRadio label:hover{
  cursor: pointer;
}

#grupoRadio input[type="radio"]:checked + label {
  border: 3px solid #ccc !important;  
}


.activado input[type=radio]:checked + label {
  border: 3px solid #555 !important;  
}
                    </style>
                    <div class="col-md-12" id="grupoRadio">
  
  <input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
  <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

  <input type="radio" name="color_evento" id="amber" value="#FFC107">  
  <label for="amber" class="circu" style="background-color: #FFC107;"> </label>

  <input type="radio" name="color_evento" id="lime" value="#8BC34A">  
  <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

  <input type="radio" name="color_evento" id="teal" value="#009688">  
  <label for="teal" class="circu" style="background-color: #009688;"> </label>

  <input type="radio" name="color_evento" id="blue" value="#2196F3">  
  <label for="blue" class="circu" style="background-color: #2196F3;"> </label>

  <input type="radio" name="color_evento" id="indigo" value="#9c27b0">  
  <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

</div>
                    <div style="width: 100%; height: auto; display: flex; justify-content:center; align-items:center; margin-top: 20px;">
                        <a href="#" class="btn btn-warning" style="background-color: yellow; color: black;" onclick="cerrar()">Cerrar</a>&nbsp;&nbsp;
                        <input type="submit" name="Guardar" class="btn btn-success" value="Enviar información">

                    </div>




                </div>
            </figure>


        </form>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
    <script src="js/multiple-select-cancermama.js"></script>
</body>
<script>
    function cerrar() {
        window.location = 'principalCapacitacion';

    }
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
        window.onhashchange = function() {
            window.location.hash = "no-back-button";
        }

    }
</script>

</html>