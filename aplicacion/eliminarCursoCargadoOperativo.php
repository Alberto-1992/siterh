<?php
require '../conexionRh.php';
$id = $_POST['id'];
$nombrecurso = $_POST["nombrecurso"];
$fechatermino = $_POST['fechatermino'];
$id_empleado = $_POST['id_empleado'];
$tipocapacitacion = $_POST['tipocapacitacion'];
$conexionRh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionRh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionRh->beginTransaction();
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
    
    $sql = $conexionRh->prepare("INSERT into cursoseliminado(correousuario,id_empleado,nombrecurso,tipocapacitacion) values(:correousuario,:id_empleado,:nombrecurso,:tipocapacitacion)");
    $sql->execute(array(
        ':correousuario'=>$usuarioCorreo,
        ':id_empleado'=>$id_empleado,
        ':nombrecurso'=>$nombrecurso,
        ':tipocapacitacion'=>$tipocapacitacion
    ));
$validatransaccion = $conexionRh->commit();
    $curso = '../documentoscursos/'.$nombrecurso.$fechatermino.$id_empleado;
    foreach(glob($curso."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);  
            rmdir($curso);   // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
$correo = 'capacitacion_hraei@outlook.com';
$nombre = $usuarioNombre;
//$mensaje = $_POST['mensaje'];
//echo $correo . " " . $nombre . " " . $mensaje;

$destinatario = "beto_1866@outlook.com";
$asunto = "Documento eliminado"; 
$cuerpo = '
    <html> 
        <head> 
            <title>Curso eliminado</title> 
        </head>

        <body> 
            <h2>Estimado usuario, '.$nombre.' su '.$tipocapacitacion.' llamado '.$nombrecurso.' ha sido eliminado de la plataforma, esto debido a que no cumple con los criterios especificados.</h2>
            <h3>Los criterios por los cuales su curso pudo ser eliminado son los siguientes:</h3>
                <p>-Los datos no corresponden a los del archivo cargado.</p>
                <p>-El documento cargado no es una constancia, diploma, reconocimiento o certificado</p>
                <p>-La información cargada no pertenence a alguno de los temas listados en TIPO DE CAPACITACIÓN.</p> 
                Contacto:  Capacitación - ' . $asunto .'  <br>
                Mensaje: 
        </body>
    </html>
';
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=UTF8\r\n"; 

//dirección del remitente

$headers .= "FROM: Capacitación <$correo>\r\n";
mail($destinatario,$asunto,$cuerpo,$headers);
    if($sql == true){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Eliminado',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else{
        $conexionRh->rollBack();
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al eliminar//',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
?>