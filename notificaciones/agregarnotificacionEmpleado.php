<?php
error_reporting(0);
	require_once '../clases/conexion.php';
    $conexionX = new ConexionRh();
	$count=0;
	extract($_POST);
		

        $sqlvalida = $conexionX->prepare("SELECT descripcionaccion from catalogocapacitacion where id_tipodeaccion = :id_tipodeaccion");
            $sqlvalida->execute(array(
                ':id_tipodeaccion'=>$tipodecapacitacion
            ));

            $row = $sqlvalida->fetch();
        $capacitacion = $row['descripcionaccion'];

		$sql = $conexionX->prepare("INSERT INTO datos (id_empleado,nombreinstitucion,nombrecurso,fechainicio,fechatermino,areaquefortalece,modalidad,documentorecibe,tipocapacitacion,horas,asistecomo,otroexpidedocumento,nombreempleado) 
        VALUES(:id_empleado,:nombreinstitucion,:nombrecurso,:fechainicio,:fechatermino,:areaquefortalece,:modalidad,:documentorecibe,:tipocapacitacion,:horas,:asistecomo,:otroexpidedocumento,:nombreempleado)");
                $sql->execute(array(
                    ':id_empleado'=>$id_empleado,
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
                    ':nombreempleado'=>$nombreempleado
                ));

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
        
                }
            }
        }
	//$sql2="SELECT * FROM datos WHERE estado = 0";
	//$result=mysqli_query($conexionGrafico, $sql2);
	//$count=mysqli_num_rows($result);
	if($sql != false){
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tus datos han sido enviados exitosamente',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }else {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al enviar tus datos',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
?>