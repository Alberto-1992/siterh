<?php
error_reporting(0);

require 'clases/conexion.php';
$conexion = new Conexion();
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $acceder = $Row[0];
                
                $correo = $Row[1];
                
                $documento = $Row[2];
                
                $plazaevaluar = $Row[3];
                
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
                    $query = $conexion->prepare("UPDATE datospersonales set acceder = :acceder, cargodocumento = :cargodocumento, plazaevaluar = :plazaevaluar WHERE correoelectronico = :correoelectronico");
                        $query->execute(array(
                            ':acceder'=>$acceder,
                            ':cargodocumento'=>$documento,
                            ':plazaevaluar'=>$plazaevaluar,
                            ':correoelectronico'=>$correo
                        ));

                    
                 /*   $querY = "SELECT * FROM usuarioslogeo";
                    $result = mysqli_query($con, $querY);
                    
                
                    
                 while($row= $result->fetch_assoc())
        {
            ignore_user_abort(true);
            set_time_limit(0);
                
                            $rfc = $row['password'];
                            $id = $row['numTrabajador'];
                            $password = hash('sha512', $rfc);
                  
                    $querYs = "UPDATE usuarioslogeo set password = '$password' where numTrabajador = $id";
                    $results = mysqli_query($con, $querYs);
        }   */   
            $validatransaccion = $conexion->commit();
            if ($validatransaccion != false) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $conexion->rollBack();
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
            }  
            
        }            

}else{ 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }


}
     
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../cisfa/css/styles.css">
    <link rel="stylesheet" href="../cisfa/css/main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <style>
    .titulo {

        font-size: 27px;
        color: blue;
        text-align: center;
    }

    .titulo2 {

        font-size: 27px;
        color: green;
        text-align: center;
    }

    .titulo3 {

        font-size: 27px;
        color: red;
        text-align: center;
    }

    td:hover {
        background: #BAC0C4;
    }

    td {
        cursor: pointer;
    }
    </style>

    <header>



        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">Carga masiva reclutamiento
            RH</strong>

    </header><br>



    <!-- Begin page content -->
    <script>
    /*
$(document).ready(function() {    
    $('.btn-danger').on('click', function(){
        //Añadimos la imagen de carga en el contenedor
        
        $('#cargando').html('<div id="cargando" style="position: fixed; margin-top: 10%; margin-left: 40%;  width: 100%; height: 100%; z-index: 9999;  opacity: .8; "><img src="imagenes/carga.gif" alt="loading" /><br/>Un momento, por favor...</div>');
 
        
        return false;
    });              
}); 
*/
    </script>
    <div style="width: 100%; padding: 1%; margin-top: 0px;">
        <input type="submit" class="btn btn-warning" value="Cerrar ventana" style="float: right; margin-top: 30px;"
            onclick="window.close();">
        <h3 class="mt-5">Importar archivo para accesos y complemento de información</h3>
        <hr>

        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->

                <div class="outer-container">
                    <form action="" method="post" name="frmExcelImport" id="frmExcelImport"
                        enctype="multipart/form-data">
                        <div>
                            <label>Cargar Archivo</label> <input type="file" name="file" id="file"
                                accept=".xls,.xlsx,.csv">
                            <input type="submit" name="import" id="carga" class="btn btn-success"
                                value="  +  Importar Registros">

                        </div>

                    </form>

                </div>


                <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                    <?php if(!empty($message)) { echo $message; } ?></div>


                <?php

  $query=$conexion->prepare("SELECT * FROM datospersonales where acceder = 1 and fechainicio between '2023-01-01' and '2023-12-31'");
    $query->execute();
    $data = $query->fetchAll();

   ?>
                <table id="example" class="table table-striped table-bordered nowrap table-darkgray table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Nombre completo</th>
            <th>Correo</th>
            <th>RFC</th>
            <th>Plaza evaluar</th>
            <th>Telefono casa</th>
            <th>Telefono celular</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data as $dataRegistro):
        ?>
            <tr>
                <td><?php echo $dataRegistro['nombre'].' '.$dataRegistro['appaterno'].' '.$dataRegistro['apmaterno'] ?></td>
                <td><?php echo $dataRegistro['correoelectronico'] ?></td>
                <td><?php echo $dataRegistro['rfc'] ?></td>
                <td><?php echo $dataRegistro['plazaevaluar'] ?></td>
                <td><?php echo $dataRegistro['telefonocasa'] ?></td>
                <td><?php echo $dataRegistro['telefonocelular'] ?></td>
            </tr>
        <?php
        endforeach;
    
        ?>
    </tbody>

    <tfoot>
        <tr>
            <th>Nombre completo</th>
            <th>Correo</th>
            <th>RFC</th>
            <th>Plaza evaluar</th>
            <th>Telefono casa</th>
            <th>Telefono celular</th>
        </tr>
    </tfoot>
</table>
                    <!-- Fin Contenido -->
            </div>
        </div>
        <!-- Fin row -->


    </div>
    <!-- Fin container -->
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>