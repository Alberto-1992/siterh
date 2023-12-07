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
    <div class="container" style="width: 100vh; padding: 5px; display: flex; justify-content: center; align-items: center;">
        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalArtritis" style="background-color: #874AA2;">
                <span class="material-symbols-outlined" style="color: white;">
                    Datos del curso
                </span>
                
            </div>
     
                        <div class="modal-body">
                        
                            <!-- form start -->
                            <?php
                                $id = $_POST['valida'];
                                    require_once ('../clases/conexion.php');
                                    $conexion = new ConexionRh();
                                    $sql = $conexion->prepare("SELECT nombrecurso, fechainicio, fechatermino from datos where id = :id");
                                    $sql->bindParam(':id',$id,PDO::PARAM_INT);
                                    $sql->execute();
                                    $row = $sql->fetch(PDO::FETCH_ASSOC);
                                    ?>
            <div class="form-row">
                                          
                                    <div class="col-md-12" id="fehareferenciacarga">
                                        <strong>Nombre del curso</strong>
                                        <input type="text" class="form-control" name="numempleado" readonly value="<?php echo $row['nombrecurso'] ?>">
                                    </div>
                                
                                    <div class="col-md-12">
                                        <strong>Fecha de inicio del curso</strong>
                                        <input class="form-control" type="date" readonly value="<?php echo $row['fechainicio'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Fecha de termino del curso</strong>
                                        <input type="date" class="form-control" readonly value="<?php echo $row['fechatermino'] ?>">
                                    </div>
                                    <br>
                                    <!--Botón Guardar y Cancelar-->
                                    <div class="col-md-12"></div>
                                    <div class="contenedorbotones">
                                        <input type="button" onclick="window.location.reload();" value="Cerrar consulta" class="btn btn-info">
                                    </div>

                                    <br>
                                </div>
                        </div>
                </div>
            </div>
    </div>


