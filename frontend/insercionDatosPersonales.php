
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
    function Edad(FechaNacimiento) {

        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setFullYear(año);
        fechaActual.setMonth(mes);
        fechaActual.setDate(dia);
        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

        return edad;
    }

    function calcularEdad() {
        var fecha = document.getElementById('fechanacimiento').value;


        var edad = Edad(fecha);
        document.datospersonales.edad.value = edad;

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
        document.datospersonales.fechanacimiento.value = (new Date(anyo, mes, dia));
        if (sexo == 'M') {
            document.datospersonales.sexo.value = 'Femenino';
        } else if (sexo == 'H') {
            document.datospersonales.sexo.value = 'Masculino';

        }
        calcularEdad();

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
    $(document).ready(function(){
    $("#cbx_estado").change(function () {

        $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        
        $("#cbx_estado option:selected").each(function () {
            id_estado = $(this).val();
            $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
                $("#cbx_municipio").html(data);
            });            
        });
    })
});
$(document).ready(function () {
    $("#cbx_estadoedit").change(function () {

        $('#cbx_localidadedit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_estadoedit option:selected").each(function () {
            id_estado = $(this).val();
            $.post("includes/getMunicipio.php", { id_estado: id_estado }, function (data) {
                $("#cbx_municipioedit").html(data);
            });
        });
    })
});
</script>
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #0A4380;">
        <span id="cabecera">Actualización datos personales</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Actualiza tu información personal</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualizes tus datos personales.</h1>
        <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 0px; text-align:center;">
            <input type="submit" name="add" value="Cerrar ventana" style="background-color: green; color: white; width: 120px; font-size: 15px; border: none; border-radius: 5px;" onclick="window.location.href='principalRh';">
        </div>

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
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(datos) {
                            $("#mensaje").html(datos);
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
                    <input type="text" class="form-control" name="curp" id="curp" placeholder="CURP" minlength="18" maxlength="18" value="<?php echo $row['CURP'] ?>" required onkeyup="curp2date();">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" required readonly>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Edad:</label>
                    <input type="number" class="form-control" name="edad" id="edad" required readonly>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Sexo:</label>
                    <input type="text" class="form-control" name="sexo" id="sexo" required readonly>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Estado civil:</label>
                    <input type="text" class="form-control" name="estadocivil" id="estadocivil" value="<?php echo $row['estadocivil'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Entidad de nacimiento:</label>
                    <select class="form-control" name="entidadnacimiento" id="entidadnacimiento" required onchange="tipoCapacitacion();">
                        <option value="Sin dato">Seleccione</option>
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
                    <label for="mensaje">Tipo de sangre:</label>
                    <input type="text" class="form-control" name="tipodesangre" id="tipodesangre">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Nacionalidad:</label>
                    <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad ?>">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">N° de cartilla militar:</label>
                    <input type="text" class="form-control" name="cartillamilitar" id="cartillamilitar">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Carta de naturalizacion:</label>
                    <input type="text" class="form-control" name="naturalizacion" id="naturalizacion">
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
                    <select class="form-control" name="cbx_estado" id="cbx_estado" onchange="tipoCapacitacion();">
                        <option value="Sin dato">Seleccione</option>
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
                                        </select>
                                    </div>
                <div class="col-md-3">
                    <label for="mensaje">Localidad:</label>
                    <input type="text" class="form-control" name="localidad" id="localidad">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Colonia:</label>
                    <input type="text" class="form-control" name="colonia" id="colonia" value="<?php echo $colonia ?>">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Tel casa:</label>
                    <input type="text" class="form-control" name="telcasa" id="telcasa" value="<?php echo $telcasa ?>">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Tel cel:</label>
                    <input type="text" class="form-control" name="telcel" id="telcel" value="<?php echo $telcel ?>">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Otro tel:</label>
                    <input type="text" class="form-control" name="otrotel" id="otrotel">
                </div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">En caso de emergencia, llamar a:</h1>
                </div>
                <div class="col-md-4">
                    <label for="mensaje">Nombre:</label>
                    <input type="text" class="form-control" name="nombreemergencia" id="nombreemergencia">
                </div>
                <div class="col-md-4">
                    <label for="mensaje">Telefono:</label>
                    <input type="text" class="form-control" name="telefonoemergencia" id="telefonoemergencia">
                </div>
                <div class="col-md-4">
                    <label for="mensaje">Parentesco:</label>
                    <input type="mail" class="form-control" name="parentescoemergencia" id="parentescoemergencia">
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
