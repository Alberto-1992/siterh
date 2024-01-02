<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualización datos personales</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenu.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>
<body style="padding: 0px; overflow-y:scroll;">
<script>
    function limpiar() {

        setTimeout('document.datospersonales.reset()', 1000);

        return false;
    }

    function deleteSp() {
        var inputs = $("input[type=text]");
        for (var i = 0; i < inputs.length; i++) {
            var aux = $(inputs[i]).val().trim();
            $(inputs[i]).val(aux);
        }
    }

    function EdadAct(FechaNacimiento) {

        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);

        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

        return edad;
    }

    function calcularEdadAct() {
        var fecha = document.getElementById('fechanacimiento').value;


        var edad = EdadAct(fecha);
        document.datospersonalesactualizar.edad.value = edad;

    }
    $(document).ready(function(curp) {

        deleteSp();
        var miCurp = document.getElementById('curp').value.toUpperCase();
        var sexo = miCurp.substr(-8, 1);
        var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);
        //miFecha = new Date(año,mes,dia) 
        var anyo = parseInt(m[1], 10) + 1900;
        if (anyo < 1920) anyo += 100;
        var mes = parseInt(m[2], 10) - 1;
        var dia = parseInt(m[3], 10);
        document.datospersonalesactualizar.fechanacimiento.value = (new Date(anyo, mes, dia));
        if (sexo == 'M') {
            document.datospersonalesactualizar.sexo.value = 'Femenino';
        } else if (sexo == 'H') {
            document.datospersonalesactualizar.sexo.value = 'Masculino';

        }
        calcularEdadAct();

    })
    Date.prototype.toString = function() {
        var anyo = this.getFullYear();
        var mes = this.getMonth() + 1;
        if (mes <= 9) mes = "0" + mes;
        var dia = this.getDate();
        if (dia <= 9) dia = "0" + dia;
        return anyo + "-" + mes + "-" + dia;
    }
    window.addEventListener('DOMContentLoaded', (evento) => {
        const hoy_fecha = new Date().toISOString().substring(0, 10);
        document.querySelector("input[name='fechanacimiento']").max = hoy_fecha;

    });
    $(document).ready(function() {
        $("#cbx_estado").change(function() {

            $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#cbx_estado option:selected").each(function() {
                id_estado = $(this).val();
                $.post("includes/getMunicipio.php", {
                    id_estado: id_estado
                }, function(data) {
                    $("#cbx_municipio").html(data);
                });
            });
        })
    });
    $(document).ready(function() {
        $("#cbx_estadoedit").change(function() {

            $('#cbx_localidadedit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#cbx_estadoedit option:selected").each(function() {
                id_estado = $(this).val();
                $.post("includes/getMunicipio.php", {
                    id_estado: id_estado
                }, function(data) {
                    $("#cbx_municipioedit").html(data);
                });
            });
        })
    });
</script>
<?php 
$datocurp = $row['CURP'];
$sql = $conexion->prepare("SELECT t_estado.estado from t_estado where id_estado = :id_estado");
    $sql->execute(array(
        ':id_estado'=>$estado
    ));
    $rowestado = $sql->fetch();
    $estadovive = $rowestado['estado'];
    
$sql = $conexion->prepare("SELECT municipio from t_municipio where id_municipio = :id_municipio");
    $sql->execute(array(
        ':id_municipio'=>$municipio
    ));
    $rowmunicipio = $sql->fetch();
    $municipiovive = $rowmunicipio['municipio'];

    $curp = $row['CURP'];
    $rest = substr($curp, -7, 2);
    $sql = $conexion->prepare("SELECT Estado from codigoestadosmexico where RENAPO = :RENAPO");
        $sql->execute(array(
            ':RENAPO'=>$rest
        ));
        $obj = $sql->fetch();
        $entidadnacimiento = $obj['Estado'];
    ?>
<header class="headerinfarto" style="background-color: #4AA29D; padding: 0px;">
        
        <span id="cabecera">Actualización de datos personales.</span>

    </header>
<div class="container">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <div id="mensaje"></div>
    <h1 style="text-align: center; font-size: 25px;">Actualiza tu información personal</h1>
    <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualices tus datos personales.</h1>

        <form name="datospersonales" id="datospersonales" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#datospersonales").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("datospersonales"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/actualizarDatosPersonales.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(objeto) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(data) {
                            $("#mensaje").html(data);
                        }
                    })
                })
            </script>
           <div class="form-row">
            <div id="cabeceras">
                <h1 style="font-size:22px;">Datos personales</h1>
            </div>

    <div class=" col-md-3">
        <strong>Sube tu Constancia de situación fiscal</strong>
    <input type="file"  class="form-control" name="documentoactvidadeconomica" accept=".pdf" >
    </div>
    <div class="col-md-3">
        <strong>Fecha de expedición de constancia</strong>
        <input type="date"  class="form-control" name="fechaexpedicionconstancia">
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Constancia</strong>
    <?php
    $identificador;
    $acteconomica = 'actividad economica';
    $path = "documentos/".$identificador.'/'.$acteconomica.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$identificador/$acteconomica.pdf' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$identificador/$acteconomica.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='aplicacion/eliminarDocumento?titulo=$acteconomica&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <div class="col-md-3">
        <strong>Sube tu INE</strong>
        <input type="file"  class="form-control" name="documentoine" accept=".pdf" >
    </div>
    <div class="col-md-3">
        <strong>Fecha de vencimiento INE</strong>
        <input type="date"  class="form-control" name="fechavencimientoine" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>INE</strong>
    <?php
    $identificador;
    $ine = 'ine';
    $path = "documentos/" .$identificador.'/'.$ine.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$identificador/$ine.pdf' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$identificador/$ine.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='aplicacion/eliminarDocumento?titulo=$ine&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>

    <div class="col-md-6">
        <strong>Firma electronica</strong>
        <input type="file"  class="form-control" name="documentofirmaelectonica" accept=".zip">
    </div>
    <div class="col-md-3">
        <strong>Fecha de expedición eFIRMA</strong>
        <input type="date"  class="form-control" name="fechavencimientoefirma">
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Firma electronica</strong>
    <?php
    $identificador;
    $firmaelectronica = 'firma electronica';
    $path = "documentos/" .$identificador.'/'.$firmaelectronica.'.rar';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                //echo "<iframe src='documentos/$firmaelectronica$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$identificador/$firmaelectronica.rar' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar' class='fas fa-file-archive' style='font-size: 25px;'></i></a>";
                echo "<a href='aplicacion/eliminarFirmaElectronica?titulo=$firmaelectronica&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-6">
        <strong>Clave interbancaria</strong>
        <input type="file"  class="form-control" name="documentoclaveinterbancaria" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Clave interbancaria</strong>
    <?php
    $identificador;
    $claveinter = 'clave interbancaria';
    $path = "documentos/" .$identificador.'/'.$claveinter.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$identificador/$claveinter.pdf' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$identificador/$claveinter.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='aplicacion/eliminarDocumento?titulo=$claveinter&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <div class="col-md-6">
        <strong>¿Eres casado? sube tu acta de matrimonio</strong>
        <input type="file"  class="form-control" name="documentoactamatrimonio" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Documento acta de matrimonio</strong>
    <?php
    $identificador;
    $actamatrimonio = 'acta de matrimonio';
    $path = "documentos/" .$identificador.'/'.$actamatrimonio.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$identificador/$actamatrimonio.pdf' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$identificador/$actamatrimonio.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='aplicacion/eliminarDocumento?titulo=$actamatrimonio&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
            <div class="col-md-3">
                <label for="mensaje">N° empleado:</label>
                <input type="number" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
            </div>
            <div class="col-md-3">
                <label for="mensaje">CURP:</label>
                <input type="text" class="form-control" name="curp" id="curp" placeholder="CURP" minlength="18" maxlength="18" value="<?php echo $row['CURP'] ?>" required onkeyup="curp2dateAct();" readonly>
            </div>
            <div class="col-md-3">
                <label for="mensaje">Sube tu CURP:</label>
                <input type="file" class="form-control" name="documentocurp" id="documentocurp" accept=".pdf">
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
                        <div class="col-md-3">
            <label for="mensaje">Sube acta de nacimiento:</label>
                <input type="file" class="form-control" name="documentoactanacimiento" id="documentoactanacimiento" accept=".pdf">
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
                <label for="mensaje">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" required readonly value="">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Edad:</label>
                <input type="number" class="form-control" name="edad" id="edad" required readonly value="<?php echo $edad ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Sexo:</label>
                <input type="text" class="form-control" name="sexo" id="sexo" required readonly value="<?php echo $sexo ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Estado civil:</label>
                <input type="text" class="form-control" name="estadocivil" id="estadocivil" required value="<?php echo $row['estadocivil'] ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Entidad de nacimiento:</label>
                <input type="text" class="form-control" name="entidadnacimiento" id="entidadnacimiento" placeholder="Entidad nacimiento" required value="<?php echo $entidadnacimiento ?>" readonly>
            </div>

            <div class="col-md-3">
                <label for="mensaje">Tipo de sangre:</label>
                <input type="text" class="form-control" name="tipodesangre" id="tipodesangre" required value="<?php echo $tiposangre ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Nacionalidad:</label>
                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required value="<?php echo $nacionalidad ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">N° de cartilla militar:</label>
                <input type="text" class="form-control" name="cartillamilitar" id="cartillamilitar" value="<?php echo $numerocartillamilitar ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Sube tu cartilla militar:</label>
                <input type="file" class="form-control" name="documentocartilla" id="documentocartilla" accept=".pdf">
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
            <div class="col-md-3">
                <label for="mensaje">Carta de naturalizacion:</label>
                <input type="text" class="form-control" name="naturalizacion" id="naturalizacion" value="<?php echo $cartanaturalizacion ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">N° de seguro social:</label>
                <input type="text" class="form-control" name="numerosegurosocial" id="numerosegurosocial" value="<?php echo $nss ?>" readonly>
            </div>
            <div class="col-md-3">
                <input type="hidden" class="form-control" name="banco" id="banco" value="<?php echo $banco ?>" readonly>
            </div>
            <div class="col-md-3">
                <input type="hidden" class="form-control" name="numerocuenta" id="numerocuenta" value="<?php echo $cuenta ?>" readonly>
            </div>
            <script>
                $(document).ready(function() {

                    $('#nombreinstitucion').change(function(e) {
                        if ($(this).val() === "OTRO") {

                            $('#otrodocumento').prop("hidden", false);

                        } else {
                            $('#otrodocumento').prop("hidden", true);
                            $('#otroexpidedocumento').val('');

                        }
                    })
                });
                $(function() {
                    $('#otrodocumento').prop("hidden", true);

                })
            </script>
            <div id="cabeceras">
                <h1 style="font-size:22px;">Domicilio</h1>
            </div>
            <div class="col-md-3">
                <label for="mensaje">Calle:</label>
                <input type="text" class="form-control" name="calle" id="calle" value="<?php echo $calle ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">N° exterior:</label>
                <input type="text" class="form-control" name="numeroexterior" id="numeroexterior" value="<?php echo $numexte ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">N° interior:</label>
                <input type="text" class="form-control" name="numerointerior" id="numerointerior" value="<?php echo $numint ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Codigo postal:</label>
                <input type="number" class="form-control" name="codigopostal" id="codigopostal" value="<?php echo $cp ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Estado:</label>
                <select class="form-control" name="cbx_estado" id="cbx_estado" required onchange="tipoCapacitacion();">
                    <option value="<?php echo $estado ?>"><?php echo $estadovive ?></option>
                    <?php
                    require 'conexionRh.php';
                    $query = "SELECT id_estado, estado FROM t_estado ";
                    $resultado = $conexionGrafico->query($query);
                    while ($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_estado']; ?>">
                            <?php echo $row['estado']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="mensaje">Alcaldía o Municipio</label>
                <select name="cbx_municipio" id="cbx_municipio" class="form-control">
                        <option value="<?php echo $municipio ?>"><?php echo $municipiovive ?></option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="mensaje">Localidad:</label>
                <input type="text" class="form-control" name="localidad" id="localidad" value="<?php echo $localidad ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Colonia:</label>
                <input type="text" class="form-control" name="colonia" id="colonia" value="<?php echo $colonia ?>">
            </div>
            <div class="col-md-2">
                <label for="mensaje">Tel casa:</label>
                <input type="text" class="form-control" name="telcasa" id="telcasa" value="<?php echo $telcasa ?>">
            </div>
            <div class="col-md-2">
                <label for="mensaje">Tel cel:</label>
                <input type="text" class="form-control" name="telcel" id="telcel" value="<?php echo $telcel ?>">
            </div>
            <div class="col-md-2">
                <label for="mensaje">Otro tel:</label>
                <input type="text" class="form-control" name="otrotel" id="otrotel" value="<?php echo $otrotel ?>">
            </div>
            <div class="col-md-3">
                <label for="mensaje">Sube un comprobante de domicilio:</label>
                <input type="file" class="form-control" name="documentodomicilio" id="documentodomicilio" accept=".pdf">
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
                        <script>
                    function deleteSp() {
        var inputs = $("input[type=text]");
        for (var i = 0; i < inputs.length; i++) {
            var aux = $(inputs[i]).val().trim();
            $(inputs[i]).val(aux);
        }
    }

    function EdadActhijo(FechaNacimiento) {

        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);

        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

        return edad;
    }

    function calcularEdadActhijo() {
        var fecha = document.getElementById('fechanacimientohijo').value;


        var edad = EdadActhijo(fecha);
        document.datospersonalesactualizar.edadhijo.value = edad;

    }
    function curp2date(curphijo) {
        deleteSp();
        var miCurp = document.getElementById('curphijo').value.toUpperCase();
        var sexo = miCurp.substr(-8, 1);
        var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);
        //miFecha = new Date(año,mes,dia) 
        var anyo = parseInt(m[1], 10) + 1900;
        if (anyo < 1980) anyo += 100;
        var mes = parseInt(m[2], 10) - 1;
        var dia = parseInt(m[3], 10);
        document.datospersonalesactualizar.fechanacimientohijo.value = (new Date(anyo, mes, dia));
        if (sexo == 'M') {
            document.datospersonalesactualizar.sexohijo.value = 'Femenino';
        } else if (sexo == 'H') {
            document.datospersonalesactualizar.sexohijo.value = 'Masculino';

        }
        calcularEdadActhijo();

    }
    Date.prototype.toString = function() {
        var anyo = this.getFullYear();
        var mes = this.getMonth() + 1;
        if (mes <= 9) mes = "0" + mes;
        var dia = this.getDate();
        if (dia <= 9) dia = "0" + dia;
        return anyo + "-" + mes + "-" + dia;
    }
    window.addEventListener('DOMContentLoaded', (evento) => {
        const hoy_fecha = new Date().toISOString().substring(0, 10);
        document.querySelector("input[name='fechanacimientohijo[]']").max = hoy_fecha;

    });
                </script>
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
            <div class="col-md-3">
                <label for="mensaje">Nombre completo:</label>
                <input type="text" class="form-control" name="nombrehijo[]" id="nombrehijo[]" value="<?php echo $rows['nombrecompletohijo'] ?>">
            </div>
            <div class="col-md-2">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fechanacimientohijo[]" id="fechanacimientohijo[]" class="form-control" value="<?php echo $rows['fechanacimientohijo'] ?>" >
                </div>
            <div class="col-md-2">
                <label for="mensaje">Edad:</label>
                <input type="number" class="form-control" name="edadhijo[]" id="edadhijo[]" value="<?php echo $edadhijo ?>" >
            </div>
            <div class="col-md-2">
                <label for="mensaje">Sexo:</label>
                <input type="text" class="form-control" name="sexohijo[]" id="sexohijo[]" value="<?php echo $rows['sexohijo'] ?>" >
            </div>
            
            <div class="col-md-6">
                <label for="mensaje">Sube el CURP:</label>
                <input type="file" class="form-control" name="documentocurphijo[]" id="documentocurphijo" accept=".pdf">
            </div>
            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                            <strong>Vista CURP hijo</strong>
                            <?php
                            $idhijo = $rows['nombrecompletohijo'];
                            $doc = "curp hijo";
                            
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
                <div class="col-md-6">
                <label for="mensaje">Sube el acta de nacimiento:</label>
                <input type="file" class="form-control" name="documentoactahijo[]" id="documentoactahijo" accept=".pdf">
            </div>
            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                            <strong>Vista acta nacimineto hijo</strong>
                            <?php
                            $idhijo = $rows['nombrecompletohijo'];
                            $docacta = "acta hijo";
                            
                            $path = "documentoshijos/".$docacta.$idhijo.$identificador;
                            if (file_exists($path)) {
                                $directorio = opendir($path);
                                while ($archivo = readdir($directorio)) {
                                    if (!is_dir($archivo)) {
                                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                        echo "<iframe src='documentoshijos/$docacta$idhijo$identificador/$archivo' class='form-control'></iframe>";
                                        echo "<a href='documentoshijos/$docacta$idhijo$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        
                                    }
                                }
                            }
                            clearstatcache();
                            ?>
                </div>
            <?php } ?>
            <div class="form-group col-md-3">
                    <strong>Tienes hijos? (Solo numeros)</strong>
                    <input type="number" id="quantity" name="numhijos" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                
                <script>
                    document.getElementById("quantity").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                            <div id="cabeceras">
                                    <h1 style="font-size:22px;">Información Hijo ${i +1}</h1>
                                </div>
                                <div class="form-group col-md-6">
                                <label>CURP ${i +1}</label>
                                <input type="text" id="curphijo" name="curphijo[]" class="form-control" onkeyup="curp2date();" maxlength="18">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre completo ${i +1}</label>
                                <input type="text" id="nombrehijo" name="nombrehijo[]" class="form-control" onkeyup="calcularEdadActhijo();">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Fecha nacimiento hijo ${i +1}</label>
                                <input type="date" id="fechanacimientohijo" name="fechanacimientohijo[]" class="form-control" >
                                </div>
                                <div class="form-group col-md-3">
                                <label>Edad ${i +1}</label>
                                <input type="int" id="edadhijo" name="edadhijo[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Sexo ${i +1}</label>
                                <input type="text" id="sexohijo" name="sexohijo[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Sube el CURP ${i +1}</label>
                                <input type="file" id="documentocurphijo[${i}]" name="documentocurphijo[]" class="form-control" accept=".pdf">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Sube acta de nacimiento  ${i +1}</label>
                                <input type="file" id="documentoactahijo[${i}]" name="documentoactahijo[]" class="form-control" accept=".pdf">
                                </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>

            <div id="cabeceras">
                <h1 style="font-size:22px;">En caso de emergencia, llamar a:</h1>
            </div>
            <div class="col-md-4">
                <label for="mensaje">Nombre:</label>
                <input type="text" class="form-control" name="nombreemergencia" id="nombreemergencia" value="<?php echo $nombreemergencia ?>">
            </div>
            <div class="col-md-4">
                <label for="mensaje">Telefono:</label>
                <input type="text" class="form-control" name="telefonoemergencia" id="telefonoemergencia" value="<?php echo $telefonoemergencia ?>">
            </div>
            <div class="col-md-4">
                <label for="mensaje">Parentesco:</label>
                <input type="mail" class="form-control" name="parentescoemergencia" id="parentescoemergencia" value="<?php echo $parentezcoemergencia ?>">
            </div>
            <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
            <a href="#" id="btn-send-close" onclick="window.location.href='principalRh';">Cerrar</a>&nbsp;&nbsp;
                <input type="submit" name="add" id="btn-send" value="Actualizar">
            </div>
        </div>

    </form>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">
    function myFunction() {
        $.ajax({
            url: "notificaciones/notificaciones.php",
            type: "POST",
            processData: false,
            success: function(data) {
                $("#notification-count").remove();
                $("#notification-latest").show();
                $("#notification-latest").html(data);
            },
            error: function() {}
        });
    }

    $(document).ready(function() {
        $('body').click(function(e) {
            if (e.target.id != 'notification-icon') {
                $("#notification-latest").hide();
            }
        });
    });
</script>
<script>
                    $('input[type="file"]').on('change', function () {
                        var ext = $(this).val().split('.').pop();
                        if ($(this).val() != '') {
                            if (ext == "pdf" || ext == "zip") {
                            
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
