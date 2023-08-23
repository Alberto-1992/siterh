<?php
//Proceso de conexi�n con la base de datos
/*
//require_once ("conmet.php");
include ("conex.php");


//Iniciar Sesi�n
session_start();

//Validar si se est� ingresando con sesi�n correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "Index.php"
</script>';
}

$id_usuario = $_SESSION['id_usuario'];
		
$c= "SELECT `PLAZAS`.EMP, `PLAZAS`.CODIGO, `PLAZAS`.DESCRIPCION FROM `PLAZAS` WHERE emp='".$id_usuario."'"; 
$r= mysql_query($c,$conex) or die (mysql_error());
$f=mysql_fetch_array($r);

$COD1= $f[1];
$DES1 = $f[2];

$id_usuario = $_SESSION['id_usuario'];
		
$C= "SELECT `datos personales`.EMP, `datos personales`.RFC, `datos personales`.CURP, `datos personales`.`A PATERNO`, `datos personales`.`A MATERNO`, `datos personales`.`NOMBRE(S)`, `plazas`.CODIGO, `plazas`.DESCRIPCION, `area de adscripcion`.DIRECCION, `area de adscripcion`.SER FROM `datos personales` INNER JOIN `plazas` ON `datos personales`.EMP = `plazas`.PLAZA INNER JOIN `generales` ON `datos personales`.EMP = `generales`.EMP INNER JOIN `area de adscripcion` ON generales.`AREA DE ADSCRIPCION` = `area de adscripcion`.IdADS WHERE `datos personales`.EMP='".$id_usuario."'";

$r= mysql_query($C,$conex) or die (mysql_error());
$f=mysql_fetch_array($r);

$emp= $f[0];
$rfc= $f[1];
$curp= $f[2];
$apellidos = $f[3];
$materno = $f[4];
$nombres = $f[5];
$COD= $f[6];
$DES = $f[7];
$DIR= $f[8];
$SER= $f[9];

$id_usuario = $_SESSION['id_usuario'];
		
$Consulta= "SELECT * FROM `metas2020` WHERE emp='".$id_usuario."'"; 
$r1= mysql_query($Consulta,$conex) or die (mysql_error());
$F1= mysql_fetch_array($r1);

 $emp= $F1[1];
$Fun1= $F1[2];
$Fun2= $F1[3];
$Fun3= $F1[4];
$Fun4= $F1[5];
$Fun5= $F1[6];
$Met1= $F1[7];
$REOB1= $F1[8];
$IND1= $F1[9];
$pon1= $F1[10];
$date1= $F1[11];
$NA1= $F1[12];
$NNA1= $F1[13];
$MA1= $F1[14];
$NMA1= $F1[15];
$SA1= $F1[16];
$NSA1= $F1[17];
$SO1= $F1[18];
$NSO1= $F1[19];
$Met2= $F1[21];
$REOB2= $F1[22];
$IND2= $F1[23];
$pon2= $F1[24];
$date2= $F1[25];
$NA2= $F1[26];
$NNA2= $F1[27];
$MA2= $F1[28];
$NMA2= $F1[29];
$SA2= $F1[30];
$NSA2= $F1[31];
$SO2= $F1[32];
$NSO2= $F1[33];
$Met3= $F1[35];
$REOB3= $F1[36];
$IND3= $F1[37];
$pon3= $F1[38];
$date3= $F1[39];
$NA3= $F1[40];
$NNA3= $F1[41];
$MA3= $F1[42];
$NMA3= $F1[43];
$SA3= $F1[44];
$NSA3= $F1[45];
$SO3= $F1[46];
$NSO3= $F1[47];
$Met4= $F1[49];
$REOB4= $F1[50];
$IND4= $F1[51];
$pon4= $F1[52];
$date4= $F1[53];
$NA4= $F1[54];
$NNA4= $F1[55];
$MA4= $F1[56];
$NMA4= $F1[57];
$SA4= $F1[58];
$NSA4= $F1[59];
$SO4= $F1[60];
$NSO4= $F1[61];
$Obse= $F1[63];

$Info = $emp.$rfc.$apellidos.$materno.$nombres;

$dir = 'temp/';
if(!file_exists($dir))
	mkdir($dir);

$filename = $dir.'test.png';

$tamanio = 2;
$level = 'H';
$frameSize = 3;
$contenido = $emp.$rfc.$apellidos.$materno.$nombres."Sistema de Evaluaci�n de Desempe�o del Personal Operativo 2020".$emp;

QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
 */
require_once ('../lib/pdf/mpdf.php');


$html ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; 
charset=iso-8859-1" />
<link rel="shortcut icon" href="icono.ico" />
<title>Registro de Metas del Personal Operativo</title>
<!-- Bootstrap -->
<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	
<style type="text/css">
		body
		{
			background: url(Imagenes/fondo.png);			
		}
					
			
</style>

	</head>
<body>
<table width="1124" border="0" align="center">
  <tbody>
    <tr>
      <td width="350"><img src="Imagenes/HRAEI2020.png" width="350" height="96" alt=""/></td>
      <td width="539" align="center"><p><strong>SISTEMA DE EVALUACI&Oacute;N DE DESEMPE&Ntilde;O DEL PERSONAL OPERATIVO </strong></p>
        <p><strong>REGISTRO DE METAS</strong></p>
      <td width="217" align="center"><?php echo <img src="'.$filename.'" />;?></td>
	<td width="0"></td>
     </tr>
  </tbody>
</table>
<form action="script_insertar.php" method="post" name="frm_registro" id="frm_registro">
<table width="1124" border="1" align="center" style="font-size: 12px">
  <tbody>
	<p></p>
    <p></p>
	
	 <tr></tr>
    <p></p>
	<p></p>
	  	  <tr>
	  <th colspan="5" scope="col" bgcolor="#3A940F">I. DATOS DEL SERVIDOR P�BLICO SUJETO A EVALUACI�N</th>
    </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">NOMBRE</th>
      <td width="212"><?php echo $nombres;?></td>
      <td width="212"><?php echo $apellidos;?></td>
      <td width="212"><?php echo $materno;?></td>
     </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">RFC</th>
      <td width="212" ><?php echo $rfc;?></td>
      <td width="212" bgcolor="#C7C5C5" ><strong>CURP</strong></td>
      <td width="212" ><?php echo $curp;?></td>
      </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">DEPENDENCIA O ENTIDAD</th>
      <td colspan="3">HOSPITAL REGIONAL DE ALTA ESPECIALIDAD IXTAPALUCA</td>
      </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">AREA DE ADSCRIPCION</th>
      <td colspan="2" $dir= $fil2[2];><?php echo $DIR;?></td>
      <td width="212" $dir= $fil2[2];><?php echo $SER;?></td>
      </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">NIVEL:</th>
      <td width="212"><?php echo $COD1;?></td>
      <td width="212" bgcolor="#C7C5C5"><strong>PUESTO QUE DESEMPE�A</strong></td>
      <td width="212"><?php echo $DES1;?></td>
      </tr>
    <tr>
      <th width="276" scope="row" bgcolor="#C7C5C5">GRUPO DE PUESTO AL QUE PERTENECE:</th>
      <td width="212">&nbsp;</td>
      <td width="212">&nbsp;</td>
      <td width="212">&nbsp;</td>
      </tr>
  </tbody>
</table>
<label for="date"></label>
<table width="1124" border="1" align="center" style="font-size: 12px">
  <tbody>
    <tr>
      <th colspan="2" bgcolor="#3A940F">II. PRINCIPALES FUNCIONES Y/O ACTIVIDADES QUE DESEMPE&Ntilde;A EL SERVIDOR P&Uacute;BLICO</></th>
    </tr>
    <tr>
      <td width="117" bgcolor="#C7C5C5" scope="row"><strong>1.- FUNCI&Oacute;N</th>
      </strong>
      <td width="989" align="justify" height="70"><?php echo $Fun1;?></td>        
    </tr>
    <tr>
      <td width="117" scope="row" bgcolor="#C7C5C5"><strong>2.- FUNCI&Oacute;N</th>
      </strong>
      <td width="989" align="justify" height="70"><?php echo $Fun2;?></td> 
    </tr>
    <tr>
      <td width="117" scope="row" bgcolor="#C7C5C5"><strong>3.- FUNCI&Oacute;N</th>
       </strong>
      <td width="989" align="justify" height="70"><?php echo $Fun3;?></td> 
    </tr>
    <tr>
     <td width="117" scope="row" bgcolor="#C7C5C5"><strong>4.- FUNCI&Oacute;N</th>
        </strong>
     <td width="989" align="justify" height="70"><?php echo $Fun4;?></td> 
    </tr>
    <tr>
      <td width="117" scope="row" bgcolor="#C7C5C5"><strong>5.- FUNCI&Oacute;N</th>
      </strong>
      <td width="989" align="justify" height="70"><?php echo $Fun5;?></td> 
    </tr>
  </tbody>
</table>
<p></p>
<p></p>
<table width="1125" border="1" align="center" style="font-size: 12px">
  <tbody>
    <tr>
      <td colspan="8" align="center" bgcolor="#3A940F"><strong>III. DESCRIPCI�N DE METAS</strong></th>
      </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $Met1;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">Ponderaci&oacute;n</td>
      <td width="118"><?php echo $pon1;?></td>
      <td width="42">&nbsp;</td>
	</tr>
    <tr>
      <td width="120" align="left" bgcolor="#3A940F">1ra. Meta</td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Fecha compromiso</td>
      <td><?php echo $date1;?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $REOB1;?></td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="justify" bgcolor="#C7C5C5">Resultado Obtenido</td>
      <td colspan="3" align="center" bgcolor="#C7C5C5"><strong>Niveles de Cumplimiento</strong></td>
      </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">No Aprobatorio</td>
      <td><?php echo $NNA1;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $IND1;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">M&iacute;nimo Aprobatorio</td>
      <td><?php echo $NMA1;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#C7C5C5">Indicador</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Satisfactorio</td>
      <td><?php echo $NSA1;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td align="left" bgcolor="#C7C5C5">Sobresaliente</td>
      <td><?php echo $NSO1;?></td>
      <td align="center"></td>
	</tr>
	<tr>
	<td height="30" colspan="8" bgcolor="#3A940F"></th>
	</tr>
<tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $Met2;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">Ponderaci&oacute;n</td>
      <td width="118"><?php echo $pon2;?></td>
      <td width="42">&nbsp;</td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#3A940F">2da. Meta</td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Fecha compromiso</td>
      <td><?php echo $date2;?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $REOB2;?></td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#C7C5C5">Resultado Obtenido</td>
      <td colspan="3" align="center" bgcolor="#C7C5C5"><strong>Niveles de Cumplimiento</strong></td>
      </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">No Aprobatorio</td>
      <td><?php echo $NNA2;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $IND2;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">M&iacute;nimo Aprobatorio</td>
      <td><?php echo $NMA2;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#C7C5C5">Indicador</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Satisfactorio</td>
      <td><?php echo $NSA2;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td align="left" bgcolor="#C7C5C5">Sobresaliente</td>
      <td><?php echo $NSO2;?></td>
      <td align="center"></td>
	</tr>
	<tr>
	<td height="30" colspan="8" bgcolor="#3A940F"></th>
	</tr>
<tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $Met3;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">Ponderaci&oacute;n</td>
      <td width="118"><?php echo $pon3;?></td>
      <td width="42">&nbsp;</td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#3A940F">3ra. Meta</td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Fecha compromiso</td>
      <td><?php echo $date3;?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $REOB3;?></td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#C7C5C5">Resultado Obtenido</td>
      <td colspan="3" align="center" bgcolor="#C7C5C5"><strong>Niveles de Cumplimiento</strong></td>
      </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">No Aprobatorio</td>
      <td><?php echo $NNA3;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $IND3;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">M&iacute;nimo Aprobatorio</td>
      <td><?php echo $NMA3;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#C7C5C5">Indicador</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Satisfactorio</td>
      <td><?php echo $NSA3;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td align="left" bgcolor="#C7C5C5">Sobresaliente</td>
      <td><?php echo $NSO3;?></td>
      <td align="center"></td>
	</tr>
	<tr>
	<td height="30" colspan="8" bgcolor="#3A940F"></th>
	</tr>
<tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $Met4;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">Ponderaci&oacute;n</td>
      <td width="118"><?php echo $pon4;?></td>
      <td width="42">&nbsp;</td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#3A940F">4ta. Meta</td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Fecha compromiso</td>
      <td><?php echo $date4;?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $REOB4;?></td>
      <td width="134">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#C7C5C5">Resultado Obtenido</td>
      <td colspan="3" align="center" bgcolor="#C7C5C5"><strong>Niveles de Cumplimiento</strong></td>
      </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td width="134" align="left" bgcolor="#C7C5C5">No Aprobatorio</td>
      <td><?php echo $NNA4;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td colspan="4" rowspan="3" align="justify"><?php echo $IND4;?></td>
      <td width="134" align="left" bgcolor="#C7C5C5">M&iacute;nimo Aprobatorio</td>
      <td><?php echo $NMA4;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120" align="left" bgcolor="#C7C5C5">Indicador</td>
      <td width="134" align="left" bgcolor="#C7C5C5">Satisfactorio</td>
      <td><?php echo $NSA4;?></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td width="120">&nbsp;</td>
      <td align="left" bgcolor="#C7C5C5">Sobresaliente</td>
      <td><?php echo $NSO4;?></td>
      <td align="center"></td>
	</tr>
	</tbody>
</table>
<p></p>
<table width="1124" border="1" align="center" style="font-size: 12px">
	<tr>
    	<td width="228" height="60" scope="row" bgcolor="#C7C5C5"><strong>OBSERVACIONES</strong></td>
        <td align="left" width="989" height="70"> <?php echo $Obse;?></td>
   	</tr>
</table>
<p></p>
<p></p>
<table width="1124" border="1" align="center" style="font-size: 12px">
	<tr>
	  <td height="140" align="center"><></td>
	  <td align="CENTER">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr>
   	  <td width="374" align="center" scope="row" bgcolor="#C7C5C5">NOMBRE Y FIRMA DEL EVALUADO</td>
      <td width="374" align="center" scope="row" bgcolor="#C7C5C5">NOMBRE Y FIRMA DEL EVALUADOR</td>
	  <td width="374" align="center" scope="row" bgcolor="#C7C5C5">NOMBRE Y FIRMA DEL JEFE INMEDIATO DEL EVALUADOR</td>
   	</tr>
</table>

<p></p>
<p></p>	

  </form>
  
   </body>
</html>';
$html .= '		

';

$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('Prueba.pdf', 'I');


?>