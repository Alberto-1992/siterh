<div class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="cancerbucal">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
<script src="js/getCatalogos.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="js/scriptModalvalidacionBucal.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalBucal">
                <span class="material-symbols-outlined" style="color: white;">
                    person_add
                </span>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
            </div>
 
            <div class="modal-body">
                <div id="panel_editar">
                    <div class="modal-body">
                        <div class="form-header">
                            <h5 class="form-title" style="text-align: center;
                                    background-color: #d9a4a5;
                                    color: aliceblue;
                                    margin-top:5px;">
                                👩🏻 DATOS DEL PACIENTE 🙍🏻‍♂️</h5>
                        </div>
                        <form name="formulariocancerbucal" id="formulariocancerbucal" onSubmit="return limpiar()" autocomplete="off">
                            <div class="form-row">
                                <div id="mensaje"></div>
                                <script>
                                    $("#formulariocancerbucal").on("submit", function(e) {
                                            if($('input[name=curp]').val().length == 0 || $(
                                                'input[name=nombrecompleto]')
                                            .val().length == 0 || $('select[name=cbx_estado]').val().length == 0
                                        ) {
                                            alert('Ingrese los datos requeridos');

                                            return false;
                                            
                                        }
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();

                                        var formData = new FormData(document.getElementById(
                                            "formulariocancerbucal"));
                                        formData.append("dato", "valor");

                                        $.ajax({

                                            url: "registrarpacienteCancerBucal.php",
                                            type: "post",
                                            dataType: "html",
                                            data: formData,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            beforeSend: function(datos){
                                                $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                                            },
                                            success: function(datos) {
                                                $("#mensaje").html(datos);

                                            }
                                        })
                                    })
                                </script>
                                <div class="col-md-6" autocomplete="off">
                                    <input id="year" name="year" class="form-control" type="hidden" value="2022" required="required" readonly>
                                </div>
                                <div class="col-md-12">
                                    <input id="cest" name="cest" type="hidden" class="form-control" value="cest">
                                </div>
                                <!-- Inicia formulario de Datos del Paciente-->
                                <div class="col-md-4">
                                    <strong>CURP</strong>
                                    <input list="curpusuario" id="curp" name="curp" type="text" class="form-control" onblur="curp2datebucal();" minlength="18" maxlength="18" required>
                                    <datalist id="curpusuario">
                                        <option value="">Seleccione</option>
                                        <?php
                                        require 'conexionCancer.php';
                                        $query = $conexionCancer->prepare("SELECT curpbucal FROM dato_usuariobucal ");
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['curpbucal']; ?>">
                                                <?php echo $row['curpbucal']; ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                                <div class="col-md-4">
                                    <strong>Nombre Completo</strong>
                                    <input id="nombrecompleto" name="nombrecompleto" onblur="calcularEdadbucal();" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <strong>Escolaridad</strong>
                                    <select id="escolaridad" name="escolaridad" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <?php
                                        require 'conexionCancer.php';
                                        $query = $conexionCancer->prepare("SELECT id_escolaridad, gradoacademico FROM escolaridad");
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['gradoacademico']; ?>">
                                                <?php echo $row['gradoacademico']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Fecha de nacimiento</strong>
                                    <input id="fecha" name="fecha" type="date" onblur="curp2datebucal();" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <strong>Edad</strong>
                                    <input id="edad" name="edad" type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <strong>Sexo</strong>
                                    <input type="text" class="form-control" id="sexo" onclick="curp2datebucal();" name="sexo" readonly>
                                </div>
                                <script>
                                    /*
                                    $(document).ready(function() {
                                        $('#presionarterial').mask('000/000');
                                    });*/
                                    $(document).ready(function() {
                                        $('#tallabucal').mask('0.00');
                                    });
                                </script>
                                <div class="col-md-4">
                                    <strong>Talla</strong>
                                    <input type="number" step="any" class="form-control" id="tallabucal" name="tallabucal" required>
                                </div>
                                <div class="col-md-4">
                                    <strong>Peso</strong>
                                    <input type="number" step="any" class="form-control" id="pesobucal" onblur="calculaIMC();" name="pesobucal" required>
                                </div>
                                <div class="col-md-4">
                                    <strong>IMC</strong>
                                    <input type="text" class="form-control" id="imcbucal" onblur="calculaIMC();" name="imcbucal" readonly>
                                </div>
                                <div class="col-md-4">
                                    <strong>Estado de residencia</strong>
                                    <select name="cbx_estado" id="cbx_estado" class="form-control" style="width: 100%;" required>
                                        <option value="Sin registro" selected>Sin registro</option>
                                        <?php
                                        require 'conexionCancer.php';
                                        $query = "SELECT id_estado, estado FROM t_estado ";
                                        $resultado = $conexion2->query($query);
                                        while ($row = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_estado']; ?>">
                                                <?php echo $row['estado']; ?></option>
                                        <?php } ?>
                                        <!--<option value="1">Otro</option>-->
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Delegación o Municipio</strong>
                                    <select name="cbx_municipio" id="cbx_municipio" class="form-control" style="width: 100%;">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Referenciado</strong>
                                    <select name="referenciado" id="referenciado" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="medioreferencia">
                                    <strong>Unidad referencia</strong>
                                    <input list="referencias" name="unidadreferencia" id="unidadreferencia" class="form-control">
                                    <datalist id="referencias">
                                        <option value="Sin registro">Sin registro</option>
                                        <?php
                                        require 'conexionCancer.php';
                                        $query = $conexionCancer->prepare("SELECT clues, unidad FROM hospitales");
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['clues']; ?>">
                                                <?php echo $row['unidad']; ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                                <!-- Inicia Sección de Antecedentes No Patológicos-->
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>ANTECEDENTES NO PATOLOGICOS</strong>
                                </div>
                                <div class="col-md-4">
                                    <strong>Exposición Solar</strong>
                                    <select name="exposicionsolarbucal" id="exposicionsolarbucal" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Comidas al Día</strong>
                                    <select name="comidasbucal" id="comidasbucal" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3 o más</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Higiene Bucal</strong>
                                    <select name="higienebucal" id="higienebucal" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="1 vez al dia">1 vez al día</option>
                                        <option value="2 veces al dia">2 veces al día</option>
                                        <option value="3 o mas veces al dia">3 o más veces al día</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>ANTECEDENTES PERSONALES PATOLÓGICOS</strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>Toxicomanias</strong>
                                    <select id="mstoxicomanias" name="mstoxicomanias[]" multiple="multiple" class="form-control">
                                        <option value="Alcoholismo"> Alcoholismo</option>
                                        <option value="Tabaquismo"> Tabaquismo</option>
                                        <option value="Cocaina"> Cocaína</option>
                                        <option value="Marihuana"> Marihuana</option>
                                        <option value="Medicamentos Controlados"> Medicamentos Controlados</option>
                                        <option value="Solventes"> Solventes</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="alcoholismofrecuencia">
                                    <strong>Frecuencia Alcoholismo:</strong>
                                    <select name="frecuenciaal" id="frecuenciaal" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Social">Social</option>
                                        <option value="Embriaguez">Embriaguez</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="yearstabaquismo">
                                    <strong>Años Tabaquismo:</strong>
                                    <input id="anostabaquismo" name="anostabaquismo" type="number" class="form-control" placeholder="Ingrese años...">
                                </div>
                                <div class="col-md-4" id="diacigarros">
                                    <strong>Cigarros al día:</strong>
                                    <input id="cigarrosdia" name="cigarrosdia" type="number" class="form-control" placeholder="Ingrese cigarros al día...">
                                </div>
                                <div class="col-md-4" id="tipodehabitos">
                                    <strong>Hábitos</strong>
                                    <select id="mshabitos" name="mshabitos[]" multiple="multiple" class="form-control">
                                        <option value="Autolesiones"> Autolesiones</option>
                                        <option value="Bruxismo"> Bruxismo</option>
                                        <option value="Interposicion Lingual"> Interposición Lingual</option>
                                        <option value="Onicofagia"> Onicofagía</option>
                                        <option value="Queilofagia"> Queilofagía</option>
                                        <option value="Respiracion Oral"> Respiración Oral</option>
                                        <option value="Succion Labial"> Succión Labial</option>
                                        <option value="Succion Digital"> Succión Digital</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="tipodevirus">
                                    <strong>Virus</strong>
                                    <select id="msvirus" name="msvirus[]" multiple="multiple" class="form-control">
                                        <option value="VIH"> VIH </option>
                                        <option value="VPH"> VPH</option>
                                        <option value="I. Epstein Barr"> I. Epstein Barr</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="tipodecancer">
                                    <strong>Cáncer</strong>
                                    <select id="mscancer" name="mscancer[]" multiple="multiple" class="form-control">
                                        <option value="Colon y Recto"> Colon y Recto </option>
                                        <option value="Endometrio"> Endometrio</option>
                                        <option value="Gastrico"> Gastrico</option>
                                        <option value="Higado"> Hígado </option>
                                        <option value="Leucemia"> Leucemia</option>
                                        <option value="Linfoma No Hodgkin"> Linfoma No Hodgkin</option>
                                        <option value="Mama"> Mama </option>
                                        <option value="Melanoma"> Melanoma</option>
                                        <option value="Ovario"> Ovario</option>
                                        <option value="Pancreas"> Páncreas </option>
                                        <option value="Prostata"> Próstata</option>
                                        <option value="Pulmon"> Pulmón</option>
                                        <option value="Rinon"> Riñón </option>
                                        <option value="Testiculo"> Testículo</option>
                                        <option value="Tiroides"> Tiroides</option>
                                        <option value="Vejiga"> Vejiga</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; 
                                    background-color: #d9a4a5;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                    <strong>AFECTACIONES ORALES</strong>
                                </div>
                                <div class="col-md-12" id="tipodeao">
                                    <strong>Afectaciones Orales</strong>
                                    <select id="msao" name="msao[]" multiple="multiple" class="form-control">
                                        <option value="Afectacion Dental"> Afectación Dental </option>
                                        <option value="Lesiones Orales"> Lesiones Orales</option>
                                        <option value="Ubicacion"> Ubicación</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="tituloafectaciondental" style="text-align: center; 
                                background-color: #c6b7bf;
                                color: aliceblue;
                                margin-top: 5px; 
                                font-size: 0px;">
                                    <strong>AFECTACIÓN DENTAL</strong>
                                </div>
                                <div class="col-md-12" id="tipodeodf">
                                    <strong>Órgano Oral Lesionado</strong>
                                    <select id="msodf" name="msodf[]" multiple="multiple" class="form-control">
                                        <option value="Enfermedad Periodontal"> Enfermedad Periodontal </option>
                                        <option value="Organo Dental Fracturado"> Órgano Dental Fracturado</option>
                                        <option value="Protesis Fija Desajustada"> Protesis Fija Desajustada</option>
                                        <option value="Protesis Fija Fracturada"> Protesis Fija Fracturada</option>
                                        <option value="Protesis Removible Desajustada"> Protesis Removible Desajustada </option>
                                        <option value="Protesis Removible Fracturada"> Protesis Removible Fracturada</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxilarsd">
                                    <strong>Maxilar Superior Derecho</strong>
                                    <select id="msmaxilarsuperiorderecho" name="msmaxilarsuperiorderecho[]" multiple="multiple" class="form-control">
                                        <option value="11"> 11</option>
                                        <option value="12"> 12</option>
                                        <option value="13"> 13</option>
                                        <option value="14"> 14</option>
                                        <option value="15"> 15</option>
                                        <option value="16"> 16</option>
                                        <option value="17"> 17</option>
                                        <option value="18"> 18</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxilarid">
                                    <strong>Maxilar Inferior Derecho</strong>
                                    <select id="msmaxilarinferiorderecho" name="msmaxilarinferiorderecho[]" multiple="multiple" class="form-control">
                                        <option value="41"> 41</option>
                                        <option value="42"> 42</option>
                                        <option value="43"> 43</option>
                                        <option value="44"> 44</option>
                                        <option value="45"> 45</option>
                                        <option value="46"> 46</option>
                                        <option value="47"> 47</option>
                                        <option value="48"> 48</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxilarsd2">
                                    <strong>Maxilar Superior Izquierdo</strong>
                                    <select id="msmaxilarsuperiorizquierdo" name="msmaxilarsuperiorizquierdo[]" multiple="multiple" class="form-control">
                                        <option value="21"> 21</option>
                                        <option value="22"> 22</option>
                                        <option value="23"> 23</option>
                                        <option value="24"> 24</option>
                                        <option value="25"> 25</option>
                                        <option value="26"> 26</option>
                                        <option value="27"> 27</option>
                                        <option value="28"> 28</option>
                                    </select>
                                </div>

                                <!--Inferior izquierdo -->
                                <div class="col-md-3" id="maxilarid2">
                                    <strong>Maxilar Inferior Izquierdo</strong>
                                    <select id="msmaxilarinferiorizquierdo" name="msmaxilarinferiorizquierdo[]" multiple="multiple" class="form-control">
                                        <option value="31"> 31</option>
                                        <option value="32"> 32</option>
                                        <option value="33"> 33</option>
                                        <option value="34"> 34</option>
                                        <option value="35"> 35</option>
                                        <option value="36"> 36</option>
                                        <option value="37"> 37</option>
                                        <option value="38"> 38</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="titulolesionesorales" style="text-align: center; 
                                background-color: #c6b7bf;
                                color: aliceblue;
                                margin-top: 5px; 
                                font-size: 0px;">
                                    <strong>LESIONES ORALES</strong>
                                </div>
                                <div class="col-md-3" id="lesionoral">
                                    <strong>¿Lesión Oral?:</strong>
                                    <select name="tipolesionoral" id="tipolesionoral" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="tejidotipo">
                                    <strong>Tipo de Tejido:</strong>
                                    <select name="tipotejido" id="tipotejido" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Blando">Blando</option>
                                        <option value="Duro">Duro</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="tipolesion">
                                    <strong>Tipo Lesión:</strong>
                                    <select id="mstipodelesion" name="mstipodelesion[]" multiple="multiple" class="form-control">
                                        <option value="Melatonica"> Melatónica</option>
                                        <option value="Nodulo"> Nódulo</option>
                                        <option value="Pigmentada"> Pigmentada</option>
                                        <option value="Tumor">Tumor</option>
                                        <option value="Ulcera"> Ulcera</option>
                                        <option value="Verruga"> Verruga</option>
                                        <option value="Vesicula"> Vesicula</option>

                                    </select>
                                </div>
                                <div class="col-md-3" id="coloracion">
                                    <strong>Coloración:</strong>
                                    <select name="colorpigmentada" id="colorpigmentada" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Blanca">Blanca</option>
                                        <option value="Roja">Roja</option>
                                        <option value="Blanca y Roja">Blanca / Roja</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="tituloubicacion" style="text-align: center; 
                                background-color: #c6b7bf;
                                color: aliceblue;
                                margin-top: 5px; 
                                font-size: 0px;">
                                    <strong>UBICACIÓN</strong>
                                </div>
                                <div class="col-md-12" id="ubicacion">
                                    <strong>Ubicación:</strong>
                                    <select id="msubicacion" name="msubicacion[]" multiple="multiple" class="form-control">
                                        <option value="Derecha"> Derecha</option>
                                        <option value="Izquierda"> Izquierda</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="tituloubicacionderecha" style="text-align: center; 
                                background-color: #b3cefd;
                                color: aliceblue;
                                margin-top: 5px; 
                                font-size: 0px;">
                                    <strong>Ubicación Derecha</strong>
                                </div>

                                <div class="col-md-12" id="subanatomico">
                                    <strong>Subsitio Anatómico:</strong>
                                    <select id="msqueva" name="msqueva[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Cuerpo Mandibular"> Cuerpo Mandibular</option>
                                        <option value="Encia Superior"> Encia Superior</option>
                                        <option value="Labios"> Labios</option>
                                        <option value="Lengua"> Lengua</option>
                                        <option value="Encia Inferior"> Encia Inferior </option>
                                        <option value="Maxilar Posterior"> Maxilar Posterior</option>
                                        <option value="Mucosa Bucal"> Mucosa Bucal</option>
                                        <option value="Paladar Blando"> Paladar Blando</option>
                                        <option value="Paladar Duro"> Paladar Duro</option>
                                        <option value="Piso"> Piso</option>
                                        <option value="Premaxilar"> Premaxilar</option>
                                        <option value="Proceso Alveolar"> Proceso Alveolar</option>
                                        <option value="Rama Mandibular"> Rama Mandibular</option>
                                        <option value="Trigono Retromolar"> Trigono Retromolar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="labiospanel">
                                    <strong>Labios:</strong>
                                    <select name="labios" id="labios" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Labio Inferior">Labio Inferior</option>
                                        <option value="Labio Superior">Labio Superior</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="lenguapanel">
                                    <strong>Lengua:</strong>
                                    <select name="lengua" id="lengua" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Borde Lateral">Borde Lateral</option>
                                        <option value="Cara Ventral">Cara Ventral</option>
                                        <option value="Dorso">Dorso</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="paladarblandopanel">
                                    <strong>Paladar Blando:</strong>
                                    <select name="paladarblando" id="paladarblando" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Boveda de Paladar">Boveda de Paladar</option>
                                        <option value="Velo de Paladar">Velo de Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="paladarduropanel">
                                    <strong>Paladar Duro:</strong>
                                    <select name="paladarduro" id="paladarduro" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Boveda de Paladar">Boveda de Paladar</option>
                                        <option value="Velo de Paladar">Velo de Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="enciapanel">
                                    <strong>Encia superior:</strong>
                                    <select name="encia" id="encia" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Bucal">Bucal</option>
                                        <option value="Interpapilar">Interpapilar</option>
                                        <option value="Lingual">Lingual</option>
                                        <option value="Paladar">Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="enciapanelinferior">
                                    <strong>Encia inferior:</strong>
                                    <select name="enciainferior" id="enciainferior" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Bucal">Bucal</option>
                                        <option value="Interpapilar">Interpapilar</option>
                                        <option value="Lingual">Lingual</option>
                                        <option value="Paladar">Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="relacionpanel">
                                    <strong>¿Está relacionado con un órgano dental?:</strong>
                                    <select name="relacion" id="relacion" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxisd">
                                    <strong>Maxilar Superior Derecho</strong>
                                    <select id="msmaxisd" name="msmaxisd[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="11"> 11</option>
                                        <option value="12"> 12</option>
                                        <option value="13"> 13</option>
                                        <option value="14"> 14</option>
                                        <option value="15"> 15</option>
                                        <option value="16"> 16</option>
                                        <option value="17"> 17</option>
                                        <option value="18"> 18</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxiid">
                                    <strong>Maxilar Inferior Derecho</strong>
                                    <select id="msmaxiid" name="msmaxiid[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="41"> 41</option>
                                        <option value="42"> 42</option>
                                        <option value="43"> 43</option>
                                        <option value="44"> 44</option>
                                        <option value="45"> 45</option>
                                        <option value="46"> 46</option>
                                        <option value="47"> 47</option>
                                        <option value="48"> 48</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="tituloubicacionizquierda" style="text-align: center; 
                                background-color: #b3cefd;
                                color: aliceblue;
                                margin-top: 5px; 
                                font-size: 0px;">
                                    <strong>Ubicación Izquierda</strong>
                                </div>
                                <div class="col-md-12" id="subanatomicoiz">
                                    <strong>Subsitio Anatómico:</strong>
                                    <select id="msqueva2" name="msqueva2[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Cuerpo Mandibular"> Cuerpo Mandibular</option>
                                        <option value="Encia Superior"> Encia Superior</option>
                                        <option value="Labios"> Labios</option>
                                        <option value="Lengua"> Lengua</option>
                                        <option value="Encia Inferior"> Encia Inferior </option>
                                        <option value="Maxilar Posterior"> Maxilar Posterior</option>
                                        <option value="Mucosa Bucal"> Mucosa Bucal</option>
                                        <option value="Paladar Blando"> Paladar Blando</option>
                                        <option value="Paladar Duro"> Paladar Duro</option>
                                        <option value="Piso"> Piso</option>
                                        <option value="Premaxilar"> Premaxilar</option>
                                        <option value="Proceso Alveolar"> Proceso Alveolar</option>
                                        <option value="Rama Mandibular"> Rama Mandibular</option>
                                        <option value="Trigono Retromolar"> Trigono Retromolar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="labiospaneliz">
                                    <strong>Labios:</strong>
                                    <select name="labiosiz" id="labiosiz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Labio Inferior">Labio Inferior</option>
                                        <option value="Labio Superior">Labio Superior</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="lenguapaneliz">
                                    <strong>Lengua:</strong>
                                    <select name="lenguaiz" id="lenguaiz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Borde Lateral">Borde Lateral</option>
                                        <option value="Cara Ventral">Cara Ventral</option>
                                        <option value="Dorso">Dorso</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="paladarblandopaneliz">
                                    <strong>Paladar Blando:</strong>
                                    <select name="paladarblandoiz" id="paladarblandoiz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Boveda de Paladar">Boveda de Paladar</option>
                                        <option value="Velo de Paladar">Velo de Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="paladarduropaneliz">
                                    <strong>Paladar Duro:</strong>
                                    <select name="paladarduroiz" id="paladarduroiz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Boveda de Paladar">Boveda de Paladar</option>
                                        <option value="Velo de Paladar">Velo de Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="enciapaneliz">
                                    <strong>Encia superior:</strong>
                                    <select name="enciaiz" id="enciaiz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Bucal">Bucal</option>
                                        <option value="Interpapilar">Interpapilar</option>
                                        <option value="Lingual">Lingual</option>
                                        <option value="Paladar">Paladar</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="enciapanelinferioriz">
                                    <strong>Encia inferior:</strong>
                                    <select name="enciaizinferior" id="enciaizinferior" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Bucal">Bucal</option>
                                        <option value="Interpapilar">Interpapilar</option>
                                        <option value="Lingual">Lingual</option>
                                        <option value="Paladar">Paladar</option>
                                    </select>
                                </div>
                                <br><br>
                                <div class="col-md-6" id="relacionpaneliz">
                                    <strong>¿Está relacionado con un órgano dental?:</strong>
                                    <select name="relacioniz" id="relacioniz" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxisdiz">
                                    <strong>Maxilar Superior Izquierdo</strong>
                                    <select id="msmaxisiiz" name="msmaxisiiz[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="21"> 21</option>
                                        <option value="22"> 22</option>
                                        <option value="23"> 23</option>
                                        <option value="24"> 24</option>
                                        <option value="25"> 25</option>
                                        <option value="26"> 26</option>
                                        <option value="27"> 27</option>
                                        <option value="28"> 28</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="maxiidiz">
                                    <strong>Maxilar Inferior Izquierdo</strong>
                                    <select id="msmaxiiz" name="msmaxiiz[]" multiple="multiple" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="31"> 31</option>
                                        <option value="32"> 32</option>
                                        <option value="33"> 33</option>
                                        <option value="34"> 34</option>
                                        <option value="35"> 35</option>
                                        <option value="36"> 36</option>
                                        <option value="37"> 37</option>
                                        <option value="38"> 38</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>ATENCIÓN CLINICA</strong>
                                </div>

                                <div class="col-md-4">
                                    <strong>Fecha primer atención:</strong>
                                    <input type="date" id="fechaatencioninicial" name="fechaatencioninicial" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <strong>Etapa clinica</strong>
                                    <select name="etapaclinica" id="etapaclinica" class="form-control" readonly>
                                        <option value="TNM" selected>TNM</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Tamaño Tumoral</strong>
                                    <select name="tamaniotumoral" id="tamaniotumoral" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="T1 Menor o igual a 2cm">T1. Menor o igual a 2cm</option>
                                        <option value="T2 Mayor a 2 cm pero menor a 4 cm">T2. Mayor a 2 cm pero menor a 4 cm</option>
                                        <option value="T3 más de 4cm">T3. Mayor a 4 cm</option>
                                        <option value="T4a Invade piel, mandibula, canal auditivo y nervio facial">T4a. Invade piel, mandíbula, canal auditivo y nervio facial</option>
                                        <option value="T4b Tumor que invade la base del cráneo y/o Pterigoides">T4b. Tumor que invade la base del cráneo y/o Pterigoides </option>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <strong>Compromiso Linfático Nodal</strong>
                                    <select name="compromisolinfatico" id="compromisolinfatico" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="NX: No puede ser evaluado por falta de datos">NX: No puede ser evaluado por falta de datos </option>
                                        <option value="N0:Ausencia de adenopatias palpables">N0:Ausencia de adenopatias palpables</option>
                                        <option value="N1: Nodulos Palpables Ipsilaterales, menores a 3cm">N1: Nódulos Palpables Ipsilaterales, menores a 3cm</option>
                                        <option value="N2a. Metástasis en Nodulo Ipsilateral, mayor de 3cm menor de 6cm">N2a. Metástasis en nódulo Ipsilateral, mayor de 3cm menor de 6cm</option>
                                        <option value="N2b. Metástasis en múltiples nodulos Ipsilaterales mayores a 6cm">N2b. Metástasis en múltiples nódulos Ipsilaterales mayores a 6cm</option>
                                        <option value="N2c. Metástasis en nodulos bilaterales y contralaterales mayores a 6cm">N2c. Metástasis en nódulos bilaterales y contralaterales mayores a 6cm</option>
                                        <option value="N3. Nodulos palpables fijos mayor a 6cm">N3. Nódulos palpables fijos mayor a 6cm</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Metástasis</strong>
                                    <select name="metastasisbucal" id="metastasisbucal" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="MX: No se pueden evaluar metastasis distantes">MX: No se pueden evaluar metástasis distantes</option>
                                        <option value="M0 Sin enfermedad a distancia">M0: Sin enfermedad a distancia</option>
                                        <option value="M1 Evidencia de Metástasis por clínica o radiografia">M1: Evidencia de Metástasis por clínica o radiografia</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="idmssitiometastasis">
                                    <strong>Sitio Metástasis</strong>
                                    <select id="mssitiometastasis" name="mssitiometastasis[]" multiple="multiple" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Hepatica">Hepatica</option>
                                        <option value="Pulmonar">Pulmonar</option>
                                        <option value="Cerebrales">Cerebrales</option>
                                        <option value="Oseas">Óseas</option>
                                        <option value="Cervicouterino">Cervicouterino</option>
                                        <option value="Mediastino">Mediastino</option>
                                        <option value="Suprarrenal">Suprarrenal</option>
                                        <option value="Tiroidea">Tiroidea</option>
                                        <option value="Ganglionar">Ganglionar</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="estadiocli">
                                    <strong>Estadío Clinico</strong>
                                    <select name="estadioclinico" id="estadioclinico" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III </option>
                                        <option value="IV A">IV A</option>
                                        <option value="IV B">IV B</option>
                                        <option value="IV C">IV C</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Calidad de vida ECOG</strong>
                                    <select name="calidadvidaecogbucal" id="calidadvidaecogbucal" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Ecog 0  Desempeño Funcional Normal">Ecog 0 Desempeño Funcional Normal</option>
                                        <option value="Ecog 1 Desempeño Leve">Ecog 1 Desempeño Leve</option>
                                        <option value="Ecog 2 El 50% Del Tiempo Postrado">Ecog 2 El 50% Del Tiempo Postrado</option>
                                        <option value="Ecog 3 Mas Del 50% Postrado">Ecog 3 Mas Del 50% Postrado </option>
                                        <option value="Ecog 4 Dependiente Al 100% Para Vida Basica">Ecog 4 Dependiente Al 100% Para Vida Basica</option>
                                        <option value="Ecog 5 Fallecio">Ecog 5 Fallecio</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>HISTOPATOLOGÍA</strong>
                                </div>
                                <div class="col-md-12" id="estadiocli">
                                    <strong>Dx Histopatologico</strong>
                                    <select name="dxhistopatologico" id="dxhistopatologico" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Adenocarcinoma">Adenocarcinoma</option>
                                        <option value="Adenoideoquistico">Adenoideoquistico</option>
                                        <option value="Basocelular">Basocelular</option>
                                        <option value="Carcinoma Ameloblastico">Carcinoma Ameloblastico</option>
                                        <option value="Epidermoide o Celulas Escamosas (Verrucoso o Basaloide)">Epidermoide o Celulas Escamosas</option>
                                        <option value="Linfoma">Linfoma</option>
                                        <option value="Melanoma">Melanoma</option>
                                        <option value="Metastasico">Metastásico</option>
                                        <option value="Neuroendocrino">Neuroendocrino</option>
                                        <option value="Sarcoma de Kaposi">Sarcoma de Kaposi</option>
                                        <option value="Sarcomatoide">Sarcomatoide</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <strong>Fecha de Reporte:</strong>
                                    <input type="date" id="fechareporte" name="fechareporte" class="form-control">
                                </div>
                                <div class="col-md-4" id="">
                                    <strong>Tipo:</strong>
                                    <select name="tipohisto" id="tipohisto" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Benigno">Benigno</option>
                                        <option value="Maligno">Maligno</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="tumormaligno">
                                    <strong>Maligno:</strong>
                                    <select name="maligno" id="maligno" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Bien Diferenciado">Bien Diferenciado</option>
                                        <option value="Poco Diferenciado">Poco Diferenciado</option>
                                        <option value="Indefinido">Indefinido</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>INMUNOHISTOQUÍMICA</strong>
                                </div>

                                <div class="col-md-6">
                                    <strong>¿Se realizó PDL?</strong>
                                    <select name="pdl" id="pdl" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="idpdl">
                                    <strong id="inmuno-title">PDL</strong>
                                    <input type="number" id="descripcionpdl" name="descripcionpdl" placeholder="%" class="form-control">
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>TRATAMIENTO</strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>Quimioterapia</strong>
                                    <select name="quimioterapia" id="quimioterapia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="idmsquimio">
                                    <strong>QT</strong>
                                    <select id="msquimio" name="msquimio[]" multiple="multiple" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="5Fluororacilo">5Fluororacilo</option>
                                        <option value="Beuacizumab">Bevacizumab</option>
                                        <option value="Capecitabina">Capecitabina</option>
                                        <option value="Carboplatino">Carboplatino</option>
                                        <option value="Cetuximab">Cetuximab</option>
                                        <option value="Ciclofosfamida">Ciclofosfamida</option>
                                        <option value="Cisplatino">Cisplatino</option>
                                        <option value="Docetaxel">Docetaxel</option>
                                        <option value="Etoposido">Etoposido</option>
                                        <option value="Herceptin">Herceptin</option>
                                        <option value="Paclitaxel">Paclitaxel</option>
                                        <option value="Pertuzumab">Pertuzumab</option>
                                        <option value="Trastuzumab">Trastuzumab</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <strong>Quirúrgico</strong>
                                    <select name="quirurgico" id="quirurgico" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="idtipoquirurgico">
                                    <strong>Tipo de Cirugía</strong>
                                    <select name="tipoquirurgico" id="tipoquirurgico" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Amigdalectomia">Amigdalectomía</option>
                                        <option value="Comando">Comando</option>
                                        <option value="Diseccion Radical Modificada de Cuello">Disección Radical Modificada de Cuello</option>
                                        <option value="Excision Local Amplia">Excision Local Amplia</option>
                                        <option value="Glosectomia Parcial">Glosectomía Parcial</option>
                                        <option value="Hemiglosectomia">Hemiglosectomía</option>
                                        <option value="Mandibulectomia (Parcial, Segmentaria, Maginal)">Mandibulectomía (Parcial, Segmentaria, Maginal)</option>
                                        <option value="Maxilectomia de Infraestructura">Maxilectomia de Infraestructura</option>
                                        <option value="Maxilectomia de Superestructura">Maxilectomia de Superestructura</option>
                                        <option value="Reseccion de Glandula Salival Menor">Resección de Glándula Salival Menor</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="idmaxinfra">
                                    <strong>Maxilectomia de Infraestructura</strong>
                                    <select name="maxinfraestructu" id="maxinfraestructu" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Clase I. Reseccion quirurgica clasica del maxilar que abarca paladar duro y dentición hasta la linea media, es unilateral.">Clase I. Resección quirúrgica clásica del maxilar que abarca paladar duro y dentición hasta la línea media, es unilateral.</option>
                                        <option value="Clase II. Incluye defectos que mantienen la denticion del lado contralateral. Es unilateral posterior que no abarca hasta la linea media.">Clase II . Incluye defectos que mantienen la dentición del lado contralateral. Es unilateral posterior que no abarca hasta la línea media.</option>
                                        <option value="Clase III. Implica un defecto en la línea media del paladar duro y puede incluir una porcion del velo del paladar, sin involucrar proceso alveolar ni organos dentarios">Clase III. Implica un defecto en la línea media del paladar duro y puede incluir una porción del velo del paladar, sin involucrar proceso alveolar ni órganos dentarios</option>
                                        <option value="Clase IV. Es un defecto extenso bilateral anterior, involucra dientes anteriores y posteriores.">Clase IV. Es un defecto extenso bilateral anterior, involucra dientes anteriores y posteriores.</option>
                                        <option value="Clase V. Defecto bilateral posterior, situado por detras de los dientes remanentes.">Clase V. Defecto bilateral posterior, situado por detrás de los dientes remanentes.</option>
                                        <option value="Clase VI. Defecto bilateral de la zona anterior sin involucrar dientes posteriores.">Clase VI. Defecto bilateral de la zona anterior sin involucrar dientes posteriores.</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="idlugar">
                                    <strong>Lugar DRMC </strong>
                                    <select name="lugardrmc" id="lugardrmc" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Bilateral">Bilateral</option>
                                        <option value="Unilateral">Unilateral</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="idtipo">
                                    <strong>Tipo DRMC</strong>
                                    <select name="tipodrmc" id="tipodrmc" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Selectiva">Selectiva</option>
                                        <option value="Superselectiva">Superselectiva</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="idnivelcervical">
                                    <strong>Nivel Cervical</strong>
                                    <select name="nivelcervical" id="nivelcervical" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <strong>Reconstrucción</strong>
                                    <select name="reconstruccion" id="reconstruccion" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="idtiporeconstruccion">
                                    <strong>Tipo de Reconstrucción</strong>
                                    <select name="tiporeconstruccion" id="tiporeconstruccion" class="form-control">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Colgajo Microvascular">Colgajo Microvascular</option>
                                        <option value="Injerto Oseo Autologo o Cadaverico">Injerto Óseo Autólogo o Cadavérico</option>
                                        <option value="Material de Osteosintesis">Material de Osteosíntesis</option>
                                        <option value="Rotacion de Colgajo">Rotación de Colgajo</option>
                                        <option value="Toma y Aplicacion de Injerto">Toma y Aplicación de Injerto</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <strong>Radioterapia</strong>
                                    <select name="radio" id="radio" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idfecharadio">
                                    <strong>Fecha:</strong>
                                    <input type="date" id="fecharadio" name="fecharadio" class="form-control">
                                </div>

                                <div class="col-md-3" id="idmomentort">
                                    <strong>Momento RT</strong>
                                    <select name="momentort" id="momentort" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Adyuvante">Adyuvante</option>
                                        <option value="Paliativa">Paliativa</option>
                                        <option value="Radical">Radical</option>
                                        <option value="Concomitante">Concomitante</option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="iddosisradio">
                                    <strong>Dosis</strong>
                                    <input type="number" class="form-control" id="dosis" name="dosis" placeholder="cG...">
                                </div>

                                <div class="col-md-3" id="idfracciones">
                                    <strong>Fracciones</strong>
                                    <select name="fracciones" id="fracciones" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Convencional">Convencional</option>
                                        <option value="Hiperfraccionamiento">Hiperfraccionamiento</option>
                                        <option value="Hipofraccionamiento">Hipofraccionamiento</option>
                                    </select>
                                </div>

                                <div class="col-md-6" id="idnofracciones">
                                    <strong>No. Fracciones</strong>
                                    <input type="number" class="form-control" id="numfracciones" name="numfracciones" placeholder="Ingrese...">
                                </div>

                                <div class="col-md-6" id="idtecnica">
                                    <strong>Técnica</strong>
                                    <select name="tecnica" id="tecnica" class="form-control">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="3D Conformal">3D Conformal</option>
                                        <option value="Braquiterapia">Braquiterapia</option>
                                        <option value="IMRT">IMRT</option>
                                    </select>
                                </div>

                                <div class="col-md-12" id="idcomplicaciones">
                                    <strong>Complicaciones RT</strong>
                                    <select id="mscomplicacionesrt" name="mscomplicacionesrt[]" multiple="multiple" class="form-control">
                                        <option value="Caries">Caries</option>
                                        <option value="Disgeusia">Disgeusia</option>
                                        <option value="Dolor">Dolor</option>
                                        <option value="Fractura">Fractura</option>
                                        <option value="Infeccion">Infección</option>
                                        <option value="Hemorragias">Hemorragias</option>
                                        <option value="Mucositis">Mucositis</option>
                                        <option value="Osteonecrosis">Osteonecrosis</option>
                                        <option value="Parestesia">Parestesia</option>
                                        <option value="Propios">Propios De La Anestesia Local</option>
                                        <option value="Radiodermitis">Radiodermitis</option>
                                        <option value="Reaccionalergica">Reaccion Alergica</option>
                                        <option value="Trismus">Trismus</option>
                                        <option value="Xerostomia">Xerostomia</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicaciones">
                                    <strong>Tx Caries</strong>
                                    <select name="txcomplicaciones" id="txcomplicaciones" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesdisguesia">
                                    <strong>Tx Disgeusia</strong>
                                    <select name="txcomplicacionesdisguesia" id="txcomplicacionesdisguesia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesdolor">
                                    <strong>Tx Dolor</strong>
                                    <select name="txcomplicacionesdolor" id="txcomplicacionesdolor" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesfractura">
                                    <strong>Tx Fractura</strong>
                                    <select name="txcomplicacionesfractua" id="txcomplicacionesfractura" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesinfeccion">
                                    <strong>Tx Infección</strong>
                                    <select name="txcomplicacionesinfeccion" id="txcomplicacionesinfeccion" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesdisguesiahemorragia">
                                    <strong>Tx Hemorragias</strong>
                                    <select name="txcomplicacioneshemorragia" id="txcomplicacioneshemorragia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesmucositis">
                                    <strong>Tx Mucositis</strong>
                                    <select name="txcomplicacionesmucositis" id="txcomplicacionesdmucositis" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesosteonecrosis">
                                    <strong>Tx Osteonecrosis</strong>
                                    <select name="txcomplicacionessteonecrosis" id="txcomplicacionessteonecrosis" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesParestesia">
                                    <strong>Tx Parestesia</strong>
                                    <select name="txcomplicacionesParestesia" id="txcomplicacionesParestesia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesalocal">
                                    <strong>Tx Anestesia Local</strong>
                                    <select name="txcomplicacionesalocal" id="txcomplicacionesalocal" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesradiodermitis">
                                    <strong>Tx Radiodermitis</strong>
                                    <select name="txcomplicacionesradiodermitis" id="txcomplicacionesradiodermitis" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesalergia">
                                    <strong>Tx Reaccion Alergica</strong>
                                    <select name="txcomplicacionesalergia" id="txcomplicacionesalergia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionetrismus">
                                    <strong>Tx Trismus</strong>
                                    <select name="txcomplicacionestrismus" id="txcomplicacionesdtrismus" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idtxcomplicacionesxerostomia">
                                    <strong>Tx Xerostomia</strong>
                                    <select name="txcomplicacionesxerostomia" id="txcomplicacionesxerostomia" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="crioterapia">Crioterapia</option>
                                        <option value="Farmacologico">Farmacológico</option>
                                        <option value="Laser">Láser</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="idmsoarsdosis">
                                    <strong>OARS Dosis</strong>
                                    <select id="msoarsdosis" name="msoarsdosis[]" multiple="multiple" class="form-control">
                                        <option value="Cavidad Oral">Cavidad Oral</option>
                                        <option value="Cocleas">Cocleas</option>
                                        <option value="Cristalinos">Cristalinos</option>
                                        <option value="Esofago">Esófago</option>
                                        <option value="Labios">Labios</option>
                                        <option value="Laringe">Laringe</option>
                                        <option value="Mandibula">Mandibula</option>
                                        <option value="Medula">Médula </option>
                                        <option value="Nervio Óptico">Nervio Óptico</option>
                                        <option value="Ojos">Ojos</option>
                                        <option value="Pared Faringea Posterior">Pared Faringea Posterior</option>
                                        <option value="Parotidas">Parotidas</option>
                                        <option value="Sublinguales">Sublinguales</option>
                                        <option value="Tallo">Tallo</option>
                                        <option value="Tiroides">Tiroides</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="dosis1">
                                    <strong>Dosis Máx Cavidad Oral</strong>
                                    <input type="number" class="form-control" id="cavidadoral1" name="cavidadoral1" placeholder="Ingrese...">
                                </div>

                                <div class="col-md-3" id="promedio1">
                                    <strong>Dosis Prom Cavidad Oral</strong>
                                    <input type="number" class="form-control" id="cavidadoral2" name="cavidadoral2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis2">
                                    <strong>Dosis Máx Cocleas</strong>
                                    <input type="number" class="form-control" id="cocleas1" name="cocleas1" placeholder="Ingrese...">
                                </div>

                                <div class="col-md-3" id="promedio2">
                                    <strong>Dosis Prom Cocleas</strong>
                                    <input type="number" class="form-control" id="cocleas2" name="cocleas2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis3">
                                    <strong>Dosis Máx Cristalinos</strong>
                                    <input type="number" class="form-control" id="cristalinos1" name="cristalinos1" placeholder="Ingrese...">
                                </div>

                                <div class="col-md-3" id="promedio3">
                                    <strong>Dosis Prom Cristalinos</strong>
                                    <input type="number" class="form-control" id="cristalinos2" name="cristalinos2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis4">
                                    <strong>Dosis Máx Esófago</strong>
                                    <input type="number" class="form-control" id="esofago1" name="esofago1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio4">
                                    <strong>Dosis Prom Esófago</strong>
                                    <input type="number" class="form-control" id="esofago2" name="esofago2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis5">
                                    <strong>Dosis Máx Labios</strong>
                                    <input type="number" class="form-control" id="labios1" name="labios1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio5">
                                    <strong>Dosis Prom Labios</strong>
                                    <input type="number" class="form-control" id="labios2" name="labios2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis6">
                                    <strong>Dosis Máx Laringe</strong>
                                    <input type="number" class="form-control" id="laringe1" name="laringe1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio6">
                                    <strong>Dosis Prom Laringe</strong>
                                    <input type="number" class="form-control" id="laringe2" name="laringe2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis7">
                                    <strong>Dosis Máx Mandibula</strong>
                                    <input type="number" class="form-control" id="mandibula1" name="mandibula1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio7">
                                    <strong>Dosis Prom Mandibula</strong>
                                    <input type="number" class="form-control" id="mandibula2" name="mandibula2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis8">
                                    <strong>Dosis Máx Médula</strong>
                                    <input type="number" class="form-control" id="medula1" name="medula1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio8">
                                    <strong>Dosis Prom Médula</strong>
                                    <input type="number" class="form-control" id="medula2" name="medula2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis9">
                                    <strong>Dosis Máx Nervio Óptico</strong>
                                    <input type="number" class="form-control" id="nerviooptico1" name="nerviooptico1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio9">
                                    <strong>Dosis Prom Nervio Óptico</strong>
                                    <input type="number" class="form-control" id="nerviooptico2" name="nerviooptico2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis10">
                                    <strong>Dosis Máx Ojos</strong>
                                    <input type="number" class="form-control" id="ojos1" name="ojos1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio10">
                                    <strong>Dosis Prom Ojos</strong>
                                    <input type="number" class="form-control" id="ojos2" name="ojos2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis11">
                                    <strong>Dosis Máx PFP</strong>
                                    <input type="number" class="form-control" id="pfp1" name="pfp1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio11">
                                    <strong>Dosis Prom PFP</strong>
                                    <input type="number" class="form-control" id="pfp2" name="pfp2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis12">
                                    <strong>Dosis Máx Parotidas</strong>
                                    <input type="number" class="form-control" id="Parotidas1" name="Parotidas1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio12">
                                    <strong>Dosis Prom Parotidas</strong>
                                    <input type="number" class="form-control" id="Parotidas2" name="Parotidas2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis13">
                                    <strong>Dosis Máx Sublinguales</strong>
                                    <input type="number" class="form-control" id="Sublinguales1" name="Sublinguales1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio13">
                                    <strong>Dosis Prom Sublinguales</strong>
                                    <input type="number" class="form-control" id="Sublinguales2" name="Sublinguales2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis14">
                                    <strong>Dosis Máx Tallo</strong>
                                    <input type="number" class="form-control" id="Tallo1" name="Tallo1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio14">
                                    <strong>Dosis Prom Tallo</strong>
                                    <input type="number" class="form-control" id="Tallo2" name="Tallo2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="dosis15">
                                    <strong>Dosis Máx Tiroides</strong>
                                    <input type="number" class="form-control" id="Tiroides1" name="Tiroides1" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-3" id="promedio15">
                                    <strong>Dosis Prom Tiroides</strong>
                                    <input type="number" class="form-control" id="Tiroides2" name="Tiroides2" placeholder="Ingrese...">
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>CASO EXITOSO</strong>
                                </div>
                                <div class="col-md-6">
                                    <strong>Caso Exitoso</strong>
                                    <select name="casoexitoso" id="casoexitoso" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <strong>Respuesta al Tratamiento</strong>
                                    <select name="respuestatratamiento" id="respuestatratamiento" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Completa">Completa</option>
                                        <option value="Nula">Nula</option>
                                        <option value="Parcial">Parcial</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="form-title" style="text-align: center; background-color: #d9a4a5;
                                    color:aliceblue; margin-top: 5px; font-size: 18px; ">
                                    <strong>DEFUNCIÓN</strong>
                                </div>
                                <div class="col-md-4">
                                    <strong>Defunción</strong>
                                    <select name="defuncion" id="defuncion" class="form-control" required>
                                        <option value="No">Seleccione</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="defuncionfecha">
                                    <strong>Fecha Defunción</strong>
                                    <input type="date" name="fechadeladefuncion" id="fechadeladefuncion" class="form-control">
                                </div>
                                <div class=" col-md-4" id="defuncioncausa">
                                    <strong>Causa</strong>
                                    <select name="causadefuncion" id="causadefuncion" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Oncologica">Oncologica</option>
                                        <option value="No oncologica">No oncologica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="contenedorbotones">
                            <input type="button" onclick="window.location.reload();" value="Cerrar formulario" id="botonescarga1">
                            <input type="submit" value="Registrar" id="botonescarga2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>