<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

require 'conexionRh.php';
?>

<div id="mensaje"></div>
<input type="hidden" id="idpersonal" value="<?php echo $dataRegistro['id_principal']; ?>">
<input type="hidden" id="nombrecandidato" value="<?php echo $dataRegistro['nombre']; ?>">
<input type="hidden" id="curp" value="<?php echo $dataRegistro['curp']; ?>">
<input type="hidden" id="evaluar" value="1">
<input type="hidden" id="cancerlarevaluacion" value="0">
<ul class="nav nav-tabs" style="margin-top: 0px;" >       
            <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: red;">Acciones</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="eliminarRegistro();">Eliminar registro</a></li>
            <?php
                if($dataRegistro['acceder'] == 0){ ?>
                <li><a class="dropdown-item" href="#" onclick="asignarAcceso();">Evaluar</a></li>
            <?php 
                }
                ?>
                </ul>
        </li>
    </ul>
                <style>
                    .table:hover {
                            background: #EBEBEB;
                    }
                </style>
                <script>
    function eliminarRegistro() {
    var id = $("#idpersonal").val();
    var curp = $("#curp").val();
    var mensaje = confirm("el registro se eliminara"); 
    let parametros = { id: id, curp:curp }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarRegistroCandidato.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaReclutamiento.php');
                

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
function asignarAcceso() {
    var id = $("#idpersonal").val();
    var actualiza = $("#evaluar").val();
    var mensaje = confirm("Se le dara acceso al sistemas, desea continuar?"); 
    let parametros = { id: id, actualiza:actualiza}
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/darAcceso.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaReclutamiento.php');
                

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
                $("#tabla_resultadobus").load('consultaReclutamiento.php');
                

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
    <div class="containerr2">Datos personales</div>
    <tr>
        <th id="th">Fecha de postulación:</th>
        <td id="td"><?php echo $dataRegistro['fechapostulado'] ?></td>
    </tr>
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
        <td id="td"><?php echo $dataRegistro['municipio'] ?></td>
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
    <div class="containerr3">Estudios medio superior</div>

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
<div id="editarlaboratoriosartritis"></div>
<!--FINALIZA SECCIÓN DE LABORATORIOS-->
<!-- INCIA SECCIÓN USG HEPÁTICO-->
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Estudios nivel superior</div>

    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionsuperior'] ?></td>
    </tr>

    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistro['nombresuperior'] ?></td>
    </tr>

    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php echo $dataRegistro['fechasuperiorinicio'] ?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php echo $dataRegistro['fechasuperiortermino'] ?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php echo $dataRegistro['tiempocursadosuperior'] ?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php echo $dataRegistro['documentosuperior'] ?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php echo $dataRegistro['numerocedulasuperior'] ?></td>
    </tr>
</table>
<div id="editarusghepaticoartritis"></div>

<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Estudios nivel maetria</div>
    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionmaestria']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistro['nombremaestria']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciomaestria']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminomaestria']?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php  echo $dataRegistro['tiempocursadomaestria']?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php  echo $dataRegistro['documentomaestria']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistro['cedulamaestria']?></td>
    </tr>
    
</table>
<div id="editartratameintoartritis"></div>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Estudios nivel segunda maetria</div>
    <tr>
        <th id="th">Nombre de la formación:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionmaestriados']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución:</th>
        <td id="td"><?php echo $dataRegistro['nombremaestriados']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciomaestriados']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de termino:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminomaestriados']?></td>
    </tr>
    <tr>
        <th id="th">Tiempo cursado:</th>
        <td id="td"><?php  echo $dataRegistro['tiempocursadomaestriados']?></td>
    </tr>
    <tr>
        <th id="th">Documento obtenido:</th>
        <td id="td"><?php  echo $dataRegistro['documentomaestriados']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistro['cedulamaestriados']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Posgrado/Especialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionposgrado']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombreposgrado']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistro['unidadhospitalaria']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechaposgradoinicio']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaposgradotermino']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistro['tiempocursadoposgrado']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibeposgrado']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistro['numerocedulaposgrado']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Nivel Doctorado/Subespecialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistro['nombreformaciondoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombredoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistro['unidadhospitalariadoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciodoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminodoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistro['tiempocursadodoctorado']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibedoctorado']?></td>
    </tr>
    <tr>
        <th id="th">N° de cedula profesional:</th>
        <td id="td"><?php  echo $dataRegistro['numeroceduladoctorado']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Otros estudios/Alta especialidad</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombrealtaespecialidad']?></td>
    </tr>
    <tr>
        <th id="th">Unidad hospitalaria:</th>
        <td id="td"><?php  echo $dataRegistro['unidadhospaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicioaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminoaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Años cursados:</th>
        <td id="td"><?php  echo $dataRegistro['tiempocursadoaltaesp']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibealtaesp']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Otros estudios 1</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionotros']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombreotrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciootrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminootrosestudiosuno']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibeestudiosuno']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Otros estudios 2</div>
    <tr>
        <th id="th">Nombre de la formación académica:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacionotrosdos']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombreotrosestudiosdos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciootrosestudiosdos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminootrosestudiosdos']?></td>
    </tr>
    <tr>
        <th id="th">Documento que recibe:</th>
        <td id="td"><?php  echo $dataRegistro['documentorecibeestudiosdos']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Servicio social</div>
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
<div class="containerr3">Practicas profesionales</div>
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
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Certificación</div>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacioncertificauno']?></td>
    </tr>
    <tr>
        <th id="th">Especialidad que certifica:</th>
        <td id="td"><?php  echo $dataRegistro['nombrecertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciocertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminocertificacionuno']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistro['documentocertificacionuno']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Segunda certificación</div>
    <tr>
        <th id="th">Nombre de la institución educativa:</th>
        <td id="td"><?php echo $dataRegistro['nombreformacioncertificaciondos']?></td>
    </tr>
    <tr>
        <th id="th">Especialidad que certifica:</th>
        <td id="td"><?php  echo $dataRegistro['nombrecertificaciondos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio:</th>
        <td id="td"><?php  echo $dataRegistro['fechainiciocertificaciondos']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de término:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminocertificaciondos']?></td>
    </tr>
    <tr>
        <th id="th">Documento que acredita:</th>
        <td id="td"><?php  echo $dataRegistro['documentocertificaciondos']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Actualización academica/primer curso</div>
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
    <div class="containerr3">Segundo curso</div>
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
    <div class="containerr3">Tercer curso</div>
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
    <div class="containerr3">Experiencia laboral, sector público</div>
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
    <div class="containerr3">Experiencia laboral, sector público-segundo</div>
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
    <div class="containerr3">Experiencia laboral, sector público-tercero</div>
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
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Experiencia laboral, sector privado</div>
    <tr>
        <th id="th">Nombre de la empresa:</th>
        <td id="td"><?php echo $dataRegistro['nombrelaboralprivada']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestoprivada']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la empresa:</th>
        <td id="td"><?php  echo $dataRegistro['direccionempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telefonoempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extencionempresaprivada']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['nombrejefeprivada']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparacionprivada']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionesprivada']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicioprivada']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminoprivada']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Experiencia laboral, sector privado-segundo</div>
    <tr>
        <th id="th">Nombre de la empresa:</th>
        <td id="td"><?php echo $dataRegistro['nombrelaboralprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestoprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la empresa:</th>
        <td id="td"><?php  echo $dataRegistro['direccionempresaprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telefonoempresaprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extencionempresaprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['nombrejefeprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparacionprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionesprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicioprivadados']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminoprivadados']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Experiencia laboral, sector privado-tercero</div>
    <tr>
        <th id="th">Nombre de la empresa:</th>
        <td id="td"><?php echo $dataRegistro['nombrelaboralprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Tipo de puesto:</th>
        <td id="td"><?php  echo $dataRegistro['tipopuestoprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Dirección de la empresa:</th>
        <td id="td"><?php  echo $dataRegistro['direccionempresaprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Teléfono de contacto:</th>
        <td id="td"><?php  echo $dataRegistro['telefonoempresaprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Extensión:</th>
        <td id="td"><?php  echo $dataRegistro['extencionempresaprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Nombre de su jefe directo:</th>
        <td id="td"><?php  echo $dataRegistro['nombrejefeprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Motivo de su sepación:</th>
        <td id="td"><?php  echo $dataRegistro['motivoseparacionprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Funciones principales:</th>
        <td id="td"><?php  echo $dataRegistro['funcionesprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha de inicio de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechainicioprivadatres']?></td>
    </tr>
    <tr>
        <th id="th">Fecha término de labores:</th>
        <td id="td"><?php  echo $dataRegistro['fechaterminoprivadatres']?></td>
    </tr>
    
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Producción cientifica (Investigación, última publicación)</div>
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
    <div class="containerr3">Idioma</div>
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
    <div class="containerr3">Otras habilidades</div>
    <tr>
        <th id="th">Otras habilidades:</th>
        <td id="td"><?php echo $dataRegistro['otrashabilidades']?></td>
    </tr>
</table>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr3">Manifiesto</div>
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
    require 'modals/buscarpostuladobolsa.php';

?>
