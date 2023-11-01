<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualización datos academicos</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenu.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

</head>

<body>
<header class="headerinfarto" style="background-color: #03CAB1;">
        
        <span id="cabecera">Actualización de datos academicos.</span>

    </header>

    <div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Actualiza tu información academica</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualizes tus datos academicos.</h1>
        
        <form name="datosacademicos" id="datosacademicos" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#datosacademicos").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("datosacademicos"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/actualizarDatosAcademicos.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
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
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Datos Academicos</h1>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Ultimo grado de estudios</label>
                    <input type="text" id="ultimogradoestudios" name="ultimogradoestudios" autocomplete="off" class="form-control" value="" required>
                </div>
                <div class="form-group col-md-12">
                    <label style="color: red;">Especialidad con la actualmente labora en el HRAEI. (Solo personal medico y enfermeria)</label>
                    <input type="text" id="especialidadlaborahraei" name="especialidadlaborahraei" autocomplete="off" class="form-control" value="" placeholder="Solo si eres personal medico o enfermeria">
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
                            clearstatcache();
                            ?>
                        </div>
                <div id="cabeceras">
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
                    <div id="cabeceras">
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
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentolicenciatura[]" name="documentolicenciatura[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento</strong>
                            <?php
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
                            clearstatcache();
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
                            <div id="cabeceras">
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
                                <label>Sube tu documento ${i +1} (PDF)</label>
                                <input type="file" id="documentolicenciatura[${i}]" name="documentolicenciatura[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>

                <div id="cabeceras">
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
                    <div id="cabeceras">
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
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentomaestria[]" name="documentomaestria[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento</strong>
                            <?php
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
                            clearstatcache();
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
                            <div id="cabeceras">
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
                                <label>Sube tu documento ${i +1} (PDF)</label>
                                <input type="file" id="documentomaestria[${i}]" name="documentomaestria[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests2").innerHTML = content;
                    })
                </script>

                <div id="divGuests2"></div>
                <div id="cabeceras">
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
                    <div id="cabeceras">
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
                            clearstatcache();
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
                            <div id="cabeceras">
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
                <div id="cabeceras">
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
                    <div id="cabeceras">
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
                            <label>Sube tu documento (PDF)</label>
                            <input type="file" id="documentodoctorado[]" name="documentodoctorado[]" class="form-control" accept=".pdf">
                        </div>
                        <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento</strong>
                            <?php
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
                            clearstatcache();
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
                            <div id="cabeceras">
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
                                <label>Sube tu documento ${i +1} (PDF)</label>
                                <input type="file" id="documentodoctorado[${i}]" name="documentodoctorado[]" class="form-control" accept=".pdf">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests4").innerHTML = content;
                    })
                </script>

                <div id="divGuests4"></div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                    <a href="#" id="btn-send-close" onclick="window.location.href='principalRh';">Cerrar</a>&nbsp;&nbsp;
                    <input type="submit" name="add" id="btn-send" value="Actualizar">
                </div>
                <script>
                    $('input[type="file"]').on('change', function () {
                        var ext = $(this).val().split('.').pop();
                        if ($(this).val() != '') {
                            if (ext == "pdf") {
                            
                                if ($(this)[0].files[0].size > 9048576) {
                                    console.log("El documento excede el tamaño máximo");
                                    $('#modal-title').text('¡Precaución!');
                                    $('#modal-msg').html("Se solicita un archivo no mayor a 1MB. Por favor verifica.");
                                    $("#modal-gral").modal();
                                    $(this).val('');
                                } else {
                                    $("#modal-gral").hide();
                                }
                            }
                            else {
                                $(this).val('');
                                alert("Extensión no permitida: " + ext);
                            }
                        }
                    });
                </script>
            </div>
        </form>
    </div>
</body>
</html>