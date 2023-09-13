<?php 
$curp = $_POST['id'];
?>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 60px; padding: 10px;">

<?php
$compdomicilio = 'documentocurp';
$path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
if (file_exists($path)) {
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>CURP</a>";
        }
    }
}
?>

<?php
$compdomicilio = 'comprobantedomicilio';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' margin-top='50' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Comprobante de domicilio</a>";
                        }
                    }
                }
                ?>
</div>
<strong>Comprobantes personales</strong>
<div class="col-md-6" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">

<?php
$compdomicilio = 'comprobante media superior';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Certificado media superior</a>";
                        }
                    }
                }
                ?>
</div>
<strong>Documento de media superior</strong>
<div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
<?php
    $compdomicilio = 'comprobante superior';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Titulo superior</a>";
                        }
                    }
                }

    $compdomicilio = 'cedula superior';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe><br>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Cedula superior</a>";
                        }
                    }
                }
                ?>
                
                </div>
    <strong>Documentos superior</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
                $compdomicilio = 'comprobante maestria';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                $compdomicilio = 'cedula maestria';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
    </div>
    <strong>Documentos maestria</strong>
    <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'comprobante maestria dos';
    $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    $compdomicilio = 'cedula maestria dos';
                $path = "../reestructuracionpaginawebhraei/documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' width='170' height='220' class='form-control'></iframe>";
                            echo "<a href='../reestructuracionpaginawebhraei/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
                        }
                    }
                }
                ?>
                </div>
                <strong>Documentos segunda maestria</strong>
            
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral primero 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    $compdomicilio = 'documento exp laboral primero 2';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector privado primero</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral segundo 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
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

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector privado segundo</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral tercero 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
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

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector privado tercero</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico primero 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    $compdomicilio = 'documento exp laboral publico primero 2';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector publico primero</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico segundo 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    $compdomicilio = 'documento exp laboral publico segundo 2';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector publico segundo</strong>
                <div class="col-md-12" style="border: 1px solid #F0F0F0; display: flex; margin-top: 20px; padding: 10px;">
                <?php
    $compdomicilio = 'documento exp laboral publico tercero 1';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Ver</a>";
            }
        }
    }
    $compdomicilio = 'documento exp laboral publico tercero 2';
    $path = "talent/documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='talent/documentos/$compdomicilio$curp/$archivo' width='170' height='220'class='form-control' ></iframe>";
                echo "<a href='talent/documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento maestria 2</a>";
            }
        }
    }
                ?>
                </div>
                <strong>Exp laboral sector publico tercero</strong>