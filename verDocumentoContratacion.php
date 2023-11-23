<?php session_start();
$id = $_POST['id'];
?>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$activeconomica = 'documentoactvidadeconomica';
$path = "../talent/documentos/".$activeconomica.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$activeconomica$id/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$activeconomica$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Constancia SAT</a>";
        }
    }
}

?>
<?php
$actanacimiento = 'documentoactanacimiento';
$path = "../talent/documentos/".$actanacimiento.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$actanacimiento$id/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$actanacimiento$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Acta nacimiento</a>";
        }
    }
}

?>
<?php
$ine = 'documentoine';
$path = "../talent/documentos/".$ine.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$ine$id/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$ine$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>INE</a>";
        }
    }
}

?>
</div>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$cartilla = 'documentocartilla';
$path = "../talent/documentos/".$cartilla.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$cartilla$id/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$cartilla$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Cartilla militar</a>";
        }
    }
}

?>
<?php
$firmaelectronica = 'documentofirmaelectonica';
$path = "../talent/documentos/".$firmaelectronica.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<div width='170' height='220' margin-top='50' class='form-control'><a href='../talent/documentos/$firmaelectronica$curp/$archivo' target='_blank'><img src='https://cdn.icon-icons.com/icons2/160/PNG/256/folder_archive_rar_22614.png' style='width: 170px; height: 150px;'></a></div>";
            echo "<a href='../talent/documentos/$firmaelectronica$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Firma electronica</a>";
        }
    }
}

?>
<?php
$claveinter = 'documentoclaveinterbancaria';
$path = "../talent/documentos/".$claveinter.$id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$claveinter$id/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$claveinter$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Clave interbancaria</a>";
        }
    }
}

?>
</div>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">

<?php
$compdomicilio = 'documentocurp';
$path = "../talent/documentos/" . $compdomicilio . $id;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$compdomicilio$id/$archivo' width='100' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$compdomicilio$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>CURP</a>";
        }
    }
}
$compdomicilio = 'comprobantedomicilio';
                $path = "../talent/documentos/" . $compdomicilio . $id;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                            echo "<iframe src='../talent/documentos/$compdomicilio$id/$archivo' width='100' height='220' margin-top='50' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Comprobante de domicilio</a>";
                        }
                    }
                }
                ?>
</div>
<strong>Comprobante de domicilio</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">

<?php
$compdomicilio = 'comprobante media superior';
                $path = "../talent/documentos/" . $compdomicilio . $id;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$id/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Certificado media superior</a>";
                        }
                    }
                }
                ?>
</div>
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
    
    $archivonombre = $dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistroe['id_empleado'];
    $path = '../talent/documentos/'.$archivonombre.$id_user. '/';
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$archivonombre$id_user/$archivo' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='../talent/documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                //echo "<a href='eliminarDocumentacion/eliminarCedSuperior?titulo=$archivonombre&id=$id_user&archivo=$archivo'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
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
    
    $archivonombre = $dataRegistroMaestria['nombreformacionmaestria'];
    $id_user = $dataRegistroMaestria['id_empleado'];
                $path = "../talent/documentos/" . $archivonombre . $id_user;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$archivonombre$id_user/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
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
                    
                    $archivonombre = $dataRegistroEspecialidad['nombreformacionacademica'];
                    $id_user = $dataRegistroEspecialidad['id_empleado'];
    $path = "../talent/documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$archivonombre$id_user/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$archivonombre$id_user  /$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
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
        
        $archivonombre = $dataRegistroDoctorado['nombreformaciondoctorado'];
        $id_user = $dataRegistroDoctorado['id_empleado'];
    $path = "../talent/documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$archivonombre$id_user/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    endforeach
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
        
        $archivonombre = $dataRegistroAltaEsp['nombreformacionaltaesp'];
        $id_user = $dataRegistroAltaEsp['id_postulado'];
    $path = "../talent/documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$archivonombre$id_user/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
endforeach;
                ?>
                </div>
                <strong>Documentos otros estudios alta epecialidad</strong>

            
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento servicio social';
    $path = "../talent/documentos/" . $compdomicilio . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$compdomicilio$id_user/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$compdomicilio$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
<strong>Documento servicio social</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento practicas profesionales';
    $path = "../talent/documentos/" . $compdomicilio . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$compdomicilio$id_user/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$compdomicilio$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
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
    $compdomicilio = 'documento exp laboral primero 1';
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
    $compdomicilio = 'documento exp laboral primero 2';
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
                <strong>Exp laboral sector privado</strong>
                
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico primero 1';
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
    $compdomicilio = 'documento exp laboral publico primero 2';
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
                <strong>Exp laboral sector publico primero</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico segundo 1';
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
    $compdomicilio = 'documento exp laboral publico segundo 2';
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
                <strong>Exp laboral sector publico segundo</strong>
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico tercero 1';
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
    $compdomicilio = 'documento exp laboral publico tercero 2';
    $path = "../talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento maestria 2</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector publico tercero</strong>
