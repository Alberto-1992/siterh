<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/signup-form.css" type="text/css" />

</head>
<script>
        window.onload = function(){killerSession();}
        function killerSession(){
        setTimeout("window.location.href='close_sesion.php'", 2.4e+6);
        }
        </script>
<body>


    <div class="container">
    <div id="mensaje"></div>
        <div class="signup-form-container">

            <!-- form start -->

            <form role="form" id="msform" name="msform"  class="form" autocomplete="off">
                <script>
                    $("#msform").on("submit", function(e) {
                        e.preventDefault();
                        var myregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
                        let validar2 = $("#password1").val();
                        let validar3 = $("#password2").val();
                        let validar = myregex.test(validar2)
                        if (validar2 != "" && validar2 == validar3) {
                            if (!validar) {
                                alert("Tu contraña no es segura, debe de contener una letra mayuscula, una minuscula y algun caracter especial!");
                                validar2.focus();
                                return false;

                            } else {

                                var formData = new FormData(document.getElementById(
                                    "msform"));
                                formData.append("dato", "valor");

                                $.ajax({

                                    url: "registraUsuario.php",
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
                                        document.getElementById("msform").reset();

                                    }
                                })
                            }
                        } else {
                            alert("Tus contraseñas con coinciden");
                        }
                    })
                </script>
                <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-user"></i> Registrar Usuario</h3>

                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>

                </div>

                <div class="form-body">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                            <input name="name" type="text" class="form-control" placeholder="Nombre Completo" required="required">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="correo" type="email" class="form-control" required="required" placeholder="Correo electronico">
                        </div>

                    </div>


                    <div class="row">

                        <div class="form-group col-lg-6">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="password" id="password1" type="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="form-group col-lg-6">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="cpassword" id="password2" type="password" class="form-control" placeholder="Retype Password" required="required">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="input-group">
                            <p>Seleccione el rol del nuevo usuario:</p>
                            <select id="rol_acceso" name="rol_acceso" class="form-control" style="height: 32px;" required>
                                <option value="Sin registro">Sin registro</option>
                                <?php
                                require 'conexionRh.php';
                                $query = $conexionRh->prepare("SELECT * FROM rolacceso");
                                $query->execute();
                                $query->setFetchMode(PDO::FETCH_ASSOC);
                                while ($row = $query->fetch()) { ?>
                                    <option value="<?php echo $row['id_rolacceso']; ?>">
                                        <?php echo $row['tiporol']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                </div><br>

                <div class="form-footer">

                    <input type="submit" class="btn btn-info" name="almacenar" value="Registrar">
                    <a href="#" onclick="window.close();" class="btn btn-danger">Cerrar</a>
                    <a href="cargaMasiva" class="btn btn-warning" style="float: right;">Carga Masiva</a>
                    <a href="cargaMasivaJefes" class="btn btn-success" style="float: right; margin-right: 10px;">Carga
                        Masiva Jefes</a>

                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

                <script src="bootstrap/js/bootstrap.min.js"></script>

            </form>

        </div>
    </div>


</body>

</html>