<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<form name="edicionDocumentacion" id="edicionDocumentacion" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                
                $("#edicionDocumentacion").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("edicionDocumentacion"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "editarCursoEmpleado.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(datos) {
                            $("#mensaje").html(datos);
                            let id = $("#id").val();
                                                let ob = {
                                                            id: id
                                                            };
                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaValidacionDocumentosBusqueda.php",
                                                            data: ob,
                                                            beforeSend: function() {
                                                                $('#tabla_resultado').html(
                                                                    '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
                                                                );
                                                            },
                                                        success: function(data) {

                                                            $("#tabla_resultado").html(data);
                                                    
                                                            
                                                            }
                                                            
                                                    });
                        }

                    })
                })
                
            </script>
            <div class="form-row">
        <div style="width: 100%; height: auto; background-color:  #464949; ">
            <h1 style="text-align: center; font-size: 25px; color: white;">Edición de información.</h1>
        </div>
                <div id="mensaje"></div>
                <input type="hidden" class="form-control" name="id" id="id" placeholder="N° empleado" required value="<?php echo $dataRegistro['id'] ?>" readonly>
<input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $dataRegistro['id_empleado'] ?>" readonly>
<?php

                    $tipocapacita = $dataRegistro['tipocapacitacion'];
                    $query = $conexionX->prepare("SELECT id_tipodeaccion FROM catalogocapacitacion where descripcionaccion = :descripcionaccion");
                        $query->execute(array(
                            ':descripcionaccion'=>$tipocapacita
                        ));
                        $rows = $query->fetch();
                        ?> 
                <div class="col-md-6">
                    <label for="mensaje">Tipo de capacitación:</label>
                    <select class="form-control" name="tipodecapacitacion" id="tipodecapacitacion" required onchange="tipoCapacitacion();">
                        <option value="<?php echo $rows['id_tipodeaccion'] ?>"><?php echo $dataRegistro['tipocapacitacion'] ?></option>
                        <?php
                    
                        $query = $conexionX->prepare("SELECT * FROM catalogocapacitacion where activo = 0 order by descripcionaccion");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['id_tipodeaccion']; ?>">
                                <?php echo $row['descripcionaccion']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <script>
                    function tipoCapacitacion() {
                        let valor = $("#tipodecapacitacion").val();
                        $('#areafortalece').val(valor)

                    }
                    
//clasificacion tamaños tumorales
$(document).ready(function () {

    $('#criteriocurso').change(function (e) {
        if ($(this).val() === "ATLS" || $(this).val() === "ACLS" || $(this).val() === "BLS" || $(this).val() === "PALS" || $(this).val() === "RCP" ) {

            $('#fechainiciocriterio').prop("disabled", false);
            $('#fechaterminocriterio').prop("disabled", false);
        
        } else {
            $('#fechainiciocriterio').prop("disabled", true);
            $('#fechaterminocriterio').prop("disabled", true);
            $('#fechainiciocriterio').val('');
            $('#fechaterminocriterio').val('');

        }
    })


});
$(function () {
    let criteriovalida = $('#criteriocurso').val();
    if(criteriovalida === "ATLS" || criteriovalida === "ACLS" || criteriovalida === "BLS" || criteriovalida === "PALS" || criteriovalida === "RCP"){
            $('#fechainiciocriterio').prop("disabled", false);
            $('#fechaterminocriterio').prop("disabled", false);
    }else{
        $('#fechainiciocriterio').prop("disabled", true);
        $('#fechaterminocriterio').prop("disabled", true);
    }

});
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
                </script>

                <input type="hidden" class="form-control" name="areafortalece" id="areafortalece" required readonly>

                <div class="col-md-6">
                    <label for="mensaje">Nombre del curso:</label>
                    <input type="text" class="form-control" name="nombrecurso" id="nombrecurso" placeholder="Nombre del curso" required value="<?php echo $dataRegistro['nombrecurso'] ?>" maxlength="100" onkeypress="return check(event)">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de inicio del curso:</label>
                    <input type="date" class="form-control" name="fechainicio" id="fechainicio" required value="<?php echo $dataRegistro['fechainicio'] ?>">
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Fecha de termino del curso:</label>
                    <input type="date" class="form-control" name="fechatermino" id="fechatermino" required value="<?php echo $dataRegistro['fechatermino'] ?>">
                </div>
                <div class="col-md-6">
                        <strong>¿El curso pertenece a alguno de los siguientes temas?</strong>
                        <select type="form-select" class="form-control" name="criteriocurso" id="criteriocurso" required>
                            <option value="<?php echo $dataRegistro['criteriocurso'] ?>"><?php echo $dataRegistro['criteriocurso'] ?></option>

                            <?php

                        $query = $conexionX->prepare("SELECT * FROM muec ");
                        $query->execute();
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) { ?>
                            <option value="<?php echo $row['descripcionmuec']; ?>">
                                <?php echo $row['descripcionmuec']; ?></option>
                        <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-3">
                    <strong for="mensaje">Fecha vigencia inicio:</strong>
                    <input type="date" class="form-control" name="fechainiciocriterio" id="fechainiciocriterio" value="<?php echo $dataRegistro['fechacriterioinicio'] ?>">
                </div>
                <div class="col-md-3">
                    <strong for="mensaje">Fecha vigencia final:</strong>
                    <input type="date" class="form-control" name="fechaterminocriterio" id="fechaterminocriterio" value="<?php echo $dataRegistro['fechacriteriotermino'] ?>">
                </div>
                <div class="col-md-3">
                        <label>Modalidad</label>
                        <select type="form-select" class="form-control" name="modalidad" id="modalidad" required>
                            <option selected value="<?php echo $dataRegistro['modalidad'] ?>"><?php echo $dataRegistro['modalidad'] ?></option>

                            <?php
                            $query = $conexionX->prepare("SELECT * FROM modalidad");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores) :
                                echo '<option value="' . $valores["nombre_modalidad"] . '">' . $valores["nombre_modalidad"] . '</option>';
                            endforeach;

                            ?>

                        </select>
                    </div>
                <div class="col-md-3">
                    <label for="mensaje">Total de horas:</label>
                    <input type="text" class="form-control" name="horas" id="horas" required value="<?php echo $dataRegistro['horas'] ?>">
                </div>

                <div class="col-md-3">
                    <label for="mensaje">Documento que recibe:</label>
                    <select class="form-control" name="documentorecibe" id="documentorecibe" required>
                        <option value="<?php echo $dataRegistro['documentorecibe'] ?>"><?php echo $dataRegistro['documentorecibe'] ?></option>
                        <option value="Constancia">Constancia</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Reconocimiento">Reconocimiento</option>
                        <option value="Certificado">Certificado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="mensaje">Asiste como:</label>
                    <select class="form-control" name="asistecomo" id="asistecomo" required>
                        <option value="<?php echo $dataRegistro['asistecomo'] ?>"><?php echo $dataRegistro['asistecomo'] ?></option>
                        <option value="Participante">Participante</option>
                        <option value="Ponente">Ponente</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Profesor titular">Profesor titular</option>
                        <option value="Profesor adjunto">Profesor adjunto</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#nombreinstitucion').change(function(e) {
                            if ($(this).val() === "OTRO") {

                                $('#otrodocumento').prop("hidden", false);

                        }else {
                                $('#otrodocumento').prop("hidden", true);
                                $('#otroexpidedocumento').val('');

                            }
                    
                        })
                        
                    });
                    $(function() {
                        let otrovalidacion = $("#otroexpidedocumento").val();
                            if(otrovalidacion != ''){
                                $('#otrodocumento').prop("hidden", false);
                            }else{
                                $('#otrodocumento').prop("hidden", true); 
                            }
                    })
                </script>
                <div class="col-md-9">
                    <label for="autor">Nombre la institución que lo expide:</label>
                    <select class="form-control" name="nombreinstitucion" id="nombreinstitucion" placeholder="Institución" required>
                        <option value="<?php echo $dataRegistro['nombreinstitucion'] ?>"><?php echo $dataRegistro['nombreinstitucion'] ?></option>
                        <option value="HRAEI">HRAEI</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="mensaje">Sube tu documento:</label>
                    <input type="file" class="form-control" name="documentocurso" id="documentocurso" accept=".pdf">
                </div>
                <div class="col-md-3">
    <?php
    $nombrecurso = $dataRegistro['nombrecurso'];
    $fechafinal = $dataRegistro['fechatermino'];
    $idempleado = $dataRegistro['id_empleado'];
    $path = "documentoscursos/" . $nombrecurso . $fechafinal . $idempleado;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div>";
                echo "<input type='text' class='form-control' name='documentoaeditar' value='documentoscursos/$nombrecurso$fechafinal$idempleado'>";
                echo "<input type='text' class='form-control' name='nombreaeditar' value='$archivo'>";
            }
        }
    }
    ?>
</div>
                <div class="col-md-12" id="otrodocumento">
                    <strong>Especifique cual:</strong>
                    <input type="text" class="form-control" name="otroexpidedocumento" id="otroexpidedocumento" value="<?php echo $dataRegistro['otroexpidedocumento'] ?>">
                </div>
                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                <a href="#" id="btn-send-close" onclick="window.location.href='programaCapacitacion';">Cerrar ventana</a>&nbsp;&nbsp;
                    <input type="submit" name="add" id="btn-send" value="Guardar">
                    
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
</html>

