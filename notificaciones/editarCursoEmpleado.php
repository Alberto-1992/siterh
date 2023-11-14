<?php session_start();
error_reporting(0);
	require_once '../clases/conexion.php';
    $conexionX = new ConexionRh();
	$count=0;
	extract($_POST);
		
    $conexionX->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionX->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexionX->beginTransaction();
        $sqlvalida = $conexionX->prepare("SELECT descripcionaccion from catalogocapacitacion where id_tipodeaccion = :id_tipodeaccion");
            $sqlvalida->execute(array(
                ':id_tipodeaccion'=>$tipodecapacitacion
            ));

            $row = $sqlvalida->fetch();
            $capacitacion = $row['descripcionaccion'];

		$sql = $conexionX->prepare("UPDATE datos set nombreinstitucion=:nombreinstitucion,nombrecurso=:nombrecurso,fechainicio=:fechainicio,fechatermino=:fechatermino,areaquefortalece=:areaquefortalece,
        modalidad=:modalidad,documentorecibe=:documentorecibe,tipocapacitacion=:tipocapacitacion,horas=:horas,asistecomo=:asistecomo,otroexpidedocumento=:otroexpidedocumento,
        criteriocurso=:criteriocurso,fechacriterioinicio=:fechacriterioinicio,fechacriteriotermino=:fechacriteriotermino where id = :id"); 
                $sql->execute(array(
                    ':nombreinstitucion'=>$nombreinstitucion,
                    ':nombrecurso'=>$nombrecurso,
                    ':fechainicio'=>$fechainicio,
                    ':fechatermino'=>$fechatermino,
                    ':areaquefortalece'=>$areafortalece,
                    ':modalidad'=>$modalidad,
                    ':documentorecibe'=>$documentorecibe,
                    ':tipocapacitacion'=>$capacitacion,
                    ':horas'=>$horas,
                    ':asistecomo'=>$asistecomo,
                    ':otroexpidedocumento'=>$otroexpidedocumento,
                    ':criteriocurso'=>$criteriocurso,
                    ':fechacriterioinicio'=>$fechainiciocriterio,
                    ':fechacriteriotermino'=>$fechaterminocriterio,
                    ':id'=>$id
                ));
if($_FILES["documentocurso"] == ''){
}else{
        if ($_FILES["documentocurso"]["error"] > 0) {

        } else {
        
            $permitidos = array("application/pdf");
                $nombrecurso = $_POST["nombrecurso"].$_POST["fechatermino"];
            if (in_array($_FILES["documentocurso"]["type"], $permitidos) && $_FILES["documentocurso"]["size"]) {
        
                $ruta = '../documentoscursos/'.$nombrecurso.$id_empleado.'/';
                $archivo = $ruta . $_FILES["documentocurso"]["name"] = $_POST["nombrecurso"].'.pdf';
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (!file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["documentocurso"]["tmp_name"], $archivo);
        
                }else{
                    $resultado = @move_uploaded_file($_FILES["documentocurso"]["tmp_name"], $archivo);
                }
            }
        }
}
$validatransaccion = $conexionX->commit();
	if($validatransaccion != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else {
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