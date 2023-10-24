<?php session_start();
$curp = $_POST['id'];
?>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$activeconomica = 'documentoactvidadeconomica';
$path = "../talent/documentos/".$activeconomica.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$activeconomica$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$activeconomica$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Constancia SAT</a>";
        }
    }
}

?>
<?php
$actanacimiento = 'documentoactanacimiento';
$path = "../talent/documentos/".$actanacimiento.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$actanacimiento$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$actanacimiento$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Acta nacimiento</a>";
        }
    }
}

?>
<?php
$ine = 'documentoine';
$path = "../talent/documentos/".$ine.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$ine$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$ine$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>INE</a>";
        }
    }
}

?>
</div>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">
<?php
$cartilla = 'documentocartilla';
$path = "../talent/documentos/".$cartilla.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$cartilla$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$cartilla$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Cartilla militar</a>";
        }
    }
}

?>
<?php
$firmaelectronica = 'documentofirmaelectonica';
$path = "../talent/documentos/".$firmaelectronica.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<div width='170' height='220' margin-top='50' class='form-control'><a href='../talent/documentos/$firmaelectronica$curp/$archivo' target='_blank'><img src='https://cdn.icon-icons.com/icons2/160/PNG/256/folder_archive_rar_22614.png' style='width: 170px; height: 150px;'></a></div>";
            echo "<a href='../talent/documentos/$firmaelectronica$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Firma electronica</a>";
        }
    }
}

?>
<?php
$claveinter = 'documentoclaveinterbancaria';
$path = "../talent/documentos/".$claveinter.$curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$claveinter$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$claveinter$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-archive'></i>Clave interbancaria</a>";
        }
    }
}

?>
</div>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">

<?php
$compdomicilio = 'documentocurp';
$path = "../talent/documentos/" . $compdomicilio . $curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='100' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>CURP</a>";
        }
    }
}
$compdomicilio = 'comprobantedomicilio';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='100' height='220' margin-top='50' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Comprobante de domicilio</a>";
                        }
                    }
                }
                ?>
</div>
<strong>Comprobante de domicilio</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">

<?php
$compdomicilio = 'comprobante media superior';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Certificado media superior</a>";
                        }
                    }
                }
                ?>
</div>
<strong>Documento de media superior</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
<?php
    $compdomicilio = 'comprobante superior';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Titulo superior</a>";
                        }
                    }
                }

    $compdomicilio = 'cedula superior';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe><br>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
                
                </div>
                <strong>Documentos superior</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
                $compdomicilio = 'comprobante maestria';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                $compdomicilio = 'cedula maestria';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
    </div>
<strong>Documentos maestria</strong>
    <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante maestria dos';
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
    $compdomicilio = 'cedula maestria dos';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
                </div>
<strong>Documentos segunda maestria</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante posgrado';
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
    $compdomicilio = 'cedula posgrado';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
                </div>
                <strong>Documentos posgrado/especialidad</strong>
<div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante doctorado';
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
    $compdomicilio = 'cedula doctorado';
                $path = "../talent/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
                </div>
                <strong>Documentos doctorado/subespecialidad</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante alta epecialidad';
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
                <strong>Documentos otros estudios alta epecialidad</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante otro estudio';
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
<strong>Documentos otros estudios 1</strong>
                <div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante otro estudio segundo';
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
<strong>Documentos otros estudios 2</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento servicio social';
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
<strong>Documento servicio social</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento practicas profesionales';
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
    $compdomicilio = 'documento certificacion dos';
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
<strong>Documento certificacion dos</strong>
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
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento actualizacion academica dos';
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
<strong>Actualizacion academica/segundo curso</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento actualizacion academica tres';
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
                <strong>Actualizacion academica/tercer curso</strong>
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
                <strong>Exp laboral sector privado primero</strong>
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral segundo 1';
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
    $compdomicilio = 'documento exp laboral segundo 2';
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
                <strong>Exp laboral sector privado segundo</strong>
                <div class="col-md-10" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral tercero 1';
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
    $compdomicilio = 'documento exp laboral tercero 2';
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
                <strong>Exp laboral sector privado tercero</strong>
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
