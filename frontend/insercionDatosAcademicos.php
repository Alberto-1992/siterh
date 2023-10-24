<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Actualización datos academicos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top" style="background-color: #0D9A85;">
        <span id="cabecera">Actualización datos academicos</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <div class="container">
        <div id="mensaje"></div>
        <h1 style="text-align: center; font-size: 25px;">Actualiza tu información academica</h1>
        <h1 style="text-align: center; font-size: 15px; color: red;">Con la finalidad de mantener tu expediente actualizado, te solicitamos actualizes tus datos academicos.</h1>
        <div style="width:100%; display: flex; justify-content: left; align-items: left; margin-left: 0px; text-align:center;">
            <input type="submit" name="add" value="Cerrar ventana" style="background-color: green; color: white; width: 120px; font-size: 15px; border: none; border-radius: 5px;" onclick="window.location.href='principalRh';">
        </div>

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
                        beforeSend: function(datos) {
                            $('#mensaje').html('<div id="mensaje" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');
                        },
                        success: function(datos) {
                            $("#mensaje").html(datos);
                            setTimeout(function() {
                                window.location.href = 'datosAcademicos';
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