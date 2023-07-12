<div id="seguimientobucal" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/enviacurp.js"></script>
    <script src="js/scriptsSeguimientoBucal.js"></script>
    <div class="modal-dialog modal-lg">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalBucal">
                <span class="material-symbols-outlined">
                    edit_note
                </span>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiarformularioseguimiento();">&times;</button>

            </div>

            <div class="modal-body">
                <div id="panel_editar">

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
        
                        <div class="form-title" style="text-align:center; background-color: #d9a4a5; color: aliceblue; margin-top:5px; font-size:20px;">
                            <strong>SEGUIMIENTO DEL PACIENTE</strong>
                        </div>
                        <!--FIN de Cabecera de Seguimiento Paciente-->
                        <style>
                            #fecha,
                            #curp,
                            #nombrecompleto,
                            #edad {
                                text-transform: uppercase;
                            }
                        </style>
                        <form name="formularioseguimientobucal" id="formularioseguimientobucal" onSubmit="return limpiar()">
                            <div class="form-row">
                                <div id="mensaje"></div>
                                <script>
                                    $("#formularioseguimientobucal").on("submit", function(e) {
                                        let checked = this.querySelectorAll('input[type=checkbox]:checked');
                                        e.preventDefault();
                                        var formData = new FormData(document.getElementById(
                                            "formularioseguimientobucal"));
                                        formData.append("dato", "valor");
                                        $.ajax({
                                            url: "aplicacion/registrarSeguimientoPacienteBucal.php",
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
                                /* var idcurp;
                                    function obtenerid() {
                                        var textoadjunto = document.getElementById("curps").value = idcurp;
                                    }*/
                                </script>
                                <div class="col-md-3">
                                    <strong>Progresión Enfermedad</strong>
                                    <select name="progresionenfermedad" id="progresionenfermedad" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idfechaprogresion">
                                    <strong style="color:#7d0022">Fecha Dx Progresión</strong>
                                    <input type="date" id="fechadxprogresion" name="fechadxprogresion" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <strong>Recurrencia Enfermedad</strong>
                                    <select name="recurrencianenfermedad" id="recurrencianenfermedad" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">SÍ</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="recurrenciadate">
                                    <strong style="color:#7d0022">Fecha de recurrencia</strong>
                                    <input type="date" id="fecharecurrencia" name="fecharecurrencia" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <strong>Amerita Reintervención</strong>
                                    <select name="ameritareintervencion" id="ameritareintervencion" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">SÍ</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="datereintervencion">
                                    <strong style="color:#7d0022">Fecha de Reintervención</strong>
                                    <input type="date" id="fechareintenvencion" name="fechareintenvencion" class="form-control">
                                </div>
                                <div class="col-md-3" id="lateralidadqt">
                                    <strong style="color:#7d0022">Lateralidad Reintervención</strong>
                                    <select name="lateralidadreintervencion" id="lateralidadreintervencion" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Derecha">Derecha</option>
                                        <option value="Izquierda">Izquierda</option>
                                        <option value="Bilateral">Bilateral</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <strong>Amerita Nueva QT</strong>
                                    <select name="ameritanuevaqt" id="ameritanuevaqt" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">SÍ</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idnuevaqt">
                                    <strong style="color:#7d0022">QT</strong>
                                    <select id="msnuevaquimio" name="msnuevaquimio[]" multiple="multiple" class="form-control">
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
                                <div class="col-md-3" id="idnuevomomentoQT">
                                    <strong style="color:#7d0022">Momento QT</strong>
                                    <select name="nuevomomentoQT" id="nuevomomentoQT" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Adyuvante">Adyuvante</option>
                                        <option value="Paliativa">Paliativa</option>
                                        <option value="Concomitante">Concomitante</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <strong>Amerita Nueva Radioterapia</strong>
                                    <select name="ameritaradioterapia" id="ameritaradioterapia" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="idfechanueva">
                                    <strong style="color:#7d0022">Fecha Nueva RT:</strong>
                                    <input type="date" id="fechanueva" name="fechanueva" class="form-control">
                                </div>
                                <div class="col-md-3" id="idnuevomomentoRT">
                                    <strong style="color:#7d0022">Momento RT</strong>
                                    <select name="nuevomomentoRT" id="nuevomomentoRT" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Adyuvante">Adyuvante</option>
                                        <option value="Paliativa">Paliativa</option>
                                        <option value="Radical">Radical</option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="idnuevadosisradio">
                                    <strong style="color:#7d0022">Dosis</strong>
                                    <input type="number" class="form-control" id="nuevadosis" name="nuevadosis" placeholder="cG...">
                                </div>

                                <div class="col-md-3" id="idnuevasfraccionesRT">
                                    <strong style="color:#7d0022">Fracciones</strong>
                                    <select name="nuevasfraccionesRT" id="nuevasfraccionesRT" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="Convencional">Convencional</option>
                                        <option value="Hiperfraccionamiento">Hiperfraccionamiento</option>
                                        <option value="Hipofraccionamiento">Hipofraccionamiento</option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="idnuevonofraccionesRT">
                                    <strong style="color:#7d0022">No. Fracciones</strong>
                                    <input type="number" class="form-control" id="nuevonofraccionesRT" name="nuevonofraccionesRT" placeholder="Ingrese...">
                                </div>

                                <div class="col-md-3" id="idnuevatecnica">
                                    <strong style="color:#7d0022">Técnica</strong>
                                    <select name="nuevatecticaRT" id="nuevatecticaRT" class="form-control">
                                        <option value="Seleccione">Seleccione...</option>
                                        <option value="3D Conformal">3D Conformal</option>
                                        <option value="Braquiterapia">Braquiterapia</option>
                                        <option value="IMRT">IMRT</option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="idnuevascomplicaciones">
                                    <strong style="color:#7d0022">Complicaciones RT</strong>
                                    <select id="msnuevascomplicacionesrt" name="msnuevascomplicacionesrt[]" multiple="multiple" class="form-control">
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
                                <div class="col-md-3">
                                    <strong>Cuidados Paliativos</strong>
                                    <select name="cuidadospaliativos" id="cuidadospaliativos" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3" id="paliativaclinica">
                                    <strong style="color:#7d0022">Tipo de Cuidado Paliativo</strong>
                                    <select name="clinicapaliativa" id="clinicapaliativa" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Clinca del dolor">Clinca del Dolor</option>
                                        <option value="Medicina paliativa">Medicina Paliativa</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <strong>Protocolo Clínico</strong>
                                    <select name="protocoloclinico" id="protocoloclinico" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <strong>Protocolo de Investigación</strong>
                                    <select name="protocoloinvestigacion" id="protocoloinvestigacion" class="form-control">
                                        <option value="0">Seleccione...</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-12"></div>
                                <br>
                                <input type="button" id="recargar" onclick="window.location.reload();" value="CERRAR" style="width: 150px; height: 27px; color: white; background-color: #FA0000; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">
                                <input type="submit" id="registrar" value="GUARDAR" style="width: 150px; height: 27px; color: white; background-color: #6CCD06; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">&nbsp;&nbsp;
                                <br>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
