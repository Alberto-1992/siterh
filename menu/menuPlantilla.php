<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilosMenuNew.css">
</head>

<body>

    <nav class="main-menu">
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        HRAE IXTAPALUCA
                    </span>
                </a>
            </li>
            <hr id="hr">
            <li>
                    <a href="principalRh">
                        <i class="fa fa-hospital-o fa-2x" id="icon-color"></i>
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr id="hr">
                <li>
                    <a href="contratacion">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span class="nav-text">
                            Contratación
                        </span>
                    </a>
                </li>
                <hr id="hr">
                <li>
                <a href="#" class="usuariologueoperativo">
                    <i class="fa fa-user fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Nuevo usuario operativo
                    </span>
                </a>
            </li>
            <hr id="hr">
                <li>
                <a href="#" class="usuariologueomando">
                    <i class="fa fa-user-circle fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Nuevo usuario mando
                    </span>
                </a>
            </li>
            <hr id="hr">
                <li>
                <a href="cargaMasiva" target="_blank">
                    <i class="fa fa-user-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cargar masiva usuarios operativos
                    </span>
                </a>
            </li>
            <hr id="hr">
                <li>
                <a href="cargaMasivaJefes" target="_blank">
                    <i class="fa fa-user-circle-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cargar masiva usuarios mandos
                    </span>
                </a>
            </li>
            <!--<hr id="hr">
                <li>
                <a href="actualizarDatosPersonalesMasivo" target="_blank">
                    <i class="fa fa-user-circle-o fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cargar masiva usuarios direcciones
                    </span>
                </a>
            </li>-->
        </ul> 
        <hr id="hr">
        <ul>
            <li>
                <a href="cambiarPassword">
                    <i class="fa fa-lock fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Cambiar contraseña
                    </span>
                </a>
            </li>
        </ul>
        <hr id="hr">
        <ul class="logout">
            <li>
                <a href="close_sesion">
                    <i class="fa fa-power-off fa-2x" id="icon-color"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</body>
<script>
    function buscarpostulados() {
        $("#buscarpostulado").modal('show');
    }
    $(function () {
  $(".usuariologueoperativo").click(function (e) {
    e.preventDefault();
    $("#carganuevousuariologueoperativo").modal('show');

  })

})
$(function () {
  $(".usuariologueomando").click(function (e) {
    e.preventDefault();
    $("#carganuevousuariologueomando").modal('show');

  })

})
</script>

</html>