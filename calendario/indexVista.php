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
</head>
<body>
<header class="header">
        
        <span id="cabecera">Calendario de programación de cursos</span>

    </header>
<?php session_start();
if (isset($_SESSION['usuarioAdminRh'])) {
    $usernameSesion = $_SESSION['usuarioAdminRh'];
    require '../conexionRh.php';
    $statement = $conexionRh->prepare("SELECT Empleado FROM plantillahraei WHERE correo= :correo");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    $id = $rw['Empleado'];


} else if (isset($_SESSION['usuarioJefe'])) {
    $usernameSesion = $_SESSION['usuarioJefe'];
    require '../conexionRh.php';
    $statement = $conexionRh->prepare("SELECT Empleado FROM plantillahraei WHERE correo= :correo");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    $id = $rw['Empleado'];

}else if (isset($_SESSION['usuarioDatos'])) {
    $usernameSesion = $_SESSION['usuarioDatos'];
    require '../conexionRh.php';
    $statement = $conexionRh->prepare("SELECT Empleado FROM plantillahraei WHERE correo= :correo");
    $statement->execute(array(
        ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    $id = $rw['Empleado'];

}


  $SqlEventos   = ("SELECT eventoscalendar.* FROM eventoscalendar inner join personalcurso on personalcurso.id_curso = eventoscalendar.id_curso WHERE personalcurso.id_empleado = $id");
  $resulEventos = mysqli_query($conexionGrafico, $SqlEventos);

?>
<div class="mt-5"></div>
<div class="container">
  <div class="row">

    <div class="col msjs">
    
    </div>
  </div>
  <div class="row">
  <div class="col-md-12 mb-3">
    
  <h1 class="text-center" id="title">Calendario de cursos.</h1>
  </div>
  <input type="submit" class="btn btn-danger" value="Close window" onclick="location.href='../programaCapacitacion'" style="margin-left: 15px; margin-top: -15px;">
</div>

<div id="calendar" style="margin-top: 5px;"></div>
</div>
<?php
        while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
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
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento'].' '.$dataEvento['horacurso'].' '.$dataEvento['lugarevento'];?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
          },
      
    ],

  });

});

</script>
<?php } ?>

</body>
</html>
