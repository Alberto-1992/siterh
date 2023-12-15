<?php session_start();
error_reporting(0);
$id = $_POST['id'];
?>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$activeconomica = 'actividad economica';
$path = "../talent/documentos/".$id.'/'.$activeconomica.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$id/$activeconomica.pdf' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$activeconomica.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Constancia SAT</a>";
        }
    }
?>
<?php
$actanacimiento = 'acta de nacimiento';
$path = "../talent/documentos/".$id.'/'.$actanacimiento.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$id/$actanacimiento.pdf' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$actanacimiento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Acta nacimiento</a>";
        }
    }
?>
<?php
$ine = 'ine';
$path = "../talent/documentos/".$id.'/'.$ine.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$id/$ine.pdf' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$ine.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>INE</a>";
        }
    }
?>
</div>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$cartilla = 'cartilla militar';
$path = "../talent/documentos/".$id.'/'.$cartilla.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$id/$cartilla.pdf' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$cartilla.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Cartilla militar</a>";
        }
    }
?>
<?php
$firmaelectronica = 'firma electronica';
$path = "../talent/documentos/".$id.'/'.$firmaelectronica.'.rar';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<div width='170' height='220' margin-top='50' class='form-control'><a href='../talent/documentos/$firmaelectronica$curp/$archivo' target='_blank'><img src='https://cdn.icon-icons.com/icons2/160/PNG/256/folder_archive_rar_22614.png' style='width: 170px; height: 150px;'></a></div>";
            echo "<a href='../talent/documentos/$id/$firmaelectronica.rar' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Firma electronica</a>";
        }
    }

?>
<?php
$claveinter = 'clave interbancaria';
$path = "../talent/documentos/".$id.'/'.$claveinter.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$id/$claveinter.pdf' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$claveinter.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Clave interbancaria</a>";
        }
    }
?>
</div>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">

<?php
$comprobatecurp = 'comprobante curp';
$path = "../talent/documentos/".$id.'/'.$comprobatecurp.'.pdf';
if (file_exists($path)) {
    $directorio = opendir($path);
    $archivo = readdir($directorio);
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            
            echo "<iframe src='../talent/documentos/$id/$comprobatecurp.pdf' width='100' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$id/$comprobatecurp.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>CURP</a>";
        }

}
?>

<?php
$comprobantedomicilio = 'comprobante de domicilio';
                $path = "../talent/documentos/".$id.'/'.$comprobantedomicilio.'.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                        
                            echo "<iframe src='../talent/documentos/$id/$comprobantedomicilio.pdf' width='100' height='220' margin-top='50' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$id/$comprobantedomicilio.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Comprobante de domicilio</a>";
                        }
                    }
                
                ?>
</div>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">

<?php
$mediasup = 'Certificado media superior';
                $path = "../talent/documentos/".$id.'/'.$mediasup.'.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$id/$mediasup.pdf' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$id/$mediasup.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Certificado media superior</a>";
                        }
                    }
                ?>
</div>
<strong>Comprobante medio superior</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
<?php
require_once 'clases/conexion.php';
$conexionD = new ConexionDocumentacion();
    $sql = $conexionD->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroe):
    
    $archivonombre = 'Titulo licenciatura'.' '.$dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistroe['id_empleado'];
    $path = '../talent/documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                //echo "<a href='eliminarDocumentacion/eliminarCedSuperior?titulo=$archivonombre&id=$id_user&archivo=$archivo'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    $archivonombre = 'Cedula licenciatura'.' '.$dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistroe['id_empleado'];
    $path = '../talent/documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                //echo "<a href='eliminarDocumentacion/eliminarCedSuperior?titulo=$archivonombre&id=$id_user&archivo=$archivo'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
endforeach;
    ?>
                
                </div>
                <strong>Documentos Licenciatura</strong>               
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">

<?php
require_once 'clases/conexion.php';
$conexionD = new ConexionDocumentacion();
    $sql = $conexionD->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroMaestria):
    
    $archivonombre = 'Titulo maestria'.' '.$dataRegistroMaestria['nombreformacionmaestria'];
    $id_user = $dataRegistroMaestria['id_empleado'];
                $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
    $archivonombre = 'Cedula maestria'.' '.$dataRegistroMaestria['nombreformacionmaestria'];
                    $id_user = $dataRegistroMaestria['id_empleado'];
                                $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    $archivo = readdir($directorio);
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                
                                            echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220' class='form-control'></iframe>";
                                            echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                                        }
                                    }
            
            endforeach;
                ?>
    </div>
    <strong>Documentos maestria</strong>
    
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
                require_once 'clases/conexion.php';
                $conexionD = new ConexionDocumentacion();
                    $sql = $conexionD->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
                        $sql->execute(array(
                            ':id_empleado'=>$id
                        ));
                        $row = $sql->fetchAll();
                        foreach($row as $dataRegistroEspecialidad):
                    
                    $archivonombre = 'Titulo posgrado'.' '.$dataRegistroEspecialidad['nombreformacionacademica'];
                    $id_user = $dataRegistroEspecialidad['id_empleado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Titulo posgrado</a>";
            }
        }
        $archivonombre = 'Cedula posgrado'.' '.$dataRegistroEspecialidad['nombreformacionacademica'];
                    $id_user = $dataRegistroEspecialidad['id_empleado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Cedula posgrado</a>";
            }
        }
endforeach;
    ?>
                </div>
                <strong>Documentos posgrado/especialidad</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    require_once 'clases/conexion.php';
    $conexionD = new ConexionDocumentacion();
        $sql = $conexionD->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
            $sql->execute(array(
                ':id_empleado'=>$id
            ));
            $row = $sql->fetchAll();
            foreach($row as $dataRegistroDoctorado):
        
        $archivonombre = 'Titulo doctorado'.' '.$dataRegistroDoctorado['nombreformaciondoctorado'];
        $id_user = $dataRegistroDoctorado['id_empleado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    $archivonombre = 'Cedula doctorado'.' '.$dataRegistroDoctorado['nombreformaciondoctorado'];
        $id_user = $dataRegistroDoctorado['id_empleado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
endforeach;
                ?>
                </div>
                <strong>Documentos doctorado/subespecialidad</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    require_once 'clases/conexion.php';
    $conexionD = new ConexionDocumentacion();
        $sql = $conexionD->prepare("SELECT * from otrosestudiosaltaesp where id_postulado = :id_postulado");
            $sql->execute(array(
                ':id_postulado'=>$id
            ));
            $row = $sql->fetchAll();
            foreach($row as $dataRegistroAltaEsp):
        
        $archivonombre = 'Titulo alta especialidad'.' '.$dataRegistroAltaEsp['nombreformacionaltaesp'];
        $id_user = $dataRegistroAltaEsp['id_postulado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
        $archivonombre = 'Cedula alta especialidad'.' '.$dataRegistroAltaEsp['nombreformacionaltaesp'];
        $id_user = $dataRegistroAltaEsp['id_postulado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
endforeach;
                ?>
                </div>
                <strong>Documentos otros estudios alta epecialidad</strong>

            
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $serviciosocial = 'Documento servicio social';
    $path = "../talent/documentos/".$id.'/'.$serviciosocial.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$serviciosocial.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$serviciosocial.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
                ?>
                </div>
<strong>Documento servicio social</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $practicasprofesionales = 'Documento practicas profesionales';
    $path = "../talent/documentos/".$id.'/'.$practicasprofesionales.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$practicasprofesionales.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$practicasprofesionales.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
                ?>
                </div>
<strong>Documento practicas profesionales</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento certificacion uno';
    $path = "../talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
<strong>Documento certificacion uno</strong>

<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento actualizacion academica uno';
    $path = "../talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
<strong>Actualizacion academica/primer curso</strong>

<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    require_once 'clases/conexion.php';
    $conexionD = new ConexionDocumentacion();
        $sql = $conexionD->prepare("SELECT * from explaboralprivado where id_postulado = :id_postulado");
            $sql->execute(array(
                ':id_postulado'=>$id
            ));
            $row = $sql->fetchAll();
            foreach($row as $dataRegistroExpLaboralPriva):
        
        $archivonombre = 'Documento exp laboral privada 1'.' '.$dataRegistroExpLaboralPriva['nombrelaboralprivada'];
        $id_user = $dataRegistroExpLaboralPriva['id_postulado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
        $archivonombre = 'Documento exp laboral privada 2'.' '.$dataRegistroExpLaboralPriva['nombrelaboralprivada'];
        $id_user = $dataRegistroExpLaboralPriva['id_postulado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
endforeach;
                ?>
                </div>
                <strong>Exp laboral sector privado</strong>
               
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $explaboral1 = 'exp laboral publico primero 1';
    $path = "../talent/documentos/".$id.'/'.$explaboral1.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboral1.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboral1.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
    $explaboral2 = 'exp laboral publico primero 2';
    $path = "../talent/documentos/".$id.'/'.$explaboral2.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboral2.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboral2.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
                ?>
                </div>
                <strong>Exp laboral sector publico primero</strong>
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $explaboralsegundo1 = 'exp laboral publico segundo 1';
    $path = "../talent/documentos/".$id.'/'.$explaboralsegundo1.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboralsegundo1.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboralsegundo1.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
    $explaboralsegundo2 = 'exp laboral publico segundo 2';
    $path = "../talent/documentos/".$id.'/'.$explaboralsegundo2.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboralsegundo2.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboralsegundo2.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
                ?>
                </div>
                <strong>Exp laboral sector publico segundo</strong>
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $explaboraltercero1 = 'exp laboral publico tercero 1';
    $path = "../talent/documentos/".$id.'/'.$explaboraltercero1.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboraltercero1.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboraltercero1.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
    $explaboraltercero2 = 'exp laboral publico tercero 2';
    $path = "../talent/documentos/".$id.'/'.$explaboraltercero2.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$explaboraltercero2.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id/$explaboraltercero2.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    
                ?>
                </div>
                <strong>Exp laboral sector publico tercero</strong>
