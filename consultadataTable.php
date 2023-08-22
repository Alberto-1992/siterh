<?php 
$status = $_POST['status'];
        require 'conexionRh.php';
        $sql =$conexionRh->prepare("SELECT personaloperativo2023.nombre as nombretrabajador,personaloperativo2023.descripcionestructura2,personaloperativo2023.correo as correoempleado, jefes2022.nombre as nombrejefe, jefes2022.correo as correojefe from personaloperativo2023 inner join jefes2022 on jefes2022.id_jefe=personaloperativo2023.id_jefe where personaloperativo2023.eliminado = :eliminado and vistobueno=:vistobueno");
            $sql->execute(array(
                ':eliminado'=>0,
                ':vistobueno'=>$status
            ));
        ?>
        
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Area deadscripcion</th>
                <th>Correo</th>
                <th>Nombre jefe</th>
                <th>Correo del jefe</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($dataRegistro = $sql->fetch()){
                ?>
            <tr>
                <td><?php echo $dataRegistro['nombretrabajador'] ?></td>
                <td><?php echo $dataRegistro['descripcionestructura2'] ?></td>
                <td><?php echo $dataRegistro['correoempleado'] ?></td>
                <td><?php echo $dataRegistro['nombrejefe'] ?></td>
                <td><?php echo $dataRegistro['correojefe'] ?></td>
            </tr>
            <?php
            }
            ?>  
        </tbody>
        
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Area deadscripcion</th>
                <th>Correo</th>
                <th>Nombre jefe</th>
                <th>Correo del jefe</th>
            </tr>
        </tfoot>
    </table>
    <script>
        new DataTable('#example', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
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