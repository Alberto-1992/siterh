<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <div id="mensaje"></div>
    <h1 style="text-align: center; font-size: 25px;">Documentos expediente</h1>
    <input type="hidden" id="numempleado" value="<?php echo $row['Empleado'] ?>">
    <input type="hidden" id="correo" value="<?php echo $row['correo'] ?>">
   
    <a href="#" class="form-control" style="width: 125px; background: yellowgreen;" onclick="academicos();">Validar Datos</a>
    <!DOCTYPE html>
<html lang="es">

</head>
<body style="padding: 0px;">

<?php 
$correo = $_POST['correo'];
require 'conexionRh.php';
 $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
 $sql->execute(array(
     ':correo'=>$correo
 ));
 $row = $sql->fetch();
 $identificador = $row['Empleado'];
            $validaid = $row['id_datopersonal'];
            $nss = $row['NSS'];
            $banco = $row['NombreBanco'];
            $cuenta = $row['CuentaClabe'];
            $nacionalidad = $row['nacionalidad'];
            $calle = $row['calle'];
            $numexte = $row['numeroexterior'];
            $numint = $row['numerointerior'];
            $cp = $row['codigopostal'];
            $colonia = $row['colonia'];
            $telcasa = $row['telefonocasa'];
            $telcel = $row['telefonocelular'];
            $fechanacimiento = $row['fechanacimiento'];
            $edad = $row['edad'];
            $sexo = $row['genero'];
            $tiposangre = $row['tipodesangre'];
            $nombreemergencia = $row['nombreemergencia'];
            $telefonoemergencia = $row['telefonoemergencia'];
            $parentezcoemergencia = $row['parentescoemergencia'];
            $otrotel = $row['otrotelefono'];
            $localidad = $row['localidad'];
            $numerocartillamilitar = $row['numerocartillamilitar'];
            $cartanaturalizacion = $row['cartanaturalizacion'];
            $estado = $row['estado'];
            $municipio = $row['municipio'];
$datocurp = $row['CURP'];
$sql = $conexionRh->prepare("SELECT t_estado.estado from t_estado where id_estado = :id_estado");
    $sql->execute(array(
        ':id_estado'=>$estado
    ));
    $rowestado = $sql->fetch();
    $estadovive = $rowestado['estado'];
    
$sql = $conexionRh->prepare("SELECT municipio from t_municipio where id_municipio = :id_municipio");
    $sql->execute(array(
        ':id_municipio'=>$municipio
    ));
    $rowmunicipio = $sql->fetch();
    $municipiovive = $rowmunicipio['municipio'];

    $curp = $row['CURP'];
    $rest = substr($curp, -7, 2);

    $sql = $conexionRh->prepare("SELECT Estado from codigoestadosmexico where RENAPO = :RENAPO");
        $sql->execute(array(
            ':RENAPO'=>$rest
        ));
        $obj = $sql->fetch();
        $entidadnacimiento = $obj['Estado'];
    ?>

    <h1 style="text-align: center; font-size: 25px;">Información personal</h1>

    <form name="datospersonalesactualizar" id="datospersonalesactualizar" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">

        <div class="form-row">
            <div id="cabeceras">
                <h1 style="font-size:22px;">Datos personales</h1>
            </div>
            <div class="col-md-3">
                <label for="mensaje">N° empleado:</label>
                <input type="number" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
            </div>
            <div class="col-md-3">
                <label for="mensaje">CURP:</label>
                <input type="text" class="form-control" name="curp" id="curp" placeholder="CURP" minlength="18" maxlength="18" value="<?php echo $row['CURP'] ?>" required onkeyup="curp2dateAct();" readonly>
            </div>
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Vista CURP</strong>
                            <?php
                            $archivo = "Comprobante CURP";
                            
                            $path = "documentoscurp/".$datocurp.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscurp/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscurp/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                        </div>
                
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Vista acta nacimiento</strong>
                            <?php
                            $archivo = "Comprobante acta nacimiento";
                            
                            $path = "documentosactanacimiento/".$identificador.'/';
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosactanacimiento/$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosactanacimiento/$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                        </div>
            
            <div class="col-md-3">
                <label for="mensaje">N° de cartilla militar:</label>
                <input type="text" class="form-control" name="cartillamilitar" id="cartillamilitar" value="<?php echo $numerocartillamilitar ?>">
            </div>
        
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Vista Cartilla</strong>
                            <?php
                            $archivo = "Cartilla militar";
                            
                            $path = "documentoscartilla/".$datocurp.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscartilla/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscartilla/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                        </div>
            
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Vista Comp Domicilio</strong>
                            <?php
                            
                            $archivo = "Comprobante domicilio";
                            
                            $path = "documentoscomprobantedomicilio/".$datocurp.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscomprobantedomicilio/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscomprobantedomicilio/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                        </div>
                
                        <?php
                $sqlhijos  = $conexionRh->prepare("SELECT hijos.id_empleado FROM hijos where id_empleado = $identificador ");
                $sqlhijos->execute();
                $sqlhijos = $conexionRh->prepare("SELECT FOUND_ROWS()");
                $sqlhijos->execute();
                $total_registro = $sqlhijos->fetchColumn();

                $sql = $conexionRh->prepare("SELECT * from hijos where id_empleado = :id_empleado");
                $sql->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rows = $sql->fetch()) {
                    $valor = $rows['id_hijo'];

                    $edadhijo = $rows['edadhijo'];
                ?>
        <div id="cabeceras">
                <h1 style="font-size:22px;">Datos hijos</h1>
            </div>
            <div class="col-md-3">
                <label for="mensaje">CURP:</label>
                <input type="text" class="form-control" name="curphijo[]" id="curphijo[]" value="<?php echo $rows['curphijo'] ?>" maxlength="18">
            </div>
            
            <div class="col-md-5" style="border: 1px solid #F0F0F0;">
                            <strong>Vista CURP Hijo</strong>
                            <?php
                            $idhijo = $rows['nombrecompletohijo'];
                            $archivo = "Comprobante hijo";
                            
                            $path = "documentoshijos/".$idhijo.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoshijos/$idhijo$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoshijos/$idhijo$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                </div>
            <?php } ?>

    <script>
        function academicos() {
            let id = $("#numempleado").val();
            let correovalido = $("#correousuario").val();
            let ob = {
                id: id,correovalido:correovalido
            };
            $.ajax({
                type: "POST",
                url: "aplicacion/validarDatosAcademicos.php",
                data: ob,
                beforeSend: function() {
                    $('#mensaje').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                        );
                    },
                success: function(data) {

                    $("#mensaje").html(data);
                    
                    let evento = $("#numempleado").val();
                    let ob = {
                            evento: evento
                        };
                    $.ajax({
                            type: "POST",
                url: "consultaplantillahraei.php",
                data: ob,
                beforeSend: function() {
                    $('#mensaje').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                        );
                    },
                success: function(data) {

                    $("#tabla_resultadobus").html(data);
                    let id = $("#numempleado").val();
                    let ob = {
                            id: id
                        };
                    $.ajax({
                            type: "POST",
                url: "consultaBusquedaPlantillaHraei.php",
                data: ob,
                beforeSend: function() {
                    $('#mensaje').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                        );
                    },
                success: function(data) {

                    $("#tabla_resultado").html(data);

                }

            });

                }

            });

                }

            });
        }
    </script>
    
    <form name="datosacademicosactualizar" id="datosacademicosactualizar" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
<style>
    iframe {
        width: 15rem;
        height: 15rem;
    }
</style>

<div class="form-row">
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Datos Academicos</h1>
                </div>
                
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Nivel Medio Superior</h1>
                </div>
                <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                    <strong>Documento</strong>
                    <?php
                    clearstatcache();
                    $mediasup = $row['nombreformacionmedia'];
                    $path = "documentosmediasup/" . $mediasup . $identificador;
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
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();

                $sqlt = $conexionX->prepare("SELECT * from estudiostecnico where id_empleado = :id_empleado");
                $sqlt->execute(array(
                    ':id_empleado' => $identificador
                ));
                $rowt = $sqlt->fetch();
                ?>
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Nivel tecnico</h1>
                </div>

            
                <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                    <strong>Documento titulo</strong>
                    <?php
                    clearstatcache();
                    $tecnica = $rowt['nombreformaciontecnica'];
                    $path = "documentostecnica/" . $tecnica . $identificador;
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

                    $path = "documentostecnicacedula/" . $tecnicacedula . $identificador;
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
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Nivel postecnico</h1>
                </div>

                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentariosP  = $conexionX->prepare("SELECT estudiospostecnico.id_empleado FROM estudiospostecnico where id_empleado = $identificador ");
                $sqlQueryComentariosP->execute();
                $sqlQueryComentariosP = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosP->execute();
                $total_registroP = $sqlQueryComentariosP->fetchColumn();

                $sqlP = $conexionX->prepare("SELECT * from estudiospostecnico where id_empleado = :id_empleado");
                $sqlP->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowsP = $sqlP->fetch()) {
                    $valorP = $rowsP['id_postecnico'];
                ?>
                    <div id="cabeceras">
                        <h1 style="font-size:22px;">Datos postecnico</h1>
                    </div>
                    
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento postecnico</strong>
                            <?php
                            clearstatcache();
                            $postecnico = $rowsP['nombreformacionpostecnico'];

                            $path = "documentospostecnico/" . $postecnico . $identificador;
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

                
                <!--inicia licenciatura -->
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Nivel Superior</h1>
                </div>

                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentarios  = $conexionX->prepare("SELECT estudiossuperior.id_empleado FROM estudiossuperior where id_empleado = $identificador ");
                $sqlQueryComentarios->execute();
                $sqlQueryComentarios = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentarios->execute();
                $total_registro = $sqlQueryComentarios->fetchColumn();

                $sql = $conexionX->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
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
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $licenciatura = $rows['nombreformacionsuperior'];

                            $path = "documentoslicenciatura/" . $licenciatura . $identificador;
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

                            $path = "documentoscedulalicenciatura/" . $licenciatura . $identificador;
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

                
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Nivel Maestria</h1>
                </div>
                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentariosm  = $conexionX->prepare("SELECT estudiosmaestria.id_empleado FROM estudiosmaestria where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqlm = $conexionX->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
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
                    
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $maestria = $rowm['nombreformacionmaestria'];

                            $path = "documentosmaestria/" . $maestria . $identificador;
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

                            $path = "documentosmaestriacedula/" . $maestria . $identificador;
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

                <?php  }
                ?>

                <div id="cabeceras">
                    <h1 style="font-size:22px;">Posgrado/Especialidad</h1>
                </div>
                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentariosm  = $conexionX->prepare("SELECT especialidad.id_empleado FROM especialidad where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqlm = $conexionX->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
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
                    
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Titulo</strong>
                            <?php
                            clearstatcache();
                            $posgrado = $rowm['nombreformacionacademica'];

                            $path = "documentosposgradoesp/" . $posgrado . $identificador;
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
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Cedula</strong>
                            <?php
                            clearstatcache();
                            $posgrado = $rowm['nombreformacionacademica'];

                            $path = "documentoscedulaposgradoesp/" . $posgrado . $identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscedulaposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscedulaposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                            <strong>Certificado consejo</strong>
                            <?php
                            clearstatcache();
                            $posgrado = $rowm['nombreformacionacademica'];

                            $path = "documentoscertificadoposgradoesp/" . $posgrado . $identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoscertificadoposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoscertificadoposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php  } ?>
                
                <div id="cabeceras">
                    <h1 style="font-size:22px;">Doctorado/Subespecialidad</h1>
                </div>
                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentariosm  = $conexionX->prepare("SELECT doctorado.id_empleado FROM doctorado where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqld = $conexionX->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
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
                    
                        <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento titulo</strong>
                            <?php
                            clearstatcache();
                            $doctorado = $rowd['nombreformaciondoctorado'];

                            $path = "documentosdoctorado/" . $doctorado . $identificador;
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

                            $path = "documentosdoctoradocedula/" . $doctorado . $identificador;
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
                
                <div id="cabeceras" style="background-color: #448499;">
                    <h1 style="font-size:22px;">Diplomados</h1>
                </div>
                <?php
                require_once 'clases/conexion.php';
                $conexionX = new ConexionRh();
                $sqlQueryComentariosm  = $conexionX->prepare("SELECT diplomado.id_empleado FROM diplomado where id_empleado = $identificador ");
                $sqlQueryComentariosm->execute();
                $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                $sqlQueryComentariosm->execute();
                $total_registrom = $sqlQueryComentariosm->fetchColumn();

                $sqld = $conexionX->prepare("SELECT * from diplomado where id_empleado = :id_empleado");
                $sqld->execute(array(
                    ':id_empleado' => $identificador
                ));

                ?>

                <?php
                while ($rowd = $sqld->fetch()) {
                    $valord = $rowd['id_diplomado'];
                ?>
                    <div id="cabeceras">
                        <h1 style="font-size:22px;" style="background-color: #448499;">Datos Diplomado</h1>
                    </div>
                    
                            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Documento diplomado</strong>
                            <?php
                            clearstatcache();
                            $diplomado = $rowd['nombreDiplomado'];
                            $nameFile = "Diploma diplomado";
                            $path = "documentosdiplomados/$identificador/".$diplomado.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentosdiplomados/$identificador/$diplomado$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentosdiplomados/$identificador/$diplomado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                    }
                                }
                            }
                            ?>
                        </div>
                        </div>

                    <?php } ?>
                    
                
            </div>
    </div>
</body>

</html>