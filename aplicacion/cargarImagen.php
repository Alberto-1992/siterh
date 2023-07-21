<?php

if (isset($_POST['subirimagen'])) {
    error_reporting(0);
    
    $identificador = $_POST['identificador'];
    

 }
 if ($_FILES["imagenperfil"]["error"] > 0) {

} else {
    $ar = '../imagenesPerfiles/'.$identificador;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
    { 
     unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    } 
    $admitidos = array("image/jpg");
    $valorRand = rand();

    if (array($_FILES["imagenperfil"]["type"], $admitidos) && $_FILES["imagenperfil"]["size"]) {

        $ruta = '../imagenesPerfiles/'.$identificador.'/';
        $archivo = $ruta . $_FILES["imagenperfil"]["name"] = $valorRand.'.jpg';


        if (!file_exists($ruta)) {
            mkdir($ruta);
        }

        if (file_exists($archivo)) {
             
            $resultado = @move_uploaded_file($_FILES["imagenperfil"]["tmp_name"], $archivo);

            if ($resultado) {
                echo "<script>alert('Foto actualizada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }
        } elseif (!file_exists($archivo)) {
        
            $resultado = @move_uploaded_file($_FILES["imagenperfil"]["tmp_name"], $archivo);

            if ($resultado) {
                echo "<script>alert('Foto cargada exitosamente'); window.history.back();</script>";
            } else {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
            }
        }
    }
    
}

?>