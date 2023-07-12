<div class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="lupus">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--se agrega estilos para icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/getCatalogos.js"></script>
    <script src="js/scriptModalLupus.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="modal-dialog modal-lg">

    <div class="modal-content">
            <div class="modal-header" id="cabeceraModalLupus">
            <span class="material-symbols-outlined">
                    📝
                </span>

                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
            
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="modal-body">

                            <!-- form start -->
                            <div class="form-header">
                                <h3 class="form-title" style="text-align: center;
                                    background-color:  #b763a2;
                                    color: aliceblue;
                                    margin-top:5px;"
                                    >
                                    👩🏻 DATOS DEL PACIENTE 🙍🏻‍♂️</h3>

                            </div>
                    <!-- Fin Header inicial Datos del Paciente -->
                    <form name="formulariolupus" id="formulariolupus" onSubmit="return limpiar()" autocomplete="off">
                        <div class="form-row">
                            <div id="mensaje"></div>
                            <script>
                                $("#formulariolupus").on("submit", function(e) {
                                            if($('input[name=curplupus]').val().length == 0 || $(
                                                'input[name=nombrecompletolupus]')
                                            .val().length == 0
                                        ) {
                                            alert('Ingrese los datos requeridos');

                                            return false;
                                            
                                        }
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();

                                        var formData = new FormData(document.getElementById(
                                            "formulariolupus"));
                                        formData.append("dato", "valor");

                                        $.ajax({

                                            url: "registrarpacienteLupus.php",
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
                        
                            <div class="col-md-4">
                                <strong>CURP</strong>
                                <input list="curpusuario" id="curplupus" name="curplupus" type="text" class="control form-control" value="" onkeyup="curp2datelupus();" minlength="18" maxlength="18" required>
                                <datalist id="curpusuario">
                                    <option value="">Seleccione</option>
                                    <?php
                                    require 'conexionCancer.php';
                                    $query = $conexionCancer->prepare("SELECT curplupus FROM dato_usuariolupus ");
                                    $query->execute();
                                    $query->setFetchMode(PDO::FETCH_ASSOC);
                                    while ($row = $query->fetch()) { ?>
                                        <option value="<?php echo $row['curplupus']; ?>">
                                            <?php echo $row['curplupus']; ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                            <div class="col-md-4">
                                <strong>Nombre Completo</strong>
                                <input id="nombrecompletolupus" name="nombrecompletolupus" onkeyup="curp2datelupus();" type="text" class="control form-control" value="" required>
                            </div>
                            <div class="col-md-4">
                                <strong>Escolaridad</strong>
                                <select id="escolaridad" name="escolaridad" class="form-control" style="font-size: 12px;">
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
                                <input id="fechalupus" name="fechalupus" type="date" value="" onblur="curp2datelupus();" class="control form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <strong>Edad</strong>
                                <input id="edadlupus" name="edadlupus" type="text" class="control form-control" value="" readonly>
                            </div>
                            <div class="col-md-4">
                                <strong>Sexo</strong>
                                <input type="text" class="control form-control" id="sexolupus" onclick="curp2datelupus();" name="sexolupus" readonly>
                            </div>
                            <script>
                                /*
                                    $(document).ready(function() {
                                        $('#presionarterial').mask('000/000');
                                    });*/
                                $(document).ready(function() {
                                    $('#tallalupus').mask('0.00');
                                });
                            </script>
                            <div class="col-md-4">
                                <strong>Talla</strong>
                                <input type="number" step="any" class="form-control" id="tallalupus" name="tallalupus" required>
                            </div>
                            <div class="col-md-4">
                                <strong>Peso</strong>
                                <input type="number" step="any" class="form-control" id="pesolupus" onkeyup="calculaIMClupus();" name="pesolupus" required>

                            </div>
                            <div class="col-md-4">
                                <strong>IMC</strong>
                                <input type="text" class="form-control" id="imclupus" onkeyup="calculaIMClupus();" name="imclupus" value="" readonly>

                            </div>

                            
                                <div class="col-md-6">
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
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <strong>Delegación o Municipio</strong>
                                    <select name="cbx_municipio" id="cbx_municipio" class="form-control" style="width: 100%;">
                                    </select>
                                </div>
                                <!--
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
                                        while ($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['clues']; ?>">
                                                <?php echo $row['unidad']; ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>-->
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center;
                                    background-color: #b763a2;
                                    color:aliceblue;
                                    margin-top: 5px; font-size: 18px; ">
                                <strong>ANTECEDENTES PERSONALES PATOLÓGICOS</strong>
                            </div>
                            <div class="col-md-12">
                                <strong> Antecedentes Personales Patológicos </strong>
                                <select id="msapp" name="msapp[]" multiple="multiple" class="form-control">
                                    <option value="Ninguno"> Ninguno</option>
                                    <option value="Alcoholismo"> Alcoholismo</option>
                                    <option value="Artritis Reumatoide"> Artritis Reumatoide</option>
                                    <option value="Diabetes Mellitus"> Diabetes Mellitus</option>
                                    <option value="Hipertension Arterial"> Hipertension Arterial</option>
                                    <option value="Obesidad"> Obesidad</option>
                                    <option value="Sx Antifosfolipidos"> Sx Antifosfolípidos</option>
                                </select>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                <strong>CLÍNICA</strong>
                            </div>
                            <br>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>ACTIVIDAD LÚPICA</strong>
                            </div>
                            <div class="col-md-3">
                                <strong>Actividad Articular</strong>
                                <select name="actividadArticular" id="actividadArticular" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong>Actividad Cutánea</strong>
                                <select name="actividadCutanea" id="actividadCutanea" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong>Actividad Hematología</strong>
                                <select name="actividadHematologia" id="actividadHematologia" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong>Actividad Inmunológica</strong>
                                <select name="actividadInmuno" id="actividadInmuno" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong>Actividad Neurológica</strong>
                                <select name="actividadNeurologica" id="actividadNeurologica" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <strong>Actividad Renal</strong>
                                <select name="actividadRenal" id="actividadRenal" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <strong>Actividad Muscular</strong>
                                <select name="actividadmuscular" id="actividadmuscular" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <strong>Actividad Cardiaca</strong>
                                <select name="actividadCardiaca" id="actividadCardiaca" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                    <br>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>CALCULADORA SLEDAI</strong>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="container" id="contenedor">
                                
                                <div class="custom-control custom-checkbox text-inline">

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Convulsiones">
                                        <label for="convulsion" class="form-check-label">Convulsión</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Psicosis">
                                        <label for="Psicosis" class="form-check-label">Psicosis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Sindrome cerebral organico">
                                        <label for="sindromecerebralorganico" class="form-check-label">Síndrome Cerebral Orgánico</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name='arraysledai[]' id="arraysledai[]" value="Alteracion visual">
                                        <label for="alteracionvisual" class="form-check-label">Alteración Visual</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Trastorno de nervios craneales"> 
                                        <label for="tnervioscentrales" class="form-check-label">Trastorno De Los Nervios Craneales</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Dolor de cabeza">
                                        <label for="dolorcabeza" class="form-check-label">Dolor De Cabeza Por Lupus</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Evc">
                                        <label for="evc" class="form-check-label">EVC</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="8" name="arraysledai[]" id="arraysledai[]" value="Vasculitis">
                                        <label for="Vasculitis" class="form-check-label">Vasculitis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="4" name="arraysledai[]" id="arraysledai[]" value="Artritis">
                                        <label for="aartritis" class="form-check-label">Artritis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="4" name="arraysledai[]" id="arraysledai[]" value="Miositis">
                                        <label for="Miositis" class="form-check-label">Miositis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="4" name="arraysledai[]" id="arraysledai[]" value="Cilindros urinarios">
                                        <label for="cilindrosurinarios" class="form-check-label">Cilindros Urinarios</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="4" name="arraysledai[]" id="arraysledai[]" value="Hematuria">
                                        <label for="hematuria" class="form-check-label">Hematuria</label>
                                    </div>
                                </div>

                                <!--segunda columna-->
                                <div class="col-md-6">

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="4" name="arraysledai[]" id="arraysledai[]" value="Piuria">
                                        <label for="Piuria" class="form-check-label">Piuria</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Proteinuria">
                                        <label for="Proteinuria" class="form-check-label">Proteinuria</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Erupcion">
                                        <label for="erupcion" class="form-check-label">Erupción</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Ulcerasmucosas">
                                        <label for="ulceras" class="form-check-label">Úlceras De Las Mucosas</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Pleuritis">
                                        <label for="Pleuritis" class="form-check-label">Pleuritis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Pericarditis">
                                        <label for="Pericarditis" class="form-check-label">Pericarditis</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Bajo complemento">
                                        <label for="bajocomplemento" class="form-check-label">Bajo com(C3,C4 O Ch50 Bajo)</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="2" name="arraysledai[]" id="arraysledai[]" value="Aumento de union adn">
                                        <label for="ADN" class="form-check-label">Aumento de la Unión al ADN</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="1" name="arraysledai[]" id="arraysledai[]" value="Fiebre">
                                        <label for="convulsion" class="form-check-label">Fiebre</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="1" name="arraysledai[]" id="arraysledai[]" value="Trombocitopenia">
                                        <label for="Trombocitopenia" class="form-check-label">Trombocitopenia</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="1" name="arraysledai[]" id="arraysledai[]" value="Leucopenia">
                                        <label for="Leucopenia" class="form-check-label">Leucopenia</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" tu-attr-valor="1" name="arraysledai[]" id="arraysledai[]" value="Alopecia">
                                        <label for="Alopecia" class="form-check-label">Alopecia</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12"><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="resultadosledai"><strong>Resultado SLEDAI</strong></span>
                                    <input type="text" class="form-control" aria-describedby="resultadosledai" readonly value="" id="valorfinalresultadosledai" name="valorfinalresultadosledai">
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>LABORATORIOS</strong>
                            </div>
                            <div class="col-md-3">
                                <strong>Albúmina Sérica</strong>
                                <input type="number" step="any" class="form-control" id="albumina" name="albumina">
                            </div>

                            <div class="col-md-2">
                                <strong>BUN</strong>
                                <input type="number" step="any" class="form-control" id="bun" name="bun">
                            </div>

                            <div class="col-md-2">
                                <strong>C3</strong>
                                <input type="number" step="any" class="form-control" id="c3" name="c3">
                            </div>

                            <div class="col-md-2">
                                <strong>C4</strong>
                                <input type="number" step="any" class="form-control" id="c4" name="c4">
                            </div>

                            <div class="col-md-3">
                                <strong>Creatina Sérica</strong>
                                <input type="number" step="any" class="form-control" id="creatina" name="creatina">
                            </div>

                            <div class="col-md-3">
                                <strong>Proteinuria en 24 hrs</strong>
                                <input type="number" step="any" class="form-control" id="proteinuria" name="proteinuria">
                            </div>

                            <div class="col-md-3">
                                <strong>Albúminuria en 24 hrs</strong>
                                <input type="number" step="any" class="form-control" id="albumina24" name="albumina24">
                            </div>

                            <div class="col-md-3">
                                <strong>Leucocitos</strong>
                                <input type="number" step="any" class="form-control" id="Leucocitos" name="Leucocitos">
                            </div>

                            <div class="col-md-3">
                                <strong>Linfocitos</strong>
                                <input type="number" step="any" class="form-control" id="Linfocitos" name="Linfocitos">
                            </div>

                            <div class="col-md-3">
                                <strong>Plaquetas</strong>
                                <input type="number" step="any" class="form-control" id="Plaquetas" name="Plaquetas">
                            </div>

                            <div class="col-md-3">
                                <strong>Hemoglobina</strong>
                                <input type="number" step="any" class="form-control" id="Hemoglobina" name="Hemoglobina">
                            </div>

                            <div class="col-md-3">
                                <strong>Vitamina D</strong>
                                <input type="number" step="any" class="form-control" id="vitaminad" name="vitamina4">
                            </div>

                            <div class="col-md-3">
                                <strong>Anticuerpo Lúpico</strong>
                                <select name="antidna" id="antidna" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Detectado">Detectado</option>
                                    <option value="No Detectado">No Detectado</option>
                                </select>
                            </div>

                            <br>
                            <br>
                            <br>

                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #baaedd;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>Anticuerpos</strong>
                            </div>

                            <div class="col-md-3">
                                <strong>Ac-DNA Elevado</strong>
                                <select name="acdnaelevado" id="acdnaelevado" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <strong>Ac-SM</strong>
                                <select name="antism" id="antism" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <strong>Ac-RNP</strong>
                                <select name="antiRNP" id="antiRNP" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <strong>Ac-RO</strong>
                                <select name="antiRO" id="antiRO" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <strong>Ac-LA</strong>
                                <select name="antiLA" id="antiLA" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <strong>Ac-Cardiolipinas IgM</strong>
                                <select name="anticardioigm" id="anticardioigm" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3" id="valorigm">
                                <strong>Valor Ac-Cardiolipinas IgM</strong>
                                <input type="number" step="any" class="form-control" id="valorigm1" name="valorigm1">
                            </div>


                            <div class="col-md-3">
                                <strong>Ac-Cardiolipinas IgG</strong>
                                <select name="anticardioigg" id="anticardioigg" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3" id="valorigg">
                                <strong>Valor Ac-Cardiolipinas IgG</strong>
                                <input type="number" step="any" class="form-control" id="valorigg1" name="valorigg1">
                            </div>

                            <div class="col-md-3">
                                <strong>Ac B2-GPI IgG</strong>
                                <select name="b2gpi" id="b2gpi" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3" id="valorgpi">
                                <strong>Valor Ac B2-GPI IgG</strong>
                                <input type="number" step="any" class="form-control" id="valorgpi1" name="valorgpi1">
                            </div>


                            <div class="col-md-3">
                                <strong>Ac B2-GPI IgM</strong>
                                <select name="b2gpiIGM" id="b2gpiIGM" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>

                            <div class="col-md-3" id="valorgpiIGM">
                                <strong>Valor Ac B2-GPI IgM</strong>
                                <input type="number" step="any" class="form-control" id="valorgpiIGM1" name="valorgpiIGM1">
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>BIOPSIA RENAL</strong>
                            </div>

                            <div class="col-md-6">
                                <strong>Biopsia Renal</strong>
                                <select name="biopsiaRenal" id="biopsiaRenal" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="tipodebiopsia">
                                <strong>Tipo</strong>
                                <select name="tipobiopsia" id="tipobiopsia" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Clase 1. G. Mesangial">Clase 1. G. Mesangial</option>
                                    <option value="Clase 2. G. Mesangio Proliferativa">Clase 2. G. Mesangio Proliferativa</option>
                                    <option value="Clase 3. G. Proliferativa Focal">Clase 3. G. Proliferativa Focal"</option>
                                    <option value="Clase 4. G. Proliferativa Difusa">Clase 4. G. Proliferativa Difusa</option>
                                    <option value="Clase 5. G. Membranosa">Clase 5. G. Membranosa</option>
                                    <option value="Clase 6. Enfermedad Renal Crónica">Clase 6. Enfermedad Renal Crónica"</option>
                                    <option value="Glomerulos Normales">Glomerulos Normales</option>
                                </select>
                            </div>
                            <!--Inicia la sección de BIOPSIA RENAL-->
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>MARCADORES DE MAL PRONÓSTICO</strong>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #baaedd;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                <strong>Índices</strong>
                            </div>
                            <div class="col-md-6">
                                <strong>Índice</strong>
                                <select name="indice" id="indice" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="tipodeindice">
                                <strong>Tipo</strong>
                                <select name="tipoindice" id="tipoindice" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Clase 1. G. Mesangial">Clase 1. G. Mesangial</option>
                                    <option value="Clase 2. G. Mesangio Proliferativa">Clase 2. G. Mesangio Proliferativa</option>
                                    <option value="Clase 3. G. Proliferativa Focal">Clase 3. G. Proliferativa Focal"</option>
                                    <option value="Clase 4. G. Proliferativa Difusa">G. Proliferativa Difusa</option>
                                    <option value="Clase 5. G. Membranosa">Clase 5. G. Membranosa</option>
                                    <option value="Clase 6. Enfermedad Renal Crónica">Clase 6. Enfermedad Renal Crónica"</option>
                                    <option value="Glomerulos Normales">Glomerulos Normales</option>
                                </select>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                <strong>TRATAMIENTO</strong>
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Metrotexate</strong>
                                <br>
                                <input type="radio" name="metrotexate" id="metrotexate1" class="check" value="si" onclick="metrotexasi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="metrotexate" id="metrotexate2" class="check" value="no" checked onclick="metrotexateno();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>

                            <div class="col-md-3">
                                <strong>Dosis Semanal:</strong>
                                <input id="dosisSemanalmetro" name="dosisSemanalmetro" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Hidroxicloroquina</strong>
                                <br>
                                <input type="radio" name="Hidroxicloroquina" id="Hidroxicloroquina1" class="check" value="si" onclick="Hidroxicloroquinasi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Hidroxicloroquina" id="Hidroxicloroquina2" class="check" value="no" checked onclick="Hidroxicloroquinano();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>

                            <div class="col-md-3">
                                <strong>Dosis diaria:</strong>
                                <input id="dosisDiariaHidro" name="dosisDiariaHidro" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Azatioprina</strong>
                                <br>
                                <input type="radio" name="Azatioprina" id="Azatioprina1" class="check" value="si" onclick="Azatioprinasi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Azatioprina" id="Azatioprina2" class="check" value="no" checked onclick="Azatioprinano();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>

                            <div class="col-md-3">
                                <strong>Dosis Diaria:</strong>
                                <input id="dosisDiariaAzatioprina" name="dosisDiariaAzatioprina" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Prednisona</strong>
                                <br>
                                <input type="radio" name="Prednisona" id="Prednisona1" class="check" value="si" onclick="Prednisonasi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Prednisona" id="Prednisona2" class="check" value="no" checked onclick="Prednisonano();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>

                            <div class="col-md-3">
                                <strong>Dosis Diaria:</strong>
                                <input id="dosisDiariaPrednisona" name="dosisDiariaPrednisona" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Micofenolato de Mofetilo</strong>
                                <br>
                                <input type="radio" name="Micofenolato" id="Micofenolato1" class="check" value="si" onclick="Micofenolatosi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Micofenolato" id="Micofenolato2" class="check" value="no" checked onclick="Micofenolatono();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>
                            <div class="col-md-3">
                                <strong>Dosis Diaria:</strong>
                                <input id="dosisDiariaMicofenolato" name="dosisDiariaMicofenolato" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Ciclofosfamida</strong>
                                <br>
                                <input type="radio" name="Ciclofosfamida" id="Ciclofosfamida1" class="check" value="si" onclick="Ciclofosfamidasi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Ciclofosfamida" id="Ciclofosfamida2" class="check" value="no" checked onclick="Ciclofosfamidano();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>
                            <div class="col-md-3">
                                <strong>Dosis Mensual:</strong>
                                <input id="dosisMensualCiclofosfamida" name="dosisMensualCiclofosfamida" type="text" class="form-control" value="0">
                            </div>
                            <fieldset class="col-md-3">
                                <strong>Rituximab</strong>
                                <br>
                                <input type="radio" name="Rituximab" id="Rituximab1" class="check" value="si" onclick="Rituximabsi();">&nbsp;Sí&nbsp;&nbsp;
                                <input type="radio" name="Rituximab" id="Rituximab2" class="check" value="no" checked onclick="Rituximabno();">&nbsp;No&nbsp;&nbsp;
                            </fieldset>
                            <div class="col-md-3">
                                <strong>
                                    Apego a Tratamiento</strong>
                                <select name="apegotratamiento" id="apegotratamiento" class="form-select">
                                    <option value="0">Seleccione...</option>
                                    <option value="Parcial">Parcial</option>
                                    <option value="Total">Total</option>
                                    <option value="Sin apego">Sin Apego</option>
                                </select>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                <strong>DEFUNCIÓN</strong>
                            </div>
                            <div class="col-md-12">
                                <strong>Defunción</strong>
                                <select name="defuncion" id="defuncion" class="form-control">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-12"></div>
                                <div class="contenedorbotones">
                                <input type="button" onclick="window.location.reload();" value="Cerrar formulario" id="botonescarga1">
                                <input type="submit" value="Registrar" id="botonescarga2"></div>
                                <br>
                                    </div>
                                </form>
                                <div id="tabla_resultado2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>