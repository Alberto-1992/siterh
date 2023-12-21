<!DOCTYPE html>
<html lang="es">

<body style="padding: 0px;">
</nav>
    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Carga de información de compatibilidad laboral</h1>

        <form name="frmCompatibilidad" id="frmCompatibilidad" enctype="multipart/form-data" autocomplete="off">
            <script>
                $("#frmCompatibilidad").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("frmCompatibilidad"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/actualizacionCompatibilidadLaboralAdmin.php",
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
                        }
                    })
                })
            </script>

<?php 
$identificador = $_POST['identificador'];
    include 'clases/conexion.php';
    $conexion = new ConexionRh();
        $sqlC = $conexion->prepare("SELECT * from compatibilidadotroempleo where id_empleado = :id_empleado");
            $sqlC->execute(array(
                ':id_empleado'=>$identificador
            ));
            $rowC = $sqlC->fetch();
            $validacion = $rowC['otroempleo'];

        $sql = $conexion->prepare("SELECT * from compatibilidad where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$identificador
        ));
            $row = $sql->fetch();

?>
<input type="hidden" value="<?php echo $validacion ?>" id="validaotroempleo">
<div style="width: 100%; display: flex; justify-content: center; align-items: center; text-align: center;">
<div class="col-md-3">
                    <strong>Cuentas con otro empleo:</strong>
                    <select name="otroempleo" id="otroempleo" class="form-control" required>
                        <option value="<?php echo $rowC['otroempleo'] ?>"><?php echo $rowC['otroempleo'] ?></option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                
            </select>
                </div>
</div>
            
<div id="contenido">
<div class="form-row">
<div class="col-md-3">
                    <label for="mensaje">N° de Empleado:</label>
                <input type="text" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" value="<?php echo $identificador ?>" readonly>
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Protesta de no desempleo:</label>
                <input type="text" class="form-control" name="protestanodesempleo" value="<?php echo $row['PROTESTADENODES'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Compatibilidades concluidas:</label>
                <input type="text" class="form-control" name="compatibilidadconcluida" value="<?php echo $row['COMPATIBILIDADCONCLUIDAS'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Compatibilidad en proceso:</label>
                <input type="text" class="form-control" name="compatibilidadproceso" value="<?php echo $row['COMPATIBILIDADENPROCESO'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Si manifiesta otro empleo:</label>
                <input type="text" class="form-control" name="simanifiestaotroempleo" value="<?php echo $row['SIMANIFIESTAOTROEMPLEO'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Observaciones:</label>
                <input type="text" class="form-control" name="observaciones" value="<?php echo $row['OBSERVACIONES'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Clave presupuestal:</label>
                <input type="text" class="form-control" name="clavepresupuestal" value="<?php echo $row['CLAVEPRESUPUESTAL'] ?>">
    </div>
    <div class="col-md-3">
                    <label for="mensaje">Sueldo:</label>
                <input type="text" class="form-control" name="sueldo" value="<?php echo $row['SUELDO'] ?>">
    </div>
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Primer empleo</h1>
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Nombre de la institución donde labora:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la institución" value="<?php echo $row['LUGARDETRABAJO'] ?>" >
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Horario:</label>
                    <input type="text" class="form-control" name="horario" id="horario" placeholder="Horario en el que labora" value="<?php echo $row['HORARIO'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Dias:</label>
                    <input type="text" class="form-control" name="dias" id="dias" placeholder="Dias en los que labora" value="<?php echo $row['DIASLABORALES'] ?>">
                </div>
                <div class="col-md-3">
                <label for="mensaje">Tipo de puesto que ocupa:</label>
                <select name="tipopuesto" id="tipopuesto" class="form-control">
                    <option value="<?php echo $row['tipopuesto'] ?>"><?php echo $row['tipopuesto'] ?></option>
                <option value="Ninguno">Seleccione</option>
                <option value="Confianza">Confianza</option>
                <option value="Base">Base</option>
                <option value="Eventual">Eventual</option>
                <option value="Provisional">Provisional</option>
                <option value="Provisional Reservada">Provisional Reservada</option>
                <option value="Interinato">Interinato</option>
                <option value="Honorarios">Honorarios</option>
            </select>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Subir formato:</label>
                    <input type="file" class="form-control" name="formatoempleouno" accept=".pdf">
                </div>
                <div class="col-md-12" style="border: 1px solid #F0F0F0;">
                            <strong>Vista formato</strong>
                            <?php
                            $documento = "Formato compatibilidad uno";
                            
                            $path = "documentoscompatibilidad/".$identificador.'/';
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                               $archivo = readdir($directorio);
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $documento . "'><a href='" . $path . "/" . $documento . "' ></a></div><br>";

                                        echo "<iframe src='documentoscompatibilidad/$identificador/$documento.pdf' class='form-control'></iframe>";
                                        echo "<a href='documentoscompatibilidad/$identificador/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    
                                }
                            }
                            clearstatcache();
                            ?>
                        </div>
                
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Segundo empleo</h1>
                </div>

                <div class="col-md-6">
                    <label for="mensaje">Nombre de la institución donde labora Segundo:</label>
                    <input type="text" class="form-control" name="nombreinstitucionsegundo" id="nombreinstitucionsegundo" placeholder="Nombre de la institución" value="<?php echo $row['LUGARDETRABAJO2'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Horario Segundo:</label>
                    <input type="text" class="form-control" name="horariosegundo" id="horariosegundo" placeholder="Horario en el que labora" value="<?php echo $row['HORARIO2'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Dias Segundo:</label>
                    <input type="text" class="form-control" name="diassegundo" id="diassegundo" placeholder="Dias en los que labora" value="<?php echo $row['DIASLABORALES2'] ?>"> 
                </div>
                <div class="col-md-3">
                <label for="mensaje">Tipo de puesto que ocupa Segundo:</label>
                <select name="tipopuestosegundo" id="tipopuestosegundo" class="form-control">
                <option value="<?php echo $row['tipopuesto2'] ?>"><?php echo $row['tipopuesto2'] ?></option>
                <option value="Ninguno">Seleccione</option>
                <option value="Confianza">Confianza</option>
                <option value="Base">Base</option>
                <option value="Eventual">Eventual</option>
                <option value="Provisional">Provisional</option>
                <option value="Provisional Reservada">Provisional Reservada</option>
                <option value="Interinato">Interinato</option>
                <option value="Honorarios">Honorarios</option>
            </select>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Subir formato:</label>
                    <input type="file" class="form-control" name="formatoempleodos" accept=".pdf">
                </div>
</div>
</div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                    <input type="submit" name="add" id="btn-send" value="Enviar">
                </div>
            </div>

        </form>
    </div>

    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>

</body>

</html>