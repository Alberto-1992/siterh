<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario cursos</title>
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
<header class="header">
        
        <span id="cabecera">Programación vacaciones</span>

    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Progrmación vacaciones</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="../principalRh.php" style="color: red;">Regresar a Inicio <span class="sr-only">(current)</span></a>
      </div>
    </div>
  </nav>
    <div id="mensaje"></div>
<?php
$id = $_GET['id'];

include('config.php');
$periodo = 2023;
  $SqlEventos   = ("SELECT vacaciones.id_vacaciones,vacaciones.evento,vacaciones.fecha_inicio,vacaciones.fecha_fin,vacaciones.color_vacaciones,vacaciones.comentario,vacaciones.periodovacacional, plantillahraei.Empleado, plantillahraei.Nombre, personaloperativo2023.id_jefe FROM vacaciones left outer join personaloperativo2023 on personaloperativo2023.id_empleado = vacaciones.id_empleado left outer join plantillahraei on plantillahraei.Empleado = vacaciones.id_empleado WHERE personaloperativo2023.id_jefe = $id and vacaciones.periodovacacional = $periodo");
  $resulEventos = mysqli_query($con, $SqlEventos);

?> 
<script>
  function autorizaVacaciones() {
    let id = $("#identificador").val();
    let ob = {id:id};

    $.ajax({
                url: "../aplicacion/autorizarVacaciones.php",
                type: "POST",
                data: ob,
                beforeSend: function(objeto) {

                  },
                success: function(data) {
                  $("#mensaje").html(data);
                }
            }); 
  }
</script>
<?php
while($dataEvento = mysqli_fetch_assoc($resulEventos)){ ?>
<div class="mt-5"></div>
  <div class="row">

    <div class="col msjs">
    
    </div>
  </div>
  <div class="row">
  <div class="col-md-12 mb-3">
  <?php 
  error_reporting(0);
  $id_empleado = $dataEvento['Empleado'];
  $sql = $con->query("SELECT autoriza from vacaciones where id_empleado = $id_empleado and periodovacacional = $periodo");
    $row = mysqli_fetch_assoc($sql);
    $autorizacion = $row['autoriza'];
    if($autorizacion == 2 or $autorizacion == 1 or $autorizacion == ''){

    }else if($autorizacion == 0){
    ?>
  <input type="hidden" value="<?php echo $id_empleado ?>" id="identificador">
  <input type="submit" class="btn btn-success" value="Autorizar" onclick="autorizaVacaciones();" style="margin-left: 0px; margin-top: -15px;">
  <input type="submit" class="btn btn-warning" value="Denegar"  data-toggle="modal" data-target="#exampleModal" style="margin-left: 0px; margin-top: -15px;">
  <?php } ?>
  <h1 class="text-center" id="title" style="margin-top: 5px; font-size: 15px; font-style:normal;"><?php echo $dataEvento['Nombre'] ?></h1>
  </div>
  
</div>

<div class="contenedor">
    
<div id="calendar"></div>


<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
  
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },
    defaultDate: '<?php echo $dataEvento['fecha_inicio']; ?>',
        buttonIcons: true,
        weekNumbers: false,
        editable: true,
        eventLimit: true,
        events: [
            {
                title: 'All Day Event',
                description: 'Lorem ipsum 1...',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                color: '#3A87AD',
                textColor: '#ffffff',
            }
        ],
      
    events: [
      
          {
          _id: '<?php echo $dataEvento['id_vacaciones']; ?>',
          title: '<?php echo $dataEvento['evento'];?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_vacaciones']; ?>'
          },
    
    ],

  });

});

</script>
</div>
<?php } ?>
</body>
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Motivo por el cual se rechazan vacaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="razonvacaciones"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.location.reload();" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="denegarVacaciones();">Enviar notificación</button>
      </div>
      <script>
        function denegarVacaciones() {
    let id = $("#identificador").val();

    let mensaje = $("#razonvacaciones").val();
    let ob = {id:id, mensaje:mensaje};

    $.ajax({
                url: "../aplicacion/denegarVacaciones.php",
                type: "POST",
                data: ob,
                beforeSend: function(objeto) {

                  },
                success: function(data) {
                  $("#mensaje").html(data);
                }
            });
  }
      </script>
    </div>
  </div>
</div>