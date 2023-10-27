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
    $sql = $conexionX->prepare("INSERT INTO estudiosmediosup(nombreformacionmedia,nombremediasuperior,fechainicio,fechatermino,tiempocursado,documentomediosuperior,id_empleado)
    values(:nombreformacionmedia,:nombremediasuperior,:fechainicio,:fechatermino,:tiempocursado,:documentomediosuperior,:id_empleado)");
    $sql->execute(array(
        ':nombreformacionmedia' => $nombreformacionmedia,
        ':nombremediasuperior' => $nombremediasuperior,
        ':fechainicio' => $fechainicio,
        ':fechatermino' => $fechatermino,
        ':tiempocursado' => $tiempocursado,
        ':documentomediosuperior' => $documentomediosuperior,
        ':id_empleado' => $id_empleado
    ));
    $sql = $conexionX->prepare("INSERT INTO ultimogradoestudios(descripcionultimogrado, id_empleado) values(:descripcionultimogrado, :id_empleado)");
    $sql->execute(array(
        ':descripcionultimogrado'=>$ultimogradoestudios,
        ':id_empleado'=>$id_empleado
    ));
    $sql = $conexionX->prepare("INSERT into actualizacion (actualizo, id_empleado) values(:actualizo :id_empleado)");
        $sql->execute(array(
            ':actualizo'=>1,
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
            $nombredelarchivo = "Titulo posgrado";
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
