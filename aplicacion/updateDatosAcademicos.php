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
        $sql = $conexionX->prepare("UPDATE actualizacion SET actualizo = :actualizo where id_empleado = :id_empleado");
        $sql->execute(array(
            ':actualizo'=>1,
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
            $sql = $conexionX->prepare("DELETE from estudiospostecnico where id_empleado = :id_empleado");
            $sql->execute(array(
                ':id_empleado'=>$id_empleado
            ));
    $validatransac = $conexionX->commit();

    require '../conexionRh.php';
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

/*inicia postecnico*/ 
$arraynombreformacionPostecnico =  $_POST['nombreformacionPostecnico'];
    $arraynombreinstitucionPostecnico = $_POST['nombreinstitucionPostecnico'];
    $arrayfechainiciosupPostecnico = $_POST['fechainiciosupPostecnico'];
    $arrayfechaterminosupPostecnico = $_POST['fechaterminosupPostecnico'];
    $arraytiempocursadosupPostecnico = $_POST['tiempocursadosupPostecnico'];
    $arraydocumentorecibePostecnico = $_POST['documentorecibePostecnico'];
    

    $arraynombreformacionPostecnico = array_map("htmlspecialchars", $arraynombreformacionPostecnico);
    $arraynombreinstitucionPostecnico = array_map("htmlspecialchars", $arraynombreinstitucionPostecnico);
    $arrayfechainiciosupPostecnico = array_map("htmlspecialchars", $arrayfechainiciosupPostecnico);
    $arrayfechaterminosupPostecnico = array_map("htmlspecialchars", $arrayfechaterminosupPostecnico);
    $arraytiempocursadosupPostecnico = array_map("htmlspecialchars", $arraytiempocursadosupPostecnico);
    $arraydocumentorecibePostecnico = array_map("htmlspecialchars", $arraydocumentorecibePostecnico);

    $sql_array = array();
    foreach ($arraynombreformacionPostecnico as $clavep => $nombreformacionPostecnico) {
        $nombreinstitucionPostecnico = $arraynombreinstitucionPostecnico[$clavep];
        $fechainiciosupPostecnico = $arrayfechainiciosupPostecnico[$clavep];
        $fechaterminosupPostecnico = $arrayfechaterminosupPostecnico[$clavep];
        $tiempocursadosupPostecnico = $arraytiempocursadosupPostecnico[$clavep];
        $documentorecibePostecnico = $arraydocumentorecibePostecnico[$clavep];
        $datoUnicoP[] = '("' . $nombreformacionPostecnico . '", "' . $nombreinstitucionPostecnico . '", "' . $fechainiciosupPostecnico . '", "' . $fechaterminosupPostecnico . '", "' . $tiempocursadosupPostecnico . '", "' . $documentorecibePostecnico . '", "' . $id_empleado . '")';
        $consultaP = "INSERT into  estudiospostecnico(nombreformacionpostecnico,nombreinstitucionpostecnico,fechainiciosuppostecnico,fechaterminosuppostecnico,tiempocursadosuppostecnico,documentorecibepostecnico,id_empleado) VALUES " . implode(', ', $datoUnicoP);
        
}
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
mysqli_query($conexionGrafico, $consultaP);

/*finaliza postecnico*/
    $arraynombreformacion =  $_POST['nombreformacion'];
    $arraynombreinstitucion = $_POST['nombreinstitucion'];
    $arrayfechainicio = $_POST['fechainiciosup'];
    $arrayfechatermino = $_POST['fechaterminosup'];
    $arraytiempocursado = $_POST['tiempocursadosup'];
    $arraydocumentorecibe = $_POST['documentorecibe'];
    $arraynumerocedula = $_POST['numerocedula'];

    $arraynombreformacion = array_map("htmlspecialchars", $arraynombreformacion);
    $arraynombreinstitucion = array_map("htmlspecialchars", $arraynombreinstitucion);
    $arrayfechainicio = array_map("htmlspecialchars", $arrayfechainicio);
    $arraytiempocursado = array_map("htmlspecialchars", $arraytiempocursado);
    $arraynumerocedula = array_map("htmlspecialchars", $arraynumerocedula);

    $sql_array = array();
    foreach ($arraynombreformacion as $clave => $nombreformacion) {
        $nombreinstitucion = $arraynombreinstitucion[$clave];
        $fechainicio = $arrayfechainicio[$clave];
        $fechatermino = $arrayfechatermino[$clave];
        $tiempocursado = $arraytiempocursado[$clave];
        $documentorecibe = $arraydocumentorecibe[$clave];
        $numerocedula = $arraynumerocedula[$clave];
        $datoUnico[] = '("' . $nombreformacion . '", "' . $nombreinstitucion . '", "' . $fechainicio . '", "' . $fechatermino . '", "' . $tiempocursado . '", "' . $documentorecibe . '", "' . $numerocedula . '", "' . $id_empleado . '")';
        $consulta = "INSERT into  estudiossuperior(nombreformacionsuperior,nombresuperior,fechasuperiorinicio,fechasuperiortermino,tiempocursadosuperior,documentosuperior,numerocedulasuperior,id_empleado) VALUES " . implode(', ', $datoUnico);
        
}
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

    mysqli_query($conexionGrafico, $consulta);
  
    $arraynombreformacionmaestria =  $_POST['nombreformacionmaestria'];
    $arraynombreinstitucionmaestria = $_POST['nombreinstitucionmaestria'];
    $arrayfechainiciomaestria = $_POST['fechainiciosupmaestria'];
    $arrayfechaterminomaestria = $_POST['fechaterminosupmaestria'];
    $arraytiempocursadomaestria = $_POST['tiempocursadosupmaestria'];
    $arraydocumentorecibemaestria = $_POST['documentorecibemaestria'];
    $arraynumerocedulamaestria = $_POST['numerocedulamaestria'];

    $arraynombreformacionmaestria = array_map("htmlspecialchars", $arraynombreformacionmaestria);
    $arraynombreinstitucionmaestria = array_map("htmlspecialchars", $arraynombreinstitucionmaestria);
    $arrayfechainiciomaestria = array_map("htmlspecialchars", $arrayfechainiciomaestria);
    $arrayfechaterminomaestria = array_map("htmlspecialchars", $arrayfechaterminomaestria);
    $arraytiempocursadomaestria = array_map("htmlspecialchars", $arraytiempocursadomaestria);
    $arraydocumentorecibemaestria = array_map("htmlspecialchars", $arraydocumentorecibemaestria);
    $arraynumerocedulamaestria = array_map("htmlspecialchars", $arraynumerocedulamaestria);

    $sql_arraymaestria = array();
    foreach ($arraynombreformacionmaestria as $clavemaestria => $nombreformacionmaestria) {
        $nombreinstitucionmaestria = $arraynombreinstitucionmaestria[$clavemaestria];
        $fechainiciomaestria = $arrayfechainiciomaestria[$clavemaestria];
        $fechaterminomaestria = $arrayfechaterminomaestria[$clavemaestria];
        $tiempocursadomaestria = $arraytiempocursadomaestria[$clavemaestria];
        $documentorecibemaestria = $arraydocumentorecibemaestria[$clavemaestria];
        $numerocedulamaestria = $arraynumerocedulamaestria[$clavemaestria];
        $datoUnicomaestria[] = '("' . $nombreformacionmaestria . '", "' . $nombreinstitucionmaestria . '", "' . $fechainiciomaestria . '", "' . $fechaterminomaestria . '", "' . $tiempocursadomaestria . '", "' . $documentorecibemaestria . '", "' . $numerocedulamaestria . '", "' . $id_empleado . '")';
        $consulta2 = "INSERT into  estudiosmaestria(nombreformacionmaestria,nombremaestria,fechamaestriainicio,fechamaestriatermino,tiempocursadomaestria,documentomaestria,numerocedulamaestria,id_empleado) VALUES " . implode(', ', $datoUnicomaestria);
        
    }  
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
    mysqli_query($conexionGrafico, $consulta2);
    $arraynombreformacionposgradoespecialidad =  $_POST['nombreformacionposgradoespecialidad'];
    $arraynombreinstitucionposgradoespecialidad = $_POST['nombreinstitucionposgradoespecialidad'];
    $arrayfechainicioposgradoespecialidad = $_POST['fechainiciosupposgradoespecialidad'];
    $arrayfechaterminoposgradoespecialidad = $_POST['fechaterminosupposgradoespecialidad'];
    $arraytiempocursadoposgradoespecialidad = $_POST['tiempocursadosupposgradoespecialidad'];
    $arrayunidadhospitalariaposgradoespecialidad = $_POST['unidadhospitalariaposgradoespecialidad'];
    $arraydocumentorecibeposgradoespecialidad = $_POST['documentorecibeposgradoespecialidad'];
    $arraynumerocedulaposgradoespecialidad = $_POST['numerocedulaposgradoespecialidad'];

    $arraynombreformacionposgradoespecialidad = array_map("htmlspecialchars", $arraynombreformacionposgradoespecialidad);
    $arraynombreinstitucionposgradoespecialidad = array_map("htmlspecialchars", $arraynombreinstitucionposgradoespecialidad);
    $arrayfechainicioposgradoespecialidad = array_map("htmlspecialchars", $arrayfechainicioposgradoespecialidad);
    $arrayfechaterminoposgradoespecialidad = array_map("htmlspecialchars", $arrayfechaterminoposgradoespecialidad);
    $arraytiempocursadoposgradoespecialidad = array_map("htmlspecialchars", $arraytiempocursadoposgradoespecialidad);
    $arrayunidadhospitalariaposgradoespecialidad = array_map("htmlspecialchars", $arrayunidadhospitalariaposgradoespecialidad);
    $arraynumerocedulaposgradoespecialidad = array_map("htmlspecialchars", $arraynumerocedulaposgradoespecialidad);

    $sql_arrayposgradoespecialidad = array();
    foreach ($arraynombreformacionposgradoespecialidad as $claveposgradoespecialidad => $nombreformacionposgradoespecialidad) {
        $nombreinstitucionposgradoespecialidad = $arraynombreinstitucionposgradoespecialidad[$claveposgradoespecialidad];
        $fechainicioposgradoespecialidad = $arrayfechainicioposgradoespecialidad[$claveposgradoespecialidad];
        $fechaterminoposgradoespecialidad = $arrayfechaterminoposgradoespecialidad[$claveposgradoespecialidad];
        $tiempocursadoposgradoespecialidad = $arraytiempocursadoposgradoespecialidad[$claveposgradoespecialidad];
        $unidadhospitalariaposgradoespecialidad = $arrayunidadhospitalariaposgradoespecialidad[$claveposgradoespecialidad];
        $documentorecibeposgradoespecialidad = $arraydocumentorecibeposgradoespecialidad[$claveposgradoespecialidad];
        $numerocedulaposgradoespecialidad = $arraynumerocedulaposgradoespecialidad[$claveposgradoespecialidad];
        $datoUnicoposgradoespecialidad[] = '("' . $nombreformacionposgradoespecialidad . '", "' . $nombreinstitucionposgradoespecialidad . '","' . $unidadhospitalariaposgradoespecialidad . '", "' . $fechainicioposgradoespecialidad . '", "' . $fechaterminoposgradoespecialidad . '", "' . $tiempocursadoposgradoespecialidad . '", "' . $documentorecibeposgradoespecialidad . '", "' . $numerocedulaposgradoespecialidad . '", "' . $id_empleado . '")';
        $consulta3 = "INSERT into  especialidad(nombreformacionacademica,nombreinstitucion,unidadhospitalaria,fechainicioespecialidad,fechaterminoespecialidad,anioscursados,documentorecibeespecialidad,numerocedulaespecialidad,id_empleado) VALUES " . implode(', ', $datoUnicoposgradoespecialidad);
    }
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
    mysqli_query($conexionGrafico, $consulta3);

    $arraynombreformaciondoctorado =  $_POST['nombreformaciondoctorado'];
    $arraynombreinstituciondoctorado = $_POST['nombreinstituciondoctorado'];
    $arrayfechainiciodoctorado = $_POST['fechainiciosupdoctorado'];
    $arrayfechaterminodoctorado = $_POST['fechaterminosupdoctorado'];
    $arraytiempocursadodoctorado = $_POST['tiempocursadosupdoctorado'];
    $arrayunidadhospitalariadoctorado = $_POST['unidadhospitalariadoctorado'];
    $arraydocumentorecibedoctorado = $_POST['documentorecibedoctorado'];
    $arraynumeroceduladoctorado = $_POST['numeroceduladoctorado'];

    $arraynombreformaciondoctorado = array_map("htmlspecialchars", $arraynombreformaciondoctorado);
    $arraynombreinstituciondoctorado = array_map("htmlspecialchars", $arraynombreinstituciondoctorado);
    $arrayfechainiciodoctorado = array_map("htmlspecialchars", $arrayfechainiciodoctorado);
    $arrayfechaterminodoctorado = array_map("htmlspecialchars", $arrayfechaterminodoctorado);
    $arraytiempocursadodoctorado = array_map("htmlspecialchars", $arraytiempocursadodoctorado);
    $arrayunidadhospitalariadoctorado = array_map("htmlspecialchars", $arrayunidadhospitalariadoctorado);
    $arraynumeroceduladoctorado = array_map("htmlspecialchars", $arraynumeroceduladoctorado);

    $sql_arraydoctorado = array();
    foreach ($arraynombreformaciondoctorado as $clavedoctorado => $nombreformaciondoctorado) {
        $nombreinstituciondoctorado = $arraynombreinstituciondoctorado[$clavedoctorado];
        $fechainiciodoctorado = $arrayfechainiciodoctorado[$clavedoctorado];
        $fechaterminodoctorado = $arrayfechaterminodoctorado[$clavedoctorado];
        $tiempocursadodoctorado = $arraytiempocursadodoctorado[$clavedoctorado];
        $unidadhospitalariadoctorado = $arrayunidadhospitalariadoctorado[$clavedoctorado];
        $documentorecibedoctorado = $arraydocumentorecibedoctorado[$clavedoctorado];
        $numeroceduladoctorado = $arraynumeroceduladoctorado[$clavedoctorado];
        $datoUnicodoctorado[] = '("' . $nombreformaciondoctorado . '", "' . $nombreinstituciondoctorado . '","' . $unidadhospitalariadoctorado . '", "' . $fechainiciodoctorado . '", "' . $fechaterminodoctorado . '", "' . $tiempocursadodoctorado . '", "' . $documentorecibedoctorado . '", "' . $numeroceduladoctorado . '", "' . $id_empleado . '")';
        $consulta4 = "INSERT into  doctorado(nombreformaciondoctorado,nombreinstituciondoctorado,unidadhospitalariadoctorado,fechainiciodoctorado,fechaterminodoctorado,anioscursadosdoctorado,documentorecibedoctorado,numeroceduladoctorado,id_empleado) VALUES " . implode(', ', $datoUnicodoctorado);
    }
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
    mysqli_query($conexionGrafico, $consulta4);
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
