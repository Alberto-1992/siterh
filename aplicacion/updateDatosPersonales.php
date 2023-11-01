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
    $sql = $conexionX->prepare("UPDATE datospersonales set fechanacimiento = :fechanacimiento, edad = :edad, estadocivil = :estadocivil, entidadnacimiento = :entidadnacimiento, genero = :genero,tipodesangre = :tipodesangre,
    nacionalidad = :nacionalidad,numerocartillamilitar = :numerocartillamilitar, cartanaturalizacion = :cartanaturalizacion,calle = :calle, numeroexterior = :numeroexterior, numerointerior = :numerointerior,
    codigopostal = :codigopostal, colonia = :colonia, estado = :estado, municipio = :municipio, localidad = :localidad, telefonocasa = :telefonocasa, telefonocelular = :telefonocelular, otrotelefono = :otrotelefono, 
    fechaactualizo = :fechaactualizo, nombreemergencia = :nombreemergencia, telefonoemergencia = :telefonoemergencia, parentescoemergencia = :parentescoemergencia where id_empleado = :id_empleado");
    
    $sql->execute(array(
        ':fechanacimiento'=>$fechanacimiento,
        ':edad'=>$edad,
        ':estadocivil'=>$estadocivil,
        ':entidadnacimiento'=>$entidadnacimiento,
        ':genero'=>$sexo,
        ':tipodesangre'=>$tipodesangre,
        ':nacionalidad'=>$nacionalidad,
        ':numerocartillamilitar'=>$cartillamilitar,
        ':cartanaturalizacion'=>$naturalizacion,
        ':calle'=>$calle,
        ':numeroexterior'=>$numeroexterior,
        ':numerointerior'=>$numerointerior,
        ':codigopostal'=>$codigopostal,
        ':colonia'=>$colonia,
        ':estado'=>$cbx_estado,
        ':municipio'=>$cbx_municipio,
        ':localidad'=>$localidad,
        ':telefonocasa'=>$telcasa,
        ':telefonocelular'=>$telcel,
        ':otrotelefono'=>$otrotel,
        ':fechaactualizo'=>$hora,
        ':nombreemergencia'=>$nombreemergencia,
        ':telefonoemergencia'=>$telefonoemergencia,
        ':parentescoemergencia'=>$parentescoemergencia,
        ':id_empleado'=>$id_empleado
    ));
    $sql = $conexionX->prepare("DELETE from hijos where id_empleado = :id_empleado");
            $sql->execute(array(
                ':id_empleado'=>$id_empleado
            ));
    if ($_FILES["documentocurp"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["documentocurp"]["type"], $permitidos) && $_FILES["documentocurp"]["size"]) {

            $ruta = '../documentoscurp/' .$curp.$id_empleado. '/';
            $archivo = $ruta . $_FILES["documentocurp"]["name"] = "Comprobante CURP.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["documentocurp"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["documentocurp"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    if ($_FILES["documentocartilla"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["documentocartilla"]["type"], $permitidos) && $_FILES["documentocartilla"]["size"]) {

            $ruta = '../documentoscartilla/' .$curp.$id_empleado. '/';
            $archivo = $ruta . $_FILES["documentocartilla"]["name"] = "Cartilla militar.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["documentocartilla"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["documentocartilla"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    if ($_FILES["documentodomicilio"]["error"] > 0) {
        
    } else {

        $permitidos = array("application/pdf");
        
        if (in_array($_FILES["documentodomicilio"]["type"], $permitidos) && $_FILES["documentodomicilio"]["size"]) {

            $ruta = '../documentoscomprobantedomicilio/' .$curp.$id_empleado. '/';
            $archivo = $ruta . $_FILES["documentodomicilio"]["name"] = "Comprobante domicilio.pdf";


            if (!file_exists($ruta)) {
                mkdir($ruta);
            }

            if (file_exists($archivo)) {

                $resultado = @move_uploaded_file($_FILES["documentodomicilio"]["tmp_name"], $archivo);
            } else {
                $resultado = @move_uploaded_file($_FILES["documentodomicilio"]["tmp_name"], $archivo);
            }
            
        }
        
    }
    
    $validatransac = $conexionX->commit();

    require '../conexionRh.php';
    $arraynombrehijo =  $_POST['nombrehijo'];
    $arraycurphijo = $_POST['curphijo'];
    $arrayedadhijo = $_POST['edadhijo'];
    $arraysexohijo = $_POST['sexohijo'];
    $arrayfechanacimiento = $_POST['fechanacimientohijo'];

    $arraynombrehijo = array_map("htmlspecialchars", $arraynombrehijo);
    $arraycurphijo = array_map("htmlspecialchars", $arraycurphijo);
    $arrayedadhijo = array_map("htmlspecialchars", $arrayedadhijo);
    $arraysexohijo = array_map("htmlspecialchars", $arraysexohijo);
    $arrayfechanacimiento = array_map("htmlspecialchars", $arrayfechanacimiento);

    $sql_array = array();
    foreach ($arraynombrehijo as $clave => $nombrehijo) {
        $curphijo = $arraycurphijo[$clave];
        $edadhijo = $arrayedadhijo[$clave];
        $sexohijo = $arraysexohijo[$clave];
        $fechanacimientohijo = $arrayfechanacimiento[$clave];
        
        $datoUnico[] = '("' . $nombrehijo . '", "' . $curphijo . '", "' . $edadhijo . '", "' . $sexohijo . '","'.$fechanacimientohijo.'", "' . $id_empleado . '")';
        $consulta = "INSERT into  hijos(nombrecompletohijo,curphijo,edadhijo,sexohijo,fechanacimientohijo,id_empleado) VALUES " . implode(', ', $datoUnico);
        
}
foreach($_FILES["documentocurphijo"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["documentocurphijo"]["name"][$key]) {
			// Nombres de archivos de temporales
            $nombredelarchivo = "Documento hijo";
			$archivonombre = $_POST['nombrehijo'][$key];
			$fuente = $_FILES["documentocurphijo"]["tmp_name"][$key]; 
			
			$carpeta = '../documentoshijos/' .$archivonombre.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
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

    if($validatransac != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido actualizados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }

}catch(Exception $e) {
    $conexionX->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al actualizar tus datos',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>