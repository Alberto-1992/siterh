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
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #0D9A85;">
    <span id="cabecera">Actualización datos personales</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav>

<div class="container">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <div id="mensaje"></div>
    <h1 style="text-align: center; font-size: 25px;">Actualiza tu información personal</h1>
    <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualizes tus datos personales.</h1>
    <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 0px; text-align:center;">
        <input type="submit" name="add" value="Cerrar ventana" style="background-color: green; color: white; width: 120px; font-size: 15px; border: none; border-radius: 5px;" onclick="window.location.href='principalRh';">
    </div>

    <form name="datospersonalesactualizar" id="datospersonalesactualizar" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
        <script>
            $("#datospersonalesactualizar").on("submit", function(e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById("datospersonalesactualizar"));
                formData.append("dato", "valor");
                $.ajax({
                    url: "aplicacion/updateDatosPersonales.php",
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
                            window.location.href = 'actualizacionDatosPersonales';
                        }, 2000);
                        
                    }
                })
            })
        </script>
        <div class="form-row">
            <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
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
            <div class="col-md-3">
                <label for="mensaje">Sube tu CURP:</label>
                <input type="file" class="form-control" name="documentocurp" id="documentocurp" accept=".pdf">
            </div>
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                            <strong>Vista CURP</strong>
                            <?php
                            $archivo = "Comprobante CURP";
                            
                            $path = "documentoscurp/" .$datocurp.$identificador;
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
                            
                            $path = "documentoscartilla/" .$datocurp.$identificador;
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
            <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
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
                            
                            $path = "documentoscomprobantedomicilio/" .$datocurp.$identificador;
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
        <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
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
            <div class="col-md-3">
                <label>Fecha nacimiento hijo</label>
                <input type="date" name="fechanacimientohijo[]" id="fechanacimientohijo[]" class="form-control" value="<?php echo $rows['fechanacimientohijo'] ?>" >
                </div>
            <div class="col-md-3">
                <label for="mensaje">Edad:</label>
                <input type="number" class="form-control" name="edadhijo[]" id="edadhijo[]" value="<?php echo $edadhijo ?>" >
            </div>
            <div class="col-md-3">
                <label for="mensaje">Sexo:</label>
                <input type="text" class="form-control" name="sexohijo[]" id="sexohijo[]" value="<?php echo $rows['sexohijo'] ?>" >
            </div>
            
            <div class="col-md-4">
                <label for="mensaje">Sube acta de nacimiento o CURP:</label>
                <input type="file" class="form-control" name="documentocurphijo[]" id="documentocurphijo" accept=".pdf">
            </div>
            <div class="col-md-5" style="border: 1px solid #F0F0F0;">
                            <strong>Vista CURP Hijo</strong>
                            <?php
                             $idhijo = $rows['nombrecompletohijo'];
                            $archivo = "Comprobante hijo";
                            
                            $path = "documentoshijos/" .$idhijo.$identificador;
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
                            <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px;color:white;">
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
                                <label>Sube acta de nacimiento o CURP ${i +1}</label>
                                <input type="file" id="documentocurphijo[${i}]" name="documentocurphijo[]" class="form-control" accept=".pdf">
                                </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>

            <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
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
                            if (ext == "pdf") {
                            
                                if ($(this)[0].files[0].size > 1048576) {
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