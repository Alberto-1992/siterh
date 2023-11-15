<div id="observaciones" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #464949; height: auto;">
                <h1 style="color: white; font-size: 18px; text-align:center;">
                    Carga de nota de observacion
</h1>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiarformularioseguimiento();">&times;</button>
            </div>
            <div class="modal-body">
                <div id="panel_editar">
                    <div class="contrato-nuevo">
                        <div class="modal-body">
                            </script>
                            <!-- form start -->
                            <div class="col-md-12" style="text-align: center; 
                                    color:aliceblue; 
                                    background-color:#464949; 
                                    margin-top: 5px; 
                                    font-size: 17px;">
                                        DATOS PERSONALES
                                    </div>
                        
                            <form name="formularioseguimiento" id="formularioseguimiento" onsubmit="return limpiar()">
                    
                                    <script>
                                    $("#formularioseguimiento").on("submit", function(e) {
                                        e.preventDefault();
                                        var formData = new FormData(document.getElementById("formularioseguimiento"));
                                        formData.append("dato", "valor");
                                        $.ajax({
                                            url: "aplicacion/registrarObservacion.php",
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
                                            
                                            }
                                        })
                                    })
                                    /** 
                                    var idcurp;
                                    function obtenerid() {
                                        var textoadjunto = document.getElementById("curps").value = idcurp;
                                    }
                                    */
                                    </script>
                                    <?php
                                    date_default_timezone_set('America/Monterrey');
                                    $hoy = date("Y-m-d h:i:s");
                
                                    ?>
                        <div class="form-row">
                            <div id="mensaje"></div>
                                <input type="hidden" id="numempleado" name="numempleado" value="<?php echo $dataRegistro['Empleado'] ?>">
                                <input type="hidden" value="<?php echo $usernameSesion ?>" class="form-control" name="correogenerocomentario">
                                <input type="hidden" value="<?php echo $hoy ?>" class="form-control" name="fechahoy" id="fechahoy" >
                                        <div class="col-md-12">
                                            <strong>Carga de nota</strong>
                                            <textarea class="form-control" rows="7" name="comentariodatospersonales"></textarea>
                                        </div>
                                    
                                    <br>
                                    

                                    <!-- Titulo de SEGUIMIENTO LABORATORIOS -->
                                    <div class="col-md-12" style="text-align: center; 
                                    color:aliceblue; 
                                    background-color:#464949; 
                                    margin-top: 5px; 
                                    font-size: 17px;">
                                        DATOS ACADEMICOS
                                    </div>

                                    <br>
                                    <div class="col-md-12">
                                            <strong>Carga de nota</strong>
                                            <textarea class="form-control" rows="7" name="comentariodatosacademicos"></textarea>
                                        </div>
                                    <br>
                                    <!--Finaliza sección de Laboratorio-->

                                    <div class="col-md-12" style="text-align: center; color:aliceblue; background-color:#464949; margin-top: 5px; font-size: 17px;">
                                        COMPATIBILIDAD
                                    </div>

                                    <!-- Los siguientes tres select son de selección simple-->
                                    <div class="col-md-12">
                                            <strong>Carga de nota</strong>
                                            <textarea class="form-control" rows="7" name="comentariodatoscompatibilidad"></textarea>
                                        </div>
                                    <!--Botón Guardar y Cancelar-->
                                    <div style="width: 100%; height: auto; display: flex; justify-content: center; align-items: center; margin-top: 10px;">
                                    
                                    <input type="submit" value="Guardar" style="width: 170px; 
                                    height: 27px; 
                                    color: white; 
                                    background-color: #6CCD06; 
                                    text-decoration: none; 
                                    border: none; 
                                    border-radius: 10px;
                                    font-size: 14px;">
                                    <br>
                                    </div>
                                </div>
                            </form>
                        
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>