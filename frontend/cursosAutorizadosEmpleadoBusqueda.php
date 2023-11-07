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
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Validación de actualizaciones academicas</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenu.css" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>
<header class="headerinfarto">
        
            <span id="cabecera">Cursos autorizados.</span>

        </header>
<body>
<?php 
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuCursosAutorizados.php';
        break;
        case isset($_SESSION['usuarioJefe']):
            require 'menu/menuAutorizacionCursos.php';
        break;
        case isset($_SESSION['usuarioDatos']):
            require 'menu/menuCursosAutorizados.php';
        break;
        default:
            require 'close_sesion.php';
        }
?>
<div class="box1" style="margin-top: 10px;">

        <script>
            $.ajax({
                url: 'cursosAutorizadosEmpleadosBusqueda.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
            $.ajax({
                url: 'cursosAutorizadosEmpleados.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultadobus").html(resultado);
            })

        </script>
            <div id="tabla_resultadobus">

            </div>
            <div id="tabla_resultado" class="adaptar"></div>
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
            url: "cursosAutorizadosEmpleados.php",
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
                    $('.box1').css('filter', 'blur(3px)');
                },
                error: function() {}
            });
        }

        $(document).ready(function() {
            $('body').click(function(e) {
                if (e.target.id != 'notification-icon') {
                    $("#notification-latest").hide();
                    $('.box1').css('filter', 'blur(0px)');
                }
            });
        });
    </script>
</body>

</html>