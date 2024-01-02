<?php
require '../conexionRh.php';
$id = $_POST['id'];
$nombrecurso = $_POST["nombrecurso"];
$fechatermino = $_POST['fechatermino'];
$id_empleado = $_POST['id_empleado'];
$sql = $conexionRh->prepare("DELETE from datos where id = :id");
    $sql->execute(array(
        ':id'=>$id
    ));
    $sql = $conexionRh->prepare("SELECT Nombre, correo from plantillahraei where Empleado = :Empleado");
    $sql->execute(array(
        ':Empleado'=>$id_empleado
    ));
        $row = $sql->fetch();
        $usuarioCorreo = $row['correo'];
        $usuarioNombre = $row['Nombre'];
    $curso = '../documentoscursos/'.$nombrecurso.$fechatermino.$id_empleado;
    foreach(glob($curso."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);  
            rmdir($curso);   // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
$correo = 'capacitacion_hraei@outlook.com';
$nombre = $usuarioNombre;
$mensaje = $_POST['mensaje'];
//echo $correo . " " . $nombre . " " . $mensaje;

$destinatario = "beto_1866@outlook.com";
$asunto = "Documento eliminado"; 
$cuerpo = '
    <html> 
        <head> 
            <title>Curso eliminado</title> 
        </head>

        <body> 
            <h1>Estimado usuario, '.$nombre.' su curso llamado '.$nombrecurso.' ha sido eliminado de la plataforma, esto debido a que no cumple con los criterios especificados.
            Los criterios por los cuales su curso pudo ser eliminado son los siguientes:
                -Los datos no corresponden a los del archivo cargado.
                -El documento cargado no es una constancia.
                -La información cargada no pertenence a alguno de los temas listados en TIPO DE CAPACITACIÓN.
            </h1>
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
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Eliminado',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al eliminar//',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
?>