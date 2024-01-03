<?php session_start();
error_reporting(0);
	require_once '../clases/conexion.php';
    $conexionX = new ConexionRh();
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
$institucionNombre = strtoupper($nombreinstitucion);
$cursoNombre = strtoupper($nombrecurso);
		$sql = $conexionX->prepare("INSERT INTO datos (id_empleado,nombreinstitucion,nombrecurso,fechainicio,fechatermino,areaquefortalece,modalidad,documentorecibe,tipocapacitacion,horas,asistecomo,otroexpidedocumento,nombreempleado,criteriocurso,fechacriterioinicio,fechacriteriotermino,calificacion) 
        VALUES(:id_empleado,:nombreinstitucion,:nombrecurso,:fechainicio,:fechatermino,:areaquefortalece,:modalidad,:documentorecibe,:tipocapacitacion,:horas,:asistecomo,:otroexpidedocumento,:nombreempleado,:criteriocurso,:fechacriterioinicio,:fechacriteriotermino,:calificacion)");
                $sql->execute(array(
                    ':id_empleado'=>$id_empleado,
                    ':nombreinstitucion'=>$institucionNombre,
                    ':nombrecurso'=>$cursoNombre,
                    ':fechainicio'=>$fechainicio,
                    ':fechatermino'=>$fechatermino,
                    ':areaquefortalece'=>$areafortalece,
                    ':modalidad'=>$modalidad,
                    ':documentorecibe'=>$documentorecibe,
                    ':tipocapacitacion'=>$capacitacion,
                    ':horas'=>$horas,
                    ':asistecomo'=>$asistecomo,
                    ':otroexpidedocumento'=>$otroexpidedocumento,
                    ':nombreempleado'=>$nombreempleado,
                    ':criteriocurso'=>$criteriocurso,
                    ':fechacriterioinicio'=>$fechainiciocriterio,
                    ':fechacriteriotermino'=>$fechaterminocriterio,
                    ':calificacion'=>$calificacion
                ));
                $validatransaccion = $conexionX->commit();
                foreach($_FILES["documentocurso"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["documentocurso"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = strtoupper($_POST["nombrecurso"]).$_POST["fechatermino"];
                        $archivonombre = strtoupper($_POST['nombrecurso']);
                        $fuente = $_FILES["documentocurso"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentoscursos/'.$nombredelarchivo.$id_empleado. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/comprobante.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
	
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