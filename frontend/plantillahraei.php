<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Plantilla HRAEI</title>
</head>

<body>
        <header class="headerinfarto">
        
            <span id="cabecera">Plantilla HRAEI.</span>

        </header>
        <div class="box1">
        <?php 
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuPlantilla.php';
        break;
        case isset($_SESSION['usuarioJefe']):
            require 'menu/menuPlantillaOperativo.php';
        break;
        case isset($_SESSION['usuarioDatos']):
            require 'menu/menuPlantillaOperativo.php';
        break;
        default:
            require 'close_sesion.php';
        }
?>


        <script>
            $.ajax({
                url: 'consultaBusquedaPlantillaHraei.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
            $.ajax({
                url: 'consultaplantillahraei.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultadobus").html(resultado);
            })

        </script>
            
        <!--<input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar..." onkeypress="return handleKeyPress(event);">-->
            
            <div id="tabla_resultadobus">
            
            </div>
            <div id="tabla_resultado"></div>
        </div>
    
    <?php
    require 'modals/cargarUsuarioLogueoOperativo.php';
    require 'modals/cargarUsuarioLogueoMando.php';
    ?>
<script>
    function handleKeyPress(e)
{
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
	let evento = $("#busqueda").val();
	let ob = {evento:evento};
  $.ajax({
            type: "POST",
            url: "consultaplantillahraei.php",
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
</body>
</html>