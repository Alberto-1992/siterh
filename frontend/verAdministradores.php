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
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Uusuarios Administradores</title>
</head>

<body>

    <div class="box1">
        <header class="headerinfarto" style="background-color: #00D9EE;">
        
            <span id="cabecera">Usuarios Administradores.</span>

        </header>


        <script>
            $.ajax({
                url: 'consultaAdministradoresBusqueda.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
            $.ajax({
                url: 'consultaAdministradores.php',
                type: 'POST',
                dataType: 'html',
            })

            .done(function(resultado) {
                $("#tabla_resultadobus").html(resultado);
            })

        </script>
        <div class="autoheight">
<input type="text" class="form-control col-md-12" id="busqueda" name="busqueda" placeholder="Buscar..." onkeyup="return handleKeyPress(event);">
            <div id="tabla_resultadobus">

            </div>
            <div id="tabla_resultado" class="adaptar"></div>
        </div>
    </div>
<script>
  function handleKeyPress(e)
{

	let evento = $("#busqueda").val();
	let ob = {evento:evento};
  $.ajax({
            type: "POST",
            url: "consultaAdministradores.php",
            data: ob,
                                                    
                success: function(data) {
                    $("#tabla_resultadobus").html(data);
                    //$("#editarDatosPersonalescancerdeMama").modal('show');
                    }
                });

};
</script>
<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
</body>
</html>