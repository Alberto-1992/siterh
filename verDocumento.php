<?php session_start();
error_reporting(0);
$id = $_POST['id'];
?>

<?php
    $documento = 'avisoconfidencialidad';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Aviso de confidencialidad</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php
    $documento = 'integraciondeantiguedad';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Cédula de integración de antigüedad</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php
    $documento = 'noconflictodeinteres';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Declaración de no conflicto de interés</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php

    $documento = 'paraocpuacion';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Declaración para ocupación</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php
    $documento = 'noempleo';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Documento de no empleo</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php

    $documento = 'consentimiento';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Formato consentimiento</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php

    $documento = 'otroempleo';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Formato datos de otro empleo</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
    
    <?php
    $documento = 'protecciondatos';
    $path = "../talent/documentos/" .$id."/".$documento.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                echo "<label>Formato de aviso de protección de datos</label>";
                echo "<iframe src='../talent/documentos/$id/$documento.pdf' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$documento.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver documento</a><br>";
                echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$documento'>Eliminar</a>";
            }
        
    }

    ?>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
<?php
    $archivonombre = 'Titulo tecnico';
    $path = '../talent/documentos/'.$id.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$id/$archivonombre.pdf' target='_blank'>Ver</a>";
            }
        }
    

    ?>
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
                            echo "<a href='../talent/eliminarDocumentacion/eliminarDocumento?titulo=$archivonombre&id=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            
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
        $archivonombre = 'Certificado consejo'.' '.$dataRegistroEspecialidad['nombreformacionacademica'];
        $id_user = $dataRegistroEspecialidad['id_empleado'];
    $path = "../talent/documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$id_user/$archivonombre.pdf' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Certificado consejo</a>";
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
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    require_once 'clases/conexion.php';
    $conexionD = new ConexionDocumentacion();
        $sql = $conexionD->prepare("SELECT * from cerficacion where id_postulado = :id_postulado");
            $sql->execute(array(
                ':id_postulado'=>$id
            ));
            $row = $sql->fetchAll();
            foreach($row as $dataRegistroCertificacion):
        
        $archivonombre = 'Documento certificacion'.' '.$dataRegistroCertificacion['nombrecertificacionuno'];
        $id_user = $dataRegistroCertificacion['id_postulado'];
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
                <strong>Documento certificaciones</strong>

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