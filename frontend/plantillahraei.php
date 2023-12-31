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
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>

<body>
        <header class="headerinfarto">
        <?php 
        error_reporting(0);
        $path = "imagenesPerfiles/".$identificador;

        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img id='myImg' src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 46px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: 5px; '>";
                }else{
                
                }
            }
        }else{
            $path = "imagenesPerfiles/fotodefault";
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img id='myImg' src='imagenesPerfiles/fotodefault/perfil.jpg' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: 5px; '>";
                }else{
                    
                }
            }
        }
        clearstatcache();
        ?>
            <span id="cabecera">Plantilla HRAEI.</span>

        </header>
        <style>
        #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.9); 
    
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 450px;
    
}
#img01 {
    border-radius: 40px;
}
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
    
}

.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
    
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: white;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
        
    }
}
    </style>
    
    <div id="popUp" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" >
  <div id="caption"></div>
</div>
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
            beforeSend: function(){
                '<div id="tabla_resultadobus" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
            },                                    
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
    <script>
    var modal = document.getElementById('popUp');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</body>
</html>