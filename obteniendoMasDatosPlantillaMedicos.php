<style>
    .ver-info:hover{
        background-color: #D0D0D0;
        color: black;
        cursor: pointer;
    }

    .selected {
        background-color: grey;
        color: white;
    }
    #hr {
        background-color: grey;
        margin: 0px 0px;
    }
    
    </style>
    <div id="lista-comentarios">
<?php 
sleep(0.5);

$utimoId = $_POST['utimoId'];
$limite  = 20;
require_once 'clases/conexion.php';
$conexionX = new ConexionRh();
$sqlQueryComentarios  = $conexionX->prepare("SELECT Nombre, Empleado, DescripcionPuesto,RFC FROM plantillahraei where DescripcionPuesto like '%medico%'");
$sqlQueryComentarios->execute();
$sqlQueryComentarios = $conexionX->prepare("SELECT FOUND_ROWS()");
$sqlQueryComentarios->execute();
$total_registro = $sqlQueryComentarios->fetchColumn();

    $query= $conexionX->prepare("SELECT Nombre, Empleado, DescripcionPuesto,RFC FROM plantillahraei WHERE plantillahraei.Empleado < $utimoId and DescripcionPuesto like '%medico%' ORDER BY plantillahraei.Empleado  DESC LIMIT $limite");
    $query->execute();
	?>

    <?php
        while($dataRegistro= $query->fetch())
        { 
            error_reporting(0);
            $id = $dataRegistro['Empleado'];
            $queryS = $conexionX->prepare("SELECT actualizo from actualizacion where id_empleado = $id");
                $queryS->execute(array(
                    ':id_empleado'=>$id
                ));
                $dataRegistro2 = $queryS->fetch();
            ?>

    <div class="item-comentario" id="<?php echo $dataRegistro['Empleado']; ?>">

        
            <div id="<?php echo $dataRegistro['Empleado'] ?>" class="ver-info" style="cursor: pointer;">
            <?php echo '<strong style="font-family: Arial; font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['Nombre'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['RFC'].'</strong>'.'&nbsp;&nbsp;&nbsp;'.'<strong style="font-size: 9px; margin-left: 7px; color: red;">&nbsp'.$dataRegistro['Empleado'].'</strong>'.'<br>'.'<strong style="font-size: 8px; margin-left: 7px;">&nbsp'.$dataRegistro['DescripcionPuesto'].'</strong><br>';
                    if ($dataRegistro2['actualizo'] == 1) {
                        ?>
                            <input type="submit" value="Actualizo" style="padding: 1px; background: green; border: none; color: white; margin-left: 1%; font-size: 10px; font-style: arial; margin-top: 0px;">
                        <?php }else if($dataRegistro2['actualizo'] == 0) { ?>
                            <input type="submit" value="Sin captura" style="padding: 1px; background: red; border: none; color: white; margin-left: 1%; font-size: 10px; font-style: arial; margin-top: 0px;">
                            <?php } ?>
        </div>
        <hr id="hr">
        </div>
<?php 

    }?>
    </div>
<script>
$(function() {

    $('.item-comentario').on('click', '.ver-info', function() {

        var id = $(this).prop('id');
        let ob = {
            id: id
        };
        $.ajax({
            type: "POST",
            url: "consultaBusquedaPlantillaMedicos.php",
            data: ob,
            beforeSend: function() {

            },
            success: function(data) {

                $("#tabla_resultado").html(data);

            }
        });

    });
});
</script>
<script>
$(document).ready(function() {
    $('.item-comentario').on('click', '.ver-info', function() {

        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultado').html(
            '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
        );


        return false;
    });
});
$('.ver-info').on('click',function(){
	$('.ver-info').removeClass('selected');
        $(this).addClass('selected');
});

</script>

<?php
    
if ($total_registro <= $limite) { ?>
<div class="col-md-12 col-sm-12">
    <h4>No hay más Registros ...</h4>
</div>
<?php }else{ ?>
<!--
<div class="col-md-12 col-sm-12">
    <div class="ajax-loader text-center">
        <img src="img/cargando.svg">
        <br>
        Cargando los Registros...
    </div>
</div>
-->
<?php } 
?>