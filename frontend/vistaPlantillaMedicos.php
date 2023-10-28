<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
error_reporting(0);

?>


<div id="mensaje"></div>
<?php
require 'conexionRh.php';
$rol = $dataRegistro['rol'];
$rfc =   $dataRegistro['RFC'];
$id_empleado =   $dataRegistro['Empleado'];
$sql = $conexionRh->prepare("SELECT * from estructuras where id_empleado = :id_empleado");
    $sql->execute(array(
        ':id_empleado'=>$id_empleado
    ));
    $dataResult = $sql->fetch();

?>
    <input type="hidden" id="numempleado" value="<?php echo $dataRegistro['Empleado'] ?>">
    <input type="hidden" id="correo" value="<?php echo $dataRegistro['correo'] ?>">
    <input type="hidden" id="curp" value="<?php echo $rfc ?>">
    <input type="hidden" id="iniciaedicion" value="1">
    <input type="hidden" id="finalizaedicion" value="0">
    
    <?php session_start();
    if (isset($_SESSION['usuarioAdminRh']) or isset($_SESSION['usuarioJefe']) or isset($_SESSION['usuarioDatos'])) { ?>
    <ul class="nav nav-tabs" style="margin-top: 48px;" >       
            
                <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Academicos</a>
                <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                    <li><a class="dropdown-item" href="#" onclick="infoAcademica();">Datos academicos</a></li>
                </ul>
            </li>
        <?php
            };
        
            ?>
        
        
    </ul>
    
    <script>

        function editardatos() {
            var id = $("#numempleado").val();
            var editar = $("#iniciaedicion").val();
            var mensaje = confirm("Desea continuar con la edición de los datos");
            let parametros = {
                id: id,
                editar: editar
            }
            if (mensaje == true) {
                $.ajax({
                    data: parametros,
                    url: 'editarDatosback.php',
                    type: 'post',
                    success: function(datos) {
                        $("#mensaje").html(datos);
                        let id = $("#numempleado").val();
                        let ob = {
                            id: id
                        };
                        $.ajax({
                            type: "POST",
                            url: "consultaAdminBusqueda.php",
                            data: ob,

                            success: function(data) {

                                $("#tabla_resultado").html(data);
                                //$("#editarDatosPersonalescancerdeMama").modal('show');


                            }

                        });

                    }
                });
            } else {

            }
        }

        function finalizarEdicion() {
            var id = $("#numempleado").val();
            var editar = $("#finalizaedicion").val();
            var mensaje = confirm("Desea finalizar la edición de los datos");
            let parametros = {
                id: id,
                editar: editar
            }
            if (mensaje == true) {
                $.ajax({
                    data: parametros,
                    url: 'editarDatosback.php',
                    type: 'post',
                    success: function(datos) {
                        $("#mensaje").html(datos);
                        let id = $("#numempleado").val();
                        let ob = {
                            id: id
                        };
                        $.ajax({
                            type: "POST",
                            url: "consultaAdminBusqueda.php",
                            data: ob,

                            success: function(data) {

                                $("#tabla_resultado").html(data);
                                //$("#editarDatosPersonalescancerdeMama").modal('show');


                            }

                        });

                    }
                });
            } else {

            }
        }

        function editardatospersonales() {
            let id = $("#numempleado").val();
            let ob = {
                id: id
            };
            $.ajax({
                type: "POST",
                url: "modal/editarDatosEmpleado2022.php",
                data: ob,

                success: function(data) {

                    $("#editadatospersonales").html(data);


                }

            });
        }
        function infoAcademica() {
            let correo = $("#correo").val();
            let ob = {
                correo: correo
            };
            $.ajax({
                type: "POST",
                url: "verDatosAcademicos.php",
                data: ob,

                success: function(data) {

                    $("#tabla_resultado").html(data);


                }

            });
        }
    </script>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >

    <div class="containerr2">Datos Personales</div>
    <tr>
        <th id="th">N° trabajador:</th>
        <td id="td"><?php echo $dataRegistro['Empleado'] ?></td>
    </tr>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['Nombre']?>
        <?php 
        $path = "imagenesPerfiles/" . $id_empleado;
        if (file_exists($path)) {
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/$id_empleado/$archivo' style='width: 150px; height: 150px; border-radius: 20px 20px 20px 20px; cursor: pointer; float: right; margin-right: 11px; '>";
                }
            }
        }else{
            $path = "imagenesPerfiles/fotodefault";
            $directorio = opendir($path);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    echo "<img src='imagenesPerfiles/fotodefault/perfil.jpg' style='width: 150px; height: 150px; border-radius: 20px 20px 20px 20px; cursor: pointer; float: right; margin-right: 11px; '>";
                }else{
                    
                }
            }
        }
        clearstatcache();
        ?>
    </td>
    </tr>
    <tr>
        <th id="th">Puesto:</th>
        <td id="td"><?php echo $dataRegistro['DescripcionPuesto'] ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Correo electronico:</th>
        <td id="td"><?php echo $dataRegistro['correo'] ?></td>
    </tr>
    <tr>
        <th id="th">RFC:</th>
        <td id="td"><?php echo $dataRegistro['RFC'] ?></td>
    </tr>
    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['CURP'] ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Tipo de servidor:</th>
        <td id="td"><?php echo $dataRegistro['EstatusPlaza'] ?></td>
    </tr>
    
    <tr>
        <th id="th">Area de adscripción:</th>
        <td id="td"><?php echo $dataRegistro['DescripcionAdscripcion'] ?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >

    <div class="containerr3">Jornada</div>
    <tr>
        <th id="th">Turno:</th>
        <td id="td"><?php echo $dataRegistro['Turno'] ?></td>
    </tr>
    <tr>
        <th id="th">Jornada:</th>
        <td id="td"><?php echo $dataRegistro['Jornada']?></td>
    </tr>
    <tr>
        <th id="th">Horario:</th>
        <td id="td"><?php echo $dataRegistro['Horario'] ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Control:</th>
        <td id="td"><?php echo $dataRegistro['Control'] ?></td>
    </tr>
    <tr>
        <th id="th">Tipo:</th>
        <td id="td"><?php echo $dataRegistro['Tipo'] ?></td>
    </tr>
    <tr>
        <th id="th">Adicional:</th>
        <td id="td"><?php echo $dataRegistro['Adicional'] ?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >

    <div class="containerr3">Compatibilidad</div>
    <tr>
        <th id="th">Lugar de trabajo:</th>
        <td id="td"><?php echo $dataRegistro['LUGARDETRABAJO'] ?></td>
    </tr>
    <tr>
        <th id="th">Horario:</th>
        <td id="td"><?php echo $dataRegistro['HORARIO']?></td>
    </tr>
    <tr>
        <th id="th">Dias laborales:</th>
        <td id="td"><?php echo $dataRegistro['DIASLABORALES'] ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Lugar de trabajo segundo:</th>
        <td id="td"><?php echo $dataRegistro['LUGARDETRABAJO2'] ?></td>
    </tr>
    <tr>
        <th id="th">Horario segundo:</th>
        <td id="td"><?php echo $dataRegistro['HORARIO2'] ?></td>
    </tr>
    <tr>
        <th id="th">Dias laborales segundo:</th>
        <td id="td"><?php echo $dataRegistro['DIASLABORALES2'] ?></td>
    </tr>
    <tr>
        <th id="th">Observaciones:</th>
        <td id="td"><?php echo $dataRegistro['OBSERVACIONES'] ?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >

    <div class="containerr3">Estrucutra</div>

    <tr>
        <th id="th">Descripción estructura:</th>
        <td id="td"><?php echo $dataResult['descripcionestructura1'] ?></td>
    </tr>
    <tr>
        <th id="th">Descripción estructura 2:</th>
        <td id="td"><?php echo $dataResult['descripcionestructura2']?></td>
    </tr>
    <tr>
        <th id="th">Descripción estructura 3:</th>
        <td id="td"><?php echo $dataResult['descripcionestructura3'] ?></td>
    </tr>
    <tr>
    <tr>
        <th id="th">Descripción estructura 4:</th>
        <td id="td"><?php echo $dataResult['descripcionestructura4'] ?></td>
    </tr>
    <th id="th">Descripción estructura 5:</th>
    <td id="td"><?php echo $dataResult['descripcionestructura5'] ?></td>
    </tr>

</table>

<?php 
$sql = $conexionRh->prepare("SELECT datospersonales.*, t_estado.estado as entidadnacimi, t_municipio.municipio from datospersonales left join t_estado on t_estado.id_estado = datospersonales.entidadnacimiento left join t_municipio on t_municipio.id_municipio = datospersonales.municipio where datospersonales.id_empleado = :id_empleado");
$sql->execute(array(
    ':id_empleado'=>$id_empleado
));

 $dataCurso = $sql->fetch();
 $extraerestado = $dataCurso['estado'];
 $sqlestado = $conexionRh->prepare("SELECT estado from t_estado where id_estado = :id_estado");
    $sqlestado->execute(array(
        ':id_estado'=>$extraerestado
    ));
    $dataestado = $sqlestado->fetch();
 if($dataCurso != ''){
?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3" style="background-color: orange;">Información personal</div>

    <tr>
        <th id="th">Fecha de nacimiento:</th>
        <td id="td"><?php echo $dataCurso['fechanacimiento'] ?></td>
    </tr>
    <tr>
        <th id="th">Edad:</th>
        <td id="td"><?php echo $dataCurso['edad']?></td>
    </tr>
    <tr>
        <th id="th">Estado civil:</th>
        <td id="td"><?php echo $dataCurso['estadocivil']?></td>
    </tr>
    <tr>
        <th id="th">Entidad de nacimiento:</th>
        <td id="td"><?php echo $dataCurso['entidadnacimi']?></td>
    </tr>
    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataCurso['genero']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de sangre:</th>
        <td id="td"><?php echo $dataCurso['tipodesangre']?></td>
    </tr>
    <tr>
        <th id="th">Nacionalidad:</th>
        <td id="td"><?php echo $dataCurso['nacionalidad']?></td>
    </tr>
    <tr>
        <th id="th">N° de cartilla militar:</th>
        <td id="td"><?php echo $dataCurso['numerocartillamilitar']?></td>
    </tr>
    <tr>
        <th id="th">Carta de naturalización:</th>
        <td id="td"><?php echo $dataCurso['cartanaturalizacion']?></td>
    </tr>
    <tr>
        <th id="th">N° de seguro social:</th>
        <td id="td"><?php echo $dataCurso['numerosegurosocial']?></td>
    </tr>

</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3" style="background-color: orange;">Información domicilio</div>
    <tr>
        <th id="th">Calle:</th>
        <td id="td"><?php echo $dataCurso['calle'] ?></td>
    </tr>
    <tr>
        <th id="th">N° exterior:</th>
        <td id="td"><?php echo $dataCurso['numeroexterior'] ?></td>
    </tr>
    <tr>
        <th id="th">N° interior:</th>
        <td id="td"><?php echo $dataCurso['numerointerior']?></td>
    </tr>
    <tr>
        <th id="th">Codigo postal:</th>
        <td id="td"><?php echo $dataCurso['codigopostal']?></td>
    </tr>
    <tr>
        <th id="th">Colonia:</th>
        <td id="td"><?php echo $dataCurso['colonia']?></td>
    </tr>
    <tr>
        <th id="th">Estado:</th>
        <td id="td"><?php echo $dataestado['estado']?></td>
    </tr>
    <tr>
        <th id="th">Alcaldia/Municipio:</th>
        <td id="td"><?php echo $dataCurso['municipio']?></td>
    </tr>
    <tr>
        <th id="th">Localidad:</th>
        <td id="td"><?php echo $dataCurso['localidad']?></td>
    </tr>
    <tr>
        <th id="th">Tel casa:</th>
        <td id="td"><?php echo $dataCurso['telefonocasa']?></td>
    </tr>
    <tr>
        <th id="th">Tel celular:</th>
        <td id="td"><?php echo $dataCurso['telefonocelular']?></td>
    </tr>
    <tr>
        <th id="th">Otro tel:</th>
        <td id="td"><?php echo $dataCurso['otrotelefono']?></td>
    </tr>
    <tr>
        <th id="th">Correo:</th>
        <td id="td"><?php echo $dataCurso['correoelectronico']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%">
    <div class="containerr3" style="background-color: red;">Datos contacto emergencia</div>
    <tr>
        <th id="th">Nombre llamar emergencia:</th>
        <td id="td"><?php echo $dataCurso['nombreemergencia'] ?></td>
    </tr>
    <tr>
        <th id="th">Telefono llamar emergencia:</th>
        <td id="td"><?php echo $dataCurso['telefonoemergencia'] ?></td>
    </tr>
    <tr>
        <th id="th">Parentesco llamar emergencia:</th>
        <td id="td"><?php echo $dataCurso['parentescoemergencia']?></td>
    </tr>
    
    
</table>
<?php } ?>
<script>
    // var fired_button2= $("#claveUnicaContrato").val();  
    //var fired_button2=document.getElementById('claveUnicaContrato').value;
    $('.lnr-pencil').on('click', function() {

        let fired_button = $(this).val();
        let mensaje = confirm("La evaluacion del usuario se reiniciara, Deseas continuar?")

        if (mensaje == true) {
            window.location.href = 'reinicarEval?id=' + fired_button;
        } else {
            swal({
                title: '¡CANCELADO!',
                text: '',
                type: 'error',
                timer: 1000,
                showConfirmButton: false
            });
        }
    });

    $('.lnr-trash').on('click', function() {

        let id = $(this).val();
        let mensaje = confirm("El usuario sera bloqueado del sistema, Deseas continuar?")

        if (mensaje == true) {
            window.location.href = 'bloquearUsuario.php?id=' + id;
        } else {
            swal({
                title: '¡CANCELADO!',
                text: '',
                type: 'error',
                timer: 1000,
                showConfirmButton: false
            });
        }
    });