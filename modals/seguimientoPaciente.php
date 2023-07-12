<div id="seguimiento" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/scriptModalvalidacionCE.js"></script>
    <!--URL para agregar el icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--Finaliza url para agregar icon-->
    <script src="js/enviacurp.js"></script>
    <div class="modal-dialog modal-lg">


        <!-- Cabecera del modal-->
        <div class="modal-content">

            <div class="modal-header" id="cabeceraModalInfarto">
                <span class="material-symbols-outlined">
                    edit_note
                </span>

                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiarformularioseguimiento();">&times;</button>
            </div>
            <!-- Finaliza Cabecera del modal-->
            <div class="modal-body">
                <div id="panel_editar">
                    <div class="contrato-nuevo">
                        <div class="modal-body">
                            <script>
                                $(window).load(function() {
                                    $(".loader").fadeOut("slow");
                                });

                                function limpiarformularioseguimiento() {

                                    setTimeout('document.formularioseguimientoinfarto.reset()', 1000);
                                    return false;
                                }
                            </script>
                            <!-- form start -->

                            <div class="col-md-12" style="text-align: center; 
                                color: white; 
                                background-color:#e16c70;">
                                <strong>SEGUIMIENTO DEL PACIENTE</strong>
                            </div>

                            <style>
                                #fecha,
                                #curp,
                                #nombrecompleto,
                                #edad {
                                    text-transform: uppercase;
                                }
                            </style>
                            <form name="formularioseguimientoinfarto" id="formularioseguimientoinfarto" onsubmit="return limpiar()">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                        $("#formularioseguimientoinfarto").on("submit", function(e) {
                                            let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                            e.preventDefault();

                                            var formData = new FormData(document.getElementById(
                                                "formularioseguimientoinfarto"));
                                            formData.append("dato", "valor");

                                            $.ajax({

                                                url: "aplicacion/registrarSeguimientoPaciente.php",
                                                type: "post",
                                                dataType: "html",
                                                data: formData,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(datos) {
                                                    $("#mensaje").html(datos);

                                                }
                                            })
                                        })
                                        var idcurp;

                                        function obtenerid() {

                                            var textoadjunto = document.getElementById("curps").value = idcurp;


                                        }
                                        obtenerid();
                                    </script>



                                    <input id="year" name="year" class="form-control" type="hidden" value="2022" required="required" onkeyup="mayus(this);" readonly>

                                    <div class="col-md-6">
                                        <strong>ID paciente:&nbsp;</strong>
                                        <input id="curps" name="curps" class="form-control" type="text" value="" readonly>
                                        <span id="curp" class="curp" name="curp"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Seguimiento</strong>
                                        <select name="seguimiento" id="seguimiento" class="form-control" required onclick="obtenerid();">
                                            <option value="Tres meses">Tres meses</option>
                                            <option value="Seis meses">Seis meses</option>
                                            <option value="Un año">Un año</option>
                                        </select>
                                    </div>
                                    <br>



                                    <script>
                                        $(document).ready(function() {

                                            $('#referenciado').change(function(e) {
                                                if ($(this).val() === "1") {

                                                    $('#refe').prop("hidden", false);
                                                    $('#diag').prop("hidden", false);
                                                } else {
                                                    $('#refe').prop("hidden", true);
                                                    $('#diag').prop("hidden", true);

                                                }
                                            })
                                        });

                                        $(function() {
                                            // $('#refe').prop("hidden", true);
                                            // $('#diag').prop("hidden", true);
                                        })
                                    </script>
                                    <!--<br>

                                    <div class="col-md-4">
                                        <strong>Disección</strong>
                                        <select name="diseccion" id="diseccion" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM diseccion ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion']; ?>">
                                                    <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->


                                    <!--<div class="col-md-4">
                                        <strong>IAM Periprocedimiento</strong>
                                        <select name="iamperiprocedimiento" id="iamperiprocedimiento" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM iam_periprocedimiento ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_aimperi']; ?>">
                                                    <?php echo $row['nombre_aimperi']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>-->


                                    <!--<div class="col-md-4">
                                        <strong>Complicaciones</strong>
                                        <select name="complicaciones" id="complicaciones" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM complicaciones ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_compliacion']; ?>">
                                                    <?php echo $row['nombre_compliacion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->


                                    <!--<div class="col-md-4">
                                        <strong>Flujo microvascular tmp</strong>
                                        <select name="flujomicrovasculartmp" id="flujomicrovasculartmp" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM flujo_microvascular_tmp ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_flujo_microvascular']; ?>">
                                                    <?php echo $row['nombre_flujo_microvascular']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->


                                    <!--<div class="col-md-4">
                                        <strong>TIMI Final</strong>
                                        <select name="flujofinaltfg" id="flujofinaltfg" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM flujo_final_tfg ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_flujo_final']; ?>">
                                                    <?php echo $row['nombre_flujo_final']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Trombosis definitiva</strong>
                                        <select name="trombosisdefinitiva" id="trombosisdefinitiva" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM trombosis_definitiva ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_trombosis']; ?>">
                                                    <?php echo $row['nombre_trombosis']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Marca pasos temporal</strong>
                                        <select name="marcapasostemporal" id="marcapasostemporal" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM marcapasos_temporal ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion']; ?>">
                                                    <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->



                                    <!--<div class="col-md-4">
                                        <strong>Estancia hospitalaria</strong>
                                        <textarea id="estanciahospitalaria" name="estanciahospitalaria" placeholder="Describa" class="form-control" onkeyup="mayus(this);" rows="2"></textarea>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Reestentosis intrastent</strong>
                                        <select name="reesentosis" id="reesentosis" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM reestenosis_intrastent ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion_resentosis']; ?>">
                                                    <?php echo $row['descripcion_resentosis']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Rehospitalización</strong>
                                        <select name="rehospitalizacion" id="rehospitalizacion" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM rehospitalacion_one_year ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion_rehospi']; ?>">
                                                    <?php echo $row['descripcion_rehospi']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Escala de riesgo</strong>
                                        <select name="escaladeriesgo" id="escaladeriesgo" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM escalas_riesgo ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_escala']; ?>">
                                                    <?php echo $row['nombre_escala']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>IAM 3 años</strong>
                                        <select name="iamtresyears" id="iamtresyears" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM iam_tres_years ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion_iam_tres_years']; ?>">
                                                    <?php echo $row['descripcion_iam_tres_years']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>CRUC A LOS 3 AÑOS</strong>
                                        <select name="cruc" id="cruc" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM cruce_a_tres_years ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion_cruce_tres_years']; ?>">
                                                    <?php echo $row['descripcion_cruce_tres_years']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Defunción</strong>
                                        <select name="defuncion" id="defuncion" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM defuncion ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['descripcion']; ?>">
                                                    <?php echo $row['descripcion']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-4">
                                        <strong>Causa defunción</strong>
                                        <select name="causadefuncion" id="causadefuncion" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM causa ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombre_causa']; ?>">
                                                    <?php echo $row['nombre_causa']; ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>-->
                                    <!--<div class="col-md-3">
                                        <strong>Fevi</strong>
                                        <select name="fevi" id="fevi" class="form-control" style="width: 100%;" required>
                                            <option value="0">Selecciona</option>
                                            <?php
                                            require 'conexionCancer.php';
                                            $query = "SELECT * FROM fevi ";
                                            $resultado = $conexion2->query($query);
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['nombrefevi']; ?>">
                                                    <?php echo $row['nombrefevi']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>-->

                                    <br><br><br>
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#e16c70;">

                                        <strong>TRATAMIENTO</strong>
                                    </div>

                                    <!-- Los siguientes select, de la sección TRATAMIENTO son de selección simple-->
                                    <div class="col-md-4" id="">
                                        <strong>Antiagregantes</strong>
                                        <select id="msanticoagulantes" name="msanticoagulantes[]" multiple="multiple" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Acido Acetil Salicilico">Acido Acetil Salicilico</option>
                                            <option value="Clopidogrel">Clopidogrel</option>
                                            <option value="Eptifibatida">Eptifibatida</option>
                                            <option value="Prasugrel">Prasugrel</option>
                                            <option value="ticagrelor">Ticagrelor</option>
                                        </select>
                                    </div>

                                    <!-- Los siguientes select, de la sección TRATAMIENTO son de selección simple-->
                                    <div class="col-md-4" id="">
                                        <strong>Anticoagulantes</strong>
                                        <select name="antiagregantes" id="antiagregantes" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Rivaroxaban">Rivaroxaban</option>
                                            <option value="ticagrelor">Apixaban</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <strong>Betabloqueadores</strong>
                                        <select name="betabloqueadores" id="betabloqueadores" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Acetubolol">Acetubolol</option>
                                            <option value="Atenolol">Atenolol</option>
                                            <option value="Bisoprolol">Bisoprolol</option>
                                            <option value="Esmolol">Esmolol</option>
                                            <option value="Metoprolol">Metoprolol</option>
                                            <option value="Nebivolol">Nebivolol</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>IECA</strong>
                                        <select name="ieca" id="ieca" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Enalapril">Enalapril</option>
                                            <option value="Lisinopril">Lisinopril</option>
                                            <option value="Ramipril">Ramipril</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <strong>Calcioantagonistas</strong>
                                        <select name="calcio" id="calcio" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Amlodipino">Amlodipino</option>
                                            <option value="Diltiazem">Diltiazem</option>
                                            <option value="Felodipino">Felodipino</option>
                                            <option value="Lercadipino">Lercadipino</option>
                                            <option value="Manidipino">Manidipino</option>
                                            <option value="Nifedpino">Nifedpino</option>
                                            <option value="Nimodipino">Nimodipino</option>
                                            <option value="Verapamilo">Verapamilo</optio>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>ARA II</strong>
                                        <select name="araii" id="araii" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Candesartan">Candesartan</option>
                                            <option value="Ibesartan">Ibesartan</option>
                                            <option value="Losartan">Losartan</option>
                                            <option value="Olmesartan">Olmesartan</option>
                                            <option value="Telmisartan">Telmisartan</option>
                                            <option value="Valsartan">Valsartan</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Estatinas</strong>
                                        <select name="estatinas" id="estatinas" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Atorvastatina">Atorvastatina</option>
                                            <option value="Pravastatina">Pravastatina</option>
                                            <option value="Rosuvastatina">Rosuvastatina</option>
                                            <option value="Simvastatina">Simvastatina</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Fibratos</strong>
                                        <select name="fibratos" id="fibratos" class="form-control" style="width:100%;" require>
                                            <option value="0">Seleccione...</option>
                                            <option value="Bezafibrato">Bezafibrato</option>
                                            <option value="cipofibrato">Cipofibrato</option>
                                            <option value="fenobifrato">Fenobifrato</option>
                                            <option value="gembibrozilo">Gembibrozilo</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Antianginosos</strong>
                                        <select name="antiaginosos" id="antiaginosos" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Nitroglicerina">Nitroglicerina</option>
                                            <option value="Isosorbide">Isosorbide</option>
                                            <option value="Trimetazidina">Trimetazidina</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Inhibidor de la Absorción</strong>
                                        <select name="inhibidor" id="inhibidor" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Ezetimiba">Ezetimiba</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <strong>Anticuerpos Monoclonales</strong>
                                        <select name="monoclonales" id="monoclonales" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Evolocumab">Evolocumab</option>
                                            <option value="Ninguno" selected>Ninguno</option>
                                        </select>
                                    </div>


                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <!-- Finaliza la sección TRATAMIENTO-->
                                    <!-- Inicia sección PARACLINICOS-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#e16c70;">

                                        <strong>PARACLINICOS</strong>
                                    </div>

                                    <div class="col-md-2">
                                        <strong>CK</strong>
                                        <input type="number" id="ck" name="ck" placeholder="Ingrese..." class="form-control">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>CK-MB</strong>
                                        <input type="number" id="ckmb" name="ckmb" placeholder="Ingrese..." class="form-control">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Troponinas</strong>
                                        <input type="number" id="troponinas" name="troponinas" placeholder="Ingrese..." class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <strong>Glucosa</strong>
                                        <input type="number" id="glucosa" name="glucosa" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>UREA</strong>
                                        <input type="number" id="urea" name="urea" placeholder="Ingrese..." class="form-control">

                                    </div>
                                    <div class="col-md-2">
                                        <strong>Creatinina</strong>
                                        <input type="number" id="creatinina" name="creatinina" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Colesterol</strong>
                                        <input type="number" id="colesterol" name="colesterol" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Trigliceridos</strong>
                                        <input type="number" id="trigliceridos" name="trigliceridos" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Ácido Urico</strong>
                                        <input type="number" id="acidourico" name="acidourico" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>HB Glucosilada</strong>
                                        <input type="number" id="hbglucosilada" name="hbglucosilada" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Proteinas</strong>
                                        <input type="number" id="proteinas" name="proteinas" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Colesterol Total</strong>
                                        <input type="number" id="colesteroltotal" name="colesteroltotal" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>LDL</strong>
                                        <input type="number" id="ldl" name="ldl" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>HDL</strong>
                                        <input type="number" id="hdl" name="hdl" placeholder="Ingrese..." class="form-control">
                                    </div><br>
                                    <br>
                                    <br>
                                    <br>
                                    <!-- FINALIZA sección PARACLINICOS-->
                                    <!--Inicia sección Viabilidad y Perfusión Miocardia-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#e16c70;">
                                        <strong>VIABILIDAD Y PERFUSIÓN MIOCARDIA</strong>
                                    </div>
                                    <!--Inicia sección Gammagrama Cardiaco-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#eda9ab;">
                                        <strong>Gammagrama Cardiaco</strong>
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Gammagrama Cardiaco</strong>
                                        <select name="idgamagrama" id="idgamagrama" class="form-control" style="width:100%;" require>
                                         
                                            <option value="Si">Sí</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>

                                    <!--Si se selecciona que SÍ se debe habilitar el siguiente select RESULTADO DE GAMAGRAMA CARDIACO-->
                                    <div class="col-md-6" id="gamagra">
                                        <strong>Resultado de Gamagrama Cardiaco</strong>
                                        <select name="gamagrama" id="gamagrama" class="form-control" style="width:100%;" require>
                                            
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo" selected>Negativo</option>
                                        </select>
                                    </div>

                                    <!-- Si en el select anterior, se seleccionó POSITIVO, se deberá mostrar el siguiente select-->
                                    <div class="col-md-6" id="localizaciongamagrama">
                                        <strong>Localización</strong>
                                        <select id="localizaciongamagra" name="localizaciongamagra[]" multiple="multiple" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Anterior">Anterior</option>
                                            <option value="Inferior">Inferior</option>
                                            <option value="Septal">Septal</option>
                                            <option value="Lateral">Lateral</option>
                                        </select>
                                    </div>
                                    <!---->
                                    <div class="col-md-6" id="idpatrongama">
                                        <strong>Segmento</strong>
                                        <select name="patrongama" id="patrongama" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Apical">Apical</option>
                                            <option value="Basal">Basal</option>
                                            <option value="Medio">Medio</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <!--Inicia sección Resonancia-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#eda9ab;">
                                        <strong>Resonancia Magnética</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Resonancia Magnética</strong>
                                        <select name="idresonancia" id="idresonancia" class="form-control" style="width:100%;" require>
                                            
                                            <option value="Si">Sí</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>
                                    <!--Si se selecciona que SÍ se debe habilitar el siguiente select RESULTADO DE Resonancia MagnéticaO-->
                                    <div class="col-md-6" id="idresonanciam">
                                        <strong>Resultado de Resonancia Magnética</strong>
                                        <select name="resonancia" id="resonancia" class="form-control" style="width:100%;" require>
                                            
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Si en el select anterior, se seleccionó POSITIVO, se deberá mostrar el siguiente select-->
                                    <div class="col-md-6" id="localizacionresonanciamag">
                                        <strong>Localización de Resonancia Magnética</strong>
                                        <select id="localizacionresonancia" name="localizacionresonancia[]" multiple="multiple" . class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Anterior">Anterior</option>
                                            <option value="Inferior">Inferior</option>
                                            <option value="Septal">Septal</option>
                                            <option value="Lateral">Lateral</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="idpatronreso">
                                        <strong>Segmento</strong>
                                        <select name="patronreso" id="patronreso" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Apical">Apical</option>
                                            <option value="Basal">Basal</option>
                                            <option value="Medio">Medio</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <!--Inicia sección Viabilidad y Perfusión Miocardia-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#eda9ab;">
                                        <strong>Ergometría</strong>
                                    </div>
                                    <!-- ERGOMETRÍA no se seleccionará, solo se visualizará-->
                                    <div class="col-md-3">
                                        <strong>Ergometría</strong>
                                        <select name="bruce" id="bruce" class="form-control" readonly>
                                            <option value="bruce" selected>Protocolo Bruce</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapauno">
                                        <strong>Etapa 1</strong>
                                        <select name="etapauno" id="etapauno" class="form-control" style="width:100%;" require>
                                            
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapados">
                                        <strong>Etapa 2</strong>
                                        <select name="etapados" id="etapados" class="form-control" style="width:100%;" require>
                                            
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapatres">
                                        <strong>Etapa 3</strong>
                                        <select name="etapatres" id="etapatres" class="form-control" style="width:100%;" require>
                                            
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapacuatro">
                                        <strong>Etapa 4</strong>
                                        <select name="etapacuatro" id="etapacuatro" class="form-control" style="width:100%;" require>
                                            
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapacinco">
                                        <strong>Etapa 5</strong>
                                        <select name="etapacinco" id="etapacinco" class="form-control" style="width:100%;" require>
                                           
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapaseis">
                                        <strong>Etapa 6</strong>
                                        <select name="etapaseis" id="etapaseis" class="form-control" style="width:100%;" require>
                                            
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Cuando se seleccione una etapa, se debe seleccionar si es positivo/negativo-->
                                    <div class="col-md-3" id="idetapasiete">
                                        <strong>Etapa 7</strong>
                                        <select name="etapasiete" id="etapasiete" class="form-control" style="width:100%;" require>
                                           
                                            <option value="positivo">Positivo</option>
                                            <option value="negativo" selected>Negativo</option>
                                        </select>
                                    </div>
                                    <!-- Suspención de estudio-->
                                    <div class="col-md-12" id="suspencion">
                                        <strong>Suspensión de Estudio</strong>
                                        <select name="suspencionestudio" id="suspencionestudio" class="form-control" style="width:100%;" require>
                                            
                                            <option value="Disminucion De Tas -10Mmhg Debajo De La Inicial +Evidencia De Isquemia">Disminución De Tas -10Mmhg Debajo De La Inicial +Evidencia De Isquemia</option>
                                            <option value="Arritmia">Arritmia</option>
                                            <option value="Angina Moderada">Angina Moderada</option>
                                            <option value="Aumento De Actividad De Sistema Nervioso">Aumento De Actividad De Sistema Nervioso</option>
                                            <option value="Cianosis Palidez">Cianosis/Palidez</option>
                                            <option value="Deseo Del Paciente De Detenerse">Deseo Del Paciente De Detenerse</option>
                                            <option value="Elevacion Del Segmento St">Elevacion Del Segmento St (< 1Mm) </option>
                                            <option value="Taquicardia Ventricular Sostenida">Taquicardia Ventricular Sostenida</option>
                                            <option value="NA" selected>No Aplica</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <!--Inicia sección Viabilidad y Perfusión Miocardia-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#eda9ab;">
                                        <strong>Ecocardiograma</strong>
                                    </div>
                                    <!-- El siguiente select Ecocardiograma tiene 3 opciones, las cuales tienen dependencias:-->
                                    <div class="col-md-2">
                                        <strong>Diastólico</strong>
                                        <input type="number" id="ldl" name="ldl" placeholder="Ingrese..." class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Sistólico</strong>
                                        <input type="number" id="hdl" name="hdl" placeholder="Ingrese..." class="form-control">
                                    </div><br><br><br>
                                    <!-- Si el usuario selecciona FEVI, se habilitan las siguientes opciones-->
                                    <div class="col-md-3" id="">
                                        <strong>FEVI</strong>
                                        <select name="feviop" id="feviop" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Menos del 30%">Menos del 30%</option>
                                            <option value="Del 31% - 50%">Del 31% - 50%</option>
                                            <option value="setenta">Del 51% - 70%</option>
                                            <option value="cien">Más del 71%</option>
                                        </select>
                                    </div>
                                    <!-- Si el usuario selecciona MOVILIDAD, se habilitan las siguientes opciones-->
                                    <div class="col-md-3" id="">
                                        <strong>Movilidad</strong>
                                        <select name="movilidadop" id="movilidadop" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Acinesia">Acinesia</option>
                                            <option value="Aneurismatico">Aneurismatico</option>
                                            <option value="Discinecia">Discinecia</option>
                                            <option value="Hipocinesia">Hipocinesia</option>
                                            <option value="Normal">Normal</option>
                                        </select>
                                    </div>
                                    <!-- Si el usuario selecciona la opción NORMAL (del select de Movilidad) se deben desplegar las siguientes opciones:-->
                                    <div class="col-md-2" id="">
                                        <strong>Segmento</strong>
                                        <select name="segmento" id="segmento" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Apical">Apical</option>
                                            <option value="Basal">Basal</option>
                                            <option value="Medio">Medio</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <!--Inicia sección Viabilidad y Perfusión Miocardia-->
                                    <div class="col-md-12" style="text-align: center; 
                                    color: white; 
                                    background-color:#eda9ab;">
                                        <strong>Defunción</strong>
                                    </div>
                                    <!-- El siguiente select tiene dependencia:-->
                                    <div class="col-md-6">
                                        <strong>Defunción</strong>
                                        <select name="defuncion" id="defuncion" class="form-control" style="width:100%;" require>
                                           
                                            <option value="Si">Sí</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="causadefuncion">
                                        <strong>Causa</strong>
                                        <select name="causa" id="causa" class="form-control" style="width:100%;" require>
                                            <option value="Ninguno" selected>Ninguno</option>
                                            <option value="Cardiaca">Cardiaca</option>
                                            <option value="No Cardiaca">No Cardiaca</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-12"></div>
                                    <div class="contenedorbotones">
                                    <input type="button" onclick="window.location.reload();" value="Cerrar formulario" id="botonescarga1">
                                    <input type="submit" value="Registrar" id="botonescarga2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>