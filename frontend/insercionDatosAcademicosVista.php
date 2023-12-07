<div class="container" style="margin-top: 45px;">
        <div id="mensaje"></div>

        <form name="datosacademicos" id="datosacademicos" enctype="multipart/form-data" onsubmit="return limpiar();" autocomplete="off">
            <script>
                $("#datosacademicos").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(document.getElementById("datosacademicos"));
                    formData.append("dato", "valor");
                    $.ajax({
                        url: "aplicacion/actualizarDatosAcademicos.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function(objeto) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(data) {
                            $("#mensaje").html(data);
                            setTimeout(function() {
                                window.location.href = 'plantillahraei';
                            }, 2000);

                        }
                    })
                })
            </script>
            <div class="form-row">
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Datos Academicos</h1>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="form-control" name="id_empleado" id="id_empleado" placeholder="N° empleado" required value="<?php echo $identificador ?>" readonly>
                </div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Formación academica<br>Nivel Medio Superior</h1>
                </div>

                <div class="form-group col-md-6">
                    <label>Nombre de la formación académica</label>
                    <input type="text" id="nombreformacionmedia" name="nombreformacionmedia" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre de la institución educativa</label>
                    <input type="text" id="nombremediasuperior" name="nombremediasuperior" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha de inicio</label>
                    <input type="date" id="fechainicio" name="fechainicio" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha término</label>
                    <input type="date" id="fechatermino" name="fechatermino" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Años cursados</label>
                    <input type="text" id="tiempocursado" name="tiempocursado" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Documento que recibe</label>
                    <input type="text" id="documentomediosuperior" name="documentomediosuperior" autocomplete="off" class="form-control" required>
                </div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Nivel Superior Superior</h1>
                </div>
                <div class="form-group col-md-3">
                    <label>N° de licenciaturas</label>
                    <input type="number" id="quantity" name="numlicenciaturas" autocomplete="off" class="form-control" min="0" max="5">
                </div>
                <script>
                    
                    document.getElementById("quantity").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                                    <h1 style="font-size:22px;">Información licenciatura ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacion[${i}]" name="nombreformacion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucion[${i}]" name="nombreinstitucion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainicio[${i}]" name="fechainiciosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechatermino[${i}]" name="fechaterminosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursado[${i}]" name="tiempocursadosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibe[${i}]" name="documentorecibe[]" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedula[${i}]" name="numerocedula[]" class="form-control">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Nivel Maestria</h1>
                </div>
                <div class="form-group col-md-3">
                    <label>Agregar maestria</label>
                    <input type="number" id="quantity2" name="maestrias" autocomplete="off" class="form-control" min="0" max="5">
                </div>
                <script>
                    document.getElementById("quantity2").addEventListener("input", (event) => {
                        let content = '';

                        const quantity2 = event.target.value;

                        for (let i = 0; i < quantity2; i++) {
                            content += `<div class="form-row">
                            <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                                    <h1 style="font-size:22px;">Información maestria ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionmaestria[${i}]" name="nombreformacionmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionmaestria[${i}]" name="nombreinstitucionmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciomaestria[${i}]" name="fechainiciosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminomaestria[${i}]" name="fechaterminosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadomaestria[${i}]" name="tiempocursadosupmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibemaestria[${i}]" name="documentorecibemaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedulamaestria[${i}]" name="numerocedulamaestria[]" class="form-control">
                            </div>
                        </div>`;
                        }
                        document.getElementById("divGuests2").innerHTML = content;
                    })
                </script>

                <div id="divGuests2"></div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Posgrado/Especialidad</h1>
                </div>
                <div style="width: 100%; height: auto; background-color:aliceblue; text-align:center;margin-top:10px;">
                    <h1 style="font-size:22px;">Doctorado/Subespecialidad</h1>
                </div>

                <div style="width:100%;display: flex; justify-content: center; align-items: center; text-align:center;">
                    <input type="submit" name="add" id="btn-send" value="Actualizar">
                </div>
</body>

</html>