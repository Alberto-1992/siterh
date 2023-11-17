<?php session_start();
error_reporting(0);
require_once 'clases/conexion.php';
$conexion = new Conexion();
$id = $_POST['id'];
$query = $conexion->prepare("SELECT datospersonales.id_datopersonal as id_principal, datospersonales.acceder, datospersonales.puesto, datospersonales.profesion, datospersonales.curp, datospersonales.rfc as rfcprincipal, datospersonales.nombre, datospersonales.appaterno, datospersonales.apmaterno, datospersonales.estado, 
datospersonales.delegacion, datospersonales.localidad, datospersonales.colonia, datospersonales.calle, datospersonales.numexterior, datospersonales.numinterior, datospersonales.codigopostal, 
datospersonales.fechanacimiento, datospersonales.entidadnacimiento, datospersonales.rfc, datospersonales.sexo, datospersonales.cartanaturalizacion, datospersonales.telefonocasa, datospersonales.telefonocelular, 
datospersonales.otrotelefono, datospersonales.correoelectronico, datospersonales.fechainicio as fechapostulado, 
estudiosmediosup.nombreformacionmedia, estudiosmediosup.nombremediasuperior, estudiosmediosup.fechainicio, estudiosmediosup.fechatermino, 
estudiosmediosup.tiempocursado, estudiosmediosup.documentomediosuperior,
estudiostecnico.*,
estudiospostecnico.*,
estudiossuperior.*,
estudiosmaestria.*,
especialidad.*,
doctorado.*,
diplomado.*,
otrosestudiosaltaesp.*,
t_estado.estado, t_municipio.municipio, 
t_localidad.localidad, descripcionpuestos.puesto,
socialpracticas.nombreserviciosocial, socialpracticas.fechainicioservicio, socialpracticas.fechaterminoservicio, socialpracticas.laboresservicio, 
socialpracticas.documentorecibeservicio, socialpracticas.nombrepracticas, socialpracticas.fechainiciopracticas, socialpracticas.fechaterminopracticas, socialpracticas.laborespracticas, 
socialpracticas.documentorecibepracticas,
explaboralpublico.puestoempresauno, explaboralpublico.empresauno, explaboralpublico.empresados, explaboralpublico.empresatres, explaboralpublico.cbx_dependenciauno, explaboralpublico.puestoempresados, explaboralpublico.cbx_dependenciados, explaboralpublico.puestoempresatres, explaboralpublico.cbx_dependenciatres, explaboralpublico.tipopuestouno, explaboralpublico.empresadirecionuno, explaboralpublico.telcontactouno,
explaboralpublico.extencionuno, explaboralpublico.jefedirectouno, explaboralpublico.motivoseparacionuno, explaboralpublico.funcionespricipalesuno, explaboralpublico.fechainiciouno, explaboralpublico.fechaterminouno, 
explaboralpublico.puestoempresados, explaboralpublico.tipopuestodos, explaboralpublico.empresadirecdos, explaboralpublico.telcontactodos, explaboralpublico.extenciondos, explaboralpublico.jefedirectodos,
explaboralpublico.motivoseparaciondos, explaboralpublico.funcionespricipalesdos, explaboralpublico.fechainicidos, explaboralpublico.fechaterminodos, explaboralpublico.puestoempresatres,
explaboralpublico.tipopuestotres, explaboralpublico.empresadirectres, explaboralpublico.telcontactotres, explaboralpublico.extenciontres, explaboralpublico.jefedirectotres, explaboralpublico.motivoseparaciontres,
explaboralpublico.funcionespricipalestres, explaboralpublico.fechainiciotres, explaboralpublico.fechaterminotres,
explaboralprivado.*,
cientificaidioma.*,
manifiesto.*
from datospersonales 
left outer join estudiosmediosup on estudiosmediosup.id_postulado = datospersonales.id_datopersonal 
left outer join estudiospostecnico on estudiospostecnico.id_empleado = datospersonales.id_datopersonal 
left outer join estudiostecnico on estudiostecnico.id_empleado = datospersonales.id_datopersonal
left outer join t_estado on t_estado.id_estado = datospersonales.estado 
left outer join t_municipio on t_municipio.id_municipio = datospersonales.delegacion 
left outer join t_localidad on t_localidad.id_localidad = datospersonales.localidad 
left outer join descripcionpuestos on descripcionpuestos.codigopuesto = datospersonales.puesto 
left outer join estudiossuperior on estudiossuperior.id_empleado = datospersonales.id_datopersonal 
left outer join estudiosmaestria on estudiosmaestria.id_empleado = datospersonales.id_datopersonal
left outer join socialpracticas on socialpracticas.id_postulado = datospersonales.id_datopersonal 
left outer join especialidad on especialidad.id_empleado = datospersonales.id_datopersonal 
left outer join doctorado on doctorado.id_empleado = datospersonales.id_datopersonal
left outer join otrosestudiosaltaesp on otrosestudiosaltaesp.id_postulado = datospersonales.id_datopersonal
left outer join diplomado on diplomado.id_empleado = datospersonales.id_datopersonal
left outer join explaboralpublico on explaboralpublico.id_postulado = datospersonales.id_datopersonal
left outer join explaboralprivado on explaboralprivado.id_postulado = datospersonales.id_datopersonal
left outer join cientificaidioma on cientificaidioma.id_postulado = datospersonales.id_datopersonal
left outer join manifiesto on manifiesto.id_postulado = datospersonales.id_datopersonal
where datospersonales.id_datopersonal = :id_datopersonal");
$query->execute(array(
    ':id_datopersonal'=>$id
));
$dataRegistro= $query->fetch();
if($dataRegistro != false){
    require 'frontend/vistaReclutamiento.php';
}else{

}

?>