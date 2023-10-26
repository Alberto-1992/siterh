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
    <title>Carga de informacion de cursos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<script>
    function limpiar() {

        setTimeout('document.frmNotification.reset()', 1000);

        return false;
    }
</script>

<body>

    <nav class="navbar navbar-expand-md fixed-top" style="background-color: #9C9B8F;">
        <span id="cabecera">Compatibilidad laboral</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Carga de información de compatibilidad laboral</h1>

        <form name="frmCompatibilidad" id="frmCompatibilidad" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#frmCompatibilidad").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("frmCompatibilidad"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/actualizacionCompatibilidadLaboral.php",
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
            <?php
            error_reporting(0);
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            $nombreempleado = $row['Nombre'];
            $identificador = $row['Empleado'];
        break;
        
        case isset($_SESSION['usuarioJefe']):
            $nombreempleado = $row['Nombre'];
            $identificador = $row['Empleado'];
        break;

        case isset($_SESSION['usuarioDatos']):
            $nombreempleado = $row['Nombre'];
            $identificador = $row['Empleado'];
        break;

        default:
        
        require 'close_sesion.php';
        
        }
        
?>
<div class="col-md-6">
                    <label for="mensaje">N° de Empleado:</label>
</div>
                <input type="text" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" value="<?php echo $identificador ?>" readonly>
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color: white;">
                    <h1 style="font-size:22px;">Primer empleo</h1>
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Nombre:</label>
                    <input type="text" class="form-control" name="nombreempleado" id="nombreempleado" placeholder="Nombre" value="<?php echo $nombreempleado ?>" readonly>
                </div>

                <div class="col-md-6">
                    <label for="mensaje">Nombre de la institución donde labora:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la institución" >
                </div>
                <div class="col-md-4">
                    <label for="mensaje">Horario:</label>
                    <input type="text" class="form-control" name="horario" id="horario" placeholder="Horario en el que labora">
                </div>
                <div class="col-md-4">
                    <label for="mensaje">Dias:</label>
                    <input type="text" class="form-control" name="dias" id="dias" placeholder="Dias en los que labora">
                </div>
                <div class="col-md-4">
                <label for="mensaje">Tipo de puesto que ocupa:</label>
                <select name="tipopuesto" id="tipopuesto" class="form-control">
                <option value="Ninguno">Seleccione</option>
                <option value="Confianza">Confianza</option>
                <option value="Base">Base</option>
                <option value="Eventual">Eventual</option>
                <option value="Provisional">Provisional</option>
                <option value="Provisional Reservada">Provisional Reservada</option>
                <option value="Interinato">Interinato</option>
            </select>
                </div>

                
                <div style="width: 100%; height: auto; background-color:#0D6F9A; text-align:center;margin-top:10px; color: white;">
                    <h1 style="font-size:22px;">Segundo empleo</h1>
                </div>

                <div class="col-md-6">
                    <label for="mensaje">Nombre de la institución donde labora Segundo:</label>
                    <input type="text" class="form-control" name="nombreinstitucionsegundo" id="nombreinstitucionsegundo" placeholder="Nombre de la institución">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Horario Segundo:</label>
                    <input type="text" class="form-control" name="horariosegundo" id="horariosegundo" placeholder="Horario en el que labora">
                </div>
                <div class="col-md-6">
                    <label for="mensaje">Dias Segundo:</label>
                    <input type="text" class="form-control" name="diassegundo" id="diassegundo" placeholder="Dias en los que labora">
                </div>
                <div class="col-md-6">
                <label for="mensaje">Tipo de puesto que ocupa Segundo:</label>
                <select name="tipopuestosegundo" id="tipopuestosegundo" class="form-control">
                <option value="Ninguno">Seleccione</option>
                <option value="Confianza">Confianza</option>
                <option value="Base">Base</option>
                <option value="Eventual">Eventual</option>
                <option value="Provisional">Provisional</option>
                <option value="Provisional Reservada">Provisional Reservada</option>
                <option value="Interinato">Interinato</option>
            </select>
                </div>
                
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                <a href="#" name="add" id="btn-send" style="background-color: yellow; color: black; width: 120px; font-size: 15px; border: none; border-radius: 5px;" onclick="window.location.href='principalRh';">Cerrar ventana</a>&nbsp;&nbsp;
                    <input type="submit" name="add" id="btn-send" value="Enviar">
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

</body>

</html>