<div id="carganuevousuariologueoperativo" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <div class="modal-dialog modal-lg">
        <style>
            #botonescarga1 {
                width: 140px;
                height: 17px;
                color: white;
                background-color: #FA0000;
                margin-top: 5px;
                text-decoration: none;
                border: none;
                border-radius: 15px;
                font-size: 12px;
            }

            #botonescarga2 {
                width: 140px;
                height: 17px;
                color: white;
                background-color: #6CCD06;
                margin-top: 5px;
                text-decoration: none;
                border: none;
                border-radius: 15px;
                font-size: 12px;
            }

            .contenedorbotones {
                padding: 5px;
                width: 100%;
                background-color: #ffffff;
                display: inline-block;
                text-align: center;

            }
        </style>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalArtritis" style="background-color: #CECECE;">
                <span class="material-symbols-outlined">
                    edit_note
                </span>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiarformularioseguimiento();">&times;</button>
            </div>
            <div class="modal-body">
                <div id="panel_editar">
                    <div class="contrato-nuevo">
                        <div class="modal-body">
                            <script>
                                /*
                                $(window).load(function() {
                                    $(".loader").fadeOut("slow");
                                });
                                function limpiarformularioseguimiento() {
                                    setTimeout('document.formularioseguimiento.reset()', 1000);
                                    return false;
                                }*/
                            </script>
                            <!-- form start -->
                            <div class="form-header">
                                <h5 class="form-title" style="text-align: center;
                                color:aliceblue; 
                                background-color:#CECECE; 
                                margin-top: 5px; 
                                font-size: 17px;">
                                    DATOS DEL EMPLEADO </h5>
                            </div>
                            <form name="formulariousuariologueo" id="formulariousuariologueo" onsubmit="return limpiar()">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                        $("#formulariousuariologueo").on("submit", function(e) {
                                            e.preventDefault();
                                            var formData = new FormData(document.getElementById(
                                                "formulariousuariologueo"));
                                            formData.append("dato", "valor");
                                            $.ajax({
                                                url: "../rh/aplicacion/registrarUsuarioNuevoLogueo.php",
                                                type: "post",
                                                dataType: "html",
                                                data: formData,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(datos) {
                                                    $("#mensaje").html(datos);
                                                    //$("#tabla_resultadobus").load('consultacancerdemama.php')
                                                }
                                            })
                                        })
                                        /** 
                                        var idcurp;
                                        function obtenerid() {
                                            var textoadjunto = document.getElementById("curps").value = idcurp;
                                        }
                                        */
                                        function limpiar() {

                                                setTimeout('document.formulariousuariologueo.reset()', 1000);
                                        return false;
                                        }
                                    </script>
                                    <?php
                                    date_default_timezone_set('America/Monterrey');
                                    $hoy = date("Y-m-d h:i:s");

                                    ?>
                                    <div class="col-md-4" id="fehareferenciacarga">
                                        <strong>N° empleado</strong>
                                        <input type="number" class="form-control" name="numempleado" required>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <strong>CURP</strong>
                                        <input name="curp" class="form-control" type="text" maxlength="18" required>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>RFC</strong>
                                        <input type="text" class="form-control" name="rfc" required>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Correo electronico</strong>
                                        <input type="text" class="form-control" name="correo" required>
                                    </div>
                                    <br>
                                    <!--Botón Guardar y Cancelar-->
                                    <div class="col-md-12"></div>
                                    <div class="contenedorbotones">
                                        <input type="button" onclick="window.location.reload();" value="Cerrar formulario" id="botonescarga1">
                                        <input type="submit" value="Registrar" id="botonescarga2">
                                    </div>

                                    <br>
                                </div>
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