<?php
$status = $_POST['status'];
list($fecha1, $fecha2) = explode(":", $status);
$fecha1;
$fecha2;
require 'conexionRh.php';
$sql = $conexion2->query("SELECT * from datospersonales where fechainicio BETWEEN '$fecha1' and '$fecha2'");

?>

<table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Profesion</th>
            <th>Sexo</th>
            <th>Colonia</th>
            <th>CURP</th>
            <th>Fecha postulacion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($dataRegistro = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $dataRegistro['nombre'] . ' ' . $dataRegistro['appaterno'] . ' ' . $dataRegistro['apmaterno'] ?></td>
                <td><?php echo $dataRegistro['profesion'] ?></td>
                <td><?php echo $dataRegistro['sexo'] ?></td>
                <td><?php echo $dataRegistro['colonia'] ?></td>
                <td><?php echo $dataRegistro['curp'] ?></td>
                <td><?php echo $dataRegistro['fechainicio'] ?></td>
                
            </tr>
        <?php
        }
        ?>
    </tbody>

    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Profesion</th>
            <th>Sexo</th>
            <th>Colonia</th>
            <th>CURP</th>
            <th>Fecha postulacion</th>
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