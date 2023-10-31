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

    <span id="cabecera">Programación de vacaciones</span>

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

  <?php

  session_start();
  error_reporting(0);
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
  } else if (isset($_SESSION['usuarioDatos'])) {
    $usernameSesion = $_SESSION['usuarioDatos'];
    require '../conexionRh.php';
    $statement = $conexionRh->prepare("SELECT Empleado FROM plantillahraei WHERE correo= :correo");
    $statement->execute(array(
      ':correo' => $usernameSesion
    ));
    $rw = $statement->fetch();
    $id = $rw['Empleado'];
  }
  include('../conexionRh.php');
  $sql = $conexionGrafico->query("SELECT * FROM vacaciones where id_empleado = $id");
  $row = mysqli_fetch_assoc($sql);
  $validacion = $row['autoriza'];
  if ($validacion == 0) {

    $SqlEventos   = ("SELECT * FROM vacaciones where id_empleado = $id");
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
        <div class="col-md-12 mb-3" style=" margin-top: -20px;">
          <h1 class="text-center" id="title">Calendario programación de vacaciones.</h1>
        </div>
      </div>

      <div id="calendar" style="max-width: 750px; margin-top: 0px;"></div>
    </div>


    <?php
    include('modalNuevoEvento.php');
    include('modalUpdateEvento.php');
    ?>



    <script src="js/jquery-3.0.0.min.js"> </script>
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
          
          locale: 'es',

          defaultView: "month",
          navLinks: true,
          editable: true,
          eventLimit: true,
          selectable: true,
          selectHelper: false,


          //Nuevo Evento
          select: function(start, end) {


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
            <?php
            while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
                _id: '<?php echo $dataEvento['id_vacaciones']; ?>',
                title: '<?php echo $dataEvento['evento']; ?>',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                end: '<?php echo $dataEvento['fecha_fin']; ?>',
                color: '<?php echo $dataEvento['color_vacaciones']; ?>'
              },
            <?php } ?>
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
                  data: {
                    id: event._id
                  },
                  success: function(datos) {
                    $(".alert-danger").show();

                    setTimeout(function() {
                      $(".alert-danger").slideUp(500);
                    }, 3000);

                  }
                });
              }
            });
          },


          //Moviendo Evento Drag - Drop
          eventDrop: function(event, delta) {
            var idEvento = event._id;
            var start = (event.start.format('DD-MM-YYYY'));
            var end = (event.end.format("DD-MM-YYYY"));

            $.ajax({
              url: 'drag_drop_evento.php',
              data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
              type: "POST",
              success: function(response) {
                // $("#respuesta").html(response);
              }
            });
          },

          //Modificar Evento del Calendario 
          eventClick: function(event) {
            var idEvento = event._id;
            $('input[name=idEvento').val(idEvento);
            $('input[name=evento').val(event.title);
            $('input[name=fecha_inicio').val(event.start.format('YYYY-MM-DD'));
            $('input[name=fecha_fin').val(event.end.format("YYYY-MM-DD"));

            $("#modalUpdateEvento").modal();
          },


        });

        //Oculta mensajes de Notificacion
        setTimeout(function() {
          $(".alert").slideUp(300);
        }, 3000);


      });
    </script>
  <?php
  } else if ($validacion == 1) {
    $SqlEventos   = ("SELECT * FROM vacaciones where id_empleado = $id");
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
        <div class="col-md-12 mb-3" style=" margin-top: -20px;">
          <h1 class="text-center" id="title" style="background-color: green;">Tus vacaciones fueron autorizadas.</h1>
        </div>
      </div>

      <div id="calendar" style="margin-top: 5px;"></div>
    </div>


    <?php
    include('modalNuevoEvento.php');
    include('modalUpdateEvento.php');
    ?>



    <script src="js/jquery-3.0.0.min.js"> </script>
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

          locale: 'es',

          defaultView: "month",
          navLinks: true,
          editable: true,
          eventLimit: true,
          selectable: true,
          selectHelper: false,

          //Nuevo Evento


          events: [
            <?php
            while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
                _id: '<?php echo $dataEvento['id_vacaciones']; ?>',
                title: '<?php echo $dataEvento['evento']; ?>',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                end: '<?php echo $dataEvento['fecha_fin']; ?>',
                color: '<?php echo $dataEvento['color_vacaciones']; ?>'
              },
            <?php } ?>
          ],



        });

        //Oculta mensajes de Notificacion
        setTimeout(function() {
          $(".alert").slideUp(300);
        }, 3000);


      });
    </script>

  <?php
  } else if ($validacion == 2) {
    $SqlEventos   = ("SELECT * FROM vacaciones where id_empleado = $id and periodovacacional = 2023");
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
        <div class="col-md-12 mb-3" style=" margin-top: -20px;">
          <h1 class="text-center" id="title" style="background-color: red;">Tus vacaciones fueron rechazadas.</h1>
          <?php 
          $sql = $con->query("SELECT comentario from vacaciones where id_empleado = $id and periodovacacional = 2023");
            $row = mysqli_fetch_assoc($sql); 
            ?>
            <textarea class="form-control" rows="2" style="color: red;" readonly><?php echo $row['comentario'] ?></textarea>
        </div>
      </div>

      <div id="calendar" style="margin-top: 5px;"></div>
    </div>


    <?php
    include('modalNuevoEvento.php');
    include('modalUpdateEvento.php');
    ?>



    <script src="js/jquery-3.0.0.min.js"> </script>
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

          locale: 'es',

          defaultView: "month",
          navLinks: true,
          editable: true,
          eventLimit: true,
          selectable: true,
          selectHelper: false,

          //Nuevo Evento
          select: function(start, end) {


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
            <?php
            while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
                _id: '<?php echo $dataEvento['id_vacaciones']; ?>',
                title: '<?php echo $dataEvento['evento']; ?>',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                end: '<?php echo $dataEvento['fecha_fin']; ?>',
                color: '<?php echo $dataEvento['color_vacaciones']; ?>'
              },
            <?php } ?>
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
                  data: {
                    id: event._id
                  },
                  success: function(datos) {
                    $(".alert-danger").show();

                    setTimeout(function() {
                      $(".alert-danger").slideUp(500);
                    }, 3000);

                  }
                });
              }
            });
          },


          //Moviendo Evento Drag - Drop
          eventDrop: function(event, delta) {
            var idEvento = event._id;
            var start = (event.start.format('DD-MM-YYYY'));
            var end = (event.end.format("DD-MM-YYYY"));

            $.ajax({
              url: 'drag_drop_evento.php',
              data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
              type: "POST",
              success: function(response) {
                // $("#respuesta").html(response);
              }
            });
          },

          //Modificar Evento del Calendario 
          eventClick: function(event) {
            var idEvento = event._id;
            $('input[name=idEvento').val(idEvento);
            $('input[name=evento').val(event.title);
            $('input[name=fecha_inicio').val(event.start.format('YYYY-MM-DD'));
            $('input[name=fecha_fin').val(event.end.format("YYYY-MM-DD"));

            $("#modalUpdateEvento").modal();
          },


        });

        //Oculta mensajes de Notificacion
        setTimeout(function() {
          $(".alert").slideUp(300);
        }, 3000);


      });
    </script>
  <?php
  }
  ?>
</body>

</html>