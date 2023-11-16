<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/signup-form.css" type="text/css" />

</head>

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

                                    url: "passwordActualizado.php",
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
                                        setTimeout(function() {
                                            window.location.href = 'close_sesion';
                                        }, 2000);

                                        

                                    }
                                })
                            }
                        } else {
                            alert("Tus contraseñas con coinciden");
                        }
                    })
                </script>
                <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-user"></i>Cambio de contraseña</h3>

                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>

                </div>


                <div class="form-row">
                <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="correo" id="correo" type="text" class="form-control" value="<?php echo $row['correo']; ?>" required="required" readonly>
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>
                    <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="passwordActual" id="passwordActual" type="password" class="form-control" placeholder="Contraseña actual" required="required">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="password" id="password1" type="password" class="form-control" placeholder="Contraseña nueva" required="required">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="cpassword" id="password2" type="password" class="form-control" placeholder="Retipe tu contraseña" required="required">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>
                    
                    <br>

                <div class="form-footer">

                    <input type="submit" class="btn btn-info" name="almacenar" value="Registrar">
                    <a href="#" onclick="window.location.href='principalRh';" class="btn btn-danger">Cerrar</a>
                    

                </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

                <script src="bootstrap/js/bootstrap.min.js"></script>

            </form>

        </div>
    </div>


</body>

</html>