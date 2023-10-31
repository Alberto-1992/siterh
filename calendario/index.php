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
<?php

include('../conexionRh.php');

  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($conexionGrafico, $SqlEventos);

?>
<div class="mt-5"></div>
<div class="container">
  <div class="row">

    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
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
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>

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

//Nuevo Evento
  select: function(start, end){
    var check = moment(start).format('YYYY-MM-DD');
      var today = moment(new Date()).format('YYYY-MM-DD');
      
      // si el inicio de evento ocurre hoy o en el futuro mostramos el modal
      if (check >= today) {
        $("#exampleModal").modal();
        $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
      
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  
      }
      // si no, mostramos una alerta de error
      else {
        alert("No se pueden crear eventos en el pasado!");
      }  

    },
      
    events: [
      
          {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento'].' '.$dataEvento['horacurso'].' '.$dataEvento['lugarevento'];?>',
          title2: '<?php echo $dataEvento['lugarevento'];?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
          },
        
    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=lugarevento').val(event.title2);
    $('input[name=fecha_inicio').val(event.start.format('YYYY-MM-DD'));
    $('input[name=fecha_fin').val(event.end.format("YYYY-MM-DD"));

    $("#modalUpdateEvento").modal();
  },


  });

//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>
<?php } ?>
</body>
</html>
