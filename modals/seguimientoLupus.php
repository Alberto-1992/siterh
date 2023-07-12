<div id="seguimientolupus" class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/enviacurp.js"></script>
    <script src="js/scriptSeguimientoLupus.js"></script>
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content" style="width: 800px; height: auto; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" id="cabeceraModalLupus">
                <span class="material-symbols-outlined">
                    edit_note
                </span>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiarformularioseguimiento();">&times;</button>
            </div>
            <div class="modal-body">
                <div id="panel_editar">
                    <div class="contrato-nuevo">

                        <div class="modal-body">
                            <script>
                                $(window).load(function() {
                                    $(".loader").fadeOut("slow");
                                });

                                function limpiarformularioseguimiento() {

                                    setTimeout('document.formularioseguimientobucal.reset()', 1000);
                                    return false;
                                }
                            </script>
                            <!-- form start -->
                            <div class="form-header">
                                <h5 class="form-title" style="text-align: center;
                                    background-color:  #b763a2;
                                    color: aliceblue;
                                    margin-top:5px;">
                                    🙍🏻‍♀️ DATOS DEL PACIENTE 🙍🏻‍♂️</h5>
                            </div>
                            <style>
                                #fecha,
                                #curp,
                                #nombrecompleto,
                                #edad {
                                    text-transform: uppercase;
                                }
                            </style>
                            <form name="formularioseguimientolupus" id="formularioseguimientolupus" onSubmit="return limpiar()">
                                <div class="form-row">
                                    <div id="mensaje"></div>
                                    <script>
                                        $("#formularioseguimientolupus").on("submit", function(e) {
                                            let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                            e.preventDefault();
                                            var formData = new FormData(document.getElementById(
                                                "formularioseguimientolupus"));
                                            formData.append("dato", "valor");
                                            $.ajax({
                                                url: "aplicacion/registrarSeguimientoPacienteLupus.php",
                                                type: "post",
                                                dataType: "html",
                                                data: formData,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(datos) {
                                                    $("#mensaje").html(datos);
                                                }
                                            })
                                        })
                                        var idcurp;

                                        function obtenerid() {
                                            var textoadjunto = document.getElementById("curps").value = idcurp;
                                        }
                                    </script>



                                    <input id="year" name="year" class="form-control" type="hidden" value="2022" required="required" onkeyup="mayus(this);" readonly>

                                    <div class="col-md-4">
                                        <strong>CURP:&nbsp;</strong>
                                        <input id="curps" name="curps" class="form-control" type="text" value="" readonly>
                                        <span id="curp" class="curp" name="curp"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <strong>Nombre Completo</strong>
                                        <input id="nombrecompleto" name="nombrecompleto" onblur="calcularEdad();" type="text" class="control form-control" value="" required>
                                    </div>
                                    <div class="col-md-4" id="idfechaseguimientolupus">
                                        <strong>Fecha de Seguimiento</strong>
                                        <input type="date" id="fechaSeguimiento" name="fechaSeguimiento" class="form-control">
                                    </div>
                                    <!--Inicia la sección de Antecedentes Personales Patológicos-->
                                    <div class="col-md-12"></div>
                                    <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                        <strong>CLÍNICA</strong>
                                    </div>
                                    <br>
                                    <!--Inicia la sección de ACTIVIDAD LÚPICA-->
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

                                    <!--Inicia la sección de CALCULADORA SLEDAI-->
                                    <div class="col-md-12"></div>
                                    <div class="form-title" style="text-align: center; 
                                    background-color: #cba1ce;
                                    color:aliceblue;
                                    margin-top: 5px; 
                                    font-size: 13px; ">
                                        <strong>CALCULADORA SLEDAI</strong>
                                    </div>

                                    <div class="container" id="contenedor">
                                        <!-- <div class="form-check form-check-inline">-->
                                        <!-- <div class="form-check form-check-inline">-->
                                        <div class="custom-control custom-checkbox text-inline">

                                            <!--primera columna-->

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Convulsion" id="convulsion">
                                                <label for="convulsion" class="form-check-label">Convulsión</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Psicosis" id="Psicosis">
                                                <label for="Psicosis" class="form-check-label">Psicosis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Síndrome Cerebral Orgánico" id="sindromecerebralorganico">
                                                <label for="sindromecerebralorganico" class="form-check-label">Síndrome Cerebral Orgánico</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8AlteracionVisual" id="alteracionvisual">
                                                <label for="alteracionvisual" class="form-check-label">Alteración Visual</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Trastorno De Los Nervios Craneales" id="tnervioscentrales">
                                                <label for="tnervioscentrales" class="form-check-label">Trastorno De Los Nervios Craneales</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Dolor De Cabeza Por Lupus" id="dolorcabeza">
                                                <label for="dolorcabeza" class="form-check-label">Dolor De Cabeza Por Lupus</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8EVC" id="evc">
                                                <label for="evc" class="form-check-label">EVC</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="8Vasculitis" id="Vasculitis">
                                                <label for="Vasculitis" class="form-check-label">Vasculitis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="4Artritis" id="aartritis">
                                                <label for="aartritis" class="form-check-label">Artritis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="4Miositis" id="Miositis">
                                                <label for="Miositis" class="form-check-label">Miositis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="4Cilindros Urinarios" id="cilindrosurinarios">
                                                <label for="cilindrosurinarios" class="form-check-label">Cilindros Urinarios</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="4Hematuria" id="hematuria">
                                                <label for="hematuria" class="form-check-label">Hematuria</label>
                                            </div>
                                        </div>

                                        <!--segunda columna-->
                                        <div class="col-md-6">

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="4Piuria" id="Piuria">
                                                <label for="Piuria" class="form-check-label">Piuria</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Proteinuria" id="Proteinuria">
                                                <label for="Proteinuria" class="form-check-label">Proteinuria</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Erupción" id="erupcion">
                                                <label for="erupcion" class="form-check-label">Erupción</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Úlceras De Las Mucosasa" id="ulceras">
                                                <label for="ulceras" class="form-check-label">Úlceras De Las Mucosas</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Pleuritis" id="Pleuritis">
                                                <label for="Pleuritis" class="form-check-label">Pleuritis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Pericarditis" id="Pericarditis">
                                                <label for="Pericarditis" class="form-check-label">Pericarditis</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Bajo Complemento (C3,C4 O Ch50 Bajo)" id="bajocomplemento">
                                                <label for="bajocomplemento" class="form-check-label">Bajo com(C3,C4 O Ch50 Bajo)</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="2Aumento de la Unión al ADN" id="ADN">
                                                <label for="ADN" class="form-check-label">Aumento de la Unión al ADN</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="1Fiebre" id="fiebre">
                                                <label for="convulsion" class="form-check-label">Fiebre</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="1Trombocitopenia" id="Trombocitopenia">
                                                <label for="Trombocitopenia" class="form-check-label">Trombocitopenia</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="1Leucopenia" id="Leucopenia">
                                                <label for="Leucopenia" class="form-check-label">Leucopenia</label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" value="1Alopecia" id="Alopecia">
                                                <label for="Alopecia" class="form-check-label">Alopecia</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="resultadosledai"><strong>Resultado SLEDAI</strong></span>
                                            <input type="text" class="form-control" aria-describedby="resultadosledai" readonly value="">
                                        </div>
                                    </div>
                                    <!--Inicia la sección de LABORATORIO-->
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
                                        <input type="number" step="any" class="form-control" id="albumina" name="albumina" required>
                                    </div>

                                    <div class="col-md-2">
                                        <strong>BUN</strong>
                                        <input type="number" step="any" class="form-control" id="bun" name="bun" required>
                                    </div>

                                    <div class="col-md-2">
                                        <strong>C3</strong>
                                        <input type="number" step="any" class="form-control" id="c3" name="c3" required>
                                    </div>

                                    <div class="col-md-2">
                                        <strong>C4</strong>
                                        <input type="number" step="any" class="form-control" id="c4" name="c4" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Creatina Sérica</strong>
                                        <input type="number" step="any" class="form-control" id="creatina" name="creatina" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Proteinuria en 24 hrs</strong>
                                        <input type="number" step="any" class="form-control" id="proteinuria" name="proteinuria" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Albúminuria en 24 hrs</strong>
                                        <input type="number" step="any" class="form-control" id="albumina24" name="albumina24" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Leucocitos</strong>
                                        <input type="number" step="any" class="form-control" id="Leucocitos" name="Leucocitos" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Linfocitos</strong>
                                        <input type="number" step="any" class="form-control" id="Linfocitos" name="Linfocitos" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Plaquetas</strong>
                                        <input type="number" step="any" class="form-control" id="Plaquetas" name="Plaquetas" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Hemoglobina</strong>
                                        <input type="number" step="any" class="form-control" id="Hemoglobina" name="Hemoglobina" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Vitamina D</strong>
                                        <input type="number" step="any" class="form-control" id="vitaminad" name="vitamina4" required>
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
                                        <select name="antidna" id="antidna" class="form-control">
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
                                        <select name="seganticardioigm" id="seganticardioigm" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo">Negativo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3" id="segvalorigm">
                                        <strong>Valor Ac-Cardiolipinas IgM</strong>
                                        <input type="number" step="any" class="form-control" id="segvalorigm" name="segvalorigm" required>
                                    </div>


                                    <div class="col-md-3">
                                        <strong>Ac-Cardiolipinas IgG</strong>
                                        <select name="seganticardioigg" id="seganticardioigg" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo">Negativo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3" id="segvalorigg">
                                        <strong>Valor Ac-Cardiolipinas IgG</strong>
                                        <input type="number" step="any" class="form-control" id="segvalorigg" name="segvalorigg" required>
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Ac B2-GPI IgG</strong>
                                        <select name="segb2gpi" id="segb2gpi" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo">Negativo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3" id="segvalorgpi">
                                        <strong>Valor Ac B2-GPI IgG</strong>
                                        <input type="number" step="any" class="form-control" id="segvalorgpi" name="segvalorgpi" required>
                                    </div>


                                    <div class="col-md-3">
                                        <strong>Ac B2-GPI IgM</strong>
                                        <select name="segb2gpiIGM" id="segb2gpiIGM" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Positivo">Positivo</option>
                                            <option value="Negativo">Negativo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3" id="segvalorgpiIGM">
                                        <strong>Valor Ac B2-GPI IgM</strong>
                                        <input type="number" step="any" class="form-control" id="segvalorgpiIGM" name="segvalorgpiIGM" required>
                                    </div>
                                    <!--Inicia la sección de BIOPSIA RENAL-->
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
                                        <select name="biopsiaRenalseguimiento" id="biopsiaRenalseguimiento" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Si">Sí</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6" id="idtipobiopsiaseguimiento">
                                        <strong>Tipo</strong>
                                        <select name="tipobiopsiaseguimiento" id="tipobiopsiaseguimiento" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="G. Focal Y Segmentaria">G. Focal Y Segmentaria</option>
                                            <option value="G. Membranosa">G. Membranosa</option>
                                            <option value="G. Proliferativa Difusa">G. Proliferativa Difusa</option>
                                            <option value="Glomerulos Normales">Glomerulos Normales</option>
                                            <option value="Mesangial Pura">Mesangial Pura</option>
                                        </select>
                                    </div>

                                    <!-- Inicia sección Tratamiento-->

                                    <div class="col-md-12"></div>
                                    <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                        <strong>TRATAMIENTO</strong>
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Metrotexate</strong>
                                        <br>
                                        <input type="radio" name="smetrotexate" id="smetrotexate1" class="check" value="si" onclick="smetrotexatesi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="smetrotexate" id="smetrotexate2" class="check" value="no" checked onclick="smetrotexateno();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis Semanal:</strong>
                                        <input id="sdosisSemanalmetro" name="sdosisSemanalmetro" type="text" class="form-control" value="0">
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Hidroxicloroquina</strong>
                                        <br>
                                        <input type="radio" name="sHidroxicloroquina" id="sHidroxicloroquina1" class="check" value="si" onclick="sHidroxicloroquinasi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sHidroxicloroquina" id="sHidroxicloroquina2" class="check" value="no" checked onclick="sHidroxicloroquinano();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis diaria:</strong>
                                        <input id="sdosisDiariaHidro" name="sdosisDiariaHidro" type="text" class="form-control" value="0">
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Azatioprina</strong>
                                        <br>
                                        <input type="radio" name="sAzatioprina" id="sAzatioprina1" class="check" value="si" onclick="sAzatioprinasi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sAzatioprina" id="sAzatioprina2" class="check" value="no" checked onclick="sAzatioprinano();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis Diaria:</strong>
                                        <input id="sdosisDiariaAzatioprina" name="sdosisDiariaAzatioprina" type="text" class="form-control" value="0">
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Prednisona</strong>
                                        <br>
                                        <input type="radio" name="sPrednisona" id="sPrednisona1" class="check" value="si" onclick="sPrednisonasi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sPrednisona" id="sPrednisona2" class="check" value="no" checked onclick="sPrednisonano();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis Diaria:</strong>
                                        <input id="sdosisDiariaPrednisona" name="sdosisDiariaPrednisona" type="text" class="form-control" value="0">
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Micofenolato de Mofetilo</strong>
                                        <br>
                                        <input type="radio" name="sMicofenolato" id="sMicofenolato1" class="check" value="si" onclick="sMicofenolatosi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sMicofenolato" id="sMicofenolato2" class="check" value="no" checked onclick="sMicofenolatono();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis Diaria:</strong>
                                        <input id="sdosisDiariaMicofenolato" name="sdosisDiariaMicofenolato" type="text" class="form-control" value="0">
                                    </div>

                                    <!-- si selecciona SÍ en el medicamento, se debe abrir el campo de "Dosis Semanal":-->
                                    <fieldset class="col-md-3">
                                        <strong>Ciclofosfamida</strong>
                                        <br>
                                        <input type="radio" name="sCiclofosfamida" id="sCiclofosfamida1" class="check" value="si" onclick="sCiclofosfamidasi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sCiclofosfamida" id="sCiclofosfamida2" class="check" value="no" checked onclick="sCiclofosfamidano();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>

                                    <div class="col-md-3">
                                        <strong>Dosis Mensual:</strong>
                                        <input id="sdosisMensualCiclofosfamida" name="sdosisMensualCiclofosfamida" type="text" class="form-control" value="0">
                                    </div>



                                    <fieldset class="col-md-3">
                                        <strong>Rituximab</strong>
                                        <br>
                                        <input type="radio" name="sRituximab" id="sRituximab1" class="check" value="si" onclick="sRituximabsi();">&nbsp;Sí&nbsp;&nbsp;
                                        <input type="radio" name="sRituximab" id="sRituximab2" class="check" value="no" checked onclick="sRituximabno();">&nbsp;No&nbsp;&nbsp;
                                    </fieldset>


                                    <div class="col-md-3">
                                        <strong>
                                            Apego a Tratamiento</strong>
                                        <select name="sapegotratamiento" id="sapegotratamiento" class="form-select">
                                            <option value="0">Seleccione...</option>
                                            <option value="Parcial">Parcial</option>
                                            <option value="Total">Total</option>
                                            <option value="Sin apego">Sin Apego</option>
                                        </select>
                                    </div>
                                    <!--Inicia la sección de DEFUNCION-->
                                    <div class="col-md-12"></div>
                                    <div class="form-title" style="text-align: center; 
                                    background-color: #b763a2;
                                    color:aliceblue; 
                                    margin-top: 5px; 
                                    font-size: 18px;">
                                        <strong>DEFUNCIÓN</strong>
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Defunción</strong>
                                        <select name="defuncion" id="defuncion" class="form-control">
                                            <option value="Seleccione">Seleccione...</option>
                                            <option value="Si">Sí</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <br>
                                    <input type="button" id="recargar" onclick="window.location.reload();" value="Cancelar" style="width: 170px; height: 27px; color: white; background-color: #FA0000; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">
                                    <input type="submit" id="registrar" value="Guardar" style="width: 170px; height: 27px; color: white; background-color: #008000; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">&nbsp;&nbsp;

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