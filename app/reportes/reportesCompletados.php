<?php session_start();
$hoy = time() -25200;
if(isset($_SESSION['correo'])) {
  header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
  header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
  header( "Cache-Control: no-cache, must-revalidate" );
  header( "Pragma: no-cache" );

require_once ('../lib/pdf/mpdf.php');

require_once ('conexion.php');
$num = $_GET['numAleatorio'];

$query="SELECT login.numAleatorio, login.selCombo2, login.profesion_AreaProfesional, login.CURP, login.apellidoPaterno, login.apellidoMaterno, login.Nombre_s, login.calle, login.numExterior, login.Colonia, login.delegacion_municipio, login.entidad, login.CodigoPostal, login.fechaNacimiento, login.entidadNacimiento, login.RFC_homoclave, login.selCombo3, login.naturalizacion, login.telefonoCasa, login.telefonoCelular, login.OtroTelefono, login.correoElectronico, login.fechaRegistro, 
medio_superior.Nombre_de_la_formacion_academica, medio_superior.Nombre_de_la_Institucion, medio_superior.fecha_inicio, medio_superior.fecha_conclusion, medio_superior.tiempo_cursado, medio_superior.Documento_recibio, superior.Nombre_de_la_formacion_academica2, superior.NombreDeLaInstitucion, superior.fecha_inicio2, superior.fecha_termino2, superior.tiempocursado3, superior.Documento_Recibido3, superior.NumDeCedulaProfesional, maestria.institucion_edu3, maestria.Nombre_formacion_Academica, maestria.fecha_que_Inicio, maestria.fecha_que_Termino, maestria.cursados3, maestria.documento_recibe3, maestria.cedula3,
posgradoespecialidad.nom_formacion_academica, posgradoespecialidad.nomInstitutoEdu, posgradoespecialidad.unidadHospital,  posgradoespecialidad.fecha_inicio3, posgradoespecialidad.fecha_termino3, posgradoespecialidad.tiempo_cursados3, posgradoespecialidad.documentRecibio3, posgradoespecialidad.cedula4,
doctoradosubespecialidad.nameFormacionAcademic4, doctoradosubespecialidad.institucion_edu4, doctoradosubespecialidad.unidadHospital3, doctoradosubespecialidad.fechaInicio4, doctoradosubespecialidad.fechaconclusion4, doctoradosubespecialidad.tiempo_cursados4, doctoradosubespecialidad.documento_recibe4, doctoradosubespecialidad.cedula5, otrosestudiosaltaesp.nameFormacionAcademic5, otrosestudiosaltaesp.institucion_edu5, otrosestudiosaltaesp.unidadHospitalaria5, otrosestudiosaltaesp.fechaInicio5, otrosestudiosaltaesp.fechaConclusion5, otrosestudiosaltaesp.tiempo_cursados5, otrosestudiosaltaesp.documento_recibe5, otrosestudios1.nameAcademicFormacion, otrosestudios1.name_instituto, otrosestudios1.tiempo_cursados6, otrosestudios1.document_recibe, otrosestudios2.name_academic2, otrosestudios2.name_sede_intituto2, otrosestudios2.tiempo_cursados7, otrosestudios2.document_recibe2, serviciosocial.name_servico_social, serviciosocial.fecha_inicio_servicio3, serviciosocial.fecha_termino_servicio3, serviciosocial.labores_realizo, serviciosocial.document_recibe3, recidenciasprof.name_dependenciaRealizo4,
recidenciasprof.date_inicio_practicas4, recidenciasprof.date_termino_practicas4, recidenciasprof.labores_desemp, recidenciasprof.document_recibe4, primercertificacion.institucionName2, primercertificacion.certificaEspecialidad2, primercertificacion.duracioon, primercertificacion.caducacionn, primercertificacion.document_acredit2, segundacertificacion.institucionName, segundacertificacion.certificaEspecialidad, segundacertificacion.obtuvo_en, segundacertificacion.finaliza_en, segundacertificacion.document_acredit3,
act_acad_tres_cursos_recientes.nombre_act_curso, act_acad_tres_cursos_recientes.institucion_act_Name, act_acad_tres_cursos_recientes.duracion_fecha_act_inicio, act_acad_tres_cursos_recientes.duracion_fecha_act_termino, act_acad_tres_cursos_recientes.document_act_obt, act_acad_tres_cursos_recientes.nacional_act, act_acad_tres_cursos_recientes.internacional_act, act_acad_tres_cursos_recientes.nombre_act_curso2, act_acad_tres_cursos_recientes.institucion_act_Name2, act_acad_tres_cursos_recientes.duracion_fecha_act_inicio2, act_acad_tres_cursos_recientes.duracion_fecha_act_termino2, act_acad_tres_cursos_recientes.document_act_obt2, act_acad_tres_cursos_recientes.nacional_act2,  act_acad_tres_cursos_recientes.internacional_act2, act_acad_tres_cursos_recientes.nombre_act_curso3, act_acad_tres_cursos_recientes.institucion_act_Name3, act_acad_tres_cursos_recientes.duracion_fecha_act_inicio3, act_acad_tres_cursos_recientes.duracion_fecha_act_termino3, act_acad_tres_cursos_recientes.document_act_obt3, act_acad_tres_cursos_recientes.nacional_act3, act_acad_tres_cursos_recientes.internacional_act3,
experienciasectorprivado.empresa_name, experienciasectorprivado.empresa_direccion,  experienciasectorprivado.empresa_telefono, experienciasectorprivado.puesto_desempe_desempeno, experienciasectorprivado.tiempo_servicios, experienciasectorprivado.jefe_directo, experienciasectorprivado.Motivo_separacion, experienciasectorprivado.document_avala, experienciasectorprivado.funciones_principales, experienciasectorprivado.empresa_name2, experienciasectorprivado.empresa_direccion2, experienciasectorprivado.empresa_telefono2, experienciasectorprivado.puesto_desempe_desempeno2, experienciasectorprivado.tiempo_servicios2, experienciasectorprivado.jefe_directo2, experienciasectorprivado.Motivo_separacion2, experienciasectorprivado.document_avala2, experienciasectorprivado.funciones_principales2,
experienciasectorpublico.dependencia_name, experienciasectorpublico.dependencia_direccion, experienciasectorpublico.dependencia_telefono, experienciasectorpublico.que_desempena_desempeno, experienciasectorpublico.tiempo_presto_servicios, experienciasectorpublico.jefe_directo_dependencia, experienciasectorpublico.Motivo_separacion_dependencia, experienciasectorpublico.document_avala_dependencia, experienciasectorpublico.funciones_principales_dependencia, experienciasectorpublico.empresa_name_seg, experienciasectorpublico.empresa_direccion_seg, experienciasectorpublico.empresa_telefono_seg, experienciasectorpublico.puesto_desempeno_seg, experienciasectorpublico.tiempo_servicio_seg, experienciasectorpublico.jefe_directo_seg, experienciasectorpublico.Motivo_separacion_seg, experienciasectorpublico.document_avala_seg, experienciasectorpublico.funciones_principales_seg,
produccioncientifica.articulo_name, produccioncientifica.publicacion_tiempo, produccioncientifica.publicado_lugar, produccioncientifica.place_publicacion, 
idioma.idioma_nombre, idioma.idioma_nivel, idioma.idioma_dominio, idioma.documento_acredita_idioma, otrashabilidades.habilidades_extra, manifiesto.selCombo, manifiesto.correo_elect, manifiesto.telefono_enlace, autorizo.selCombo5 
from login inner join medio_superior on medio_superior.numAleatorio = login.numAleatorio inner join superior on superior.numAleatorio = login.numAleatorio inner join posgradoespecialidad on posgradoespecialidad.numAleatorio = login.numAleatorio inner join maestria on maestria.numAleatorio = login.numAleatorio inner join doctoradosubespecialidad on doctoradosubespecialidad.numAleatorio = login.numAleatorio inner join otrosestudiosaltaesp on otrosestudiosaltaesp.numAleatorio = login.numAleatorio inner join otrosestudios1 on otrosestudios1.numAleatorio = login.numAleatorio inner join otrosestudios2 on otrosestudios2.numAleatorio = login.numAleatorio inner join serviciosocial on serviciosocial.numAleatorio = login.numAleatorio inner join recidenciasprof on recidenciasprof.numAleatorio = login.numAleatorio inner join primercertificacion on primercertificacion.numAleatorio = login.numAleatorio inner join segundacertificacion on segundacertificacion.numAleatorio = login.numAleatorio inner join act_acad_tres_cursos_recientes on act_acad_tres_cursos_recientes.numAleatorio = login.numAleatorio 
inner join experienciasectorprivado on experienciasectorprivado.numAleatorio = login.numAleatorio inner join experienciasectorpublico on experienciasectorpublico.numAleatorio = login.numAleatorio inner join produccioncientifica on produccioncientifica.numAleatorio = login.numAleatorio inner join idioma on idioma.numAleatorio = login.numAleatorio inner join otrashabilidades on otrashabilidades.numAleatorio = login.numAleatorio inner join manifiesto on manifiesto.numAleatorio = login.numAleatorio inner join autorizo on autorizo.numAleatorio = login.numAleatorio where login.numAleatorio = '$num' and login.estado = 1 limit 1 ";
    
    $result=mysqli_query($link, $query);
$prepare = $conexion2->prepare($query);
$prepare -> execute();
$resulSet = $prepare->get_result();
while ($numAleatorio[] = $resulSet->fetch_array());
$resulSet->close();
$prepare->close();
$conexion2->close();

$html ='<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header>
      
  
     
        
    </header>
   
      <table>
        
        
        <tr><td class="no2" colspan="6"><h2> CURRICULUM</h2></td>
         
          </tr>
          </table>
          ';
          foreach($numAleatorio as $numAleatorio){
          $html .='<tr>
          <tr><td class="no"><h3>DATOS GENERALES</h3></td>
            <td class="no"><h5>PROFESIÓN AREA PROFESIONAL:&nbsp;&nbsp;'.$numAleatorio['profesion_AreaProfesional'].'</h5></td>
            <td class="no"><h5>CURP:&nbsp;&nbsp;'.$numAleatorio['CURP'].'</h5></td>
            <td class="no"><h5>APELLIDO PATERNO:&nbsp;&nbsp;'.$numAleatorio['apellidoPaterno'].'</h5></td>
            <td class="no"><h5>APELLIDO MATERNO:&nbsp;&nbsp;'.$numAleatorio['apellidoMaterno'].'</h5></td>
             <td class="no"><h5>NOMBRE:&nbsp;&nbsp;'.$numAleatorio['Nombre_s'].'</h5></td>
             <td class="no"><h5>CALLE:&nbsp;&nbsp;'.$numAleatorio['calle'].'</h5></td>
             <td class="no"><h5>NUMERO EXTERIOR:&nbsp;&nbsp;'.$numAleatorio['numExterior'].'</h5></td>
             <td class="no"><h5>COLONIA:&nbsp;&nbsp;'.$numAleatorio['Colonia'].'</h5></td>
             <td class="no"><h5>DELEGACION O MUNICIPIO:&nbsp;&nbsp;'.$numAleatorio['delegacion_municipio'].'</h5></td>
             <td class="no"><h5>ENTIDAD:&nbsp;&nbsp;'.$numAleatorio['entidad'].'</h5></td>
             <td class="no"><h5>CODIGO POSTAL:&nbsp;&nbsp;'.$numAleatorio['CodigoPostal'].'</h5></td>
             <td class="no"><h5>FECHA DE NACIMIENTO:&nbsp;&nbsp;'.$numAleatorio['fechaNacimiento'].'</h5></td>
             <td class="no"><h5>ENTIDAD DE NACIMIENTO:&nbsp;&nbsp;'.$numAleatorio['entidadNacimiento'].'</h5></td>
             <td class="no"><h5>RFC CON HOMOCLAVE:&nbsp;'.$numAleatorio['RFC_homoclave'].'</h5></td>
             <td class="no"><h5>SEXO:&nbsp;&nbsp;'.$numAleatorio['selCombo3'].'</h5></td>
             <td class="no"><h5>CARTA DE NATURALIZACION:&nbsp;&nbsp;'.$numAleatorio['naturalizacion'].'</h5></td>
             <td class="no"><h5>TELEFONO LOCAL:&nbsp;&nbsp;'.$numAleatorio['telefonoCasa'].'</h5></td>
             <td class="no"><h5>TELEFONO CELULAR:&nbsp;&nbsp;'.$numAleatorio['telefonoCelular'].'</h5></td>
             <td class="no"><h5>OTRO TELEFONO DE CONTACTO:&nbsp;&nbsp;'.$numAleatorio['OtroTelefono'].'</h5></td>
             <td class="no"><h5>CORREO ELECTRONICO:&nbsp;&nbsp;'.$numAleatorio['correoElectronico'].'</h5></td>

             <tr><td class="no2" colspan="6"><h4>ESTUDIOS</h4></td>
          <tr><td class="no2" colspan="6"><h3>FORMACIÓN MEDIO SUPERIOR</h3></td>
          <tr>
            <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['Nombre_de_la_formacion_academica'].'</h5></td>
            <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['Nombre_de_la_Institucion'].'</h5></td>
            <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fecha_inicio'].'</h5></td>
            <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fecha_conclusion'].'</h5></td>
            <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursado'].'</h5></td>
            <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['Documento_recibio'].'</h5></td>
          </tr>
          <tr>
           <tr><td class="no2" colspan="6"><br><br><br><br><br><br><br><h3>FORMACIÓN SUPERIOR</h3></td>
          
           <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['Nombre_de_la_formacion_academica2'].'</h5></td>
           <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['NombreDeLaInstitucion'].'</h5></td>
           <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fecha_inicio2'].'</h5></td>
           <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fecha_termino2'].'</h5></td>
           <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempocursado3'].'</h5></td>
           <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['Documento_Recibido3'].'</h5></td>
           <td class="no"><h5>NUMERO DE CEDULA PROFESIONAL:&nbsp;&nbsp;'.$numAleatorio['NumDeCedulaProfesional'].'</h5></td>

          </tr>
          <tr><td class="no2" colspan="6"><h3>MAESTRIA</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['institucion_edu3'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['Nombre_formacion_Academica'].'</h5></td>
          <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fecha_que_Inicio'].'</h5></td>
          <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fecha_que_Termino'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['cursados3'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['documento_recibe3'].'</h5></td>
          <td class="no"><h5>NUMERO DE CEDULA PROFESIONAL:&nbsp;&nbsp;'.$numAleatorio['cedula3'].'</h5></td>

         </tr>

         <tr><td class="no2" colspan="6"><h3>POSGRADO / ESPECIALIDAD</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['nom_formacion_academica'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['nomInstitutoEdu'].'</h5></td>
          <td class="no"><h5>UNIDAD HOSPITALARIA:&nbsp;&nbsp;'.$numAleatorio['unidadHospital'].'</h5></td>
          <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fecha_inicio3'].'</h5></td>
          <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fecha_termino3'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursados3'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['documentRecibio3'].'</h5></td>
          <td class="no"><h5>NUMERO DE CEDULA PROFESIONAL:&nbsp;&nbsp;'.$numAleatorio['cedula4'].'</h5></td>

         </tr>

         <tr><td class="no2" colspan="6"><h3>DOCTORADO SUB-ESPECIALIDAD</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['nameFormacionAcademic4'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucion_edu4'].'</h5></td>
          <td class="no"><h5>UNIDAD HOSPITALARIA:&nbsp;&nbsp;'.$numAleatorio['unidadHospital3'].'</h5></td>
          <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fechaInicio4'].'</h5></td>
          <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fechaconclusion4'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursados4'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['documento_recibe4'].'</h5></td>
          <td class="no"><h5>NUMERO DE CEDULA PROFESIONAL:&nbsp;&nbsp;'.$numAleatorio['cedula5'].'</h5></td>

         </tr>

         <tr><td class="no2" colspan="6"><h3>OTROS ESTUDIOS / ALTA ESPECIALIDAD</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['nameFormacionAcademic5'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucion_edu5'].'</h5></td>
          <td class="no"><h5>UNIDAD HOSPITALARIA:&nbsp;&nbsp;'.$numAleatorio['unidadHospitalaria5'].'</h5></td>
          <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fechaInicio5'].'</h5></td>
          <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fechaConclusion5'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursados5'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['documento_recibe5'].'</h5></td>

         </tr>
         <tr><td class="no2" colspan="6"><h3>OTROS ESTUDIOS</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['nameAcademicFormacion'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['name_instituto'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursados6'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_recibe'].'</h5></td>
          
         </tr>
         <tr><td class="no2" colspan="6"><h3>OTROS ESTUDIOS</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA FORMACION ACADEMICA:&nbsp;&nbsp;'.$numAleatorio['name_academic2'].'</h5></td>
          <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['name_sede_intituto2'].'</h5></td>
          <td class="no"><h5>TIEMPO CURSADO:&nbsp;&nbsp;'.$numAleatorio['tiempo_cursados7'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_recibe2'].'</h5></td>
          
         </tr>

         <tr><td class="no2" colspan="6"><h3>SERVICIO SOCIAL</h3></td>
          
          <td class="no"><h5>NOMBRE DE LA DEPENDENCIA DONDE SE REALIZO:&nbsp;&nbsp;'.$numAleatorio['name_servico_social'].'</h5></td>
          <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['fecha_inicio_servicio3'].'</h5></td>
          <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['fecha_termino_servicio3'].'</h5></td>
          <td class="no"><h5>LABORES QUE REALIZO:&nbsp;&nbsp;'.$numAleatorio['labores_realizo'].'</h5></td>
          <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_recibe3'].'</h5></td>
          
         </tr>
         <tr><td class="no2" colspan="6"><br><br><br><br><br><br><br><h3>PRÁCTICAS PROFESIONALES</h3></td>
          
         <td class="no"><h5>NOMBRE DE LA DEPENDENCIA DONDE SE REALIZO:&nbsp;&nbsp;'.$numAleatorio['name_dependenciaRealizo4'].'</h5></td>
         <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['date_inicio_practicas4'].'</h5></td>
         <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['date_termino_practicas4'].'</h5></td>
         <td class="no"><h5>LABORES QUE REALIZO:&nbsp;&nbsp;'.$numAleatorio['labores_desemp'].'</h5></td>
         <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_recibe4'].'</h5></td>
         
        </tr>
        <tr><td class="no2" colspan="6"><h3>PRIMERA CERTIFICACIÓN</h3></td>
          
        <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucionName2'].'</h5></td>
        <td class="no"><h5>ESPECIALIDAD QUE CERTIFICA:&nbsp;&nbsp;'.$numAleatorio['certificaEspecialidad2'].'</h5></td>
        <td class="no"><h5>FECHA EN QUE SE OBTUVO:&nbsp;&nbsp;'.$numAleatorio['duracioon'].'</h5></td>
        <td class="no"><h5>FECHA EN QUE EXPIRA:&nbsp;&nbsp;'.$numAleatorio['caducacionn'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE ACREDITA:&nbsp;&nbsp;'.$numAleatorio['document_acredit2'].'</h5></td>
        
       </tr>
       <tr><td class="no2" colspan="6"><h3>SEGUNDA CERTIFICACIÓN</h3></td>
          
        <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucionName'].'</h5></td>
        <td class="no"><h5>ESPECIALIDAD QUE CERTIFICA:&nbsp;&nbsp;'.$numAleatorio['certificaEspecialidad'].'</h5></td>
        <td class="no"><h5>FECHA EN QUE SE OBTUVO:&nbsp;&nbsp;'.$numAleatorio['obtuvo_en'].'</h5></td>
        <td class="no"><h5>FECHA EN QUE EXPIRA:&nbsp;&nbsp;'.$numAleatorio['finaliza_en'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE ACREDITA:&nbsp;&nbsp;'.$numAleatorio['document_acredit3'].'</h5></td>
        
       </tr>
       <tr><td class="no2" colspan="6"><h3>ACTUALIZACIÓN ACADEMICA(tres cursos mas recientes)</h3></td>
       <tr><td class="no2" colspan="6"><h3>PRIMER CURSO</h3></td>  
        <td class="no"><h5>NOMBRE DEl CURSO:&nbsp;&nbsp;'.$numAleatorio['nombre_act_curso'].'</h5></td>
        <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucion_act_Name'].'</h5></td>
        <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_inicio'].'</h5></td>
        <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_termino'].'</h5></td>
        <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_act_obt'].'</h5></td>
        <td class="no"><h5>NACIONAL:&nbsp;&nbsp;'.$numAleatorio['nacional_act'].'</h5></td>
        <td class="no"><h5>INTERNACIONAL:&nbsp;&nbsp;'.$numAleatorio['internacional_act'].'</h5></td>
        
       </tr>
       <tr><td class="no2" colspan="6"><br><br><br><br><br><br><h3>SEGUNDO CURSO</h3></td>  
        <td class="no"><h5>NOMBRE DEl CURSO:&nbsp;&nbsp;'.$numAleatorio['nombre_act_curso2'].'</h5></td>
        <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucion_act_Name2'].'</h5></td>
        <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_inicio2'].'</h5></td>
        <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_termino2'].'</h5></td>
        <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_act_obt2'].'</h5></td>
        <td class="no"><h5>NACIONAL:&nbsp;&nbsp;'.$numAleatorio['nacional_act2'].'</h5></td>
        <td class="no"><h5>INTERNACIONAL:&nbsp;&nbsp;'.$numAleatorio['internacional_act2'].'</h5></td>
        
       </tr>
       <tr><td class="no2" colspan="6"><h3>TERCER CURSO</h3></td>  
        <td class="no"><h5>NOMBRE DEl CURSO:&nbsp;&nbsp;'.$numAleatorio['nombre_act_curso3'].'</h5></td>
        <td class="no"><h5>NOMBRE DE LA INSTITUCIÓN:&nbsp;&nbsp;'.$numAleatorio['institucion_act_Name3'].'</h5></td>
        <td class="no"><h5>FECHA DE INICIO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_inicio3'].'</h5></td>
        <td class="no"><h5>FECHA DE TERMINO:&nbsp;&nbsp;'.$numAleatorio['duracion_fecha_act_termino3'].'</h5></td>
        <td class="no"><h5>DOCUMENTO OBTENIDO:&nbsp;&nbsp;'.$numAleatorio['document_act_obt3'].'</h5></td>
        <td class="no"><h5>NACIONAL:&nbsp;&nbsp;'.$numAleatorio['nacional_act3'].'</h5></td>
        <td class="no"><h5>INTERNACIONAL:&nbsp;&nbsp;'.$numAleatorio['internacional_act3'].'</h5></td>
        
       </tr>
       <tr><td class="no2" colspan="6"><h3>EXPERIENCIA LABORAL(sector privado)</h3></td>
        <td class="no"><h5>NOMBRE DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_name'].'</h5></td>
        <td class="no"><h5>DIRECCIÓN:&nbsp;&nbsp;'.$numAleatorio['empresa_direccion'].'</h5></td>
        <td class="no"><h5>TELÉFONO DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_telefono'].'</h5></td>
        <td class="no"><h5>PUESTO QUE DESEMPEÑA O DESEMPEÑO:&nbsp;&nbsp;'.$numAleatorio['puesto_desempe_desempeno'].'</h5></td>
        <td class="no"><h5>TIEMPO QUE PRESTÓ O HA PRESTADO SUS SERVICIOS:&nbsp;&nbsp;'.$numAleatorio['tiempo_servicios'].'</h5></td>
        <td class="no"><h5>NOMBRE DE SU JEFE DIRECTO:&nbsp;&nbsp;'.$numAleatorio['jefe_directo'].'</h5></td>
        <td class="no"><h5>MOTIVO DE SU SEPARCIÓN:&nbsp;&nbsp;'.$numAleatorio['Motivo_separacion'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE AVALA SU SEPARACIÓN:&nbsp;&nbsp;'.$numAleatorio['document_avala'].'</h5></td>
        <td class="no"><h5>DESCRIPCIÓN DE FUNCIONES PRINCIPALES:&nbsp;&nbsp;'.$numAleatorio['funciones_principales'].'</h5></td>
        
        <td class="no"><br><br><h5>NOMBRE DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_name2'].'</h5></td>
        <td class="no"><h5>DIRECCIÓN:&nbsp;&nbsp;'.$numAleatorio['empresa_direccion2'].'</h5></td>
        <td class="no"><h5>TELÉFONO DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_telefono2'].'</h5></td>
        <td class="no"><h5>PUESTO QUE DESEMPEÑA O DESEMPEÑO:&nbsp;&nbsp;'.$numAleatorio['puesto_desempe_desempeno2'].'</h5></td>
        <td class="no"><h5>TIEMPO QUE PRESTÓ O HA PRESTADO SUS SERVICIOS:&nbsp;&nbsp;'.$numAleatorio['tiempo_servicios2'].'</h5></td>
        <td class="no"><h5>NOMBRE DE SU JEFE DIRECTO:&nbsp;&nbsp;'.$numAleatorio['jefe_directo2'].'</h5></td>
        <td class="no"><h5>MOTIVO DE SU SEPARCIÓN:&nbsp;&nbsp;'.$numAleatorio['Motivo_separacion2'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE AVALA SU SEPARACIÓN:&nbsp;&nbsp;'.$numAleatorio['document_avala2'].'</h5></td>
        <td class="no"><h5>DESCRIPCIÓN DE FUNCIONES PRINCIPALES:&nbsp;&nbsp;'.$numAleatorio['funciones_principales2'].'</h5></td>
       </tr>

       <tr><td class="no2" colspan="6"><h3>EXPERIENCIA LABORAL(sector publico)</h3></td>
        <td class="no"><h5>NOMBRE DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['dependencia_name'].'</h5></td>
        <td class="no"><h5>DIRECCIÓN:&nbsp;&nbsp;'.$numAleatorio['dependencia_direccion'].'</h5></td>
        <td class="no"><h5>TELÉFONO DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['dependencia_telefono'].'</h5></td>
        <td class="no"><h5>PUESTO QUE DESEMPEÑA O DESEMPEÑO:&nbsp;&nbsp;'.$numAleatorio['que_desempena_desempeno'].'</h5></td>
        <td class="no"><h5>TIEMPO QUE PRESTÓ O HA PRESTADO SUS SERVICIOS:&nbsp;&nbsp;'.$numAleatorio['tiempo_presto_servicios'].'</h5></td>
        <td class="no"><h5>NOMBRE DE SU JEFE DIRECTO:&nbsp;&nbsp;'.$numAleatorio['jefe_directo_dependencia'].'</h5></td>
        <td class="no"><h5>MOTIVO DE SU SEPARCIÓN:&nbsp;&nbsp;'.$numAleatorio['Motivo_separacion_dependencia'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE AVALA SU SEPARACIÓN:&nbsp;&nbsp;'.$numAleatorio['document_avala_dependencia'].'</h5></td>
        <td class="no"><h5>DESCRIPCIÓN DE FUNCIONES PRINCIPALES:&nbsp;&nbsp;'.$numAleatorio['funciones_principales_dependencia'].'</h5></td>
        
        <td class="no"><br><br><h5>NOMBRE DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_name_seg'].'</h5></td>
        <td class="no"><h5>DIRECCIÓN:&nbsp;&nbsp;'.$numAleatorio['empresa_direccion_seg'].'</h5></td>
        <td class="no"><h5>TELÉFONO DE LA EMPRESA:&nbsp;&nbsp;'.$numAleatorio['empresa_telefono_seg'].'</h5></td>
        <td class="no"><h5>PUESTO QUE DESEMPEÑA O DESEMPEÑO:&nbsp;&nbsp;'.$numAleatorio['puesto_desempeno_seg'].'</h5></td>
        <td class="no"><h5>TIEMPO QUE PRESTÓ O HA PRESTADO SUS SERVICIOS:&nbsp;&nbsp;'.$numAleatorio['tiempo_servicio_seg'].'</h5></td>
        <td class="no"><h5>NOMBRE DE SU JEFE DIRECTO:&nbsp;&nbsp;'.$numAleatorio['jefe_directo_seg'].'</h5></td>
        <td class="no"><h5>MOTIVO DE SU SEPARCIÓN:&nbsp;&nbsp;'.$numAleatorio['Motivo_separacion_seg'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE AVALA SU SEPARACIÓN:&nbsp;&nbsp;'.$numAleatorio['document_avala_seg'].'</h5></td>
        <td class="no"><h5>DESCRIPCIÓN DE FUNCIONES PRINCIPALES:&nbsp;&nbsp;'.$numAleatorio['funciones_principales_seg'].'</h5></td>
       </tr>

       <tr><td class="no2" colspan="6"><h3>PRODUCCIÓN CIENTIFICA(Investigación, Última publicación)</h3></td>
        <td class="no"><h5>NOMBRE DEL ARTICULO O PUBLICACIÓN:&nbsp;&nbsp;'.$numAleatorio['articulo_name'].'</h5></td>
        <td class="no"><h5>AÑO DE PUBLICACIÓN:&nbsp;&nbsp;'.$numAleatorio['publicacion_tiempo'].'</h5></td>
        <td class="no"><h5>PUBLICADO EN:&nbsp;&nbsp;'.$numAleatorio['publicado_lugar'].'</h5></td>
        <td class="no"><h5>PAÍS DE PUBLICACIÓN:&nbsp;&nbsp;'.$numAleatorio['place_publicacion'].'</h5></td>
        </tr>

        <tr><td class="no2" colspan="6"><br><br><br><br><br><br><br><br><br><br><h3>IDIOMA</h3></td>
        <td class="no"><h5>IDIOMA:&nbsp;&nbsp;'.$numAleatorio['idioma_nombre'].'</h5></td>
        <td class="no"><h5>NIVEL:&nbsp;&nbsp;'.$numAleatorio['idioma_nivel'].'</h5></td>
        <td class="no"><h5>DOMINIO:&nbsp;&nbsp;'.$numAleatorio['idioma_dominio'].'</h5></td>
        <td class="no"><h5>DOCUMENTO QUE ACREDITA EL IDIOMA:&nbsp;&nbsp;'.$numAleatorio['documento_acredita_idioma'].'</h5></td>
        </tr>

        <tr><td class="no2" colspan="6"><h3>OTRAS HABILIDADES</h3></td>
        <td class="no"><h5>DESCRIPCIÓN DE HABILIDADES:&nbsp;&nbsp;'.$numAleatorio['habilidades_extra'].'</h5></td>
        </tr>

        <tr><td class="no2" colspan="6"><h3>MANIFIESTO</h3></td>
        <td class="no"><h5>MANIFIESTO QUE:&nbsp;&nbsp;'.$numAleatorio['selCombo'].'&nbsp;&nbsp;TENGO FAMILIARES LABORANDO EN ESTA INSTITUCIÓN.</h5></td>
        <td class="no"><h5>PROPORCIONO EL SIGUIENTE CORREO:&nbsp;&nbsp;'.$numAleatorio['correo_elect'].'&nbsp;&nbsp;PARA INFORMACIÓN REFERENTE A CUESTIONES INSTITUCIONALES.</h5></td>
        <td class="no"><h5>PROPORCIONO EL SIGUIENTE TELEFONO:&nbsp;&nbsp;'.$numAleatorio['telefono_enlace'].'&nbsp;&nbsp;PARA LOS MISMOS FINES.</h5></td>
        </tr>

        
        <tr><td class="no2" colspan="6"><h3>COMPARTIR DATOS</h3></td>
        <td class="no"><h5>AUTORIZO:&nbsp;&nbsp;'.$numAleatorio['selCombo5'].'&nbsp;&nbsp;consiento y autorizo expresamente al Hospital Regional de Alta Especialidad de Ixtapaluca, que mis datos personales sean tratados y transmitidos por medio impreso a empresas e instituciones del mismo grupo de interés, para ser considerado como posible candidato en alguna oferta laboral distinta a la solicitada en esta institución, 
        conforme a los términos y condiciones señalados en los artículos 97, 98, 
        Fracción II de la Ley Federal de Transparencia y Acceso a la Información Pública, no teniendo ni reservando ninguna acción o derecho en contra del Hospital Regional de Alta Especialidad de Ixtapaluca.</h5></td>
          </body>
          </html>	';
					
          }

					$html .= '		

';

$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('pdf.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('Curriculum.pdf', 'I');
}else{
  header('location: ../../index.php');
}

?>