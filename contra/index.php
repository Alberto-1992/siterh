<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/CSS" href="stilos.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
    <title>Hello, world!</title>
    </head>
    <body>
        <header class="header">
        <span id="cabecera">Creación de perfil de puesto</span>
        </header>
    <div class="container" style="padding: 15px;">

    <table id="table" class="table">
 <thead class="table-dark">
 <th scope="col" style ="text-align: center;" colspan="6">A. DATOS GENERALES </th>            
         </tr>
         </thead>
         <tbody>
        
         <tr>
         <td colspan="1" span class="input-group-text1" id="addon-wrapping" > PLAZA:</span>
         <input type="text" name="plaz" class="form-control" placeholder="PLAZA" aria-label="Username1" aria-describedby="addon-wrapping">
         
         <td colspan="1" span class="input-group-text1" id="addon-wrapping" > CÓDIGO DEL PUESTO:</span>
         <input type="text" name="codigo" class="form-control" placeholder="CÓDIGO DEL PUESTO" aria-label="Username1" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap">
         </div>
         
         <td colspan="2" span class="input-group-text1" id="addon-wrapping" >DENOMINACIÓN DEL PUESTO: </span>
         <input type="text" name="denominacion" class="form-control" placeholder="DENOMINACIÓN DEL PUESTO" aria-label="Username2" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap">
         </div>         
         </tr>
        
         <tr>
         <td span class="input-group-text2" id="addon-wrapping" >NOMBRE DEL PUESTO: </span>
         <input type="text" name="puesto" class="form-control" placeholder="NOMBRE DEL PUESTO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap">
         </div>
         
         <td span class="input-group-text2" id="addon-wrapping" >CARACTERISTICA OCUPACIONAL: </span>
         <input type="text" name="caracteristica" class="form-control" placeholder="CARACTERISTICA OCUPACIONAL" aria-label="Username3" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap">
         </div>
        
         <td span class="input-group-text2" id="addon-wrapping" >DIRECCIÓN DE ADSCRIPCIÓN: </span>
         <input type="text" name="direccion" class="form-control" placeholder="DIRECCIÓN DE ADSCRIPCIÓN" aria-label="Username3" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap">
         </tr>

         <td span class="input-group-text2" id="addon-wrapping"> SUBDIRECCIÓN DE ADSCRIPCIÓN: </span>
         <input type="text" name="subdireccion" class="form-control"placeholder="SUBDIRECCIÓN DE ADSCRIPCIÓN" aria-label="Username3" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap"></div>

         <td colspan="2" span class="input-group-text2" id="addon-wrapping"> SERVICIO:</span>
         <input type="txt" name="servi" class="form-control" placeholder="SERVICIO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
         <div class="input-group flex-nowrap"></div>
 </tbody>
</table>

<table id="table" class="table">
<thead class="table-dark">
<tr> <th scope="col" style ="text-align: center;" colspan="6">B. DESCRIPCIÓN DEL PUESTO </th>   </tr>
<th scope="col" style ="text-align: left;" colspan="6">I. DATOS DE IDENTIFICACIÓN DEL PUESTO </th>   
</thead>
<tbody>

<td span class="input-group-text2" id="addon-wrapping"> NOMBRE DE LA INSTITUCIÓN:</span>
<input type="txt" name="institucion" class="form-control" placeholder="NOMBRE DE LA INSTITUCIÓN" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>


<td span class="input-group-text2" id="addon-wrapping"> RAMA DE CARGO:</span>
<input type="txt" name="cargo" class="form-control" placeholder="RAMA DE CARGO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>


<td span class="input-group-text2" id="addon-wrapping"> NOMBRAMIENTO:</span>
<input type="txt" name="nombra" class="form-control" placeholder="NOMBRAMIENTO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"> TIPO DE FUNCIONES:</span>
<input type="txt" name="func" class="form-control" placeholder="TIPO DE FUNCIONES" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"> CÓDIGO DEL PUESTO DEL SUPERIOR JERARQUICO:</span>
<input type="txt" name="jerarqui" class="form-control" placeholder="CÓDIGO DEL PUESTO DEL SUPERIOR JERARQUICO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"> DENOMINACIÓN DEL PUESTO DEL SUPERIOR JERARQUICO:</span>
<input type="txt" name="denomi" class="form-control" placeholder="DENOMINACIÓN DEL PUESTO DEL SUPERIOR JERARQUICO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"> NOMBRE DEL PUESTO DEL  SUPERIOR JERARQUICO:</span>
<input type="txt" name="supe" class="form-control" placeholder="NOMBRE DEL PUESTO DEL  SUPERIOR JERARQUICO" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"> UNIDAD ADMINISTRATIVA:</span>
<input type="txt" name="unidad" class="form-control" placeholder="UNIDAD ADMINISTRATIVA" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>
</tr>
</tbody>
</table>

     <table id="table" class="table">
     <thead class="table-dark">
     <th scope="col" style ="text-align: center;" colspan="6"> II. OBJETIVO GENERAL DEL PUESTO </th>  
     </thead>
     <tbody>

     <tr>  <td div class="input-group">
     <textarea class="form-control" name="objeti" aria-label="With textarea"></textarea>
     </div> </td>
     </tr>

     <td colspan="6" span class="input-group-text2" id="addon-wrapping"></span>
     <input type="txt" name="klo" class="form-control" aria-label="Username3" aria-describedby="addon-wrapping"></td>
     <div class="input-group flex-nowrap"></div>

     <tr>  <td div class="input-group">
     <textarea class="form-control" name="obje" aria-label="With textarea"></textarea>
     </div> </td>
     </tr>    
     </tbody>
     </table>

<table id="table" class="table">
<thead class="table-dark">
<th scope="col" style ="text-align: center;" colspan="6"> III. FUNCIONES </th>  
</thead>
<tbody>

<td colspan="6" span class="input-group-text2" id="addon-wrapping"></span>
<input type="txt" name="seo" class="form-control" aria-label="Username3" aria-describedby="addon-wrapping"></td>
<div class="input-group flex-nowrap"></div>

<tr> <td div class="input-group">
<span class="input-group-text">1</span>
<textarea class="form-control" name="uno" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">2</span>
<textarea class="form-control" name="dos" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">3</span>
<textarea class="form-control" name="tres" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">4</span>
<textarea class="form-control" name="cuatro" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">5</span>
<textarea class="form-control" name="quinto" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">6</span>
<textarea class="form-control" name="sexto" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">7</span>
<textarea class="form-control" name="septimo" aria-label="With textarea"></textarea>
</div> </td></tr>

<tr> <td div class="input-group">
<span class="input-group-text">8</span>
<textarea class="form-control" name="octavo" aria-label="With textarea"></textarea>
</div> </td></tr>
</tbody>
</table>

     <table id="table" class="table">
     <thead class="table-dark">
     <th scope="col" style ="text-align: center;" colspan="6"> IV. RELACIONES INTERNAS Y/O EXTERNAS.</th>  
     </thead>
     <tbody>

     <td colspan="6" span class="input-group-text2" id="addon-wrapping"> TIPO DE RELACIÓN:</span>
     <input type="txt" name="unidad" class="form-control" placeholder="TIPO DE RELACIÓN" aria-label="Username3" aria-describedby="addon-wrapping"></td>
     <div class="input-group flex-nowrap"></div>

     <tr><th> <h6>Explicar brevemente con que áreas o puestos tiene relación y ¿para qué?.</h6></th></tr>

     <tr> <td div class="input-group">
     <span class="input-group-text">INTERNAS</span>
     <textarea class="form-control" name="inte" aria-label="With textarea"></textarea>
     </div> </td></tr>

     <tr> <td div class="input-group">
     <span class="input-group-text">DESCRIPCIÓN</span>
     <textarea class="form-control" name="cion" aria-label="With textarea"></textarea>
     </div> </td></tr>

     <tr> <td div class="input-group">
     <span class="input-group-text">EXTERNAS</span>
     <textarea class="form-control" name="ternas" aria-label="With textarea"></textarea>
     </div> </td></tr>

     <tr> <td div class="input-group">
     <span class="input-group-text">DESCRIPCIÓN</span>
     <textarea class="form-control" name="crip" aria-label="With textarea"></textarea>
     </div> </td></tr>

     <tr><th> <h6>Elija en dónde tiene impacto la información que maneja el puesto.</h6></th></tr>

     <td colspan="6" span class="input-group-text2" id="addon-wrapping"> CARACTERÍSTICA DE LA INFORMACIÓN:</span>
     <input type="txt" name="info" class="form-control" placeholder="CARACTERÍSTICA DE LA INFORMACIÓN" aria-label="Username3" aria-describedby="addon-wrapping"></td>
     <div class="input-group flex-nowrap"></div>
     </tr>
     </tbody>
     </table>

<table id="table" class="table">
<thead class="table-dark">
<th scope="col" style ="text-align: center;" colspan="6"> V. ASPECTOS RELEVANTES DEL PUESTO</th>  </tr>
</thead>
<tbody>

<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="clt" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="ope" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="opr" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="sil" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="wil" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="juar" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
</tbody>
</table>

     <table id="table" class="table">
     <thead class="table-dark">
     <th scope="col" style ="text-align: left;" colspan="6">Explicar brevemente la elección de los aspectos.</th>  </tr>
     </thead>
     <tbody>

     <tr> <td div class="input-group">
     <span class="input-group-text">ACTOS DE AUTORIDAD ESPECÍFICOS DEL PUESTO:</span>
     <textarea class="form-control" name="autori" aria-label="With textarea"></textarea>
     </div> </td></tr>
     
     <tr> <td div class="input-group">
     <span class="input-group-text">PUESTOS SUBORDINADOS: </span>
     <textarea class="form-control" name="suborn" aria-label="With textarea"></textarea>
     </div> </td></tr>
    
     <tr> <td div class="input-group">
     <span class="input-group-text"> PRESUPUESTO BAJO SU RESPONSABILIDAD:  </span>
     <textarea class="form-control" name="bajo" aria-label="With textarea"></textarea>
     </div> </td></tr>
     
     <tr> <td div class="input-group">
     <span class="input-group-text"> RETOS Y COMPLEJIDAD EN EL DESEMPEÑO DEL PUESTO:  </span>
     <textarea class="form-control" name="retos" aria-label="With textarea"></textarea>
     </div> </td></tr>

     <tr> <td div class="input-group">
     <span class="input-group-text"> TRABAJO TÉCNICO CALIFICADO:  </span>
     <textarea class="form-control" name="calificado" aria-label="With textarea"></textarea>
     </div> </td></tr>  

     <tr> <td div class="input-group">
     <span class="input-group-text"> TRABAJO DE ALTA ESPECIALIZACIÓN:  </span>
     <textarea class="form-control" name="alta" aria-label="With textarea"></textarea>
     </div> </td></tr>  
     
     <tr><td div class="mb-3">
     <label for="formGroupExampleInput2" class="form-label">Debe declarar situación patrimonial.</label>
     <input type="text" class="form-control" name="patrimonial" id="formGroupExampleInput2">
  
</div></tr> </td>
     </tbody>
     </table>

<table id="table" class="table">
<thead class="table-dark">
<th scope="col" style ="text-align: center;" colspan="6">C. PERFIL DEL PUESTO</th>  </tr>
<th scope="col" style ="text-align: left;" colspan="6"> I. ESCOLARIDAD Y ÁREAS DE CONOCIMIENTO </th>  </tr>
</thead>
<tbody>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label">NIVEL ACADÉMICO: </label>
<input type="text" class="form-control" name="academi" id="formGroupExampleInput2">
</div></tr> </td>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label">GRADO DE AVANCE: </label>
<input type="text" class="form-control" name="gredav" id="formGroupExampleInput2">
</div></tr> </td>

<tr><th> <h6>Seleccionar el área general y carrera genérica requeridas para la ocupación del puesto.</h6></th></tr>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> ÁREA GENERAL </label>
<input type="text" class="form-control" name="aragene" id="formGroupExampleInput2">
</div></tr> </td>

<tr><div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="aral" class="form-control" id="formGroupExampleInput2"></td>
</div></tr>

<tr><div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="segareal" class="form-control" id="formGroupExampleInput2"></td>
</div></tr>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> CARRERA GENÉRICA </label>
<input type="text" class="form-control" name="carrerane" id="formGroupExampleInput2">
</div></tr> </td>

<tr><div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="sinmbre" class="form-control" id="formGroupExampleInput2"></td>
</div></tr>

<tr><div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="sedon" class="form-control" id="formGroupExampleInput2"></td>
</div></tr>
</tbody>
</table>

     <table id="table" class="table">
     <thead class="table-dark">
     <th scope="col" style ="text-align: center;" colspan="6">ESPECIALIDAD 1</th></tr>
     </thead>
     <tbody>
     
     <tr><td colspan="6" div class="mb-3">
     <label for="formGroupExampleInput2" class="form-label"> ÁREA GENERICA</label>
     <input type="text" class="form-control" name="argen" id="formGroupExampleInput2">
     </div></tr> </td>

     <tr><td colspan="6" div class="mb-3">
     <label for="formGroupExampleInput2" class="form-label"> NOMBRE DE LA ESPECIALIDAD</label>
     <input type="text" class="form-control" name="especial" id="formGroupExampleInput2">
     </div></tr> </td>

     <tr><td colspan="6" div class="mb-3">
     <label for="formGroupExampleInput2" class="form-label">GRADO DE AVANCE </label>
     <input type="text" class="form-control" name="gradnava" id="formGroupExampleInput2">
     </div></tr> </td>

     </tbody>
     </table>

<table id="table" class="table">
<thead class="table-dark">
<th scope="col" style ="text-align: center;" colspan="6">ESPECIALIDAD 2</th></tr>
</thead>
<tbody>
     
<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> ÁREA GENERICA</label>
<input type="text" class="form-control" name="reagn" id="formGroupExampleInput2">
</div></tr> </td>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> NOMBRE DE LA ESPECIALIDAD</label>
<input type="text" class="form-control" name="bredad" id="formGroupExampleInput2">
</div></tr> </td>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label">GRADO DE AVANCE </label>
<input type="text" class="form-control" name="doava" id="formGroupExampleInput2">
</div></tr> </td>
</tbody>
</table>

   <table id="table" class="table">
   <thead class="table-dark">
   <th scope="col" style ="text-align: center;" colspan="6">ESPECIALIDAD 3</th></tr>
   </thead>
   <tbody>
     
   <tr><td colspan="6" div class="mb-3">
   <label for="formGroupExampleInput2" class="form-label"> ÁREA GENERICA</label>
   <input type="text" class="form-control" name="neric" id="formGroupExampleInput2">
   </div></tr> </td>

   <tr><td colspan="6" div class="mb-3">
   <label for="formGroupExampleInput2" class="form-label"> NOMBRE DE LA ESPECIALIDAD</label>
   <input type="text" class="form-control" name="cialid" id="formGroupExampleInput2">
   </div></tr> </td>

   <tr><td colspan="6" div class="mb-3">
   <label for="formGroupExampleInput2" class="form-label">GRADO DE AVANCE </label>
   <input type="text" class="form-control" name="radonce" id="formGroupExampleInput2">
   </div></tr> </td>
   </tbody>
   </table>

<table id="table" class="table">
<thead class="table-dark">
<th scope="col" style ="text-align: center;" colspan="6">ESPECIALIDAD 4</th></tr>
</thead>
<tbody>
     
<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> ÁREA GENERICA</label>
<input type="text" class="form-control" name="riare" id="formGroupExampleInput2">
</div></tr> </td>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label"> NOMBRE DE LA ESPECIALIDAD</label>
<input type="text" class="form-control" name="omdela" id="formGroupExampleInput2">
</div></tr> </td>

<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label">GRADO DE AVANCE </label>
<input type="text" class="form-control" name="dodeva" id="formGroupExampleInput2">
</div></tr> </td>
</tbody>
</table>


  <table id="table" class="table">
  <thead class="table-dark">
  <th scope="col" style ="text-align: center;" colspan="6">CERTIFICACIONES</th></tr>
  </thead>
  <tbody>
     
  <tr><td colspan="6" div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label"> CERTIFICACIÓN 1</label>
  <input type="text" class="form-control" name="cerku" id="formGroupExampleInput2">
  </div></tr> </td>

  <tr><td colspan="6" div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label"> CERTIFICACIÓN 2</label>
  <input type="text" class="form-control" name="serti" id="formGroupExampleInput2">
 </div></tr> </td>

  <tr><td colspan="6" div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">OTRA CERTIFICACIÓN O DIPLOMADO </label>
  <input type="text" class="form-control" name="luxd" id="formGroupExampleInput2">
  </div></tr> </td>
  </tbody>
  </table>


<table id="table" class="table">
<thead class="table-dark">
<tr><th scope="col" style ="text-align: center;" colspan="6">II. EXPERIENCIA LABORAL</th>

</tr>
</thead>
<tbody>
<tr><td colspan="6" div class="mb-3">
<label for="formGroupExampleInput2" class="form-label">REQUISITO MÍNIMO DE EXPERIENCIA: </label>
<input type="text" class="form-control" name="remini" id="formGroupExampleInput2">
<h6>Seleccionar la o las áreas de experiencia y áreas generales requeridas para la ocupación del puesto. </h6></td>
</div>


<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label">ÁREA DE EXPERIENCIA</label>
<input type="text" name="reperin" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label">ÁREA GENERAL </label>
<input type="text" name="nelal" class="form-control" id="formGroupExampleInput2"></td>
</div>

</tr>
<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="sin" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="plak" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

</tr>
<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="fask" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="qentu" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

</tr>
<tr>
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="asfer" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="jojo" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
</tbody>
</table>

    <table id="table" class="table">
    <thead class="table-dark">
    <tr><th scope="col" style ="text-align: center;" colspan="6"> III. REQUERIMIENTOS O CONDICIONES ESPECÍFICAS</th>
    </tr>
    </thead>
    <tbody>
    <td colspan="6"><h6>En caso de que el puesto requiera condiciones especiales de trabajo llene el siguiente apartado. </h6></td>
    
    <tr>      
    <td div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">DISPONIBILIDAD PARA VIAJAR: </label>
    <input type="text" class="form-control" name="viaje" id="formGroupExampleInput2"></div>
    
    
    <td div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">FRECUENCIA: </label>
    <input type="text" class="form-control" name="dispopa" id="formGroupExampleInput2"></td> 
    </div> 
  
    <td div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">CAMBIO DE RESIDENCIA: </label>
    <input type="text" class="form-control" name="livije" id="formGroupExampleInput2"></td> 
    </div>

    <td div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">PERIODOS ESPECIALES DE TRABAJO: </label>
    <input type="text" class="form-control" name="perklo" id="formGroupExampleInput2"></td> 
    </div>
    </tr>
    
    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">TURNO: </label>
    <input type="text" class="form-control" name="urno" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label colspan="6" for="formGroupExampleInput2" class="form-label">JORNADA: </label>
    <input type="text" class="form-control" name="nada" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">HORARIO: </label>
    <input type="text" class="form-control" name="rario" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">DÍAS DE TRABAJO: </label>
    <input type="text" class="form-control" name="bajo" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">CONDICIONES ESPECÍFICAS DE TRABAJO: (AMBIENTALES, TEMPERATURA, RUIDO, ESPACIO)</label>
    <textarea class="form-control" name="ambite" rows="3"></textarea></td>
    </div></tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">ESPECIFICACIONES ERGONÓMICAS:  ACCIÓN, ATRIBUTO O ELEMENTO DE LA TAREA, EQUIPO O AMBIENTE DE TRABAJO, O UNA COMBINACIÓN DE LOS ANTERIORES, QUE DETERMINA UN AUMENTO EN LA PROBABILIDAD DE DESARROLLAR ALGUNA ENFERMEDAD O LESIÓN.</label>
    <textarea class="form-control" name="ergonomi" rows="3"></textarea></td>
    </div></tr>
    </tbody>
    </table>  
    
<table id="table" class="table">
<thead class="table-dark">
<tr><th scope="col" style ="text-align: center;" colspan="6"> IV. COMPETENCIAS O CAPACIDADES </th>
<tr><th scope="col" style ="text-align: left;" colspan="6"> IV.II COMPETENCIAS GENÉRICAS </th>
</tr>
</thead>
<tbody>
<tr>
<td colspan="6"><h6> COMPETENCIAS ORGANIZACIONALES </h6></td>
</tr>
<tr>
<td><h6> A </h6></td>    
<td><h6> COMPETENCIA  </h6></td>
<td><h6> NIVEL REQUERIDO </h6></td>
<td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
</tr>

<tr>
<td><h6> 1 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="polun" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="erti" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="coli" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 2 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="oust" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="verti" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="tresma" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 3 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="pums" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="kaos" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="inspli" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 4 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="vole" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="jolk" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="airo" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
</tbody>
</table>

     <table id="table" class="table">
     <thead class="table-dark">
     </thead>
     <tbody>
     <tr>
     <td colspan="6"><h6>COMPETENCIAS ÉTICO INTEGRATIVAS </h6></td>
     </tr>
     <tr>
     <td><h6> B </h6></td>    
     <td><h6> COMPETENCIA  </h6></td>
     <td><h6> NIVEL REQUERIDO </h6></td>
     <td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
     </tr>   
     
     <tr>
     <td><h6> 1 </h6></td>    
     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="herun" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="eto" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="oluis" class="form-control" id="formGroupExampleInput2"></td>
     </div>
     </tr>

     <tr>
     <td><h6> 2 </h6></td>    
     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="pepe" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="esplo" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="ask" class="form-control" id="formGroupExampleInput2"></td>
     </div>
     </tr>

     <tr>
     <td><h6> 3 </h6></td>    
     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="sol" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="lua" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="explo" class="form-control" id="formGroupExampleInput2"></td>
     </div>
     </tr>

     <tr>
     <td><h6> 4 </h6></td>    
     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="info" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="herk" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="pr" class="form-control" id="formGroupExampleInput2"></td>
     </div>
     </tr>

     <tr>
     <td><h6> 5 </h6></td>    
     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="compi" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="precio" class="form-control" id="formGroupExampleInput2"></td>
     </div>

     <div class="mb-3">
     <td label for="formGroupExampleInput2" class="form-label"></label>
     <input type="text" name="flot" class="form-control" id="formGroupExampleInput2"></td>
     </div>
     </tr>
     </tbody>
     </table>


<table id="table" class="table">
<thead class="table-dark">
</thead>
<tbody>
<tr>
<td colspan="6"><h6>COMPETENCIAS GERENCIALES</h6></td>
</tr>
<tr>
<td><h6> C </h6></td>    
<td><h6> COMPETENCIA  </h6></td>
<td><h6> NIVEL REQUERIDO </h6></td>
<td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
</tr>   

<tr>
<td><h6> 1 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="ompecil" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="genera" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="comcias" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 2 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="uali" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="lge" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="propis" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
   
<tr>
<td><h6> 3 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="longe" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="quirip" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="flut" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
</tbody>
</table>

    <table id="table" class="table">
    <thead class="table-dark">
    <tr><th scope="col" style ="text-align: center;" colspan="6"> COMPETENCIAS BÁSICAS  </th>
    </thead>
    <tbody>
    <tr>
    <td colspan="6"><h6> COMPETENCIAS DE EFICACIA PERSONAL </h6></td>
    </tr>
    <tr>
    <td><h6> A </h6></td>    
    <td><h6> COMPETENCIA  </h6></td>
    <td><h6> NIVEL REQUERIDO </h6></td>
    <td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
    </tr>   
    

    <tr>
    <td><h6> 1 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="pefica" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="cripc" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="efikl" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 2 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="ppomp" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="exton" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="pkinh" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>
   
    <tr>
    <td><h6> 3 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="redmo" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="seleco" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="trins" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 4 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="pazpl" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="ensol" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="oslei" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>
    </tbody>
    </table>

<table id="table" class="table">
<thead class="table-dark">
</thead>
<tbody>
<tr>
<td colspan="6"><h6> COMPETENCIAS COGNOSCITIVAS </h6></td>
</tr>
<tr>
<td><h6> B </h6></td>    
<td><h6> COMPETENCIA  </h6></td>
<td><h6> NIVEL REQUERIDO </h6></td>
<td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
</tr>

<tr>
    <td><h6> 1 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="faus" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="encog" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="citivas" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 2 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="tivas" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="nosci" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="encisel" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 3 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="lilo" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="empesn" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="wonlk" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 4 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="asvom" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="uyco" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="copeye" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 5 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="kalos" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="hoen" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="zanzin" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>
    </tbody>
    </table>

<table id="table" class="table">
<thead class="table-dark">
</thead>
<tbody>
<tr>
<td colspan="6"><h6> COMPETENCIAS MOTIVACIONALES </h6></td>
</tr>
<tr>
<td><h6> C </h6></td>    
<td><h6> COMPETENCIA  </h6></td>
<td><h6> NIVEL REQUERIDO </h6></td>
<td><h6> DESCRIPCIÓN DEL NIVEL DE DOMINIO </h6></td>
</tr>

<tr>
<td><h6> 1 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="joiu" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="motu" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="vaciojk" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 2 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="naleso" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="eshol" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="perxovn" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 3 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="qintem" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="galnm" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="nimna" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>

<tr>
<td><h6> 4 </h6></td>    
<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="vihlom" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="anuuel" class="form-control" id="formGroupExampleInput2"></td>
</div>

<div class="mb-3">
<td label for="formGroupExampleInput2" class="form-label"></label>
<input type="text" name="emmaaa" class="form-control" id="formGroupExampleInput2"></td>
</div>
</tr>
</tbody>
</table>


    <table id="table" class="table">
    <thead class="table-dark">    
    <tr><th scope="col" style ="text-align: center;" colspan="6"> PERFIL SUSCEPTIBLE DE ACREDITACIONES </th>
    </thead>
    <tbody>

    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">ACREDITACIÓN </label>
    <input type="text" class="form-control" name="bebere" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">ACREDITACIÓN </label>
    <input type="text" class="form-control" name="dijose" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">ACREDITACIÓN </label>
    <input type="text" class="form-control" name="ditacoon" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">ACREDITACIÓN </label>
    <input type="text" class="form-control" name="llorinm" id="formGroupExampleInput2"></td> 
    </div>
    </tr>

    <tr>
    <td colspan="6" div class="mb-3">
    <label  for="formGroupExampleInput2" class="form-label">ACREDITACIÓN </label>
    <input type="text" class="form-control" name="epekna" id="formGroupExampleInput2"></td> 
    </div>
    </tr>
    </tbody>
    </table>

<table id="table" class="table">
<thead class="table-dark">    
<tr><th scope="col" style ="text-align: center;" colspan="6"> V. REQUISITOS MÉDICOS NECESARIOS  </th>
</thead>
<tbody>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label">CERTIFICADO MÉDICO </label>
<input type="text" class="form-control" name="certimedi" id="formGroupExampleInput2"></td> 
</div>

<td  div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="mientoes" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> ESTUDIO MÉDICO REQUERIDO: </label>
<input type="text" class="form-control" name="merequerid" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="requernm" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> ESTUDIO MÉDICO REQUERIDO: </label>
<input type="text" class="form-control" name="estadco" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="rekientoos" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> ESTUDIO MÉDICO REQUERIDO: </label>
<input type="text" class="form-control" name="tudioco" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="quirisnl" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> VACUNA REQUERIDA:  </label>
<input type="text" class="form-control" name="vacurid" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="rerimenta" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> VACUNA REQUERIDA:  </label>
<input type="text" class="form-control" name="vacoreque" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="rimentdos" id="formGroupExampleInput2"></td> 
</div>
</tr>

<tr>
<td colspan="4" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> VACUNA REQUERIDA:  </label>
<input type="text" class="form-control" name="vaconsirequeri" id="formGroupExampleInput2"></td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> REQUERIMIENTO: </label>
<input type="text" class="form-control" name="entopla" id="formGroupExampleInput2"></td> 
</div>
</tr>
</tbody>
</table>

    <table id="table" class="table">
    <thead class="table-dark">    
    <tr><th scope="col" style ="text-align: center;" colspan="5"> VI. CLASIFICACIÓN DE RIESGOS DEL PUESTO </th></tr>
    </thead>
    <tbody>
    <tr>
    <td ><h6> NP.  </h6></td>
    <td  ><h6> RIESGO </h6></td>
    <td ><h6> TIPO DE RIESGO </h6></td>
    </tr>      
    
    <tr>
    <td><h6> 1 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="vip" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="clacae" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 2 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="nopsl" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="meli" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>

    <tr>
    <td><h6> 3 </h6></td>    
    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="sonsop" class="form-control" id="formGroupExampleInput2"></td>
    </div>

    <div class="mb-3">
    <td label for="formGroupExampleInput2" class="form-label"></label>
    <input type="text" name="paens" class="form-control" id="formGroupExampleInput2"></td>
    </div>
    </tr>
    <tr>
    <td colspan="6"><h6>OBSERVACIONES: SI EXISTE ALGÚN OTRO ASPECTO QUE CONSIDERE IMPORTANTE DEL PUESTO Y QUE NO ESTÉ CONSIDERADO EN EL FORMATO, ANOTARLO EN EL SIGUIENTE RECUADRO.  </h6></td>

<tr> <td colspan="6" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"> OBSERVACIONES: </label>
<input type="text" class="form-control" name="obmensa" id="formGroupExampleInput2"></td> 
</div></tr>
</tbody>
</table>

<table id="table" class="table">
<thead class="table-dark">    
<tr><th scope="col" style ="text-align: center;" colspan="5"> NOMBRE Y FIRMA </th></tr>
</thead>
<tbody>

<tr>
<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label">  </label>
<input type="text" class="form-control" name="nomfre" id="formGroupExampleInput2">
<h6>OCUPANTE DEL PUESTO (TOMA DE CONOCIMIENTO)  </h6>
</td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label">  </label>
<input type="text" class="form-control" name="fifaer" id="formGroupExampleInput2">
<h6>JEFE INMEDIATO  </h6>
</td> 
</div>
</tr>

<tr>
<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label">  </label>
<input type="text" class="form-control" name="especiajm" id="formGroupExampleInput2">
<h6>ESPECIALISTA  </h6>
</td> 
</div>

<td div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label">  </label>
<input type="text" class="form-control" name="dgrh" id="formGroupExampleInput2">
<h6> DGRH o EQUIVALENTE  </h6>
</td> 
</div>
</tr>

<tr> <td colspan="6" div class="mb-3">
<label  for="formGroupExampleInput2" class="form-label"><h6> FECHA DE APROBACIÓN / ÚLTIMA ACTUALIZACIÓN </h6> </label>
<input type="text" class="form-control" name="ultomae" id="formGroupExampleInput2"><h6>día/mes/año.</h6></td> 
</div></tr>
</tbody>
</table>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
</body>
</html>