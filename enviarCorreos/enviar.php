<?php 

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
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

echo "<script>alert('Correo enviado');</script>";
    header('Location: validaDocumentacionCursos');
?> 

<a href="validaDocumentacionCursos">Volver a inicio</a>