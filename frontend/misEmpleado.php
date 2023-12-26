<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
<style>
    a {
        text-decoration: none;
    }
</style>
    <div class="box1">
        <header class="headerinfarto" style="background-color: #0D6E87;color:white;">
        
            <span id="cabecera">Mis colaboradores.</span>

        </header>
        <?php 
        
    switch(true) {

        case isset($_SESSION['usuarioAdminRh']):
            require 'menu/menuPersonal.php';
        break;
        case isset($_SESSION['usuarioJefe']):
            require 'menu/menuPersonal.php';
        break;
        default:
            require 'close_sesion.php';
        }
        require_once 'clases/conexion.php';
            $conexionX = new ConexionRh();  
            $sql = $conexionX->prepare("SELECT personaloperativo2023.*, plantillahraei.DescripcionPuesto,plantillahraei.Empleado from personaloperativo2023 left join plantillahraei on plantillahraei.Empleado = personaloperativo2023.id_empleado where personaloperativo2023.id_jefe = :id_jefe ORDER BY personaloperativo2023.nombre");
            ?>
    
    <div class="galleryEmpleados">
        
        <?php
            $sql->execute(array(
                ':id_jefe'=>$id_jefe
            ));
            
            while($dataEmpleado = $sql->fetch()){
        
?>

<div class="card">
<?php
$id_empleado = $dataEmpleado['Empleado'];
require_once 'conexionRh.php';
$count = 0;
$sql2 = "SELECT * FROM eventocapacitacion WHERE id_empleado = $id_empleado and validaautorizacion = 0";
$result = mysqli_query($conexionGrafico, $sql2);
$count = mysqli_num_rows($result);
?>

<div class="demo-content">
    <div id="notification-header">
        <div style="position:relative">
            <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn" style="border: none; float:right;"><span id="notification-count" style="color:red; float:right;font-size: 22px;"><?php if ($count > 0) {
                                                                                                                                    echo $count;
                                                                                                                                } ?></span><img src="img/icono.png" /></button>
            <div id="notification-latest"></div>
        </div>
    </div>
</div>

<?php
$identificador = $dataEmpleado['Empleado'];
        $path = "imagenesPerfiles/" . $identificador;
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 100%; height: 140px; border-radius: 10px 10px 10px 10px; '>";
                }
            }
        }
        clearstatcache();
        ?>
    <div class="card-body" >
        <h5 class="card-title"><?php echo $dataEmpleado['DescripcionPuesto'] ?></h5>
        <hr id="hr6">
        <a href="infoEmpleado?id=<?php echo base64_encode($dataEmpleado['Empleado']) ?>"><?php echo $dataEmpleado['nombre'].' '.$dataEmpleado['apellidopaterno'].' '.$dataEmpleado['apellidomaterno'] ?></a>
    </div>
    
    </div>
<?php } ?>
<!--<div class="card">
<div class="card-body" >
        <h5 class="card-title">Vacaciones mis colaboradores</h5>
        <hr id="hr6">
        <a href="planeacionVacaciones?id=<?php echo $id_jefe ?>">VER PLANEACIÓN DE VACACIONES</a>
    </div>
</div>-->
</div>

<div class="galleryEmpleados">
<?php

$sqlj = $conexionX->prepare("SELECT jefes.*, plantillahraei.DescripcionPuesto,plantillahraei.Empleado, plantillahraei.Nombre from jefes left join plantillahraei on plantillahraei.Empleado = jefes.id_empleadoJefe where jefes.id_jefedeljefe = :id_jefedeljefe");
            $sqlj->execute(array(
                ':id_jefedeljefe'=>$id_jefe
            ));
            
            while($dataEmpleadoJefe = $sqlj->fetch()){
        
                if($dataEmpleadoJefe['id_empleadoJefe'] == 98 ){
                }else{
?>
<div class="card">
<?php
$id_empleado = $dataEmpleadoJefe['Empleado'];
require_once 'conexionRh.php';
$count = 0;
$sql2 = "SELECT * FROM eventocapacitacion WHERE id_empleado = $id_empleado and validaautorizacion = 0";
$result = mysqli_query($conexionGrafico, $sql2);
$count = mysqli_num_rows($result);
?>

<div class="demo-content">
    <div id="notification-header">
        <div style="position:relative">
            <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn" style="border: none; float:right;"><span id="notification-count" style="color:red; float:right;font-size: 22px;"><?php if ($count > 0) {
                                                                                                                                    echo $count;
                                                                                                                                } ?></span><img src="img/icono.png" /></button>
            <div id="notification-latest"></div>
        </div>
    </div>
</div>
<?php
$identificador = $dataEmpleadoJefe['id_empleadoJefe'];
        $path = "imagenesPerfiles/" . $identificador;
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 100%; height: 140px; border-radius: 10px 10px 10px 10px; '>";
                }
            }
        }
        clearstatcache();
        ?>
    <div class="card-body" >
        <h5 class="card-title"><?php echo $dataEmpleadoJefe['DescripcionPuesto'] ?></h5>
        <hr id="hr6-1">
        <a href="infoEmpleado?id=<?php echo base64_encode($dataEmpleadoJefe['Empleado']) ?>"><?php echo $dataEmpleadoJefe['Nombre'] ?></a>
    </div>
    </div>
<?php }
} ?>
<!--<div class="card">
<div class="card-body" >
        <h5 class="card-title">Vacaciones mis colaboradores</h5>
        <hr id="hr6-1">
        <a href="planeacionVacacionesMandos?id=<?php echo $id_jefe ?>">VER PLANEACIÓN DE VACACIONES</a>
    </div>
</div>-->
</div>
    </div>
<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>