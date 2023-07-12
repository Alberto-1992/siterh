<div class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="economiaSalud">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--se agrega estilos para icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/getCatalogos.js"></script>
    <script src="js/scriptModalEconomia.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="modal-dialog modal-lg">


        <!-- Modal content-->
        <!-- Inicia Modal Header -->
        <div class="modal-content">
            <div class=" modal-header" id="cabeceraModalEconomia">
                <span class="material-symbols-outlined" style="color: white;">
                    person_add
                </span>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="limpiar();">&times;</button>
            </div>
            <!-- Finaliza Modal Header -->




            <div class="modal-body">
                <div id="panel_editar">
                    <div class="modal-body">



                        <!-- Header inicial Datos del Paciente -->
                        <div class="form-header">
                            <h5 class="form-title" style="text-align: center;
                                    background-color:  #829f75;
                                    color: aliceblue;
                                    margin-top:5px;">
                                🙍🏻DATOS DEL PACIENTE 🙍🏻</h5>
                        </div>
                        <!-- Fin Header inicial Datos del Paciente -->





                        <form name="formulariocancerbucal" id="formulariocancerbucal" onSubmit="return limpiar()" autocomplete="off">
                            <div class="form-row">
                                <div id="mensaje"></div>
                                <script>
                                    $("#formulariocancerbucal").on("submit", function(e) {
                                        if ($('input[name=curp]').val().length == 0 || $(
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

                                            url: "aplicacion/registrarpacienteEconomia.php",
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
                                </script>

                                <div class="col-md-6" autocomplete="off">
                                    <input id="year" name="year" class="control form-control" type="hidden" value="2022" required="required" readonly>
                                </div>
                                <div class="col-md-12">
                                    <input id="cest" name="cest" type="hidden" class="form-control" value="cest">
                                </div>





                                <!-- Inicia formulario de Datos del Paciente-->
                                <div class="col-md-4">
                                    <strong>CURP</strong>
                                    <input list="curpusuario" id="curp" name="curp" type="text" class="control form-control" value="" onblur="curp2date();" minlength="18" maxlength="18" required>
                                    <datalist id="curpusuario">
                                        <option value="">Seleccione</option>
                                        <?php
                                        require 'conexionCancer.php';
                                        $query = $conexionCancer->prepare("SELECT curp FROM dato_usuario ");
                                        $query->execute();
                                        $query->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $query->fetch()) { ?>
                                            <option value="<?php echo $row['curp']; ?>">
                                                <?php echo $row['curp']; ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>


                                <div class="col-md-4">
                                    <strong>Nombre Completo</strong>
                                    <input id="nombrecompleto" name="nombrecompleto" onblur="calcularEdad();" type="text" class="control form-control" value="" required>
                                </div>

                                <div class="col-md-4">
                                    <strong>Fecha de Nacimiento</strong>
                                    <input id="fecha" name="fecha" type="date" value="" onblur="curp2date();" class="control form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <strong>Edad</strong>
                                    <input id="edad" name="edad" type="text" class="control form-control" value="" readonly>
                                </div>

                                <div class="col-md-4">
                                    <strong>Sexo</strong>
                                    <input type="text" class="control form-control" id="sexo" onclick="curp2date();" name="sexo" readonly>

                                </div>


                                <script>
                                    $(document).ready(function() {
                                        $('#talla').mask('0.00');
                                    });
                                </script>

                                <div class="col-md-4">
                                    <strong>Talla</strong>
                                    <input type="number" step="any" class="form-control" id="talla" name="talla" required>
                                </div>


                                <div class="col-md-4">
                                    <strong>Peso</strong>
                                    <input type="number" step="any" class="form-control" id="peso" onblur="calculaIMC();" name="peso" required>

                                </div>
                                <div class="col-md-4">
                                    <strong>IMC</strong>
                                    <input type="text" class="form-control" id="imc" onblur="calculaIMC();" name="imc" value="" readonly>

                                </div>

                                <div class="col-md-4">
                                    <strong>Referenciado</strong>
                                    <select name="referenciado" id="referenciado" class="form-control">
                                        <option value="Sin registro">Sin registro</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <!--Si el paciente SÍ es referenciado, se habilita la Unidad de Referencia-->
                                <div class="col-md-6" id="medioreferencia">
                                    <strong>Unidad Referencia</strong>
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

                                <div class="col-md-6" id="idreferencia">
                                    <strong>Dx Referencia</strong>
                                    <input type="string" step="any" class="form-control" id="referencia" name="referencia" required>

                                </div>

                                <!-- Si es no, se debe habilitar Estado, Delegación, Municipio-->
                                <div class="col-md-4" id="idestadoResidencia">
                                    <strong>Estado Residencia</strong>

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


                                <div class="col-md-4" id="idmunicipio">
                                    <strong>Delegación o Municipio</strong>
                                    <select name="cbx_municipio" id="cbx_municipio" class="form-control" style="width: 100%;">
                                    </select>
                                </div>

                                <div class="col-md-4" id="idlocalidad">
                                    <strong>Localidad</strong>
                                    <select name="cbx_municipio" id="cbx_municipio" class="form-control" style="width: 100%;">
                                    </select>
                                </div>

                                <div class="col-md-8" id="idcontrareferencia">
                                    <strong>Dx Contrarreferencia</strong>
                                    <input type="string" step="any" class="form-control" id="Contrareferencia" name="Contrareferencia" required>
                                </div>

                                <div class="col-md-4" id="idfechacontra">
                                    <strong>Fecha Contrarreferencia</strong>
                                    <input type="date" id="fechacontra" name="fechacontra" class="form-control">
                                </div>
                                <div class="col-md-12"></div>
                                <div class="contenedorbotones">
                                <input type="button" onclick="window.location.reload();" value="Cerrar formulario" id="botonescarga1">
                                <input type="submit" value="Registrar" id="botonescarga2">
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