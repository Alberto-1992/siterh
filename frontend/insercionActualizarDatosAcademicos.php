<nav class="navbar navbar-expand-md fixed-top" style="background-color: #0D7E9A;">
        <span id="cabecera">Actualización de datos academicos</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>
    <div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Actualiza tu información academica</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualices tus datos academicos.</h1>
        <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 0px; text-align:center;">
           
        </div>

        <form name="datosacademicosactualizar" id="datosacademicosactualizar" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                
                $("#datosacademicosactualizar").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("datosacademicosactualizar"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/updateDatosAcademicos.php",
                        type: "post",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(datos) {
                            $("#mensaje").html(datos);
                            setTimeout(function() {
                                window.location.href = 'datosAcademicos';
                            }, 2000);

                        }
                    })
                })
                
            </script> 
            
            <div class="form-row">
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color: white;">
                    <h1 style="font-size:22px;">Datos Academicos</h1>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Ultimo grado de estudios</label>
                    <input type="text" id="ultimogradoestudios" name="ultimogradoestudios" autocomplete="off" class="form-control" value="<?php echo $row['descripcionultimogrado'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label style="color: red;">Especialidad con la actualmente labora en el HRAEI. (Solo personal medico y enfermeria)</label>
                    <input type="text" id="especialidadlaborahraei" name="especialidadlaborahraei" autocomplete="off" class="form-control" value="<?php echo $row['especialidadlaborahraei'] ?>" placeholder="Solo si eres personal medico o enfermeria">
                </div>
                <div style="width: 100%; height: auto; background-color: #0D6F9A; text-align:center;margin-top:10px; color:white;">
                    <h1 style="font-size:22px;">Nivel Medio Superior</h1>
                </div>

                <div class="form-group col-md-6">
                    <label>Nombre de la formación académica</label>
                    <input type="text" id="nombreformacionmedia" name="nombreformacionmedia" autocomplete="off" class="form-control" value="<?php echo $row['nombreformacionmedia'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre de la institución educativa</label>
                    <input type="text" id="nombremediasuperior" name="nombremediasuperior" autocomplete="off" class="form-control" value="<?php echo $row['nombremediasuperior'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha de inicio</label>
                    <input type="date" id="fechainicio" name="fechainicio" autocomplete="off" class="form-control" value="<?php echo $row['fechainicio'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha término</label>
                    <input type="date" id="fechatermino" name="fechatermino" autocomplete="off" class="form-control" value="<?php echo $row['fechatermino'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Años cursados</label>
                    <input type="text" id="tiempocursado" name="tiempocursado" autocomplete="off" class="form-control" value="<?php echo $row['tiempocursado'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Documento que recibe</label>
                    <input type="text" id="documentomediosuperior" name="documentomediosuperior" autocomplete="off" class="form-control" value="<?php echo $row['documentomediosuperior'] ?>">
                </div>
                <div class="form-group col-md-6">
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentomediasup" name="documentomediasup" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                            <strong>Documento</strong>
                            <?php
                            clearstatcache();
                            $mediasup = $row['nombreformacionmedia'];
                            
                            $path = "documentosmediasup/".$mediasup.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosmediasup/$mediasup$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosmediasup/$mediasup$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            
                            ?>
                        </div>
                        <?php
                require 'conexionRh.php';

                $sqlt = $conexionRh->prepare("SELECT * from estudiostecnico where id_empleado = :id_empleado");
                $sqlt->execute(array(
                    ':id_empleado' => $identificador
                ));
                    $rowt = $sqlt->fetch();
                ?>
            <div style="width: 100%; height: auto; background-color: #0D6F9A; text-align:center;margin-top:10px; color:white;">
                    <h1 style="font-size:22px;">Nivel tecnico</h1>
                </div>

                <div class="form-group col-md-6">
                    <label>Nombre de la formación académica</label>
                    <input type="text" id="nombreinstituciontecnica" name="nombreinstituciontecnica" autocomplete="off" class="form-control" value="<?php echo $rowt['nombreinstituciontecnica'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre de la institución educativa</label>
                    <input type="text" id="nombreformaciontecnica" name="nombreformaciontecnica" autocomplete="off" class="form-control" value="<?php echo $rowt['nombreformaciontecnica'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha de inicio</label>
                    <input type="date" id="fechainiciotecnico" name="fechainiciotecnico" autocomplete="off" class="form-control" value="<?php echo $rowt['fechainiciotecnico'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha término</label>
                    <input type="date" id="fechaterminotecnico" name="fechaterminotecnico" autocomplete="off" class="form-control" value="<?php echo $rowt['fechaterminotecnico'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Años cursados</label>
                    <input type="text" id="tiempocursadotecnico" name="tiempocursadotecnico" autocomplete="off" class="form-control" value="<?php echo $rowt['tiempocursadotecnico'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Documento que recibe</label>
                    <input type="text" id="documentotecnico" name="documentotecnico" autocomplete="off" class="form-control" value="<?php echo $rowt['documentotecnico'] ?>">
                </div>
                <div class="form-group col-md-6">
                            <label>Sube tu titulo (PDF)</label>
                            <input type="file" id="documentotecnicoarchivo" name="documentotecnicoarchivo" class="form-control" accept=".pdf">
                    </div>
                    <div class="form-group col-md-6">
                            <label>Sube tu cedula (PDF)</label>
                            <input type="file" id="cedulatecnico" name="cedulatecnico" class="form-control" accept=".pdf">
                    </div>
                        <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $tecnica = $rowt['nombreformaciontecnica'];
                            
                            $path = "documentostecnica/".$tecnica.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentostecnica/$tecnica$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentostecnica/$tecnica$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }

                            ?>
                        </div>
                    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                            <strong>Documento cedula</strong>
                            <?php
                            clearstatcache();
                            $tecnicacedula = $rowt['nombreformaciontecnica'];
                            
                            $path = "documentostecnicacedula/".$tecnicacedula.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentostecnicacedula/$tecnicacedula$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentostecnicacedula/$tecnicacedula$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
        <!--inicia postecnico -->
            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color:white;">
                    <h1 style="font-size:22px;">Nivel postecnico</h1>
                </div>

                <?php
                require 'conexionRh.php';
                $sqlQueryComentariosP  = $conexionRh->prepare("SELECT estudiospostecnico.id_empleado FROM estudiospostecnico where id_empleado = $identificador ");
                $sqlQueryComentariosP->execute();
                $sqlQueryComentariosP = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosP->execute();
                $total_registroP = $sqlQueryComentariosP->fetchColumn();

                $sqlP = $conexionRh->prepare("SELECT * from estudiospostecnico where id_empleado = :id_empleado");
                $sqlP->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowsP = $sqlP->fetch()) {
                    $valorP = $rowsP['id_postecnico'];
                ?>
                    <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:1px; color:white;">
                        <h1 style="font-size:22px;">Datos postecnico</h1>
                    </div>
                    <div class="form-row">

                        <input type="hidden" name="id_carrera" value="<?php echo $valorP ?>">
                        <div class="form-group col-md-6">
                            <label>Nombre de la formación académica</label>
                            <input type="text" id="nombreformacionPostecnico" name="nombreformacionPostecnico[]" class="form-control" value="<?php echo $rowsP['nombreformacionpostecnico']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre de la institución educativa</label>
                            <input type="text" id="nombreinstitucionPostecnico" name="nombreinstitucionPostecnico[]" class="form-control" value="<?php echo $rowsP['nombreinstitucionpostecnico'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de inicio</label>
                            <input type="date" id="fechainiciosupPostecnico" name="fechainiciosupPostecnico[]" class="form-control" value="<?php echo $rowsP['fechainiciosuppostecnico'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha termino</label>
                            <input type="date" id="fechaterminosupPostecnico" name="fechaterminosupPostecnico[]" class="form-control" value="<?php echo $rowsP['fechaterminosuppostecnico'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Años cursados</label>
                            <input type="text" id="tiempocursadosupPostecnico" name="tiempocursadosupPostecnico[]" class="form-control" value="<?php echo $rowsP['tiempocursadosuppostecnico'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Documento que recibe</label>
                            <input type="text" id="documentorecibePostecnico" name="documentorecibePostecnico[]" class="form-control" value="<?php echo $rowsP['documentorecibepostecnico'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentolicenciaturaPostecnico[]" name="documentolicenciaturaPostecnico[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento postecnico</strong>
                            <?php
                            clearstatcache();
                            $postecnico = $rowsP['nombreformacionpostecnico'];
                            
                            $path = "documentospostecnico/".$postecnico.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentospostecnico/$postecnico$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentospostecnico/$postecnico$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                        
                    </div>

                <?php  } ?>

                <div class="form-group col-md-3">
                    <strong>Agregar postecnico (Solo numeros)</strong>
                    <input type="number" id="quantityp" name="numpostecnico" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantityp").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                                    <h1 style="font-size:22px;">Información postecnico ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionPostecnico[${i}]" name="nombreformacionPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionPostecnico[${i}]" name="nombreinstitucionPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciosupPostecnico[${i}]" name="fechainiciosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminosupPostecnico[${i}]" name="fechaterminosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadosupPostecnico[${i}]" name="tiempocursadosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibePostecnico[${i}]" name="documentorecibePostecnico[]" class="form-control">
                                </div>
                                
                            <div class="form-group col-md-6">
                                <label>Sube tu titulo ${i +1} (PDF)</label>
                                <input type="file" id="documentolicenciaturaPostecnico[${i}]" name="documentolicenciaturaPostecnico[]" class="form-control" accept=".pdf">
                            </div>
                            
                        </div>`;
                        }
                        document.getElementById("divGuestsp").innerHTML = content;
                    })
                </script>
                <div id="divGuestsp"></div>
 <!--inicia licenciatura -->
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color:white;">
                    <h1 style="font-size:22px;">Nivel Superior</h1>
                </div>

                <?php
                require 'conexionRh.php';
                $sqlQueryComentarios  = $conexionRh->prepare("SELECT estudiossuperior.id_empleado FROM estudiossuperior where id_empleado = $identificador ");
                $sqlQueryComentarios->execute();
                $sqlQueryComentarios = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentarios->execute();
                $total_registro = $sqlQueryComentarios->fetchColumn();

                $sql = $conexionRh->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
                $sql->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rows = $sql->fetch()) {
                    $valor = $rows['id_superior'];
                ?>
                    <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:1px; color:white;">
                        <h1 style="font-size:22px;">Datos Licenciatura</h1>
                    </div>
                    <div class="form-row">

                        <input type="hidden" name="id_carrera" value="<?php echo $valor ?>">
                        <div class="form-group col-md-6">
                            <label>Nombre de la formación académica</label>
                            <input type="text" id="nombreformacion" name="nombreformacion[]" class="form-control" value="<?php echo $rows['nombreformacionsuperior']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre de la institución educativa</label>
                            <input type="text" id="nombreinstitucion" name="nombreinstitucion[]" class="form-control" value="<?php echo $rows['nombresuperior'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de inicio</label>
                            <input type="date" id="fechainicio" name="fechainiciosup[]" class="form-control" value="<?php echo $rows['fechasuperiorinicio'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha termino</label>
                            <input type="date" id="fechatermino" name="fechaterminosup[]" class="form-control" value="<?php echo $rows['fechasuperiortermino'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Años cursados</label>
                            <input type="text" id="tiempocursado" name="tiempocursadosup[]" class="form-control" value="<?php echo $rows['tiempocursadosuperior'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Documento que recibe</label>
                            <input type="text" id="documentorecibe" name="documentorecibe[]" class="form-control" value="<?php echo $rows['documentosuperior'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Numero de cedula</label>
                            <input type="int" id="numerocedula" name="numerocedula[]" class="form-control" value="<?php echo $rows['numerocedulasuperior'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sube tu titulo (PDF)</label>
                            <input type="file" id="documentolicenciatura[]" name="documentolicenciatura[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sube tu cedula (PDF)</label>
                            <input type="file" id="documentocedula[]" name="documentocedula[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $licenciatura = $rows['nombreformacionsuperior'];
                            
                            $path = "documentoslicenciatura/".$licenciatura.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoslicenciatura/$licenciatura$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoslicenciatura/$licenciatura$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento cedula</strong>
                            <?php
                            clearstatcache();
                            $licenciatura = $rows['nombreformacionsuperior'];
                            
                            $path = "documentoscedulalicenciatura/".$licenciatura.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscedulalicenciatura/$licenciatura$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscedulalicenciatura/$licenciatura$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php  } ?>

                <div class="form-group col-md-3">
                    <strong>Agregar licenciatura (Solo numeros)</strong>
                    <input type="number" id="quantity" name="numlicenciaturas" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                                    <h1 style="font-size:22px;">Información licenciatura ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacion[${i}]" name="nombreformacion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucion[${i}]" name="nombreinstitucion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainicio[${i}]" name="fechainiciosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechatermino[${i}]" name="fechaterminosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursado[${i}]" name="tiempocursadosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibe[${i}]" name="documentorecibe[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedula[${i}]" name="numerocedula[]" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu titulo ${i +1} (PDF)</label>
                                <input type="file" id="documentolicenciatura[${i}]" name="documentolicenciatura[]" class="form-control" accept=".pdf">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu cedula ${i +1} (PDF)</label>
                                <input type="file" id="documentocedula[${i}]" name="documentocedula[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>

                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color:white;">
                    <h1 style="font-size:22px;">Nivel Maestria</h1>
                </div>
                <?php
                require 'conexionRh.php';
                $sqlQueryComentariosm  = $conexionRh->prepare("SELECT estudiosmaestria.id_empleado FROM estudiosmaestria where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqlm = $conexionRh->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
                $sqlm->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowm = $sqlm->fetch()) {
                    $valorm = $rowm['id_maestria'];
                ?>
                    <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:1px;color:white;">
                        <h1 style="font-size:22px;">Datos Maestria</h1>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre de la formación académica</label>
                            <input type="text" id="nombreformacion" name="nombreformacionmaestria[]" class="form-control" value="<?php echo $rowm['nombreformacionmaestria']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre de la institución educativa</label>
                            <input type="text" id="nombreinstitucion" name="nombreinstitucionmaestria[]" class="form-control" value="<?php echo $rowm['nombremaestria'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de inicio</label>
                            <input type="date" id="fechainicio" name="fechainiciosupmaestria[]" class="form-control" value="<?php echo $rowm['fechamaestriainicio'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha termino</label>
                            <input type="date" id="fechatermino" name="fechaterminosupmaestria[]" class="form-control" value="<?php echo $rowm['fechamaestriatermino'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Años cursados</label>
                            <input type="text" id="tiempocursado" name="tiempocursadosupmaestria[]" class="form-control" value="<?php echo $rowm['tiempocursadomaestria'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Documento que recibe</label>
                            <input type="text" id="documentorecibe" name="documentorecibemaestria[]" class="form-control" value="<?php echo $rowm['documentomaestria'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Numero de cedula</label>
                            <input type="int" id="numerocedula" name="numerocedulamaestria[]" class="form-control" value="<?php echo $rowm['numerocedulamaestria'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sube tu titulo (PDF)</label>
                            <input type="file" id="documentomaestria[]" name="documentomaestria[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sube tu cedula (PDF)</label>
                            <input type="file" id="documentomaestriacedula[]" name="documentomaestriacedula[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $maestria = $rowm['nombreformacionmaestria'];
                            
                            $path = "documentosmaestria/".$maestria.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosmaestria/$maestria$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosmaestria/$maestria$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento cedula</strong>
                            <?php
                            clearstatcache();
                            $maestria = $rowm['nombreformacionmaestria'];
                            
                            $path = "documentosmaestriacedula/".$maestria.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosmaestriacedula/$maestria$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosmaestriacedula/$maestria$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php  } ?>

                <div class="form-group col-md-3">
                    <strong>Agregar maestria (Solo numeros)</strong>
                    <input type="number" id="quantity2" name="maestrias" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity2").addEventListener("input", (event) => {
                        let content = '';

                        const quantity2 = event.target.value;

                        for (let i = 0; i < quantity2; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                                    <h1 style="font-size:22px;">Información maestria ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionmaestria[${i}]" name="nombreformacionmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionmaestria[${i}]" name="nombreinstitucionmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciomaestria[${i}]" name="fechainiciosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminomaestria[${i}]" name="fechaterminosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadomaestria[${i}]" name="tiempocursadosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibemaestria[${i}]" name="documentorecibemaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="numerocedulamaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Sube tu titulo ${i +1} (PDF)</label>
                                <input type="file" id="documentomaestria[${i}]" name="documentomaestria[]" class="form-control" accept=".pdf">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu cedula ${i +1} (PDF)</label>
                                <input type="file" id="documentomaestriacedula[${i}]" name="documentomaestriacedula[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests2").innerHTML = content;
                    })
                </script>

                <div id="divGuests2"></div>
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                    <h1 style="font-size:22px;">Posgrado/Especialidad</h1>
                </div>
                <?php
                require 'conexionRh.php';
                $sqlQueryComentariosm  = $conexionRh->prepare("SELECT especialidad.id_empleado FROM especialidad where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqlm = $conexionRh->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
                $sqlm->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowm = $sqlm->fetch()) {
                    $valorm = $rowm['id_especialidad'];
                ?>
                    <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:1px;color:white;">
                        <h1 style="font-size:22px;">Datos Posgrado/Especialidad</h1>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre de la formación académica</label>
                            <input type="text" id="nombreformacion" name="nombreformacionposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['nombreformacionacademica']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre de la institución educativa</label>
                            <input type="text" id="nombreinstitucion" name="nombreinstitucionposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['nombreinstitucion'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Unidad hospitalaria</label>
                            <input type="text" id="unidadhospitalariaesp" name="unidadhospitalariaposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['unidadhospitalaria'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Fecha de inicio</label>
                            <input type="date" id="fechainicio" name="fechainiciosupposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['fechainicioespecialidad'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Fecha termino</label>
                            <input type="date" id="fechatermino" name="fechaterminosupposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['fechaterminoespecialidad'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Años cursados</label>
                            <input type="text" id="tiempocursado" name="tiempocursadosupposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['anioscursados'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Documento que recibe</label>
                            <input type="text" id="documentorecibe" name="documentorecibeposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['documentorecibeespecialidad'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero de cedula</label>
                            <input type="int" id="numerocedula" name="numerocedulaposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['numerocedulaespecialidad'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentoposgradoesp[]" name="documentoposgradoesp[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento</strong>
                            <?php
                            clearstatcache();
                            $posgrado = $rowm['nombreformacionacademica'];
                            
                            $path = "documentosposgradoesp/".$posgrado.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php  } ?>
                <div class="form-group col-md-3">
                    <strong>Agregar posgrado/especialidad (Solo numeros)</strong>
                    <input type="number" id="quantity3" name="posgrados" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity3").addEventListener("input", (event) => {
                        let content = '';

                        const quantity3 = event.target.value;

                        for (let i = 0; i < quantity3; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                                    <h1 style="font-size:22px;">Información posgrado ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionmaestria[${i}]" name="nombreformacionposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionmaestria[${i}]" name="nombreinstitucionposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciomaestria[${i}]" name="fechainiciosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminomaestria[${i}]" name="fechaterminosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadomaestria[${i}]" name="tiempocursadosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Unidad hospitalaria ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="unidadhospitalariaposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibemaestria[${i}]" name="documentorecibeposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="numerocedulaposgradoespecialidad[]" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu documento ${i +1} (PDF)</label>
                                <input type="file" id="documentoposgradoesp[${i}]" name="documentoposgradoesp[]" class="form-control" accept=".pdf">
                            </div>

                        </div>`;
                        }
                        document.getElementById("divGuests3").innerHTML = content;
                    })
                </script>

                <div id="divGuests3"></div>
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
                    <h1 style="font-size:22px;">Doctorado/Subespecialidad</h1>
                </div>
                <?php
                require 'conexionRh.php';
                $sqlQueryComentariosm  = $conexionRh->prepare("SELECT doctorado.id_empleado FROM doctorado where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqld = $conexionRh->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
                $sqld->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowd = $sqld->fetch()) {
                    $valord = $rowd['id_doctorado'];
                ?>
                    <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:1px;color:white;">
                        <h1 style="font-size:22px;">Datos Doctorado</h1>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre de la formación académica</label>
                            <input type="text" id="nombreformacion" name="nombreformaciondoctorado[]" class="form-control" value="<?php echo $rowd['nombreformaciondoctorado']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre de la institución educativa</label>
                            <input type="text" id="nombreinstitucion" name="nombreinstituciondoctorado[]" class="form-control" value="<?php echo $rowd['nombreinstituciondoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Unidad hospitalaria</label>
                            <input type="text" id="unidadhospitalariaesp" name="unidadhospitalariadoctorado[]" class="form-control" value="<?php echo $rowd['unidadhospitalariadoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Fecha de inicio</label>
                            <input type="date" id="fechainiciodoctorado" name="fechainiciosupdoctorado[]" class="form-control" value="<?php echo $rowd['fechainiciodoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Fecha termino</label>
                            <input type="date" id="fechatermino" name="fechaterminosupdoctorado[]" class="form-control" value="<?php echo $rowd['fechaterminodoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Años cursados</label>
                            <input type="text" id="tiempocursado" name="tiempocursadosupdoctorado[]" class="form-control" value="<?php echo $rowd['anioscursadosdoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Documento que recibe</label>
                            <input type="text" id="documentorecibe" name="documentorecibedoctorado[]" class="form-control" value="<?php echo $rowd['documentorecibedoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero de cedula</label>
                            <input type="int" id="numerocedula" name="numeroceduladoctorado[]" class="form-control" value="<?php echo $rowd['numeroceduladoctorado'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Sube tu titulo (PDF)</label>
                            <input type="file" id="documentodoctorado[]" name="documentodoctorado[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Sube tu cedula (PDF)</label>
                            <input type="file" id="documentodoctoradocedula[]" name="documentodoctoradocedula[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $doctorado = $rowd['nombreformaciondoctorado'];
                            
                            $path = "documentosdoctorado/".$doctorado.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosdoctorado/$doctorado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosdoctorado/$doctorado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento cedula</strong>
                            <?php
                            clearstatcache();
                            $doctorado = $rowd['nombreformaciondoctorado'];
                            
                            $path = "documentosdoctoradocedula/".$doctorado.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosdoctoradocedula/$doctorado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosdoctoradocedula/$doctorado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php  } ?>
                <div class="form-group col-md-3">
                    <strong>Agregar doctorado (Solo numeros)</strong>
                    <input type="number" id="quantity4" name="doctorados" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity4").addEventListener("input", (event) => {
                        let content = '';

                        const quantity4 = event.target.value;

                        for (let i = 0; i < quantity4; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color:white;">
                                    <h1 style="font-size:22px;">Información doctorado ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionmaestria[${i}]" name="nombreformaciondoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionmaestria[${i}]" name="nombreinstituciondoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciomaestria[${i}]" name="fechainiciosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminomaestria[${i}]" name="fechaterminosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadomaestria[${i}]" name="tiempocursadosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Unidad hospitalaria ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="unidadhospitalariadoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibemaestria[${i}]" name="documentorecibedoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="numeroceduladoctorado[]" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu titulo ${i +1} (PDF)</label>
                                <input type="file" id="documentodoctorado[${i}]" name="documentodoctorado[]" class="form-control" accept=".pdf">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sube tu cedula ${i +1} (PDF)</label>
                                <input type="file" id="documentodoctoradocedula[${i}]" name="documentodoctoradocedula[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests4").innerHTML = content;
                    })
                </script>

                <div id="divGuests4"></div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                <a href="#"  id="btn-send" style="background-color: yellow; color: white; font-size: 15px;" onclick="window.location.href='principalRh';">Cerrar</a>&nbsp;&nbsp;
                    <input type="submit" name="add" id="btn-send" value="Actualizar">
                </div>
            </div></form>
                <script>
                    $('input[type="file"]').on('change', function () {
                        var ext = $(this).val().split('.').pop();
                        if ($(this).val() != '') {
                            if (ext == "pdf") {
                            
                                if ($(this)[0].files[0].size > 5048576) {
                                    console.log("El documento excede el tamaño máximo");
                                    alert('¡Precaución! Se solicita un archivo no mayor a 5MB. Por favor verifica.');
                                    
                                    $(this).val('');
                                } else {
                                    $("#mensaje").hide();
                                }
                            }
                            else {
                                $(this).val('');
                                alert("Extensión no permitida: " + ext);
                            }
                        }
                    });
                </script>