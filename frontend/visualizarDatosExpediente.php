<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
<link rel="stylesheet" href="iconos/css/all.css?n=1">
<div id="mensaje"></div>
<h1 style="text-align: center; font-size: 25px;">Documentos expediente</h1>
<input type="hidden" id="numempleado" value="<?php echo $row['Empleado'] ?>">
<input type="hidden" id="correo" value="<?php echo $row['correo'] ?>">

<a href="#" class="form-control" style="width: 125px; background: yellowgreen;" onclick="academicos();">Validar Datos</a>
<!DOCTYPE html>
<html lang="es">

</head>

<body style="padding: 0px;">

    <?php
    $nombremediosuperior = $row['nombreformacionmedia'];
    $nombreinstitucionmediosup = $row['nombremediasuperior'];
    $correo = $_POST['correo'];
    require 'conexionRh.php';
    $sql = $conexionRh->prepare("SELECT plantillahraei.*, datospersonales.* FROM plantillahraei inner join datospersonales on datospersonales.id_empleado = plantillahraei.Empleado where plantillahraei.correo = :correo");
    $sql->execute(array(
        ':correo' => $correo
    ));
    $row = $sql->fetch();
    $identificador = $row['Empleado'];
    $validaid = $row['id_datopersonal'];
    $nss = $row['NSS'];
    $banco = $row['NombreBanco'];
    $cuenta = $row['CuentaClabe'];
    $nacionalidad = $row['nacionalidad'];
    $calle = $row['calle'];
    $numexte = $row['numeroexterior'];
    $numint = $row['numerointerior'];
    $cp = $row['codigopostal'];
    $colonia = $row['colonia'];
    $telcasa = $row['telefonocasa'];
    $telcel = $row['telefonocelular'];
    $fechanacimiento = $row['fechanacimiento'];
    $edad = $row['edad'];
    $sexo = $row['genero'];
    $tiposangre = $row['tipodesangre'];
    $nombreemergencia = $row['nombreemergencia'];
    $telefonoemergencia = $row['telefonoemergencia'];
    $parentezcoemergencia = $row['parentescoemergencia'];
    $otrotel = $row['otrotelefono'];
    $localidad = $row['localidad'];
    $numerocartillamilitar = $row['numerocartillamilitar'];
    $cartanaturalizacion = $row['cartanaturalizacion'];
    $estado = $row['estado'];
    $municipio = $row['municipio'];
    $datocurp = $row['CURP'];
    $sql = $conexionRh->prepare("SELECT t_estado.estado from t_estado where id_estado = :id_estado");
    $sql->execute(array(
        ':id_estado' => $estado
    ));
    $rowestado = $sql->fetch();
    $estadovive = $rowestado['estado'];

    $sql = $conexionRh->prepare("SELECT municipio from t_municipio where id_municipio = :id_municipio");
    $sql->execute(array(
        ':id_municipio' => $municipio
    ));
    $rowmunicipio = $sql->fetch();
    $municipiovive = $rowmunicipio['municipio'];

    $curp = $row['CURP'];
    $rest = substr($curp, -7, 2);

    $sql = $conexionRh->prepare("SELECT Estado from codigoestadosmexico where RENAPO = :RENAPO");
    $sql->execute(array(
        ':RENAPO' => $rest
    ));
    $obj = $sql->fetch();
    $entidadnacimiento = $obj['Estado'];
    ?>
        <div id="cabeceras">
            <h1 style="font-size:18px; background-color:#448499;">Expediente anterior</h1>
        </div>
        <?php
        /*
$zip = new \ZipArchive();

//abrimos el archivo y lo preparamos para agregarle archivos
$zip->open("nombreArchivo.zip", \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

//indicamos cual es la carpeta que se quiere comprimir
$origen = realpath("expedienteanterior/" . $identificador);

//Ahora usando funciones de recursividad vamos a explorar todo el directorio y a enlistar todos los archivos contenidos en la carpeta
$files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($origen),
            \RecursiveIteratorIterator::LEAVES_ONLY
);

//Ahora recorremos el arreglo con los nombres los archivos y carpetas y se adjuntan en el zip
foreach ($files as $name => $file)
{
   if (!$file->isDir())
   {
       $filePath = $file->getRealPath();
       $relativePath = substr($filePath, strlen($origen) + 1);

       $zip->addFile($filePath, $relativePath);
   }
}

//Se cierra el Zip
$zip->close();
*/
        ?>
        

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Expediente(click para ocultar/ver)
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <form id="actualizarExpediente" name="actualizarExpediente" enctype="multipart/form-data"> 
                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
                            <?php
                            
                            obtener_estructura_directorios("expedienteanterior/" . $identificador);
                            function obtener_estructura_directorios($ruta)
                            {
                                if (is_dir($ruta)) {
                                    // Abre un gestor de directorios para la ruta indicada
                                    $gestor = opendir($ruta);
                                    
                                    echo "<ul>";

                                    // Recorre todos los elementos del directorio
                                    while (($archivo = readdir($gestor)) !== false) {

                                        $ruta_completa = $ruta . "/" . $archivo;

                                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                                        if ($archivo != "." && $archivo != "..") {
                                            // Si es un directorio se recorre recursivamente
                                            if (is_dir($ruta_completa)) {
                                            
                                                echo "<li>" . $archivo . "</li>";
                                                obtener_estructura_directorios($ruta_completa);
                                                $path = $ruta_completa;
                                                if (file_exists($path)) {
                                                    $directorio = opendir($path);
                                                    while ($archivos = readdir($directorio)) {
                                                        if (!is_dir($archivos)) {
                                                            
                                                              //echo "<iframe src='$ruta_completa/$archivos' class='form-control' style='height: 300px;'></iframe>";
                                                                echo "<div data='" . $path . "/" . $archivos . "' class='form-control'><a href='" . $path . "/" . $archivos . "' target='_blank' >$archivos</a></div><br>";
                                                                
                                                        }
                                                    }
                                                

                                                }
                                            }
                                        }
                                    }



                                    // Cierra el gestor de directorios
                                    closedir($gestor);
                                    echo "</ul>";
                                
                                } else {
                                    echo "No es una ruta de directorio valida<br/>";
                                }
                                
                            }
                            
                            ?>

                        
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div id="cabeceras">
            <h1 style="font-size:18px; background-color:#448499;">Expediente actual</h1>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Datos personales(click para ocultar/ver)
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
        <div class="form-row">
        <div id="cabeceras">
            <h1 style="font-size:18px; background-color:chocolate;">Datos personales</h1>
        </div>
            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                <strong>Constancia</strong>
                <?php
                $identificador;
                $acteconomica = 'actividad economica';
                $path = "documentos/" . $identificador . '/' . $acteconomica . '.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                        echo "<iframe src='documentos/$identificador/$acteconomica.pdf' class='form-control' style='height: 150px;'></iframe>";
                        echo "<a href='documentos/$identificador/$acteconomica.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                        echo "<a href='aplicacion/eliminarDocumento?titulo=$acteconomica&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
                    }
                }

                ?>
            </div>

            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                <strong>INE</strong>
                <?php
                $identificador;
                $ine = 'ine';
                $path = "documentos/" . $identificador . '/' . $ine . '.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                        echo "<iframe src='documentos/$identificador/$ine.pdf' class='form-control' style='height: 150px;'></iframe>";
                        echo "<a href='documentos/$identificador/$ine.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                        echo "<a href='aplicacion/eliminarDocumento?titulo=$ine&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
                    }
                }

                ?>
            </div>


            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                <strong>Firma electronica</strong>
                <?php
                $identificador;
                $firmaelectronica = 'firma electronica';
                $path = "documentos/" . $identificador . '/' . $firmaelectronica . '.rar';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                        //echo "<iframe src='documentos/$firmaelectronica$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                        echo "<a href='documentos/$identificador/$firmaelectronica.rar' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar' class='fas fa-file-archive' style='font-size: 25px;'></i></a>";
                        echo "<a href='aplicacion/eliminarFirmaElectronica?titulo=$firmaelectronica&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
                    }
                }
                ?>
            </div>

            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                <strong>Clave interbancaria</strong>
                <?php
                $identificador;
                $claveinter = 'clave interbancaria';
                $path = "documentos/" . $identificador . '/' . $claveinter . '.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                        echo "<iframe src='documentos/$identificador/$claveinter.pdf' class='form-control' style='height: 150px;'></iframe>";
                        echo "<a href='documentos/$identificador/$claveinter.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                        echo "<a href='aplicacion/eliminarDocumento?titulo=$claveinter&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
                    }
                }

                ?>
            </div>

            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                <strong>Acta de matrimonio</strong>
                <?php
                $identificador;
                $actamatrimonio = 'acta de matrimonio';
                $path = "documentos/" . $identificador . '/' . $actamatrimonio . '.pdf';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    $archivo = readdir($directorio);
                    if (!is_dir($archivo)) {
                        echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                        echo "<iframe src='documentos/$identificador/$actamatrimonio.pdf' class='form-control' style='height: 150px;'></iframe>";
                        echo "<a href='documentos/$identificador/$actamatrimonio.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                        echo "<a href='aplicacion/eliminarDocumento?titulo=$actamatrimonio&id=$identificador'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
                    }
                }

                ?>
            </div>
            <div class="col-md-6">

            </div>
            
            
            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                <strong>Vista CURP</strong>
                <?php
                $archivo = "Comprobante CURP";

                $path = "documentoscurp/" . $datocurp . $identificador;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentoscurp/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                            echo "<a href='documentoscurp/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }
                clearstatcache();
                ?>
            </div>

            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                <strong>Vista acta nacimiento</strong>
                <?php
                $archivo = "Comprobante acta nacimiento";

                $path = "documentosactanacimiento/" . $identificador . '/';
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentosactanacimiento/$identificador/$archivo' class='form-control'></iframe>";
                            echo "<a href='documentosactanacimiento/$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }
                clearstatcache();
                ?>
            </div>

            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                <strong>Vista Cartilla</strong>
                <?php
                $archivo = "Cartilla militar";

                $path = "documentoscartilla/" . $datocurp . $identificador;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentoscartilla/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                            echo "<a href='documentoscartilla/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }
                clearstatcache();
                ?>
            </div>

            <div class="col-md-3" style="border: 1px solid #F0F0F0;">
                <strong>Vista Comp Domicilio</strong>
                <?php

                $archivo = "Comprobante domicilio";

                $path = "documentoscomprobantedomicilio/" . $datocurp . $identificador;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentoscomprobantedomicilio/$datocurp$identificador/$archivo' class='form-control'></iframe>";
                            echo "<a href='documentoscomprobantedomicilio/$datocurp$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }
                clearstatcache();
                ?>
            </div>

            <?php
            $sqlhijos  = $conexionRh->prepare("SELECT hijos.id_empleado FROM hijos where id_empleado = $identificador ");
            $sqlhijos->execute();
            $sqlhijos = $conexionRh->prepare("SELECT FOUND_ROWS()");
            $sqlhijos->execute();
            $total_registro = $sqlhijos->fetchColumn();

            $sql = $conexionRh->prepare("SELECT * from hijos where id_empleado = :id_empleado");
            $sql->execute(array(
                ':id_empleado' => $identificador
            ));

            ?>

            <?php
            while ($rows = $sql->fetch()) {
                $valor = $rows['id_hijo'];

                $edadhijo = $rows['edadhijo'];
            ?>
                <div id="cabeceras">
                    <h1 style="font-size:18px; background-color:chocolate;">Datos hijos</h1>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">CURP:</label>
                    <input type="text" class="form-control" name="curphijo[]" id="curphijo[]" value="<?php echo $rows['curphijo'] ?>" maxlength="18">
                </div>

                <div class="col-md-5" style="border: 1px solid #F0F0F0;">
                    <strong>Vista CURP Hijo</strong>
                    <?php
                    $idhijo = $rows['nombrecompletohijo'];
                    $archivo = "Comprobante hijo";

                    $path = "documentoshijos/" . $idhijo . $identificador;
                    if (file_exists($path)) {
                        $directorio = opendir($path);
                        while ($archivo = readdir($directorio)) {
                            if (!is_dir($archivo)) {
                                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                echo "<iframe src='documentoshijos/$idhijo$identificador/$archivo' class='form-control'></iframe>";
                                echo "<a href='documentoshijos/$idhijo$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                            }
                        }
                    }
                    clearstatcache();
                    ?>
                </div>
            <?php } ?>
            </div>
                </div>
            </div>
        </div>
            <script>
                function academicos() {
                    let id = $("#numempleado").val();
                    let correovalido = $("#correousuario").val();
                    let ob = {
                        id: id,
                        correovalido: correovalido
                    };
                    $.ajax({
                        type: "POST",
                        url: "aplicacion/validarDatosAcademicos.php",
                        data: ob,
                        beforeSend: function() {
                            $('#mensaje').html(
                                '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                            );
                        },
                        success: function(data) {

                            $("#mensaje").html(data);

                            let evento = $("#numempleado").val();
                            let ob = {
                                evento: evento
                            };
                            $.ajax({
                                type: "POST",
                                url: "consultaplantillahraei.php",
                                data: ob,
                                beforeSend: function() {
                                    $('#mensaje').html(
                                        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                                    );
                                },
                                success: function(data) {

                                    $("#tabla_resultadobus").html(data);
                                    let id = $("#numempleado").val();
                                    let ob = {
                                        id: id
                                    };
                                    $.ajax({
                                        type: "POST",
                                        url: "consultaBusquedaPlantillaHraei.php",
                                        data: ob,
                                        beforeSend: function() {
                                            $('#mensaje').html(
                                                '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                                            );
                                        },
                                        success: function(data) {

                                            $("#tabla_resultado").html(data);

                                        }

                                    });

                                }

                            });

                        }

                    });
                }
            </script>

            <form name="datosacademicosactualizar" id="datosacademicosactualizar" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
                <style>
                    iframe {
                        width: 15rem;
                        height: 15rem;
                    }
                </style>

                
                    <div id="cabeceras">
                        <h1 style="font-size:18px; background-color:chocolate;">Datos Academicos</h1>
                    </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                        Datos academicos(click para ocultar/ver)
                    </button>
                </h2>
                <div id="collapseTree" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <div class="form-row">
                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Nivel Medio Superior</h1>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre de la formación académica</label>
                        <input type="text" id="nombreformacionmedia" name="nombreformacionmedia" autocomplete="off" class="form-control" value="<?php echo $nombremediosuperior; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre de la institución educativa</label>
                        <input type="text" id="nombremediasuperior" name="nombremediasuperior" autocomplete="off" class="form-control" value="<?php echo $nombreinstitucionmediosup; ?>">
                    </div>
                    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                        <strong>Documento</strong>
                        <?php
                        clearstatcache();

                        $path = "documentosmediasup/" . $nombremediosuperior . $identificador;
                        if (file_exists($path)) {
                            $directorio = opendir($path);
                            while ($archivo = readdir($directorio)) {
                                if (!is_dir($archivo)) {
                                    echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                    echo "<iframe src='documentosmediasup/$nombremediosuperior$identificador/$archivo' class='form-control'></iframe>";
                                    echo "<a href='documentosmediasup/$nombremediosuperior$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                }
                            }
                        }

                        ?>
                    </div>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();

                    $sqlt = $conexionX->prepare("SELECT * from estudiostecnico where id_empleado = :id_empleado");
                    $sqlt->execute(array(
                        ':id_empleado' => $identificador
                    ));
                    $rowt = $sqlt->fetch();
                    ?>
                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Nivel tecnico</h1>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre de la formación académica</label>
                        <input type="text" id="nombreinstituciontecnica" name="nombreinstituciontecnica" autocomplete="off" class="form-control" value="<?php echo $rowt['nombreinstituciontecnica'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre de la institución educativa</label>
                        <input type="text" id="nombreformaciontecnica" name="nombreformaciontecnica" autocomplete="off" class="form-control" value="<?php echo $rowt['nombreformaciontecnica'] ?>">
                    </div>

                    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                        <strong>Documento titulo</strong>
                        <?php
                        clearstatcache();
                        $tecnica = $rowt['nombreformaciontecnica'];
                        $path = "documentostecnica/" . $tecnica . $identificador;
                        if (file_exists($path)) {
                            $directorio = opendir($path);
                            while ($archivo = readdir($directorio)) {
                                if (!is_dir($archivo)) {
                                    echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";
                                    echo "<iframe src='documentostecnica/$tecnica$identificador/$archivo' class='form-control'></iframe>";
                                    echo "<a href='documentostecnica/$tecnica$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                }
                            }
                        }

                        ?>
                    </div>
                    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                        <strong>Documento cedula</strong>
                        <?php
                        clearstatcache();
                        $tecnicacedula = $rowt['nombreformaciontecnica'];

                        $path = "documentostecnicacedula/" . $tecnicacedula . $identificador;
                        if (file_exists($path)) {
                            $directorio = opendir($path);
                            while ($archivo = readdir($directorio)) {
                                if (!is_dir($archivo)) {
                                    echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                    echo "<iframe src='documentostecnicacedula/$tecnicacedula$identificador/$archivo' class='form-control'></iframe>";
                                    echo "<a href='documentostecnicacedula/$tecnicacedula$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                }
                            }
                        }
                        ?>
                    </div>
                    <!--inicia postecnico -->
                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Nivel postecnico</h1>
                    </div>

                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentariosP  = $conexionX->prepare("SELECT estudiospostecnico.id_empleado FROM estudiospostecnico where id_empleado = $identificador ");
                    $sqlQueryComentariosP->execute();
                    $sqlQueryComentariosP = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentariosP->execute();
                    $total_registroP = $sqlQueryComentariosP->fetchColumn();

                    $sqlP = $conexionX->prepare("SELECT * from estudiospostecnico where id_empleado = :id_empleado");
                    $sqlP->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rowsP = $sqlP->fetch()) {
                        $valorP = $rowsP['id_postecnico'];
                    ?>
                        <div id="cabeceras">
                            <h1 style="font-size:18px;">Datos postecnico</h1>
                        </div>
                        <div class="form-row">

                            <input type="hidden" name="id_carrera" value="<?php echo $valorP ?>">
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica</label>
                                <input type="text" id="nombreformacionPostecnico" name="nombreformacionPostecnico[]" class="form-control" value="<?php echo $rowsP['nombreformacionpostecnico']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstitucionPostecnico" name="nombreinstitucionPostecnico[]" class="form-control" value="<?php echo $rowsP['nombreinstitucionpostecnico'] ?>">
                            </div>
                            <div class="col-md-4" style="border: 1px solid #F0F0F0;">
                                <strong>Documento postecnico</strong>
                                <?php
                                clearstatcache();
                                $postecnico = $rowsP['nombreformacionpostecnico'];

                                $path = "documentospostecnico/" . $postecnico . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentospostecnico/$postecnico$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentospostecnico/$postecnico$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>

                        </div>

                    <?php  } ?>


                    <!--inicia licenciatura -->
                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Nivel Superior</h1>
                    </div>

                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentarios  = $conexionX->prepare("SELECT estudiossuperior.id_empleado FROM estudiossuperior where id_empleado = $identificador ");
                    $sqlQueryComentarios->execute();
                    $sqlQueryComentarios = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentarios->execute();
                    $total_registro = $sqlQueryComentarios->fetchColumn();

                    $sql = $conexionX->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
                    $sql->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rows = $sql->fetch()) {
                        $valor = $rows['id_superior'];

                    ?>

                        <div id="cabeceras">
                            <h1 style="font-size:18px;">Datos Licenciatura</h1>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica</label>
                                <input type="text" id="nombreformacion" name="nombreformacion[]" class="form-control" value="<?php echo $rows['nombreformacionsuperior']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstitucion" name="nombreinstitucion[]" class="form-control" value="<?php echo $rows['nombresuperior'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento titulo</strong>
                                <?php
                                clearstatcache();
                                $licenciatura = $rows['nombreformacionsuperior'];

                                $path = "documentoslicenciatura/" . $licenciatura . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentoslicenciatura/$licenciatura$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentoslicenciatura/$licenciatura$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento cedula</strong>
                                <?php
                                clearstatcache();
                                $licenciatura = $rows['nombreformacionsuperior'];

                                $path = "documentoscedulalicenciatura/" . $licenciatura . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentoscedulalicenciatura/$licenciatura$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentoscedulalicenciatura/$licenciatura$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    <?php  } ?>


                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Nivel Maestria</h1>
                    </div>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentariosm  = $conexionX->prepare("SELECT estudiosmaestria.id_empleado FROM estudiosmaestria where id_empleado = $identificador ");
                    $sqlQueryComentariosm->execute();
                    $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentariosm->execute();
                    $total_registrom = $sqlQueryComentariosm->fetchColumn();

                    $sqlm = $conexionX->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
                    $sqlm->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rowm = $sqlm->fetch()) {
                        $valorm = $rowm['id_maestria'];

                    ?>
                        <div id="cabeceras">
                            <h1 style="font-size:18px;">Datos Maestria</h1>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica</label>
                                <input type="text" id="nombreformacionmaestria" name="nombreformacionmaestria[]" class="form-control" value="<?php echo $rowm['nombreformacionmaestria']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstitucionmaestria" name="nombreinstitucionmaestria[]" class="form-control" value="<?php echo $rowm['nombremaestria'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento titulo</strong>
                                <?php
                                clearstatcache();
                                $maestria = $rowm['nombreformacionmaestria'];

                                $path = "documentosmaestria/" . $maestria . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosmaestria/$maestria$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosmaestria/$maestria$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento cedula</strong>
                                <?php
                                clearstatcache();
                                $maestria = $rowm['nombreformacionmaestria'];

                                $path = "documentosmaestriacedula/" . $maestria . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosmaestriacedula/$maestria$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosmaestriacedula/$maestria$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    <?php  }
                    ?>

                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Posgrado/Especialidad</h1>
                    </div>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentariosm  = $conexionX->prepare("SELECT especialidad.id_empleado FROM especialidad where id_empleado = $identificador ");
                    $sqlQueryComentariosm->execute();
                    $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentariosm->execute();
                    $total_registrom = $sqlQueryComentariosm->fetchColumn();

                    $sqlm = $conexionX->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
                    $sqlm->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rowm = $sqlm->fetch()) {
                        $valorm = $rowm['id_especialidad'];
                    ?>
                        <div id="cabeceras">
                            <h1 style="font-size:18px;">Datos Posgrado/Especialidad</h1>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica</label>
                                <input type="text" id="nombreformacionposgradoespecialidad" name="nombreformacionposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['nombreformacionacademica']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstitucionposgradoespecialidad" name="nombreinstitucionposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['nombreinstitucion'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Titulo</strong>
                                <?php
                                clearstatcache();
                                $posgrado = $rowm['nombreformacionacademica'];

                                $path = "documentosposgradoesp/" . $posgrado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Cedula</strong>
                                <?php
                                clearstatcache();
                                $posgrado = $rowm['nombreformacionacademica'];

                                $path = "documentoscedulaposgradoesp/" . $posgrado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentoscedulaposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentoscedulaposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de vigencia inicio certificado</label>
                                <input type="date" id="fechainiciocertificadosupposgradoespecialidad" name="fechainiciocertificadosupposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['fechacertificadoinicio'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de vigencia termino certificado</label>
                                <input type="date" id="fechaterminocertificadosupposgradoespecialidad" name="fechaterminocertificadosupposgradoespecialidad[]" class="form-control" value="<?php echo $rowm['fechacertificadotermino'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Certificado consejo</strong>
                                <?php
                                clearstatcache();
                                $posgrado = $rowm['nombreformacionacademica'];

                                $path = "documentoscertificadoposgradoesp/" . $posgrado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentoscertificadoposgradoesp/$posgrado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentoscertificadoposgradoesp/$posgrado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    <?php  } ?>

                    <div id="cabeceras">
                        <h1 style="font-size:18px;">Doctorado/Subespecialidad</h1>
                    </div>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentariosm  = $conexionX->prepare("SELECT doctorado.id_empleado FROM doctorado where id_empleado = $identificador ");
                    $sqlQueryComentariosm->execute();
                    $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentariosm->execute();
                    $total_registrom = $sqlQueryComentariosm->fetchColumn();

                    $sqld = $conexionX->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
                    $sqld->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rowd = $sqld->fetch()) {
                        $valord = $rowd['id_doctorado'];
                    ?>
                        <div id="cabeceras">
                            <h1 style="font-size:18px;">Datos Doctorado</h1>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica</label>
                                <input type="text" id="nombreformaciondoctorado" name="nombreformaciondoctorado[]" class="form-control" value="<?php echo $rowd['nombreformaciondoctorado']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstituciondoctorado" name="nombreinstituciondoctorado[]" class="form-control" value="<?php echo $rowd['nombreinstituciondoctorado'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento titulo</strong>
                                <?php
                                clearstatcache();
                                $doctorado = $rowd['nombreformaciondoctorado'];

                                $path = "documentosdoctorado/" . $doctorado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosdoctorado/$doctorado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosdoctorado/$doctorado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento cedula</strong>
                                <?php
                                clearstatcache();
                                $doctorado = $rowd['nombreformaciondoctorado'];

                                $path = "documentosdoctoradocedula/" . $doctorado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosdoctoradocedula/$doctorado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosdoctoradocedula/$doctorado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    <?php  } ?>

                    <div id="cabeceras" style="background-color:chocolate;">
                        <h1 style="font-size:18px;">Diplomados</h1>
                    </div>
                    <?php
                    require_once 'clases/conexion.php';
                    $conexionX = new ConexionRh();
                    $sqlQueryComentariosm  = $conexionX->prepare("SELECT diplomado.id_empleado FROM diplomado where id_empleado = $identificador ");
                    $sqlQueryComentariosm->execute();
                    $sqlQueryComentariosm = $conexionX->prepare("SELECT FOUND_ROWS()");
                    $sqlQueryComentariosm->execute();
                    $total_registrom = $sqlQueryComentariosm->fetchColumn();

                    $sqld = $conexionX->prepare("SELECT * from diplomado where id_empleado = :id_empleado");
                    $sqld->execute(array(
                        ':id_empleado' => $identificador
                    ));

                    ?>

                    <?php
                    while ($rowd = $sqld->fetch()) {
                        $valord = $rowd['id_diplomado'];
                    ?>
                        <div id="cabeceras">
                            <h1 style="font-size:18px;" style="background-color: #448499;">Datos Diplomado</h1>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Nombre del diplomado</label>
                                <input type="text" id="nombreformaciondiplomado" name="nombreformaciondiplomado[]" class="form-control" value="<?php echo $rowd['nombreDiplomado'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa</label>
                                <input type="text" id="nombreinstituciondiplomado" name="nombreinstituciondiplomado[]" class="form-control" value="<?php echo $rowd['nombreInstitucion'] ?>">
                            </div>
                            <div class="col-md-6" style="border: 1px solid #F0F0F0;">
                                <strong>Documento diplomado</strong>
                                <?php
                                clearstatcache();
                                $diplomado = $rowd['nombreDiplomado'];
                                $nameFile = "Diploma diplomado";
                                $path = "documentosdiplomados/$identificador/" . $diplomado . $identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                                            echo "<iframe src='documentosdiplomados/$identificador/$diplomado$identificador/$archivo' class='form-control'></iframe>";
                                            echo "<a href='documentosdiplomados/$identificador/$diplomado$identificador/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="cabeceras">
            <h1 style="font-size:18px; background-color:chocolate;">Cursos</h1>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        Cursos(click para ocultar/ver)
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
        <div class="form-row">
        <div id="cabeceras">
            <h1 style="font-size:18px;">Cursos</h1>
        </div>
        <div class="container" style="width: 100%; overflow-x:scroll; margin-top: 15px;">
        <?php
        error_reporting(0);
        require_once 'clases/conexion.php';
        $conexionX = new ConexionRh();

        $sql = $conexionX->prepare("SELECT id,nombrecurso,catalogoprograma,lineaestrategica,competenciaalieandaeje,id_empleado,fechacriteriotermino,fechacriterioinicio,criteriocurso,fechainicio,fechatermino,modalidad,horas,asistecomo,nombreinstitucion,otroexpidedocumento,tipocapacitacion,documentorecibe, EXTRACT(YEAR 
        FROM fechatermino) as anio from datos where id_empleado = $identificador and validaautorizacion = 1 order by id desc");
        $sql->execute();

        ?>

        <table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover">
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Horas</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Impartido por el HRAEI</th>
                    <th>Nombre institucion externo</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($dataRegistro = $sql->fetch()) {
                    $valor = $dataRegistro['id'];
                    $nombrecurso = $dataRegistro['nombrecurso'];
                    $fechatermino = $dataRegistro['fechatermino'];
                    $id_empleado = $dataRegistro['id_empleado'];
                ?>
                    <tr>
                        <td><?php echo $dataRegistro['anio'] ?></td>
                        <td><?php echo $dataRegistro['tipocapacitacion'] ?></td>
                        <td><?php echo $dataRegistro['nombrecurso'] ?></td>
                        <td><?php echo $dataRegistro['horas'] ?></td>
                        <td><?php echo $dataRegistro['fechainicio'] ?></td>
                        <td><?php echo $dataRegistro['fechatermino'] ?></td>
                        <td><?php echo $dataRegistro['nombreinstitucion'] ?></td>
                        <td><?php echo $dataRegistro['otroexpidedocumento'] ?></td>
                        <td><?php
    $path = "documentoscursos/".$nombrecurso.$fechatermino.$id_empleado;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                echo "<a href='documentoscursos/$nombrecurso$fechatermino$id_empleado/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i>Documento cargado</a>";
            }
        }
    }
    
    ?></td>
                        <td><?php echo $dataRegistro['documentorecibe'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                <th>Año</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Horas</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Impartido por el HRAEI</th>
                    <th>Nombre institucion externo</th>
                    <th>Ver documento</th>
                    <th>Documento recibe</th>

                </tr>
            </tfoot>
        </table>
        
        <script>
            new DataTable('#example', {
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            let column = this;
                            let title = column.footer().textContent;

                            // Create input element
                            let input = document.createElement('input');
                            input.placeholder = title;
                            column.footer().replaceChildren(input);

                            // Event listener for user input
                            input.addEventListener('keyup', () => {
                                if (column.search() !== this.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        });
                }
            });
            $('#example tfoot tr').appendTo('#example thead');
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>

        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>