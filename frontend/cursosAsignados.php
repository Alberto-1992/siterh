<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <title>Cursos Asignadados</title>

 
</head>
<style>
    .header {
  background-color: #0D6F9A; height: auto; text-align:center; font-size: 28px; color: white; padding: 5px;
}
hr {
            padding: 0px;
            margin: 0px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .offcanvas-body {
            margin-top: -25px;
        }
</style>
<body>

    <header class="header">
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="float: left;">
  Menu
</a>
        <span id="cabecera">Cursos asignados</span>

    </header>
    
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">HRAEI</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Cursos de capacitación para el personal HRAEI.
    </div>

    <nav class="main-menu">

        <ul>
            <li>
                <a href="#" style="font-size: 15px;">
                
                    <span class="nav-text">
                        <?php
                        if (isset($_SESSION['usuarioAdminRh'])) {
                            $usernameSesion = $_SESSION['usuarioAdminRh'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT Nombre FROM plantillahraei WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            if($rw != false){
                            $nombre = $rw['Nombre'];
                            echo $nombre;
                            }else{
                                $usernameSesion = $_SESSION['usuarioAdminRh'];
                                require 'conexionRh.php';
                                $statement = $conexionRh->prepare("SELECT Nombre FROM plantillahraei WHERE correo= :correo");
                                $statement->execute(array(
                                    ':correo' => $usernameSesion
                                ));
                                $rw = $statement->fetch();
                                $nombre = $rw['Nombre'];
                                echo $nombre;  
                            }
                        } else if (isset($_SESSION['usuarioJefe'])) {
                            $usernameSesion = $_SESSION['usuarioJefe'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT Nombre FROM plantillahraei WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            $nombre = $rw['Nombre'];
                            echo $nombre;
                        }else if (isset($_SESSION['usuarioDatos'])) {
                            $usernameSesion = $_SESSION['usuarioDatos'];
                            require 'conexionRh.php';
                            $statement = $conexionRh->prepare("SELECT Nombre FROM plantillahraei WHERE correo= :correo");
                            $statement->execute(array(
                                ':correo' => $usernameSesion
                            ));
                            $rw = $statement->fetch();
                            $nombre = $rw['Nombre'];
                            echo $nombre;
                        }
                        ?>
                    </span>
                </a>
            </li>
        </ul>
        <hr>
        <ul>
            <?php
            if (isset($_SESSION['usuarioAdminRh'])) {
                $usernameSesion = $_SESSION['usuarioAdminRh']; ?>
                <li>
                    <a href="principalRh">
                    
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="principalCapacitacion">
                        
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                </li>
                <hr>
            <?php
            }else if (isset($_SESSION['usuarioDatos'])) {
            ?>
            <li>
                    <a href="programaCapacitacion">
                    
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <hr>
            <?php }else if (isset($_SESSION['usuarioJefe'])) { ?>
                <li>
                    <a href="programaCapacitacion">
                    
                        <span class="nav-text">
                            Vista principal
                        </span>
                    </a>
                </li>
                <?php } ?>
        </ul>
        <hr>
        <ul class="logout">
            <li>
                <a href="close_sesion">
                
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
        <hr>
    </nav>
  </div>
</div>
<style>
    .box1 {
  display: grid;
  gap: 0.7rem;
  grid-template-columns: 1fr 3fr;
  margin-top: 0px;
  margin-left: 50px;
  padding: 5px;
}
</style>
<div class="box1">
<div class="grid" style="margin-top: 5px; padding: 15px;">

<?php 
    $sql = $conexionX->prepare("SELECT nombre_capacitacion.* from nombre_capacitacion inner join personalcurso on personalcurso.id_curso = nombre_capacitacion.id_capacitacion where personalcurso.id_empleado = :id_empleado");
    $sql->execute(array(
        ':id_empleado'=>$identificador
    ));

    while($row = $sql->fetch()){
        $curso = $row['nombre_capacitacion'];
        $tipoaccion = $row['tipode_accion'];
        $nombreCurso = "#".$row['id_capacitacion'];
        $cursoLink = $row['id_capacitacion'];
?>
<div class="card" style="width: 18rem; ">
      <img class="bd-placeholder-img card-img-top" width="100%" height="180" src="<?php echo $row['rutaimagen'] ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
    
      <div class="card-body" >
        <h5 class="card-title"><?php echo $tipoaccion ?></h5>
        <p class="card-text"><?php echo $curso ?></p>
        <p>
  <a class="btn btn-primary" data-toggle="collapse" href="<?php echo $nombreCurso; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
    Ver información
  </a>
        </p>
      
  <div class="collapse" id="<?php echo $cursoLink; ?>">
  <div class="card card-body">
        <?php echo $row['objetivo'] ?>
        <a href="<?php echo $row['link'] ?>" style="text-decoration-line: underline; color: blue;" target="_blank">Link de inscripción</a>
  </div>
    
    </div>
    </div>
</div>
<?php } ?>

</div>
</div>



    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
        function myFunction() {
            $.ajax({
                url: "notificaciones/notificaciones.php",
                type: "POST",
                processData: false,
                success: function(data) {
                    $("#notification-count").remove();
                    $("#notification-latest").show();
                    $("#notification-latest").html(data);
                },
                error: function() {}
            });
        }

        $(document).ready(function() {
            $('body').click(function(e) {
                if (e.target.id != 'notification-icon') {
                    $("#notification-latest").hide();
                }
            });
        });
    </script>
</body>
</html>