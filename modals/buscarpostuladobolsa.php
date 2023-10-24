<div id="buscarpostulado" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #53D6B0;">
                
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
        
                        <div class="form-title" style="text-align:center; background-color: #53D6B0; color: white; margin-top:5px; font-size: 17px;">
                            <strong>Buscar postulados</strong>
                        </div>
                        <!--FIN de Cabecera de Seguimiento Paciente-->
                        <form action="aplicacion/exportarExcel" method="POST">
                            
                                <div id="mensaje"></div>
                                
                                <div class="col-md-12">
                                    <strong>Fecha de inicio</strong>
                                    <input type="date" id="fechainicio" name="fechainicio" class="form-control">
                                </div>
                                
                                <div class="col-md-12">
                                    <strong>Fecha final</strong>
                                    <input type="date" id="fechafinal" name="fechafinal" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <strong>Buscar por carrera</strong>
                                    <input type="text" id="palabraclave" name="palabraclave" class="form-control">
                                </div>
                                <!--<div class="col-md-12">
                                    <strong>En evaluación o inicial</strong>
                                    <select name="evaluacion" class="form-control">
                                        <option>Seleccione</option>
                                        <option value="0">De inicio</option>
                                        <option value="1">En proceso de evaluación</option>
                                    </select>
                                </div>-->
                                <div class="col-md-12"></div>
                                
                                <div style="width: 100%; height: auto; display:flex; justify-content: center; align-items:center">
                                <input type="submit" id="registrar" value="Descargar Excel" name="exportar" style="width: 150px; height: 27px; color: white; background-color: #6CCD06; margin-top: 5px; text-decoration: none; border: none; border-radius: 15px;">&nbsp;&nbsp;
                                </div>
                            </form>
            </div>
        </div>
    </div>
