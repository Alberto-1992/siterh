<?php session_start();
error_reporting(0);
require_once 'clases/conexion.php';
$conexionDocumentacion = new ConexionDocumentacion();
$id = $_POST['id'];
$query = $conexionDocumentacion->prepare("SELECT datospersonales.id_datopersonal as id_principal, datospersonales.profesion, datospersonales.curp, datospersonales.rfc as rfcprincipal, datospersonales.nombre, datospersonales.appaterno, datospersonales.apmaterno, datospersonales.estado, 
datospersonales.delegacion as municipio, datospersonales.localidad, datospersonales.colonia, datospersonales.calle, datospersonales.numexterior, datospersonales.numinterior, datospersonales.codigopostal, 
datospersonales.fechanacimiento, datospersonales.entidadnacimiento, datospersonales.rfc, datospersonales.sexo, datospersonales.cartanaturalizacion, datospersonales.telefonocasa, datospersonales.telefonocelular, 
datospersonales.otrotelefono, datospersonales.correoelectronico, datospersonales.datosActualizados,estudiosmediosup.nombreformacionmedia, estudiosmediosup.nombremediasuperior, estudiosmediosup.fechainicio, estudiosmediosup.fechatermino, 
estudiosmediosup.tiempocursado, estudiosmediosup.documentomediosuperior, estudiosmediosup.nombreformacionsuperior, estudiosmediosup.nombresuperior, estudiosmediosup.fechasuperiorinicio, 
estudiosmediosup.fechasuperiortermino, estudiosmediosup.tiempocursadosuperior, estudiosmediosup.documentosuperior, estudiosmediosup.numerocedulasuperior, estudiosmediosup.nombreformacionmaestria, 
estudiosmediosup.nombremaestria, estudiosmediosup.fechainiciomaestria, estudiosmediosup.fechaterminomaestria, estudiosmediosup.tiempocursadomaestria, estudiosmediosup.documentomaestria, 
estudiosmediosup.cedulamaestria, estudiosmediosup.nombreformacionmaestriados, estudiosmediosup.nombremaestriados, estudiosmediosup.fechainiciomaestriados, estudiosmediosup.fechaterminomaestriados, 
estudiosmediosup.tiempocursadomaestriados, estudiosmediosup.documentomaestriados, estudiosmediosup.cedulamaestriados, posgespecilidad.nombreformacionposgrado, posgespecilidad.nombreposgrado, 
posgespecilidad.unidadhospitalaria, posgespecilidad.fechaposgradoinicio, posgespecilidad.fechaposgradotermino, posgespecilidad.tiempocursadoposgrado, posgespecilidad.documentorecibeposgrado, 
posgespecilidad.numerocedulaposgrado, posgespecilidad.nombreformaciondoctorado, posgespecilidad.nombredoctorado, posgespecilidad.unidadhospitalariadoctorado, posgespecilidad.fechainiciodoctorado, 
posgespecilidad.fechaterminodoctorado, posgespecilidad.tiempocursadodoctorado, posgespecilidad.documentorecibedoctorado, posgespecilidad.numeroceduladoctorado,
otrosestudiosaltaesp.nombreformacionaltaesp, otrosestudiosaltaesp.nombrealtaespecialidad, otrosestudiosaltaesp.unidadhospaltaesp, 
otrosestudiosaltaesp.fechainicioaltaesp, otrosestudiosaltaesp.fechaterminoaltaesp, otrosestudiosaltaesp.tiempocursadoaltaesp, otrosestudiosaltaesp.documentorecibealtaesp, otrosestudiosaltaesp.nombreformacionotros, 
otrosestudiosaltaesp.nombreotrosestudiosuno, otrosestudiosaltaesp.fechainiciootrosestudiosuno, otrosestudiosaltaesp.fechaterminootrosestudiosuno, otrosestudiosaltaesp.documentorecibeestudiosuno, 
otrosestudiosaltaesp.nombreformacionotrosdos, otrosestudiosaltaesp.nombreotrosestudiosdos, otrosestudiosaltaesp.fechainiciootrosestudiosdos, otrosestudiosaltaesp.fechaterminootrosestudiosdos, 
otrosestudiosaltaesp.documentorecibeestudiosdos, socialpracticas.nombreserviciosocial, socialpracticas.fechainicioservicio, socialpracticas.fechaterminoservicio, socialpracticas.laboresservicio, 
socialpracticas.documentorecibeservicio, socialpracticas.nombrepracticas, socialpracticas.fechainiciopracticas, socialpracticas.fechaterminopracticas, socialpracticas.laborespracticas, 
socialpracticas.documentorecibepracticas, cerficacion.nombreformacioncertificauno, cerficacion.nombrecertificacionuno, cerficacion.fechainiciocertificacionuno, cerficacion.fechaterminocertificacionuno, 
cerficacion.documentocertificacionuno, cerficacion.nombreformacioncertificaciondos, cerficacion.nombrecertificaciondos, cerficacion.fechainiciocertificaciondos, cerficacion.fechaterminocertificaciondos, 
cerficacion.documentocertificaciondos, actualizacionacademica.nombrecursouno, actualizacionacademica.institucioncursouno, actualizacionacademica.fechainiciocursouno, actualizacionacademica.fechaterminocursouno,
actualizacionacademica.documentorecibecursouno, actualizacionacademica.nacionalprimero, actualizacionacademica.nombrecursodos, actualizacionacademica.institucioncursodos, actualizacionacademica.fechainiciocursodos,
actualizacionacademica.fechaterminocursodos, actualizacionacademica.documentorecibecursodos, actualizacionacademica.nacionalsegundo, actualizacionacademica.nombrecursotres, actualizacionacademica.institucioncursotres, 
actualizacionacademica.fechainiciocursotres, actualizacionacademica.fechaterminocursotres, actualizacionacademica.documentorecibecursotres, actualizacionacademica.nacionaltercero,
explaboralpublico.puestoempresauno, explaboralpublico.empresauno, explaboralpublico.empresados, explaboralpublico.empresatres, explaboralpublico.cbx_dependenciauno, explaboralpublico.puestoempresados, explaboralpublico.cbx_dependenciados, explaboralpublico.puestoempresatres, explaboralpublico.cbx_dependenciatres, explaboralpublico.tipopuestouno, explaboralpublico.empresadirecionuno, explaboralpublico.telcontactouno,
explaboralpublico.extencionuno, explaboralpublico.jefedirectouno, explaboralpublico.motivoseparacionuno, explaboralpublico.funcionespricipalesuno, explaboralpublico.fechainiciouno, explaboralpublico.fechaterminouno, 
explaboralpublico.puestoempresados, explaboralpublico.tipopuestodos, explaboralpublico.empresadirecdos, explaboralpublico.telcontactodos, explaboralpublico.extenciondos, explaboralpublico.jefedirectodos,
explaboralpublico.motivoseparaciondos, explaboralpublico.funcionespricipalesdos, explaboralpublico.fechainicidos, explaboralpublico.fechaterminodos, explaboralpublico.puestoempresatres,
explaboralpublico.tipopuestotres, explaboralpublico.empresadirectres, explaboralpublico.telcontactotres, explaboralpublico.extenciontres, explaboralpublico.jefedirectotres, explaboralpublico.motivoseparaciontres,
explaboralpublico.funcionespricipalestres, explaboralpublico.fechainiciotres, explaboralpublico.fechaterminotres,
explaboralprivado.nombrelaboralprivada, explaboralprivado.tipopuestoprivada, explaboralprivado.direccionempresaprivada, explaboralprivado.telefonoempresaprivada, explaboralprivado.extencionempresaprivada,
explaboralprivado.nombrejefeprivada, explaboralprivado.motivoseparacionprivada, explaboralprivado.funcionesprivada, explaboralprivado.fechainicioprivada,
explaboralprivado.fechaterminoprivada, explaboralprivado.nombrelaboralprivadados, explaboralprivado.tipopuestoprivadados, explaboralprivado.direccionempresaprivadados, explaboralprivado.telefonoempresaprivadados,
explaboralprivado.extencionempresaprivadados, explaboralprivado.nombrejefeprivadados, explaboralprivado.motivoseparacionprivadados, explaboralprivado.funcionesprivadados,
explaboralprivado.fechainicioprivadados, explaboralprivado.fechaterminoprivadados, explaboralprivado.nombrelaboralprivadatres, explaboralprivado.tipopuestoprivadatres, explaboralprivado.direccionempresaprivadatres,
explaboralprivado.telefonoempresaprivadatres, explaboralprivado.extencionempresaprivadatres, explaboralprivado.nombrejefeprivadatres, explaboralprivado.motivoseparacionprivadatres, explaboralprivado.funcionesprivadatres,
explaboralprivado.fechainicioprivadatres, explaboralprivado.fechaterminoprivadatres,
cientificaidioma.*
from datospersonales 
inner join estudiosmediosup on estudiosmediosup.id_postulado = datospersonales.id_datopersonal 
inner join posgespecilidad on posgespecilidad.id_postulado = datospersonales.id_datopersonal
inner join otrosestudiosaltaesp on otrosestudiosaltaesp.id_postulado = datospersonales.id_datopersonal 
inner join socialpracticas on socialpracticas.id_postulado = datospersonales.id_datopersonal 
inner join cerficacion on cerficacion.id_postulado = datospersonales.id_datopersonal 
inner join actualizacionacademica on actualizacionacademica.id_postulado = datospersonales.id_datopersonal
inner join explaboralpublico on explaboralpublico.id_postulado = datospersonales.id_datopersonal
inner join explaboralprivado on explaboralprivado.id_postulado = datospersonales.id_datopersonal
inner join cientificaidioma on cientificaidioma.id_postulado = datospersonales.id_datopersonal
where datospersonales.id_datopersonal = :id_datopersonal");
$query->execute(array(
    ':id_datopersonal'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaContratacion.php';
}else{

}
?>