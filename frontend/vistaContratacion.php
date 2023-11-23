<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

require 'conexionRh.php';
?>

<div id="mensaje"></div>
<input type="hidden" id="idpersonal" value="<?php echo $dataRegistro['id_principal']; ?>">
<input type="hidden" id="curp" value="<?php echo $dataRegistro['curp']; ?>">
<input type="hidden" id="nombrecandidato" value="<?php echo $dataRegistro['nombre']; ?>">
<input type="hidden" id="evaluar" value="1">
<input type="hidden" id="cancelarevaluacion" value="0">
<ul class="nav nav-tabs" style="margin-top: 0px;" >       
            <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: red;">Acciones</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="rechazo();">Rechazo contratacion</a></li>
                
                
        </ul>
    </li>
    
</ul>
                <style>
                    .table:hover {
                            background: #EBEBEB;
                    }
                </style>
                <script>
                
    function rechazo() {
    var id = $("#idpersonal").val();
    var mensaje = confirm("Rechazo contratacion?"); 
    let parametros = { id: id }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/rechazoContratacion.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaContratacion.php');
                

            }
        });
    } else {
        swal({
            title: 'Cancelado!',
            text: 'Proceso cancelado',
            icon: 'warning',

        });
    }
}


function cancelaracceso() {
    var id = $("#idpersonal").val();
    var actualiza = $("#cancelarevaluacion").val();
    var mensaje = confirm("Se le cancelara el acceso, desea continuar?"); 
    let parametros = { id: id, actualiza:actualiza }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/darAcceso.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaReclutamientoEnEvaluacion.php');
                

            }
        });
    } else {
        swal({
            title: 'Cancelado!',
            text: 'Proceso cancelado',
            icon: 'warning',

        });
    }
}

</script>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >

    <div class="containerr2" style="background-color: goldenrod;">Datos personales</div>
    <tr>
        <th id="th">Profesion:</th>
        <td id="td"><?php echo $dataRegistro['profesion'] ?></td>
    </tr>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombre'].' '.$dataRegistro['appaterno'].' '.$dataRegistro['apmaterno'] ?></td>
    </tr>
    <tr>
        <th id="th">CURP:</th>
        <td id="td"><?php echo $dataRegistro['curp'] ?></td>
    </tr>
    <tr>
        <th id="th">RFC:</th>
        <td id="td"><?php echo $dataRegistro['rfcprincipal'] ?></td>
    </tr>
    <tr>
        <th id="th">Estado:</th>
        <td id="td"><?php echo $dataRegistro['estado'] ?></td>
    </tr>
    <tr>
        <th id="th">Municipio:</th>
        <td id="td"><?php echo $dataRegistro['delegacion'] ?></td>
    </tr>
    <tr>
        <th id="th">Sexo:</th>
        <td id="td"><?php echo $dataRegistro['sexo'] ?></td>
    </tr>
    <tr>
        <th id="th">Telefono local:</th>
        <td id="td"><?php echo $dataRegistro['telefonocasa'] ?></td>
    </tr>
    <tr>
        <th id="th">Telefono celular:</th>
        <td id="td"><?php echo $dataRegistro['telefonocelular'] ?></td>
    </tr>
    <tr>
        <th id="th">Otro telefono:</th>
        <td id="td"><?php echo $dataRegistro['otrotelefono'] ?></td>
    </tr>
    <tr>
        <th id="th">Correo electronico:</th>
        <td id="td"><?php echo $dataRegistro['correoelectronico'] ?></td>
    </tr>
</table>
<div id="editadatospersonales"></div>


<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Estudios medio superior</div>

    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionmedia'] ?></td>
    </tr>

    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistro['nombremediasuperior'] ?></td>
    </tr>

    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php echo $dataRegistro['fechainicio'] ?></td>
    </tr>

    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php echo $dataRegistro['fechatermino'] ?></td>
    </tr>

    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php echo $dataRegistro['tiempocursado'] ?></td>
    </tr>

    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php echo $dataRegistro['documentomediosuperior'] ?></td>
    </tr>

</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Estudios nivel tecnico</div>

    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistro['nombreformaciontecnica'] ?></td>
    </tr>

    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistro['nombreinstituciontecnica'] ?></td>
    </tr>

    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php echo $dataRegistro['fechainiciotecnico'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php echo $dataRegistro['fechaterminotecnico'] ?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php echo $dataRegistro['tiempocursadotecnico'] ?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php echo $dataRegistro['documentotecnico'] ?></td>
    </tr>

</table>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from estudiospostecnico where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistropostecnico):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Postecnico</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistropostecnico['nombreformacionpostecnico']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistropostecnico['nombreinstitucionpostecnico']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistropostecnico['fechainiciosuppostecnico']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistropostecnico['fechaterminosuppostecnico']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistropostecnico['tiempocursadosuppostecnico']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistropostecnico['documentorecibepostecnico']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroe):

    ?>

<!--FINALIZA SECCIÓN DE LABORATORIOS-->
<!-- INCIA SECCIÓN USG HEPÁTICO-->
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Estudios nivel superior</div>

    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistroe['nombreformacionsuperior'] ?></td>
    </tr>

    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistroe['nombresuperior'] ?></td>
    </tr>

    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php echo $dataRegistroe['fechasuperiorinicio'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php echo $dataRegistroe['fechasuperiortermino'] ?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php echo $dataRegistroe['tiempocursadosuperior'] ?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php echo $dataRegistroe['documentosuperior'] ?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php echo $dataRegistroe['numerocedulasuperior'] ?></td>
    </tr>
</table>
<?php endforeach; ?>

<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistrom):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Estudios nivel maetria</div>
    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistrom['nombreformacionmaestria']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistrom['nombremaestria']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistrom['fechamaestriainicio']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php  echo $dataRegistrom['fechamaestriatermino']?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php  echo $dataRegistrom['tiempocursadomaestria']?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php  echo $dataRegistrom['documentomaestria']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistrom['numerocedulamaestria']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroesp):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Posgrado/Especialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistroesp['nombreformacionacademica']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistroesp['nombreinstitucion']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistroesp['unidadhospitalaria']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistroesp['fechainicioespecialidad']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistroesp['fechaterminoespecialidad']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistroesp['anioscursados']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistroesp['documentorecibeespecialidad']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistroesp['numerocedulaespecialidad']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistrodoctorado):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Nivel Doctorado/Subespecialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistrodoctorado['nombreformaciondoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistrodoctorado['nombreinstituciondoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['unidadhospitalariadoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['fechainiciodoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['fechaterminodoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['anioscursadosdoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['documentorecibedoctorado']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistrodoctorado['numeroceduladoctorado']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from otrosestudiosaltaesp where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroaltaesp):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Otros estudios/Alta especialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistroaltaesp['nombreformacionaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistroaltaesp['nombrealtaespecialidad']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistroaltaesp['unidadhospaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistroaltaesp['fechainicioaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistroaltaesp['fechaterminoaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistroaltaesp['tiempocursadoaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistroaltaesp['documentorecibealtaesp']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from otrosestudios where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroOtrosestudios):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Otros estudios 1</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistroOtrosestudios['nombreformacionotros']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistroOtrosestudios['nombreotrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistroOtrosestudios['fechainiciootrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistroOtrosestudios['fechaterminootrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistroOtrosestudios['documentorecibeestudiosuno']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Servicio social</div>
    <tr>
        <th id="th">Nombre de la dependencia donde se realizó:</th>
        <td id="td"><?php echo $dataRegistro['nombreserviciosocial']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicioservicio']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminoservicio']?></td>
    </tr>
    <tr>
        <th id="th">Labores que desempeñó:</th>
        <td id="td"><?php  echo $dataRegistro['laboresservicio']?></td>
    </tr>
    <tr>
        <th id="th">Documento recibido:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibeservicio']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
<div class="containerr3" style="background-color: goldenrod;">Practicas profesionales</div>
    <tr>
        <th id="th">Nombre de la dependencia donde se realizó:</th>
        <td id="td"><?php echo $dataRegistro['nombrepracticas']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciopracticas']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminopracticas']?></td>
    </tr>
    <tr>
        <th id="th">Labores que desempeñó:</th>
        <td id="td"><?php  echo $dataRegistro['laborespracticas']?></td>
    </tr>
    <tr>
        <th id="th">Documento recibido:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibepracticas']?></td>
    </tr>
    
</table>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from certificacion where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroCertificacion):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Certificación</div>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistroCertificacion['nombreformacioncertificauno']?></td>
    </tr>
    <tr>
        <th id="th">Especialidad que certifica:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['nombrecertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['fechainiciocertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['fechaterminocertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['tiempocursadosupcertificacion']?></td>
    </tr>
    <tr>
        <th id="th">Modalidad:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['modalidadcertificacion']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistroCertificacion['documentorecibecertificacion']?></td>
    </tr>
    
</table>
<?php endforeach; ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Actualización academica/primer curso</div>
    <tr>
        <th id="th">Nombre del curso:</th>
        <td id="td"><?php echo $dataRegistro['nombrecursouno']?></td>
    </tr>
    <tr>
        <th id="th">Institución sede:</th>
        <td id="td"><?php  echo $dataRegistro['institucioncursouno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciocursouno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminocursouno']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibecursouno']?></td>
    </tr>
    <tr>
        <th id="th">Nacional/Internacional:</th>
        <td id="td"><?php  echo $dataRegistro['nacionalprimero']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Segundo curso</div>
    <tr>
        <th id="th">Nombre del curso:</th>
        <td id="td"><?php echo $dataRegistro['nombrecursodos']?></td>
    </tr>
    <tr>
        <th id="th">Institución sede:</th>
        <td id="td"><?php  echo $dataRegistro['institucioncursodos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciocursodos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminocursodos']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibecursodos']?></td>
    </tr>
    <tr>
        <th id="th">Nacional/Internacional:</th>
        <td id="td"><?php  echo $dataRegistro['nacionalsegundo']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Tercer curso</div>
    <tr>
        <th id="th">Nombre del curso:</th>
        <td id="td"><?php echo $dataRegistro['nombrecursotres']?></td>
    </tr>
    <tr>
        <th id="th">Institución sede:</th>
        <td id="td"><?php  echo $dataRegistro['institucioncursotres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciocursotres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminocursotres']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibecursotres']?></td>
    </tr>
    <tr>
        <th id="th">Nacional/Internacional:</th>
        <td id="td"><?php  echo $dataRegistro['nacionaltercero']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Experiencia laboral, sector público</div>
    <tr>
        <th id="th">Secretaría de Estado:</th>
        <td id="td"><?php echo $dataRegistro['empresauno']?></td>
    </tr>
    <tr>
        <th id="th">Unidad responsable:</th>
        <td id="td"><?php  echo $dataRegistro['cbx_dependenciauno']?></td>
    </tr>
    <tr>
        <th id="th">Nombre del puesto:</th>
        <td id="td"><?php  echo $dataRegistro['puestoempresauno']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestouno']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la institución:</th>
        <td id="td"><?php  echo $dataRegistro['empresadirecionuno']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telcontactouno']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extencionuno']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['jefedirectouno']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionespricipalesuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciouno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminouno']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Experiencia laboral, sector público-segundo</div>
    <tr>
        <th id="th">Secretaría de Estado:</th>
        <td id="td"><?php echo $dataRegistro['empresados']?></td>
    </tr>
    <tr>
        <th id="th">Unidad responsable:</th>
        <td id="td"><?php  echo $dataRegistro['cbx_dependenciados']?></td>
    </tr>
    <tr>
        <th id="th">Nombre del puesto:</th>
        <td id="td"><?php  echo $dataRegistro['puestoempresados']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestodos']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la institución:</th>
        <td id="td"><?php  echo $dataRegistro['empresadirecdos']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telcontactodos']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extenciondos']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['jefedirectodos']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparaciondos']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionespricipalesdos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicidos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminodos']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Experiencia laboral, sector público-tercero</div>
    <tr>
        <th id="th">Secretaría de Estado:</th>
        <td id="td"><?php echo $dataRegistro['empresatres']?></td>
    </tr>
    <tr>
        <th id="th">Unidad responsable:</th>
        <td id="td"><?php  echo $dataRegistro['cbx_dependenciatres']?></td>
    </tr>
    <tr>
        <th id="th">Nombre del puesto:</th>
        <td id="td"><?php  echo $dataRegistro['puestoempresatres']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestotres']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la institución:</th>
        <td id="td"><?php  echo $dataRegistro['empresadirectres']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telcontactotres']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extenciontres']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['jefedirectotres']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparaciontres']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionespricipalestres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciotres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminotres']?></td>
    </tr>
</table>
<?php
$id = $dataRegistro['id_principal'];
    require_once 'clases/conexion.php';
    $conexionDocumentacion = new ConexionDocumentacion();
    $sql = $conexionDocumentacion->prepare("SELECT * from explaboralprivado where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroExpLabPriva):

    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Experiencia laboral, sector privado</div>
    <tr>
        <th id="th">Nombre de la empresa:</th>
        <td id="td"><?php echo $dataRegistroExpLabPriva['nombrelaboralprivada']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['tipopuestoprivada']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la empresa:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['direccionempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['telefonoempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['extencionempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['nombrejefeprivada']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['motivoseparacionprivada']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['funcionesprivada']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['fechainicioprivada']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistroExpLabPriva['fechaterminoprivada']?></td>
    </tr>
    
</table>
<?php endforeach; ?>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Producción cientifica (Investigación, última publicación)</div>
    <tr>
        <th id="th">Nombre del artículo o publicación:</th>
        <td id="td"><?php echo $dataRegistro['nombrepublicacion']?></td>
    </tr>
    <tr>
        <th id="th">Año de publiación:</th>
        <td id="td"><?php  echo $dataRegistro['tiempopublicacion']?></td>
    </tr>
    <tr>
        <th id="th">Publicado en...:</th>
        <td id="td"><?php  echo $dataRegistro['publicadoen']?></td>
    </tr>
    <tr>
        <th id="th">País de publicación:</th>
        <td id="td"><?php  echo $dataRegistro['paisdepublicacion']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Idioma</div>
    <tr>
        <th id="th">Idioma:</th>
        <td id="td"><?php echo $dataRegistro['nombreidioma']?></td>
    </tr>
    <tr>
        <th id="th">Nivel:</th>
        <td id="td"><?php  echo $dataRegistro['nivel']?></td>
    </tr>
    <tr>
        <th id="th">Dominio:</th>
        <td id="td"><?php  echo $dataRegistro['niveldedominio']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita tu idioma:</th>
        <td id="td"><?php  echo $dataRegistro['documentoacredita']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Otras habilidades</div>
    <tr>
        <th id="th">Otras habilidades:</th>
        <td id="td"><?php echo $dataRegistro['otrashabilidades']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3" style="background-color: goldenrod;">Manifiesto</div>
    <tr>
        <th id="th">Familiares en el HRAEI:</th>
        <td id="td"><?php echo $dataRegistro['familiaresenhraei']?></td>
    </tr>
    <tr>
        <th id="th">Autorizo correo:</th>
        <td id="td"><?php  echo $dataRegistro['autorizodatoscorreo']?></td>
    </tr>
    <tr>
        <th id="th">Autorizo telefono:</th>
        <td id="td"><?php  echo $dataRegistro['autorizodatostelefono']?></td>
    </tr>
    <tr>
        <th id="th">Autorizo datos generales:</th>
        <td id="td"><?php  echo $dataRegistro['autorizodatosgenerales']?></td>
    </tr>
    
</table>
<?php
    //require 'modals/buscarpostuladobolsa.php';

?>