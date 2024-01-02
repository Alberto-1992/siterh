<?php
require '../conexionRh.php';
$id = $_GET['id'];
$nombrecurso = $_GET["nombrecurso"];
$fechatermino = $_GET['fechatermino'];
$id_empleado = $_GET['id_empleado'];
$sql = $conexionRh->prepare("SELECT Nombre, correo from plantillahraei where Empleado = :Empleado");
    $sql->execute(array(
        ':Empleado'=>$id_empleado
    ));
        $row = $sql->fetch();
        $usuarioCorreo = $row['Empleado'];
        $usuarioNombre = $row['Nombre'];
$sql = $conexionRh->prepare("DELETE from datos where id = :id");
    $sql->execute(array(
        ':id'=>$id
    ));
    $curso = '../documentoscursos/'.$nombrecurso.$fechatermino.$id_empleado;
    foreach(glob($curso."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);
            rmdir($curso);      // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
$correo = $usuarioCorreo;
$nombre = $usuarioNombre;
$mensaje = $_POST['mensaje'];
//echo $correo . " " . $nombre . " " . $mensaje;

$destinatario = "infobeto91@gmail.com";
$asunto = "Envio de correo de prueba con PHP"; 
$cuerpo = '
    <html> 
        <head> 
            <title>Prueba de envio de correo</title> 
        </head>

        <body> 
            <h1>Solicitud de contacto desde correo de prueba !  </h1>
            <p> 
                Contacto:  '.$nombre . ' - ' . $asunto .'  <br>
                Mensaje: '.$mensaje.' 
            </p> 
        </body>
    </html>
';
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=UTF8\r\n"; 

//dirección del remitente

$headers .= "FROM: $nombre <$correo>\r\n";
mail($destinatario,$asunto,$cuerpo,$headers);
    if($sql){
        header( 'Location: ../validaDocumentacionCursos' ) ;
    }else{
        echo "<script>alert('error');</script>";
    }
?>

