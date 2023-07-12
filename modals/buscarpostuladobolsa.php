<div id="buscarpostulado" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/estilosMenu.css" rel="stylesheet">
    <script src="js/enviacurp.js"></script>
    <script src="js/scriptsSeguimientoBucal.js"></script>
    <div class="modal-dialog modal-lg">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="cabeceraModalBucal">
                
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
                            <strong>Buscar postulados</strong>
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
                        <form action="aplicacion/exportarExcel" method="POST">
                            <div class="form-row">
                                <div id="mensaje"></div>
                                
                                <div class="col-md-3">
                                    <strong>Fecha de inicio</strong>
                                    <input type="date" id="fechainicio" name="fechainicio" class="form-control">
                                </div>
                                
                                <div class="col-md-3">
                                    <strong>Fecha final</strong>
                                    <input type="date" id="fechafinal" name="fechafinal" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <strong>Buscar por carrera</strong>
                                    <input type="text" id="palabraclave" name="palabraclave" class="form-control">
                                </div>
                                <div class="col-md-12"></div>
                                <br>
                                
                                <input type="submit" id="registrar" value="Buscar" name="exportar" style="width: 150px; height: 27px; color: white; background-color: #6CCD06; margin-left: auto; margin-right: auto; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">&nbsp;&nbsp;
                                <br>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
