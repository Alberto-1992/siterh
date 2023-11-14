<?php session_start();
error_reporting(0);
extract($_POST);
require_once '../clases/conexion.php';
$conexionX = new ConexionRh();
date_default_timezone_set("America/Monterrey");
$hora = date("Y-m-d h:i:sa");

try {
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();

            
    $sql = $conexionX->prepare("UPDATE estudiosmediosup SET nombreformacionmedia=:nombreformacionmedia,nombremediasuperior=:nombremediasuperior,fechainicio=:fechainicio,fechatermino=:fechatermino,tiempocursado=:tiempocursado,documentomediosuperior=:documentomediosuperior where id_empleado=:id_empleado");
    $sql->execute(array(
        ':nombreformacionmedia' => $nombreformacionmedia,
        ':nombremediasuperior' => $nombremediasuperior,
        ':fechainicio' => $fechainicio,
        ':fechatermino' => $fechatermino,
        ':tiempocursado' => $tiempocursado,
        ':documentomediosuperior' => $documentomediosuperior,
        ':id_empleado' => $id_empleado
    ));
    $sql = $conexionX->prepare("UPDATE estudiostecnico SET nombreinstituciontecnica=:nombreinstituciontecnica,nombreformaciontecnica=:nombreformaciontecnica,fechainiciotecnico=:fechainiciotecnico,fechaterminotecnico=:fechaterminotecnico,tiempocursadotecnico=:tiempocursadotecnico,documentotecnico=:documentotecnico where id_empleado=:id_empleado");
    $sql->execute(array(
        ':nombreinstituciontecnica' => $nombreinstituciontecnica,
        ':nombreformaciontecnica' => $nombreformaciontecnica,
        ':fechainiciotecnico' => $fechainiciotecnico,
        ':fechaterminotecnico' => $fechaterminotecnico,
        ':tiempocursadotecnico' => $tiempocursadotecnico,
        ':documentotecnico' => $documentotecnico,
        ':id_empleado' => $id_empleado
    ));
    $sql = $conexionX->prepare("UPDATE ultimogradoestudios set descripcionultimogrado = :descripcionultimogrado, especialidadlaborahraei = :especialidadlaborahraei where id_empleado = :id_empleado");
        $sql->execute(array(
            ':descripcionultimogrado'=>$ultimogradoestudios,
            ':especialidadlaborahraei'=>$especialidadlaborahraei,
            ':id_empleado'=>$id_empleado
        ));
        $sql = $conexionX->prepare("DELETE from estudiospostecnico where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id_empleado
        ));
        $sql = $conexionX->prepare("DELETE from estudiossuperior where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id_empleado
        ));
        $sql = $conexionX->prepare("DELETE from estudiosmaestria where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id_empleado
        ));
        $sql = $conexionX->prepare("DELETE from especialidad where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id_empleado
        ));
        $sql = $conexionX->prepare("DELETE from doctorado where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id_empleado
        ));

   // require '../conexionRh.php';
    if ($_FILES["documentomediasup"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["documentomediasup"]["type"], $permitidos) && $_FILES["documentomediasup"]["size"]) {

            $ruta = '../documentosmediasup/' . $nombreformacionmedia.$id_empleado. '/';
            $archivo = $ruta . $_FILES["documentomediasup"]["name"] = "comprobatemediasuperior.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["documentomediasup"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["documentomediasup"]["tmp_name"], $archivo);
            }
            
        }
        
    }

    if ($_FILES["documentotecnicoarchivo"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["documentotecnicoarchivo"]["type"], $permitidos) && $_FILES["documentotecnicoarchivo"]["size"]) {

            $ruta = '../documentostecnica/' . $nombreformaciontecnica.$id_empleado. '/';
            $archivo = $ruta . $_FILES["documentotecnicoarchivo"]["name"] = "comprobate tecnica.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["documentotecnicoarchivo"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["documentotecnicoarchivo"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    if ($_FILES["cedulatecnico"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["cedulatecnico"]["type"], $permitidos) && $_FILES["cedulatecnico"]["size"]) {

            $ruta = '../documentostecnicacedula/' . $nombreformaciontecnica.$id_empleado. '/';
            $archivo = $ruta . $_FILES["cedulatecnico"]["name"] = "comprobate tecnica.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["cedulatecnico"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["cedulatecnico"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    $arraynombreformacionPostecnico = array_map("htmlspecialchars", $nombreformacionPostecnico);
    $arraynombreinstitucionPostecnico = array_map("htmlspecialchars", $nombreinstitucionPostecnico);
    $arrayfechainiciosupPostecnico = array_map("htmlspecialchars", $fechainiciosupPostecnico);
    $arrayfechaterminosupPostecnico = array_map("htmlspecialchars", $fechaterminosupPostecnico);
    $arraytiempocursadosupPostecnico = array_map("htmlspecialchars", $tiempocursadosupPostecnico);
    $arraydocumentorecibePostecnico = array_map("htmlspecialchars", $documentorecibePostecnico);

    foreach ($arraynombreformacionPostecnico as $clavep => $nombreformacionPostecnico) {
        $nombreinstitucionPostecnico = $arraynombreinstitucionPostecnico[$clavep];
        $fechainiciosupPostecnico = $arrayfechainiciosupPostecnico[$clavep];
        $fechaterminosupPostecnico = $arrayfechaterminosupPostecnico[$clavep];
        $tiempocursadosupPostecnico = $arraytiempocursadosupPostecnico[$clavep];
        $documentorecibePostecnico = $arraydocumentorecibePostecnico[$clavep];
        $datoUnicoP[] = '("' . $nombreformacionPostecnico . '", "' . $nombreinstitucionPostecnico . '", "' . $fechainiciosupPostecnico . '", "' . $fechaterminosupPostecnico . '", "' . $tiempocursadosupPostecnico . '", "' . $documentorecibePostecnico . '", "' . $id_empleado . '")';
        $sql = $conexionX->prepare("INSERT into  estudiospostecnico(nombreformacionpostecnico,nombreinstitucionpostecnico,fechainiciosuppostecnico,fechaterminosuppostecnico,tiempocursadosuppostecnico,documentorecibepostecnico,id_empleado) VALUES " . implode(', ', $datoUnicoP));
        
}
$sql->execute();
foreach($_FILES["documentolicenciaturaPostecnico"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentolicenciaturaPostecnico"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Diploma postecnico";
			$archivonombre = $_POST['nombreformacionPostecnico'][$key];
			$fuente = $_FILES["documentolicenciaturaPostecnico"]["tmp_name"][$key]; 
			
			$carpeta = '../documentospostecnico/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
if($nombreformacion != '' and $nombreinstitucion != ''){
    $arraynombreformacion = array_map("htmlspecialchars", $nombreformacion);
    $arraynombreinstitucion = array_map("htmlspecialchars", $nombreinstitucion);
    $arrayfechainicio = array_map("htmlspecialchars", $fechainiciosup);
    $arrayfechaterminosup = array_map("htmlspecialchars", $fechaterminosup);
    $arraytiempocursadosup = array_map("htmlspecialchars", $tiempocursadosup);
    $arraydocumentorecibe = array_map("htmlspecialchars", $documentorecibe);
    $arraynumerocedula = array_map("htmlspecialchars", $numerocedula);

    foreach ($arraynombreformacion as $clave => $nombreformacion) {
        $nombreinstitucion = $arraynombreinstitucion[$clave];
        $fechainicio = $arrayfechainicio[$clave];
        $fechatermino = $arrayfechaterminosup[$clave];
        $tiempocursado = $arraytiempocursadosup[$clave];
        $documentorecibe = $arraydocumentorecibe[$clave];
        $numerocedula = $arraynumerocedula[$clave];
        $datoUnico[] = '("' . $nombreformacion . '", "' . $nombreinstitucion . '", "' . $fechainicio . '", "' . $fechatermino . '", "' . $tiempocursado . '", "' . $documentorecibe . '", "' . $numerocedula . '", "' . $id_empleado . '")';
        $sql = $conexionX->prepare("INSERT into  estudiossuperior(nombreformacionsuperior,nombresuperior,fechasuperiorinicio,fechasuperiortermino,tiempocursadosuperior,documentosuperior,numerocedulasuperior,id_empleado) VALUES " . implode(', ', $datoUnico));
        
}
$sql->execute();
foreach($_FILES["documentolicenciatura"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentolicenciatura"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Titulo licenciatura";
			$archivonombre = $_POST['nombreformacion'][$key];
			$fuente = $_FILES["documentolicenciatura"]["tmp_name"][$key]; 
			
			$carpeta = '../documentoslicenciatura/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    foreach($_FILES["documentocedula"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentocedula"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Cedula";
			$archivonombre = $_POST['nombreformacion'][$key];
			$fuente = $_FILES["documentocedula"]["tmp_name"][$key]; 
			
			$carpeta = '../documentoscedulalicenciatura/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
}
if($nombreformacionmaestria != '' and $nombreinstitucionmaestria != ''){
    $arraynombreformacionmaestria = array_map("htmlspecialchars", $nombreformacionmaestria);
    $arraynombreinstitucionmaestria = array_map("htmlspecialchars", $nombreinstitucionmaestria);
    $arrayfechainiciomaestria = array_map("htmlspecialchars", $fechainiciosupmaestria);
    $arrayfechaterminomaestria = array_map("htmlspecialchars", $fechaterminosupmaestria);
    $arraytiempocursadomaestria = array_map("htmlspecialchars", $tiempocursadosupmaestria);
    $arraydocumentorecibemaestria = array_map("htmlspecialchars", $documentorecibemaestria);
    $arraynumerocedulamaestria = array_map("htmlspecialchars", $numerocedulamaestria);

    foreach ($arraynombreformacionmaestria as $clavemaestria => $nombreformacionmaestria) {
        $nombreinstitucionmaestria = $arraynombreinstitucionmaestria[$clavemaestria];
        $fechainiciomaestria = $arrayfechainiciomaestria[$clavemaestria];
        $fechaterminomaestria = $arrayfechaterminomaestria[$clavemaestria];
        $tiempocursadomaestria = $arraytiempocursadomaestria[$clavemaestria];
        $documentorecibemaestria = $arraydocumentorecibemaestria[$clavemaestria];
        $numerocedulamaestria = $arraynumerocedulamaestria[$clavemaestria];
        $datoUnicomaestria[] = '("' . $nombreformacionmaestria . '", "' . $nombreinstitucionmaestria . '", "' . $fechainiciomaestria . '", "' . $fechaterminomaestria . '", "' . $tiempocursadomaestria . '", "' . $documentorecibemaestria . '", "' . $numerocedulamaestria . '", "' . $id_empleado . '")';
        $sql = $conexionX->prepare("INSERT into  estudiosmaestria(nombreformacionmaestria,nombremaestria,fechamaestriainicio,fechamaestriatermino,tiempocursadomaestria,documentomaestria,numerocedulamaestria,id_empleado) VALUES " . implode(', ', $datoUnicomaestria));
        
    } 
    $sql->execute();
    foreach($_FILES["documentomaestria"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentomaestria"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Titulo maestria";
			$archivonombre = $_POST['nombreformacionmaestria'][$key];
			$fuente = $_FILES["documentomaestria"]["tmp_name"][$key]; 
			
			$carpeta = '../documentosmaestria/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    foreach($_FILES["documentomaestriacedula"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentomaestriacedula"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Cedula maestria";
			$archivonombre = $_POST['nombreformacionmaestria'][$key];
			$fuente = $_FILES["documentomaestriacedula"]["tmp_name"][$key]; 
			
			$carpeta = '../documentosmaestriacedula/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
}
if($nombreformacionposgradoespecialidad != '' and $nombreinstitucionposgradoespecialidad != ''){
    $arraynombreformacionposgradoespecialidad = array_map("htmlspecialchars", $nombreformacionposgradoespecialidad);
    $arraynombreinstitucionposgradoespecialidad = array_map("htmlspecialchars", $nombreinstitucionposgradoespecialidad);
    $arrayfechainicioposgradoespecialidad = array_map("htmlspecialchars", $fechainiciosupposgradoespecialidad);
    $arrayfechaterminoposgradoespecialidad = array_map("htmlspecialchars", $fechaterminosupposgradoespecialidad);
    $arraytiempocursadoposgradoespecialidad = array_map("htmlspecialchars", $tiempocursadosupposgradoespecialidad);
    $arrayunidadhospitalariaposgradoespecialidad = array_map("htmlspecialchars", $unidadhospitalariaposgradoespecialidad);
    $arraydocumentorecibeposgradoespecialidad = array_map("htmlspecialchars", $documentorecibeposgradoespecialidad);
    $arraynumerocedulaposgradoespecialidad = array_map("htmlspecialchars", $numerocedulaposgradoespecialidad);
    $arrayfechainiciocertificadosupposgradoespecialidad = array_map("htmlspecialchars", $fechainiciocertificadosupposgradoespecialidad);
    $arrayfechaterminocertificadosupposgradoespecialidad = array_map("htmlspecialchars", $fechaterminocertificadosupposgradoespecialidad);

    foreach ($arraynombreformacionposgradoespecialidad as $claveposgradoespecialidad => $nombreformacionposgradoespecialidad) {
        $nombreinstitucionposgradoespecialidad = $arraynombreinstitucionposgradoespecialidad[$claveposgradoespecialidad];
        $fechainicioposgradoespecialidad = $arrayfechainicioposgradoespecialidad[$claveposgradoespecialidad];
        $fechaterminoposgradoespecialidad = $arrayfechaterminoposgradoespecialidad[$claveposgradoespecialidad];
        $tiempocursadoposgradoespecialidad = $arraytiempocursadoposgradoespecialidad[$claveposgradoespecialidad];
        $unidadhospitalariaposgradoespecialidad = $arrayunidadhospitalariaposgradoespecialidad[$claveposgradoespecialidad];
        $documentorecibeposgradoespecialidad = $arraydocumentorecibeposgradoespecialidad[$claveposgradoespecialidad];
        $numerocedulaposgradoespecialidad = $arraynumerocedulaposgradoespecialidad[$claveposgradoespecialidad];
        $fechainiciocertificadosupposgradoespecialidad = $arrayfechainiciocertificadosupposgradoespecialidad[$claveposgradoespecialidad];
        $fechaterminocertificadosupposgradoespecialidad = $arrayfechaterminocertificadosupposgradoespecialidad[$claveposgradoespecialidad];
        $datoUnicoposgradoespecialidad[] = '("' . $nombreformacionposgradoespecialidad . '", "' . $nombreinstitucionposgradoespecialidad . '","' . $unidadhospitalariaposgradoespecialidad . '", "' . $fechainicioposgradoespecialidad . '", "' . $fechaterminoposgradoespecialidad . '", "' . $tiempocursadoposgradoespecialidad . '", "' . $documentorecibeposgradoespecialidad . '", "' . $numerocedulaposgradoespecialidad . '", "' . $id_empleado . '", "' . $fechainiciocertificadosupposgradoespecialidad . '", "' . $fechaterminocertificadosupposgradoespecialidad . '")';
        $sql = $conexionX->prepare("INSERT into  especialidad(nombreformacionacademica,nombreinstitucion,unidadhospitalaria,fechainicioespecialidad,fechaterminoespecialidad,anioscursados,documentorecibeespecialidad,numerocedulaespecialidad,id_empleado,fechacertificadoinicio,fechacertificadotermino) VALUES " . implode(', ', $datoUnicoposgradoespecialidad));
        
    }
    $sql->execute();
    foreach($_FILES["documentoposgradoesp"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentoposgradoesp"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Titulo posgrado";
			$archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
			$fuente = $_FILES["documentoposgradoesp"]["tmp_name"][$key]; 
			
			$carpeta = '../documentosposgradoesp/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    foreach($_FILES["documentocedulaposgradoesp"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentocedulaposgradoesp"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Cedula posgrado";
			$archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
			$fuente = $_FILES["documentocedulaposgradoesp"]["tmp_name"][$key]; 
			
			$carpeta = '../documentoscedulaposgradoesp/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    foreach($_FILES["documentocertificadoposgradoesp"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentocertificadoposgradoesp"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Certificado posgrado";
			$archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
			$fuente = $_FILES["documentocertificadoposgradoesp"]["tmp_name"][$key]; 
			
			$carpeta = '../documentoscertificadoposgradoesp/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
}
    if($nombreformaciondoctorado != '' and $nombreinstituciondoctorado != ''){
    $arraynombreformaciondoctorado = array_map("htmlspecialchars", $nombreformaciondoctorado);
    $arraynombreinstituciondoctorado = array_map("htmlspecialchars", $nombreinstituciondoctorado);
    $arrayfechainiciodoctorado = array_map("htmlspecialchars", $fechainiciosupdoctorado);
    $arrayfechaterminodoctorado = array_map("htmlspecialchars", $fechaterminosupdoctorado);
    $arraytiempocursadodoctorado = array_map("htmlspecialchars", $tiempocursadosupdoctorado);
    $arrayunidadhospitalariadoctorado = array_map("htmlspecialchars", $unidadhospitalariadoctorado);
    $arraydocumentorecibedoctorado = array_map("htmlspecialchars", $documentorecibedoctorado);
    $arraynumeroceduladoctorado = array_map("htmlspecialchars", $numeroceduladoctorado);

    foreach ($arraynombreformaciondoctorado as $clavedoctorado => $nombreformaciondoctorado) {
        $nombreinstituciondoctorado = $arraynombreinstituciondoctorado[$clavedoctorado];
        $fechainiciodoctorado = $arrayfechainiciodoctorado[$clavedoctorado];
        $fechaterminodoctorado = $arrayfechaterminodoctorado[$clavedoctorado];
        $tiempocursadodoctorado = $arraytiempocursadodoctorado[$clavedoctorado];
        $unidadhospitalariadoctorado = $arrayunidadhospitalariadoctorado[$clavedoctorado];
        $documentorecibedoctorado = $arraydocumentorecibedoctorado[$clavedoctorado];
        $numeroceduladoctorado = $arraynumeroceduladoctorado[$clavedoctorado];
        $datoUnicodoctorado[] = '("' . $nombreformaciondoctorado . '", "' . $nombreinstituciondoctorado . '","' . $unidadhospitalariadoctorado . '", "' . $fechainiciodoctorado . '", "' . $fechaterminodoctorado . '", "' . $tiempocursadodoctorado . '", "' . $documentorecibedoctorado . '", "' . $numeroceduladoctorado . '", "' . $id_empleado . '")';
        $sql = $conexionX->prepare("INSERT into  doctorado(nombreformaciondoctorado,nombreinstituciondoctorado,unidadhospitalariadoctorado,fechainiciodoctorado,fechaterminodoctorado,anioscursadosdoctorado,documentorecibedoctorado,numeroceduladoctorado,id_empleado) VALUES " . implode(', ', $datoUnicodoctorado));
        
    }
    $sql->execute();  
    foreach($_FILES["documentodoctorado"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentodoctorado"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Titulo doctorado";
			$archivonombre = $_POST['nombreformaciondoctorado'][$key];
			$fuente = $_FILES["documentodoctorado"]["tmp_name"][$key]; 
			
			$carpeta = '../documentosdoctorado/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                
                move_uploaded_file($fuente, $target_path);
				
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    foreach($_FILES["documentodoctoradocedula"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentodoctoradocedula"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Cedula doctorado";
			$archivonombre = $_POST['nombreformaciondoctorado'][$key];
			$fuente = $_FILES["documentodoctoradocedula"]["tmp_name"][$key]; 
			
			$carpeta = '../documentosdoctoradocedula/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
				mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$nombredelarchivo.'.pdf'; //indicamos la ruta de destino de los archivos
			
	
			if(file_exists($carpeta)) {	
                
                move_uploaded_file($fuente, $target_path);
				
				} else {	
                    move_uploaded_file($fuente, $target_path);
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
}
$sql = $conexionX->prepare("UPDATE actualizacion SET actualizo = :actualizo where id_empleado = :id_empleado");
    $sql->execute(array(
        ':actualizo'=>1,
        ':id_empleado'=>$id_empleado
    ));

   // mysqli_query($conexionGrafico, $consulta4);
$validatransac = $conexionX->commit();
    if ($validatransac != false) {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
} catch (Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}
?>
