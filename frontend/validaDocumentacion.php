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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Validación de actualizaciones academicas</title>
    <script src="notification.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
</head>

<body>
<header class="headerinfarto">
        
        <span id="cabecera">Validación documentos cursos.</span>
        <?php
            include("notificaciones/conexion.php");
            ?>

            <div class="demo-content">
                <div id="notification-header">
                    <div style="position:relative">
                        <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if ($count > 0) {
                                                                                                                                                echo $count;
                                                                                                                                            } ?></span><img src="img/icono.png" /></button>
                        <div id="notification-latest"></div>
                    </div>
                </div>
            </div>

            <?php if (isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
            <?php if (isset($success)) { ?> <div class="success"><?php echo $success; ?></div> <?php } ?>


        </div>
    </header>
    
    <div class="box1" >
    <?php 
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuAutorizacionCursos.php';
        break;
        case isset($_SESSION['usuarioJefe']):
            require 'menu/menuAutorizacionCursos.php';
        break;
        default:
            require 'close_sesion.php';
        }
?>
        <script>
            $.ajax({
                url: 'consultaValidacionDocumentosBusqueda.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
            $.ajax({
                url: 'consultaValidacionDocumentos.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultadobus").html(resultado);
            })

        </script>
            <div id="tabla_resultadobus"></div>
            <div id="tabla_resultado"></div>
        </div>
<script>
  function handleKeyPress(e)
{
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
	let evento = $("#busqueda").val();
	let ob = {evento:evento};
  $.ajax({
            type: "POST",
            url: "consultaValidacionDocumentos.php",
            data: ob,
                                                    
                success: function(data) {
                    $("#tabla_resultadobus").html(data);
                    //$("#editarDatosPersonalescancerdeMama").modal('show');
                    }
                });
    }

};
</script>
<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
    

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
                    //$('.box1').css('filter', 'blur(3px)');
                },
                error: function() {}
            });
        }

        $(document).ready(function() {
            $('body').click(function(e) {
                if (e.target.id != 'notification-icon') {
                    $("#notification-latest").hide();
                    //$('.box1').css('filter', 'blur(0px)');
                }
            });
        });
      /*  $(document).ready(function(){

var height = $(window).height();

$('#tabla_resultadobus').height(height);
$('#tabla_resultado').height(height);
});*/
    </script>

</body>

</html>