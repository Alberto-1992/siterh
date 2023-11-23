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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Carga de informacion de cursos</title>
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
<body>
<header class="header" style="background-color: #03CAB1;">
        

        <span id="cabecera">Capacitación</span>

    </header>
<div style="width: 100%; height: 92vh; resize: horizontal; overflow-x:scroll; margin-top: 15px; padding: 15px;">
        <?php session_start();
        error_reporting(0);
        require_once 'clases/conexion.php';
        $conexionX = new ConexionRh();

        $sql = $conexionX->prepare("SELECT id,nombrecurso,id_empleado,fechacriteriotermino,fechacriterioinicio,criteriocurso,fechainicio,fechatermino,modalidad,horas,asistecomo,nombreinstitucion,otroexpidedocumento,tipocapacitacion,documentorecibe, EXTRACT(YEAR 
        FROM fechatermino) as anio from datos order by fechainicio desc");
        $sql->execute();

        ?>

        <table id="example" class="table table-striped table-bordered  table-darkgray table-hover" style="padding: 20px; font-size: 12px;">
            <thead>
                <tr>
                    <th>N° empleado</th>
                    <th>Año</th>
                    <th>Impartido por el HRAEI</th>
                    <th>Impartido por institución externa</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Tema en especifico</th>
                    <th>Vigencia inical</th>
                    <th>Vigencia final</th>
                    <th>Modalidad</th>
                    <th>Horas</th>
                    <th>Asiste como</th>
                    <th>Documento recibe</th>
                    <th>Ver documento</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while ($dataRegistro = $sql->fetch()) {
                    $valor = $dataRegistro['id'];
                    $nombrecurso = $dataRegistro['nombrecurso'];
                    $fechatermino = $dataRegistro['fechatermino'];
                    $id_empleado = $dataRegistro['id_empleado'];
                ?>
                    <tr>
                    <td><?php echo $dataRegistro['id_empleado'] ?></td>
                        <td><?php echo $dataRegistro['anio'] ?></td>
                        <td><?php echo $dataRegistro['nombreinstitucion'] ?></td>
                        <td><?php echo $dataRegistro['otroexpidedocumento'] ?></td>
                        <td><?php echo $dataRegistro['tipocapacitacion'] ?></td>
                        <td><?php echo $dataRegistro['nombrecurso'] ?></td>
                        <td><?php echo $dataRegistro['fechainicio'] ?></td>
                        <td><?php echo $dataRegistro['fechatermino'] ?></td>
                        <td><?php echo $dataRegistro['criteriocurso'] ?></td>
                        <td><?php echo $dataRegistro['fechacriterioinicio'] ?></td>
                        <td><?php echo $dataRegistro['fechacriteriotermino'] ?></td>
                        <td><?php echo $dataRegistro['modalidad'] ?></td>
                        <td><?php echo $dataRegistro['horas'] ?></td>
                        <td><?php echo $dataRegistro['asistecomo'] ?></td>
                        <td><?php echo $dataRegistro['documentorecibe'] ?></td>
                        <td><a href="<?php echo "documentoscursos/$nombrecurso$fechatermino$id_empleado/$nombrecurso.pdf" ?>" target="_blank">Ver archivo</a></td>
                        

                    </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                <th>N° empleado</th>
                    <th>Año</th>
                    <th>Institucion imparte</th>
                    <th>Nombre institucion</th>
                    <th>Tipo de capacitacion</th>
                    <th>Nombre de la capacitación</th>
                    <th>Feha de inicio</th>
                    <th>Feha de termino</th>
                    <th>Tema en especifico</th>
                    <th>Vigencia inical</th>
                    <th>Vigencia final</th>
                    <th>Modalidad</th>
                    <th>Horas</th>
                    <th>Asiste como</th>
                    <th>Documento recibe</th>
                    <th>Ver documento</th>
                </tr>
            </tfoot>
        </table>
        <script>
            new DataTable('#example', {
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            let column = this;
                            let title = column.footer().textContent;

                            // Create input element
                            let input = document.createElement('input');
                            input.placeholder = title;
                            column.footer().replaceChildren(input);

                            // Event listener for user input
                            input.addEventListener('keyup', () => {
                                if (column.search() !== this.value) {
                                    column.search(input.value).draw();
                                }
                            });
                        });
                }
            });
            $('#example tfoot tr').appendTo('#example thead');
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
</body>
</html>