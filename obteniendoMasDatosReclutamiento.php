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
$conexionRol = new Conexion();
$sqlQueryComentarios  = $conexionRol->prepare("SELECT datospersonales.id_datopersonal FROM datospersonales where acceder = 0 and fechainicio between '2023-01-01' and '2023-12-31' ");
$sqlQueryComentarios->execute();
$sqlQueryComentarios = $conexionRol->prepare("SELECT FOUND_ROWS()");
$sqlQueryComentarios->execute();
$total_registro = $sqlQueryComentarios->fetchColumn();

    $query= $conexionRol->prepare("SELECT datospersonales.id_datopersonal, datospersonales.curp, datospersonales.nombre,datospersonales.appaterno,datospersonales.apmaterno, datospersonales.correoelectronico FROM datospersonales WHERE acceder = 0 and fechainicio between '2023-01-01' and '2023-12-31' and datospersonales.id_datopersonal < '".$utimoId."' ORDER BY datospersonales.id_datopersonal  DESC LIMIT ".$limite."");
    $query->execute();
	?>

    <?php
        while($dataRegistro= $query->fetch())
        { ?>

    <div class="item-comentario" id="<?php echo $dataRegistro['id_datopersonal']; ?>">

        
            <div id="<?php echo $dataRegistro['id_datopersonal'] ?>" class="ver-info" style="cursor: pointer;">
                <?php echo '<strong style="font-family: Arial; font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['nombre'].''.$dataRegistro['appaterno'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['curp'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['correoelectronico'].'</strong>';
                    ?>
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
            url: "consultaReclutamientoBusqueda.php",
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